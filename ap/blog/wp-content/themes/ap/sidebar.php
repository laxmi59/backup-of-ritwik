<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
function accessdirCategoryName($catname){
	$stitle = str_replace("-","_",$catname);
	$stitle = str_replace("%","$",$stitle);
	$stitle = str_replace("+",",",$stitle);
	$stitle = str_replace(" ","-",$stitle);
// 	$stitle = str_replace("&","and",$stitle);
	return strtolower(addslashes($stitle));
}
function getcategoryName($category){
	$getsubcatqry=mysql_query("select * from tbl_categories where category_status=1 and category_id='".$category."'");
	$res=mysql_fetch_array($getsubcatqry);
	return $res['category_name'];
}
?>
<style type="text/css">
    .editorpickcontent ul{
        list-style: disc;
        padding-left: 25px;        
    }       
</style>
<div class="content-right">
	<div class="hotest-tips">
		<div class="hotest-title">
			<div class="hot-title-lt"><img src="<?php bloginfo('template_url'); ?>/images/hotest-img.png" width="42" height="42" /></div>
			<div class="hot-title-rt">Get the Hottest Tips &amp; Updates</div>
		</div>
		<div class="hotest-content">
		<p>Subscribe to our Affiliate Secret Tips Newsletter and get Exclusive weekly Updates</p>
			<form method="post" onsubmit="return sidebarValidations(this)" action="<?php echo bloginfo('url') ?>/awebnewsletter/">
				<input type="text" id="sidebarfname" name="sidebarfname" placeholder="First name">
				<input type="text" id="sidebaremail" name="sidebaremail" placeholder="Email">
				<div class="alert">We will not share this info with any third party.</div>
				<input name="submit" type="submit" />
			</form>
		</div>
	</div>
	<div class="af-title"><h1>People Love Us!</h1></div>
	<div class="people-love">
		<div class="social-like">
			<!--facebook like-->
			<table cellpadding="0" cellspacing="0" border="0"><tr><td>
			<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/affiliateprogramsdotcom" layout="button_count" show_faces="true" width="50"></fb:like>
			</td>
			<td>
			<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/FollowCompany" data-id="79271" data-counter="right"></script>
			</td></tr>
			<tr><td colspan="3" style="padding-top:10px">
			<!--twitter-->
			<a href="https://twitter.com/#!/AffProgs" class="twitter-follow-button" data-show-count="true">Follow @affiliateprograms</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</td></tr></table>
		</div>
		<div class="affiliate-pro">
			<h2 class="tit"><span><a href="/directory/">see all</a></span>Affiliate Programs </h2>
			<div class="right-side-logo">
				<div class="logo-img"><img src="/directory/wp-content/themes/directorypress/thumbs/1279130238Market-Health-Logo-134x50-affiliate-media.jpg" width="20" height="20" /></div>
				<div class="logo-text" style="padding-top: 3px;">
  					<a href="/directory/market-health/"><b>Market Health</b></a>
					<span><a href="http://www.markethealth.com/#Health%20and%20Beauty%20Affiliate%20Program">Visit</a></span>
				</div>
    		</div>
			<?php //echo 'Featured programs';
			$query=mysql_query("SELECT dp.ID, dp.`post_title`, dp.`post_name` FROM `wpdp_posts` dp, wpdp_postmeta dpm WHERE dp.`post_status`='publish' and dp.`post_type`='post' and dp.sidebarfeatured='yes' and dp.ID=dpm.post_id and dp.ID not in(60,70) group by dp.ID ORDER BY RAND() limit 0,4");
			while($row=mysql_fetch_object($query)){
				$meta_values =mysql_fetch_object(mysql_query("SELECT * FROM  `wpdp_postmeta` WHERE  `post_id` =".$row->ID." AND  `meta_key` =  'image' "));
				$meta_url =mysql_fetch_object(mysql_query("SELECT * FROM  `wpdp_postmeta` WHERE  `post_id` =".$row->ID." AND  `meta_key` =  'url' "));
			if($meta_url->meta_value <> '')
				$destUrl=$meta_url->meta_value;
			else
				$destUrl="/directory/".$row->post_name."/";
			?>
			    <div class="right-side-logo">
					<div class="logo-img"><img src="<?php echo $meta_values->meta_value?>" width="20" height="20" /></div>
					<div class="logo-text" style="padding-top: 3px;">
						<a href="/directory/<?php echo $row->post_name?>/"><b><?php echo $row->post_title?></b></a>
						<span><a href="<?php echo $destUrl?>">Visit</a></span>
					</div>
			    </div>
			<?php }?>
			<div class="right-side-logo">
				<div class="logo-img"><img src="/Logo/cpaoffers.gif" width="20" height="20" /></div>
				<div class="logo-text" style="padding-top: 3px;">
  					<a href="http://cpaoffers.com/profit/cpa-networks.php"><b>CPA Networks</b></a>
					<span><a href="http://cpaoffers.com/profit/cpa-networks.php">Visit</a></span>
				</div>
    		</div>
		</div>
		<div class="joinnow-img">
 <!--/* OpenX Javascript Tag v2.8.6-rc2 */-->
