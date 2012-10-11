<?php
/*
Template Name: Product Review Page
*/
get_header(); ?>
 <?php $fetFeaturedProduct=mysql_fetch_object(mysql_query("select * from ".$wpdb->prefix."products where product_featured='yes'"));?>
<div class="content-left"> 
	<div class="post-body">  
		<div class="post">
			<h2 class="entry-title"><a href="<?php echo $fetFeaturedProduct->product_url;?>"><?php echo $fetFeaturedProduct->product_title;?></a></h2>
			<div class="post-content" align="justify">
				<div class="shadow">
					<div><div><a href="<?php echo $fetFeaturedProduct->product_url;?>"><img src="<?php echo bloginfo('url') . '/wp-content/themes/ap/product_images/thumb/'.$fetFeaturedProduct->product_image;?>" width="100" height="50" /></a></div></div>
				</div>
				<p><?php echo $fetFeaturedProduct->product_short_desc;?></p>
				<div>&nbsp;</div>
			</div>
		</div>
		<?php 
		$getProducts=mysql_query("select * from ".$wpdb->prefix."products where product_featured='' order by product_id desc limit 0,10");
while($fetProducts=mysql_fetch_object($getProducts)){?>
		<div class="post">
			<h2 class="entry-title"><a href="<?php echo $fetProducts->product_url;?>"><?php echo $fetProducts->product_title;?></a></h2>
			<div class="post-content" align="justify">
				<div class="shadow">
					<div><div><a href="<?php echo $fetProducts->product_url;?>"><img src="<?php echo bloginfo('url') . '/wp-content/themes/ap/product_images/thumb/'.$fetProducts->product_image;?>" width="100" height="50" /></a></div></div>
				</div>
				<p><?php echo $fetProducts->product_short_desc;?></p>
				<div>&nbsp;</div>
			</div>
		</div>
		<?php }?>
    </div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
