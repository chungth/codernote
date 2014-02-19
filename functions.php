<?php
/**
 * codernote functions and definitions
 *
 * @package codernote
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'codernote_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function codernote_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on codernote, use a find and replace
	 * to change 'codernote' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'codernote', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'codernote' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'codernote_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // codernote_setup
add_action( 'after_setup_theme', 'codernote_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function codernote_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'codernote' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title bg-primary">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar(array(
		'name'	=> __('Footer','codernote'),
		'id'	=> 'sidebar-2',
		'before_widget'=>'<div id="%1$s" class="col-md-4 widget %2$s>"',
		'after_widget'=> '</div>',
		'before_title'=>'<h4 class="widget-title">',
		'after_title' =>'</h4>',
	));
}
add_action( 'widgets_init', 'codernote_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function codernote_scripts() {
	wp_enqueue_style('bootstrap-css','//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
	wp_enqueue_style('highlight-css','http://yandex.st/highlightjs/8.0/styles/default.min.css');
	wp_enqueue_script('hightlight-js','http://yandex.st/highlightjs/8.0/highlight.min.js',array(),'20140214',true);
	wp_enqueue_style( 'codernote-style', get_stylesheet_uri() );
	wp_enqueue_script('bootstrap-js','//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',array('jquery'),'20140214',true);

	wp_enqueue_script( 'codernote-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'codernote_scripts' );
/**add customize style for default editor*/
function codernote_add_editor_styles() {
	add_editor_style( 'inc/editor-style.css' );
}
add_action( 'init', 'codernote_add_editor_styles' );

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
* Load custom WordPress nav walker.
*/
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';