<!--/*
  * The backup image section of this tag has been generated for use on a
  * non-SSL page. If this tag is to be placed on an SSL page, change the
  *   'http://d1.openx.org/...'
  * to
  *   'https://d1.openx.org/...'
  *
  * This noscript section of this tag only shows image banners. There
  * is no width or height in these banners, so if you want these tags to
  * allocate space for the ad before it shows, you will need to add this
  * information to the <img> tag.
  *
  * If you do not want to deal with the intricities of the noscript
  * section, delete the tag (from <noscript>... to </noscript>). On
  * average, the noscript tag is called from less than 1% of internet
  * users.
  */-->

<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://d1.openx.org/ajs.php':'http://d1.openx.org/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=208308");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://d1.openx.org/ck.php?n=a0a55bb3&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://d1.openx.org/avw.php?zoneid=208308&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a0a55bb3' border='0' alt='' /></a></noscript>
  </div>
  		</div>
		<div class="af-title"><h1>Product Reviews</h1></div>
<?php $fetFeaturedProduct=mysql_fetch_object(mysql_query("SELECT * FROM `".$wpdb->prefix."term_relationships` tr, ".$wpdb->prefix."posts p,".$wpdb->prefix."term_taxonomy t  WHERE t.`term_id` =379 AND t.term_taxonomy_id=tr.term_taxonomy_id  AND  tr.`object_id` = p.ID AND p.post_status = 'publish' AND p.post_type = 'post' group by tr.object_id ORDER BY p.post_date DESC limit 0,1"));
//print_r($fetFeaturedProduct);

$sidebarproduct =get_post_custom_values('short_description', $fetFeaturedProduct->ID); 
//print_r($sidebarproduct);
if(strpos($sidebarproduct[0],'<img')!== FALSE) {
            $img_start = strpos($sidebarproduct[0],'<img');
                $start = strpos($sidebarproduct[0],'src="',$img_start)+5;
                $end = strpos($sidebarproduct[0],'"',$start);
               $post_imagesidebar = substr($sidebarproduct[0],$start,$end-$start);
            }?>
<div class="product-review">
<div class="pr-review">
<?php if($post_imagesidebar <> ''){?>
<div class="pr-img">
  <a href="<?php echo "/blog/".$fetFeaturedProduct->post_name."/"; ?>"><img src="<?php echo $post_imagesidebar;?>" width="101" height="101" alt="" /></a>
</div>
  <div class="pr-content">
  <h3><a href="<?php echo "/blog/".$fetFeaturedProduct->post_name."/"; ?>"><?php echo $fetFeaturedProduct->post_title;?></a></h3>
<p><?php echo nl2br(strip_tags($sidebarproduct[0]))?>...<a href="<?php echo "/blog/".$fetFeaturedProduct->post_name."/"; ?>" class="more-btn">more</a></p>
  </div>
 <?php }else{?> 
 <div class="pr-only-content">
 <h3><a href="<?php echo "/blog/".$fetFeaturedProduct->post_name."/"; ?>"><?php echo $fetFeaturedProduct->post_title;?></a></h3>
<p><?php echo nl2br(strip_tags($sidebarproduct[0]))?>...<a href="<?php echo "/blog/".$fetFeaturedProduct->post_name."/"; ?>" class="more-btn">more</a></p>
</div>
<?php }?>
</div>
<ul class="pr-list">
<?php  $gettopfiveproducts=mysql_query("SELECT * FROM `".$wpdb->prefix."term_relationships` tr, ".$wpdb->prefix."posts p,".$wpdb->prefix."term_taxonomy t  WHERE t.`term_id` =379 AND t.term_taxonomy_id=tr.term_taxonomy_id  AND  tr.`object_id` = p.ID AND p.post_status = 'publish' AND p.post_type = 'post' group by tr.object_id ORDER BY p.post_date DESC LIMIT 1 , 5");
	while($fettopfiveproducts=mysql_fetch_object($gettopfiveproducts)){ 
	$prpost = new WP_Query('p='.$fettopfiveproducts->ID.'');
	$prpost->the_post();
?>
  <li><a href="<?php the_permalink(); ?>"><?=$fettopfiveproducts->post_title?></a></li>
 <?php }?>
  </ul>
</div>

<?php
if($_SERVER['REQUEST_URI'] <> "/"){
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
		
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		

<?php endif; ?>
<?php }?>
</div>