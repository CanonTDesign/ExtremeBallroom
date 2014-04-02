<?php
/**
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */
?>
<div class="main-content content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php Extreme_Ballroom_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'Extreme_Ballroom' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Extreme_Ballroom' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				<?php endif; ?>

				<footer class="entry-meta">
					<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( __( ', ', 'Extreme_Ballroom' ) );
							if ( $categories_list && Extreme_Ballroom_categorized_blog() ) :
						?>
						<span class="cat-links">
							<?php printf( __( 'Posted in %1$s', 'Extreme_Ballroom' ), $categories_list ); ?>
						</span>
						<?php endif; // End if categories ?>

						<?php
							/* translators: used between list items, there is a space after the comma */
							$tags_list = get_the_tag_list( '', __( '', 'Extreme_Ballroom' ) );
							if ( $tags_list ) :
						?>
						<span class="sep"> | </span>
						<span class="tag-links">
							<?php printf( __( 'Tagged %1$s', 'Extreme_Ballroom' ), $tags_list ); ?>
						</span>
						<?php endif; // End if $tags_list ?>
					<?php endif; // End if 'post' == get_post_type() ?>

					<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="sep"> | </span>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'Extreme_Ballroom' ), __( '1 Comment', 'Extreme_Ballroom' ), __( '% Comments', 'Extreme_Ballroom' ) ); ?></span>
					<?php endif; ?>

					<?php edit_post_link( __( 'Edit', 'Extreme_Ballroom' ), '<span class="sep"> | </span><span class="edit-link"></span>' ); ?>
				</footer><!-- .entry-meta -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div>