<?php

/* Custom post type - Annonser
============================================================================ */

function custom_post_annons() {
  $labels = array(
    'name'                => ('Annonser'),
    'singular_name'       => ('Annons'),
    'add_new'             => ('Skapa ny annons'),
    'add_new_item'        => ('Skapa ny annons'),
    'edit_item'           => ('Redigera annons'),
    'new_item'            => ('Ny annons'),
    'all_items'           => ('Alla annonser'),
    'view_item'           => ('Visa annons'),
    'search_items'        => ('Sök annons'),
    'not_found'           => ('Ingen annons hittades'),
    'not_found_in_trash'  => ('Ingen annons hittades i papperskorgen'),
    'parent_item_colon'   => '',
    'menu_name'           => 'Annons'
  );
  $args = array(
    'labels'              => $labels,
    'description'         => 'Annons',
    'public'              => true,
    'menu_position'       => 5,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author'),
    'has_archive'         => true,
  );
  register_post_type('annons', $args);
}
add_action('init', 'custom_post_annons');



/* Custom post type - User
============================================================================ */

function custom_post_konto() {
  $labels = array(
    'name'                => ('Konto'),
    'singular_name'       => ('Konto'),
    'add_new'             => ('Skapa nytt konto'),
    'add_new_item'        => ('Skapa nytt konto'),
    'edit_item'           => ('Redigera konto'),
    'new_item'            => ('Nytt konto'),
    'all_items'           => ('Alla konton'),
    'view_item'           => ('Visa konto'),
    'search_items'        => ('Sök konto'),
    'not_found'           => ('Inget konto hittades'),
    'not_found_in_trash'  => ('Inget konto hittades i papperskorgen'),
    'parent_item_colon'   => '',
    'menu_name'           => 'Konto'
  );
  $args = array(
    'labels'              => $labels,
    'description'         => 'Konto',
    'public'              => true,
    'menu_position'       => 6,
    'supports'            => array( 'title' ),
    'has_archive'         => true,
  );
  register_post_type('konto', $args);
}
add_action('init', 'custom_post_konto');

?>
