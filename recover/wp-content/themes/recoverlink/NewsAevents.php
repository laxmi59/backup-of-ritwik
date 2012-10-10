<?php
/*
Template Name: News-And-Events
*/
get_header();
?>


<div class="container">
   
  <div class="news-events">
    <ul>
<?php
query_posts( 'cat=3');
while ( have_posts() ) : the_post();
?>

      <li>
        <div class="post_date">
        <span class="month"><?php the_time('M') ?></span><br>
          <span class="date" ><?php the_time('j') ?></span><br>
         <span class="month"><?php the_time('Y') ?></span> <br>
        </div>
        <div class="post_text">
          <h1 ><?php /*?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php */?><?php the_title(); ?><?php /*?></a><?php */?></h1>
         <?php the_content(); ?>
        </div>
      </li>
<?php
endwhile;
?>
    </ul>
    
  </div>
</div>
<?php get_footer(); ?>
