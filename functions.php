<?php
/**
 * Nonprofit Organization functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nonprofit_Organization
 */

if ( ! function_exists( 'nonprofit_org_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nonprofit_org_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nonprofit Organization, use a find and replace
	 * to change 'nonprofit-org' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nonprofit-org', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'nonprofit-org' ),
		'top-menu' => esc_html__( 'Top Menu', 'nonprofit-org' ),
		'mobile-menu' => esc_html__( 'Mobile Menu', 'nonprofit-org' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nonprofit_org_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // nonprofit_org_setup
add_action( 'after_setup_theme', 'nonprofit_org_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nonprofit_org_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nonprofit_org_content_width', 640 );
}
add_action( 'after_setup_theme', 'nonprofit_org_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function nonprofit_org_scripts() {
	wp_enqueue_style( 'nonprofit-org-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'nonprofit-org-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'nonprofit-org-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nonprofit_org_scripts' );

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
 * Custom Code starts here
 */

//Add fonts and script
function enqueue_styles_scripts() { 
	wp_enqueue_style('gfonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600');
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

	//for responsive navigation
	wp_enqueue_script( 'nonprofit-org-mobile-navigation', get_template_directory_uri() . '/js/navigation-custom.js', array('jquery'), '20120206', true );

	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js' );
	//wp_enqueue_script( 'REM-unit-polyfill', get_template_directory_uri() . '/js/rem.js', false, false, true );
} 

add_action('wp_enqueue_scripts', 'enqueue_styles_scripts');

function nonprofit_org_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Newsletter', 'nonprofit-org' ),
		'id'            => 'footer-newsletter',
		'description'   => 'mailpoet newsletter subscribe area in footer',
		) );

}
add_action( 'widgets_init', 'nonprofit_org_widgets_init' );

//create custom post type Story
function create_post_type_story() {
	// set up labels
	$labels = array(
		'name' => 'Stories',
		'singular_name' => 'Story',
		'add_new' => 'Add New Story',
		'add_new_item' => 'Add New Story',
		'edit_item' => 'Edit Story',
		'new_item' => 'New Story',
		'all_items' => 'All Stories',
		'view_item' => 'View Story',
		'search_items' => 'Search Stories',
		'not_found' =>  'No Stories Found',
		'not_found_in_trash' => 'No Stories found in Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Stories',
		);
    //register post type
	register_post_type( 'Story', array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),
		'taxonomies' => array(  ),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'Stories' ),
		)
	);

}
add_action( 'init', 'create_post_type_story' );

//hide admin bar on front end
//show_admin_bar( false );

// see what template you are using at footer
add_action( 'admin_bar_menu', 'show_template' );
function show_template() {
	global $template;
	print_r( $template );
}