<?php
/**
 * The template used for displaying page content in woocommerce shop page.
 *
 * @package Altertech_S
 */
?>
<div id="post-<?php the_ID(); ?>" >
    <div class="container">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
    </div>
    <div class="clearfix"></div>
    <div class="container woo">
        	<?php  woocommerce_content(); ?>
    </div>
</div>
