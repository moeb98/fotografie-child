<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter( 'rest_authentication_errors', function( $result ) { 
  if ( ! empty($result) ) {
    return $result;
  }
  if ( ! is_user_logged_in() ) {
	return new WP_Error( '401', 'not allowed.', array('status' => 401) );
  }
  return $result;
});
