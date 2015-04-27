<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Altertech_S
 */

get_header(); ?>
	<div class="highlight-module   highlight-module--remember g-medium--full g-wide--full ">
		<div class="highlight-module__container icon-question g-medium--full g-wide--full">
			<div class="highlight-module__content  g--half g--centered ">
				<p class="highlight-module__title small-text"><?php _e( 'Oops! That page can&rsquo;t be found.', 'altertech_s' ); ?></p>
				<p class="highlight-module__text"><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'altertech_s' ); ?></p>
<p class="highlight-module__text"><?php get_search_form(); ?></p>
			</div>
		</div>
	</div>
<?php get_sidebar('sidebar-1'); ?>
<?php get_footer(); ?>
