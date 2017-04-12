<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */
get_header(); ?>

    <div id="content" class="site-content">
        <div class="archive-page__promo-wide">
            <h2>Promote your product or tutorials right here. <a href="#">Contact us</a>.</h2>
        </div>

        <div class="archive-page" role="main">
            <section>
                <aside class="archive-page__filter">
                    <button onclick="FWP.reset()">View All Tutorials</button>

                    <div id="accordion">
                        <h3>Technology</h3>
                        <div><?php echo facetwp_display( 'facet', 'technology' ); ?></div>

                        <h3>Subject</h3>
                        <div><?php echo facetwp_display( 'facet', 'subject' ); ?></div>

                        <h3>Learning Level</h3>
                        <div><?php echo facetwp_display( 'facet', 'learning_level' ); ?></div>
                    </div>

                </aside>

                <main class="archive-page__results facetwp-template">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post(); ?>

                            <article>
                                <?php wvfrm_card( get_field('youtube_url') ); ?>
                            </article>

                        <?php } // end while

                        the_posts_navigation();
                    } // end if
                    ?>
                </main>
            </section>
        </div>

</div><!-- #primary -->

<?php
get_footer();
