<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>
<div class="main_content">
<?php
	if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

		endwhile;
		// Previous/next post navigation.
		Extreme_Ballroom_content_nav( 'nav-below' ); 

	else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

	endif;
?>

</div>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>




