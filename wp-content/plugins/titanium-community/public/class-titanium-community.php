<?php

namespace titanium;

/**
 * Class TitaniumCommunityClass
 * @package titanium
 */
class TitaniumCommunityClass
{

    const VERSION = '1.0.0';
    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      static
     */
    protected static $instance = null;

    /**
     * Contains list of houses and id for autocomplete suggestion
     * @var array|null
     */
    private static $allHouseSuggestion = null;


    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    static    A single instance of this class.
     */
    public static function getInstance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new static;
        }

        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct()
    {
        self::$allHouseSuggestion = $this->RetriveAllPostTitleOfHouse();
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueueScripts'));
        /**
         * Ajax callback for loggedin users
         */
        add_action('wp_ajax_titanium_compute_house_community_details', array($this, 'ajaxComputeHouseAndCommunityDetails'));

        /**
         * Ajax callback for non-logged users
         */
        add_action('wp_ajax_nopriv_titanium_compute_house_community_details', array($this, 'ajaxComputeHouseAndCommunityDetails'));
    }

    /**
     * Enqueue all the style
     * and scripts of the plugins
     * @since 1.0.0
     * @edited 2.0.0
     */
    public static function enqueueScripts()
    {
        wp_enqueue_style(
            'jquery-autocomplete',
            plugins_url('titanium-community/public/css/public.css')
        );
        wp_enqueue_script(
            'jQuery-autocomplete',
            plugins_url('titanium-community/public/js/jquery.autocomplete.min.js'),
            ['jquery'],
            self::VERSION
        );
        wp_enqueue_script(
            'jQuery-qtip',
            'http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js',
            ['jquery'],
            self::VERSION
        );

        wp_enqueue_style(
            'chartist',
            '//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css'
        );

        wp_enqueue_script(
            'chartist',
            '//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js',
            [],
            self::VERSION
        );

        wp_enqueue_style(
            'jQuery-qtip',
            'http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css'
        );

        wp_enqueue_script(
            'jquery-topics',
            plugins_url('titanium-community/public/js/jquery.topic.min.js'),
            ['jquery'],
            self::VERSION
        );


        wp_register_script(
            'titanium-community',
            plugins_url('titanium-community/public/js/public.js'),
            ['jQuery-autocomplete','jquery-topics', 'jQuery-qtip'],
            self::VERSION
        );
        wp_localize_script(
            'titanium-community',
            'titanium',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'autocompleteHouseSuggestion' => self::$allHouseSuggestion,
                'nonce' => wp_create_nonce( "community_nonce" ),
            )
        );

        wp_enqueue_script('titanium-community');
    }

    /**
     * Ajax function to lookup surburb for auto complete
     * @since 1.0.0
     */
    public function ajaxLookupSuburbs()
    {
        /**
         * Send error message if nothing received
         */
        if (!isset($_POST['query']))
            wp_send_json_error();

        /**
         * get the list of suburbs and its id.
         */
        global $wpdb;
        $results = $wpdb->get_results("SELECT * from suburb where suburb_name like '%".$_POST['query']."%' or postcode like '".$_POST['query']."%'");
        $suggestion = [];
        if ($results)
        {
            foreach($results as $result) {
                $suggestion[] = ['value'=> $result->suburb_name." (".$result->postcode.")", 'data'=> $result->suburb_id ];
            }
        }
        wp_send_json(["suggestions"=>$suggestion]);
    }

    /**
     * Function to compute the information about
     * the requested suburb.
     * @param $surburb_id
     */
    private function ComputeCommunityDetails($postcode) {
        /**
         * Get the information from database related with
         * the suburb.
         */
        global $wpdb;
        /**
         * Get surburb Information
         */
        $suburb_info = $wpdb->get_row($wpdb->prepare("SELECT * from suburb where postcode = %d", $postcode));
        $surburb_id = $suburb_info->suburb_id;
        /**
         * Get information about hospital
         */
        $hospitals = $wpdb->get_results($wpdb->prepare("SELECT nearest_hospital, traveltime, distance, type from hospital WHERE surburb_id = %d", $surburb_id));

        /**
         * Get information about healthcenters and total numbers of health centers in suburb
         */
        $healthCenters = $wpdb->get_row($wpdb->prepare(
            "SELECT public_hospital, private_hospital, communit_health_centers,
              alliled_health, alternative_health, dental, disability,general_practice,
              mental_health, pharmacies, (public_hospital+private_hospital+communit_health_centers+
              alliled_health+alternative_health+dental+disability+
              general_practice+mental_health+ pharmacies) as total_hospital
              FROM health_center where surburb_id = %d", $surburb_id));

        /**
         * Get the crime related data for provided postcode
         */
        $crime = $wpdb->get_row($wpdb->prepare(
            "SELECT crime_in_2012, crime_in_2013, crime_in_2014 from crime where postcode = %d",
            $suburb_info->postcode
        ));

        /**
         * get the information of GPO
         */
        $gpo = $wpdb->get_row($wpdb->prepare(
            "select travel_time, distance from gpo where suburb_id = %d",
            $surburb_id
        ));

        /**
         * Get the information of Schools in suburb
         */
        $schools = $wpdb->get_row($wpdb->prepare(
            "SELECT childcare, primary_school, secondary_school, p12_schools, other_schools,
           (select childcare+primary_school+secondary_school+p12_schools+other_schools) as total_schools
           FROM school where suburb_id = %d",
            $surburb_id
        ));

        /**
         * Get the Age Care information
         */
        $ageCare = $wpdb->get_row($wpdb->prepare(
            "SELECT high_care, low_care, srs from agecare where suburb_id = %d",
            $surburb_id
        ));


        $result = array(
            "suburb_info" => $suburb_info,
            "hospital" => $hospitals,
            "healthCenters" => $healthCenters,
            "crime" => $crime,
            "gpo" => $gpo,
            "school" => $schools,
            "agecare" => $ageCare

        );

        return $result;

    }

    /**
     * Retrieve all the house titles and its Id for autocomplete suggestion
     * @return array
     * @since 2.0.0
     */
    private function RetriveAllPostTitleOfHouse() {
        $args = array(
            'posts_per_page'   => -1,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'house',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $posts_array = get_posts( $args );

        $suggestion = [];
        foreach($posts_array as $key => $post) {
            $suggestion[] = ['value' => $post->post_title, 'data'=>$post->ID];
        }

        return $suggestion;
    }


    /**
     * AJAX function to get all the details about house and community
     * @returns array
     * @since 2.0.0
     */
    public function ajaxComputeHouseAndCommunityDetails() {
        check_ajax_referer( 'community_nonce', 'nonce' );

        if (!isset($_POST['query']))
            wp_send_json_error();

        $post_id = $_POST['query'];

        $suburb_id = get_post_meta($post_id, 'post_code', true);
        $community_details = $this->ComputeCommunityDetails($suburb_id);
        $house_details = array('fulladdress'=>'148 Well Street, South Melbourne, 3205', 'verified'=>0);

        wp_send_json(['house_details'=>$house_details, 'community_details'=>$community_details]);
    }

}