<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); 

?>
<script type="text/javascript">
function focusinfun(id){
	id.value="";
}
function focusoutfun(id){
	if(id.value == ""){
		id.value="Your Email Address";
	}
}

</script>
<style type="text/css">
body ul#sharebar { position: absolute; width: 65px; float: left; background: #fff; padding: 0; text-align: center; border: 1px solid #ccc; list-style: none; margin: 0; z-index: 99; }
body ul#sharebar li { display: block; margin: 5px; padding: 0; overflow: hidden; text-align: center; }
body ul#sharebarx { list-style: none; width: 100%; float: left; margin: 0 0 10px; padding: 0; }
body ul#sharebarx a { line-height: 14px; text-decoration: none; }
body ul#sharebarx li { float: left; margin-right: 10px; line-height: 18px; }
body ul#sharebarx li .st_email  { margin: 0 15px !important; }
.bannertxtstyle{
font-size:13px;
line-height:19px;
}
.bannertxtstyle ul{
list-style: disc outside none;
    padding-left: 20px;
}
</style>
<?php
get_header(); ?>
<div class="content-left1">
  <?php include (TEMPLATEPATH . '/sidebarLeft.php'); ?>
</div>
<!--content-left end here-->

<!--content-mid start here-->
<div class="content-mid">  
	     <div class="post-body"> 
		 <h1>
		 	<?php echo htmlspecialchars_decode(get_bloginfo('name'),ENT_QUOTES); ?>
			<?php if($paged) echo " Page ".$paged;?>
		 </h1>
	<?php 
	 if(isset($_COOKIE['newspopap']) && $_COOKIE['newspopap']=="2"){
	?>
    <div class="whitepaper-box" style="display:block" id="whitepaper">
	<?php
	 }elseif(!isset($_COOKIE['newspopap']) && $_COOKIE['newspopap']==""){
	?>
	<div class="whitepaper-box" style="display:none" id="whitepaper">
	<?php }else{?>
	<div class="whitepaper-box" style="display:none" id="whitepaper">
	<?php } ?>
<div class="topleft"><img src="<?php bloginfo('template_url'); ?>/images/whitebox-topleft.jpg" /></div><div class="topright"><img src="<?php bloginfo('template_url'); ?>/images/whitebox-topright.jpg" /></div><div class="botleft"><img src="<?php bloginfo('template_url'); ?>/images/whitebox-botleft.jpg" /></div><div class="botright"><img src="<?php bloginfo('template_url'); ?>/images/whitebox-botright.jpg" /></div>
			
		<?php /*?>
Online Marketing Superstar Discloses His Guide to <br /> Making Your First $500 in Affiliate Marketing</h2> <?php */?>
<h2>Online Marketing Superstar<br> Discloses His Guide to  Making <br> Your First $500 in Affiliate Marketing</h2>
	<!--<label>Your Email Address</label>-->
	<form method="post" name="frm" onsubmit="return PopupNewshomeFunction(this)" action="<?php echo bloginfo('url') ?>/awebnewsletter/" >
		<input type="text" name="emailpopindex" value="Your Email Address" onfocus="focusinfun(this)" onblur="focusoutfun(this)" id="emailpopindex">
		<input type="hidden" name="subtype" value="normal" />
		<input type="image" src="<?php bloginfo('template_url'); ?>/images/get-my-free-but-img.png" value="" name="">
<p>Let's Face It... We're All in Affiliate Marketing to Make Money. Take advantage of our FREE 5-Step Guide to Start Making Money Online!</p>
</form>
	 </div>
<?php
		 // for pagination
		 $pagenate=mysql_fetch_object(mysql_query("SELECT `option_name` , `option_value`
FROM `".$wpdb->prefix."options`WHERE `option_name` = 'posts_per_page' "));
		if($paged =='0') $start=0; else $start=($paged-1)*$pagenate->option_value;
		//echo $start;
		 $p_limit=$pagenate->option_value;
		 $qry="SELECT * FROM `".$wpdb->prefix."posts` WHERE post_status = 'publish' AND post_type = 'post' order by post_date desc";
		 $num=mysql_num_rows(mysql_query($qry));
		 $page_numbers=round($num /4);
		 $getArticles=mysql_query("SELECT * FROM `".$wpdb->prefix."posts` WHERE post_status = 'publish' AND post_type = 'post' order by post_date desc LIMIT $start , $p_limit");
		 $adcount=1;
		 if($paged){
		 	$postpos=$paged-1;
			$postpos=$postpos*3;
			$postpos=$postpos+1;
		 }else
			 $postpos=1;
		 while($fetArticles=mysql_fetch_object($getArticles)){
                     $getUserName=mysql_fetch_object(mysql_query("SELECT * FROM `".$wpdb->prefix."users` WHERE `ID` = $fetArticles->post_author"));
			 $authorName=$getUserName->display_name;
			 $post = new WP_Query('p='.$fetArticles->ID.'');
			 $post->the_post();
			 $category = get_the_category($fetArticles->ID);
			 ?>
        	
			 <div id="post-23" class="post-23 post type-post hentry category-uncategorized">
			
			
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $fetArticles->post_title?></a></h2>
			<div style="height:8px">&nbsp;</div>
		 <?php sharebar_horizontal(); ?>
			<div class="post-date-facebook" style="position:relative">
				<div class="post-date"><?php the_time('M j, Y');  //the_time('F jS, Y'); ?> by
				<?php echo $authorName; 
				 $t = wp_get_post_tags($fetArticles->ID);
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
			<?php /*?> <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo urlencode(get_permalink($fetArticles->ID)); ?>" layout="button_count" show_faces="true" width="50"></fb:like><?php */?>
					</div>
				</div><!-- .entry-meta -->

				<div class="post-content">
				<p><?php 
				$cont =get_post_custom_values('short_description', $fetArticles->ID); 
					echo nl2br($cont[0]);
			  ?>
					<span class="left" style="float:none"><a href="<?php echo get_permalink();?>">Read more</a></span><div>&nbsp;</div>
				</p>
				<div>&nbsp;</div>
				<div <?php if($comments=='Leave a Comment'){ echo 'class="tot-coment2"';}else{ echo 'class="tot-coment"';}?>>
			
				<a href="<?php echo get_permalink($fetArticles->ID); ?>#cmt" /><?php echo $comments?></a>
				</div> 
				</div><!-- .entry-content -->
			<?php /*?><?php
			if($adcount==4){?>
			<div align="center">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-0755102756028802";
			
			google_ad_slot = "9953639024";
			google_ad_width = 468;
			google_ad_height = 60;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
			</div>
			<?php $adcount=0;}$adcount++;?>
		</div>
		
        	<?php }?><?php */?>
			<?php
			$sel=mysql_fetch_object(mysql_query("select * from `wp_custom_banners` where positionid=".$postpos));
			if($adcount==3 && $sel){
				//echo "select * from wp_custom_banners where positionid=".$postpos;
			?>
			<div align="center" style="border-top: 1px solid #CCCCCC;padding-top: 10px;">
			<table width="80%" cellpadding="10" cellspacing="0">
			<tr><td width="40%">
			<a href="<?php echo $sel->banner_url;?>"><img src="<?php echo get_bloginfo('wpurl') . '/wp-content/plugins/affiliate_product_banners/banner_img/'. $sel->image?>" /></a></td>
			<td valign="top" class="bannertxtstyle"><?php echo nl2br($sel->banner_text);?></td></tr></table>
			</div>
			<?php $adcount=0;$postpos++;}$adcount++;?>
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
