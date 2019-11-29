<?php

function site_pre_launch_settings() {

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'site_pre_launch_settings_section',
    // Section Title
    __( 'Prelaunch Checklist', 'site_pre_launch' ),
    // Callback for an optional description
    'site_pre_launch_settings_section_callback',
    // Admin page to add section to
    'site-pre-launch'
  );

}
add_action( 'admin_init', 'site_pre_launch_settings' );

function site_pre_launch_settings_section_callback() {

  esc_html_e( 'Plugin settings section description', 'site_pre_launch' );

}
