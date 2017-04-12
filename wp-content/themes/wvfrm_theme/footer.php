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

<div class="footer footer_bg">
    <footer id="colophon" role="contentinfo">
        <section>
            <div class="footer__menu">
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'menu_class' => 'menu_size-wide',
                    'walker' => new Walker_Quickstart_Menu(),
                ) ); ?>
            </div>
            <div class="footer__greeting">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wvfrm' ) ); ?>"><?php printf( esc_html__( 'Made in Los Angeles by %s', 'wvfrm' ), 'WVFRM' ); ?></a>
            </div><!-- .site-info -->
        </section>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
