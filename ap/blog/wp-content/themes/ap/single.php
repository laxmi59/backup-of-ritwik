<?php get_header(); ?>
<?php sharebar(); ?>
<?php 
$ediplugactive=mysql_num_rows(mysql_query("select * from wp_options where option_name='active_plugins' and option_value like '%editors_pick%'"));
//echo "select * from wp_gdsr_votes_log where id=".$post->ID." and ip='".$_SERVER['SERVER_ADDR']."'";
$sel= mysql_num_rows(mysql_query("select * from wp_gdsr_votes_log where id=".$post->ID." and ip='".$_SERVER['REMOTE_ADDR']."'"));?>
<style>
<?php if($sel) {?>
.thumblock{display:none}
<?php }?>
</style>
<div class="content-left"> 
	<div class="post-body1"> 
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		$post = new WP_Query('p='.get_the_ID().'');$post->the_post();
		$iid=get_the_ID();
		$getArticles1=mysql_fetch_object(mysql_query("SELECT * FROM `".$wpdb->prefix."posts` WHERE ID=".$iid));
       	$getUserName=mysql_fetch_object(mysql_query("SELECT * FROM `".$wpdb->prefix."users` WHERE `ID` = $getArticles1->post_author"));
        $authorName=$getUserName->display_name;
		?>
		<?php $category = get_the_category($fetArticles->ID); ?>
		<div>&nbsp;</div>
		<div class="breadcrumb"><?php the_breadcrumb(); ?></div><br />
		<div style="color:#FF0000;" align="center"><b><?=$succMsg?></b></div>
  		<div id="post-50" class="post-50 post type-post status-publish format-standard hentry category-1">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div style="height:8px">&nbsp;</div>
			<div class="post-date-facebook" style="position:relative">
				<div class="post-date"><?php the_time('M j, Y');//the_time('F jS, Y'); ?> by
				<?php echo $authorName; 
				$t = wp_get_post_tags($getArticles1->ID);
				//if(count($t)){ echo " in ";	the_tags('',', ',''); }
				?>
				</div>	
				<div style="clear:both">&nbsp;</div>	
				<?php sharebar_horizontal(); ?>
				<div class="facebook ">
					<?php $num_comments = get_comments_number($fetArticles->ID);
			 		if($num_comments == 0){  $comments ="No Comments"; }
			 		elseif($num_comments > 1){  $comments = "Comments (".$num_comments.")";  }
			 		else{  $comments ="Comment (1)"; } ?>
				</div>
			</div><!-- .entry-meta -->
			<div class="post-content-single">
			<?php if(count($pages)>1){
			  $prevurl=$page - 1;
  $nexturl=$page + 1;
			 ?>
  <div style="overflow:hidden; clear:both">
  <?php
   echo '<div class="post_navigation_pages">';
  if($page>=2) { echo "<span class='post-list'><a href='".get_permalink($iid).$prevurl."/'>&laquo; Previous</a></span>";}else{ echo "";}
  //wp_link_pages(array('before' => '','after' => '','next_or_number' => 'number'));
  echo "<span class='post-pagename'>Page " . $page." of ".count($pages)."</span>";
  if($page==count($pages)){ echo "";}else{ echo " <span class='post-list'><a href='".get_permalink($iid).$nexturl."/'>Next &raquo;</a></span>";}
  echo '</div>';
  ?>
      </div>
	  <?php }?>
     		<?php
	 			$paginateIDs= getPostIDs();
	 			$gpt=get_post( $getArticles1->ID);
   				// For get Editor pic IDs
				$pids= get_option('custom_editor_pick_pids');
				$ediorpickValid=mysql_fetch_object(mysql_query("select * from wp_options where option_name='custom_editor_pick'"));
			   	if(strtotime($getArticles1->post_date) >= strtotime($ediorpickValid->option_value)){
					$pidcompare= explode(",",$pids);
					if (!in_array($getArticles1->ID, $pidcompare)) {
						$editplug= getEditorPickArticles();
					}
				}
				// Showing Bigger Image
				$szPostContent = substr($gpt->post_content,0,500);
				if(strpos($szPostContent,'<img')!== FALSE) {
					$img_start = strpos($szPostContent,'<img');
        			$start = strpos($szPostContent,'src="',$img_start)+5;
			        $end = strpos($szPostContent,'"',$start);
			        $path = substr($szPostContent,$start,$end-$start);
					
					$start1 = strpos($szPostContent,'class="',$img_start)+7;
			        $end1 = strpos($szPostContent,'"',$start1);
			        $classattr = substr($szPostContent,$start1,$end1-$start1);
			    }
				//echo $path;
				if($path != "")
				list($width, $height) = getimagesize($path);
				//echo $width."-".$height;
				$width1=$width+10;
				$thumb_id = get_post_thumbnail_id($post->ID);
				$args = array(
					'post_type' => 'attachment',
					'post_status' => null,
					'post_parent' => $post->ID,
					'include'  => $thumb_id
				); 
				$thumb_images = get_posts($args);
			   	//print_r($thumb_images);
				$i=0;
			   	foreach ($thumb_images as $thumb_image) {
					if($i==0){
			   			$imgcapt= $thumb_image->post_excerpt;					
						$i++;
					}else{
						continue;
					}
					
				}
   				if($imgcapt){
				//echo test;
					$showcapbefore = '<div style="width:'.$width1.'px;" class="wp-caption alignnone" id="attachment_'.$thumb_image->ID.'">';
					$showcapafter = '<p class="wp-caption-text">'.$imgcapt.'</p></div>';
   				}else{
   					$showcapbefore ='';
					$showcapafter ='';
				}
				//echo $showcapafter;
				if($path!="" && $width >= 300 && $editplug != ""){
					//echo '<img src="'.$path.'"><br><br>';
					echo $showcapbefore.'<img src="'.$path.'" class="'.$classattr.'">'.$showcapafter.'<br><br>';
					$szSearchPattern = '~<img [^\>]*\ />~';
					// Run preg_match_all to grab all the images and save the results in $aPics
					preg_match_all( $szSearchPattern, $szPostContent, $aPics );
					// Check to see if we have at least 1 image
					$iNumberOfPics = count($aPics[0]);
					if ( $iNumberOfPics > 0 ) {
						// Now here you would do whatever you need to do with the images
						// For this example the images are just displayed
						for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
							$pic= $aPics[0][$i];
						}
					}
					if($ediplugactive ==1){
						if (!in_array($post->ID,$paginateIDs)){
							echo $editplug;
						}
					}
					$content = preg_replace("/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i","",the_content_custom(),1);
					echo "<div style='margin-top:-19px'>".do_shortcode($content)."</div>";
				}else{
					if($ediplugactive ==1){
						if (!in_array($post->ID,$paginateIDs)){
							echo $editplug;
						}
					}
					$content = the_content_custom();
					echo do_shortcode($content);
				}
