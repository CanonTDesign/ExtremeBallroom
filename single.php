<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); 

				get_template_part( 'content', get_post_format()); 

				
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
				
			endwhile; // end of the loop. ?>

			

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>