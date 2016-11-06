<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */
get_header(); ?>
HOME.php
    <div id="home" class="content-area wrap-bg" role="main">

        <section>
            <div class="landingpage-content">
                <div class="search-prompt">
                    <h1>Find free, curated,<br />music tutorials.</h1>
                    <?php echo do_shortcode( '[ULWPQSF id=41 formtitle=0]' ); ?>
                </div>
            </div>
        </section>

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
        </section>


    </div><!-- #primary -->

<?php
get_sidebar('sidebar-1');
get_footer();
