<?php
/*
Plugin Name: items found
Description: now the item found details
Author: admin
*/

// mt_add_pages() is the sink function for the 'admin_menu' hook
function itemFoundMenu() {
    // Add a new top-level menu:
   // The first parameter is the Page name(Site Help), second is the Menu name(Help)
   //and the number(5) is the user level that gets access
    add_menu_page('Item Found', 'Item Found', 5, __FILE__, 'itemFoundMenuContent');
}

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function itemFoundMenuContent() {
   include "itemfound.php";
}

// Insert the mt_add_pages() sink into the plugin hook list for 'admin_menu'
add_action('admin_menu', 'itemFoundMenu');
?>
