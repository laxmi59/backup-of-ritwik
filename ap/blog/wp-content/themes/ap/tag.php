<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php
	global $wp_query;
	$tag = $wp_query->get_queried_object();
	$current_tag = $tag->slug;
?>
	<div class="content-left"> 
	     <div class="post-body"> 
		  <h1>
		 	<?php echo htmlspecialchars_decode(get_bloginfo('name'),ENT_QUOTES); ?>
			<?php if($paged) echo " Page ".$paged;?>
		 </h1>
<?php //if($paged) echo "<h1>Page ".$paged."</h1>"; ?> 
				<?php /*?><h1><?php
					//printf( __( '<span style="font-size:12px;">Tag Archives:</span> %s', 'ap' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1><?php */?>
			<div class="page-title" style="width:100%">
				<!--<div style="float:left;padding-top:10px;">Tag Archives: </div>-->
				<div> <h2 style="color:#000;font-size:30px"><?php echo $tag->name;?></h2></div>
			</div>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 //get_template_part( 'loop', 'tag' );

?>

<?php
		 // for pagination
		 $pagenate=mysql_fetch_object(mysql_query("SELECT `option_name` , `option_value`
FROM `".$wpdb->prefix."options`WHERE `option_name` = 'posts_per_page' "));
		if($paged =='0') $start=0; else $start=($paged-1)*$pagenate->option_value;
		//echo $start;
		 $p_limit=$pagenate->option_value;
		 $qry="SELECT DISTINCT (object_id), wp.post_title, wp.post_content, wp.post_date FROM ".$wpdb->prefix."terms wt, ".$wpdb->prefix."term_relationships wtr, ".$wpdb->prefix."posts wp WHERE wt.slug =  '".$current_tag."' AND wp.ID = wtr.object_id AND wt.term_id = wtr.term_taxonomy_id AND wp.post_type =  'post' AND wp.post_status =  'publish' order by wp.post_date desc";
		 $num=mysql_num_rows(mysql_query($qry));
		 $page_numbers=round($num /4);
		 $getArticles=mysql_query("SELECT DISTINCT (object_id), wp.post_author, wp.post_title, wp.post_content, wp.post_date FROM ".$wpdb->prefix."terms wt, ".$wpdb->prefix."term_relationships wtr, ".$wpdb->prefix."posts wp WHERE wt.slug =  '".$current_tag."' AND wp.ID = wtr.object_id AND wt.term_id = wtr.term_taxonomy_id AND wp.post_type =  'post' AND wp.post_status =  'publish' order by wp.post_date desc LIMIT $start , $p_limit");
		 while($fetArticles=mysql_fetch_object($getArticles)){
                     $getUserName=mysql_fetch_object(mysql_query("SELECT * FROM `".$wpdb->prefix."users` WHERE `ID` = $fetArticles->post_author"));
			 $authorName=$getUserName->display_name;
			 $post = new WP_Query('p='.$fetArticles->object_id.'');
			 $post->the_post();
			 $category = get_the_category($fetArticles->object_id);
			 ?>
        	
			 <div id="post-23" class="post-23 post type-post hentry category-uncategorized">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $fetArticles->post_title?></a></h2>
			<div class="post-date-facebook" style="position:relative">
				<div class="post-date"><?php the_time('M j, Y'); //the_time('F jS, Y'); ?> by
				<?php echo $authorName; 
				$t = wp_get_post_tags($fetArticles->object_id);
				if(count($t)){
					echo " in ";
					the_tags('',', ',''); 
				}
				?>
				
				</div>		
				<div class="facebook ">
					<?php $num_comments = get_comments_number($fetArticles->ID);
			 if($num_comments == 0){  $comments ="Leave a Comment"; }
			 elseif($num_comments > 1){  $comments = "Comments (".$num_comments.")";  }
			 else{  $comments ="Comment (1)"; } ?>
			 <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo urlencode(get_permalink($fetArticles->ID)); ?>" layout="button_count" show_faces="true" width="50"></fb:like>
					</div>
				</div><!-- .entry-meta -->

				<div class="post-content">
				<p><?php /*$short_content= strip_tags(stripslashes($fetArticles->post_content));
				  $short_content= str_replace("##BREAK##","",$short_content);
					$shc=explode(" ",$short_content);
					$res='';
					//echo $shc[0];
					for($i=0;$i<200;$i++){
						$res.=$shc[$i]." ";
					}
					echo $res."..."; */ 
					$cont =get_post_custom_values('short_description', $fetArticles->object_id); 
					echo nl2br($cont[0]);
					?>
					
					<span class="left" style="float:none"><a href="<?php echo get_permalink();?>">Read more</a></span><div>&nbsp;</div>
				</p>
				<div>&nbsp;</div>
				<div <?php if($comments=='Leave a Comment'){ echo 'class="tot-coment2"';}else{ echo 'class="tot-coment"';}?>>
				<?php /*?><a href="<?php echo get_permalink($fetArticles->ID); ?>#disqus_thread" data-disqus-identifier="<?php echo $fetArticles->ID;?>"></a><?php */?><a href="<?php echo get_permalink($fetArticles->ID); ?>#cmt" /><?php echo $comments?></a></div> 
				</div><!-- .entry-content -->
			

		</div>
        	<?php }?>
        </div>
		<div class="pre-next">

		<?php  if ($page_numbers > 1  ) :  ?>
	<?php if($page_numbers > $paged){ ?>
		<div class="next"><?php next_posts_link( __( 'Older Entries', 'capblog' ) ); ?></div>
	<?php }?>
		<div class="pre"><?php previous_posts_link( __( 'Newer Entries', 'capblog' ) ); ?></div><!-- #nav-above -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
