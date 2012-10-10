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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>

<?php

	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

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
<link href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" rel="stylesheet" >
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/curvy.corners.trunk.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/CSScriptLib.js"></script>
</head>
<body <?php body_class(); ?>>
<!--header-->
<div class="header">
  <div class="logo"><a href="index.php"><img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" width="138" height="90"></a></div>
  <div class="link-box">
    <div class="top-link">
      <ul>
        <li>(800) 650-1625</li>
        <li>|</li>
        <li><a href="mailto:info@recoverlink.com">info@recoverlink.com</a></li>
        <li>|</li>
        <?php if($_SESSION['userid']==''){?>
		<li><a href="<?php echo get_option('siteurl');?>/get-started">Sign-In</a></li>
		<?php }else{?>
		<li><a href="<?php echo get_option('siteurl');?>/account">My Account</a></li>
		<li>|</li>
		<li><a href="<?php echo get_option('siteurl');?>/logout.php">Logout</a></li>
		<? }?>
      </ul>
    </div>
	<div style="clear:both"></div>
    <div class="nav">
      <ul>
        <li><a href="<?php echo get_option('siteurl');?>/how-it-works" class="how"></a></li>
        <li><a href="<?php echo get_option('siteurl');?>/about" class="about"></a></li>
        <li><a href="<?php echo get_option('siteurl');?>/faqs" class="faq"></a></li>
        <li><a href="<?php echo get_option('siteurl');?>/news-events" class="latest"></a></li>
        <li><a href="<?php echo get_option('siteurl');?>/contactus" class="contact"></a></li>
      </ul>
    </div>
  </div>
</div>
<!--END header-->
<?php 
if (is_page('home')) 
$class="banner";
else
$class="banner-inner";
?>

<div class="<?php echo $class; ?>">
  <?php if (is_page('home')) { ?>
  <img src="<?php bloginfo('template_directory'); ?>/images/banner.gif" border="0" usemap="#Map"  >
  <map name="Map">
    <area shape="rect" coords="1,220,128,258" href="<?php echo get_option('siteurl');?>/about">
  </map>
  <?php } 
else
{ ?>
  
  <?php	
	
	if(is_page('contactus')){
	
	echo '<img src="'.get_bloginfo('template_directory').'/images/contact.jpg" border="0" usemap="#Map"  > ';
	}
	elseif(is_page('faqs'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/faq.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('news-events'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/latest-news.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('get-started'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/login.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('about'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/about.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('how-it-works'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/how-it-works.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('registerform'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/Registration.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('account'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/account.jpg" border="0" usemap="#Map"  >';
	}
	elseif(is_page('forgotpassword'))
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/forget-password.jpg" border="0" usemap="#Map"  >';
	}
	else
	{
	echo '<img src="'.get_bloginfo('template_directory').'/images/others.jpg" border="0" usemap="#Map"  >';
	}
 } ?>
</div>
<!-- #header -->

