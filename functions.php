<?php
/**
 * excursion functions and definitions
 *
 * @package excursion
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'excursion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function excursion_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on excursion, use a find and replace
	 * to change 'excursion' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'excursion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'excursion' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'excursion_custom_background_args', array(
		'default-color' => '5c6d7e',
		'default-image' => '',
	) ) );
}
endif; // excursion_setup
add_action( 'after_setup_theme', 'excursion_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function excursion_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'excursion' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'excursion' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Secondary sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'excursion_widgets_init' );

/**
 * Register Open Sans Google Font for Excursion.
 */
function excursion_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'excursion' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Open+Sans:300italic,400italic,600italic,700italic,300,400,600,700' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles.
 */
function excursion_scripts() {
	wp_enqueue_style( 'excursion-style', get_stylesheet_uri() );

	// Add Open Sans Google Font.
	wp_enqueue_style( 'excursion-open-sans', excursion_font_url(), array(), null );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	wp_enqueue_script( 'excursion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'excursion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'excursion_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

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
 * Add has-post-thumbnail class to content.
 */
function excursion_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'excursion_post_classes' );

/**
 * Custom excerpt length.
 */
function excursion_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'excursion_excerpt_length', 999 );

/**
 * Custom excerpt read more.
 */
function excursion_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More &rarr;</a>';
}
add_filter( 'excerpt_more', 'excursion_excerpt_more' );

/**
 * Add editor styles.
 */
function excursion_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'excursion_add_editor_styles' );