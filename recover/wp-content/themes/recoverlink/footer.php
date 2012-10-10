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
	  

 <div class="footer">
  <ul>
    <li><a href="<?php echo get_option('siteurl');?>">Home</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/about">About</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/faqs">FAQs</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/news-events">Latest News</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/contactus">Contact Us</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/get-started">Register</a></li>
    <li>|</li>
    <li><a href="<?php echo get_option('siteurl');?>/get-started">Sign-In</a></li>
  </ul>
  <p>© 2011 www.recoverlink.com</p>
</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
