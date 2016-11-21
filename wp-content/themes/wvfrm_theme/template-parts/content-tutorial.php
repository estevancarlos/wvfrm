<?php
/**
 * Template part for displaying tutorials.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>

<!-- Tutorial Article -->


<div class="video">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section>
            <!-- Video Player -->
            <article class="video__embed" role="main">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="853"
                            height="480"
                            src="https://www.youtube.com/embed/<?php echo get_field('youtube_url'); ?>?rel=0&amp;showinfo=0"
                            frameborder="0"
                            allowfullscreen>
                    </iframe>
                </div>
            </article>
        </section>
    </article>
</div>



<article class="video__details">
    <!-- Video Details -->
    <section>
        <!-- Title and sub-headline of Video Article -->
        <header>
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="tutorial-title">', '</h1>' );
            else :
                the_title(
                    '<h1 class="tutorial-title">
                                <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>
                        </h1>'
                );
            endif;
            if ( get_field('sub_headline') ) : ?>
                <h2 class="tutorial-sub_headline">
                    <?php get_field('sub_headline'); ?>
                </h2>
            <?php endif;

            if (get_field('video_source')) : ?>
                <div class="tutorial-source">
                    <h3>
                        Source:
                        <a href="<?php echo get_field('video_source'); ?>" role="link" target="_blank">
                            <?php echo get_field('video_source_name'); ?>
                        </a>
                    </h3>
                </div>
            <?php endif;
            ?>
        </header>

        <!-- Social Share -->
        <aside class="tutorial-share">
            <div class="fb-share-button"
                 data-href="http://aug4th.com/wvfrm_alpha/tutorial/ableton-live-sound-design-with-only-built-in-devices/"
                 data-layout="button"
                 data-size="small"
                 data-mobile-iframe="true">
                <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&title=<?php the_title(); ?>%2F&amp;src=sdkpreparse">Share</a>
            </div>
            <div class="tweet-button">
                Tweet
            </div>
        </aside>
    </section>

    <!-- Tutorial date and Description -->
    <section>
        <aside class="tutorial-overview">
            <div class="tutorial-date">
                <?php wvfrm_posted_on(); ?>
            </div>

            <div class="tutorial-description">
                <?php
                the_content( sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wvfrm' ),
                        array( 'span' => array( 'class' => array() ) )
                    )
                ) );
                ?>
            </div>
        </aside>
        <aside class="tutorial-taxonomy">
            <div class="subject-list">
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
                        <a href="<?php echo esc_url(get_term_link( $term )); ?>">
                            <?php echo $term->name; ?>
                        </a>
                    <?php }
                }
                ?>
            </div>
        </aside>
    </section>
</article>



<section>
    <!-- basic container -->
    <div class="video-region-container blue-bg">
        <section>
            <!-- Video Region -->
            <article class="video-region">

                <!-- Video Details -->
                <div class="video-details">
                    <section>
                        <!-- Title and sub-headline of Video Article -->
                        <header>
                            <?php
                            if ( is_single() ) :
                                the_title( '<h1 class="tutorial-title">', '</h1>' );
                            else :
                                the_title(
                                    '<h1 class="tutorial-title">
                                        <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>
                                </h1>'
                                );
                            endif;
                            if ( get_field('sub_headline') ) : ?>
                                <h2 class="tutorial-sub_headline">
                                    <?php get_field('sub_headline'); ?>
                                </h2>
                            <?php endif;

                            if (get_field('video_source')) : ?>
                                <div class="tutorial-source">
                                    <h3>
                                        Source:
                                        <a href="<?php echo get_field('video_source'); ?>" role="link" target="_blank">
                                            <?php echo get_field('video_source_name'); ?>
                                        </a>
                                    </h3>
                                </div>
                            <?php endif;
                            ?>
                        </header>

                        <!-- Social Share -->
                        <aside class="tutorial-share">
                                <div class="fb-share-button"
                                     data-href="http://aug4th.com/wvfrm_alpha/tutorial/ableton-live-sound-design-with-only-built-in-devices/"
                                     data-layout="button"
                                     data-size="small"
                                     data-mobile-iframe="true">
                                    <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&title=<?php the_title(); ?>%2F&amp;src=sdkpreparse">Share</a>
                                </div>
                                <div class="tweet-button">
                                    Tweet
                                </div>
                            </aside>
                    </section>

                    <!-- Tutorial date and Description -->
                    <section>
                        <aside class="tutorial-overview">
                            <div class="tutorial-date">
                                <?php wvfrm_posted_on(); ?>
                            </div>

                            <div class="tutorial-description">
                                <?php
                                the_content( sprintf(
                                /* translators: %s: Name of current post. */
                                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wvfrm' ),
                                        array( 'span' => array( 'class' => array() ) )
                                    )
                                ) );
                                ?>
                            </div>
                        </aside>
                        <aside class="tutorial-taxonomy">
                            <div class="subject-list">
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
                                        <a href="<?php echo esc_url(get_term_link( $term )); ?>">
                                            <?php echo $term->name; ?>
                                        </a>
                                    <?php }
                                }
                                ?>
                            </div>
                        </aside>
                    </section>
                </div>
            </article>
        </section>
    </div><!-- END wrap-video-bg -->

    <!-- fluid container -->
    <div class="related-region-container blue-bg">
        <section>
            <!-- Related Region -->
            <?php get_template_part( 'template-parts/region', 'related' ); ?>
        </section>
    </div>

    <!-- basic container -->
    <div class="supplemental-region-container">
        <section>
            <!-- Supplemental Region -->
            <article class="supplemental-content">
                <header>
                    <h1>Learn more about the video</h1>
                </header>

                <!-- Sidebar -->
                <?php get_template_part( 'template-parts/component', 'supplement-sidebar' ); ?>

                <article class="supplemental-content-primary">
                    <!-- Tips -->
                    <?php if(get_field('tutorial_tips')) { ?>
                        <section>
                            <h3>Our Advice</h3>
                            <div class="supplemental-content-tips">
                                <?php echo get_field('tutorial_tips'); ?>
                            </div>
                        </section>
                    <?php } ?>

                    <!-- History -->
                    <?php if( has_term( '', 'technology', get_the_ID()) ) { ?>
                        <section>
                            <h3>History</h3>
                            <div class="supplemental-content-history">
                                <?php
                                $terms_tech = get_the_terms( get_the_ID(), 'technology' );
                                if ( ! empty( $terms_tech ) && ! is_wp_error( $terms_tech ) ){ ?>
                                    <?php foreach ( $terms_tech as $term_tech ) {
                                        $history_part = $term_tech->slug;
                                        get_template_part( 'template-parts/content-history', $history_part );
                                    }
                                }
                                ?>
                            </div>
                        </section>
                    <?php } ?>

                    <!-- Theory -->
                    <?php if( has_term( '', 'subject', get_the_ID()) ) { ?>
                        <section>
                            <h3>Theory</h3>
                            <div class="supplemental-content-theory">
                                <?php
                                $terms_subj = get_the_terms( get_the_ID(), 'subject' );
                                if ( ! empty( $terms_subj ) && ! is_wp_error( $terms_subj ) ){
                                    foreach ( $terms_subj as $term_subj ) {
                                        $theory_part = $term_subj->slug;
                                        get_template_part( 'template-parts/content-theory', $theory_part );
                                    }
                                }
                                ?>
                            </div>
                        </section>
                    <?php } ?>
                </article>

            </article><!-- END supplemental-content -->
        </section>
    </div>
</section><!-- END Post-ID -->



<footer>

</footer>