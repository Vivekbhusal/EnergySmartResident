<?php
/*  
 *Plugin Name: Login Page Designer 
 *Plugin URI: https://wordpress.org/plugins/login-page-designer/ 
 *Description: Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options. 
 *Version: 1.1 
 *Author: Chandrakesh Kumar    
 *Author URI:http://www.wpchandra.com/               
 *License: GPLv2        
 */        
     
define('wlpd_blog_name',get_bloginfo('name'));    
define('wlpd_site_url',get_site_url()); 
define('wlpd_plugin_url',plugins_url( '/', __FILE__ ));  

function wp_login_page_designer_menu(){
    add_menu_page('Login Designer', 'Login Designer', 'manage_options', 'login-page-designer', 'wlpd_login_designer_settings_page',plugins_url( 'images/menu_icon.png', __FILE__ ) );
    add_submenu_page('login-page-designer', 'Featured Plugins', 'Featured Plugins', 'manage_options', 'wp-login-page-designer-featured-plugins' ,'login_page_designer_featured_plugins');
	add_action( 'admin_init', 'wlpd_login_designer_settings' ); 
} 

function wlpd_login_designer_settings() { //register settings

	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_on_or_off');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_hide_lost_password');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_hide_logo');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_hide_back_to');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_hide_error_msg');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_desable_shake');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_change_login_redirect');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_set_remember_me');
    register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_background_color');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_background_image');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_link_color');
	register_setting( 'wlpd-diaplay-settings-group', 'wlpd_login_link_hover_color');
	register_setting( 'wlpd-logo-settings-group', 'wlpd_login_logo_title');
	register_setting( 'wlpd-logo-settings-group', 'wlpd_login_link' );
	register_setting( 'wlpd-logo-settings-group', 'wlpd_login_form_logo' );
	register_setting( 'wlpd-logo-settings-group', 'wlpd_login_form_logo_width' );
	register_setting( 'wlpd-logo-settings-group', 'wlpd_login_form_logo_height' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_bg' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_border_width' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_border_color' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_border_radius' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_hover_bg' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_hover_border_width' );
	register_setting( 'wlpd-form-button-group', 'wlpd_login_form_submit_hover_border_color' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_bg' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_border_width' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_border_color' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_border_radius' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_hover_bg' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_hover_border_width' );
	register_setting( 'wlpd-form-textbox-group', 'wlpd_login_form_textbox_hover_border_color' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_bg' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_border_size' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_border_color' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_border_radius' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_margin_top' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_label_size' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_label_color' );
	register_setting( 'wlpd-form-settings-group', 'wlpd_login_form_label_bold' );
}

