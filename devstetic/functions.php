<?php
/**
 * Devstetic Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Devstetic_Theme
 */

if ( ! function_exists( 'devstetic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function devstetic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Devstetic Theme, use a find and replace
		 * to change 'devstetic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'devstetic', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'devstetic' ),
		) );

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
		add_theme_support( 'custom-background', apply_filters( 'devstetic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add image sizes
		add_image_size('works-archive', 9999, 300, array('center', 'center') );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'devstetic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devstetic_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'devstetic_content_width', 640 );
}
add_action( 'after_setup_theme', 'devstetic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devstetic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'devstetic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'devstetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'devstetic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function devstetic_scripts() {
	
	wp_enqueue_style( 'devstetic-bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'devstetic-slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );

	wp_enqueue_style( 'devstetic-slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css
' );

	wp_enqueue_style( 'devstetic-aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

	wp_enqueue_style( 'devstetic-fullpage-css', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.5/fullpage.css' );

	wp_enqueue_style('devstetic-montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext');
		
	wp_enqueue_style( 'devstetic-style', get_stylesheet_uri() );

	wp_enqueue_style( 'devstetic-manager-style',  get_template_directory_uri() . '/manager/manager.css' );
	
	wp_enqueue_script( 'devstetic-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', null, null, true );

	wp_enqueue_script( 'devstetic-fontawesome', 'https://kit.fontawesome.com/185901124c.js', null, null, true );

	wp_enqueue_script( 'devstetic-aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', null, null, true );

	wp_enqueue_script( 'devstetic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'devstetic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'devstetic-slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, null, true );
	
	wp_enqueue_script( 'devstetic-theme-scripts', get_template_directory_uri() . '/js/theme-scripts.js', array(), '20151215', true );
	


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devstetic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page('Theme Options');
}

function load_custom_wp_admin_style() {
        wp_register_style( 'projects_admin_css', get_template_directory_uri() . '/manager/manager-admin.css', false, '1.0.0' );
        wp_enqueue_style( 'projects_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/*
 * Add columns to exhibition post list
 */
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'status' => __ ( 'Status' )
   ) );
 }
 add_filter ( 'manage_projects_posts_columns', 'add_acf_columns' );

  /*
 * Add columns to exhibition post list
 */
 function projects_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'status':
       $status = get_post_meta ( $post_id, 'details_status', true );
       $statusstrip = str_replace(" ", "", $status);
	   $statusid = strtolower($statusstrip);

       echo '<span id="' . $statusid . '">' . $status . '</span>';
       break;
   }
 }
 add_action ( 'manage_projects_posts_custom_column', 'projects_custom_column', 10, 2 );
