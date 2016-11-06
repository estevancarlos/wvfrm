<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>
content.php
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-excerpt">
                    <p><?php echo get_the_excerpt(); ?></p>
                </div>

                <div class="entry-meta">
                    meta: <?php wvfrm_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
            endif; ?>
        </div>
		<div class="entry-social">
            Like Share
        </div>
	</header><!-- .entry-header -->

    <section>
        <div class="border wide"></div>
    </section>

    <section>
        <div class="entry-overview">
            <?php
            the_content( sprintf(
            /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wvfrm' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
            ?>
        </div><!-- .entry-content -->

        <div class="entry-tax-group">
            <!-- Tags without links -->
            <?php $posttags = wp_get_post_terms( get_the_ID() , 'post_tag' , 'fields=names' ); ?>
            <?php if( $posttags ) echo implode( ' ' , $posttags ); ?>
        </div>
    </section>



</article><!-- #post-## -->
