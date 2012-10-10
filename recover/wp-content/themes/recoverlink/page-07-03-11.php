<?php
session_start();
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

<?php if (is_page('home'))
	  {
	  ?>
      
      <div class="our-pholosphy-bg">
<!--Our Philosophy-->
<div class="our-pholosphy">
<h2>Our Philosophy</h2>
<p>We believe that people are inherently good and would like to do the right thing, however it's not always convenient.  RecoverLink makes it easy for everyone to return lost items.</p>
</div>
<div class="devaider"></div>
<!--Resigster-->
<div class="resigster">
<h2>Register</h2>
<p>I'd like to join today and protect my stuff.  </p>
<div class="resigster-bt"><a href="<?php echo get_option('siteurl');?>/get-started"><img src="<?php bloginfo('template_directory'); ?>/images/register.gif" ></a></div>
</div>
<div class="devaider"></div>
<!--RecoverL-link-->
<div class="recoverL-link">
<h2>RecoverLink</h2>
<p>I've found something and I'd like to help out by returning it now.</p>
<div class="recoverL-link-bt"><a href="<?php echo get_option('siteurl');?>/recoverlink"><img src="<?php bloginfo('template_directory'); ?>/images/recoverlink.gif" ></a></div>
</div>
</div>
      
      <?php } else { ?> 
      
		 <div class="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
                     <div style="float:left">side Content </div>
					<div class="entry-content" style="float:left">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				 

<?php endwhile; ?>

			</div>
            </div>
		 
<?php } ?>

<?php get_footer(); ?>
