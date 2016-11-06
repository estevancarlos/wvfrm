<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wvfrm
 */

?>

	</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <section>
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wvfrm' ) ); ?>"><?php printf( esc_html__( 'Made in Los Angeles by %s', 'wvfrm' ), 'WVFRM' ); ?></a>
            </div><!-- .site-info -->
        </section>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
