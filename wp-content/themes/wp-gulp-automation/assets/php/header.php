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

    <header class="header">
        <div class="logo header__logo"><!-- header__logo el for positioning -->
            <div class="logo__img">

            </div>
        </div>
        <div class="menu header__menu">
            <ul class="menu_size-wide">
                <li class="menu__option">Tutorials</li>
                <li class="menu__option">Lesson Plans</li>
                <li class="menu__option">Downloads</li>
            </ul>
        </div>
        <div class="search header__search">

        </div>
        <div class="header__sign-up">
            <button class="btn-wv btn-wv_cta">
                Sign-Up for our Newsletter
            </button>
        </div>
    </header>

	<div id="content" class="site-content">