function wlpd_login_designer_activate() { //add default setting values on activation
    add_option( 'wlpd_login_on_or_off', 1, '', 1 );
	add_option( 'wlpd_login_hide_logo', 0, '', 0 );
	add_option( 'wlpd_login_hide_error_msg', 0, '', 0 );
	add_option( 'wlpd_login_background_color', '#00aeef', '', '#00aeef' );
	add_option( 'wlpd_login_background_image', '', '', '' );
	add_option( 'wlpd_login_link_color', '#ffffff', '', '#ffffff' );
	add_option( 'wlpd_login_link_hover_color', '#5BD0FC', '', '#5BD0FC' );
	add_option( 'wlpd_login_form_margin_top', '6', '', '6');
	add_option( 'wlpd_login_logo_title', wlpd_blog_name, '', wlpd_blog_name  );
	add_option( 'wlpd_login_link', wlpd_site_url, '',  wlpd_site_url );
	add_option( 'wlpd_login_form_bg', '#00aeef', '', '#00aeef' );
	add_option( 'wlpd_login_hide_lost_password', 0, '', 0 );
	add_option( 'wlpd_login_hide_back_to', 0, '', 0 );
	add_option( 'wlpd_login_desable_shake', 0, '', 0 );
	add_option( 'wlpd_login_change_login_redirect', wlpd_site_url, '', wlpd_site_url );
	add_option( 'wlpd_login_set_remember_me', 1, '', 1 );
	add_option( 'wlpd_login_form_border_size', 2, '', 2 );
	add_option( 'wlpd_login_form_border_color', '#5BD0FC', '', '#5BD0FC');
	add_option( 'wlpd_login_form_border_radius', 10, '', 10 );
	add_option( 'wlpd_login_form_label_size', 14, '', 14 );
	add_option( 'wlpd_login_form_label_color', '#ffffff', '', '#ffffff' );
	add_option( 'wlpd_login_form_label_bold', 0, '', 0 );
	add_option( 'wlpd_login_form_logo', wlpd_plugin_url.'images/logo.png', '', wlpd_plugin_url.'images/logo.png' );
	add_option( 'wlpd_login_form_logo_width', 84, '', 84 );
	add_option( 'wlpd_login_form_logo_height', 84, '', 84 );
	add_option( 'wlpd_login_form_submit_bg', '#00aeef', '', '#00aeef' );
	add_option( 'wlpd_login_form_submit_border_width', 1, '', 1 );
	add_option( 'wlpd_login_form_submit_border_color', '#0080B0', '', '#0080B0' );
	add_option( 'wlpd_login_form_submit_hover_bg', '#029CD5', '', '#029CD5' );
	add_option( 'wlpd_login_form_submit_hover_border_width', 1, '', 1 );
	add_option( 'wlpd_login_form_submit_hover_border_color', '#5F5F5F', '', '#5F5F5F' );
	add_option( 'wlpd_login_form_textbox_bg', '#00aeef', '', '#00aeef' );
	add_option( 'wlpd_login_form_textbox_border_width', 1, '', 1 );
	add_option( 'wlpd_login_form_textbox_border_color', '#5BD0FC', '', '#5BD0FC' );
	add_option( 'wlpd_login_form_textbox_hover_bg', '#029CD5', '', '#029CD5' );
	add_option( 'wlpd_login_form_textbox_hover_border_width', 1, '', 1 );
	add_option( 'wlpd_login_form_textbox_hover_border_color', '#5F5F5F', '', '#5F5F5F' );
	add_option( 'wlpd_login_form_submit_border_radius', 3, '', 3 );
	add_option( 'wlpd_login_form_textbox_border_radius', 3, '', 3 );
}
function wlpd_login_designer_deactivate() { //delete setting and values on deactivation
    delete_option( 'wlpd_login_on_or_off');
	delete_option( 'wlpd_login_hide_logo');
	delete_option( 'wlpd_login_hide_error_msg');
    delete_option( 'wlpd_login_background_color');
	delete_option( 'wlpd_login_background_image');
	delete_option( 'wlpd_login_link_color');
	delete_option( 'wlpd_login_link_hover_color');
	delete_option( 'wlpd_login_form_margin_top');
	delete_option( 'wlpd_login_logo_title');
	delete_option( 'wlpd_login_link');
	delete_option( 'wlpd_login_form_bg');
    delete_option( 'wlpd_login_hide_lost_password');
	delete_option( 'wlpd_login_hide_back_to');
	delete_option( 'wlpd_login_desable_shake');
	delete_option( 'wlpd_login_change_login_redirect');
	delete_option( 'wlpd_login_set_remember_me');
	delete_option( 'wlpd_login_form_border_size');
	delete_option( 'wlpd_login_form_border_color');
	delete_option( 'wlpd_login_form_border_radius');
	delete_option( 'wlpd_login_form_label_size');
	delete_option( 'wlpd_login_form_label_color');
	delete_option( 'wlpd_login_form_label_bold');
	delete_option( 'wlpd_login_form_logo');
	delete_option( 'wlpd_login_form_logo_width');
	delete_option( 'wlpd_login_form_logo_height');
	delete_option( 'wlpd_login_form_submit_bg');
	delete_option( 'wlpd_login_form_submit_border_width');
	delete_option( 'wlpd_login_form_submit_border_color');
	delete_option( 'wlpd_login_form_submit_hover_bg');
	delete_option( 'wlpd_login_form_submit_hover_border_width');
	delete_option( 'wlpd_login_form_submit_hover_border_color');
	delete_option( 'wlpd_login_form_textbox_bg');
	delete_option( 'wlpd_login_form_textbox_border_width');
	delete_option( 'wlpd_login_form_textbox_border_color');
	delete_option( 'wlpd_login_form_textbox_hover_bg');
	delete_option( 'wlpd_login_form_textbox_hover_border_width');
	delete_option( 'wlpd_login_form_textbox_hover_border_color');
	delete_option( 'wlpd_login_form_submit_border_radius');
	delete_option( 'wlpd_login_form_textbox_border_radius');
}
 /* Add scripts to head */
