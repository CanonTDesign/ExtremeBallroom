<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area max_width" style="padding: 15px;">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! You took the wrong step.', 'Extreme_Ballroom' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It looks like that step was not found. Maybe try searching for it while we fix this error', 'Extreme_Ballroom' ); ?></p>

					<?php get_search_form(); ?>
				</div>
				<div id="widgets" class="row">
					<div class="columns medium-3">
						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
					</div>
					<div class="widget columns medium-3">
						<h2 class="widgettitle"><?php _e( 'Categories', 'Extreme_Ballroom' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 5 ) ); ?>
						</ul>
					</div><!-- .widget -->
					<div class="columns medium-3">
						<?php
						/* translators: %1$s: smilie */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'Extreme_Ballroom' ), convert_smilies( '' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=2', "after_title=</h2>$archive_content" );
						?>
					</div>
					<div class="columns medium-3">
						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div>

<div id="footer-md" class="footer_acent"></div>
<div id="footer-bt" class="footer_container">
	<div class="container">
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>