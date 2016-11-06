<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

get_header(); ?>
taxonomy.php
    <section id="search" class="results-region-container">
        <div class="results-region">

            <div class="taxonomy-list">
                <h4>Subject</h4>
                <?php
                $terms = wp_get_post_terms(get_the_ID(), 'subject', 'orderby=count&hide_empty=0' );
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) { ?>
                        <a href="<?php echo esc_url(get_term_link( $term )); ?>">
                            <?php echo $term->name; ?>
                        </a>
                    <?php }
                }
                ?>

                <h4>Technology</h4>
                <?php
                $terms = wp_get_post_terms(get_the_ID(), 'technology', 'orderby=count&hide_empty=0' );
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) { ?>
                        <a href="<?php echo esc_url(get_term_link( $term )); ?>"><?php echo $term->name; ?></a>
                    <?php }
                }
                ?>
            </div>


            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); ?>

                    <article>
                        <?php wvfrm_card( get_field('youtube_url') ); ?>
                    </article>

                <?php } // end while
            } // end if
            ?>
        </div>
    </section><!-- #primary -->

<?php
get_footer();
