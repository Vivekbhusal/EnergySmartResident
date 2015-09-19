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
        add_action('admin_enqueue_scripts', array(__CLASS__, 'adminEnqueueScripts'));
        /**
         * Ajax callback for loggedin users
         */
        add_action('wp_ajax_titanium_compute_house_community_details', array($this, 'ajaxComputeHouseAndCommunityDetails'));

        /**
         * Ajax callback for add house section
         */
        add_action('wp_ajax_titanium_lookup_suburb_add_house', array($this, 'ajaxLookupSuburbsForAddHouse'));

        /**
         * Ajax callback for non-logged users
         */
        add_action('wp_ajax_nopriv_titanium_compute_house_community_details', array($this, 'ajaxComputeHouseAndCommunityDetails'));
    }

    /**
     * Enqueue styles and scripts for admin section
     * @since 3.0.0
     */
    public static function adminEnqueueScripts()
    {
        //Google Map Javascript Library
        wp_enqueue_script(
            'google-map-library',
            'http://maps.google.com/maps/api/js?key=AIzaSyBzcAcA3wULxqdp6EUVkMb77fjSCXO70tA&signed_in=true&libraries=places&language=en-AU',
            [],
            self::VERSION
        );

        wp_enqueue_style(
            'jquery-sweetalert',
            'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.css'
        );

        wp_enqueue_script(
            'jquery-sweetalert',
            'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js',
            ['jquery'],
            self::VERSION
        );
    }

    /**
     * Enqueue all the style
     * and scripts of the plugins
     * @since 1.0.0
     * @edited 2.0.0, 3.0.0
     */
    public static function enqueueScripts()
    {
        wp_enqueue_script(
            'jQuery-qtip',
            'http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.js',
            ['jquery'],
            self::VERSION
        );

        //ChartList Library's style
        wp_enqueue_style(
            'chartist',
            '//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css'
        );

        //ChartList Library's javascript
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

        //jQuery Topics library
        wp_enqueue_script(
            'jquery-topics',
            plugins_url('titanium-community/public/js/jquery.topic.min.js'),
            ['jquery'],
            self::VERSION
        );

        //Google Map Javascript Library
        wp_enqueue_script(
            'google-map-library',
            'http://maps.google.com/maps/api/js?key=AIzaSyBzcAcA3wULxqdp6EUVkMb77fjSCXO70tA&signed_in=true&libraries=places&language=en-AU',
            [],
            self::VERSION
        );

        wp_enqueue_style(
            'jquery-sweetalert',
            'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.css'
        );

        wp_enqueue_script(
            'jquery-sweetalert',
            'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.min.js',
            ['jquery'],
            self::VERSION
        );

        //JS file of Titanium
        wp_register_script(
            'titanium-community',
            plugins_url('titanium-community/public/js/public.js'),
            ['jquery-topics', 'jQuery-qtip', 'google-map-library'],
            self::VERSION
        );
        wp_localize_script(
            'titanium-community',
            'titanium',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce( "community_nonce" ),
            )
        );

        wp_enqueue_script('titanium-community');
    }

    /**
     * function to lookup surburb for auto complete
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
     * Admin function
     * used in Add house form
     * Ajax function to lookup surburb for auto complete
     * @since 3.0.0
     */
    public function ajaxLookupSuburbsForAddHouse()
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
                $suggestion[] = ['value'=> $result->suburb_name, 'postcode'=> $result->postcode ];
            }
        }
        wp_send_json(["suggestions"=>$suggestion]);
    }

    /**
     * Function to compute the information about
     * the requested suburb.
     * @param $suburbName String name of the suburb
     */
    private function ComputeCommunityDetailsBySuburbName($suburbName) {
        /**
         * Get the information from database related with
         * the suburb.
         */
        global $wpdb;
        /**
         * Get surburb Information
         */
        $suburb_info = $wpdb->get_row($wpdb->prepare("SELECT * from suburb where suburb_name = %s", $suburbName));
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
     * AJAX function to get all the details about house and community
     * @returns array
     * @since 2.0.0
     */
    public function ajaxComputeHouseAndCommunityDetails() {
        check_ajax_referer( 'community_nonce', 'nonce' );

        if (!isset($_POST['query']))
            wp_send_json_error();

        $address = $_POST['query'];

        if($address['administrative_area_level_1'] != 'VIC') {
            wp_send_json_error(
                [
                    'message'=> "Sorry to upend your adventure. We are very happy to see that you
                                are enjoying our service and searching address all over Australia, but currently we
                                 only operate for Victoria. "
                ]
            );
        }

        /**
         * Parse address to decide whether the address is
         * full house address or just suburb or locality
         */
        $house_details = null;
        $community_details = null;
        $recommended_house = null;
        $response = [];

        if ($this->is_full_house_search($address)) {
            $response['search_type'] = "house";

            /** Get house title on post */
            $title = $this->buildHouseTitleByAddress($address);

            $post = get_page_by_title($title, OBJECT, 'house');
            if ($post != null && $post instanceof \WP_Post) {
                $response['success'] = true;

                // Get both house and community by post id
                $post_id = $post->ID;
                $response['house_details'] = $this->computePropertyDetailsByPostID($post_id);
                $response['community_details'] = $this->ComputeCommunityDetailsBySuburbName(get_post_meta($post_id, 'suburb', true));
            } else {
                $response['success'] = false;
                $response['message'] = "The information about this address is not available. We will try to get this information as soon as possible.";

                // Get only community and near by house
                $response['community_details'] = $this->ComputeCommunityDetailsBySuburbName($address['locality']);
            }
        } else {
            $response['search_type'] = "community";
            $response['community_details'] = $this->ComputeCommunityDetailsBySuburbName($address['locality']);
        }

        wp_send_json($response);
    }

    private function buildHouseTitleByAddress($address)
    {
        $title = "";

        if (isset($address['subpremise'])) {
           $title = $address['subpremise']."/".$address['street_number']." ";
        } else {
            $title = $address['street_number']." ";
        }

        if (isset($address['route'])) {
            $title .= $address['route'].", ";
        }

        if(isset($address['locality'])) {
            $title .= $address['locality'].", ";
        }

        if(isset($address['postal_code'])) {
            $title .= $address['postal_code'];
        }

        return $title;
    }
    /**
     * Helper function to decide whether the user sent address
     * is full house address or suburb only
     * @param $address
     * @return bool
     * @since 3.0.0
     */
    private function is_full_house_search($address)
    {
        return isset($address['street_number'])
            ? true
            : false;
    }

    /**
     * computes all the information about the property
     * @param $post_id \WP_Post Id of the post
     * @return array
     * @since 2.0.0
     */
    private function computePropertyDetailsByPostId($post_id) {

        /**Property Image**/
        $property_house = get_post_meta($post_id, 'house_picture', true);
        $property_url = wp_get_attachment_url($property_house['ID']);

        /**House Address **/
        $property_address = $this->getHouseAddress($post_id);

        global $wpdb;
        /**Window**/
        $window_frame = get_post_meta($post_id, 'type_of_window_frame');
        $window_frame_text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", 'window_frame'))->info;
        foreach($window_frame as $frame) {
            if (!empty($frame)) {
                $window_frame_text .= $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $frame))->info;
            }
        }

        /**Rain water tank**/
        $rain_water_tank = $this->getPropertyWithBooleanOption(
            $post_id,
            'rain_water_tank',
            ['rainwater_tank_no', 'rainwater_tank_yes']
        );

        /**Air Conditioner**/
        $air_conditioner = $this->getPropertyWithMultiOption(
            $post_id,
            'house_has_air_conditioner',
            'type_of_air_conditioner',
            ['air_conditioner_no', 'air_conditioner_yes']
        );

        /**Sky light information**/
        $sky_light = $this->getPropertyWithBooleanOption(
            $post_id,
            'has_skylight',
            array('skylight_no', 'skylight_yes')
        );

        /**Solar water system information**/
        $solar_water = $this->getPropertyWithMultiOption(
            $post_id,
            'solar_hot_water_system',
            'type_of_hot_water_system',
            array('solar_water_heaters_no', 'solar_water_heaters_yes')
        );

        /**Thermostat details information**/
        $thermostat = $this->getPropertyWithBooleanOption(
            $post_id,
            'has_thermostat',
            ['thermostats_no', 'thermostats_yes']
        );

        /**Energy saver system information**/
        $energy_saver = $this->getPropertyWithMultiOption(
            $post_id,
            'has_energy_saver_system',
            'type_of_energy_saver',
            ['energy_saver_system_no', 'energy_saver_system_yes']
        );

        /**External shading information**/
        $shading = $this->getPropertyWithMultiOption(
            $post_id,
            'has_external_shading',
            'type_of_external_shading',
            ['external_shading_no', 'external_shading_yes']
        );

        /**house electric heater**/
        $heater = $this->getPropertyWithMultiOption(
            $post_id,
            'house_has_electric_heaters',
            'type_of_electric_heater',
            ['electric_heaters_no', 'electric_heaters_yes']
        );

        /**Property inspection and certification**/
        $nathers = $this->getPropertyWithBooleanOption(
            $post_id,
            'is_property_inspection',
            ['house_inspected_no', 'house_inspected_yes']
        );

        /**Check if the user has uploaded certificate**/
        $inspectionCertificate = get_post_meta($post_id, 'certificate_of_inspection', true);
        if(!empty($inspectionCertificate)){
            $certificateURL = wp_get_attachment_url($inspectionCertificate['ID']);
            $nathers['file'] = $certificateURL;
            $nathers['text'] .= " <p class='nathers-italic'>Click on the icon to see the certificate</p>";
        } else {
            $nathers['has'] = "0";
            $nathers['text'] = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", 'house_inspected_no'))->info;
        }

        return [
            'house_img'     => $property_url,
            'address'       => $property_address,
            'window'        => $window_frame_text,
            'water_tank'    => $rain_water_tank,
            'air_conditioner'   => $air_conditioner,
            'sky_light'     => $sky_light,
            'solar_water'   => $solar_water,
            'thermostat'    => $thermostat,
            'energy_saver'  => $energy_saver,
            'shading'       => $shading,
            'heater'        => $heater,
            'nathers'       => $nathers
        ];
    }

    /**
     * Static function to call the private function of class
     * Get the result of property
     * @param $postID
     * @return array
     * @since 3.0.0
     */
    public static function getPropertyDetailsByPostID($postID)
    {
        return self::getInstance()->computePropertyDetailsByPostId($postID);
    }

    public static function getCommunityDetailsByPostID($postID)
    {
        $suburb = get_post_meta($postID, 'suburb', true);
        return self::getInstance()->ComputeCommunityDetailsBySuburbName($suburb);
    }

    /**
     * @param $post_id \WP_Post id of the post
     * @param $key String  key name of context
     * @param $optionKeys array negative and positive options
     * @return array
     * @since 2.0.0
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
     * @since 2.0.0
     */
    private function getPropertyWithMultiOption($post_id, $key, $keyType, $optionKeys) {
        global $wpdb;

        /**Check whether property has defined $key**/
        $has_key = get_post_meta($post_id, $key)[0];
        $value = ($has_key == 0)
            ? $optionKeys[0]
            : $optionKeys[1];
        $text = $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $value))->info;

        if (!empty($keyType)) {
            $types = get_post_meta($post_id, $keyType);

            foreach($types as $type) {
                if(!empty($type)) {
                    $text .= $wpdb->get_row($wpdb->prepare("SELECT * from energy_info where computer_title = %s", $type))->info;
                }
            }
        }

        return ['has'=> $has_key, 'text' => $text];
    }


    /**
     * returns the full address of house
     * @param $post_id \WP_Post Id of post
     * @return string
     * @since 2.0.0
     */
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