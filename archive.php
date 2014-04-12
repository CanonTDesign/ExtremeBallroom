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
<?php if ( have_posts() ) : ?>
<div class="max_width">
	<header class="page-header page-header-landmark">
		<h1 class="page-title landmark archive">
			<span><?php
			if ( is_category('Gallery') ){
			?>
			<b>Galleries</b>
			<?
			} elseif ( is_category('News')){
			?>
			<b><? echo bloginfo('name');?> News</b>
			<?
			} elseif ( is_category() ) {
			printf( __( 'Category Archives: %s', 'Extreme_Ballroom' ), '<b>' . single_cat_title( '', false ) . '</b>' );

			} elseif ( is_tag() ) {
			printf( __( 'Tag Archives: %s', 'Extreme_Ballroom' ), '<b>' . single_tag_title( '', false ) . '</b>' );

			} elseif ( is_author() ) {
			/* Queue the first post, that way we know
			* what author we're dealing with (if that is the case).
			*/
			the_post();
			printf( __( 'Author Archives: %s', 'Extreme_Ballroom' ), '<b><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></b>' );
			/* Since we called the_post() above, we need to
			* rewind the loop back to the beginning that way
			* we can run the loop properly, in full.
			*/
			rewind_posts();

			} elseif ( is_day() ) {
			printf( __( 'Daily Archives: %s', 'Extreme_Ballroom' ), '<b>' . get_the_date() . '</b>' );

			} elseif ( is_month() ) {
			printf( __( 'Monthly Archives: %s', 'Extreme_Ballroom' ), '<b>' . get_the_date( 'F Y' ) . '</b>' );

			} elseif ( is_year() ) {
			printf( __( 'Yearly Archives: %s', 'Extreme_Ballroom' ), '<b>' . get_the_date( 'Y' ) . '</b>' );
			} else {
			_e( 'Archives', 'Extreme_Ballroom' );

			}
			?>
		</span>
		</h1>
		<?php if ( is_category() ) {
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
</div>


<? endif; ?>
<? //if (is_category('News')){ ?>
<div class="row" style="max-width: 1200px; padding: 20px 0 0 0;">
	<div class="large-9 columns">
	<!--div class="contain-to-grid main_content large-8"-->
<? //} else {?>
<!-- <div class="contain-to-grid main_content"> -->
		<!-- <section id="primary" class="content-area"> -->
			<!-- <div id="archive" class="site-content" role="main"> -->
<? //} ?>

			<?php if ( have_posts() ) : ?>
				
				
				
				<?php //Extreme_Ballroom_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<? if (is_category('News')){ 
					while ( have_posts() ) : the_post(); ?>
						<article id="post-news" class="news">
							<? if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<? } ?>
							<div class="content">
								<header>
									<div id="post-title"><a href="<? echo get_permalink(); ?>"><? echo get_the_title(); ?></a></i></div>
									<div id="post-meta">
										<div id="post-date">
											Posted on <? echo get_the_date('F j, Y'); ?>, by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
										</div>
									</div>
								</header>

								<div id="body">
									<?php the_content(); ?>
									
								</div>
								<div class="tags">
										<?
										$tags = count(get_the_tags());
										if ($tags >= 1){?>
											<?php the_tags( 'Tagged: ', ', ', '' ); ?>
										<? } elseif ($tags <= 0) { ?>
											This Post hasn't been tagged
										<? } ?>
									</div>
							</div>
							<footer>
								<div id="footer">
									<ul id="article_footer" class="small-block-grid-<? if( current_user_can('edit_post')){ ?>3<? } else { ?>2<? } ?>">
										<li><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = get_the_date('M', '', '', True); echo $my_date; ?></a></li>
										<li><span data-tooltip data-options="disable_for_touch:false" class="has-tip tip-bottom" title="<?

											if ( comments_open() ){
												echo 'Leave Comment';
											} else {
												echo 'Comments Closed';
											}
												
											?>"><a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('0', '1', '%'); ?></a></span></li>
										<? if( current_user_can('edit_post')){ ?><li><? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));?></li><? } ?>
									</ul>
								</div>
							</footer>
						</article>
					<?php endwhile; ?>
				<? } else { ?>

				<ul id="archive-search_row" class="medium-block-grid-2">
				<?php if ( have_posts() ) {?>
				<?for($articles = count($posts); $articles >= 1; --$articles){ the_post();?>
					<li class="columns small-12 archive_grid">
						<article id="search-archive" class="search-archive pointer article" onclick="window.location.assign('<? echo get_permalink(); ?>')">
							<? if ( strlen( $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ) ) { ?>
							<div class="featured-image">
								<?php the_post_thumbnail(); ?>
							</div>
							<? } ?>
							<div class="content">
								<header>
									<div id="post-title"><a href="<? echo get_permalink(); ?>"><? echo get_the_title(); ?></a></i></div>
									<div id="post-meta">
										<div id="post-date">
											Posted on <? echo get_the_date('F j, Y'); ?>, by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
										</div>
									</div>
								</header>
								<div class="tags">
									<?
									$tags = count(get_the_tags());
									if ($tags >= 1){?>
										<?php the_tags( 'Tagged: ', ', ', '' ); ?>
									<? } ?>
								</div>
							</div>
							<footer>
								<div id="footer">
									<ul id="article_footer" class="small-block-grid-<? if( current_user_can('edit_post')){ ?>3<? } else { ?>2<? } ?>">
										<li><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span class="fi-calendar"></span> <?php $my_date = get_the_date('M', '', '', True); echo $my_date; ?></a></li>
										<li><span data-tooltip data-options="disable_for_touch:false" class="has-tip tip-bottom" title="<?

											if ( comments_open() ){
												echo 'Leave Comment';
											} else {
												echo 'Comments Closed';
											}
												
											?>"><a href="<? echo get_permalink(); ?>#comments"><span class="fi-comment"></span> <? echo comments_number('0', '1', '%'); ?></a></span></li>
										<? if( current_user_can('edit_post')){ ?><li><? edit_post_link( __( '<span class="fi-clipboard-pencil"></span> Edit', 'Extreme_Ballroom' ));?></li><? } ?>
									</ul>
								</div>
							</footer>
						</article>
					</li>
				<?  } ?>
				<?php } ?>
				</ul>
				<? } ?>
				<?php //Extreme_Ballroom_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>

<? //if (is_category('News')){ ?>
				</div>
				<div class="sidebar large-3 columns">
					<?php if ( dynamic_sidebar('sidebar-1') ) : else : endif; ?>
				</div>
			</div>
<? //} else {?>
			<!-- </div>#content .site-content -->
		<!-- </section>#primary .content-area -->

<!-- </div> -->
<? //} ?>
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