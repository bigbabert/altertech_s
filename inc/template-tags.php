<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Altertech_S
 */
if ( ! function_exists( 'altertech_s_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Twenty Fifteen 1.0
 */
function altertech_s_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
<div class="container-medium gs-mrg-top">
<p class="large"><?php _e( 'Comment navigation', 'altertech_s' ); ?></p>
	<nav class="article-nav gs-mrg-top" role="navigation">
			<?php
				if ( $prev_link = get_previous_comments_link( __e( 'Older Comments', 'altertech_s' ) ) ) :
					printf( '<div class="article-nav-link article-nav-link--prev">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __e( 'Newer Comments', 'altertech_s' ) ) ) :
					printf( '<div class="article-nav-link article-nav-link--next">%s</div>', $next_link );
				endif;
			?>
	</nav><!-- .nav-links -->
</div><!-- .comment-navigation -->
	<?php
	endif;
}
endif;
if ( ! function_exists( 'altertech_s_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function altertech_s_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
<div class="container-medium gs-mrg-top">
    		<p class="large"><?php _e( 'Posts navigation', 'altertech_s' ); ?></p>
	<nav class="article-nav gs-mrg-top" role="navigation">
			<div class="article-nav-link article-nav-link--prev"><?php previous_posts_link( _e( '<span class="meta-nav"></span>', 'altertech_s' ) ); ?></div>

			<div class="article-nav-link article-nav-link--next"><?php next_posts_link( _e( '<span class="meta-nav"></span>', 'altertech_s' ) ); ?></div>
	</nav><!-- .nav-links -->
</div><!-- .comment-navigation -->
	<?php
}
endif;

if ( ! function_exists( 'altertech_s_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function altertech_s_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
<div class="container-medium gs-mrg-top">
    <p class="large"><?php _e( 'Posts navigation', 'altertech_s' ); ?></p>
	<nav class="article-nav gs-mrg-top" role="navigation">
			<?php
				previous_post_link( '<div class="article-nav-link article-nav-link--prev">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'altertech_s' ) );
				next_post_link(     '<div class="article-nav-link article-nav-link--next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'altertech_s' ) );
			?>
		<!-- .nav-links -->
	</nav><!-- .navigation -->
</div>
	<?php
}
endif;

if ( ! function_exists( 'altertech_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function altertech_s_posted_on() {
	$time_string = '<span><i class="genericon genericon-month gs-large"></i> <time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<span><i class="genericon genericon-month gs-large"></i> <time class="entry-date published" datetime="%1$s">%2$s</time> <i class="genericon genericon-refresh"></i> <time class="updated" datetime="%3$s">%4$s</time></span>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '<strong>Post info:</strong><br> %s', 'post date', 'altertech_s' ),
		' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'altertech_s' ),
		'<span> <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> <i class="genericon genericon-user gs-large"></i> ' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<span class="posted-on"><i class="genericon genericon-pinned gs-xlarge"></i>  ' . $posted_on . ' <span class="byline"> ' . $byline . '</span></span>';

}
endif;

if ( ! function_exists( 'altertech_s_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function altertech_s_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'altertech_s' ) );
		if ( $categories_list && altertech_s_categorized_blog() ) {
			printf( '<span class="cat-links gs-large">' . __( '<i class="genericon genericon-category gs-xlarge"></i> <strong>Category:</strong> %1$s', 'altertech_s' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'altertech_s' ) );
		if ( $tags_list ) {
			printf( '<br><span class="tags-links gs-large">' . __( '<i class="genericon genericon-tag gs-xlarge"></i> <strong>Tag:</strong>  %1$s', 'altertech_s' ) . '</span></br>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( _e( 'Leave a comment <i class="genericon genericon-reply gs-xlarge"></i>', 'altertech_s' ), _e( '1 Comment', 'altertech_s' ), _e( '% Comments', 'altertech_s' ) );
		echo '</span>';
	}

	edit_post_link( _e( 'Edit Post', 'altertech_s' ), '<p><span class="button--secondary"> ', ' <i class="genericon genericon-edit gs-xlarge"></i></span></p>' );
}
endif;

if ( ! function_exists( 'altertech_s_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function altertech_s_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'altertech_s' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'altertech_s' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'altertech_s' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'altertech_s' ), get_the_date( _x( 'Y', 'yearly archives date format', 'altertech_s' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'altertech_s' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'altertech_s' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'altertech_s' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'altertech_s' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = _x( 'Asides', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = _x( 'Galleries', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = _x( 'Images', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = _x( 'Videos', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = _x( 'Quotes', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = _x( 'Links', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = _x( 'Statuses', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = _x( 'Audio', 'post format archive title', 'altertech_s' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = _x( 'Chats', 'post format archive title', 'altertech_s' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'altertech_s' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'altertech_s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'altertech_s' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'altertech_s_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'altertech_s_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function altertech_s_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_altertech_s_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function altertech_s_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'altertech_s_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'altertech_s_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so altertech_s_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so altertech_s_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in altertech_s_categorized_blog.
 */
function altertech_s_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'altertech_s_categories' );
}
add_action( 'edit_category', 'altertech_s_category_transient_flusher' );
add_action( 'save_post',     'altertech_s_category_transient_flusher' );
