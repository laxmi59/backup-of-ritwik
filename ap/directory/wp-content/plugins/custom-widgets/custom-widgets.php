<?php
/*
Plugin Name: Custom Widgets
Description: Custom Widgets (News letter, Featured programs)
Author: Ritwik
Version: 1
*/
?>

<?php

/* -------------------------------------------- Start of News letter Widget ---------------------------------------------------*/
function sample_news_letter(){?>
<div style="height:20px;">&nbsp;</div>
<div class="itembox">
<script type="text/javascript">
function focusinfun(id){
	id.value="";
}
function focusoutfun(id){
	if(id.value == ""){
		id.value="Your Email Address";
	}
}
function email(reg){
		var e=reg.value;
		var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
		if(e.match(e1))	{
			return false;
		}else{
			alert("Invalid Email");
			reg.focus();
			return true;
		}
	}
function PopupNewsletterdirectory(){
	if(email(document.getElementById("directory_sidebar_email"))){return false}
	document.frm.submit();
}
</script>
<style type="text/css">
.join-our-newsletter{
background:url(<?php echo get_bloginfo('template_directory');?>/themes/directorypress-AP-DirectoryPress/images/Stop-and-Grab.jpg) no-repeat;
height: 193px;
}
.join-our-newsletter .textdiv{
 width:175px;
 
}
.join-our-newsletter .textdiv input[type="text"] {
 width:230px !important;
 margin-left: 10px;
 margin-top: 112px;
 padding-bottom:0;
 padding-top:0;
}
.join-our-newsletter .textdiv .textbox {
 width:230px !important;
 margin-left: 10px;
 margin-top: 112px;
 background:#fff;
 height:30px;
 padding-bottom:0;
 padding-top:0;
 
}
.join-our-newsletter .buttdiv{
 
}
.join-our-newsletter .buttdiv input[type="submit"] {
 background:url(<?php echo get_bloginfo('template_directory');?>/themes/directorypress-AP-DirectoryPress/images/get-my-free.jpg) no-repeat; border:none; height:36px; width:215px; outline:none; 
 cursor:pointer;
 margin:8px 0 0 19px;
}

.join-our-newsletter .buttdiv .submitbutton {
 background:url(<?php echo get_bloginfo('template_directory');?>/themes/directorypress-AP-DirectoryPress/images/get-my-free.jpg) no-repeat; border:none; height:36px; width:215px; outline:none; 
 cursor:pointer;
 margin:8px 0 0 19px;
}
</style>
<!--<h2>Join our Newsletter!</h2>-->
<div class="join-our-newsletter">
<form method="post" onsubmit="return PopupNewsletterdirectory()" action="/blog/awebnewsletter/" >
	<div align="center" class="textdiv"><input type="text" name="directory_sidebar_email" id="directory_sidebar_email" value="Your Email Address" onfocus="focusinfun(this)" onblur="focusoutfun(this)" class="textbox"  /></div>
	<div class="buttdiv"><input class="submitbutton" type="submit" name="submit" value=" " /></div>
</form>
</div>
</div>
<?php }

function widget_newsLetter() {
	sample_news_letter();
}

function customNewsLetter_init(){
  register_sidebar_widget(__('Custom News Letter'), 'widget_newsLetter');
}
add_action("plugins_loaded", "customNewsLetter_init");
/* -------------------------------------------- End of News letter Widget ---------------------------------------------------*/

