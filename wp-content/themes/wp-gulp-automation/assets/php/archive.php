<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */
get_header(); ?>

archive.php

	<div id="archive" class="content-area">
		<main id="main" class="site-main" role="main">

                <section id="search" class="results-region-container">
                    <div class="facetwp-template">
                        <div class="results-region">

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
                        </div>
                    </div>
                </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
