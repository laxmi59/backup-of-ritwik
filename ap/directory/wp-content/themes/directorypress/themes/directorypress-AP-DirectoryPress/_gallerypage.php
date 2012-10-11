<?php get_header();  

?>

<div class="middleSidebar left">
<?php //if(is_category()){ if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); }?>
<?php if(is_category()){ if (function_exists('dimox_breadcrumbs')) {?><div style="padding:5px"><?php dimox_breadcrumbs();?></div><?php }}?>
<div class="menu-search-inner" style="width:270px; margin:0 !important">
<?php get_search_form()?>
</div>
<br />

    <?php /*------------------------- TITLE AND ORDERBY BLOCK ----------------------------*/ ?>   
 
	<h1 class="categoryTitle"><?php if(isset($_GET['s'])){ echo SPEC($GLOBALS['_LANG']['_search3']).": ".strip_tags($_GET['s']); }elseif( isset($_GET['search-class'])) { echo SPEC($GLOBALS['_LANG']['_search3']).": ".strip_tags($_GET['cs-all-0']); }else{ echo $GLOBALS['premiumpress']['catName']; } ?></h1>
        
       
    <?php /*------------------------- ORDER BY BOX DISPLAY ----------------------------*/ ?>   
    
	<?php if($GLOBALS['query_total_num'] > 0 && !isset($GLOBALS['setflag_article']) && !isset($GLOBALS['tag_search']) && !isset($GLOBALS['setflag_faq']) ){  echo $PPTDesign->GL_ORDERBY(); } ?>	
    
    <br /><div class="clearfix"></div>
    
    <em><?php echo $GLOBALS['query_total_num']; ?> <?php echo SPEC($GLOBALS['_LANG']['_gal1']) ?></em>    <br /><br />
    
    
    <?php /*------------------------- CUSTOM CATEGORY List by ritwik ----------------------------*/ ?>   
      <?php
//echo 'Featured programs';
$Cat_All=get_query_var('cat');
$sql="SELECT dt.name,dt.slug,dt.term_id, (SELECT slug FROM wpdp_terms wtc WHERE wtc.term_id =".$Cat_All.") AS mainslug, (SELECT count( * ) FROM `wpdp_term_relationships` pc WHERE pc.`term_taxonomy_id` = dt.term_id ) as post_count  FROM `wpdp_term_taxonomy` dtt, wpdp_terms dt WHERE dtt.parent=".$Cat_All." and dtt.taxonomy='category' and dtt.term_taxonomy_id=dt.term_id group by dt.term_id";
//$sql="SELECT dt.name,dt.slug,dt.term_id,(SELECT count(*) FROM `directory_term_relationships` pc WHERE pc.`term_taxonomy_id` = dt.term_id ) as post_count FROM `directory_term_taxonomy` dtt, directory_terms dt WHERE dtt.parent=".$Cat_All." and dtt.taxonomy='category' and dtt.term_taxonomy_id=dt.term_id group by dt.term_id";
$query=mysql_query($sql);
if(mysql_num_rows($query)){
?>

<div class="itembox">
    <div class="itembox_border">
        <table cellpadding="0" cellspacing="0" width="100%" class="middle_category_box">
            <tr>
            <?php 
            $i=0; $j=2;
            while($row=mysql_fetch_object($query)){?>
                <td width="50%">
                    <?php /*<img src="/images/arrow2.gif" />*/?>
                    <span><a href="<?php  echo get_bloginfo('url')."/".$row->mainslug."/".$row->slug?>/"><b><?php echo $row->name?></b> <em>(<?php echo $row->post_count?>)</em></a></span>
                    
                </td>
            <?php 
                $i++; 
                if($i==$j){ 
                    echo "</tr><tr>"; 
                    $j=$j+2;
                } 
             }?>
            </tr>
        </table>
    </div>
</div>
<?php }?>
    
		<?php /*------------------------- CUSTOM CATEGORY TEXT AND IMAGE ----------------------------*/ ?>   
        
    
    
    
    
        <?php if(strlen($GLOBALS['catText']) > 1){ ?>
        
        <div class="customCatText" style="padding:10px; padding-left:0px;">
        
        <?php if(strlen($GLOBALS['catImage']) > 2){ ?><img src="<?php echo $GLOBALS['catImage']; ?>" style="float:left; padding-right:20px;" /><?php } ?>
                
        <?php echo $GLOBALS['catText']; ?>
        
        </div>
            
        <?php } ?>        
        
        <div class="clearfix"></div>
    
    
    <?php /*------------------------- sub CATEGORIES BLOCK ----------------------------*/ ?>   
    
    <?php if(isset($GLOBALS['premiumpress']['catID']) && is_numeric($GLOBALS['premiumpress']['catID']) && $PPT->CountCategorySubs($GLOBALS['premiumpress']['catID']) > 0 && get_option('display_sub_categories') =="middle" ){ ?>
    
    <div class="itembox">
    
        <h2 id="sidebar-cats-sub"><?php echo SPEC($GLOBALS['_LANG']['_gal2']) ?></h2>
        
        <div class="itemboxinner">
        
        <?php echo $ThemeDesign->HomeCategories(); ?>
        
        </div>
    
    
    </div>
        
    <?php } ?>
    
    
       
    <?php /*------------------------- DISPLAY GALLERY BLOCK ----------------------------*/ ?>
        
    <div id="SearchContent">  <br /> <div class="clearfix"></div> 
         
	<?php $PPTDesign->GALLERYBLOCK(); ?>
 
	<?php /*NO RESULTS FOUND*/
    
    if($GLOBALS['query_total_num'] == 0 && isset($GLOBALS['GALLERYPAGE']) ){ ?>
   
    <p><?php echo SPEC($GLOBALS['_LANG']['_gal3']) ?></p>
    
    <p><?php wp_tag_cloud('smallest=15&largest=40&number=50&orderby=count'); ?></p>
    
    <?php } ?> 
    
    </div>
    
    
    <?php /*------------------------- PAGE NAVIGATION BLOCK ----------------------------*/ ?>   
 
    <div class="clearfix"> </div><br />
    
	<?php if($GLOBALS['query_total_num'] > 0){ ?>
    
        <ul class="pagination paginationD paginationD10"> 
           
            <?php echo $PPTFunction->PageNavigation(); ?>
             			 
        </ul>
        
	<?php } ?>
 
	<div class="clearfix"> </div><br />
    
 
	<?php /*------------------------- LEFT ADVERTING BLOCK FOR 2 COLUMN LAYOUTS ----------------------------*/ ?>    

    
	<?php if($GLOBALS['premiumpress']['display_themecolumns'] !="3"){ if(get_option("advertising_left_checkbox") =="1"){ echo "<br /><br />".$PPT->Banner("left"); } } ?>
    



</div>


<?php get_footer(); ?>