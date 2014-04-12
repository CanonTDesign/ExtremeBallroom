<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */
?>

<div id="Sidebar2" class="" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
		<div class="alert help">
			<p><?php _e("Please activate some Widgets.", "Extreme_Ballroom");  ?></p>
		</div>

	<?php endif; ?>

</div>