?>
                                 
  <?php //do_shortcode(the_content()); ?> <br />
  <?php if(count($pages)>1){?>
  <div style="overflow:hidden; clear:both">
  <?php
   echo '<div class="post_navigation_pages">';
  if($page>=2) { echo "<span class='post-list'><a href='".get_permalink($iid).$prevurl."/'>&laquo; Previous</a></span>";}else{ echo "";}
  //wp_link_pages(array('before' => '','after' => '','next_or_number' => 'number'));
  echo "<span class='post-pagename'>Page " . $page." of ".count($pages)."</span>";
  if($page==count($pages)){ echo "";}else{ echo " <span class='post-list'><a href='".get_permalink($iid).$nexturl."/'>Next &raquo;</a></span>";}
  echo '</div>';
  ?>
      </div>
	  <?php }?>
				<div style="clear:both">&nbsp;</div>
				<div>
					<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0755102756028802";
					/* AffiliatePrograms Articles */
					google_ad_slot = "1312860250";
					google_ad_width = 468;
					google_ad_height = 15;
					//-->
					</script>
					<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
				</div>				<?php st_the_tags();//st-tag-cloud ?>
				
				<div>&nbsp;</div>
			
					
			  </div><!-- .entry-content -->
		
		 	  <?php endwhile; // end of the loop. ?>
			  <?php $link = get_permalink($iid);?>
	        </div>
			                       
                      <a name="cmt"></a>
			<?php comments_template( '', true ); ?>
			<!-- Stop Comment Count-->
		  <div style="height:50">&nbsp;</div>
         <div class="clear"></div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
