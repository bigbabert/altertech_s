<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Altertech_S
 */
?>

<div id="post-<?php the_ID(); ?>" >
	<div class="editorial-header">
			<?php the_title( '<h2 class="editorial-header__subtitle">', '</h2>' ); ?>
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
<?php endif; ?>
        </div>
    <p class="editorial-header__excerpt "><?php the_content(); ?></p>
			
			<div class="g-medium--1 g-medium--last g-wide--2">
	<p class="editorial-header__excerpt g--half g--centered">
		<?php edit_post_link( __( 'Edit', 'altertech_s' ), '<span class="edit-link">', '</span>' ); ?>
	</p<!-- .entry-footer -->
	<div  class="g-medium--full g-wide--full bordered"></div>
	<div class="g-medium--2 g-medium--push-1 g-medium--last g-wide--3 g-wide--push-1 g-wide--last altercomments">


