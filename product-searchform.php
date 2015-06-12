<?php

/*  Replace custom search product form
 *
 * @package Altertech_S
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			<div class="gs_search">
				<input type="text" class="search" name="s" id="s" placeholder="<?php _e( 'Search for products', 'altertech_s' ); ?>" />
	        <button type="submit" id="searchsubmit" ><i class="genericon genericon-search"></i></button>
				<input type="hidden" name="post_type" value="<?php _e( 'product', 'altertech_s' ); ?>" />
			</div>
		</form>