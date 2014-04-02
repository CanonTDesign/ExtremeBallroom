<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<div id="page" class="featured-image">
		<?php the_post_thumbnail(); ?>
	</div>
	<div id="page" class="max_width main_content-top">
		<? if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
		<div id="page-content" class="featured">
		<? } else { ?>
		<div id="page-content" class="no-featured">
		<? } ?>
			<div class="page_title"><span class="page-title"><? echo get_the_title(); ?></span></div>
			<hr class="divider">
			<div class="author-date">
				<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = the_date('F t, Y', '', '', True); echo $my_date; ?></a> | 
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" ><span class="fi-torso"></span> <?php echo get_the_author(); ?></a> 
				<? if( current_user_can('edit_post')){ ?>
				 | <? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));
				} ?>
			</div>
			<hr class="divider">
			<?php get_template_part( 'content', 'page' ); ?>
		</div>

		<?php comments_template( '', true ); ?>

	</div>
<?php endwhile; // end of the loop. ?>


<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>