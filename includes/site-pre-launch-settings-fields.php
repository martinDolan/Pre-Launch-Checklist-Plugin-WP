<?php

function site_pre_launch_settings() {

		// If plugin settings don't exist, then create them.
	if( ! get_option( 'site_pre_launch_settings' ) ) {
			add_option( 'site_pre_launch_settings' );
	}

	// Define (at least) one section for our fields.
	add_settings_section(

		// Unique identifier for the section.
		'site_pre_launch_settings_section',

		// Section Title.
		__( 'Prelaunch Checklist', 'site_pre_launch' ),

		// Callback for an optional description.
		'site_pre_launch_settings_section_callback',

		// Admin page to add section to.
		'site-pre-launch'
	);

	add_settings_field(
		// Unique identifier for field
		'wpplugin_settings_custom_text',

		// Field Title
		__( 'Item 1.', 'site-pre-launch'),

		// Callback for field markup
		'wpplugin_settings_custom_text_callback',

		// Page to go on
		'site-pre-launch',

		// Section to go in
		'site_pre_launch_settings_section'
	);

	register_setting(
		'site-pre-launch',
		'site_pre_launch_settings'
	);

}
add_action( 'admin_init', 'site_pre_launch_settings' );

function site_pre_launch_settings_section_callback() {

	esc_html_e( 'A plugin for site pre-launch', 'site_pre_launch' );

}

function wpplugin_settings_custom_text_callback() {

  $options = get_option( 'site_pre_launch_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<input type="text" id="site_pre_launch_settings_customtext" name="site_pre_launch_settings[custom_text]" value="' . $custom_text . '" />';

}
