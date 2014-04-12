<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */
?>


<div class="row sidebar" style="max-width: 1200px;">
	<!-- <div id="secondary" class="widget-area" role="complementary"> -->
		<?php do_action( 'before_sidebar' ); ?>
		<?php  // if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		
		<!-- <div id="archives/Account" class="widget medium-3 columns">
				<h2 class="widget-title"><?php _e( 'Archives', 'Extreme_Ballroom' ); ?></h2>
				<ul>
					<?php //wp_get_archives( 'type=monthly&limit=4' ); ?>
				</ul>
		</div> -->
		<div id="meta" class="widget medium-4 columns">
			<h1 class="widget-title white"><?php _e( 'News', 'Extreme_Ballroom' ); ?></h1>
			<ul>
				<?php
					//$args = array( 'numberposts' => '4' );
					//$recent_posts = wp_get_recent_posts( $args );
					//foreach( $recent_posts as $recent ){
						//echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
					//}
				?>
				<?php query_posts('category_name=News&showposts=4'); ?>
				<?php while (have_posts()) : the_post(); ?>
			        <li><a href="<?php the_permalink(); ?>">
			          <?php the_title(); ?>  
			          </a>  </li>
			        <?php endwhile; ?>
			</ul>
		</div>
		<div id="admin_links" class="medium-4 columns">
			<h1 class="widget-title white"><?php _e( 'Account', 'Extreme_Ballroom' ); ?></h1>
			<ul>
				<?
				$user = wp_get_current_user();
				if ( is_user_logged_in() ) {?>
				    <li id="username" class="font_white" style="padding: 8px 5px 8px 10px;"><? $current_user = wp_get_current_user(); if ( ($current_user instanceof WP_User) ) { echo get_avatar( $current_user->user_email, 32 ); }?><? echo 'Welcome, ' . $user->user_login; ?></li>
				    <li><a href="<? echo bloginfo( 'url' );?>/wp-admin">Dashboard</a></li>
				    <li><a href="<? echo wp_logout_url('');?>">Logout</a></li>
				<? } else {?>
				    <li><a href="<? echo wp_login_url('');?>">Login</a></li>
				<? } ?>
				<?php 
				//wp_register(); 
				?>
				<!-- <li><?php //wp_loginout(); ?></li> -->
			</ul>
		</div>
		<div id="search_social" class="medium-4 columns">
			<div id="search" class="widget widget_search ">
				<?php get_search_form(); ?>
			</div>
			<div id="social_buttons">
				<script type="text/javascript">
				function facebook(){
					window.location.assign("<?php echo get_theme_mod('Extreme_Ballroom_facebook_link_settings', 'default_value'); ?>")
				}
				function twitter(){
					window.location.assign("<?php echo get_theme_mod('Extreme_Ballroom_twitter_link_settings', 'default_value'); ?>")
				}
				function youtube(){
					window.location.assign("<?php echo get_theme_mod('Extreme_Ballroom_youtube_link_settings', 'default_value'); ?>")
				}
				</script>
				<?php
					$socialON=get_theme_mod( 'Extreme_Ballroom_social_settings', 'default_value');
					$facebookON=get_theme_mod('Extreme_Ballroom_facebook_settings', 'default_value');
					$facebooklink=get_theme_mod('Extreme_Ballroom_facebook_link_settings', 'default_value');
					$twitterON=get_theme_mod('Extreme_Ballroom_twitter_settings', 'default_value');
					$twitterLink=get_theme_mod('Extreme_Ballroom_twitter_link_settings', 'default_value');
					$youtubeON=get_theme_mod('Extreme_Ballroom_youtube_settings', 'default_value');
					$youtubeLink=get_theme_mod('Extreme_Ballroom_youtube_link_settings', 'default_value');
					if ( $socialON == 'true' &&($facebookON == 'true' || $twitterON == 'true' || $youtubeON == 'true' )){ ?>
						<h1 class="widget-title white"><?php _e( 'Follow Us:', 'Extreme_Ballroom'); ?></h1>
							<?php
								if ($facebookON == 'true' && $twitterON == 'true' && $youtubeON == 'true'){
							?>
								<div class="small-4 columns social facebook" onclick="facebook()"><span class="glyphicon glyphicon-facebook-white"></span></div>
								<div class="small-4 columns social twitter" onclick="twitter()"><span class="glyphicon glyphicon-twitter-white"></span></div>
								<div class="small-4 columns social youtube" onclick="youtube()"><span class="glyphicon glyphicon-youtube-white"></span></div>

							<?php } else if ($facebookON == 'true' && $twitterON == 'true'){ ?>

								<div class="small-6 columns social facebook" onclick="facebook()"><span class="glyphicon glyphicon-facebook-white"></span></div>
								<div class="small-6 columns social twitter" onclick="twitter()"><span class="glyphicon glyphicon-twitter-white"></span></div>

							<?php } else if ($facebookON == 'true' && $youtubeON == 'true'){ ?>

								<div class="small-6 columns social facebook" onclick="facebook()"><span class="glyphicon glyphicon-facebook-white"></span></div>
								<div class="small-6 columns social youtube" onclick="youtube()"><span class="glyphicon glyphicon-youtube-white"></span></div>

							<?php } else if ($twitterON == 'true' && $youtubeON == 'true'){ ?>

								<div class="small-6 columns social twitter" onclick="twitter()"><span class="glyphicon glyphicon-twitter-white"></span></div>
								<div class="small-6 columns social youtube" onclick="youtube()"><span class="glyphicon glyphicon-youtube-white"></span></div>
							
							<?php } else if ($facebookON == 'true'){ ?>

								<div class="small-12 columns social facebook" onclick="facebook()"><span class="glyphicon glyphicon-facebook-white"></span></div>

							<?php } else if ($twitterON == 'true'){ ?>

								<div class="small-12 columns social twitter" onclick="twitter()"><span class="glyphicon glyphicon-twitter-white"></span></div>

							<?php } else if ($youtubeON == 'true'){ ?>

								<div class="small-12 columns social youtube" onclick="youtube()"><span class="glyphicon glyphicon-youtube-white"></span></div>

							<?php } ?>
				<?php
					} 
				?>
			</div>
		</div>
		<?php //endif; // end sidebar widget area ?>
	<!-- </div> --><!-- #secondary .widget-area -->

	<!--div id="tertiary" class="widget-area" role="supplementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>--><!-- #tertiary .widget-area -->
</div>