<?php

namespace titanium;

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

    private function __construct()
    {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueueScripts'));
        add_action('wp_ajax_titanium_lookup_suburb', array($this, 'lookupSuburbs'));
    }

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
            'titanium-community',
            plugins_url('titanium-community/public/js/public.js'),
            ['jQuery-autocomplete'],
            self::VERSION
        );
        wp_localize_script(
            'titanium-community',
            'titanium',
            array( 'ajaxurl' => admin_url('admin-ajax.php')
            )
        );
    }

    public function lookupSuburbs()
    {
        if (!isset($_POST['query']))
            wp_send_json_error();

        global $wpdb;
        $results = $wpdb->get_results("SELECT * from suburb where suburb_name like '%".$_POST['query']."%'");
        $suggestion = [];
        if ($results)
        {
           foreach($results as $result) {
               $suggestion[] = ['value'=> $result->suburb_name, 'data'=> $result->suburb_id ];
           }
        }
        wp_send_json(["suggestions"=>$suggestion]);
    }

}