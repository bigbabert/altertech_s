<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Altertech_S
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
</div>
<div id="secondary" class="<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>g--third g--last<?php else : ?>g-wide--1 g-wide--last g-medium--half g--last<?php endif; ?>" role="complementary">
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
<?php endif; ?>