/* -------------------------------------------- Start of Featured programs Widget ----------------------------------------------*/
function featuredprograms(){?>
<div class="itembox">
	<h2>Featured Programs</h2>
	<div class="right-side-logo">
	<div class="logo-img"><img src="/directory/wp-content/themes/directorypress/thumbs/1279130238Market-Health-Logo-134x50-affiliate-media.jpg" width="20" height="20" /></div>
	<div class="logo-text" style="padding-top: 3px;">
  		<a href="/directory/market-health/"><b>Market Health</b></a>
		<span style="float: right;">
			<a href="http://www.markethealth.com/#Health%20and%20Beauty%20Affiliate%20Program">Visit</a>
		</span>
	</div>
    </div>
<?php
//echo 'Featured programs';
$query=mysql_query("SELECT dp.ID, dp.`post_title`, dp.`post_name` FROM `wpdp_posts` dp, wpdp_postmeta dpm WHERE dp.`post_status`='publish' and dp.`post_type`='post' and dp.sidebarfeatured='yes' and dp.ID=dpm.post_id and dp.ID not in(60,70) group by dp.ID ORDER BY RAND() limit 0,4");
while($row=mysql_fetch_object($query)){
$meta_values = get_post_meta($row->ID, 'image',true);
$meta_url = get_post_meta($row->ID, 'url',true);
if($meta_url)
	$destUrl=$meta_url;
else
	$destUrl="/directory/".$row->post_name."/";
?>
    <div class="right-side-logo">
	<div class="logo-img"><img src="<?php echo $meta_values?>" width="20" height="20" /></div>
	<div class="logo-text" style="padding-top: 3px;">
  		<a href="/directory/<?php echo $row->post_name?>/"><b><?php echo $row->post_title?></b></a>
		<span style="float: right;"><a href="<?php echo $destUrl?>">Visit</a></span>
	</div>
    </div>
 <?php }?>
	<div class="right-side-logo">
	<div class="logo-img"><img src="/Logo/cpaoffers.gif" width="20" height="20" /></div>
	<div class="logo-text" style="padding-top: 3px;">
  		<a href="http://cpaoffers.com/profit/cpa-networks.php"><b>CPA Networks</b></a>
		<span style="float: right;"><a href="http://cpaoffers.com/profit/cpa-networks.php">Visit</a></span>
	</div>
    </div>
</div>
<?php }

function widget_featuredprograms() {
	featuredprograms(); 
}
 
function featuredprograms_init(){
  register_sidebar_widget(__('Custom Featured Programs'), 'widget_featuredprograms');
}
add_action("plugins_loaded", "featuredprograms_init");
/* -------------------------------------------- End of Featured programs Widget ----------------------------------------------*/

/* -------------------------------------- Start of Daily Blog Articles Widget ---------------------------------------------------*/
function sample_DailyBlogArticle()
{
?><div class="itembox">
<h2>Latest Articles</h2>
<?php
  //echo 'Featured programs';
  $query=mysql_query("SELECT wp.`post_title`, wp.`post_name`, wp.post_date,(select display_name from wp_users where ID = wp.post_author ) as author FROM `wp_posts` wp WHERE wp.`post_status`='publish' and wp.`post_type`='post' order by wp.post_date desc limit 0,5");?>
<div class="right-side-logo">
<?php  while($row=mysql_fetch_object($query)){?>
  	<?php /*<div class="logo-img"><img src="/directory/wp-content/plugins/custom-widgets/images/post-a-bg.png" /></div>*/?>
	<div class="logo-text">
            <a href="<?php echo "/blog/".$row->post_name?>/"><b><?php echo $row->post_title?></b></a><br />
            <?php //echo "<span>".$row->post_date." By ".$row->author."</span>"?>
            <?php echo "<span>".date("M d, Y",strtotime($row->post_date))." By ".$row->author."</span>"?>
	</div>
  <?php }?>
</div>
</div>
<?php
}
function widget_DailyBlogArticle() {
	sample_DailyBlogArticle(); 
}
 
function customDailyBlogArticle_init()
{
  register_sidebar_widget(__('Custom Daily Blog Article'), 'widget_DailyBlogArticle');
}
add_action("plugins_loaded", "customDailyBlogArticle_init");
/* -------------------------------------- End of Daily Blog Articles Widget ---------------------------------------------------*/

