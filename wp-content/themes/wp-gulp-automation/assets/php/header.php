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


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

<?php
    global $wp_query;
    $post_ID = $wp_query->post->ID;
?>

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

    <div class="header">
        <header>
            <section>
                <div class="logo header__logo"><!-- header__logo el for positioning -->
                    <div class="logo__img">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wvfrm-logo.png">
                        </a>
                    </div>
                </div>
                <div class="menu header__menu">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'menu_size-wide',
                        'walker' => new Walker_Quickstart_Menu(),
                    ) ); ?>
                </div>
                <div class="search header__search">
                    <!-- ?php get_search_form(); ? -->
                </div>
                <div class="header__sign-up">
                    <button class="btn-wv btn-wv__cta">
                        Sign-Up for our Newsletter
                    </button>
                </div>
            </section>
        </header>
    </div>

    <div class="sub-header">
        <header>
            <section>

                <!--
                    Tutorial Archive
                -->
                <?php if ( is_post_type_archive() ) { ?>

                    <div class="sub-header__description">
                        Find a tutorial by technology, subject, and learning level.
                    </div>

                <!--
                    Tutorial Singular
                -->
                <?php } elseif ( is_singular() && get_post_type( get_the_ID() ) == 'tutorial' ) { ?>

                    <div class="sub-header__tags">
                        <div class="sub-header__tags__subj ">
                            <strong>Subjects</strong>
                            <ul>
                                <?php
                                $terms = wp_get_post_terms( $post_ID, 'subject' );
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach ($terms as $term) {
                                        $term_url = esc_url(get_term_link($term->slug, 'subject'));
                                        $term_link = sprintf('<a href="' . get_post_type_archive_link( 'tutorial' ) . '?fwp_subject=' . $term->slug . '">');
                                        echo '<li class="btn-wv btn-wv_tag">' . $term_link . $term->name . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="sub-header__tags__tech">
                            <strong>Technologies</strong>
                            <ul>
                                <?php
                                $terms = wp_get_post_terms( $post_ID, 'technology' );
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach ($terms as $term) {
                                        $term_url = esc_url(get_term_link($term->slug, 'technology'));
                                        $term_link = sprintf('<a href="' . get_post_type_archive_link( 'tutorial' ) . '?fwp_technology=' . $term->slug . '">');
                                        echo '<li class="btn-wv btn-wv_tag">' . $term_link . $term->name . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                <!--
                    Page - Basic
                -->
                <?php } else { ?>
                    <div class="sub-header__description page-basic__header">
                        <?php the_title( '<h1 class="page-basic__header_title">', '</h1>' ); ?>
                    </div>
                <?php }  ?>

            </section>
        </header>
    </div>

	<div id="content" class="site-content">
