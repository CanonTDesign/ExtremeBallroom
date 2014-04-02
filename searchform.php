<?php
/**
 * The template for displaying search forms in Extreme_Ballroom
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */
?>
<div class="acent">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" data-abide>
		<div class="row">
			<div class="small-12 columns">
				<div class="row collapse">
					<div class="small-9 columns">
						<input type="text" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'Extreme_Ballroom' ); ?>" required>
					</div>
					<div class="small-3 columns">
						<input type="submit" class="button postfix" type="button" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'Extreme_Ballroom' ); ?>">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
