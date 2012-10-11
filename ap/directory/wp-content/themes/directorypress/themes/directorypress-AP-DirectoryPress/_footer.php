<?php

/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/
 
$customHttpPath= "http://www.affiliateprograms.com";


if(!isset($GLOBALS['nosidebar'])){ get_sidebar(); } ?>
<?php if($post->ID <> '2211' && $post->ID <> '2208' && $post->ID <> '2213'){?>
<?php if(is_page()=="submit" && $_POST['packageID'] == ''){?>
<div style="clear:both; float:left">
<p>Want to get more information on the packages above?  Feel free to get in touch: </p>
<ul>
	<li><strong>Address:</strong> 32 Discovery, Suite 270 Irvine, CA 92618 USA</li>
	<li><strong>Phone:</strong> 949-861-4282 | <strong>Fax:</strong> 949-333-2275</li>
  	<li><strong>Email:</strong> <a href="mailto:advertise@affiliateprograms.com">advertise@affiliateprograms.com </a></li>
</ul>
</div>
<?php }?>
<?php }?>
 
    </div> <!-- end CONTENT -->

</div> <!-- end SIDEBAR -->
</div>

</div>
<div class="bottom-shadow"></div>
</div>
</div>  <!-- end WRAPPER -->
</div>
<?php wp_footer(); ?>
</div>
</div>
<div class="con-btm-bg"></div>
</div>
</div>

<!--footer-main start here-->
<div class="footer-main">
<div class="footer">
<div class="ft-top">
<div class="ft-logo"><img src="/directory/wp-content/themes/directorypress/images/logo-btm.jpg" width="291" height="18" alt="" /></div>
<div class="social-icons">
  <a href="http://twitter.com/#!/AffProgs"><img src="/directory/wp-content/themes/directorypress/images/t-icon.png" alt="" /></a>
  <a href="http://www.facebook.com/affiliateprogramsdotcom"><img src="/directory/wp-content/themes/directorypress/images/f-icon.png" alt="" /></a>
  <a href="http://www.linkedin.com/groups?gid=134807"><img src="/directory/wp-content/themes/directorypress/images/in-icon.png" alt="" /></a>

  </div>
<ul class="ft-top-links">
<li><a href="<?php echo $customHttpPath;?>/contact-us.php"><span>CONTACT</span></a></li>
<li style="padding-right:10px;"><a href="<?php echo $customHttpPath;?>/PrivacyPolicy.php"><span>Privacy Policy</span></a></li>
<li><a href="<?php echo $customHttpPath;?>/directory/package-info/" class="active">Advertise</a></li>
</ul>
</div>
<div class="ft-btm-links">
<div class="ft-btm-box"><h4><a href="<?php echo $customHttpPath;?>/blog/affiliate-programs/">AFFILIATE PROGRAMS</a></h4>
<ul class="ft-sub-links">
<li><a href="<?php echo $customHttpPath;?>/directory/">Affiliate Program Directory</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/affiliate-networks/">Affiliate Networks</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/finding-a-niche/">Finding a Niche</a></li>
<li><a href="<?php echo $customHttpPath;?>/forum/">Affiliate Forums</a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="<?php echo $customHttpPath;?>/blog/intro-to-affiliate-marketing/">MAKE MONEY</a></h4>
<ul class="ft-sub-links">
<li><a href="<?php echo $customHttpPath;?>/blog/intro-to-affiliate-marketing/">Introduction to Affiliate Marketing</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/make-first-sales-affiliate-marketing/">Your first $500 </a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/affiliate-marketing-definitions/">Affiliate Marketing Glossary</a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="<?php echo $customHttpPath;?>/blog/lessons/">LESSONS</a></h4>
<ul class="ft-sub-links">
<li><a href="<?php echo $customHttpPath;?>/blog/the-basics/">Affiliate Marketing 101</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/site-building-design/">Site Building & Design</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/seo/">SEO</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/ppc/">PPC</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/e-mail-marketing/">E-mail Marketing</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/lessons-social-media/">Social Media</a></li>
<li><a href="<?php echo $customHttpPath;?>/blog/lessons-content-creation/">Content Creation </a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="<?php echo $customHttpPath;?>/blog/news/">NEWS</a></h4></div>
<div class="ft-btm-box"><h4><a href="<?php echo $customHttpPath;?>/blog/product-reviews/">Product Reviews</a></h4></div>
</div>

<div class="copyright">&copy; 2012 AffiliateMedia, Inc. All rights reserved</div></div>
</div>

<!-- Google anlytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." :
"http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<?php /*?><!-- PageTracker  -->
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2140856-1");
<?php if(isset($_POST['action']) && $_POST['action'] == "step1"){?> 
pageTracker._trackPageview("/funnel_add_listing/step2.html"); 
<?php }elseif(isset($_POST['step3'])){?>
pageTracker._trackPageview("/funnel_add_listing/step3.html"); 
<?php }elseif(!isset($_POST['action']) && $_POST['packageID'] <> ''){?>
pageTracker._trackPageview("/funnel_add_listing/step1.html"); 
<?php }elseif($_POST['action'] == '' && $_POST['packageID'] == '' && is_page()=="submit"){?>
pageTracker._trackPageview("/funnel_add_listing/packages-select.html"); 
<?php }else{?>
pageTracker._trackPageview(); 
<?php }?>
} catch(err) {}</script><?php */?>
<!-- PageTracker  -->
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2140856-1");
<?php if($post->ID == '2211'){?> 
pageTracker._trackPageview("/funnel_add_listing/step1.html"); 
<?php }elseif($post->ID == '2208'){?>
pageTracker._trackPageview("/funnel_add_listing/packages-select.html"); 
<?php }else{?>
pageTracker._trackPageview(); 
<?php }?>
} catch(err) {}</script>


<!-- Crazy egg -->
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName('script')[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0008/5400.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
</body>
</html>