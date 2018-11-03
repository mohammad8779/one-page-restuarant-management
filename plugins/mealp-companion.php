<?php 
/*
Plugin Name: Meal Practice Companion
Plugin URI: 
Version: 0.1.0
Author: Locus
Text Domain: mealp-companion
Domain Path: /languages
*/
function mealpc_load_text_domain(){

    load_plugin_textdomain( 'mealp-companion', false, dirname(__FILE__).'/languages' );

};
add_action('plugins_loaded','mealpc_load_text_domain');


//custom posts
function mealpc_register_my_cpts() {

	

	/**
	 * Post Type: sections.
	 */

	$labels = array(
		"name" => __( "Section", "mealpractice" ),
		"singular_name" => __( "Section", "mealpractice" ),
		"menu_name" => __( "Section", "mealpractice" ),
		"all_items" => __( "All Sections", "mealpractice" ),
		"add_new" => __( "Add New Section", "mealpractice" ),
	);

	$args = array(
		"label" => __( "Section", "mealpractice" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "section", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-media-document",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "section", $args );

	/**
	 * Post Type: recipes.
	 */

	$labels = array(
		"name" => __( "recipes", "mealpractice" ),
		"singular_name" => __( "recipe", "mealpractice" ),
		"menu_name" => __( "Recipe", "mealpractice" ),
		"all_items" => __( "All Recipes", "mealpractice" ),
		"add_new" => __( "Add New Recipe", "mealpractice" ),
	);

	$args = array(
		"label" => __( "recipes", "mealpractice" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "recipe", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-carrot",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "recipe", $args );

	/**
	 * Post Type: recipes.
	 */

	$labels = array(
		"name" => __( "reservations", "mealpractice" ),
		"singular_name" => __( "reservation", "mealpractice" ),
		"menu_name" => __( "Reservation", "mealpractice" ),
		"all_items" => __( "All Reservations", "mealpractice" ),
		"add_new" => __( "Add New Reservation", "mealpractice" ),
	);

	$args = array(
		"label" => __( "reservations", "mealpractice" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "reservation", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-carrot",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "reservation", $args );

	

}
add_action( 'init', 'mealpc_register_my_cpts' );
