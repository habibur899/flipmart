<?php
/**
 * flipmart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flipmart
 */

if ( ! defined( 'FLIPMART_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FLIPMART_VERSION', '1.0.0' );
}

if ( ! function_exists( 'flipmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flipmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flipmart, use a find and replace
		 * to change 'flipmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flipmart', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'flipmart' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);


		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'flipmart_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'flipmart_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flipmart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flipmart_content_width', 640 );
}

add_action( 'after_setup_theme', 'flipmart_content_width', 0 );

/* Enqueue scripts and styles.*/
function flipmart_asset_scripts() {
	//CSS
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'blue-css', get_template_directory_uri() . '/assets/css/blue.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'owl-transitions-css', get_template_directory_uri() . '/assets/css/owl.transitions.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'animate-min-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'rateit-css', get_template_directory_uri() . '/assets/css/rateit.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'bootstrap-select-css', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), FLIPMART_VERSION, 'all' );
	wp_enqueue_style( 'roboto-css', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700' );
	wp_enqueue_style( 'opensans-css', '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' );
	wp_enqueue_style( 'montserrat-css', '//fonts.googleapis.com/css?family=Montserrat:400,700' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), FLIPMART_VERSION, 'all' );

	//JS
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'bootstrap-hover-dropdown-js', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'owl-carousel-min-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'echo-min-js', get_template_directory_uri() . '/assets/js/echo.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'jquery-easing-js', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'bootstrap-slider-js', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'jquery-rateit-min-js', get_template_directory_uri() . '/assets/js/jquery.rateit.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'lightbox-min-js', get_template_directory_uri() . '/assets/js/lightbox.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'bootstrap-select-min-js', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'wow-min-js', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), FLIPMART_VERSION, true );
	wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), FLIPMART_VERSION, true );


}

add_action( 'wp_enqueue_scripts', 'flipmart_asset_scripts' );
