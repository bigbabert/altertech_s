<?php

/* 
 * Custom template author for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Altertech_S
 */

  get_header(); ?>
	<div id="primary" class="content-area">
			<header class="page-header">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
<!-- This sets the $curauth variable -->
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h2 class="editorial-header__subtitle"><?php _e( 'Author', 'altertech_s' ); ?>: <?php echo $curauth->display_name; ?></h2>
    
<div class="g--half"><p class="xlarge"><?php _e( 'Website', 'altertech_s' ); ?>: </p><br><p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p></div>
<div class="g--half g--last gs_brd_left"><p class="xlarge"><?php _e( 'Profile', 'altertech_s' ); ?>: </p><br><p><?php echo $curauth->user_description; ?></p></div>
    <div class="clearfix"></div>
    <h2><?php _e( 'Posts by', 'altertech_s' ); ?><?php echo $curauth->display_name; ?>:</h2>
<div class="clearfix"></div>
			</header><!-- .page-header -->
			</div>
<!-- The Loop -->

    <?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

   <?php endwhile; ?>

			<?php altertech_s_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
<!-- End Loop -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>