<?php

/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/
?>
<div id="sidebar" class="rightSidebar left">
<?php if($post->ID=='2213'){?>
<style>
.sub-listing{}
.sub-listing .enter-info-left h1{margin: 0 0 20px !important;}
.sub-listing p{font-size:15px !important;}
.sub-listing h2{color: #173F8C !important;
    font-size: 20px !important;
    line-height: 32px !important;
    margin: 0 0 10px !important;}
</style>
<div class="itembox"><div class="sub-listing">
<h2>Contact Us!</h2>
<div style="font-size:13px; line-height:22px">

	<p>Have questions? Get in touch! </p>
	<p>Affiliate Media, Inc.<br />
3200 Bristol St. Ste 645<br />
Costa Mesa, CA 92626</p>
<p>Telephone: (714) 596-9000</p>

<p>Advertiser Inquires:<br />
John Le<br />
  <a href="mailto:John@affiliateprograms.com">John@affiliateprograms.com</a></p>
	
</div>
</div>
</div>
<?php }else{?>
<?php 
$pagename = get_query_var('pagename');
if($pagename == "submit"){?>
<div class="itembox">
<h2>Why AffiliatePrograms.com?</h2>
<div  style="font-size:13px; line-height:22px">
<div><span>- Ranked #1 in google for "Affiliate Programs"</span></div>
<div><span>- Over 10 years of experience with connecting affiliates and advertisers</span></div>
<div><span>- Premium destination for affiliate marketers</span></div>
<div><span>- High quality affiliate education and training</span></div>
<div><span>- Exposure to tens of thousands affiliates every month! </span></div>
</div>
</div>
<?php }else{?>
<?php if(isset($GLOBALS['tpl-add'])){ ?>
    <?php /*<div class="itembox" style="margin-top:20px;">
        <h2 id="icon-sidebar-add"><?php echo SPEC($GLOBALS['_LANG']['_side1']) ?></h2>
        <div class="itemboxinner"><?php echo nl2br(stripslashes(get_option("pak_help_text"))); ?></div>    
    </div> */?>
    <?php }elseif(isset($GLOBALS['premiumpress']['taxonomy']) && ( $GLOBALS['premiumpress']['taxonomy'] =="article" || $GLOBALS['premiumpress']['taxonomy'] =="faq" ) ){ ?>
        <?php if($post->post_type =="article_type" || $post->post_type =="faq_type" || ( isset($GLOBALS['premiumpress']['taxonomy']) && $GLOBALS['premiumpress']['taxonomy'] == "article" || isset($GLOBALS['premiumpress']['taxonomy']) && $GLOBALS['premiumpress']['taxonomy'] =="faq" ) ){ 
	if($GLOBALS['premiumpress']['taxonomy'] == "article"){
            $tty = $GLOBALS['premiumpress']['taxonomy'];
	}else{
            $tty = $GLOBALS['premiumpress']['taxonomy'];
	}	
	if($tty == ""){ $tty="article"; }
	$taxonomy     = str_replace("_type","",$tty);
	$orderby      = 'name'; 
	$show_count   = 1;      // 1 for yes, 0 for no
	$pad_counts   = 1;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$fcats 		  = '';
	$args = array(
	  'taxonomy'     => $taxonomy,
	  'orderby'      => $orderby,
	  'show_count'   => $show_count,
	  'pad_counts'   => $pad_counts,
	  'hierarchical' => $hierarchical,
	  'title_li'     => $title,
	  'hide_empty'	=> 0
	);
 	?>
    <div class="itembox" style="margin-top:20px;">
        <h2 id="icon-sidebar-singleinfo"><?php echo SPEC($GLOBALS['_LANG']['_categories']) ?></h2>
        <div class="itemboxinner nopadding">
            <ul class="category" id="Accordion">
            <?php 
                $cats  = get_categories( $args );
                foreach($cats as $cat){   $fcats .= $cat->cat_ID.",";
                print '<li><a href="'.get_term_link( $cat,$cat->taxonomy  ).'" title="'.$cat->category_nicename.'">'.$cat->cat_name.'</a></li>';
                }
            ?>
            </ul>
       	</div>
    </div>
    <?php if(function_exists('dynamic_sidebar')){ dynamic_sidebar('Right Sidebar - Article Page'); } ?>
    <?php }else{ ?>
        <?php if(get_option("display_listinginfo") =="yes"){ ?>
            <div class="itembox">
            <h2 id="icon-sidebar-singleinfo"><?php echo SPEC($GLOBALS['_LANG']['_side2']) ?></h2>
            <div class="itemboxinner">
                <a href="<?php echo get_author_posts_url( $post->post_author, $post->user_nicename ); ?>" title="<?php echo get_the_author(); ?>">
		<?php if(function_exists('userphoto') && userphoto_exists($post->post_author)){ echo userphoto($post->post_author); }else{ echo get_avatar($post->post_author,52); } ?>
                </a>
                <h3><?php the_author_posts_link(); ?></h3> 
                <p><?php the_author_meta('description'); $count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = ".$post->post_author." AND post_type IN ('post') and post_status = 'publish'" );
?></p> 
                <div class="full box clearfix"> 
                    <p><img src="<?php echo IMAGE_PATH; ?>icon1.png" alt="send email" align="middle" /> <a href="<?php echo get_author_posts_url( $post->post_author, $post->user_nicename ); ?>" title="<?php echo get_the_author(); ?>">
                    <?php echo SPEC(str_replace("%a",get_the_author(),str_replace("%b",$count,$GLOBALS['_LANG']['_side3']))) ?> </a></p>
                    <p><img src="<?php echo IMAGE_PATH; ?>icon2.png" alt="send email" align="middle" /> <a href="<?php echo get_option("messages_url"); ?>/?u=<?php the_author(); ?>"><?php echo SPEC(str_replace("%a",get_the_author(),$GLOBALS['_LANG']['_side4'])) ?></a></p>
                </div> 
                 <em><?php echo $GLOBALS['_LANG']['_side5']; the_time('l, F jS, Y') ?>, <?php echo SPEC(str_replace("%a",$GLOBALS['hits'],$GLOBALS['_LANG']['_side6'])) ?></em><br />
                <em><?php the_tags('Keywords: '); ?></em> 
            </div>    
            </div> 
            <?php } ?>   
            <?php  if(isset($GLOBALS['mapType']) && strlen($GLOBALS['mapType']) > 2  && $GLOBALS['mapType'] !="no" && strlen($GLOBALS['map']) > 1) {  ?>
            <div class="itembox" style="margin-top:20px;">
                <h2 id="icon-single-map"><?php echo SPEC($GLOBALS['_LANG']['_side7']) ?></h2>  
                <div class="itemboxinner">    
                <?php if($GLOBALS['mapType'] == "yes1"){  ?>   
                <iframe id="GoogleMap" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  style="width:240px; height:230px;"src="http://maps.google.com/maps/api/staticmap?zoom=15&amp;size=220x230&amp;markers=color:red|label:Here|<?php echo $GLOBALS['map']; ?>&amp;sensor=false&amp;key=<?php echo get_option("google_maps_api"); ?>">
                </iframe> 
                <?php }elseif($GLOBALS['mapType'] == "yes2"){ ?>
                <div id="map_sidebar2"></div> 
                <?php }   ?>
 		</div>
            </div>    
 	<?php } ?>
        <?php if(isset($GLOBALS['user_info']) && isset($GLOBALS['claim_email']) && $GLOBALS['claim_email'] !=""){ //  && $GLOBALS['user_info']->wp_user_level == 10 ?> 
        <div class="itembox" style="margin-top:20px;">
            <h2 id="icon-sidebar-claim"><?php echo SPEC($GLOBALS['_LANG']['_side8']) ?></h2>  
            <div class="itemboxinner">
            <?php echo SPEC($GLOBALS['_LANG']['_side9']) ?><br /><br /> 
            <a href="#"  <?php  if ( $user_ID ){ ?>onClick="document.ClaimListing.submit();";<?php }else{ ?>onClick="alert('<?php echo SPEC($GLOBALS['_LANG']['_side10']) ?>');";<?php } ?>><?php echo SPEC($GLOBALS['_LANG']['_side11']) ?></a> 
            </div>
        </div>
<?php } ?>    
<?php } ?> 
<?php }else{ ?>
	<?php /*<a href="<?php echo get_option('submit_url'); ?>" class="btnDownload_01 r10 rb10"><strong><?php echo SPEC($GLOBALS['_LANG']['_side13']) ?></strong><span><?php echo SPEC($GLOBALS['_LANG']['_side14']) ?></span></a> */?>
        <a href="/directory/package-info/"><img src="<?php echo get_bloginfo('template_directory');?>/themes/directorypress-AP-DirectoryPress/images/Add-Listing.jpg"/></a>

   <?php if(isset($GLOBALS['premiumpress']['catID']) && is_numeric($GLOBALS['premiumpress']['catID']) && $PPT->CountCategorySubs($GLOBALS['premiumpress']['catID']) > 0 && get_option("display_sub_categories") =="right" ){ ?>
    <div class="itembox">
    
        <h2 id="sidebar-cats-sub"><?php echo SPEC($GLOBALS['_LANG']['_gal2']) ?></h2>
        
        <div class="itemboxinner nopadding">
        
        <?php echo $ThemeDesign->HomeCategories(); ?>
        
        </div>
    
    
    </div>
        
    <?php } ?>

    
	<?php if(get_option('display_categories') =="yes" && $PPTDesign->CanDisplayElement(get_option("display_categories_pages"))  ){ ?> 
    
    
    
    <div class="itembox">
    
        <h2 id="sidebar-cats"><?php echo $GLOBALS['_LANG']['_categories']; ?></h2>
        
        <div class="itemboxinner nopadding">
        
            <ul class="category" id="Accordion">
            
            <?php echo $PPTDesign->SideBarNavigationBox(); ?>
            
            </ul>
        
        </div>    
    
    </div>    
                       
 
    <?php  } ?> 
    
    
    
    
    <?php if(get_option("display_sidebar_articles") =="yes"){ ?>
    
    <div class="itembox" style="margin-top:20px;">
    
        <h2 id="icon-sidebar-article"><?php echo SPEC($GLOBALS['_LANG']['_side12']) ?></h2>
        
        <div class="itemboxinner">
        
        	<ul id="sidebar_recentarticle">
            <?php echo $PPT->Articles(get_option('display_sidebar_articles_count'),true); ?>
        	</ul>
            
        </div>    
    
    </div> 
    
    <?php } ?>

    
   
<?php } ?> 



<?php 	
	
/****************** INCLUDE WIDGET ENABLED SIDEBAR *********************/

if(function_exists('dynamic_sidebar')){ 
    

	/*if(is_single() && !isset($GLOBALS['ARTICLEPAGE']) ){
	dynamic_sidebar('Listing Page Sidebar');
	}elseif(is_single() && isset($GLOBALS['ARTICLEPAGE']) ){
	dynamic_sidebar('Article/FAQ Page Sidebar');	
	}elseif(is_page()){
	dynamic_sidebar('Pages Sidebar') ;
	}else{
	dynamic_sidebar('Right Sidebar');  
	}*/
        /*if(is_single() && !isset($GLOBALS['ARTICLEPAGE']) ){
	dynamic_sidebar('Listing Page Sidebar');
	}elseif(is_single() && isset($GLOBALS['ARTICLEPAGE']) ){
	dynamic_sidebar('Article/FAQ Page Sidebar');	
	}elseif(is_page()){
	dynamic_sidebar('Pages Sidebar') ;
	}else{*/
	dynamic_sidebar('Right Sidebar');  
	//}

}

/****************** end/ INCLUDE WIDGET ENABLED SIDEBAR *********************/

?>

<?php 					
			if(isset($GLOBALS['premiumpress']['catID']) && is_numeric($GLOBALS['premiumpress']['catID'])){ 					
				echo $PPT->BannerZone($GLOBALS['premiumpress']['catID']); 					
			}
?>
    
<?php if(get_option('advertising_right_checkbox') =="1"){ ?><center><?php echo $PPT->Banner("right");?></center><?php } ?>  
 <?php }// submit if?> 
 <?php }?>
</div>
 