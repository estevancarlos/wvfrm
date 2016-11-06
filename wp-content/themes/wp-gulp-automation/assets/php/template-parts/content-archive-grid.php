<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */
?>
content-archive-grid.php
<section id="post-<?php the_ID(); ?>" <?php post_class('results-region-container'); ?>>

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





    </div>

</section><!-- #post-## -->
