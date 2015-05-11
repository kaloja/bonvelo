<?php

/* Redirect admin after login
============================================================================ */

function bv_admin_login($redirect_to) {

  	if (is_admin()) {
    	return $redirect_to;
  	}

}

add_filter('login_redirect', 'bv_admin_login');



/* Redirect user after logout
============================================================================ */

add_action('wp_logout','go_home');

function go_home() {
	wp_redirect(home_url());
	exit();
}



/* Block user from backend
============================================================================ */

add_action('init', 'blockusers_init');

function blockusers_init() {

    if ( is_admin() && !current_user_can('level_10') ) {
        wp_redirect( home_url() );
        exit;
    }

}

?>
