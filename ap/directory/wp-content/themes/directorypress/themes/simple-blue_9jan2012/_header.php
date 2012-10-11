<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?></title>    
<?php wp_head(); ?>
<link href="<?php bloginfo('template_url'); ?>/PPT/css/cap_style.css" rel="stylesheet" type="text/css" />
</head> 
<body <?php ppt_body_class(); ?>>
    <div class="header-cap">
        <div id="header" class="full">
        <div class="header-top">
<div class="header-content">
<div class="logo-cap"><a href="<?php get_site_url(); ?>/"><img src="<?php bloginfo('template_url'); ?>/PPT/img/ap_main_images/affiliateprograms.png" alt="Affiliate Marketing & Programs" title="Affiliate Marketing & Programs"/> 
</a></div>
<div class="menu-search">

<form action="http://dev2.affiliateprograms.com/blog/search-results/" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="005717581699513178642:zuosfmkksgm" />
    <input type="hidden" name="cof" value="FORID:11" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" style="border: 1px solid rgb(126, 157, 185); padding: 6px !important ;" name="q" size="31">
    <input type="submit" name="sa" value=" " class="go" />
  </div>
</form>
<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=en"></script>

</div>
</div>
  </div>
<div class="main-menu">
  <div class="menu">
  <a href="/" class="blog"></a>
  <a href="/directory/" class="directoryactive"></a>
  <a href="/contact-us.php" class="contact"> </a>
  <span class="subscribe"><a target="_blank" href="/directory/feed/" style=" text-decoration:none; background:none">&nbsp;<img border="0" src="<?php bloginfo('template_url'); ?>/PPT/img/ap_main_images/subscribe-img.png" /></a></span>
  </div>
</div>
        <div class="clearfix"></div>
    </div> 
    </div>
<div class="wrapper w_960">
    

        <div class="full">
    
        
        <div id="submenubar"> 
     
            <form method="get"  action="<?php echo $GLOBALS['bloginfo_url']; ?>/" name="searchBox" id="searchBox">
              <table width="100%" border="0" id="SearchForm">
              <tr>
                <td><input type="text" value="<?php echo SPEC($GLOBALS['_LANG']['_head1']) ?>" name="s" id="s" onfocus="this.value='';"/></td>
                <td><select id="catsearch" name="cat"><option value="">&nbsp;</option><?php echo $PPT->CategoryList(0,'toponly'); ?></select></td>
                <td><div class="searchBtn" onclick="document.searchBox.submit();"> &nbsp;</div> </td>
                <td>&nbsp;&nbsp;<?php if(get_option("display_advanced_search") ==1){ ?><a href="javascript:void(0);" onClick="jQuery('#AdvancedSearchBox').show();" class="white"><small><?php echo SPEC($GLOBALS['_LANG']['_head2']) ?></small></a><?php } ?></td>
              </tr>
            </table>
            </form>
     
             
            <ul class="submenu_account">            
            <?php  if ( $user_ID ){ ?>
            <li><a href="<?php echo wp_logout_url(); ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head3']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head3']) ?></a></li>
            <li><a href="<?php echo $GLOBALS['premiumpress']['dashboard_url']; ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head4']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head4']) ?></a></li>
            <li><b><?php echo $current_user->user_login; ?></b></li>
            <?php  }else{ ?>
            
            <li><a href="<?php echo $GLOBALS['bloginfo_url']; ?>/wp-login.php" title="<?php echo SPEC($GLOBALS['_LANG']['_head5']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head5']) ?></a> |  <a href="<?php echo $GLOBALS['bloginfo_url']; ?>/wp-login.php?action=register" title="<?php echo SPEC($GLOBALS['_LANG']['_head6']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head6']) ?></a></li>
            
            <?php } ?>
            </ul> 
            
            <a href="<?php echo $GLOBALS['premiumpress']['submit_url']; ?>" id="submitButton" title="add directory"><img src="<?php echo $GLOBALS['template_url']; ?>/themes/<?php echo $GLOBALS['premiumpress']['theme']; ?>/images/submitlisting.png" alt="add directory" /></a> 
        
        </div>
        
        
        </div>
        
 
		<div id="page" class="clearfix full">
        
        
        <?php if(get_option("display_advanced_search") ==1 ){  PPT_AdvancedSearch('preset-default');  } ?>
 
  
		<?php if(get_option("PPT_slider") =="s1"  && is_home() && !isset($_GET['s']) && !isset($_GET['search-class']) ){ echo $PPTDesign->SLIDER(); } ?> 
         
         
        
        <div id="content">


		<?php
 
            if($GLOBALS['premiumpress']['display_themecolumns'] =="3" && !isset($GLOBALS['nosidebar']) && !isset($GLOBALS['nosidebar-left']) ){
			
				include(str_replace("functions/","",THEME_PATH)."/template_directorypress/_sidebar1.php");
			
			
			}
        
        ?>