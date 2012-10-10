<?php
/*
Plugin Name: Labels
Description: This plug-in is used to manage the labels
Author: admin
*/
function Labels_admin_actions(){
	add_menu_page("Manage Labels", "Manage Labels", 5,"Manage-Labels", "Labels_menu");
	add_submenu_page("Manage-Labels", "Add  Label", "Add New Label", 0,"Add_Single_Label", "Labels_addmenu");
	//add_submenu_page("Manage-Labels", "Add Range Label", "Add Range Label", 0,"Add_Range_Label", "Labels_submenu");
	add_submenu_page("Manage-Labels", "Import labels from csv", "Import Labels From csv", 0,"Add_Import_Labels", "Range_Labels_submenu");
}

function Labels_menu()
{
	include "manage_labels.php";
}
function Labels_addmenu()
{
    include 'siingle.php';
}
function Labels_submenu()
{
    include 'range.php';
}
function Range_Labels_submenu()
{
    include 'importlabel.php';
}

 
add_action('admin_menu', 'Labels_admin_actions');
?>
