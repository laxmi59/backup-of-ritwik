<?php /* Template Name: searchResults*/?>
<?php get_header();?>
<div class="content-left"> 
	<div class="post-body">  
	 <h1>
		 	<?php echo htmlspecialchars_decode(get_bloginfo('name'),ENT_QUOTES); ?>
			<?php if($paged) echo " Page ".$paged;?>
		 </h1>
    	<div id="content" role="main">
			<!--<div class="menu-search">-->
				<?php /*?><?php //display_gsc_results(); ?>
				<div id="cse" style="width: 100%;">Loading</div>
				<script src="//www.google.com/jsapi" type="text/javascript"></script>
				<script type="text/javascript">
					google.load('search', '1', {language : 'en'});
					google.setOnLoadCallback(function() {
					var customSearchControl = new google.search.CustomSearchControl('005717581699513178642:zuosfmkksgm');
					customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
					customSearchControl.draw('cse');
					}, true);
				</script>
				<link rel="stylesheet" href="//www.google.com/cse/style/look/default.css" type="text/css" /><?php */?>
				<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 550;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="//www.google.com/afsonline/show_afs_search.js"></script>
			<!--</div>-->
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>