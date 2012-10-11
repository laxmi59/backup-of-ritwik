<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<?php if($post->ID <> 8352 && $post->ID <> 8354){?>

	<div class="content-left"> 
	     <div class="post-body"> 

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php }else{?>
	<div class="post-body"> 
		<?php /*?><?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        	<?php //getthe_content(); ?>
		<?php endwhile; ?><?php */?>
		<?php 
		$my_postid = $post->ID;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;

		?>
	</div><!-- #content -->
<?php }?>
<?php get_footer(); ?>
