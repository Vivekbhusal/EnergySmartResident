<?php
/**
 * Created by PhpStorm.
 * User: vivekbhusal
 * Date: 13/10/2015
 * Time: 2:14 PM
 */

namespace titanium;


/**
 * Class TitaniumCommunityClassAdmin
 * @package titanium
 */
class TitaniumCommunityClassAdmin
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
        add_action('admin_head-post.php','ep_publish_admin_hook');
        add_action('admin_head-post-new.php','ep_publish_admin_hook');
    }

    function ep_publish_admin_hook()
    {
        global $post;
        if ( is_admin() && $post->post_type == 'houses' ){
        ?>
            <script language="javascript" type="text/javascript">
                (function($) {
                    jQuery(document).ready(function () {
                        alert("vivek");
                    });
                })(jQuery);
                </script>
<?


    }

}