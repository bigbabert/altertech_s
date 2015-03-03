<?php
/**
 * Altertech_S functions and definitions
 *
 * @package Altertech_S
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
  if ( ! function_exists( 'altertech_s_setup' ) ) :
    if ( ! isset( $content_width ) ) $content_width = 900;

function altertech_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on altertech_s, use a find and replace
	 * to change 'altertech_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'altertech_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Add support for Woocommerce.
        add_theme_support( 'woocommerce' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
    add_image_size( 'altertech_s-screen-shot', 720, 540 ); // Full size screen
    }
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'altertech_s' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'altertech_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; 
        // altertech_s_setup
        add_action( 'after_setup_theme', 'altertech_s_setup' );
	// Add support for title tag.
        function altertech_s_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'altertech_s_slug_setup' );
/**
 * This theme have two sidebars one on the Right and one at the top of the footer.
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function altertech_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'altertech_s' ),
		'id'            => 'sidebar-1',
		'description'   => 'Simple right sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', 'altertech_s' ),
		'id'            => 'sidebar-2',
		'description'   => 'The widgets in this area will be visible at the end of the page.',
		'before_widget' => '<li id="%1$s" class="g-medium--half g-wide--1 theme--multi-device-layouts  widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-multi-device-layouts"></i></span><h3 class="large text-divider">',
		'after_title'   => '</h3></a>',
	) );
}
add_action( 'widgets_init', 'altertech_s_widgets_init' );
/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function altertech_s_widget_first_last_class($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'widget-first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'g-medium--last  g-wide--last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}
add_filter('dynamic_sidebar_params','altertech_s_widget_first_last_class');
// Add custom editor support
   function altertech_s_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'altertech_s_add_editor_styles' );
/**
 * Enqueue scripts and styles.
 */
function altertech_s_scripts() {
	wp_enqueue_style( 'altertech_s-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'altertech_s-altertech_s-main-style', get_template_directory_uri() . '/styles/main.min.css' );

        wp_enqueue_style( 'altertech_s-genericons-style', get_template_directory_uri() . '/genericons/genericons.css' );
        
	wp_enqueue_script( 'altertech_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

        wp_enqueue_script( 'altertech_s-main-js', get_template_directory_uri() . '/scripts/main.min.js', array(), '20120206', true );	
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'altertech_s_scripts' );
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Enqueue Scripts/Styles for our Lightbox
function altertech_s_add_lightbox() {
    wp_enqueue_script( 'altertech_s-fancybox', get_template_directory_uri() . '/scripts/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'altertech_s-lightbox', get_template_directory_uri() . '/scripts/lightbox.js', array( 'fancybox' ), false, true );
    wp_enqueue_style( 'altertech_s-lightbox-style', get_template_directory_uri() . '/styles/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'altertech_s_add_lightbox' );

// The Excerpt length
function altertech_s_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'altertech_s_excerpt_length');

// Replaces the excerpt "more" text by a link
function altertech_s_excerpt_more($more) {
       global $post;
        if ($pos=strpos($post->post_content, '<!--more-->')){
	return '<br><a class="button--primary pull-right" href="'. get_permalink($post->ID) . '"> Read the full post</a>';
} 
 else {
	return '<br><a style="display:none;" class="button--primary pull-right" href="'. get_permalink($post->ID) . '"> Read the full post</a>';
}
        }
add_filter('excerpt_more', 'altertech_s_excerpt_more');
