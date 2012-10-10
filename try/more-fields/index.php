<?php
	/*
	Plugin Name: Upload image
	Plugin URI: http://www.tanzilo.com/
	Description: This plugin helps you to set thumbnail image of your bags.
	Author: Tanzil Al Gazmir
	Version: 1.0
	Author URI: http://www.tanzilo.com/
	*/
?>
<?php
function init_bag_review_thumb_widget(){
	global $wpdb;
	$dir = WP_CONTENT_DIR . '/post_video/';
	$result = mysql_list_tables(DB_NAME);
	$current_table = array();
	while($row = mysql_fetch_row($result))	{
		$current_tables[] = $row[0];
	}
	$myNewDatabaseTable = $wpdb->prefix . 'post_video';
	if(!in_array($myNewDatabaseTable, $current_tables))	{
		mysql_query("CREATE TABLE IF NOT EXISTS `" . $myNewDatabaseTable . "` (`id` int(11) NOT NULL auto_increment,	`post_id` int(11) NOT NULL,	`video_name` varchar(255) NOT NULL,	PRIMARY KEY  (`id`)	);");
	}
	/*
	// Now I am going to delete all unnecessary thumb images by scanning the 
	// whole directory
	*/
	$sqlQuery = "SELECT video_name FROM " .$wpdb->prefix . "post_video; ";
	$fileArray = $wpdb->get_col($sqlQuery);
	$fileArray[] = 'no_thumb.jpg';

	if ($handle = opendir($dir)) {
		// This is the correct way to loop over the directory. 
		while (false !== ($file = readdir($handle))) {
			if(is_file($dir . $file)){
				if(!in_array($file, $fileArray)){
					unlink($dir . $file);
				}
			}
		}
		closedir($handle);			
	}
}
	