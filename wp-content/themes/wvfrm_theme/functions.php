<?php
/**
 * wvfrm functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wvfrm
 */

if ( ! function_exists( 'wvfrm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wvfrm_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wvfrm, use a find and replace
	 * to change 'wvfrm' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wvfrm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wvfrm' ),
	) );

    // Blacklist WordPress menu class names
    // https://wpscholar.com/blog/remove-extraneous-wordpress-nav-menu-class-names/
    add_filter( 'nav_menu_css_class', function ( array $classes, $item, $args, $depth ) {
        $disallowed_class_names = array(
            "menu-item-object-{$item->object}",
            "menu-item-type-{$item->type}",
            "menu-item-{$item->ID}",
            "current-{$item->object}-item",
            "current-{$item->type}-item",
            "current-{$item->object}-parent",
            "current-{$item->type}-parent",
            "current-{$item->object}-ancestor",
            "current-{$item->type}-ancestor",
            'page_item',
            'page_item_has_children',
            "page-item-{$item->object_id}",
            'current_page_item',
            'current_page_parent',
            'current_page_ancestor',
        );
        foreach ( $classes as $class ) {
            if ( in_array( $class, $disallowed_class_names ) ) {
                $key = array_search( $class, $classes );
                if ( false !== $key ) {
                    unset( $classes[ $key ] );
                }
            }
        }

        return $classes;
    }, 10, 4 );

    $allowed_class_names = array(
        'current-menu-parent',
    );

    // Replaces classes on li menu items
    // https://codex.wordpress.org/Class_Reference/Walker
    class Walker_Quickstart_Menu extends Walker {

        // Tell Walker where to inherit it's parent and id values
        var $db_fields = array(
            'parent' => 'menu_item_parent',
            'id'     => 'db_id'
        );

        /**
         * At the start of each element, output a <li> and <a> tag structure.
         *
         * Note: Menu objects include url and title properties, so we will use those.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $output .= sprintf( "\n<li class='menu__option'><a href='%s'%s>%s</a></li>\n",
                $item->url,
                ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
                $item->title
            );
        }

    }

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
    /*
	add_theme_support( 'custom-background', apply_filters( 'wvfrm_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    */
}
endif;
add_action( 'after_setup_theme', 'wvfrm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wvfrm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wvfrm_content_width', 640 );
}
add_action( 'after_setup_theme', 'wvfrm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wvfrm_widgets_init() {
    $sidebars = array (
        'sidebar-1'       => 'Main Sidebar',
        'sidebar-2'       => 'Related Posts Sidebar',
        'sidebar-3'       => 'Subscribe Sidebar',
    );

    foreach ( $sidebars as $id => $sidebar) {
        register_sidebar(array(
            'name' => esc_html__($sidebar, 'wvfrm'),
            'id' => $id,
            'description' => esc_html__('Add widgets here.', 'wvfrm'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }
}
add_action( 'widgets_init', 'wvfrm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wvfrm_scripts() {
	wp_enqueue_style('wvfrm-style', get_stylesheet_uri() );
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('wvfrm-scripts', get_template_directory_uri() . '/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-ui-accordion'), '2016-11-25', true );

	//wp_enqueue_script( 'wvfrm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    /* Custom Scripts
    https://premium.wpmudev.org/blog/adding-jquery-scripts-wordpress/ */
    //wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );

    /* Font Scripts */
    wp_register_script('icon-scripts', 'https://use.fontawesome.com/3c07d4dc47.js');
    wp_enqueue_script('icon-scripts');

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rubik|Open+Sans:400,400i,700', false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wvfrm_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom queries
 */
require get_template_directory() . '/inc/query-functions.php';



/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Post Types
 */

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
    $labels = array(
        "name" => __( 'Tutorials', '' ),
        "singular_name" => __( 'Tutorial', '' ),
    );

    $args = array(
        "label" => __( 'Tutorials', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "tutorials", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 6,
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author" ),
        "taxonomies" => array( "technology", "subject" ),
    );
    register_post_type( "tutorial", $args );

// End of cptui_register_my_cpts()
}

/**
 * Custom Fields
 */


// Video Fields
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_video',
        'title' => 'Video',
        'fields' => array (
            array (
                'key' => 'field_583b2124a2d99',
                'label' => 'Youtube Details',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_57a7771b5cbe2',
                'label' => 'Youtube URL',
                'name' => 'youtube_url',
                'type' => 'text',
                'instructions' => 'Copy the special Youtube code which comes right after \'embed/\'.',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_57a7776e5cbe3',
                'label' => 'Video Source',
                'name' => 'video_source',
                'type' => 'text',
                'instructions' => 'A link to the Youtube account page',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583b1f619d3b5',
                'label' => 'Education Source',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_583b1fdb9d3b7',
                'label' => 'Video Source Type',
                'name' => 'video_source_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    'Non-Registered Educator' => 'Non-Registered Educator',
                    'Registered Educator' => 'Registered Educator',
                ),
                'default_value' => array (
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_583b1f849d3b6',
                'label' => 'Non-Registered Educator',
                'name' => 'non_registered_edu',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_583b1fdb9d3b7',
                            'operator' => '==',
                            'value' => 'Non-Registered Educator',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583b1f2e9d3b4',
                'label' => 'Registered Educator',
                'name' => 'registered_edu',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_583b1fdb9d3b7',
                            'operator' => '==',
                            'value' => 'Registered Educator',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array (
                    0 => 'educator',
                ),
                'taxonomy' => array (
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'tutorial',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

// Tutorial Fields

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_58357023a3167',
        'title' => 'Tutorial Content',
        'fields' => array (
            array (
                'key' => 'field_583570ebb0a41',
                'label' => 'Sub-Headline',
                'name' => 'sub_headline',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_583571531b10e',
                'label' => 'Tips',
                'name' => 'tips',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_5835716d1b10f',
                'min' => '',
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Add Tip',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5835716d1b10f',
                        'label' => 'Tip Content',
                        'name' => 'tip_content',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => 3,
                        'new_lines' => 'wpautop',
                    ),
                    array (
                        'key' => 'field_583571c21b110',
                        'label' => 'Source',
                        'name' => 'tip_source',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'tutorial',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;

/**
 * Taxonomies
 */
add_action('init', 'technology_init', 0);
function technology_init() {
    $labels = array(
        'name'          => _x('Technology', 'Music technologies'),
        'singular_name' => _x('Technology', 'Music technology'),
        'menu_name'     => __('Technologies'),
    );

    $args = array(
        'hierarchical'  => false,
        'labels'        => $labels,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_admin_column' => true,
        'query_var'     => 'technologies',
    );

    register_taxonomy('technology', 'tutorial', $args);
}

add_action('init', 'subjects_init', 0);
function subjects_init() {
    $labels = array(
        'name'          => _x('Subject', 'Music subjects'),
        'singular_name' => _x('Subject', 'Music subject'),
        'menu_name'     => __('Subjects'),
    );

    $args = array(
        'hierarchical'  => false,
        'labels'        => $labels,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_admin_column' => true,
        'query_var'     => 'subjects',
    );

    register_taxonomy('subject', 'tutorial', $args);
}

add_action('init', 'level_init', 0);
function level_init() {
    $labels = array(
        'name'          => _x('Learning Level', 'Learning Levels'),
        'singular_name' => _x('Learning Level', 'Learning Level'),
        'menu_name'     => __('Learning Levels'),
    );

    $args = array(
        'hierarchical'  => false,
        'labels'        => $labels,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_admin_column' => true,
        'query_var'     => 'levels',
    );

    register_taxonomy('level', 'tutorial', $args);
}


/*
 * Redirect
 */

function my_page_template_redirect()
{
    if( is_home() )
    {
        wp_redirect( home_url( '/tutorial/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'my_page_template_redirect' );