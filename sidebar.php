<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Altertech_S
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
</div>
<div id="secondary" class="g-wide--1 g-wide--last g-medium--half g--last" role="complementary">
    <div class="container">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div><!-- #secondary -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<div class="clearfix"></div>
<!-- #content -->
<section class="styleguide__centered-list feature-spotlight g-medium--full g-wide--full" id="sidebar-2">
    <div class="container">
	<ul class="list-guides-intro list-centered list--reset clear"><?php dynamic_sidebar( 'sidebar-2' ); ?></ul>
	</div>
</section><!-- #footer sidebar -->
	<?php else : ?>
<!-- #content -->
<section class="styleguide__centered-list"><div class="container"><ul class="list-guides-intro list-centered list--reset clear"><li class="g-medium--half g-wide--1 theme--multi-device-layouts  "><a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-multi-device-layouts"></i></span><h3 class="large text-divider">Multi-Device Layouts</h3></a><p>Create flexible, not fixed, layouts.</p></li><li class="g-medium--half g-wide--1 theme--introduction-to-media g-medium--last "><a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-introduction-to-media"></i></span><h3 class="large text-divider">Images, Audio and Video</h3></a><p>Only use media that loads fast and scales.</p></li><li class="g-medium--half g-wide--1 theme--user-input  "><a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-user-input"></i></span><h3 class="large text-divider">Forms and User Input</h3></a><p>Touch, tap, click, and submit.</p></li><li class="g-medium--half g-wide--1 theme--performance g-medium--last  g-wide--last "><a href="#ignore-click" class="themed"><span class="icon-circle--large themed--background"><i class="icon icon-performance"></i></span><h3 class="large text-divider">Optimizing Performance</h3></a><p>Performance is a feature.</p></li></ul></div></section>
<!-- #footer sidebar -->
        <?php endif; ?>