<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
</div>
<div class="con-btm-bg"></div>
</div>
</div>

<!--footer-main start here-->
<div class="footer-main">
<div class="footer">
<div class="ft-top">
<div class="ft-logo"><img src="<?php bloginfo('template_url'); ?>/images/logo-btm.jpg" width="291" height="18" alt="" /></div>
<div class="social-icons">
  <a href="https://twitter.com/#!/AffProgs"><img src="<?php bloginfo('template_url'); ?>/images/t-icon.png" alt="" /></a>
  <a href="http://www.facebook.com/affiliateprogramsdotcom"><img src="<?php bloginfo('template_url'); ?>/images/f-icon.png" alt="" /></a>
  <a href="http://www.linkedin.com/groups?gid=134807"><img src="<?php bloginfo('template_url'); ?>/images/in-icon.png" alt="" /></a>
  </div>
<ul class="ft-top-links">

<li><a href="/contact-us.php"><span>CONTACT</span></a></li>
<li style="padding-right:10px;"><a href="/PrivacyPolicy.php"><span>Privacy Policy</span></a></li>
<li><a href="/directory/package-info/" class="active">Advertise</a></li>
</ul>
</div>
<div class="ft-btm-links">
<div class="ft-btm-box"><h4><a href="/blog/affiliate-programs/">AFFILIATE PROGRAMS</a></h4>
<ul class="ft-sub-links">
<li><a href="/directory/">Affiliate Program Directory</a></li>
<li><a href="/blog/affiliate-networks/">Affiliate Networks</a></li>
<li><a href="/blog/finding-a-niche/">Finding a Niche</a></li>
<li><a href="/forum/">Affiliate Forums</a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="/blog/intro-to-affiliate-marketing/">MAKE MONEY</a></h4>
<ul class="ft-sub-links">
<li><a href="/blog/intro-to-affiliate-marketing/">Introduction to Affiliate Marketing</a></li>
<li><a href="/blog/make-first-sales-affiliate-marketing/">Your first $500 </a></li>
<li><a href="/blog/affiliate-marketing-definitions/">Affiliate Marketing Glossary</a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="/blog/lessons/">LESSONS</a></h4>
<ul class="ft-sub-links">
<li><a href="/blog/the-basics/">Affiliate Marketing 101</a></li>
<li><a href="/blog/site-building-design/">Site Building & Design</a></li>
<li><a href="/blog/seo/">SEO</a></li>
<li><a href="/blog/ppc/">PPC</a></li>
<li><a href="/blog/e-mail-marketing/">E-mail Marketing</a></li>
<li><a href="/blog/lessons-social-media/">Social Media</a></li>
 <li><a href="/blog/lessons-content-creation/">Content Creation </a></li>
</ul>
</div>
<div class="ft-btm-box"><h4><a href="/blog/news/">NEWS</a></h4></div>
<div class="ft-btm-box"><h4><a href="/blog/product-reviews/">Product Reviews</a></h4></div>
</div>

<div class="copyright">&copy; 2012 AffiliateMedia, Inc. All rights reserved</div></div>
</div>
<!--footer-main end here-->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<?php if(!isset($_COOKIE['ApAutopilotPopup']) && $_COOKIE['ApAutopilotPopup']=="" && $post->ID <> 8352 && $post->ID <> 8354){?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/popup/popupjquery.ui.all.css" type="text/css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery-1.5.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.position.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/popup/jquery.ui.dialog.js"></script>
	
<script type="text/javascript">
	jQuery(document).ready(function() {
		var exdate=new Date();
        exdate.setDate(exdate.getDate() + 365);
		document.cookie = "ApAutopilotPopup=2;path=/;expires="+exdate.toUTCString();
		jQuery("#dialog").dialog({
			width:570,
    		open: function (event, ui){
	        	$('#email1').blur();
    	    	$(this).scrollTop(0); 
		    }
		});
		//document.getElementById("opacitypopup").style.display = 'none';
        //document.getElementById("whitepaper").style.display = 'block';
	});
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
	function PopupNewshomeFunction1(reg){
		if(email(reg.emailpopindex)){return false}
		var exdate=new Date();
        exdate.setDate(exdate.getDate() + 365);
		document.cookie = "newpopap=1;expires="+exdate.toUTCString();
		document.getElementById("opacitypopup").style.display = 'none';
        document.getElementById("whitepaper").style.display = 'block';
		reg.submit();
	}
		</script>


<div class="ui-dialog-content ui-widget-content" id="dialog" style="width: auto; min-height: 116.633px; height: auto;">
<div class="pop-left">
<img src="<?php bloginfo('template_url'); ?>/images/cont-left-img.png" alt="" />
</div>
<div class="pop-right">  
<h2>Enter Your Email Address <br />And We'll Send Your Free <br /> eBook Right Now!</h2>
<form method="post" name="frm1" onsubmit="return PopupNewshomeFunction1(this)" action="<?php echo bloginfo('url') ?>/awebnewsletter/">
<div class="rt-form"><input type="text" name="emailpopindex" id="emailpopindex" placeholder="Your Email Address..."  class="textfill">
<input type="hidden" name="subtype" value="popup">
<div class="submit"><input type="image" src="<?php bloginfo('template_url'); ?>/images/get-instant-btn.png"></div></div>
</form>
<div class="privacy-here">We hate spam as much as you do. <br> 
Please review  our <a href="/PrivacyPolicy.php" target="_blank">Privacy Policy</a> Here.</div>
</div>
</div>
<?php /*?><div id="dialog">
<div class="p-content-main">
<div class="p-top-bg"></div>
<div class="p-contentarea">
<p>AffiliatePrograms.com wants to serve you better!</p>
<p>Take this survey and you will be entered<br />
<span class="btm-line">to <strong>WIN a</strong></span> <strong><em>$100 Amazon Gift Card!</em></strong></p>
<a href="http://www.affiliateprograms.com/blog/affiliateprograms-audience-feedback/" class="survey-btn"><img src="<?php bloginfo('template_url'); ?>/images/popup/take-survey-btn.png" alt="" /></a>
</div>
<div class="p-btm-bg"></div>
</div>
</div><?php */?>
<?php }?>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'affiliateprograms'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
<?php if(!is_preview()) { ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." :
"http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2140856-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<?php } ?>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName('script')[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0008/5400.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);

</script>
</body>
</html>
