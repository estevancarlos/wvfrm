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
