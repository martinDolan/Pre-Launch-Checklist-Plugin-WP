<?php
/**
 * Plugin Name:       Site Pre Launch Plugin
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Pre Launch checklist for developers and project managers.
 * Version:           1.0.0
 * Author:            Marty O'Connor
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 // If this file is called directly, abort.

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'WPPLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/site-pre-launch-styles.php');

// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/site-pre-launch-scripts.php');

// Create Plugin Options
include( plugin_dir_path( __FILE__ ) . 'includes/site-pre-launch-options.php');

// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/site-pre-launch-settings-fields.php');

function site_pre_launch_settings_page()
{
		add_menu_page(
				'Site Pre Launch Plugin',
				'Site Prelaunch',
				'manage_options',
				'site-pre-launch',
				'pre_launch_checklist_settings_page_markup',
				'dashicons-yes-alt',
				100
		);

}
add_action( 'admin_menu', 'site_pre_launch_settings_page' );


function pre_launch_checklist_settings_page_markup() {
	// Double check user capabilities
	if ( !current_user_can('manage_options') ) {
			return;
	}
	include( WPPLUGIN_DIR . 'admin/settings-page.php');
}

// Add a link to your settings page in your plugin
function site_pre_launch_add_settings_link( $links ) {
		$settings_link = '<a href="admin.php?page=site-pre-launch">' . __( 'Settings', 'site-pre-launch' ) . '</a>';
		array_push( $links, $settings_link );
		return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'site_pre_launch_add_settings_link' );

?>