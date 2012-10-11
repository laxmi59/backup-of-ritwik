<?php
	/*
	Plugin Name: New fields
	*/
	function init_new_fields_widget()	{
		global $wpdb;
		$result = mysql_list_tables(DB_NAME);
		$current_table = array();
	}
	function featured_article_save_postdata(){
		global $wpdb;
		if($_POST['featured']=='on'){
			$sqlQuery = "update " . $wpdb->prefix . "posts set featured='yes'  WHERE ID=$_POST[post_ID] ";
			$wpdb->query($sqlQuery);
		}else{
			//check if on
			if ( defined(‘DOING_AUTOSAVE’) && DOING_AUTOSAVE ) {
				$sqlQuery = "update " . $wpdb->prefix . "posts set featured=''  WHERE ID=$_POST[post_ID] ";
				$wpdb->query($sqlQuery);
			}
		}
		
	}
	function add_featured_article_box() 
	{
		add_meta_box(
			'featured_article', // id of the <div> we'll add
			'Set as Featured', //title
			'add_featured_article', // callback function that will echo the box content
			'post', // where to add the box: on "post", "page", or "link" page
			'normal',
			'high' 
		);
	}
	// This function echoes the content of our meta box
	function add_featured_article() {
		global $wpdb;
		if($_GET[post]){
			$getVal=mysql_fetch_array(mysql_query("SELECT featured FROM " . $wpdb->prefix . "posts WHERE Id =$_GET[post]"));
			if($getVal['featured']=='yes')
				$vval='checked="checked"';
			else
				$vval='';
		}
		echo '<input type="checkbox" name="featured" id="featured"'.$vval.'  /> Set as featured article';
	}
	// This starts whenever the plugin is loaded 
	//add_action("plugins_loaded", "init_new_fields_widget");
	// Hook things in, late enough so that add_meta_box() is defined
	//if (is_admin())	{
		/* Use the admin_menu action to define the custom boxes */
		//add_action('admin_menu', 'add_featured_article_box');
	//}
	/* Use the save_post action to do something with the data entered */
	//add_action('save_post', 'featured_article_save_postdata');
?>