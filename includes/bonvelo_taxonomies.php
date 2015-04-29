<?php

/* Taxonomies
============================================================================ */

add_action('init', 'product_taxonomies', 0);

function product_taxonomies() {

	# Category
	$labels = array(
		'name' 								=> ('Kategori'),
		'singular_name'				=> ('Kategori'),
		'search_items' 				=> ('Sök kategorier'),
		'all_items' 					=> ('Alla kategorier'),
		'parent_item'					=> ('Förälderkategori'),
		'parent_item_colon'		=> ('Förälderkategori:'),
		'edit_item' 					=> ('Redigera kategori'),
		'update_item' 				=> ('Uppdatera kategori'),
		'add_new_item' 				=> ('Skapa ny kategori'),
		'new_item_name' 			=> ('Ny kategori'),
		'menu_name' 					=> ('Kategori')
	);

	$args = array(
		'labels' 							=> $labels,
		'public'							=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'           	=> true,
		'hierarchical' 				=> true,
		'query_var'         	=> true,
		'show_admin_column' 	=> true,
		'rewrite'           	=> array('slug' => 'kategori')
	);

	register_taxonomy('category', array('annons'), $args);

	# Brand
	$labels = array(
		'name' 								=> ('Varumärke'),
		'singular_name'				=> ('Varumärke'),
		'search_items' 				=> ('Sök varumärken'),
		'all_items' 					=> ('Alla varumärken'),
		'parent_item'					=> ('Föräldervarumärke'),
		'parent_item_colon'		=> ('Föräldervarumärke:'),
		'edit_item' 					=> ('Redigera varumärke'),
		'update_item' 				=> ('Uppdatera varumärke'),
		'add_new_item' 				=> ('Skapa ny varumärke'),
		'new_item_name' 			=> ('Nytt varumärke'),
		'menu_name' 					=> ('Varumärke')
	);

	$args = array(
		'labels' 							=> $labels,
		'public'							=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'           	=> true,
		'hierarchical' 				=> true,
		'query_var'         	=> true,
		'show_admin_column' 	=> true,
		'rewrite'           	=> array('slug' => 'brand')
	);

	register_taxonomy('brand', array('annons'), $args);

	# Type
	$labels = array(
		'name' 								=> ('Typ'),
		'singular_name'				=> ('Typ'),
		'search_items' 				=> ('Sök privatperson'),
		'all_items' 					=> ('Alla typ'),
		'parent_item'					=> ('Föräldertyp'),
		'parent_item_colon'		=> ('Föräldertyp:'),
		'edit_item' 					=> ('Redigera typ'),
		'update_item' 				=> ('Uppdatera typ'),
		'add_new_item' 				=> ('Skapa ny typ'),
		'new_item_name' 			=> ('Ny typ'),
		'menu_name' 					=> ('Typ')
	);

	$args = array(
		'labels' 							=> $labels,
		'public'							=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'           	=> true,
		'hierarchical' 				=> true,
		'query_var'         	=> true,
		'show_admin_column' 	=> true,
		'rewrite'           	=> array('slug' => 'type')
	);

	register_taxonomy('type', array('annons'), $args);

	# Region
	$labels = array(
		'name' 								=> ('Område'),
		'singular_name'				=> ('Område'),
		'search_items' 				=> ('Sök område'),
		'all_items' 					=> ('Alla områden'),
		'parent_item'					=> ('Förälderområde'),
		'parent_item_colon'		=> ('Förälderområde:'),
		'edit_item' 					=> ('Redigera område'),
		'update_item' 				=> ('Uppdatera område'),
		'add_new_item' 				=> ('Skapa nytt område'),
		'new_item_name' 			=> ('Nytt område'),
		'menu_name' 					=> ('Område')
	);

	$args = array(
		'labels' 							=> $labels,
		'public'							=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'           	=> true,
		'hierarchical' 				=> true,
		'query_var'         	=> true,
		'show_admin_column' 	=> true,
		'rewrite'           	=> array('slug' => 'region')
	);

	register_taxonomy('region', array('annons'), $args);

	# Size
	$labels = array(
		'name' 								=> ('Storlek'),
		'singular_name'				=> ('Storlek'),
		'search_items' 				=> ('Sök storlek'),
		'all_items' 					=> ('Alla storlekar'),
		'parent_item'					=> ('Förälderstorlek'),
		'parent_item_colon'		=> ('Förälderstorlek:'),
		'edit_item' 					=> ('Redigera storlek'),
		'update_item' 				=> ('Uppdatera storlek'),
		'add_new_item' 				=> ('Skapa ny storlek'),
		'new_item_name' 			=> ('Ny storlek'),
		'menu_name' 					=> ('Storlek')
	);

	$args = array(
		'labels' 							=> $labels,
		'public'							=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'           	=> true,
		'hierarchical' 				=> true,
		'query_var'         	=> true,
		'show_admin_column' 	=> true,
		'rewrite'           	=> array('slug' => 'size')
	);

	register_taxonomy('size', array('annons'), $args);

}

?>
