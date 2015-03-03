<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Altertech_S
 */
?>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
<div <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>class="g-medium--full g-wide--full tophome"<?php else : ?>class="g-medium--full g-wide--full"<?php endif; ?>>
	<div class="highlight-module   highlight-module--remember g-medium--full g-wide--full ">
		<div class="highlight-module__container icon-exclamation g-medium--full g-wide--full">
			<div class="highlight-module__content  g--half g--centered ">
				<p class="highlight-module__title"><?php _e( 'Nothing Found', 'altertech_s' ); ?></p>
				<p class="highlight-module__text medium "></p>'<?php printf( __( 'Ready to publish your first post? <br> <p class="medium"><a class="button--primary" href="%1$s">Get started here</a>.</p>', 'altertech_s' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			</div>
		</div>
	</div>
</div>
	
		<?php elseif ( is_search() ) : ?>
<div <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>class="g-medium--full g-wide--full tophome"<?php else : ?>class="g-medium--full g-wide--full"<?php endif; ?>>
	<div class="highlight-module   highlight-module--remember g-medium--full g-wide--full ">
		<div class="highlight-module__container icon-question g-medium--full g-wide--full">
			<div class="highlight-module__content  g--half g--centered ">
				<p class="highlight-module__title small-text"><p class="highlight-module__title large"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'altertech_s' ); ?></p></p>
				<p class="highlight-module__text"><?php get_search_form(); ?></p>
			</div>
		</div>
	</div>
</div>	
		<?php else : ?>
<div <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>class="g-medium--full g-wide--full tophome"<?php else : ?>class="g-medium--full g-wide--full"<?php endif; ?>>
	<div class="highlight-module   highlight-module--remember g-medium--full g-wide--full ">
		<div class="highlight-module__container icon-question g-medium--full g-wide--full">
			<div class="highlight-module__content  g--half g--centered ">
				<p class="highlight-module__title large"><?php _e( 'It seems impossible to find what you are looking for. Perhaps searching can help.', 'altertech_s' ); ?></p>
				<p class="highlight-module__text"><?php get_search_form(); ?></p>
			</div>
		</div>
	</div>
</div>
		<?php endif; ?>