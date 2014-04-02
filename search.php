<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>
<div class="main_content">
		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Extreme_Ballroom' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<!-- Loop Starts Here -->
				<ul id="archive-search_row" class="medium-block-grid-3 grid-container">
					<?php if ( have_posts() ) {?>
						<!-- <div id="archive-search_row" class="row grid-container" style="padding: 0"> --> 
							
							<?for($articles = count($posts); $articles >= 1; --$articles){ the_post();?>
								<li class="columns small-12 archive_grid">
									<article class="search-archive pointer article" onclick="window.location.assign('<? echo get_permalink(); ?>')">
										<div id="header">
											<div class="featured-image">
												<?php the_post_thumbnail(); ?>
											</div>
											<? if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
											<div class="content featured">
											<? } else { ?>
											<div class="content no-featured">
											<? } ?>
												<div class=""><h1><? echo get_the_title(); ?></h1></div>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" ><span class="fi-torso"></span> <?php echo get_the_author(); ?></a> 
											</div>
										</div>
										
										<div id="article_content">
											<!-- <div>
											
											</div> -->
										</div>
										<div class="cat">
											<? $categories = count(get_the_category()); if($categories >= 1){?>
											<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
											<? } else { ?>
											<span class="cat-links">This has not been posted in a category</span>
												<? } ?>
										</div>
										<div class="tags">
											<? $tags = count(get_the_tags()); if ($tags >= 1){ ?>
											<span class="fi-price-tag"></span><?php the_tags( '<span>', ', ', '</span>' ); ?>
											<? } else { ?>
											There are no Tags for this post.
											<? } ?>
										</div>
										<div id="footer">
											<ul id="article_footer" class="small-block-grid-<? if( current_user_can('edit_post')){ ?>3<? } else { ?>2<? } ?>">
												<li><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = get_the_date('M, t', '', '', True); echo $my_date; ?></a></li>
												<li><a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('0', '1', '%'); ?></a></li>
												<? if( current_user_can('edit_post')){ ?><li><? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));?></li><? } ?>
											</ul>
										</div>
										
									</article>
								</li>
							<?  } ?>
						<!-- </div> -->
					<?php } ?>
				</ul>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

</div>
<? 
global $wp_query;
if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="pagnation">
	<div id="pagenation" class="max_width">
		<center>
	    <?PHP
	        global $wp_query;
	        $big = 999999999; // need an unlikely integer
	        $args = array(
	            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	            'format' => '?page=%#%',
	            'total' => $wp_query->max_num_pages,
	            'current' => max( 1, get_query_var( 'paged') ),
	            'show_all' => false,
	            'end_size' => 3,
	            'mid_size' => 2,
	            'prev_next' => True,
	            'prev_text' => __('Previous'),
	            'next_text' => __('Next'),
	            'type' => 'list',
	            );
	        echo paginate_links($args);
	    ?>
		</center>
	</div>
</div>
<? endif; ?>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>