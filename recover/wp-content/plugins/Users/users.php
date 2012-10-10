<?php
/*
Plugin Name: Users
Plugin URI: mailto:aravind@ritwik.com
Description: Plugin is to manage the users
Author: Aravind
Version: 1.0
Author URI: 
*/
ob_start();

function users_menu()
{
    global $wpdb;
    include 'manageusers.php';
}
function users_addmenu()
{
ob_start();
    global $wpdb;
    include 'add_users.php';
	if($op=="inserted")
	{
		wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-users&msg=inserted');
	}
	else if($op=="updated")
	{
		wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=Manage-users&msg=updated');
	}
}
function users_admin_actions()
{
    add_menu_page("Users", "Users", 10,"Manage-users", "users_menu");
    add_submenu_page("Manage-users", "Add User", "Add User",10,"Add-users", "users_addmenu");
}
 
add_action('admin_menu', 'users_admin_actions');
?>