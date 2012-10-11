<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
/*if($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ==$_SERVER['HTTP_HOST']."/blog/"){
 echo "<script>window.location='/'</script>";
}*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	  <?php
	global $page, $paged;
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ){
		if ( $paged >= 2 || $page >= 2 )
			echo 'Affiliate Marketing & Programs Directory Blog Page '.$paged .' | AffiliatePrograms.com';
		else
			echo 'Affiliate Marketing & Programs Directory Blog | AffiliatePrograms.com';
			//echo "Affiliate Program Directory - Find the Best Affiliate Programs, Tips, &amp; Reviews and Make Money Online";
	}elseif(is_single()){
		wp_title( '', true, 'right' );
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'ap' ), max( $paged, $page ) );
		else if ( $_GET['start'] >= 10 || $_GET['ap'] >= 10 )
		{
			$paged = ($_GET['start']/10) + 1;
			echo ' - ' . sprintf( __( 'Page %s', 'capblog' ), max( $paged, $paged ) );
		}
	}elseif(is_tag()){
		if ( $paged >= 2 || $page >= 2 )
			printf( __( '%s', 'ap' ), single_tag_title( '', false ) . ' Page '.$paged .' | AffiliatePrograms.com' );
		else
			printf( __( '%s', 'ap' ), single_tag_title( '', false ) . ' | AffiliatePrograms.com' );
	}else if($_SERVER['REQUEST_URI']=="/"){
		echo 'Affiliate Marketing & Programs Directory | AffiliatePrograms.com';
	}else if(is_category()){
		$Cat_All=get_query_var('cat');
		if ( $paged >= 2 || $page >= 2 )
			echo get_cat_name( $Cat_All ).' | AffiliatePrograms.com - Page '.$paged;
		else
			echo get_cat_name( $Cat_All ).' | AffiliatePrograms.com';
	}else if($_SERVER['REQUEST_URI']=="/blog/affiliate-programs/"){
		echo 'Information on Affiliate Programs | AffiliatePrograms.com';
	}else if($_SERVER['REQUEST_URI']=="/blog/lessons/"){
		echo 'Lessons | AffiliatePrograms.com';
	}else{		
		wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );
	}
	?>
	</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contentslider.css" type="text/css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/contentslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-latest.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<link href="<?php bloginfo('template_url'); ?>/css/cap_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/test.js"></script>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
function getAffiliateProgramlist(){
//alert("jo");
location.replace("/directory/?s="+document.getElementById("directorysrch").value);
}
function email(reg){
		var e=reg.value;
		//alert(e);
		var e1=/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;
		if(e.match(e1))	{
			return false;
		}else{
			alert("Invalid Email");
			reg.focus();
			return true;
		}
	}
	
	function PopupNewshomeFunction(reg){
		if(email(reg.emailpopindex)){return false}
		var exdate=new Date();
        exdate.setDate(exdate.getDate() + 365);
		document.cookie = "newpopap=1;expires="+exdate.toUTCString();
		document.getElementById("opacitypopup").style.display = 'none';
       // document.getElementById("whitepaper").style.display = 'block';
		reg.submit();
	}
	function PopupNewshomeFunction2(reg){
		if(email(document.getElementById("emailsingle"))){return false}
		document.frmsingle.submit();
	}
	
// sidbar validations
function trimfun(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function isNotEmpty(fname,txt){
	if(trimfun(fname.value)=="")	{
		alert(txt);
		fname.focus();
		return true;
	}
	return false;
}

function sidebarValidations(reg){
	if(isNotEmpty(reg.sidebarfname,"First Name should not be Empty")){return false}
		
	if(isNotEmpty(reg.sidebaremail,"Email should not be Empty")){return false}
	if(email(reg.sidebaremail)){return false}
}
	
	</script>

<style type="text/css">
.opacitypopup{position:relative; z-index:9999999;}

.opacitypopup .main{position:absolute; width:100%; background:url("<?php bloginfo('template_url'); ?>/images/popup/transparent.png") repeat left top  !important;}
    .ui-dialog .ui-dialog-titlebar-close {display:block !important;}

</style>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ddsmoothmenu.css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>

<script type="text/javascript">
jQuery(document).ready(function(){
	
//Set default open/close settings
jQuery('.acc_container').hide(); //Hide/close all containers
jQuery('.acc_trigger:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container

//On Click
jQuery('.acc_trigger').click(function(){
	if( jQuery(this).next().is(':hidden') ) { //If immediate next container is closed...
		jQuery('.acc_trigger').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
		jQuery(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
	}
	return false; //Prevent the browser jump to the link anchor
});

});
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/valid.js"></script>
</head>

<body <?php body_class(); ?>>
<?php if(!isset($_COOKIE['ApAutopilotPopup']) && $_COOKIE['ApAutopilotPopup']=="" && $post->ID <> 8352 && $post->ID <> 8354){?>
<div class="opacitypopup" id="opacitypopup"><div class="main" id="popmasksettingmain" style="height:6000px"></div></div>
<?php }?>
<?php
$feedrss=get_bloginfo("url")."/feed/";
?>
 <?php
   $page=get_page($post->ID);
   //echo $page->post_name;
   $tag_id= get_query_var('tag_id');
   $tag=get_tag($tag_id);
   if(is_category()){
	$cat = get_category_by_path(get_query_var('category_name'),false);
	}
  ?>
  <!--header-main start here-->
  <?php //echo $_SERVER['REQUEST_URI'];?>
<div class="header-main">
<div class="header">
<div class="logo-section">
<a href="<?php get_site_url(); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/affiliateprograms.png" alt="Affiliate Marketing & Programs" title="Affiliate Marketing & Programs"/></a>
</div>
<div class="head-search-main">
<div class="top-links">
<ul class="top-menu">
<!--<li><a href="#">About Us</a></li>-->
<li><a href="/contact-us.php">Contact Us</a></li>
<li class="last"><a href="/directory/package-info/">Advertising</a></li>
</ul>
</div>
<div class="search-section">
<form action="http://www.affiliateprograms.com/blog/search-results/" id="cse-search-box">
    <input type="hidden" name="cx" value="005717581699513178642:zuosfmkksgm" />
    <input type="hidden" name="cof" value="FORID:11" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" size="31" placeholder="Search">
    <input type="submit" name="sa" value=" " class="go" />
</form>
</div>
</div>
</div>
</div>
<!--header-main end here-->
<div class="main-menu">
  
  <div id="smoothcontainer">
<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
<li><a href="/" <?php if($_SERVER['REQUEST_URI']=="/") echo "class='selected'";?> ><span>Home</span></a></li>
<li><a href="/blog/affiliate-programs/" <?php if($_SERVER['REQUEST_URI']=="/blog/affiliate-programs/") echo "class='selected'";?>><span>Affiliate Programs</span></a>
  <ul>
  <li><a href="/directory/">Affiliate Program Directory</a></li>
  <li><a href="/blog/affiliate-networks/">Affiliate Networks</a></li>
  <li><a href="/blog/finding-a-niche/">Finding a Niche</a></li>
  </ul>
</li>
<li><a href="/blog/intro-to-affiliate-marketing/" <?php if($cat->slug=='intro-to-affiliate-marketing') echo "style='color: #fff; background:url(/blog/wp-content/themes/ap/images/menu-hover-lt.jpg) no-repeat scroll left top #1B418A;'";?>>
<span <?php if($cat->slug=='intro-to-affiliate-marketing') echo "style='background:url(/blog/wp-content/themes/ap/images/menu-hover-rt.jpg) no-repeat right top'";?>>Make Money</span></a>
  <ul>
  <li><a href="/blog/intro-to-affiliate-marketing/">Introduction to Affiliate Marketing</a></li>
  <li><a href="/blog/make-first-sales-affiliate-marketing/">Your first $500</a></li>
  <li><a href="/blog/affiliate-marketing-definitions/">Affiliate Marketing Glossary</a></li>
  <?php /*?><li><a href="http://websites.affiliateprograms.com/free-website-setup-for-affiliates/">Free Website Setup</a></li><?php */?>
  </ul>
