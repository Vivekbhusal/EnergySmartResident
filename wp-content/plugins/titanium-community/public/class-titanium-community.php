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
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueueScripts'));
        add_action('wp_ajax_titanium_lookup_suburb', array($this, 'lookupSuburbs'));
        add_action('wp_ajax_titanium_lookup_suburb', array($this, 'ajaxLookupSuburbs'));
        add_action('wp_ajax_titanium_compute_community_details', array($this, 'ajaxComputeCommunityDetails'));
        add_action('wp_ajax_nopriv_titanium_lookup_suburb', array($this, 'ajaxLookupSuburbs'));
        add_action('wp_ajax_nopriv_titanium_compute_community_details', array($this, 'ajaxComputeCommunityDetails'));
    }

    /**
     * Enqueue all the style
     * and scripts of the plugins
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
            array( 'ajaxurl' => admin_url('admin-ajax.php')
            )
        );

        wp_enqueue_script('titanium-community');
    }

    /**
     * Ajax function to lookup surburb for auto complete
     */
    public function lookupSuburbs()
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
     * Ajax function to compute the information about
     * the requested suburb.
     */
    public function ajaxComputeCommunityDetails() {

        /**
         * Send error message if nothing received
         */
        if(!isset($_POST['query']))
            wp_send_json_error();

        $surburb_id = $_POST['query'];

        /**
         * Get the information from database related with
         * the suburb.
         */
        global $wpdb;
        /**
         * Get surburb Information
         */
        $suburb_info = $wpdb->get_row($wpdb->prepare("SELECT * from suburb where suburb_id = %d", $surburb_id));

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
        error_log(print_r(json_encode($result), true));

        wp_send_json($result);

    }

}