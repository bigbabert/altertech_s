<?php
/**
 * The template used for displaying page content in page-landing.php
 *
 * @package Alter Theme
 */
?>
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
<?php endif; ?>
                   <?php the_content(); ?>
                        
		<?php edit_post_link( __( 'Edit', 'altertech_s' ), '<span class="edit-link">', '</span>' ); ?>

        </div>
        <main>