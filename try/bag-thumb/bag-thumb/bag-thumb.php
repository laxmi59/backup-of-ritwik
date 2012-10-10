<?php

	/*
	Plugin Name: Bag Thumbnail
	Plugin URI: http://www.tanzilo.com/
	Description: This plugin helps you to set thumbnail image of your bags.
	Author: Tanzil Al Gazmir
	Version: 1.0
	Author URI: http://www.tanzilo.com/
	*/



	function init_bag_review_thumb_widget()
	{
		
		global $wpdb;
		
		$result = mysql_list_tables(DB_NAME);
		$current_table = array();
		while($row = mysql_fetch_row($result))
		{
			$current_tables[] = $row[0];
		}
		$myNewDatabaseTable = $wpdb->prefix . 'bag_thumb';
		if(!in_array($myNewDatabaseTable, $current_tables))
		{

			mysql_query("
			CREATE TABLE IF NOT EXISTS `" . $myNewDatabaseTable . "` (
			`id` int(11) NOT NULL auto_increment,
			`post_id` int(11) NOT NULL,
			`image_name` varchar(255) NOT NULL,
			PRIMARY KEY  (`id`)
			);
			");
		}

		/*
		// Now I am going to delete all unnecessary thumb images by scanning the 
		// whole directory
		*/
		$sqlQuery = "SELECT image_name FROM " .$wpdb->prefix . "bag_thumb; ";
		$fileArray = $wpdb->get_col($sqlQuery);
		$fileArray[] = 'no_thumb.jpg';

		if ($handle = opendir('../bag_thumb/')) 
		{
				
			// This is the correct way to loop over the directory. 
			while (false !== ($file = readdir($handle))) 
			{
				if(is_file('../bag_thumb/' . $file))
				{
					if(!in_array($file, $fileArray))
					{
						unlink('../bag_thumb/' . $file);
					}
				}
			}
				
			closedir($handle);			
		}


	}
	
	// This function tells WP to add a new "meta box"
	function add_bag_photo_box() 
	{
	
		add_meta_box(
	
			'bag_photo', // id of the <div> we'll add
			'Add Bag Thumbnail Photo', //title
			'add_bag_photo', // callback function that will echo the box content
			'post', // where to add the box: on "post", "page", or "link" page
			'normal',
			'high' 
	
		);
	}
 

	// This function echoes the content of our meta box
	function add_bag_photo() 
	{
		echo 
			'<label> Select a thumbnail (150px by 100px) photo for this bag<br />
			 <input type="file" name="bag_thumbnail_photo" id="bag_thumbnail_photo" />
			 </label>
			 <input name="bag_thumbnail_set" type="hidden" id="bag_thumbnail_set" value="yes" />
			';
	}
 
	function bag_thumbnail_plugin_save_postdata()
	{
		$fileArray = array();
		global $wpdb;

		$file = $_FILES['bag_thumbnail_photo'];
		$fileName = $_FILES['bag_thumbnail_photo']['name'];
		$basename = '';

		if(!empty($fileName))
		{
			if(isAllowedExtension($_FILES['bag_thumbnail_photo']['name'])) 
			{

				$postID = $_POST['post_ID'];

				# Do uploading here
				$basename = basename( $_FILES['bag_thumbnail_photo']['name']);
				$basename = str_replace(' ', '_', $basename);
				$basename = str_replace('-', '_', $basename);
				$basename = strtolower($basename);
				$basename = $_POST['post_ID'] . '_' . $basename;
				$target_path = '../bag_thumb/';
				$target_path = $target_path . $basename; 
			
				$sqlQuery = "DELETE FROM " . $wpdb->prefix . "bag_thumb WHERE post_id=$postID;";
				$wpdb->query($sqlQuery);

				move_uploaded_file($_FILES['bag_thumbnail_photo']['tmp_name'], $target_path);

				// adding record in the database
				$sqlQuery = "INSERT INTO " . 
				$wpdb->prefix . "bag_thumb(post_id, image_name) 
				VALUES($postID, '$basename')";
				$wpdb->query($sqlQuery);
			}
			
		}

	}

	function isAllowedExtension($fileName) 
	{
		$allowedExtensions = array("png", "gif", "jpg", 'jpeg');
		return in_array(end(explode(".", $fileName)), $allowedExtensions);
	}
	

	// This starts whenever the plugin is loaded 
	add_action("plugins_loaded", "init_bag_review_thumb_widget");

	// Hook things in, late enough so that add_meta_box() is defined
	if (is_admin())
	{
		/* Use the admin_menu action to define the custom boxes */
		add_action('admin_menu', 'add_bag_photo_box');
	}

	/* Use the save_post action to do something with the data entered */
	add_action('save_post', 'bag_thumbnail_plugin_save_postdata');



?>