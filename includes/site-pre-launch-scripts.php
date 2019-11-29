<?php

// Load JS on all admin pages

function wpplugin_admin_scripts() {

  wp_enqueue_script(
    'wpplugin-admin',
    WPPLUGIN_URL . 'admin/js/site-pre-launch-checklist-admin.js',
    ['jquery'],
    time()
  );

}
add_action('admin_enqueue_scripts', 'wpplugin_admin_scripts', 100);

