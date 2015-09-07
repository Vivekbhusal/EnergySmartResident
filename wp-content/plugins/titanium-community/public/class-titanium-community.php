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
        $house_details = $this->computePropertyDetails($post_id);

        wp_send_json(['house_details'=>$house_details, 'community_details'=>$community_details]);
    }

    private function computePropertyDetails($post_id) {
        $property_meta = get_post_meta($post_id);

        /**Property Image**/
        $property_house = get_post_meta($post_id, 'house_picture', true);
        $property_url = wp_get_attachment_url($property_house['ID']);

        /**House Address **/
        $property_address = $this->getHouseAddress($post_id);

        /**House verified**/
        $is_house_verfied = get_post_meta($post_id, 'is_property_inspection', true);
        $inspection_file_path = '';

        global $wpdb;
        /**Window**/
        $window_frame = get_post_meta($post_id, 'type_of_window_frame');
        $window_frame_text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", 'window_frame'))->info;
        foreach($window_frame as $frame) {
            $window_frame_text .= $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $frame))->info;
        }

        /**Water tank**/
        $rain_water_tank = get_post_meta($post_id, 'rain_water_tank', true);
        $rain_water_tank_value = ($rain_water_tank == 0)
            ? 'rainwater_tank_no'
            : 'rainwater_tank_yes';
        $rain_water_tank_text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $rain_water_tank_value))->info;

        /**Air Conditioner**/
        $has_air_conditioner = get_post_meta($post_id, 'house_has_air_conditioner', true);
        $air_conditioner_value = ($has_air_conditioner === 0)
            ? 'air_conditioner_no'
            : 'air_conditioner_yes';
        $air_conditioner_text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $air_conditioner_value))->info;
        $air_conditioner_type = get_post_meta($post_id, 'type_of_air_conditioner');
        foreach($air_conditioner_type as $type) {
            $air_conditioner_text .= $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $type))->info;
        }

        $sky_light = $this->getPropertyWithBooleanOption(
            $post_id,
            'has_skylight',
            array('skylight_no', 'skylight_yes')
        );

        $solar_water = $this->getPropertyWithMultiOption(
            $post_id,
            'solar_hot_water_system',
            'type_of_hot_water_system',
            array('solar_water_heaters_no', 'solar_water_heaters_yes')
        );

        return [
            'house_img'     => $property_url,
            'address'       => $property_address,
            'verify'        => ['is_verified'=> $is_house_verfied, 'inspection_file' => $inspection_file_path],
            'window'        => $window_frame_text,
            'water_tank'    => ['has_tank'=> $rain_water_tank, 'text' => $rain_water_tank_text],
            'air_conditioner'   => ['has_air_conditioner' => $has_air_conditioner, 'text' => $air_conditioner_text],
            'sky_light'     => $sky_light,
            'solar_water'   => $solar_water
        ];
    }

    /**
     * @param $post_id \WP_Post id of the post
     * @param $key String  key name of context
     * @param $optionKeys array negative and positive options
     * @return array
     */
    private function getPropertyWithBooleanOption($post_id, $key, $optionKeys) {
        global $wpdb;

        /**Check whether property has defined $key**/
        $has_key = get_post_meta($post_id, $key)[0];
        $value = ($has_key == 0)
            ? $optionKeys[0]
            : $optionKeys[1];
        $text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $value))->info;

        return ['has' => $has_key, 'text' => $text];
    }

    /**
     * @param $post_id \WP_Post id of the post
     * @param $key String  key name of context
     * @param $keyType String key name for this option
     * @param $optionKeys array negative and positive options
     * @return array
     */
    private function getPropertyWithMultiOption($post_id, $key, $keyType, $optionKeys) {
        global $wpdb;

        /**Check whether property has defined $key**/
        $has_key = get_post_meta($post_id, $key)[0];
        $value = ($has_key == 0)
            ? $optionKeys[0]
            : $optionKeys[1];
        $text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $value))->info;
        $types = get_post_meta($post_id, $keyType);

        foreach($types as $type) {
            if(!empty($type)) {
                error_log("getting type values");
                $text .= $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $type))->info;
            }
        }

        return ['has'=> $has_key, 'text' => $text];
    }


    private function getHouseAddress($post_id) {

        $house_number = get_post_meta($post_id, 'house_number', true) ? get_post_meta($post_id, 'house_number', true) : null;
        $street_name = get_post_meta($post_id, 'street_name', true) ? get_post_meta($post_id, 'street_name', true) :null;
        $post_code = get_post_meta($post_id, 'post_code', true) ? get_post_meta($post_id, 'post_code', true) : null;
        $suburb = get_post_meta($post_id, 'suburb', true) ? get_post_meta($post_id, 'suburb', true) : null;

        $title = "";
        if (!is_null($house_number)){
            $title = $house_number ." ";
        }
        if (!is_null($street_name)) {
            $title .= $street_name.", ";
        }
        if (!is_null($suburb)) {
            $title .= $suburb.", ";
        }
        if (!is_null($post_code)) {
            $title .= strval($post_code);
        }

        return $title;
    }
}