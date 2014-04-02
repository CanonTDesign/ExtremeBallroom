<?php
/**
 * Template Name: Page w/ Featured Image
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>

<div class="max_width">
<?php while ( have_posts() ) : the_post(); ?>

	<article class="search-archive pointer article" onclick="window.location.assign('<? echo get_permalink(); ?>')">
		<div class="featured-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<? 
		if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
			<div class="content featured">
		<? } else { ?>
			<div class="content no-featured">
		<? } ?>
			<div class="post_title"><h1><? echo get_the_title(); ?></h1></div>
		
			<div class="author-date">
				<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = the_date('M t, Y', '', '', True); echo $my_date; ?></a> | 
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" ><span class="fi-torso"></span> <?php echo get_the_author(); ?></a> 
				<? $num_comments = get_comments_number(); if ( $num_comments >= 1) : ?> | <a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('No Comments', '1 Comment', '% Comments'); ?></a>
				<? endif; ?>
				<? if( current_user_can('edit_post')){ ?>
					 | <? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));
				} ?>
			</div>
			<? 
			$categories = count(get_the_category());
			if($categories >= 1){?>
			<hr class="divider">
				<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
			<? } ?>
			<?
			$tags = count(get_the_tags());
			if ($tags >= 1){?>
			<hr class="divider">
				<?php the_tags( '<span class="tag-links">', '', '</span>' ); ?>
			<? } ?>
		</div>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; // end of the loop. ?>
</div>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>