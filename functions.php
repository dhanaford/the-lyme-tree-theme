<?php
/**
 * DGT Soraka
 * @package     dgt-soraka
 * @version     1.0.0
 * @author      Dragontheme
 * @link        http://dgtthemes.com
 * @copyright   Copyright (c) 2016 Dragontheme
 * @license     Commercial
 */

/**
 * Redux Framework additions.
 *
 * @since DGT Soraka 1.0
 */
require get_template_directory() . '/inc/theme_option/theme_option.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since DGT Soraka 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

include_once 'class-tgm-plugin-activation.php';

/**
 * Dragontheme only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'dragontheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since DGT Soraka 1.0
 */
function dragontheme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dragontheme, use a find and replace
	 * to change 'dgt-soraka' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dgt-soraka', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dgt-soraka' ),
		'footer' => esc_html__( 'Footer Menu', 'dgt-soraka' ),
		'mobile' => esc_html__( 'Mobile Menu', 'dgt-soraka' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	add_theme_support( 'woocommerce' );
}
endif; // dragontheme_setup
add_action( 'after_setup_theme', 'dragontheme_setup' );


if(! function_exists('dragontheme_widgets_init')):
/**
 * Register widget area.
 *
 * @since DGT Soraka 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dragontheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area', 'dgt-soraka' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'dgt-soraka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dragontheme_widgets_init' );
endif;


if(! function_exists('dragontheme_javascript_detection')):
/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since DGT Soraka 1.0
 */
function dragontheme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'dragontheme_javascript_detection', 0 );
endif;

if(! function_exists('dragontheme_scripts')):
/**
 * Enqueue scripts and styles.
 *
 * @since DGT Soraka 1.0
 */
function dragontheme_scripts() {
	$dgt_enable_responsive = dragontheme_get_option('enable-responsive', '1');

	// Load the css theme
	wp_enqueue_style( 'font-ionicons', get_template_directory_uri() . '/assets/ionicons/css/ionicons.min.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.css');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/owl-carousel/owl.theme.css');
	wp_enqueue_style( 'flickity', get_template_directory_uri() . '/assets/flickity/flickity.css');
	wp_enqueue_style( 'selectbox', get_template_directory_uri() . '/css/jquery.selectBox.css');
	wp_enqueue_style('venobox', get_template_directory_uri() . '/assets/venobox/venobox.css');
	if(!$dgt_enable_responsive){
		wp_enqueue_style( 'bootstrap-non-responsive', get_template_directory_uri() . '/assets/bootstrap/css/non-responsive.css');
	}

	// Load our main stylesheet.
	wp_enqueue_style( 'dragontheme-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'dragontheme-ie', get_template_directory_uri() . '/css/ie.css', array( 'dragontheme-style' ), '20141010' );
	wp_style_add_data( 'dragontheme-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'dragontheme-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'dragontheme-style' ), '20141010' );
	wp_style_add_data( 'dragontheme-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'dragontheme-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'dragontheme-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'dragontheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'dragontheme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	$rtl_get = 0;
	if(isset($_GET['rtl']) && $_GET['rtl'] == 'true'){
		$rtl_get = 1;
	}

	if($rtl_get == 1){
		wp_enqueue_style('default-rtl', get_template_directory_uri() . '/rtl.css');
	}

	if(is_rtl() || $rtl_get == 1){
		wp_enqueue_style('dgt-rtl', get_template_directory_uri() . '/css/dgt-rtl.css');
		wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-rtl.min.css');
	}

	wp_enqueue_script( 'dragontheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

	// Load the js theme
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/waypoints/lib/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'counter-up', get_template_directory_uri() . '/assets/counterup/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '1.3.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/isotope/isotope.pkgd.min.js', array( 'jquery' ), '3.0.1', true );
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/assets/flickity/flickity.pkgd.min.js', array( 'jquery' ), '2.0.3', true );
	wp_enqueue_script( 'sticky-header', get_template_directory_uri() . '/js/sticky-header.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'selectbox', get_template_directory_uri() . '/js/jquery.selectBox.js', array( 'jquery' ), '1.2.0', true );
	wp_enqueue_script('venobox', get_template_directory_uri() . '/assets/venobox/venobox.min.js', array(), '1.6.0', true);

	wp_enqueue_script( 'dgt-theme-js', get_template_directory_uri() . '/js/dgt-theme.js', array( 'jquery' ), '1.0.0', true );
	wp_add_inline_script( 'dgt-theme-js', dragontheme_get_option('custom-js', '') );

	wp_localize_script('dgt-theme-js', 'DGTJS', array(
		'enable_quickview' => dragontheme_get_option('enable-quickview', '1'),
		'enable_filter' => dragontheme_get_option('enable-filter', '1'),
		'enable_backtotop' => dragontheme_get_option('enable-backtotop', '1')
	) );

	wp_localize_script( 'dragontheme-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'dgt-soraka' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'dgt-soraka' ) . '</span>',
	) );


}
add_action( 'wp_enqueue_scripts', 'dragontheme_scripts' );
endif;

if(! function_exists('dragontheme_post_nav_background')):
/**
 * Add featured image as background image to post navigation elements.
 *
 * @since DGT Soraka 1.0
 *
 * @see wp_add_inline_style()
 */
function dragontheme_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'dragontheme-style', $css );
}
add_action( 'wp_enqueue_scripts', 'dragontheme_post_nav_background' );
endif;

