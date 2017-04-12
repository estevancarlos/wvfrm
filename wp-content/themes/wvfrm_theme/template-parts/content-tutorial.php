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
    <div class="video_bg">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section>
                <!-- Video Player -->
                <div class="video__embed" role="main">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="853"
                                height="480"
                                src="https://www.youtube.com/embed/<?php echo get_field('youtube_url'); ?>?rel=0&amp;showinfo=0"
                                frameborder="0"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </section>
        </article>
    </div>

    <div class="video__details">
        <article>
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
                        <?php
                    endif;
                    echo get_the_tag_list('<p>Tags: ',', ','</p>');
                    ?>
                </header>

                <!-- Social Share -->
                <aside class="video__share">
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
        </article>
    </div>
</div>

<div class="article">
    <article>
        <section>
            <div class="left-col">
                <aside class="article__overview">
                    <h3>Overview</h3>
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

                <?php if( has_term( '', 'technology', get_the_ID()) ) { ?>
                    <div class="article__history">
                        <h3>History</h3>
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
                <?php } ?>

                <?php if( has_term( '', 'subject', get_the_ID()) ) { ?>
                    <div class="article__theory">
                        <h3>Theory</h3>
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
                <?php } ?>
            </div>

            <div class="right-col">
                <!-- Tips -->
                <?php if(get_field('tips')) { ?>
                    <div class="article__tips tips">
                        <h3>Tips</h3>
                        <!-- ?php echo get_field('tutorial_tips'); ? -->

                        <?php
                        if( have_rows('tips') ): ?>
                            <ul class="card">
                            <?php
                            while ( have_rows('tips') ) : the_row(); ?>
                                <li class="card_tip">
                                    <?php the_sub_field('tip_content'); ?>
                                    <div><?php the_sub_field('tip_source'); ?></div>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php
                        else : ?>

                        <?php endif;
                        ?>
                    </div>
                <?php } else { ?>
                    No tips
                <?php } ?>
            </div>
        </section>
    </article>
</div>

<aside class="aside">
    <section>
        <?php get_template_part( 'template-parts/content', 'related' ); ?>
    </section>
</aside>

<?php get_footer(); ?>