<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package Altertech_S
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php wp_title(); ?>">
    <!-- Tile icon for Win8 (144x144 + tile color) -->
       <?php if ( get_theme_mod( 'altertech_s_favicon' ) ) : ?>
    <link rel="icon" sizes="192x192" href="<?php echo esc_url( get_theme_mod( 'altertech_s_favicon' ) );?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_theme_mod( 'altertech_s_favicon' ) );?>">
    <meta name="msapplication-TileImage" content="<?php echo esc_url( get_theme_mod( 'altertech_s_favicon' ) );?>">
<?php endif; ?>
    <meta name="msapplication-TileColor" content="#3372DF">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
<script>(function(){document.documentElement.className='js'})();</script>
<?php wp_head(); ?>
</head>
<a style="display: none;" class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'altertech_s' ); ?></a>
<body <?php body_class(); ?>>
         <div class="clearfix"></div>
 <div class="gs_fix">
        <header class="app-bar promote-layer">
            <div class="app-bar-container">
                <button class="menu">
        <img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.svg" alt="<?php _e( 'Menu', 'altertech_s' ); ?>">
                </button>
            </div>
        </header>
         <div class="clearfix"></div>
<div style="background-color: #4285f4;" class="g-medium--full g-wide--full gs-top">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php if ( get_theme_mod( 'altertech_s_logo' ) ) : ?>
	<img src="<?php echo esc_url( get_theme_mod( 'altertech_s_logo' ) ); ?>" alt="<?php echo bloginfo( 'name' ); ?>">
    <?php else : ?>
    <h1 class="logo"><strong><?php bloginfo( 'name' ); ?> </strong><br><?php bloginfo( 'description' ); ?></h1>
    <?php endif; ?>
    </a>
        </div>
			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation navdrawer-container promote-layer">
            <h4><?php _e( 'Navigation', 'altertech_s' ); ?></h4>
<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'nav-menu')); ?>
        </nav>
         </div>
    </div>
    <div class="clearfix"></div>
    <?php if (is_page_template('page-full.php') ):?>
        <div class="g-medium--full g-wide--full">
    <?php elseif ( is_page_template('page-style-guide.php') || is_page_template('page-landing.php')): ?>
        <div class="g-medium--full g-wide--full">
    <?php elseif ( is_active_sidebar( 'sidebar-1' )  ) : ?>
        <div  class="g-wide--3 g-medium--half" > 
    <?php else : ?> 
        <div class="g-medium--full g-wide--full">
    <?php endif; ?>