<?php
/**
 *  Titanium Community Information Display
 *
 * @package   titanium_community
 * @author    Vivek Bhusal <vivekbhusal@gmail.com>
 * @license   TBA
 *
 * @wordpress-plugin
 * Plugin Name:       Titanium Community
 * Plugin URI:
 * Description:       This plugin captures the user requests and checks for community information
 * Version:           1.0.0
 * Author:            Vivek Bhusal
 * Author URI:
 * Text Domain:
 * License:           TBA
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:
 * GitHub Plugin URI:
 */

// If this file is called directly, abort.
//
if (!defined('WPINC')) {
    die;
}
require_once plugin_dir_path(__FILE__) . 'public/class-titanium-community.php';
add_action('plugins_loaded', array('titanium\TitaniumCommunityClass', 'getInstance'));

if(is_admin())
{
    require_once plugin_dir_path(__FILE__) . 'admin/class-titanium-community-admin.php';
    add_action('plugins_loaded', array('titanium\TitaniumCommunityClassAdmin', 'getInstance'));

}