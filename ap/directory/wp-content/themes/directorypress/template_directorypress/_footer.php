<?php if(!isset($GLOBALS['nosidebar'])){ get_sidebar(); } ?>

 <div class="clearfix"></div>
 
    </div>    

</div> 

    <div id="footer" class="clearfix full">
    
        <div class="w_960" style="margin:0 auto;"> 
        
            <div class="b_third_col col first_col"> 
            
             <div class="prepend">
			 
			 <?php echo stripslashes(get_option("footer_text")); ?>
             
             <?php if(function_exists('dynamic_sidebar')){ dynamic_sidebar('Footer Left Block (1/3)'); } ?>
             
             </div>
             
            </div>
            
            <div class="b_third_col col"> 
            
             	<?php $ArticleData = $PPT->Articles(10); if(strlen($ArticleData) > 5){ ?>
                         
                <h3><?php echo SPEC($GLOBALS['_LANG']['_rarticles']) ?></h3>   
                             
                <ul class="recentarticles"><?php echo $ArticleData; ?></ul>
                
                <?php } ?>
                
                <?php if(function_exists('dynamic_sidebar')){ dynamic_sidebar('Footer Middle Block (2/3)'); } ?>
                
            </div>
                            
            <div class="b_third_col col last_col">                
                
                <div class="topper"><?php echo $PPT->Banner("footer");  ?></div>
                
                <?php if(function_exists('dynamic_sidebar')){ dynamic_sidebar('Footer Right Block (3/3)'); } ?>
                        
            </div> 
            
            
        <div class="clearfix"></div>
                        
        <div id="copyright" class="full">
        <?php $fpages = $PPTDesign->SYS_PAGES(true); if(strlen($fpages) > 1){ echo "<div id='fpages'><ul>".$fpages."</ul></div>"; } ?>
            <p>&copy; <?php echo date("Y"); ?> <?php echo get_option("copyright"); ?> <?php $PPT->Copyright(); ?></p>
        </div> 
                        
    
    </div> 
        
 

</div>  <!-- end WRAPPER -->

        
</div>
 

 


<?php wp_footer(); ?>

 
</body>
</html>


<!-- end WRAPPER -->
<!--<div class="footer-div">
  <div class="footer" style="text-transform:capitalize">
    <a href="/">Affiliate Marketing Blog</a> | <a href="/directory/">Affiliate Programs Directory</a> | <a href="/forum/">Affiliate Forums</a> | <a href="/contact-us.php">Advertising</a> | <a href="/contact-us.php">Contact Us</a> | <a href="/PrivacyPolicy.php">Privacy Policy</a> </div>

  <div class="cap-copy">&copy; 1997 - 2011 Affiliate Programs. All rights reserved.</div>
</div>-->
