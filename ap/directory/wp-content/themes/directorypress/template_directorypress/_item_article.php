<?php $post = $GLOBALS['post']; ?>

<li <?php if($featured == "yes"){ ?>class="featured"<?php } ?> <?php if($GLOBALS['counter'] == 3){ ?>style="margin-right:0px;"<?php $GLOBALS['counter']=0; } ?>>
 
    <div class="content_block">
    
    <?php if(strlen(get_post_meta($post->ID, 'images', true)) > 1){ ?>
         <a href="<?php echo get_permalink($GLOBALS['post']->ID); ?>" 
		 <?php if($GLOBALS['premiumpress']['analytics_tracking'] =="yes"){ ?>onclick="pageTracker._trackEvent('ARTICLE', 'Gallery View', '<?php echo $GLOBALS['post']->post_title; ?>');"<?php } ?>>
        
         <img class="top" src="<?php echo $PPT->Image($post,"url","&amp;w=180&amp;h=145"); ?>" alt="<?php echo $GLOBALS['post']->post_title; ?>" />
         
         </a>
     <?php } ?>
        
            <h3><a href="<?php echo get_permalink($GLOBALS['post']->ID); ?>" title="<?php echo $GLOBALS['post']->post_title; ?>"><?php echo $GLOBALS['post']->post_title; ?></a></h3>
            
            <p><?php echo $post->post_excerpt; ?></p>            
                 
    </div>

</li>