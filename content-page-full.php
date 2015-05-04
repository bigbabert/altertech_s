<?php
/**
 * The template used for displaying page content in page-full.php
 *
 * @package Alter Theme
 */
?>
        <div class="container">
<div id="post-<?php the_ID(); ?>" >
        <div class="container">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    </div>
	<div class="editorial-header">
			<?php the_title( '<h2 class="editorial-header__subtitle at_center">', '</h2>' ); ?>    
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
        <div class="container">
	<footer class="entry-footer">
		<?php altertech_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->   
        </div>
</div>
        </div>
<!-- .entry-footer -->