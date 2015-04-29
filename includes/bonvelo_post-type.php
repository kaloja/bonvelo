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

?>
