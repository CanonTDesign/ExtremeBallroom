<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

get_header(); ?>
<? if (is_category('News')){ 
} else {?>
<div class="contain-to-grid main_content max_width">
		<section id="primary" class="content-area">
			<div id="archive" class="site-content" role="main">
<? } ?>

			<?php if ( have_posts() ) : ?>
				
				<? if (is_category('News')){ ?>
				<div id="news_cat_header_drop_shadow">
					<div class="max_width" style="padding: 15px;">
					<? } else { }?>
					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category('Gallery') ){
									?>
									<span>Galleries</span>
									<?
								} elseif ( is_category('News')){
								?>
									<span><? echo bloginfo('name');?> News</span>
								<?
								} elseif ( is_category() ) {
									printf( __( 'Category Archives: %s', 'Extreme_Ballroom' ), '<span>' . single_cat_title( '', false ) . '</span>' );

								} elseif ( is_tag() ) {
									printf( __( 'Tag Archives: %s', 'Extreme_Ballroom' ), '<span>' . single_tag_title( '', false ) . '</span>' );

								} elseif ( is_author() ) {
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									*/
									the_post();
									printf( __( 'Author Archives: %s', 'Extreme_Ballroom' ), '<span class=""><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 */
									rewind_posts();

								} elseif ( is_day() ) {
									printf( __( 'Daily Archives: %s', 'Extreme_Ballroom' ), '<span>' . get_the_date() . '</span>' );

								} elseif ( is_month() ) {
									printf( __( 'Monthly Archives: %s', 'Extreme_Ballroom' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

								} elseif ( is_year() ) {
									printf( __( 'Yearly Archives: %s', 'Extreme_Ballroom' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
								} else {
									_e( 'Archives', 'Extreme_Ballroom' );

								}
							?>
						</h1>
						<?php
							if ( is_category() ) {
								// show an optional category description
								$category_description = category_description();
								if ( ! empty( $category_description ) )
									echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

							} elseif ( is_tag() ) {
								// show an optional tag description
								$tag_description = tag_description();
								if ( ! empty( $tag_description ) )
									echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
							}
						?>
					</header><!-- .page-header -->
					<? if (is_category('News')){ ?>
					</div>
				</div>
				<? } else { }?>
				
				<?php //Extreme_Ballroom_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<? if (is_category('News')){ 
					while ( have_posts() ) : the_post(); ?>
						<article class="news">
							<? if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<? } ?>
							<div class="max_width">
								<? 
								if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
								<div class="content featured">
								<? } else { ?>
								<div class="content no-featured">
								<? } ?>
									<div id="post-meta">
										<div id="post-date">
											<div id="month"><? echo get_the_date('M'); ?></div>
											<div id="year"><? echo get_the_date('Y'); ?></div>
										</div>
										<div id="post-title"><a href="<? echo get_permalink(); ?>"><? echo get_the_title(); ?></a></div>
									</div>


								
									<div class="author-date">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" ><span class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></span> <?php echo get_the_author(); ?></a> 
										<? $num_comments = get_comments_number(); if ( $num_comments >= 1) : ?> | <a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('No Comments', '1 Comment', '% Comments'); ?></a>
										<? endif; ?>
										<? if( current_user_can('edit_post')){ ?>
											 | <? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));
										} ?>
									</div>
									<hr class="divider">
									<div id="news_content" class="content">
										<?php the_content(); ?>
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
							</div>
						</article>
					<?php endwhile; ?>
				<? } else { ?>
				<ul id="archive-search_row" class="medium-block-grid-3">
				<?php if ( have_posts() ) {?>
				<?for($articles = count($posts); $articles >= 1; --$articles){ the_post();?>
					<li class="columns small-12 archive_grid">
						<article class="search-archive pointer article" onclick="window.location.assign('<? echo get_permalink(); ?>')">
							<ul>
								<li>
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
								</li>
								<li>
									<div id="article_content">
									</div>
								</li>
								<li>
									<div class="cat">
										<? $categories = count(get_the_category()); if($categories >= 1){?>
										<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
										<? } else { ?>
										<span class="cat-links">This has not been posted in a category</span>
											<? } ?>
									</div>
								</li>
								<li>
									<div class="tags">
										<? $tags = count(get_the_tags()); if ($tags >= 1){ ?>
										<span class="fi-price-tag"></span><?php the_tags( '<span>', ', ', '</span>' ); ?>
										<? } else { ?>
										There are no Tags for this post.
										<? } ?>
									</div>
								</li>
								<li>
									<div id="footer">
										<ul id="article_footer" class="small-block-grid-<? if( current_user_can('edit_post')){ ?>3<? } else { ?>2<? } ?>">
											<li><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = get_the_date('M', '', '', True); echo $my_date; ?></a></li>
											<li><a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('0', '1', '%'); ?></a></li>
											<? if( current_user_can('edit_post')){ ?><li><? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));?></li><? } ?>
										</ul>
									</div>
								</li>
							</ul>
						</article>
					</li>
				<?  } ?>
				<?php } ?>
				</ul>
				<? } ?>
				<?php //Extreme_Ballroom_content_nav( 'nav-below' ); ?>
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

				<?php else : ?>

					<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>
<? if (is_category('News')){ 
} else {?>
			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

</div>
<? } ?>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>