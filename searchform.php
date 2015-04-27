<?php

/*  Replace custom search form
 * 
 * @package Altertech_S
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
            	<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label','altertech_s' ); ?></label>
                <input type="text" class="search" placeholder="<?php esc_attr_e( 'Search', 'altertech_s' ); ?>" name="s" id="s" />
	        <button type="submit" id="searchsubmit" ><img src="<?php echo get_template_directory_uri(); ?>/images/search.png"></button>
        </div>
</form>