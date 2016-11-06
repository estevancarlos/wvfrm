<?php
/**
 * WP Query Related Posts
 */
function wvfrm_related_posts_query() {
    $rand_tax = 'subject';
    $rand_num = rand(0,1);

    if($rand_num > 0) {
        $rand_tax = 'technology';
    }

    $term_list = wp_get_post_terms( get_the_ID() , $rand_tax, array( 'fields' => 'all' ) );

    foreach($term_list as $tax_term) {
        $q_args = array(
            'post_type' => 'tutorial',
            'tax_query' => array(
                array(
                    'taxonomy'  => $rand_tax,
                    'field'     => 'slug',
                    'terms'     => $tax_term->name,
                ),
            ),
            'posts_per_page' => 4,
            'post__not_in' => array( get_the_ID() ),
            'orderby' => 'rand',
        );

        $the_query = new WP_Query( $q_args );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                wvfrm_card( get_field('youtube_url') );
                $q_count++;
            }
            wp_reset_postdata();
        } else {
            // no posts found
        }
    }
}



/**
 * WP Query Posts
 */
function wvfrm_posts_query() {
    $the_query = new WP_Query();
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            /* Template Tags */
            wvfrm_card( get_field('youtube_url') );
        }
        wp_reset_postdata();
    } else {
        // no posts found
    }

}