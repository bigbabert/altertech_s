<?php
/**
 * The template used for displaying page content in page-landing.php
 *
 * @package Alter Theme
 */
?>
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'altertech_s-full' ); ?></p>
<?php endif; ?>
                   <?php the_content(); ?>                       
<div class="container">
<?php 	edit_post_link( _e( $text = null, 'Edit Post', 'altertech_s' ), '<p class="pull-right"><span class="button--secondary"> ', ' <i class="genericon genericon-edit gs-xlarge"></i></span></p>' ); ?>
</div>