<?php
/**
 * Template Name: Blank Page
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', 'page' ); ?>

<?php endwhile; // end of the loop. ?>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>