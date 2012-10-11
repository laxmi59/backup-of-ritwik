<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php 
$title =get_post_meta($wp_query->post->ID, 'title', true);
if($title){
	echo $title;
}else{
	if(is_home()){
		echo "Affiliate Program Directory - Find an Affiliate Program Niche";
	}elseif(is_category()){
		$Cat_All=get_query_var('cat');
		//echo get_cat_name( $Cat_All )." Affiliate Programs - Find the best  ".get_cat_name( $Cat_All )." Affiliate Program" ;
		if ( $paged >= 2 || $page >= 2 )
			echo get_cat_name( $Cat_All )." Affiliate Programs - Find the best  ".get_cat_name( $Cat_All )." Affiliate Program - Page ".$paged ;
		else
			echo get_cat_name( $Cat_All )." Affiliate Programs - Find the best  ".get_cat_name( $Cat_All )." Affiliate Program" ;
	}elseif(is_single())
		wp_title('Affiliate Program Review', true, 'right'); 
	else{
		wp_title('&laquo;', true, 'right'); 
	}
}
?>
</title>    
<?php if(is_single()){?>
<meta name="description" content="<?php echo str_replace('"', "&quot;",Custom_content_display($post->ID));?>" /> 
<?php }else{?>
<meta name="description" content="Find the best affiliate programs and partners to work with to monetize your website online." /> 
<?php }?>
<?php wp_head(); ?>
<link href="<?php bloginfo('template_url'); ?>/PPT/css/cap_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/blog/wp-content/themes/ap/css/ddsmoothmenu.css">
<script type="text/javascript" src="/blog/wp-content/themes/ap/js/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
</script>
</head> 
<?php 
$customHttpPath= "http://www.affiliateprograms.com";
?>
<body <?php ppt_body_class(); ?>>
<!--header-main start here-->
<div class="header-main">
<div class="header">
<div class="logo-section">
<a href="<?php echo $customHttpPath;?>/"><img src="/directory/wp-content/themes/directorypress/images/affiliateprograms.png" alt="Affiliate Marketing & Programs" title="Affiliate Marketing & Programs"/></a>
</div>
<div class="head-search-main">
<div class="top-links">
<ul class="top-menu">
<!--<li><a href="#">About Us</a></li>-->
<li><a href="<?php echo $customHttpPath;?>/contact-us.php">Contact Us</a></li>
<li class="last"><a href="<?php echo $customHttpPath;?>/directory/package-info/">Advertising</a></li>
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
   <?php
   $page=get_page($post->ID);
   //echo $page->post_name;
   $tag_id= get_query_var('tag_id');
   $tag=get_tag($tag_id);
   if(is_category()){
	$cat = get_category_by_path(get_query_var('category_name'),false);
	}
  ?>
<div class="main-menu">
  <div id="smoothcontainer">
<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
<li><a href="<?php echo $customHttpPath;?>/"><span>Home</span></a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/affiliate-programs/" <?php echo "style='color: #fff; background:url(/blog/wp-content/themes/ap/images/menu-hover-lt.jpg) no-repeat scroll left top #1B418A;'";?>>
<span <?php echo "style='background:url(/blog/wp-content/themes/ap/images/menu-hover-rt.jpg) no-repeat right top'";?>>Affiliate Programs</span></a>
  <ul>
  <li><a href="<?php echo $customHttpPath;?>/directory/">Affiliate Program Directory</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/affiliate-networks/">Affiliate Networks</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/finding-a-niche/">Finding a Niche</a></li>
  </ul>
</li>
<li><a href="<?php echo $customHttpPath;?>/blog/intro-to-affiliate-marketing/" ><span>Make Money</span></a>
  <ul>
  <li><a href="<?php echo $customHttpPath;?>/blog/intro-to-affiliate-marketing/">Introduction to Affiliate Marketing</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/make-first-sales-affiliate-marketing/">Your first $500</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/affiliate-marketing-definitions/">Affiliate Marketing Glossary</a></li>
  
  </ul>
</li>
<li><a href="<?php echo $customHttpPath;?>/blog/lessons/" ><span>Lessons</span></a>
	<ul>
  <li><a href="<?php echo $customHttpPath;?>/blog/the-basics/">Affiliate Marketing 101</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/site-building-design/">Site Building & Design</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/seo/">SEO</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/ppc/">PPC</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/e-mail-marketing/">E-mail Marketing</a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/lessons-social-media/">Social Media </a></li>
  <li><a href="<?php echo $customHttpPath;?>/blog/lessons-content-creation/">Content Creation </a></li>
  </ul>
</li>
<li><a href="<?php echo $customHttpPath;?>/blog/news/" ><span>News</span></a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/product-reviews" ><span>Product Reviews</span></a></li>
</ul>
<br style="clear: left" />
</div>

</div>
</div>
<div class="container-main"  id="popmasksetting">
<div class="content-main"><div class="con-top-bg"></div>
<div class="contentarea-main">
<?php if($post->ID <> '2211' && $post->ID <> '2208'){?>
<div class="sh-bg">
	<!--<div class="wrapper w_960"> -->    
        <div id="submenubar">              
            <ul class="submenu_account">            
            <?php  if ( $user_ID ){ ?>
            <li>| <a href="<?php echo str_replace("https:","http:",wp_logout_url()); ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head3']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head3']) ?></a></li>
            <li>| <a href="<?php echo $GLOBALS['premiumpress']['dashboard_url']; ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head4']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head4']) ?></a></li>
            <li><b><?php echo $current_user->user_login; ?></b></li>
            <?php  }else{ ?>
            
            <li> <a href="<?php echo $customHttpPath;?>/directory/wp-login.php" title="<?php echo SPEC($GLOBALS['_LANG']['_head5']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head5']) ?></a> |  <a href="<?php echo $customHttpPath;?>/directory/wp-login.php?action=register" title="<?php echo SPEC($GLOBALS['_LANG']['_head6']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head6']) ?></a></li>
            
            <?php } ?>
            </ul> 
        
        
        </div>
  <?php }?>      
        
      
        
 
		<div id="page" class="clearfix full">
        
        <?php if(get_option("display_advanced_search") ==1 ){  PPT_AdvancedSearch('preset-default');  } ?> 
  
		<?php if(get_option("PPT_slider") =="s1"  && is_home() && !isset($_GET['s']) && !isset($_GET['search-class']) ){ echo $PPTDesign->SLIDER(); } ?> 
        
        <div id="content">


		<?php
 
            if(file_exists(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme']."/_sidebar1.php") && !isset($GLOBALS['nosidebar']) && !isset($GLOBALS['nosidebar-left']) ){
            
                include(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme']."/_sidebar1.php");
            
            }elseif($GLOBALS['premiumpress']['display_themecolumns'] =="3" && !isset($GLOBALS['nosidebar']) && !isset($GLOBALS['nosidebar-left']) ){
			
				include(str_replace("functions/","",THEME_PATH)."/template_directorypress/_sidebar1.php");
			
			
			}
        
        ?>
