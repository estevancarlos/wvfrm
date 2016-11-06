<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>

<div class="wrap-video-bg">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <section id="primary-video" class="content-area" role="main">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo get_field('youtube_url'); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </section>

        <header>
            <div class="entry-header">
                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title(
                        '<h1 class="entry-title">
                            <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>
                        </h1>' );
                endif;

                if (get_field('sub_headline')) : ?>
                    <div class="entry-sub_headline">
                        <?php echo '<h2>' . get_field('sub_headline') . '</h2>'; ?>
                    </div>
                <?php endif ?>

                <?php if (get_field('video_source')) : ?>
                <div class="entry-sub_headline">
                    <h2>
                        Source: <a href="<?php echo get_field('video_source'); ?>" role="link" target="_blank">
                            <?php echo get_field('video_source_name'); ?>
                        </a>
                    </h2>
                </div>
                <?php endif ?>

            </div>
            <div class="entry-social">
                <div class="fb-share-button"
                     data-href="http://aug4th.com/wvfrm_alpha/tutorial/ableton-live-sound-design-with-only-built-in-devices/"
                     data-layout="button"
                     data-size="small"
                     data-mobile-iframe="true">
                    <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&title=<?php the_title(); ?>%2F&amp;src=sdkpreparse">Share</a>
                </div>
                Like
            </div>
        </header><!-- .entry-header -->

    </article><!-- #post-## -->
</div>

<div id="secondary" class="wrap-bg">
    <article>
        <section>
            <div class="entry-overview">
                <div class="content-spacing">
                    <div class="entry-meta">
                        <?php wvfrm_posted_on(); ?>
                    </div><!-- .entry-meta -->

                    <?php
                    the_content( sprintf(
                    /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wvfrm' ),
                            array( 'span' => array( 'class' => array() ) )
                        )
                    ) );
                    ?>
                </div>
            </div><!-- .entry-content -->

            <div class="entry-tax-group">
                <section>
                    <div class="content-spacing">
                        <div class="subject-list">
                            <h4>Subject</h4>
                            <?php
                            $terms = get_terms( 'subject', 'orderby=count&hide_empty=0' );
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

                        <div class="technology-list">

                        </div>
                    </div>
                </section>
                <!-- Tags without links -->
                <?php $posttags = wp_get_post_terms( get_the_ID() , 'post_tag' , 'fields=names' ); ?>
                <?php if( $posttags ) echo implode( ' ', $posttags ); ?>
            </div>
        </section>
    </article>
</div>

<article class="fluid related-posts-container">

    <section>
        <aside>
            <h2>Related Tutorials</h2>
            <?php get_template_part( 'template-parts/content', 'related' ); ?>
        </aside>
    </section>

</article>

<article>
    <div class="tertiary-content">
        <?php if(get_field('tutorial_tips')) { ?>
            <section>
                <div class="entry-subtitle">
                    <h3>Tips</h3>
                </div>
                <div class="entry-content-tips">
                    <?php echo get_field('tutorial_tips'); ?>
                </div>
            </section>
        <?php } ?>

        <?php if( has_term( '', 'technology', get_the_ID()) ) { ?>
        <section>
            <div class="entry-subtitle">
                <h3>History</h3>
            </div>
            <div class="entry-content-history">
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

        <?php if( has_term( '', 'subject', get_the_ID()) ) { ?>
        <section>
            <div class="entry-subtitle">
                <h3>Theory</h3>
            </div>
            <div class="entry-content-theory">
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

    </div>

</article>