function wlpd_login_designer_scripts() { 
	wp_enqueue_script('jquery');
    wp_enqueue_script( array('jquery') );
}
function wlpd_add_color_picker( $hook_suffix ) { //add colorpicker to options page
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	if($_GET['page']=='login-page-designer' AND is_admin())
	wp_enqueue_script( 'wp-color-picker-scripts', plugins_url( 'js/scripts.js', __FILE__ ), array( 'jquery', 'wp-color-picker','media-upload','thickbox' ), false, true );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style('thickbox');
}

if (get_option('wlpd_login_on_or_off')==1) {
	
	function wlpd_add_dynamic_style() {
		echo '<link rel="stylesheet" type="text/css" href="' . plugins_url( 'inc/dynamic-style.php', __FILE__ ) . '" />';
	}

	add_action('login_head', 'wlpd_add_dynamic_style');
	include('inc/add-options.php');
}
include('inc/featured_plugins.php');
register_activation_hook( __FILE__, 'wlpd_login_designer_activate' ); //register activation hook
register_deactivation_hook( __FILE__, 'wlpd_login_designer_deactivate' ); //register deactivation hook 
add_action('admin_menu', 'wp_login_page_designer_menu'); //add settings admin menu
add_action('wp_enqueue_scripts', 'wlpd_login_designer_scripts'); //add wpchandra custom scrollbar scripts 
add_action( 'admin_enqueue_scripts', 'wlpd_add_color_picker' );//add color picker js to admin


 function wlpd_login_designer_settings_page(){
	 
 ?>

<style type="text/css">
.form-table td.frm_wp_heading{
	padding:0px;
}
</style>
<div class='wrap'> 
	<h1><?php _e('Login Page Designer Options'); ?><a style="text-decoration:none;" href="http://www.wpchandra.com/" target="_blank"><span style="color: rgba(10, 154, 62, 1);"> (Upgrade to Pro Version)</span></a></h1>
	<p class="description"><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options. <a href="https://profiles.wordpress.org/chandrakeshkumar" target="_blank"> click here for more plugins</a> .'); ?></p>
	<?php include('inc/social-media.php'); ?>
	<?php
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'display_settings';
	if(isset($_GET['tab'])) $active_tab = $_GET['tab'];
	?>
	<h2 class="nav-tab-wrapper">
		<a href="?page=login-page-designer&amp;tab=display_settings" class="nav-tab <?php echo $active_tab == 'display_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Display Settings', 'wpchandra'); ?></a>
		<a href="?page=login-page-designer&amp;tab=logo_settings" class="nav-tab <?php echo $active_tab == 'logo_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Logo Settings', 'wpchandra'); ?></a>
		<a href="?page=login-page-designer&amp;tab=form_settings" class="nav-tab <?php echo $active_tab == 'form_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Form Settings', 'wpchandra'); ?></a>
		<a href="?page=login-page-designer&amp;tab=button_settings" class="nav-tab <?php echo $active_tab == 'button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Button Settings', 'wpchandra'); ?></a>
		<a href="?page=login-page-designer&amp;tab=textbox_settings" class="nav-tab <?php echo $active_tab == 'textbox_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Textbox Settings', 'wpchandra'); ?></a>
	</h2>
	
		
		<?php if($active_tab == 'display_settings') { ?>
		
		 <form method="post" action="options.php">
     	<?php settings_errors(); ?>
		<?php settings_fields('wlpd-diaplay-settings-group'); ?>
		<?php do_settings_sections('wlpd-diaplay-settings-group'); ?>
		
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">
			<h3><?php _e('Display Settings', 'login-page-designer'); ?></h3>
			<div class="inside">
				<p><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options.', 'login-page-designer'); ?></p>
				
			<table class="form-table">
				<tr>
					<th scope="row"><label for="wlpd_login_on_or_off"><?php _e('On/Off plugin');?></label></th>
					<td valign="top"><input name="wlpd_login_on_or_off" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_on_or_off') ); ?>  />
						<p class="description"><?php _e('Turn on or Turn off plugin'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_hide_logo"><?php _e('Hide Logo');?></label></th>
					<td valign="top"><input name="wlpd_login_hide_logo" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_hide_logo') ); ?>  />
						<p class="description"><?php _e('Check to hide logo'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_hide_lost_password"><?php _e('Hide Lost Password Link');?></label></th>
					<td valign="top"><input name="wlpd_login_hide_lost_password" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_hide_lost_password') ); ?>  />
						<p class="description"><?php _e('Check to remove the lost password link'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_hide_back_to"><?php _e('Hide Back to Link');?></label></th>
					<td valign="top"><input name="wlpd_login_hide_back_to" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_hide_back_to') ); ?>  />
						<p class="description"><?php _e('Check to remove the back to link'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_hide_error_msg"><?php _e('Hide Error Message');?></label></th>
					<td valign="top"><input name="wlpd_login_hide_error_msg" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_hide_error_msg') ); ?>  />
						<p class="description"><?php _e('Check to hide login form error message'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_desable_shake"><?php _e('Disable Shake Effect ');?></label></th>
					<td valign="top"><input name="wlpd_login_desable_shake" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_desable_shake') ); ?>  />
						<p class="description"><?php _e('Enable or Disable form shake effect '); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_set_remember_me"><?php _e('Remember Me ');?></label></th>
					<td valign="top"><input name="wlpd_login_set_remember_me" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_set_remember_me') ); ?>  />
						<p class="description"><?php _e('The “Remember Me” checkbox is unchecked by default. '); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_change_login_redirect"><?php _e('Change Logo Redirect'); ?></label></th>
					<td>
						<input type="text" name="wlpd_login_change_login_redirect" class="regular-text"  id="wlpd_login_change_login_redirect" value="<?php echo get_option('wlpd_login_change_login_redirect'); ?>" />
						<p class="description"><?php _e('When you login to WordPress you’re immediately taken to the dashboard. You can easily change this to redirect users to your homepage instead.'); ?></p>
					</td>
				</tr>
				
				<tr valign="top">
					  <th scope="row"><label for="wlpd_login_background_image"><?php _e('Background Image'); ?></label></th>
					  <td>
						  <input id="wlpd_login_background_image" type="text" name="wlpd_login_background_image" value="<?php echo get_option('wlpd_login_background_image') ?>" size="50" />
		                  <input class="onetarek-upload-button button" type="button" id="upload_background_image_button" value="Upload Image" />
					      <p class='description'><?php _e('Upload or Select background image') ;?></p>
					 </td>
				 </tr>
				
		       <tr>
					<th scope="row"><label for="wlpd_login_background_color"><?php _e('Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_background_color"  id="wlpd_login_background_color" value="<?php echo stripslashes(get_option('wlpd_login_background_color')); ?>"  />
						<p class="description"><?php _e('Change your body background color. Default color is #00aeef'); ?></p>
					</td>
				</tr>
				
				 <tr>
					<th scope="row"><label for="wlpd_login_link_color"><?php _e('Link Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_link_color"  id="wlpd_login_link_color" value="<?php echo stripslashes(get_option('wlpd_login_link_color')); ?>"  />
						<p class="description"><?php _e('Change lost your password or back to color. Default color is #ffffff'); ?></p>
					</td>
				</tr>
				
				 <tr>
					<th scope="row"><label for="wlpd_login_link_hover_color"><?php _e('Link Hover Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_link_hover_color"  id="wlpd_login_link_hover_color" value="<?php echo stripslashes(get_option('wlpd_login_link_hover_color')); ?>"  />
						<p class="description"><?php _e('Change lost your password or back to hover color. Default color is #5BD0FC'); ?></p>
					</td>
				</tr>
				
				<tr valign="top" align="left">
					<td class="frm_wp_heading"><?php submit_button(); ?></td>
				</tr>
				
				</table>
				
			</div>
			</div>
		</div>
		</form>
		<?php } ?>
		
		
		
		<?php if($active_tab == 'logo_settings') { ?>
		
		 <form method="post" action="options.php">
     	<?php settings_errors(); ?>
		<?php settings_fields('wlpd-logo-settings-group'); ?>
		<?php do_settings_sections('wlpd-logo-settings-group'); ?>
		
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">
			<h3><?php _e('Logo Settings', 'login-page-designer'); ?></h3>
			<div class="inside">
				<p><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options.', 'login-page-designer'); ?></p>
				
			<table class="form-table">
			
				<tr valign="top">
					  <th scope="row"><label for="wlpd_login_form_logo"><?php _e('Logo Image'); ?></label></th>
					  <td>
						  <input id="wlpd_login_form_logo" type="text" name="wlpd_login_form_logo" value="<?php echo get_option('wlpd_login_form_logo') ?>" size="50" />
		                  <input class="onetarek-upload-button button" type="button" id="upload_image_button" value="Upload Image" />
						  <p class='description'><?php _e('Upload or Select Logo Image') ;?></p>
					 </td>
				 </tr>
				 
				<tr>
					<th scope="row"><label for="wlpd_login_form_logo_width"><?php _e('Logo Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_logo_width" type="number" step="0" max="900" id="wlpd_login_form_logo_width" value="<?php echo get_option('wlpd_login_form_logo_width'); ?>" class="small-text"> px
					<p class="description"><?php _e('Set login form logo width'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_logo_height"><?php _e('Logo Height'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_logo_height" type="number" step="0" max="500" id="wlpd_login_form_logo_height" value="<?php echo get_option('wlpd_login_form_logo_height'); ?>" class="small-text"> px
					<p class="description"><?php _e('Set login form logo height'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_logo_title"><?php _e('Logo Title'); ?></label></th>
					<td>
						<input type="text" name="wlpd_login_logo_title" class="regular-text"  id="wlpd_login_logo_title" value="<?php echo get_option('wlpd_login_logo_title'); ?>" />
						<p class="description"><?php _e('Enter login form logo title.'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_link"><?php _e('Logo Link'); ?></label></th>
					<td>
						<input type="text" name="wlpd_login_link" class="regular-text"  id="wlpd_login_link" value="<?php echo get_option('wlpd_login_link'); ?>" />
						<p class="description"><?php _e('Enter login form logo link.'); ?></p>
					</td>
				</tr>
				
				<tr valign="top" align="left">
					<td class="frm_wp_heading"><?php submit_button(); ?></td>
				</tr>
		
			</table>
				
			</div>
			</div>
		</div>
		</form>
		<?php } ?>
		
		
		<?php if($active_tab == 'form_settings') { ?>
		
		 <form method="post" action="options.php">
     	<?php settings_errors(); ?>
		<?php settings_fields('wlpd-form-settings-group'); ?>
		<?php do_settings_sections('wlpd-form-settings-group'); ?>
		
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">
			<h3><?php _e('Form Settings', 'login-page-designer'); ?></h3>
			<div class="inside">
				<p><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options.', 'login-page-designer'); ?></p>
				
			<table class="form-table">
			
				<tr>
					<th scope="row"><label for="wlpd_login_form_margin_top"><?php _e('Margin Top'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_margin_top" type="number" step="0" max="500" id="wlpd_login_form_margin_top" value="<?php echo get_option('wlpd_login_form_margin_top'); ?>" class="small-text"> %
					<p class="description"><?php _e('Set login form margin from top'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_label_size"><?php _e('Label Font Size'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_label_size" type="number" step="0" max="30" id="wlpd_login_form_label_size" value="<?php echo get_option('wlpd_login_form_label_size'); ?>" class="small-text"> px
					<p class="description"><?php _e('Set login form label font size'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_label_color"><?php _e('Label Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_label_color"  id="wlpd_login_form_label_color" value="<?php echo stripslashes(get_option('wlpd_login_form_label_color')); ?>"  />
						<p class="description"><?php _e('Change login form label color. Default color is #ffffff'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_label_bold"><?php _e('Label Bold ');?></label></th>
					<td valign="top"><input name="wlpd_login_form_label_bold" type="checkbox" value= '1' <?php checked( 1,  get_option('wlpd_login_form_label_bold') ); ?>  />
						<p class="description"><?php _e('Enable or Disable form label bold'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_bg"><?php _e('Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_bg"  id="wlpd_login_form_bg" value="<?php echo stripslashes(get_option('wlpd_login_form_bg')); ?>"  />
						<p class="description"><?php _e('Change login form background color. Default color is #00aeef'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_border_size"><?php _e('Border Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_border_size" type="number" step="0" max="50" id="wlpd_login_form_border_size" value="<?php echo get_option('wlpd_login_form_border_size'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form border width. Default border width is 2px'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_border_color"><?php _e('Border Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_border_color"  id="wlpd_login_form_border_color" value="<?php echo stripslashes(get_option('wlpd_login_form_border_color')); ?>"  />
						<p class="description"><?php _e('Change login form background color. Default color is #5BD0FC'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_border_radius"><?php _e('Border Radius'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_border_radius" type="number" step="0" max="50" id="wlpd_login_form_border_radius" value="<?php echo get_option('wlpd_login_form_border_radius'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form border radius. Default border radius is 10px'); ?></p>
				</td>
				</tr>
				
				<tr valign="top" align="left">
					<td class="frm_wp_heading"><?php submit_button(); ?></td>
				</tr>
		
			</table>
				
			</div>
			</div>
		</div>
		</form>
		<?php } ?>
		
		<?php if($active_tab == 'button_settings') { ?>
		
		 <form method="post" action="options.php">
     	<?php settings_errors(); ?>
		<?php settings_fields('wlpd-form-button-group'); ?>
		<?php do_settings_sections('wlpd-form-button-group'); ?>
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">
			<h3><?php _e('Button Settings', 'login-page-designer'); ?></h3>
			<div class="inside">
				<p><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options.', 'login-page-designer'); ?></p>
				
			<table class="form-table">
		
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_bg"><?php _e('Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_submit_bg"  id="wlpd_login_form_submit_bg" value="<?php echo stripslashes(get_option('wlpd_login_form_submit_bg')); ?>"  />
						<p class="description"><?php _e('Change login form submit button background color. Default color is #00aeef'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_border_width"><?php _e('Border Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_submit_border_width" type="number" step="0" max="50" id="wlpd_login_form_submit_border_width" value="<?php echo get_option('wlpd_login_form_submit_border_width'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form submit button border width. Default border radius is 1px'); ?></p>
				</td>
				</tr>	
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_border_color"><?php _e('Border Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_submit_border_color"  id="wlpd_login_form_submit_border_color" value="<?php echo stripslashes(get_option('wlpd_login_form_submit_border_color')); ?>"  />
						<p class="description"><?php _e('Change login form submit button border color. Default color is #5BD0FC'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_border_radius"><?php _e('Border Radius'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_submit_border_radius" type="number" step="0" max="50" id="wlpd_login_form_submit_border_radius" value="<?php echo get_option('wlpd_login_form_submit_border_radius'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form submit button border radius. Default border radius is 10px'); ?></p>
				</td>
				</tr>
				
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_hover_bg"><?php _e('Hover Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_submit_hover_bg"  id="wlpd_login_form_submit_hover_bg" value="<?php echo stripslashes(get_option('wlpd_login_form_submit_hover_bg')); ?>"  />
						<p class="description"><?php _e('Change login form submit button hover background color. Default color is #029CD5'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_hover_border_width"><?php _e('Hover Border Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_submit_hover_border_width" type="number" step="0" max="50" id="wlpd_login_form_submit_hover_border_width" value="<?php echo get_option('wlpd_login_form_submit_hover_border_width'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form submit button hover border width. Default border radius is 1px'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_submit_hover_border_color"><?php _e('Hover Border Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_submit_hover_border_color"  id="wlpd_login_form_submit_hover_border_color" value="<?php echo stripslashes(get_option('wlpd_login_form_submit_hover_border_color')); ?>"  />
						<p class="description"><?php _e('Change login form submit button hover border color. Default color is #0080B0'); ?></p>
					</td>
				</tr>
				
				<tr valign="top" align="left">
					<td class="frm_wp_heading"><?php submit_button(); ?></td>
				</tr>
				
			</table>
				
			</div>
			</div>
		</div>
		</form>
		<?php } ?>
		
		<?php if($active_tab == 'textbox_settings') { ?>
		
		 <form method="post" action="options.php">
     	<?php settings_errors(); ?>
		<?php settings_fields('wlpd-form-textbox-group'); ?>
		<?php do_settings_sections('wlpd-form-textbox-group'); ?>
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">
			<h3><?php _e('Textbox Settings', 'login-page-designer'); ?></h3>
			<div class="inside">
				<p><?php _e('Login page designer provides you to easy way to customize the appearance of the wordPress login page with many options.', 'login-page-designer'); ?></p>
				
			<table class="form-table">
		
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_bg"><?php _e('Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_textbox_bg"  id="wlpd_login_form_textbox_bg" value="<?php echo stripslashes(get_option('wlpd_login_form_textbox_bg')); ?>"  />
						<p class="description"><?php _e('Change login form textbox background color. Default color is #00aeef'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_border_width"><?php _e('Border Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_textbox_border_width" type="number" step="0" max="50" id="wlpd_login_form_textbox_border_width" value="<?php echo get_option('wlpd_login_form_textbox_border_width'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form textbox border width. Default border radius is 1px'); ?></p>
				</td>
				</tr>	
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_border_color"><?php _e('Border Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_textbox_border_color"  id="wlpd_login_form_textbox_border_color" value="<?php echo stripslashes(get_option('wlpd_login_form_textbox_border_color')); ?>"  />
						<p class="description"><?php _e('Change login form textbox border color. Default color is #5BD0FC'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_border_radius"><?php _e('Border Radius'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_textbox_border_radius" type="number" step="0" max="50" id="wlpd_login_form_textbox_border_radius" value="<?php echo get_option('wlpd_login_form_textbox_border_radius'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form textbox border radius. Default border radius is 10px'); ?></p>
				</td>
				</tr>
				
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_hover_bg"><?php _e('Hover Background Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_textbox_hover_bg"  id="wlpd_login_form_textbox_hover_bg" value="<?php echo stripslashes(get_option('wlpd_login_form_textbox_hover_bg')); ?>"  />
						<p class="description"><?php _e('Change login form textbox hover background color. Default color is #029CD5'); ?></p>
					</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_hover_border_width"><?php _e('Hover Border Width'); ?></label></th>
				<td valign="top">
					<input name="wlpd_login_form_textbox_hover_border_width" type="number" step="0" max="50" id="wlpd_login_form_textbox_hover_border_width" value="<?php echo get_option('wlpd_login_form_textbox_hover_border_width'); ?>" class="small-text"> px
					<p class="description"><?php _e('Change login form textbox hover border width. Default border radius is 1px'); ?></p>
				</td>
				</tr>
				
				<tr>
					<th scope="row"><label for="wlpd_login_form_textbox_hover_border_color"><?php _e('Hover Border Color'); ?></label></th>
					<td valign="top">
						<input type="text" name="wlpd_login_form_textbox_hover_border_color"  id="wlpd_login_form_textbox_hover_border_color" value="<?php echo stripslashes(get_option('wlpd_login_form_textbox_hover_border_color')); ?>"  />
						<p class="description"><?php _e('Change login form  textbox hover border color. Default color is #0080B0'); ?></p>
					</td>
				</tr>
				
				<tr valign="top" align="left">
					<td class="frm_wp_heading"><?php submit_button(); ?></td>
				</tr>
		
			</table>
				
			</div>
			</div>
		</div>
		</form>
		<?php } ?>

	
	
	</div>

<?php

 }