if(! function_exists('dragontheme_search_form_modify')):
/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since DGT Soraka 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function dragontheme_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'dragontheme_search_form_modify' );
endif;//dragontheme_search_form_modify

if(!function_exists('dragontheme_get_option')):
/**
 * @param $option_name
 * @param null $default
 * @return mixed
 */
function dragontheme_get_option($option_name, $default = null){
	global $dragontheme_option;
	if(isset($dragontheme_option[$option_name])){
		return $dragontheme_option[$option_name];
	}else{
		$options = explode('/', $option_name);
		$count = count($options);
		if($count > 1 ){
			if( $count == 2 ){
				return isset($dragontheme_option[$options[0]][$options[1]]) ? $dragontheme_option[$options[0]][$options[1]] : $default ;
			}
			if($count == 3 ){
				return isset($dragontheme_option[$options[0]][$options[1]][$options[2]]) ? $dragontheme_option[$options[0]][$options[1]][$options[2]] : $default ;
			}
			if($count == 4 ){
				return isset($dragontheme_option[$options[0]][$options[1]][$options[2]][$options[3]]) ? $dragontheme_option[$options[0]][$options[1]][$options[2]][$options[3]] : $default;
			}
		}
	}
	return $default;
}
endif; //dragontheme_get_option

// Get heading icon
if(!function_exists('dragontheme_get_heading_icon')){
	function dragontheme_get_heading_icon(){
		$heading_icon = dragontheme_get_option('heading-icon', '0');
		$heading_icon_image = dragontheme_get_option('heading-icon-image');
		$output = '';
		if ($heading_icon) {
			$output .= '<span class="dgt-heading-icon">';
			if ($heading_icon_image['url'] != '') {
				$output .= '<img src="' . esc_url($heading_icon_image['url']) . '" width="'. esc_attr($heading_icon_image['url']) .'" height="'. esc_attr($heading_icon_image['height']) .'" alt="' . esc_html__('Icon Heading', 'dgt-soraka') . '" />';
			} else {
				$output .= '<img src="' . get_template_directory_uri() . '/images/icon-heading.png" width="80" height="15" alt="' . esc_html__('Icon Heading', 'dgt-soraka') . '" />';
			}
			$output .= '</span>';
		}
		return $output;
	}
}

/**
 * Custom template tags for this theme.
 *
 * @since DGT Soraka 1.0
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Dragon theme function.
 *
 * @since DGT Soraka 1.0
 */
require get_template_directory() . '/inc/theme-function.php';
