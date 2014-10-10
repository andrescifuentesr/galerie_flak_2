<?php
/**
 * galerie_flak functions and definitions
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since galerie_flak 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'galerie_flak_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since galerie_flak 1.0
 */
function galerie_flak_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on galerie_flak, use a find and replace
	 * to change 'galerie_flak' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'galerie_flak_2', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'galerie_flak_2' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // galerie_flak_setup
add_action( 'after_setup_theme', 'galerie_flak_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since galerie_flak 1.0
 */
function galerie_flak_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'galerie_flak_2' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Language', 'galerie_flak_2' ),
		'id' => 'sidebar-',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'galerie_flak_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function galerie_flak_scripts() {
	wp_enqueue_style( 'style-min', get_stylesheet_uri() );

/*
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );

	 wp_enqueue_script( 'fancy-helper', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array( 'jquery' ), false, true );
	
	wp_enqueue_script( 'touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js',array( 'jquery' ), '2.2.0', true );
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), '2.2.0', true );

	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.1.0-packed.js', array( 'jquery' ), '6.1.0', true );

	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
*/    
	wp_enqueue_script( 'general-zip', get_template_directory_uri() . '/js/inc-js-zip-ck.js', array( 'jquery' ), '', true );
	
	//flexslider pour le pages category
	if ( is_category() ) {
		wp_enqueue_script( 'script-flexslider-cat', get_template_directory_uri() . '/js/script-flexslider-cat.js', array( 'jquery' ), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'galerie_flak_scripts' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


/**
 * Custom template functions for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';
