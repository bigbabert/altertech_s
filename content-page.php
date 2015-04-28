<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Altertech_S
 */
?>
<div id="post-<?php the_ID(); ?>" class="container" >
        <div class="container">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    </div>
    <div class="clearfix"></div>
	<div class="editorial-header gs_mtop">
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>
    <?php if ( has_post_thumbnail() ) : ?>
    <p class="featured-image-borded"><?php the_post_thumbnail( 'altertech_s-full' ); ?></p>
<?php endif; ?>
        </div>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>
		<?php
			wp_link_pages( array(
				'before' => '<div class="container-medium gs-mrg-top gs-mrg-btn">' . __( 'Pages:', 'altertech_s' ),
				'after'  => '</div>',
			) );
		?>
        <div class="clear"></div>
	<footer class="entry-footer">
		<?php altertech_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>