</li>
<li><a href="/blog/lessons/" <?php if($_SERVER['REQUEST_URI']=="/blog/lessons/") echo "style='color: #fff; background:url(/blog/wp-content/themes/ap/images/menu-hover-lt.jpg) no-repeat scroll left top #1B418A;'";?>>
<span <?php if($_SERVER['REQUEST_URI']=="/blog/lessons/") echo "style='background:url(/blog/wp-content/themes/ap/images/menu-hover-rt.jpg) no-repeat right top'";?>>Lessons</span></a>
	<ul>
  <li><a href="/blog/the-basics/">Affiliate Marketing 101</a></li>
  <li><a href="/blog/site-building-design/">Site Building & Design</a></li>
  <li><a href="/blog/seo/">SEO</a></li>
  <li><a href="/blog/ppc/">PPC</a></li>
  <li><a href="/blog/e-mail-marketing/">E-mail Marketing</a></li>
  <li><a href="/blog/lessons-social-media/">Social Media </a></li>
  <li><a href="/blog/lessons-content-creation/">Content Creation </a></li>
  </ul>
</li>
<li><a href="/blog/news/" <?php if($cat->slug=='news') echo "class='selected'";?>><span>News</span></a></li>
<li><a href="/blog/product-reviews/" <?php if($cat->slug=='product-reviews') echo "class='selected'";?>><span>Product Reviews</span></a></li>
</ul>
<br style="clear: left" />
</div>

</div>
</div>
<div class="container-main"  id="popmasksetting">
<div class="content-main"><div class="con-top-bg"></div>
<div class="contentarea-main">






