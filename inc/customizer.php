<?php
/**
 * Altertech_S Theme Customizer
 *
 * @package Altertech_S
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function altertech_s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        // Favicon upload
    $wp_customize->add_section( 'altertech_s_favicon_section' , array(
	    'title'       => __( 'Favicon', 'altertech_s' ),
	    'priority'    => 29,
	    'description' => __( 'Upload your Favicon'.'</br><span style="color:red;">'.'The should be .jpg and .png but the size must be 192x192 px'.'</span>', 'altertech_s' ),
	) );
	$wp_customize->add_setting( 'altertech_s_favicon', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'altertech_s_favicon', array(
		'label'    => __( 'Favicon', 'altertech_s' ),
		'section'  => 'altertech_s_favicon_section',
		'settings' => 'altertech_s_favicon',
	) ) );
        // Logo upload
    $wp_customize->add_section( 'altertech_s_logo_section' , array(
	    'title'       => __( 'Logo', 'altertech_s' ),
	    'priority'    => 30,
	    'description' => __( 'Upload a logo to replace the default site name and description in the header', 'altertech_s' )
	) );
	$wp_customize->add_setting( 'altertech_s_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'altertech_s_logo', array(
		'label'    => __( 'Logo', 'altertech_s' ),
		'section'  => 'altertech_s_logo_section',
		'settings' => 'altertech_s_logo',
	) ) );
        // Footer Text 
   $wp_customize->add_section( 'altertech_s_footers_section' , array(
	    'title'       => __( 'Footer Settings', 'altertech_s' ),
	    'priority'    => 34,
	    'description' => __( 'Write text to display in footer', 'altertech_s' )
	) );
$wp_customize->add_setting( 'altertech_s_footers_text', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => '<p><a href="http://wordpress.org/">Proudly powered by WordPress</a> | Theme: Altertech_S made with <i style="color:red;" class="genericon genericon-heart"></i> by  <a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="nofollow"> AlterTech</a> . </p>',
    ) );
 
$wp_customize->add_control( 'altertech_s_footers_text', array(
    'label' => 'Footer Text',
    'type' => 'text',
    'section' => 'altertech_s_footers_section',
) );
// Author checkbox 
   $wp_customize->add_section( 'altertech_s_author_section' , array(
	    'title'       => __( 'Author Settings', 'altertech_s' ),
	    'priority'    => 36,
	    'description' => __( 'If checked hide the authors page.', 'altertech_s' )
	) );
$wp_customize->add_setting( 'altertech_s_author_checkbox', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => 0,
) );
 
$wp_customize->add_control( 'altertech_s_author_checkbox', array(
    'label' => 'Hide Author Page',
    'type' => 'checkbox',
    'section' => 'altertech_s_author_section',
) );
$wp_customize->add_setting(
        'altertech_s_header_custom_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#4285f4',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_custom_color',
            array(
                'label'      => __( 'Header Color', 'altertech_s' ),
                'section'    => 'colors',
                'settings'   => 'altertech_s_header_custom_color'
            )
        )
    );
$wp_customize->add_setting(
        'altertech_s_sidebar_custom_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#89c4e2',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_custom_color',
            array(
                'label'      => __( 'Sidebar Color', 'altertech_s' ),
                'section'    => 'colors',
                'settings'   => 'altertech_s_sidebar_custom_color'
            )
        )
    );
$wp_customize->add_setting(
        'altertech_s_link_menu_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#ffffff',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_menu_color',
            array(
                'label'      => __( 'Link Menu Color', 'altertech_s' ),
                'section'    => 'colors',
                'settings'   => 'altertech_s_link_menu_color'
            )
        )
    );
$wp_customize->add_setting(
        'altertech_s_link_color',
        array(
    'sanitize_callback' => 'esc_url_raw',
            'default'     => '#3372df',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'altertech_s' ),
                'section'    => 'colors',
                'settings'   => 'altertech_s_link_color'
            )
        )
    );
$wp_customize->add_setting(
        'altertech_s_link_hover_color',
        array(
            'sanitize_callback' => 'esc_url_raw',
            'default'     => '#06e',
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover_color',
            array(
                'label'      => __( 'Link Hover Color', 'altertech_s' ),
                'section'    => 'colors',
                'settings'   => 'altertech_s_link_hover_color'
            )
        )
    );
}
add_action( 'customize_register', 'altertech_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function altertech_s_customize_preview_js() {
	wp_enqueue_script( 'altertech_s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'altertech_s_customize_preview_js' );
