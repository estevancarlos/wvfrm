<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>
<div class="archive-color">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section>
            <div class="listing-item">
                <a class="btn-fill" href="<?php the_permalink(); ?>"></a>
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
                <ul>
                    <li><strong>Subject: </strong>
                        <?php $terms = get_terms( 'subject', 'orderby=count&hide_empty=0' );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            foreach ( $terms as $term ) {
                                echo $term->name;
                            }
                        } ?>
                    </li>
                    <li><strong>Technology: </strong>
                        <?php $terms = wp_get_post_terms(get_the_ID(), 'technology', 'orderby=count&hide_empty=0' );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            foreach ( $terms as $term ) {
                                echo $term->name;
                            }
                        } ?>
                    </li>
                </ul>
            </div>
        </section>
    </article><!-- #post-## -->
</div>