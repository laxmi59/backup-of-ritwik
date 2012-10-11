<?php
get_header(); ?>
<div class="content-left1">
  <?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>
</div>
<!--content-left end here-->

<!--content-mid start here-->
<div class="content-mid"> 
	<div class="post-body">
	<div class="breadcrumb"><?php the_breadcrumb(); ?></div><br /> 
	 <?php if(is_category()){$Cat_All=get_query_var('cat');}?>
	 <?php $catd= get_the_category(); 
	  if($catd[0]->slug == 'affiliate-networks'){
	  	//echo "test";
	  	include (TEMPLATEPATH . '/affiliate-networks.php'); 
	  }elseif($catd[0]->slug == 'finding-a-niche'){
	  	include (TEMPLATEPATH . '/finding-a-niche.php'); 
	  }else{
	  ?>
	 <?php
		// for pagination
		$pagenate=mysql_fetch_object(mysql_query("SELECT `option_name` , `option_value`
FROM `".$wpdb->prefix."options`WHERE `option_name` = 'posts_per_page' "));
		if($paged =='0') $start=0; else $start=($paged-1)*$pagenate->option_value;
		//echo $start;
		$p_limit=$pagenate->option_value;
                 
        $qry="SELECT * FROM `".$wpdb->prefix."term_relationships` tr, ".$wpdb->prefix."posts p  WHERE tr.term_taxonomy_id = ".$catd[0]->term_taxonomy_id." AND tr.`object_id` = p.ID AND p.post_status = 'publish' AND p.post_type = 'post' group by tr.object_id ORDER BY p.post_date DESC";
          
		$num=mysql_num_rows(mysql_query($qry));
		$page_numbers=round($num /4);
        $getArticles=mysql_query("SELECT * FROM `".$wpdb->prefix."term_relationships` tr, ".$wpdb->prefix."posts p  WHERE tr.term_taxonomy_id = ".$catd[0]->term_taxonomy_id." AND tr.`object_id` = p.ID AND p.post_status = 'publish' AND p.post_type = 'post' group by tr.object_id ORDER BY p.post_date DESC LIMIT $start , $p_limit");
			     
		while($fetArticles=mysql_fetch_object($getArticles)){ 
			if(strtotime($fetArticles->post_date) < strtotime('2011-02-01 00:24:10') && $fetArticles->post_author <>1){
		 		$getUserName=mysql_fetch_object(mysql_query("SELECT `username` FROM `cap_jfusion_users_plugin` WHERE `id` = $fetArticles->post_author"));
				$authorName=$getUserName->username;
		 	}else{
				$getUserName=mysql_fetch_object(mysql_query("SELECT `user_login` FROM `".$wpdb->prefix."users` WHERE `ID` = $fetArticles->post_author"));
			 	$authorName=$getUserName->user_login;
		 	}
			$post = new WP_Query('p='.$fetArticles->ID.'');
			$post->the_post();
			?>
			<?php 
			
			$category = get_the_category($fetArticles->ID); 
			
			?>
        	<div id="post-23" class="post-23 post type-post hentry category-uncategorized">
				<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?=$fetArticles->post_title?></a>
				</h2>
				<div class="post-date-facebook" style="position:relative">
				<div class="post-date"><?php the_time('F jS, Y'); ?> by
				<?php echo $authorName?> in 
				<span class="categoryname"><a href="<?php echo home_url( '/' ).$category[0]->slug?>/"><?php echo $category[0]->name?></a></span></div>	
				<div class="facebook ">
					<?php $num_comments = get_comments_number($fetArticles->ID);
			 if($num_comments == 0){  $comments ="No Comments"; }
			 elseif($num_comments > 1){  $comments = "Comments (".$num_comments.")";  }
			 else{  $comments ="Comment (1)"; } ?>
			 <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo urlencode(get_permalink($fetArticles->ID)); ?>" layout="button_count" show_faces="true" width="50"></fb:like>
					</div>
				</div><!-- .entry-meta -->
			<div class="post-content">	
			<?php
				$cont =get_post_custom_values('short_description', $fetArticles->ID); 				
				if(count($cont) > 0){
					echo nl2br($cont[0]);
				}else{	
				
				?><p><?php $short_content= strip_tags(stripslashes($fetArticles->post_content));
				  $short_content= str_replace("##BREAK##","",$short_content);
					$shc=explode(" ",$short_content);
					$res='';
					//echo $shc[0];
					for($i=0;$i<100;$i++){
						$res.=$shc[$i]." ";
					}
					echo $res."...";  
					}
					?>
					<!--<span class="left" style="float:none"><a href="<?php //echo get_permalink();?>">Read more</a></span><div>&nbsp;</div>-->
				</p><?php ?>
				<p>
					<span class="left" style="float:none"><a href="<?php echo get_permalink();?>">Read more</a></span><div>&nbsp;</div>
				</p>
				<div>&nbsp;</div>
				<div class="tot-coment"><a href="<?php echo get_permalink($fetArticles->ID); ?>#disqus_thread" data-disqus-identifier="<?php echo $fetArticles->ID;?>"></a></div> 
				
				</div><!-- .entry-content -->
		</div>
        	<? }?>

		<div class="pre-next">
		<?php if ($page_numbers > 1  ) :  
			if($page_numbers > $paged){ ?>
				<div class="next"><?php next_posts_link( __( 'Older Entries', 'capblog' ) ); ?></div>
			<?php }?>
				<div class="pre"><?php previous_posts_link( __( 'Newer Entries', 'capblog' ) ); ?></div>
		<?php endif; ?>
        </div>
<?php }?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
