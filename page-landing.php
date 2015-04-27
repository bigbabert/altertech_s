<?php
/**
 * Template Name: Template Landing Page
 *
 * This is the template to create a custom landing page, you should write in html using style guide by Google Web Starter Kit.
 *
 * @package Altertech_S
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page-landing' ); ?>

			<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