/* -------------------------------------------- Start of Sub Categories Widget ----------------------------------------------*/
function customSubCategories(){
    if(is_category()){ $Cat_All=get_query_var('cat');?>
    <?php
      //echo 'Featured programs';
    $query=mysql_query("SELECT dt.name,dt.slug,dt.term_id FROM `wpdp_term_taxonomy` dtt, wpdp_terms dt WHERE dtt.parent=".$Cat_All." and dtt.taxonomy='category' and dtt.term_taxonomy_id=dt.term_id group by dt.term_id");
    if(mysql_num_rows($query)){
    ?>
    <div class="itembox">
    <h2>Sub Categories</h2>
    <div class="right-side-logo">
    <?php  while($row=mysql_fetch_object($query)){?>
            <div class="logo-img"><img src="/directory/wp-content/plugins/custom-widgets/images/post-a-bg.png" /></div>
            <div class="logo-text">
                    <a href="<?php echo $row->slug?>/"><b><?php echo $row->name?></b></a>
            </div>
     <?php }?>
    </div>
    </div>
    <?php }}
	}
	
function widget_subCategories() {
	customSubCategories(); 
}
 
function subCategories_init(){
  register_sidebar_widget(__('Custom Sub Categories'), 'widget_subCategories');
}

add_action("plugins_loaded", "subCategories_init");

/* -------------------------------------------- End of Sub Categories Widget ----------------------------------------------*/

/* -------------------------------------- Add sidebar featured articles box in posts --------------------------------------*/

function add_sidebar_featured_article_box() 
	{
		add_meta_box(
			'sidebar_featured_article', // id of the <div> we'll add
			'Set as Sidebar Featured', //title
			'add_sidebar_featured_article', // callback function that will echo the box content
			'post', // where to add the box: on "post", "page", or "link" page
			'normal',
			'high' 
		);
	}
	// This function echoes the content of our meta box
	function add_sidebar_featured_article() {
		global $wpdb;
		if($_GET[post]){
			$getVal=mysql_fetch_array(mysql_query("SELECT sidebarfeatured FROM " . $wpdb->prefix . "posts WHERE Id =$_GET[post]"));
			if($getVal['sidebarfeatured']=='yes')
				$vval='checked="checked"';
			else
				$vval='';
			echo '<input type="checkbox" name="sidebarfeatured" id="sidbarfeatured"'.$vval.'  /> Set as Sidebar Featured Article';
		}else{
			echo '<input type="checkbox" name="sidebarfeatured" id="sidebarfeatured" /> Set as Sidebar Featured Article';
		}
	}
	function add_sidebar_featured_article_box_data(){
	//print_r($_POST);exit;
		global $wpdb;
		// start to unfeatured the article
		/*$getfeaturedPosts=mysql_query("SELECT * FROM `".$wpdb->prefix."posts` WHERE `post_status` = 'publish'  AND `post_type` = 'post' AND featured='yes' order by featured_date asc");
		if(mysql_num_rows($getfeaturedPosts)==5){
			$res=mysql_fetch_array($getfeaturedPosts);
			$upd=mysql_query("update `".$wpdb->prefix."posts` set featured='',featured_date='' where ID=$res[ID]");
		}*/
		// end of unfeatured article
		if($_POST['sidebarfeatured']=='on'){
			//$time = new DateTime('now', new DateTimeZone('UTC'));
			//$featured_date= $time->format('Y-m-d H:i:s');
			echo $sqlQuery = "update " . $wpdb->prefix . "posts set sidebarfeatured='yes' WHERE ID=".$_POST[post_ID];
			$wpdb->query($sqlQuery);
		}/*else{
            //check if on
            if ( defined(‘DOING_AUTOSAVE’) && DOING_AUTOSAVE ) {
    			$sqlQuery = "update " . $wpdb->prefix . "posts set featured='',featured_date=''  WHERE ID=$_POST[post_ID] ";
    			$wpdb->query($sqlQuery);
            }
		}*/
	}
	add_action('admin_menu', 'add_sidebar_featured_article_box');
	add_action('save_post', 'add_sidebar_featured_article_box_data');
?>