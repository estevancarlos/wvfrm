<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wvfrm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <meta property="og:url"           content="http://www.wvfrm.com" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="WVFRM: Your Music Resource" />
    <meta property="og:description"   content="Curated music tutorials" />
    <meta property="og:image"         content="http://www.wvfrm.com/wvfrm_fb.jpg" />
    <?php wp_head(); ?>

    <!--
    https://www.elegantthemes.com/blog/tips-tricks/how-to-add-open-graph-tags-to-wordpress
    -->

    <script>
        document.getElementById('shareBtn').onclick = function() {
            FB.ui({
                display: 'popup',
                method: 'share',
                href: '<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>',
            }, function(response){});
        }
    </script>
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1678565879085894";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="page" class="site">

    <header id="masthead" class="site-header fluid" role="banner">

            <section>
                <div class="site-branding">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                Logo
                            </a>
                        </h1>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <!-- button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" -->
                    <!-- ?php esc_html_e( 'Primary Menu', 'wvfrm' ); ? -->
                    <!-- /button -->
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->

            </section>

        </header><!-- #masthead -->

	<div id="content" class="site-content">
