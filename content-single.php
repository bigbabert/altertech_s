<?php
/**
 * @package Altertech_S
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<h1 class="tag editorial-header__title">
			<?php altertech_s_posted_on(); ?>
		</h1><!-- .entry-meta -->
	</header><!-- .entry-header -->
<?php if ( get_post_meta( get_the_ID(), 'meta-textarea', true ) ) : ?>
<p class="editorial-header__excerpt "><ol class="list-anchor list-large"><?php the_meta('meta-textarea'); ?></ol></p>
<?php endif; ?>
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'large' ); ?></p>
<?php endif; ?>
    <?php if ( has_post_format( 'quote' ) ) : ?>
<section class="styleguide__quote"><div class="quote"><div class="container"><blockquote class="quote__content g-wide--push-1 g-wide--pull-1 g-medium--push-1">
	<?php the_content(); ?>
	</blockquote></div></div></section><!-- .entry-content -->
<?php else : ?>
	<div class="entry-content">
		<p class="editorial-header__excerpt "><?php the_content(); ?></p>

	</div><!-- .entry-content -->
<?php endif; ?>
    <div  class="container nav-container" >
	<p class="editorial-header__excerpt ">	<?php
			wp_link_pages( array(
				'before' => '<div class="article-nav">' . __( 'Pages:', 'altertech_s' ),
				'after'  => '</div>',
			) );
			?>
        </p>
    </div>
	<footer class="entry-footer">
		<?php altertech_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
