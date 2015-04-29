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



/* Delete frontend post
============================================================================ */

require_once 'includes/bonvelo_delete-post.php';



/* Custom post types
============================================================================ */

require_once 'includes/bonvelo_post-type.php';



/* Taxonomies
============================================================================ */

require_once 'includes/bonvelo_taxonomies.php';

?>
