<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'gardenia_setup' ) ) :
function gardenia_setup() {
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'gardenia' ),	
		 'footer' => __( 'Footer Menu', 'gardenia' )	
	) );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;
			/*
		 * Make gardenia theme available for translation.
		 */

	load_theme_textdomain( 'gardenia', get_template_directory() . '/languages' );
		
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');
	add_theme_support( 'title-tag' );
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(672, 372, true);
	add_image_size('gardenia-full-width', 1110, 576, true);
	add_image_size('gardenia-frontpage-size', 350, 210, true);	
	add_image_size('gardenia-sidebar-image-size', 785, 490, true);	
	add_image_size('gardenia-custom-widget-size', 70, 70, true);
	add_image_size('gardenia-home-tab-size', 150,150, true);
	/*        
	* Switch default core markup for search form, comment form, and comments        
	* to output valid HTML5.        
	*/
	add_theme_support('html5', array(
	   'search-form', 'comment-form', 'comment-list',
	));
	// Add support for featured content.
	add_theme_support('featured-content', array(
	   'featured_content_filter' => 'gardenia_get_featured_posts',
	   'max_posts' => 6,
	));
	
	add_theme_support( 'custom-header', apply_filters( 'gardenia_custom_header_args', array(
	'uploads'       => true,
	'flex-height'   => true,
	'default-text-color' => '#000',
	'header-text' => true,
	'height' => '120',
	'width'  => '1260'
 	) ) );
	add_theme_support( 'custom-background', apply_filters( 'gardenia_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	 add_theme_support( 'title-tag' );
	// This theme uses its own gallery styles.       
	add_filter('use_default_gallery_style', '__return_false'); 
	add_editor_style('css/editor-style.css');	
}

endif; // gardenia_setup
add_action( 'after_setup_theme', 'gardenia_setup' );

/***  excerpt Length ***/ 
function gardenia_change_excerpt_more( $more ) {
	global $post;
    return (is_page_template('page-templates/front-page.php')) ? '' : '<p>
                <span class="glyphicon glyphicon-arrow-right"><a title="'. __('Continue reading','gardenia').'" href="'. esc_url(get_permalink($post->ID)) . '">' .  __('Continue reading','gardenia'). '</a></span></p>';          
}
add_filter('excerpt_more', 'gardenia_change_excerpt_more');

function gardenia_excerpt_length( $length ) {
    return (!is_page_template('page-templates/front-page.php')) ? 30 : 15;
}
add_filter( 'excerpt_length', 'gardenia_excerpt_length', 999 );

// retrieves the attachment ID from the file URL
function gardenia_get_image_id($image_url) {
	global $wpdb;
	$gardenia_attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $gardenia_attachment[0]; 
}

/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';

/*** Theme Default Setup ***/
require get_template_directory() . '/functions/theme-default-setup.php';

/*** Breadcrumbs ***/
require get_template_directory() . '/functions/breadcrumbs.php';

/*** Theme Option ***/
require get_template_directory() . '/theme-options/theme-options.php';

/*** Custom Widgets ***/
require get_template_directory() . '/functions/custom-widgets.php';

/*** Custom Header ***/
require get_template_directory() . '/functions/custom-header.php';
