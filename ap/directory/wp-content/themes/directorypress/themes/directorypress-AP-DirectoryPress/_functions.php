<?php

// THIS IS AN EXAMPLE CHILD THEME FUNCTIONS FILE

function example_function_name($filename=""){

	$string ="";
	
	if($filename != ""){
	
		$string .= "This page is loaded using the file: <b>".$filename."</b><br />";
	}
	 
	$string .= "<div style='background:red; padding:10px; color:white; margin-bottom:20px;'>This is an example function call text displayed at the top of child theme files. This function is found within the file: _functions.php</div>";
	return $string;
}

function Truncate($string, $length) {
    //truncates a string to a certain char length, stopping on a word.
	 if (strlen($string) > $length) {
        //limit hit!
        $string = substr($string,0,($length -3));
        $string = substr($string,0,strrpos($string,' ')).'...';
    }
    return $string;
}
function Custom_content_display($pid){
	$string= mysql_fetch_object(mysql_query("select post_excerpt from wpdp_posts where ID=".$pid));
	return Truncate($string->post_excerpt, 300);
}
   	register_taxonomy( 'example_tax_', 'example_tax_type', array( 	
	 
	'labels' => array(
		'name' => 'example_tax_ Categories' ,
		'singular_name' => _x( 'example_tax_ Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search example_tax_ Categorys' ),
		'popular_items' => __( 'Popular example_tax_ Categorys' ),
		'all_items' => __( 'All example_tax_ Categorys' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit example_tax_ Category' ), 
		'update_item' => __( 'Update example_tax_ Category' ),
		'add_new_item' => __( 'Add example_tax_ Category' ),
		'new_item_name' => __( 'New example_tax_ Category Name' ),
		'separate_items_with_commas' => __( 'Separate example_tax_ Categorys with commas' ),
		'add_or_remove_items' => __( 'Add or remove example_tax_ Categorys' ),
		'choose_from_most_used' => __( 'Choose from the most used example_tax_ Categorys' )
		) , 
	'hierarchical' => true,	
	'query_var' => true,
	'show_ui' => true,
	'rewrite' => array('slug' => 'example_tax_-category') ) );
	
	
	
	register_post_type( 'example_tax_type',
		array(
		  'labels' => array('name' => 'example_tax_ Manager', 'singular_name' => 'example_tax_s' ), 
      	  'rewrite' =>  array('slug' => 'example_tax_'),
		  'public' => true,
		  'supports' => array ( 'title', 'editor','author', 'revisions', 'post-formats', 'trackbacks', 'comments','excerpt' ) 
		)
	  ); 
        function dimox_breadcrumbs() {
  $delimiter = '>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs" style="float: left;">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="/">' . $home . '</a> ' . $delimiter . ' ';
    echo '<a href="' . $homeLink . '/">Directory</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . single_cat_title('', false) . $after;
    }elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        //echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        //echo $before . get_the_title() . $after;
      } else {
        //$cat = get_the_category(); $cat = $cat[0];
        //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    }
    echo '</div>';
 
  }elseif(is_front_page()){
    echo '<div id="crumbs" style="float: left;">';
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="/">' . $home . '</a> ' . $delimiter . ' ';
    echo 'Directory';
    echo '</div>';
  }
} // end dimox_breadcrumbs()

?>