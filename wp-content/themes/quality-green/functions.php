<?php
update_option('siteurl','http://104.236.107.128');
update_option('home','http://104.236.107.128');

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

?>