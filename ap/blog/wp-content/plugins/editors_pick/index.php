<?php
/*
Plugin Name: Editor's Pick
Plugin URI: http://yourdomain.com/
Description: Editors Pick wordpress plugin
Version: 1.0
Author: Rama
Author URI: http://yourdomain.com
License: GPL
*/
?>
<?php
function editorspick(){
	add_menu_page("Editor's Pick", "Editor's Pick","10","editor_pick","Manage_Articles");
}

function Manage_Articles(){
	include('editor_pick.php');
}


function add_editorpick_table(){
global $wpdb;
	$sqlget=mysql_fetch_object(mysql_query("select * from wp_options where option_name='custom_editor_pick'"));
	if(!$sqlget){
		$sqlins=mysql_query("INSERT INTO `wp_options` (`option_name` ,`option_value` ,`autoload`) VALUES ('custom_editor_pick', now(), 'yes')");
		$sqlins1=mysql_query("INSERT INTO `wp_options` (`option_name` ,`option_value` ,`autoload`) VALUES ('custom_editor_pick_new_date', now(), 'yes')");
		$sqlins1=mysql_query("INSERT INTO `wp_options` (`option_name` ,`option_value` ,`autoload`) VALUES ('custom_editor_pick_pids', '', 'yes')");
	}
	//include('sql.php');
	$sql = mysql_query("CREATE TABLE `manage_articles` ( `id` INT NULL AUTO_INCREMENT PRIMARY KEY , `post_id` INT NOT NULL , 
`date` DATE NOT NULL,`possion` INT NOT NULL , ) ENGINE = MYISAM ");
}

add_action('admin_menu' ,'editorspick');
add_action('plugins_loaded' ,'add_editorpick_table');
//add_action('admin_init', 'upload_Images' );

?>
