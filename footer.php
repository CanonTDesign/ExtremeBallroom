<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */
?>
	<hr style="max-width: 1200px; margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">

	<div class="credits max_width center" style="text-align: center;">
		&copy; <? echo date('Y'); ?> <? echo get_bloginfo('name'); ?>. Theme Designed By: <a href="http://www.canontdesign">Canon Tschikof</a>. Proudly powered by <a href="http://www.wordpress.org">WordPress <? echo get_bloginfo('version'); ?> </a>
	</div>

</div>	 

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/library/js/foundation.min.js"></script>
<script>
	jQuery.noConflict();
	jQuery(document).foundation();
	jQuery(document).ready(function(){

		jQuery('article.news').first().css("border-top", "none");

		// Abide Script
		var jQueryabide_id = jQuery('#searchform');
		jQuery(jQueryabide_id)
		.on('invalid', function () {
			var invalid_fields = jQuery(this).find('[data-invalid]');
			console.log(invalid_fields);
			jQueryabide_id.addClass('invalid')
		})
		.on('valid', function () {
			console.log('valid!');
		});

		var jQuerycontainer = jQuery('.archive_grid'),
			jQueryarticles = jQuerycontainer.children('.article'),
			timeout;

		// Home Page image alt show
		jQuery(".caption-grid").hide();
		jQuery(".trigger").on("mouseenter", function() {
			var width = jQuery(this).find('img').width()-20;
			jQuery(this).find(".caption-grid").fadeToggle().width(width);
		}).on("mouseleave", function() {
			jQuery(this).find(".caption-grid").fadeToggle();
		});

		// Archive and Serach grid and hover effects
		jQueryarticles.on('mouseenter', function(event) {
			var jQueryarticle = jQuery(this);
			clearTimeout( timeout );
			timeout = setTimeout( function() {
				if( jQueryarticle.hasClass('active') ) return false;
				jQueryarticles.not(jQueryarticle).removeClass('active').addClass('blur');
				jQueryarticle.removeClass('blur').addClass('active');
			}, 75 );
		});
		jQuerycontainer.on('mouseleave', function(event) {
			clearTimeout(timeout);
			jQueryarticles.removeClass('active blur');
		});

		var size = jQuery(window).width();
		if (size > 641){
			setTimeout( function(){
				var maxHeight = -1;
			    jQuery('.article').each(function() {
					maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
				});
				jQuery('.article').each(function() {
					jQuery(this).height(maxHeight);
				});
			}, 0);
		}
		jQuery( window ).resize(resize);
		function resize(){
			var size = jQuery(window).width();
			if (size > 641){
				var maxHeight = -1;
			    jQuery('.article').each(function() {
					maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
				});
				jQuery('.article').each(function() {
					jQuery(this).height(maxHeight);
				});
			} else {
				var height = {height: "",};
				jQuery('.article').each(function() {
					jQuery(this).css(height);
				});
			}
		};
		console.log('Foundation Framework Version ' + Foundation.version);
	});
</script>


</body>
</html>





