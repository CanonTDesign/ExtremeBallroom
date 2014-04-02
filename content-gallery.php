<?php
/**
 * The template for displaying posts in the Gallery post format
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 2.0
 */
?>
<div class="content-gallery">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="max_width entry-header content-gallery">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'Extreme_Ballroom' ) ); ?>
					<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Extreme_Ballroom' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content

				<!-- <footer class="entry-meta">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'Extreme_Ballroom' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
					<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="sep"> | </span>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'Extreme_Ballroom' ), __( '1 Comment', 'Extreme_Ballroom' ), __( '% Comments', 'Extreme_Ballroom' ) ); ?></span>
					<?php endif; ?>

					<?php edit_post_link( __( 'Edit', 'Extreme_Ballroom' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
				</footer> --><!-- .entry-meta -->
			</article><!-- #post-<?php the_ID(); ?>-->
			<div class="max_width">
				<?php Extreme_Ballroom_content_nav( 'nav-below' ); ?>
			</div>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
</div>