<?php

/* This theme uses wp_nav_menu()
============================================================================ */

// register_nav_menus( array(
//   'site-nav' => __( 'Huvudmeny', 'bonvelo' ),
// ) );



/* Remove admin bar
============================================================================ */

require_once 'includes/bonvelo_remove-adminbar.php';



/* Redirect after login
============================================================================ */

require_once 'includes/bonvelo_login-redirect.php';



/* Create frontend post
============================================================================ */

require_once 'includes/bonvelo_create-post.php';



/* Update frontend post
============================================================================ */

require_once 'includes/bonvelo_update-post.php';



/* Change post status
============================================================================ */

require_once 'includes/bonvelo_delete-post.php';
require_once 'includes/bonvelo_draft-post.php';
require_once 'includes/bonvelo_publish-post.php';



/* Update user email
============================================================================ */

require_once 'includes/bonvelo_update-email.php';



/* Custom post types
============================================================================ */

require_once 'includes/bonvelo_post-type.php';



/* Taxonomies
============================================================================ */

require_once 'includes/bonvelo_taxonomies.php';



/* Excerpt
============================================================================ */

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function get_excerpt() {
    $permalink = get_permalink(get_the_ID());
    $excerpt = get_the_content();

    if ($excerpt > substr($excerpt, 0, 140)) {
    	$excerpt = substr($excerpt, 0, 140);
    	$excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    	$excerpt = strip_shortcodes($excerpt);
    	$excerpt = strip_tags($excerpt);
    	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    	$excerpt = $excerpt.'<a href="'.$permalink.'" class="c-intro__more">...</a>';
    }
    
    return $excerpt;
}



// function ajax_login_init(){

//     wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js' ); // , array('jquery')
//     wp_enqueue_script('ajax-login-script');

//     wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
//         'ajaxurl' => admin_url( 'admin-ajax.php' ),
//         'redirecturl' => home_url(),
//         'loadingmessage' => __('Sending user info, please wait...')
//     ));

//     // Enable the user with no privileges to run ajax_login() in AJAX
//     add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
// }

// // Execute the action only if the user isn't logged in
// if (!is_user_logged_in()) {
//     add_action('init', 'ajax_login_init');
// }


// function ajax_login(){

//     // First check the nonce, if it fails the function will break
//     check_ajax_referer( 'ajax-login-nonce', 'security' );

//     // Nonce is checked, get the POST data and sign user on
//     $info = array();
//     $info['user_login'] = $_POST['username'];
//     $info['user_password'] = $_POST['password'];
//     $info['remember'] = true;

//     $user_signon = wp_signon( $info, false );
//     if ( is_wp_error($user_signon) ){
//         echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
//     } else {
//         echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
//     }

//     die();
// }









?>
