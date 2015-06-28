<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Altertech_S
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function altertech_s_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'altertech_s_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function altertech_s_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'altertech_s_body_classes' );



/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function altertech_s_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'altertech_s_setup_author' );

if ( !is_admin() && get_theme_mod( 'altertech_s_sidebar_custom_color' ) ) {
function altertech_s_customizer_sidebar_color_css() {
    ?>
    <style type="text/css">
    #secondary, #gc-footer, #left-sidebar {
	background-color: <?php echo get_theme_mod( 'altertech_s_sidebar_custom_color' ); ?> !important;
}
    </style>
    <?php
}
add_action( 'wp_head', 'altertech_s_customizer_sidebar_color_css' );
}
if ( !is_admin() && get_theme_mod( 'altertech_s_header_custom_color' ) ) {
function altertech_s_customizer_header_color_css() {
    ?>
    <style type="text/css">
    .navdrawer-container, .g-medium--full.g-wide--full.gs-top, .app-bar, .navdrawer-container ul li a, .gs_fix, .nav-menu .sub-menu, .nav-menu .children, .button--primary, .article-nav-link::before {
	background-color: <?php echo get_theme_mod( 'altertech_s_header_custom_color' ); ?> !important;
}
.button--primary, .reply {
    border: 1px solid <?php echo get_theme_mod( 'altertech_s_header_custom_color' ); ?> ;
}
    </style>
    <?php
}
add_action( 'wp_head', 'altertech_s_customizer_header_color_css' );
}
if ( !is_admin() && get_theme_mod( 'altertech_s_link_menu_color' ) ) {
function altertech_s_customizer_link_menu_css() {
    ?>
    <style type="text/css">
     .button--primary, a.button--primary.pull-right, .navdrawer-container ul li a, .nav-menu li a, .nav-menu li:hover > a,
.nav-menu li a:hover,
.nav-menu li:focus > a,
.nav-menu li a:focus {
	color: <?php echo get_theme_mod( 'altertech_s_link_menu_color' ); ?> !important;
}
    </style>
    <?php
}
add_action( 'wp_head', 'altertech_s_customizer_link_menu_css' );
}

if ( !is_admin() && get_theme_mod( 'altertech_s_link_color' ) ) {
function altertech_s_customizer_link_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'altertech_s_link_color' ); ?> ; }
                a:visited {
    color: <?php echo get_theme_mod( 'altertech_s_link_color' ); ?> !important;
}
    </style>
    <?php
}
add_action( 'wp_head', 'altertech_s_customizer_link_css' );
}
if ( !is_admin() && get_theme_mod( 'altertech_s_link_hover_color' ) ) {
function altertech_s_customizer_hover_link_css() {
    ?>
    <style type="text/css">

a:hover,.button--primary:hover {
    color: <?php echo get_theme_mod( 'altertech_s_link_hover_color' ); ?> !important;
}
    </style>
    <?php
}
add_action( 'wp_head', 'altertech_s_customizer_hover_link_css' );
}
// Select Sidebar options on Page and Posts	
add_action( 'add_meta_boxes', 'alter_sidebar_chooser' );
add_action( 'save_post', 'alter_sidebar_updater');	
	 function alter_sidebar_chooser() {
            add_meta_box( 
        'sidebar-meta',
        __( 'Alter Custom Sidebar', 'altertech_s' ),
        'custom_sidebar_callback',
        'post',
        'side'
    );
    add_meta_box( 
        'sidebar-meta',
        __( 'Alter Custom Sidebar', 'altertech_s' ),
        'custom_sidebar_callback',
        'page',
        'side'
    );
	}
//Select Sidebar Options	
	 function custom_sidebar_callback($post) {
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		$custom = get_post_custom($post->ID);
    if(isset($custom['sidebar']))
        $val = $custom['sidebar'][0];
    else
        $val = "Default";
?>
<p><label><?php echo  __("Choose a sidebar to display", 'altertech_s' ); ?></label></p>
    	<select name="sidebar">
    		<option value="Default" selected="selected"><?php echo  __("Default", 'altertech_s' ); ?></option>
    		<option value="sidebar-1"<?php if($val == 'sidebar-1'): echo ' selected="selected"'; endif;?>><?php echo  __("Right Sidebar", 'altertech_s' ); ?></option>
    		<option value="sidebar-3"<?php if($val == 'sidebar-3'): echo ' selected="selected"'; endif;?>><?php echo  __("Left Sidebar", 'altertech_s' ); ?></option>
    	</select>
    <?php
	}
//Save Options	
	 function alter_sidebar_updater(){
		global $post;

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
			return $post_id;
		}else{
			update_post_meta($post->ID, 'sidebar', $_POST["sidebar"]);
		}
	}