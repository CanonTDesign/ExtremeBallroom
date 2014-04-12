<?php
/**
 * Extreme_Ballroom functions and definitions
 *
 * @package Extreme_Ballroom
 * @since Extreme_Ballroom 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Extreme_Ballroom 1.0
 */

if ( ! function_exists( 'Extreme_Ballroom_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Extreme_Ballroom 1.0
 */
function Extreme_Ballroom_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Extreme_Ballroom, use a find and replace
	 * to change 'Extreme_Ballroom' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'Extreme_Ballroom', get_template_directory() . '/library/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for the Aside Post Format
	 */
	add_theme_support( 'post-formats', 'gallery');

	/**
	 * Add Support for Post Thumbnails
	 **/
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		//'primary' => __( 'Primary Menu', 'Extreme_Ballroom' ),
		'custom-menu' => __('Top Menu', 'Extreme_Ballroom'), // Custom Navigation
	) );

	/**
	 * Adds Support for a sidebar in the Blog Format
	 */


	function arphabet_widgets_init() {

		register_sidebar( array(
			'name'          => __('Main Sidebar', 'Extreme_Ballroom'),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main Sidebar that appears on the left of the News Category'),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title landmark"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );
          
	/**
	 * Add support for the Aside Post Formats
	 */

	add_theme_support( 'post-formats', array( 'gallery') );

	add_filter('show_admin_bar', '__return_false');
}
endif; // Extreme_Ballroom_setup
add_action( 'after_setup_theme', 'Extreme_Ballroom_setup' );
/**
 * Custom Admin Color Schemes
 **/
function additional_admin_color_schemes() {  
    //Get the theme directory  
    $theme_dir = get_template_directory_uri();  
  
    //Ocean  
    wp_admin_css_color( 'Extreme_Ballroom', __( 'Extreme Ballroom' ),  
        $theme_dir . '/admin-color/Extreme/colors.min.css',  
        array( '#233e99', '#231899', '#ffe800', '#e6cf00' )  
    );  
}  
add_action('admin_init', 'additional_admin_color_schemes');
function set_default_admin_color($user_id) {  
    $args = array(  
        'ID' => $user_id,  
        'admin_color' => 'Extreme_Ballroom'  
    );  
    wp_update_user( $args );  
}  
add_action('user_register', 'set_default_admin_color');  
/**
 * Customizer Options and sections
 * @since Extreme_Ballroom 3.0.0
**/

function Extreme_Ballroom_customize_register( $wp_customize ) {
	/**
	 * Adds in the Option to chose your background image
	**/
	// $wp_customize->add_section( 'Extreme_Ballroom_background', array(
	// 	'title'       => __( 'Background', 'Extreme_Ballroom'),
	// 	'priority'    => 36,
	// 	'description' => 'Chose your background image, (There is also an option to enable or disable the blur effect)UNDER CONSTRUCTION STILL!!'
	// ) );
	// $wp_customize->add_setting( 'Extreme_Ballroom_background_settings' array(
	// 	'default' => 'none'
	// ) );
	/**
	 * Upload Your Logo
	**/
	$wp_customize->add_section( 'Extreme_Ballroom_logo', array(
		'title' => __('Logo', 'Extreme_Ballroom'),
		'priority' => 32,
		'description' => 'Upload Your Company Logo', 
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_logo_setting', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'img-upload',
	        array(
	            'label' => 'Logo File',
	            'section' => 'Extreme_Ballroom_logo',
	            'settings' => 'Extreme_Ballroom_logo_setting'
	        )
	    )
	);

	/**
	 * Adds in the options to change Font colors of the theme
	**/
	$wp_customize->add_section( 'Extreme_Ballroom__font_colors', array(
		'title'       => __( 'Font Colors', 'Extreme_Ballroom'),
		'priority'    => 31,
		'description' => 'Change the Font Colors'
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_color_1', array(
		'default'    => '#000000',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_color_2', array(
		'default'    => '#ffffff',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Font_Color_1', 
		array(
			'label'      => __( 'Font Color 1', 'Extreme_Ballroom' ),
			'section'    => 'Extreme_Ballroom__font_colors',
			'settings'   => 'Extreme_Ballroom_color_1',
		) ) 
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Font_Color_2', 
		array(
			'label'      => __( 'Font Color 2', 'Extreme_Ballroom' ),
			'section'    => 'Extreme_Ballroom__font_colors',
			'settings'   => 'Extreme_Ballroom_color_2',
		) ) 
	);

	/**
	 * Adds in the options to change colors of the theme
	**/
	$wp_customize->add_section( 'Extreme_Ballroom_colors', array(
		'title'       => __( 'Background Colors', 'Extreme_Ballroom'),
		'priority'    => 30,
		'description' => 'Change the Background Colors, link colors, hover effects, and the accent color'
	) );
	// $wp_customize->add_setting( 'Extreme_Ballroom_color_background', array(
	// 	'default'    => '#e4e2e3',
	// 	'type'       => 'theme_mod',
	// 	'capability' => 'edit_theme_options', 
	// ) );
	$wp_customize->add_setting( 'Extreme_Ballroom_color_main', array(
		'default'    => '#233E99',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_color_main_2', array(
		'default'    => '#231899',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_color_accent', array(
		'default'    => '#ffe800',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	// $wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'Background_color', 
	// 	array(
	// 		'label'      => __( 'Background Color', 'Extreme_Ballroom' ),
	// 		'section'    => 'Extreme_Ballroom_colors',
	// 		'settings'   => 'Extreme_Ballroom_color_background',
	// 	) ) 
	// );
	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'Main_color', 
		array(
			'label'      => __( 'Main Color', 'Extreme_Ballroom' ),
			'section'    => 'Extreme_Ballroom_colors',
			'settings'   => 'Extreme_Ballroom_color_main',
		) ) 
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Main_2_color', 
		array(
			'label'      => __( 'Secondary Color', 'Extreme_Ballroom' ),
			'section'    => 'Extreme_Ballroom_colors',
			'settings'   => 'Extreme_Ballroom_color_main_2',
		) ) 
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'Accent_color', 
		array(
			'label'      => __( 'Secondary Color', 'Extreme_Ballroom' ),
			'section'    => 'Extreme_Ballroom_colors',
			'settings'   => 'Extreme_Ballroom_color_accent',
		) ) 
	);
	/**
	 * Adds options to the theme Customizer for adding social links, and icons to the foooter
	 *
	 * @since 3.0
	**/
	$wp_customize->add_section( 'Extreme_Ballroom_social', array(
	    'title'        => __( 'Social Buttons', 'Extreme_Ballroom' ),
	    'priority'     => 201,
	    'description'  => 'Enable or disable Social Links in the footer'
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_social_settings', array(
		'default'    => 'false',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	
	$wp_customize->add_control( 'Extreme_Ballroom_social', array(
		'label'    => __('Social Buttons'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_social_settings',
		'type'     => 'radio',
		'priority' => '1',
		'choices'  => array(
			'true' => 'ON',
			'false' => 'OFF',
			),
	) );

	// Facebook Options
	$wp_customize->add_setting( 'Extreme_Ballroom_facebook_settings', array(
		'default'    => 'false',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_facebook', array(
		'label'    => __('Enable Facebook Button'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_facebook_settings',
		'type'     => 'radio',
		'priority' => '2',
		'choices'  => array(
			'true' => 'ON',
			'false' => 'OFF',
			),
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_facebook_link_settings', array(
		'default'    => 'There is no link yet',
		'type'       => 'theme_mod',
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_facebook_link', array(
		'label'    => __('Your Facebook link'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_facebook_link_settings',
		'type'     => 'text',
		'priority' => '3',
	) );

	//Twitter Options
	$wp_customize->add_setting( 'Extreme_Ballroom_twitter_settings', array(
		'default'    => 'false',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_twitter', array(
		'label'    => __('Enable twitter Button'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_twitter_settings',
		'type'     => 'radio',
		'priority' => '4',
		'choices'  => array(
			'true' => 'ON',
			'false' => 'OFF',
			),
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_twitter_link_settings', array(
		'default'    => 'There is no link yet',
		'type'       => 'theme_mod',
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_twitter_link', array(
		'label'    => __('Your Twitter feed link'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_twitter_link_settings',
		'type'     => 'text',
		'priority' => '5',
	) );

	// YouTube Options
	$wp_customize->add_setting( 'Extreme_Ballroom_youtube_settings', array(
		'default'    => 'false',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options', 
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_youtube', array(
		'label'    => __('Enable Youtube Button'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_youtube_settings',
		'type'     => 'radio',
		'priority' => '6',
		'choices'  => array(
			'true' => 'ON',
			'false' => 'OFF',
			),
	) );
	$wp_customize->add_setting( 'Extreme_Ballroom_youtube_link_settings', array(
		'default'    => 'There is no link yet',
		'type'       => 'theme_mod',
	) );
	$wp_customize->add_control( 'Extreme_Ballroom_youtube_link', array(
		'label'    => __('Your YouTube Channel link'),
		'section'  => 'Extreme_Ballroom_social',
		'settings' => 'Extreme_Ballroom_youtube_link_settings',
		'type'     => 'text',
		'priority' => '7',
	) );

}
add_action( 'customize_register', 'Extreme_Ballroom_customize_register' );




/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Extreme_Ballroom 1.0
 */
// function Extreme_Ballroom_widgets_init() {
// 	register_sidebar( array(
// 		'name' => __( 'Primary Sidebar', 'Extreme_Ballroom' ),
// 		'id' => 'sidebar-1',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => '</aside>',
// 		'before_title' => '<h1 class="widget-title">',
// 		'after_title' => '</h1>',
// 	) );

// 	register_sidebar( array(
// 		'name' => __( 'Secondary Sidebar', 'Extreme_Ballroom' ),
// 		'id' => 'sidebar-2',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget' => '</aside>',
// 		'before_title' => '<h1 class="widget-title">',
// 		'after_title' => '</h1>',
// 	) );
// }
// add_action( 'widgets_init', 'Extreme_Ballroom_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function Extreme_Ballroom_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// if ( is_singular() && wp_attachment_is_image() ) {
	// 	wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	// }
}
add_action( 'wp_enqueue_scripts', 'Extreme_Ballroom_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Theme Specific Widgets
 */

/**
 * Example Widget Class
 */
class Search_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function Search_widget() {
        parent::WP_Widget(false, $name = 'Seach Widget (Theme Version)');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        //$message 	= $instance['message'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
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
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		//$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        //$message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<!-- <p>
          <label for="<?php //echo $this->get_field_id('message'); ?>"><?php //_e('Simple Message'); ?></label> 
          <input class="widefat" id="<?php //echo $this->get_field_id('message'); ?>" name="<?php //echo $this->get_field_name('message'); ?>" type="text" value="<?php //echo $message; ?>" />
        </p> -->
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("Search_widget");'));

/** 
 * Add/Remove Fields from user profile
 **/
function modify_user_contact_methods( $user_contact ){

	/* Add user contact methods */
	$user_contact['twitter'] = __('Twitter Username'); 

	/* Remove user contact methods */
	unset($user_contact['aim']);
	unset($user_contact['jabber']);
	unset($user_contact['yim']);

	return $user_contact;
}

add_filter('user_contactmethods', 'modify_user_contact_methods');


/**
 * Custom Nav Walker
 */

// Navigation Walker 2
class top_bar_walker extends Walker_Nav_Menu {
    
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
    $element->has_children = !empty( $children_elements[$element->ID] );
    $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
    $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';
    parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    function start_el( &$output, $object, $depth = 0, $args = array(), $object_id = 0 ) {
    $item_html = '';
    parent::start_el( $item_html, $object, $depth, $args );
    //$output .= ( $depth == 0 ) ? '<li class="divider"></li>' : ''; // Adds a divider between each menu item
    $classes = empty( $object->classes ) ? array() : (array) $object->classes;    
    if( in_array('label', $classes) ) {
    //$output .= '<li class="divider"></li>'; // Adds a divider between each menu item
    $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
    }
    if ( in_array('divider', $classes) ) {
    $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }
    $output .= $item_html;
    }
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }
}
/**
 * Custom Comment Walker
 */
/** COMMENTS WALKER */

class zipGun_walker_comment extends Walker_Comment {
     
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
         
        <!-- <h3 id="comments-title">Comments</h3> -->
        <ul id="comment-list">
         
    <?php }
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
                <ul class="children">
    <?php }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
        </ul><!-- /.children -->
         
    <?php }
     
    /** START_EL */
    function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment; 
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
        
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div id="comment-body-<?php comment_ID() ?>" class="comment-body comment-border">
            	<header id="comment-head" class="avatar_name">
            		<div id="avatar" class="avatar">
            			<?php echo get_avatar( $comment ); ?>
            		</div>
            		<div id="comment_meta" class="">
            			<div id="user">
		            		<div>
		            			<?php echo get_comment_author(); ?>
		            			<?
								$user = new WP_User(get_comment_author());
								if ($user->wp_capabilities['administrator']==1) {

								}

		            			$author = get_comment_author($comment_ID);
		            			if($author == 'Tschuky101' || $author == 'Canon Tschikof' || $author == 'Canon' || $author == 'Tschikof' || $author == 'Tschikof Canon'){
		            				?>
		            				<span class="label">Webmaster</span>
		            				<?
		            			} if($user->wp_capabilities['administrator' && ($author != 'Tschuky101' || $author != 'Canon Tschikof' || $author != 'Canon' || $author != 'Tschikof' || $author != 'Tschikof Canon')]){ 
		            				?>
		            				<span class="label">Admin</span>
		            				<?
			            		} elseif($user->wp_capabilities['editor' && ($author != 'Tschuky101' || $author != 'Canon Tschikof' || $author != 'Canon' || $author != 'Tschikof' || $author != 'Tschikof Canon')]){
		            				?>
		            				<span class="label">Editor</span>
		            				<?
			            		} elseif($user->wp_capabilities['author' && ($author != 'Tschuky101' || $author != 'Canon Tschikof' || $author != 'Canon' || $author != 'Tschikof' || $author != 'Tschikof Canon')]){
		            				?>
		            				<span class="label">Author</span>
		            				<?
			            		} elseif($user->wp_capabilities['contributor' && ($author != 'Tschuky101' || $author != 'Canon Tschikof' || $author != 'Canon' || $author != 'Tschikof' || $author != 'Tschikof Canon')]){
		            				?>
		            				<span class="label">Contributor</span>
		            				<?
		            			} elseif($user->wp_capabilities['subscriber' && ($author != 'Tschuky101' || $author != 'Canon Tschikof' || $author != 'Canon' || $author != 'Tschikof' || $author != 'Tschikof Canon')]){
		            				?>
		            				<span class="label">Subscriber</span>
		            				<?
		            			}
			            		?>
			            	</div>
		            		
		            	</div>
		            	<div id="date-time">
		            		<?php comment_date(); ?> at <?php comment_time(); ?><br>
		            		<? 
		            		$current_user = wp_get_current_user();
		            		if($current_user == 'Tschuky101' || $current_user == 'Canon Tschikof' || $current_user == 'Canon' || $current_user == 'Tschikof' || $current_user == 'Tschikof Canon'){
			            		print_r(array_keys($user->wp_capabilities,"1")); 
			            	} ?>
		            	</div>
	            	</div>
            	</header>
            	<div id="comment-content-<?php comment_ID(); ?>" class="comment-content">
            		<?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
                     
                    <?php else: comment_text(); ?>
                    <?php endif; ?>
            	</div>
            	<footer class="comment">
            		<?php $reply_args = array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ); 
            		comment_reply_link( array_merge( $args, $reply_args ) );  ?> 
            		<? if ( current_user_can('moderate_comments') ) { ?>
            		| 
            		<?php edit_comment_link( 'Edit' ); ?>
					<? } ?>
            	</footer>
                <!-- div class="comment-author vcard author">
                    <?php// echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
                    <cite class="fn n author-name"><?php echo get_comment_author_link(); ?></cite>
                </div> --><!-- /.comment-author -->
 
                <!-- <div id="comment-content-<?php comment_ID(); ?>" class="comment-content">
                    <?php //if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
                     
                    <?php //else: comment_text(); ?>
                    <?php //endif; ?>
                </div><!-- /.comment-content -->
 
                <!-- <div class="comment-meta comment-meta-data">
                    <a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ) ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
                </div> --><!-- /.comment-meta -->
 
                <!-- <div class="reply">
                    <?php //$reply_args = array(
                        //'add_below' => $add_below, 
                        // 'depth' => $depth,
                        // 'max_depth' => $args['max_depth'] );
     
                    // comment_reply_link( array_merge( $args, $reply_args ) );  ?>
                </div> --><!-- /.reply -->
            </div> <!--.comment-body-->
 
    <?php }
 
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
         
        <!--></li><!-- /#comment-' . get_comment_ID() . ' -->
         
    <?php }
     
    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>
     
    </ul><!-- /#comment-list -->
 
    <?php }
}

/**
 * GitHub ThemeUpdate Config
 * @since Extreme_Ballroom 3.1
**/
add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
	        'proper_folder_name' => 'Extreme_Ballroom', // this is the name of the folder your plugin lives in
	        'api_url' => 'https://api.github.com/repos/CanonTDesign/ExtremeBallroom', // the github API url of your github repo
	        'raw_url' => 'https://raw.github.com/CanonTDesign/ExtremeBallroom/master', // the github raw url of your github repo
	        'github_url' => 'https://github.com/CanonTDesign/ExtremeBallroom', // the github url of your github repo
	        'zip_url' => 'https://github.com/CanonTDesign/ExtremeBallroom/archive/master.zip', // the zip url of the github repo
	        'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
	        'requires' => '3.8', // which version of WordPress does your plugin require?
	        'tested' => '3.8.1', // which version of WordPress is your plugin tested up to?
	        'readme' => 'README.md', // which file to use as the readme for the version number
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}



