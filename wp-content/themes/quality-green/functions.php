<?php
update_option('siteurl', WP_SITEURL);
update_option('home', WP_HOME);

add_action( 'wp_enqueue_scripts', 'qualitygreen_enqueue_styles' );
function qualitygreen_enqueue_styles() {
    wp_enqueue_script('jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('bootstrap', QUALITY_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style('default', QUALITY_TEMPLATE_DIR_URI . '/css/default.css');
	wp_enqueue_style('theme-menu', QUALITY_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style( 'team-template', get_stylesheet_directory_uri() . '/assets/css/team.css' );
    wp_enqueue_style( 'titanium-template', get_stylesheet_directory_uri() . '/assets/css/titanium.css' );

    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
    wp_enqueue_script('font-awesome', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', ['jQuery']);
    wp_enqueue_script( 'parallax-jquery', get_stylesheet_directory_uri() . '/assets/js/parallax.min.js', ['jQuery']);

}

function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '...Read More', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Redirect Logouts to home page
 */
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));

/**
 * Remove admin color scheme for users
 */
if (current_user_can('seller')) {
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
}

// Remove unneeded menus
function sc_remove_menus()
{
    // setup the global menu variable
    global $menu;
    // this is an array of the menu item names we wish to remove
    $restricted = array( __('Links'),__('Tools'),__('Comments'), __('Media'), _('Contact'), _('Teams'));
    end ($menu);
    while (prev($menu))
    {
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted))
        {
            unset($menu[key($menu)]);
        }
    }
}
// hook into the action that creates the menu


/**
 * Remove password reset functionality
 */
if (current_user_can('seller')) {
    add_filter( 'show_password_fields', 'disable');
    add_filter( 'allow_password_reset', 'disable');
    add_filter( 'gettext','remove');
    add_action('admin_menu', 'sc_remove_menus');
}

function disable()
{
    if ( is_admin() ) {
        $userdata = wp_get_current_user();
        $user = new WP_User($userdata->ID);
        if ( !empty( $user->roles ) && is_array( $user->roles ) && $user->roles[0] == 'administrator' )
            return true;
    }
    return false;
}

function remove($text)
{
    return str_replace( array('Lost your password?', 'Lost your password'), '', trim($text, '?') );
}

/**
 * Remove the "personal options" section from users page
 */
if ( ! function_exists( 'cor_remove_personal_options' ) ) {
    /**
     * Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
     */
    function cor_remove_personal_options( $subject ) {
        $subject = preg_replace( '#<h3>Personal Options</h3>.+?/table>#s', '', $subject, 1 );
        return $subject;
    }

    function cor_profile_subject_start() {
        ob_start( 'cor_remove_personal_options' );
    }

    function cor_profile_subject_end() {
        ob_end_flush();
    }
}

if (current_user_can('seller')) {
    add_action( 'admin_head', 'cor_profile_subject_start' );
    add_action( 'admin_footer', 'cor_profile_subject_end' );
}

add_action( 'current_screen', 'thisScreen' );
function thisScreen() {
    $currentScreen = get_current_screen();
    if( $currentScreen->id == "house" ) {
        add_action( 'admin_enqueue_scripts', 'enqueue_style_for_add_house' );
    }
}

function enqueue_style_for_add_house() {
    wp_enqueue_style( 'titanium-add-house', get_stylesheet_directory_uri() . '/assets/css/add-house.css' );
    wp_enqueue_script('titanium-add-house', get_stylesheet_directory_uri().'/assets/js/add-house.js', ['jquery']);
}


/**
 * Change post title before save
 * The format of title will be
 * HouseNumber + Street Name + Suburb + Postcode
 * eg: 9/30 Maroo St., Hughesdale, 3166
 */
add_filter( 'wp_insert_post_data' , 'modify_post_title' , '99', 2 );

function modify_post_title( $data , $postarr )
{
    if($data['post_type'] == 'house') {
        $house_number = isset($postarr['pods_meta_house_number']) ? $postarr['pods_meta_house_number'] : null;
        $street_name = isset($postarr['pods_meta_street_name']) ? $postarr['pods_meta_street_name'] :null;
        $post_code = isset($postarr['pods_meta_post_code']) ? $postarr['pods_meta_post_code'] : null;
        $suburb = isset($postarr['pods_meta_suburb']) ? $postarr['pods_meta_suburb'] : null;

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

        $data['post_title'] = $title;

    }
    return $data;
}


?>