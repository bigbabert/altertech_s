<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Altertech_S
 */
?>
</div>
<?php get_sidebar('sidebar-2'); ?>
<div class="clearfix"></div>
<div id="gc-footer" class="g-medium--full g-wide--full">
	<div class="g--half g--centered">
	<footer id="colophon" class="site-footer " role="contentinfo">
		<div class="site-info">
                 <?php if ( ! get_theme_mod( 'altertech_s_footers_text' ) ) : ?>   <p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'altertech_s' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'altertech_s' ), 'WordPress' ); ?></a> | <?php printf( __( 'Theme: %1$s made with <i style="color:red;" class="genericon genericon-heart"></i> by  %2$s.', 'altertech_s' ), 'Altertech_S', '<a class="white" href="http://www.blog.altertech.it/author/alberto-cocchiara/" rel="nofollow"> AlterTech</a> ' ); ?> </p>
                 <?php else : ?>
                 <?php echo get_theme_mod( 'altertech_s_footers_text' ); ?>
                    <?php endif; ?>						
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
