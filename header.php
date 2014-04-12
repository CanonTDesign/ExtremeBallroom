<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 2.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'Extreme_Ballroom' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--
	MY CSS/JAVA
------------------------------------------------------>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/foundation.min.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/foundation-icons.css" />


<style type="text/css">
<? 
/**
 * Convert a hexa decimal color code to its RGB equivalent
 *
 * @param string $hexStr (hexadecimal color value)
 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
 */                                                                                                 
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
} 
?>
body{background-color: #f7f7f7;}
div#header{background: #fff;}
div.contain-to-grid{background: none;}
*{border-radius: 0px;}
.blur{background-color: #fff;}
.nemus-slider .caption{padding: 0 20px 20px 20px !important;}
.nemus-slider{margin: -8px 0 0 0;}
.padding-clear{padding: 0;}
.button-group>*{float: none;}

/* Navigation
-----------------------------------------------------*/
.contain-to-grid .top-bar{}
.content{max-width: 1200px; margin: 0 auto;}




/* Backgrounds
-----------------------------------------------------*/
#nav, 
.tag-links a, 
.top-bar-section li:not(.has-form) a:not(.button),
.top-bar.expanded .title-area, 
.top-bar-section ul, .footer_container, 
.main_bg_color,
button,
.top-bar-section li.active:not(.has-form) a:not(.button),
.button,
ul#article_footer li:hover{ background-color: <?php echo get_theme_mod('Extreme_Ballroom_color_main', 'default_value'); ?>;}

.top-bar-section li:not(.has-form) a:not(.button):hover, 
.top-bar-section ul li:hover:not(.has-form)>a,
.footer_container ul li:not(#username):hover,
.top-bar-section li.active:not(.has-form) a:not(.button):hover{ background-color: <?php echo get_theme_mod('Extreme_Ballroom_color_main_2', 'default_value'); ?>; }

.nav_acent, .tag-links a:hover, 
.footer_acent,
button:hover, 
.button:hover,
.top-bar-section li:not(.has-form).current-menu-item a:not(.button),
.acent{ background-color: <?php echo get_theme_mod('Extreme_Ballroom_color_accent', 'default_value'); ?>;}

/* Fonts
-----------------------------------------------------*/
.credits, 
.top-bar.expanded .toggle-topbar a, 
.font_white, 
.tag-links a, 
.tag-links a:hover, 
.footer_container ul li a, a.credits_url, 
.top-bar-section ul li>a,
.top-bar-section li.active:not(.has-form) a:not(.button):hover,
ul#article_footer li:hover a { color:<?php echo get_theme_mod('Extreme_Ballroom_color_2', 'default_value'); ?>;}

.font_black,
button:hover, 
.button:hover, 
.top-bar-section li:not(.has-form).current-menu-item a:not(.button){color: <?php echo get_theme_mod('Extreme_Ballroom_color_1', 'default_value'); ?>;}g

a.credits_url:hover{text-decoration: underline;}

h1.white, h2.white, h3.white, h4.white, h5.white, h6.white, ul#article_footer li:hover span.has-tip{
	color:<?php echo get_theme_mod('Extreme_Ballroom_color_2', 'default_value'); ?>;
	border-color: <? echo get_theme_mod('Extreme_Ballroom_color_2', 'default_value'); ?>;
}
h1.black, h2.black, h3.black, h4.black, h5.black, h6.black,{
	color:<?php echo get_theme_mod('Extreme_Ballroom_color_1', 'default_value'); ?>;
	border-color: <? echo get_theme_mod('Extreme_Ballroom_color_1', 'default_value'); ?>;
}

/* Tags
-----------------------------------------------------*/
.tag-links a:hover{color: #000;}
.tag-links a:before { border-right: 8px solid <?php echo get_theme_mod('Extreme_Ballroom_color_main', 'default_value'); ?>;}
.tag-links a:hover:before { border-right-color: <?php echo get_theme_mod('Extreme_Ballroom_color_accent', 'default_value'); ?>;}
.tag-links a:hover:after {background-color: #000;}

/* Article/Search Grid
-----------------------------------------------------*/
.grid-container article{box-shadow: 0px 0px 0px 10px rgba(255,255,255,1), 1px 1px 3px 13px rgba(0,0,0,0.3);}
/*.grid-container article.blur{box-shadow: 0px 0px 20px 10px rgba(255,255,255,1), 1px 1px 3px 10px rgba(0,0,0,0.2);}*/
.grid-container article.active{box-shadow: 0px 0px 0px 10px rgba(255,255,255,1), 1px 11px 15px 10px rgba(0,0,0,0.4);}
div.pagnation{border-top:5px solid <?php echo get_theme_mod('Extreme_Ballroom_color_main', 'default_value'); ?>;}
div.pagnation ul {border-top:5px solid <?php echo get_theme_mod('Extreme_Ballroom_color_main', 'default_value'); ?>; margin: -5px 0 0 0;}
div.pagnation ul li:hover{border-top: 5px solid <?php echo get_theme_mod('Extreme_Ballroom_color_accent', 'default_value'); ?>; margin-top: -5px;}
/* Foundation Overrides
-----------------------------------------------------*/
ul#article_footer li span.has-tip{color: #008cba; font-weight: normal; border-bottom: none;}
.breadcrumbs{ border:none; background: rgba(255,255,255,0.8); -webkit-border-radius: 0px;	border-radius: 0px; position: relative; z-index: 1;}
form, button, .button, input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="week"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea{margin-bottom: 0;}

</style>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/vendor/modernizr.js"></script>
<script type="text/javascript" srch="<? echo get_template_directory_uri(); ?>/library/js/foundation/foundation.js"></script>
<script type="text/javascript" srch="<? echo get_template_directory_uri(); ?>/library/js/foundation/foundation.tooltip.js"></script>
<script type="text/javascript" srch="<? echo get_template_directory_uri(); ?>/library/js/vendor/fastclick.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">

<div id="header">
	<div id="logo_header" class="contain-to-grid">
		<div class="content">
			<span class=""><a style="text-decoration: none;" href="<?php echo get_bloginfo('url'); ?>"><img id="logo" class="" src="<? echo get_theme_mod('Extreme_Ballroom_logo_setting', 'default_value');?>"></a></span>
			<!-- <div id="" class=""> -->
				<!-- <a style="text-decoration: none; color: #444;" href="<?php echo get_bloginfo('url'); ?>" id="brand"> -->
					<?php //echo get_bloginfo('name'); ?>
				<!-- </a> -->
			<!-- </div> -->
			
		</div>
	</div>
	<div class="top-bar-container sticky main_bg_color">
		<div class="nav_acent"></div>
        <nav class="top-bar max_width" data-topbar data-options="mobile_show_parent_link: true">
			<ul class="title-area">
				<li class="name"></li>
				<li class="toggle-topbar menu-icon"><a>Menu</a></li>
			</ul>
			<section class="top-bar-section">
			<!-- Right Nav Section -->
			<?
			$defaults = array(
				'container' => false, // remove nav container
				'container_class' => '', // class of container
				'menu' => '', // menu name
				'menu_class' => 'top-bar-menu', // adding custom nav class
				'theme_location' => 'custom-menu', // where it's located in the theme
				'before' => '', // before each link <a>
				'after' => '', // after each link </a>
				'link_before' => '', // before each link text
				'link_after' => '', // after each link text
				'depth' => 5, // limit the depth of the nav
				'fallback_cb' => false, // fallback function (see below)
				'walker' => new top_bar_walker()
			);

			wp_nav_menu( $defaults ); 
			?>
			</section>
		</nav>
    </div>
</div>





















