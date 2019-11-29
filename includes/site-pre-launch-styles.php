<?php

// Load CSS on all admin pages
function wpplugin_admin_styles() {

  wp_enqueue_style(
    'wpplugin-admin',
    WPPLUGIN_URL . 'admin/css/site-pre-launch-checklist-admin.css',
    [],
    time()
  );

}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );