<?php
/*
Template Name: Frequently-a-q
*/
get_header();
$page_data = get_page($post->ID);
$content = apply_filters('the_content', $page_data->post_content);
echo $content;
?>
<?php get_footer(); ?>
