<?php

// Function for learning how to add options
// SQL Query: SELECT * FROM wp_options WHERE option_name = "site_pre_launch_option";
function site_pre_launch_options() {

  $options = [];
  $options['name']      = 'Marty';
  $options['location']  = 'Greensboro, NC';
  $options['sponsor']   = 'WDS';
  $options['nickname']  = 'McFly';

  if( !get_option( 'site_pre_launch_option' ) ) {
    add_option( 'site_pre_launch_option', $options );

  }

  update_option( 'site_pre_launch_option', $options );

  // delete_option( 'site_pre_launch_option' );

}

add_action( 'admin_init', 'site_pre_launch_options' );