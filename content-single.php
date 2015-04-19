<?php
/**
 * @package Altertech_S
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    		<div class="editorial-header">
			<div  class="container" >
			<h1 class="tag editorial-header__title">
                            			<?php altertech_s_posted_on(); ?>
                        </h1><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <!-- .entry-header -->
    <?php if ( has_post_thumbnail() ) : ?>
                        <p class="featured-image-borded"><?php the_post_thumbnail( 'altertech_s-full' ); ?></p>
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
    <div  class="container-medium" >
<?php

wp_link_pages( array( 'before' => '<nav class="article-nav">', 
'after' => '', 'previouspagelink' => '<div class="article-nav-link article-nav-link--prev">Previous page</div>', 'nextpagelink' => '', 
'next_or_number' => 'next' ) ); 


wp_link_pages( array( 'before' => '', 'after' => '</nav>', 'previouspagelink' => '', 
'nextpagelink' => '<div class="article-nav-link article-nav-link--next">Next page</div>', 'next_or_number' => 'next' ) ); 
?>
        </p>
    </div>
        <div class="clear"></div>
	<footer class="entry-footer">
		<?php altertech_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    </div>
                </div>
</article><!-- #post-## -->
