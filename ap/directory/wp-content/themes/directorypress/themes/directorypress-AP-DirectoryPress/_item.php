<?php

/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/

?>

<?php
  //echo 'Featured programs';
$query=mysql_query("SELECT dt.name,dt.slug,dt.term_id FROM `wpdp_term_taxonomy` dtt, wpdp_terms dt WHERE dtt.parent=".$Cat_All." and dtt.taxonomy='category' and dtt.term_taxonomy_id=dt.term_id group by dt.term_id");
if(mysql_num_rows($query)){
?>
<div class="itembox">
<h2>Sub Categories</h2><div style="height:10px">&nbsp;</div>
<div class="right-side-logo">
<?php  while($row=mysql_fetch_object($query)){?>
        <div class="logo-img"><img src="/directory/wp-content/plugins/custom-widgets/images/post-a-bg.png" /></div>
        <div class="logo-text">
                <a href="<?php echo $row->slug?>/"><b><?php echo $row->name?></b></a>
        </div>
 <?php }?>
</div>
</div>
<?php }?>
<div class="itembox <?php if(get_post_meta($post->ID, "featured", true) == "yes"){?>hightlighted<?php }else{ ?><?php } ?>">
    <?php if(get_post_meta($post->ID, "featured", true)== "no"){ echo '<div class="itembox_border">';}?>
<?php //echo example_function_name("_item.php"); ?>
    
    <h1 class="icon-search-item"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1> <?php if(function_exists('wp_gdsr_render_article')){ wp_gdsr_render_article(5);}  ?>
 
        <div class="itemboxinner">    
    
            <div class="post clearfix"> 
                                          
                <div class="thumbnail-large"> 
                
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <img src="<?php echo $PPT->Image($post->ID,"url","&amp;w=200"); ?>" class="listImage" alt="<?php the_title(); ?>" />
                    </a> 
                    
                 	<div class="info">
                    
						<?php if($custom1 != ""){?><span><?php echo get_option("display_custom_display1"); ?> <?php echo $custom1; ?></span> <?php } ?>
                        <?php if($custom2 != ""){?> <span><?php echo get_option("display_custom_display2"); ?> <?php echo $custom2; ?></span> <?php } ?>
               
               		</div>   
                    
                </div> 
                
               
                <div class="text"> 
                
                    <?php //the_excerpt(); 
					echo Custom_content_display($post->ID);
					?> 
                    
                    <div class="tags clearfix"> <?php the_tags( '', '', ''); ?></div>
                
                    <div class="meta clearfix"> 
					
                           <a href="<?php the_permalink(); ?>"><?php echo $GLOBALS['_LANG']['_mored']; ?></a>
                           
            				<?php if($GLOBALS['directorypress']['vps'] == "yes" && strlen($link) > 2){ ?>
                            <a href="<?php echo $link; ?>" title="<?php the_title(); ?>" target="_blank" <?php if($GLOBALS['premiumpress']['nofollow'] =="yes"){ ?>rel="nofollow"<?php } ?>>Join Now<?php //echo $GLOBALS['_LANG']['_vps']; ?></a> 
                            <?php } ?>
            
            				<?php if(get_option("display_search_comments") =="yes"){ comments_popup_link($GLOBALS['_LANG']['_nocomments'], $GLOBALS['_LANG']['_1comment'], '% '.$GLOBALS['_LANG']['_comments']); } ?>
                    
                    </div>  
                    
                </div>
            
            </div> 
     
    
        </div>
<?php if(get_post_meta($post->ID, "featured",  true)== "no"){ echo '</div>';}?>  
</div>