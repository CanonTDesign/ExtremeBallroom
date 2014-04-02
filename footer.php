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
		&copy; <? echo date('Y'); ?> <? echo get_bloginfo('name'); ?>. <a href="http://www.canontdesign">Theme Designed By: Canon Tschikof</a>. Proudly powered by <a href="http://www.wordpress.org">WordPress <? echo get_bloginfo('version'); ?> </a>
	</div>

</div>	 

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/library/js/foundation.min.js"></script>
<script>
	$(document).foundation();
	$(document).ready(function(){

		$('article.news').first().css("border-top", "none");

		// Abide Script
		var $abide_id = $('#searchform');
		$($abide_id)
		.on('invalid', function () {
			var invalid_fields = $(this).find('[data-invalid]');
			console.log(invalid_fields);
			$abide_id.addClass('invalid')
		})
		.on('valid', function () {
			console.log('valid!');
		});

		var $container = $('.archive_grid'),
			$articles = $container.children('.article'),
			timeout;

		// Home Page image alt show
		$(".caption-grid").hide();
		$(".trigger").on("mouseenter", function() {
			var width = $(this).find('img').width()-20;
			$(this).find(".caption-grid").fadeToggle().width(width);
		}).on("mouseleave", function() {
			$(this).find(".caption-grid").fadeToggle();
		});

		// Archive and Serach grid and hover effects
		$articles.on('mouseenter', function(event) {
			var $article = $(this);
			clearTimeout( timeout );
			timeout = setTimeout( function() {
				if( $article.hasClass('active') ) return false;
				$articles.not($article).removeClass('active').addClass('blur');
				$article.removeClass('blur').addClass('active');
			}, 75 );
		});
		$container.on('mouseleave', function(event) {
			clearTimeout(timeout);
			$articles.removeClass('active blur');
		});

		var size = $(window).width();
		if (size > 641){
			setTimeout( function(){
				var maxHeight = -1;
			    $('.article').each(function() {
					maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
				});
				$('.article').each(function() {
					$(this).height(maxHeight);
				});
			}, 0);
		}
		$( window ).resize(resize);
		function resize(){
			var size = $(window).width();
			if (size > 641){
				var maxHeight = -1;
			    $('.article').each(function() {
					maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
				});
				$('.article').each(function() {
					$(this).height(maxHeight);
				});
			} else {
				var height = {height: "",};
				$('.article').each(function() {
					$(this).css(height);
				});
			}
		};
	});
</script>


</body>
</html>





