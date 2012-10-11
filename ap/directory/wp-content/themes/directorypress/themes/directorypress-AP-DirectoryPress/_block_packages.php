<?php

/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/


$packdata = get_option("packages"); $customdata = get_option("customfielddata"); $showmaps = get_option('display_googlemaps');  ?>

<?php //echo example_function_name("_block_packages.php"); ?>
<div class="padding"> 
	<div class="payicon"></div>
    <h1 style="font-size:24px"><?php //echo $GLOBALS['_LANG']['_s8']; ?>Looking for Affiliates?  You've come to the right place.</h1><br />
    <p><?php //echo $GLOBALS['_LANG']['_s9']; ?>AffiliatePrograms.com is run by Super Affiliates who know what it takes to help you grow your affiliate program. <br> Choose an option below and get your program listed in the directory.  We'll make sure that you get the results <br> you want</p><br /> 
 	<div class="grid col4" id="griddler">
	<article>
		<header>
			<hgroup class="top"><hgroup class="top"><h1>Basic Listing</h1></hgroup></hgroup>
			<hgroup class="price"><h2>$299/yr</h2></hgroup>
		</header>
		<section>
		<div class="clearfix"></div>
		<ul>
			<li class="yes">1-year Basic information Listing</li>
			<li class="yes">Listed in One Category</li>
			
		</ul>
		<div class="griddler-controls"><a class="button" href="#" onclick="document.getElementById('packageID').value='1';document.hiddenPackage.submit();">Select Plan</a></div>			
		</section>
	</article>
	
	<article class="article1">
		<header>
			<hgroup class="top"><hgroup class="top"><h1>Premium Listing</h1></hgroup></hgroup>
			<hgroup class="price"><h2>$499/yr </h2></hgroup>
		</header>
		<section style="height:330px">
		<div class="clearfix"></div>
		<ul>
			<li class="yes">1-year FULL information Listing </li>
			<li class="yes">Up to 3 categories </li>
			<li class="yes">Top Directory Placement </li>
			<li class="yes">260x180 banner ad rotation  </li>
			
			</ul>
		<div class="griddler-controls"><a class="button" href="#" onclick="document.getElementById('packageID').value='2';document.hiddenPackage.submit();">Select Plan</a></div>			
		</section>
	</article>
	<article>
		<header>
			<hgroup class="top"><hgroup class="top"><h1>Elite</h1></hgroup></hgroup>
			<hgroup class="price"><h2 style="font-size:24px; padding-top:21px">Max Exposure</h2></hgroup>
		</header>
		<section>
		<div class="clearfix"></div>
		<ul>
					<li class="yes">Multiple Listings </li>
					<li class="yes">Homepage Ad </li>
					<li class="yes">E-mail Ad to 15K+ Subscribers   </li>
					<li class="yes">Ads in Articles  </li>
					<li class="yes">Social Media Pushes </li>
					<li class="yes">Bespoke Recruitment  </li>
					
				</ul>
		<div class="griddler-controls"><a class="button" href="/contact-us.php">Contact Us</a></div>			
		</section>
	</article>
	</div>
	<?php get_sidebar(); ?>	
<?php /*?><div class="extrainfo"><?php echo stripslashes(get_option("pak_text")); ?></div>
<?php */?>
 


<form name="hiddenPackage" action="" method="post">
<input type="hidden" name="packageID" id="packageID" value="1">
</form> 

</div> 

<script type="text/javascript">
jQuery(document).ready(function() {  
	var $gridSections = jQuery("#griddler article");	
	$gridSections.hover
	(
		function()
		{
			$gridSections.removeClass("selected");
		}
	);
});
</script>
 