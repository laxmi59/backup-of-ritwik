<?php
/*
Template Name: Contact Form
*/
get_header(); ?>

<div class="content-left"> 
	     <div class="post-body">  
		  <h1>
		 	<?php echo htmlspecialchars_decode(get_bloginfo('name'),ENT_QUOTES); ?>
			<?php if($paged) echo " Page ".$paged;?>
		 </h1>
    <div id="content" role="main">
	<script type="text/javascript">var host = (("https:" == document.location.protocol) ? "https://secure." : "http://");document.write(unescape("%3Cscript src='" + host + "wufoo.com/scripts/embed/form.js' type='text/javascript'%3E%3C/script%3E"));</script>

<script type="text/javascript">
var m7x3p9 = new WufooForm();
m7x3p9.initialize({
'userName':'ramaritwik', 
'formHash':'m7x3p9', 
'autoResize':true,
'height':'651'});
m7x3p9.display();
</script>
 
	</div>
    </div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
