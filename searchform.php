<?php

/*  Replace custom search form
 * 
 * @package Altertech_S
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="gs_search">
            	<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label','altertech_s' ); ?></label>
                <input type="text" class="search" placeholder="<?php esc_attr_e( 'Search', 'altertech_s' ); ?>" name="s" id="s" />
	        <button type="submit" id="searchsubmit" ><i class="genericon genericon-search"></i></button>
        </div>
</form>