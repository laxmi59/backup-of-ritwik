<?php
/*
Plugin Name: Products Review
Description: This plug-in is used to manage the labels
Author: admin
*/
function Product_Review_admin_actions(){
	add_menu_page("Products", "Products", 5,"Products", "Products_Menu");
	add_submenu_page("Products", "Add Product", "Add New Product", 0,"Add_Product", "Products_addmenu");
}

function Products_Menu()
{
	include "manage_products.php";
}
function Products_addmenu()
{
    include 'newproduct.php';
}
add_action('admin_menu', 'Product_Review_admin_actions');

// editor code
add_action('admin_init', 'editor_admin_init');
add_action('admin_head', 'editor_admin_head');
add_action( 'admin_print_footer_scripts', 'wp_tiny_mce_preload_dialogs', 30 );
add_action( 'tiny_mce_preload_dialogs', 'wp_link_dialog', 30 );
function editor_admin_init() {
  wp_enqueue_script('word-count');
  wp_enqueue_script('post');
  wp_enqueue_script('editor');
  wp_enqueue_script('media-upload');
}

function editor_admin_head() {
  wp_tiny_mce();
}
?>
