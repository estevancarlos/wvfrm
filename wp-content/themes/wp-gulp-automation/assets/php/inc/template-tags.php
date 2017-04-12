<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wvfrm
 */

if ( ! function_exists( 'wvfrm_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wvfrm_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
        <time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'wvfrm' ),
		$time_string
	);

    /*
	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'wvfrm' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
    */

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'wvfrm_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wvfrm_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wvfrm' ) );
		if ( $categories_list && wvfrm_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wvfrm' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wvfrm' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wvfrm' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wvfrm' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'wvfrm' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wvfrm_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wvfrm_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wvfrm_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wvfrm_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wvfrm_categorized_blog should return false.
		return false;
	}
}


/**
 * Generates four column wide boxes
 *
 */
function wvfrm_med_content_box($youtube_img_url) {
    $bg_url = 'http://img.youtube.com/vi/' . $youtube_img_url .'/0.jpg';

    /*

    echo    '<div class="content-card-container">
                <div class="content-card">
                    <div class="content-card__bg" style="background: #001ABE url(' . $bg_url . ') no-repeat top/110%; background-position-y: -100px; background-size: 0%;">
                        <a href="' . get_permalink() . '"></a>
                        <div class="content-card__main">
                            <div class="content-card__date">' . get_the_modified_time('F j, Y') . '</div>
                            <div class="content-card__title">' . get_the_title() . '</div>
                            <div class="content-card-btn">
                                <div class="content-card-btn__title">Learn More</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    */

    get_template_part( 'template-parts/component', 'card' );
}



/**
 * Flush out the transients used in wvfrm_categorized_blog.
 */
function wvfrm_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wvfrm_categories' );
}
add_action( 'edit_category', 'wvfrm_category_transient_flusher' );
add_action( 'save_post',     'wvfrm_category_transient_flusher' );



/**
 * Generates four column wide boxes
 *
 */
function wvfrm_card($youtube_img_url) {
    $bg_url = 'http://img.youtube.com/vi/' . $youtube_img_url .'/0.jpg';

    echo
        '<div class="content-card-container">
            <div class="content-card">
                <div class="content-card__bg" 
                style="background: url(' . $bg_url . ') no-repeat top/120%; 
                background-position-y: -25px; 
                background-size: 0;">
                    <a href="' . get_permalink() . '"></a>
                    <div class="content-card__main">
                        <div class="content-card__date">' . get_the_modified_time('F j, Y') . '</div>
                        <div class="content-card__title">' . get_the_title() . '</div>
                        <div class="content-card-btn">
                            <div class="content-card-btn__title">Watch Video</div>
                        </div>
                    </div>
                </div><!-- content-card__bg -->
            </div>
        </div>';
}