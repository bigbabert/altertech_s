<?php
/**
 * @package Altertech_S
 * 
 *  The template used for displaying page content blog homepage.
 *
 */
?>      

<article style="border-bottom: 1px solid #ccc;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="editorial-header">
			<div  class="container" >
                        <h1 class="tag editorial-header__title ">		
	    <?php if ( 'post' == get_post_type() ) : ?>
			<?php altertech_s_posted_on(); ?>
		<?php endif; ?>
			</h1>
<?php the_title( sprintf( ' <h2 class="editorial-header__subtitle"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
 <?php if ( has_post_format( 'quote' ) ) : ?>
<section class="styleguide__quote">
    <div class="quote"><blockquote class="quote__content">
	<?php the_content(); ?>
	</blockquote></div></section><!-- .entry-content -->
<?php elseif ( has_post_format( 'video' ) || has_post_format( 'audio' )) : ?>
                  <p class="editorial-header__excerpt "><?php the_content(); ?></p>
                  <!-- .entry-content -->
<?php elseif ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>"><p class="image-borded"><?php the_post_thumbnail( 'altertech_s-full' ); ?></p></a>
                  <p class="editorial-header__excerpt "><?php the_excerpt(); ?></p>
                  <!-- .entry-content -->
                  <?php elseif ( post_password_required() ) : ?>
                 <p class="editorial-header__excerpt "><?php the_content(); ?></p>
                  <!-- .entry-content -->
               <?php else : ?>
                 <p class="editorial-header__excerpt "><?php the_excerpt(); ?></p>
                  <!-- .entry-content -->
 <?php endif; ?>
<?php if ( post_password_required() ) : ?>
<a class="button--primary pull-right" href="<?php the_permalink(); ?>"><?php _e( 'Type password to Read', 'altertech_s' ) ?></a>
<?php else : ?>
<a class="button--primary pull-right" href="<?php the_permalink(); ?>"><?php _e( 'Read the full post', 'altertech_s' ) ?></a>
<?php endif; ?>
                        </div>
                    </div>
</article>