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
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>    
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'altertech_s-full' ); ?></p>
<?php endif; ?>
	</div>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>
    <?php edit_post_link( _e( 'Edit Post', 'altertech_s' ), '<p><span class="button--secondary">', '<i class="genericon genericon-edit gs-xlarge"></i></span></p>' ); ?>
                </div>
        </div>
<!-- .entry-footer -->