<?php
/**
 * IBM Cognitive Enterprise theme functions.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

define( 'IBM_COGNITIVE_VERSION', '1.0.0' );
define( 'IBM_COGNITIVE_DIR', get_template_directory() );
define( 'IBM_COGNITIVE_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function ibm_cognitive_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'ibm_cognitive_setup' );

/**
 * Return a theme asset URL.
 *
 * @param string $path Path relative to the assets directory.
 */
function ibm_cognitive_asset_url( $path ) {
	return esc_url( IBM_COGNITIVE_URI . '/assets/' . ltrim( $path, '/' ) );
}

/**
 * Enqueue styles and scripts.
 */
function ibm_cognitive_enqueue_assets() {
	wp_enqueue_style(
		'ibm-cognitive-google-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500;1,700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'ibm-cognitive-fonts',
		IBM_COGNITIVE_URI . '/css/fonts.css',
		array( 'ibm-cognitive-google-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-nav',
		IBM_COGNITIVE_URI . '/css/nav.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-hero',
		IBM_COGNITIVE_URI . '/css/hero.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-hero-parallax',
		IBM_COGNITIVE_URI . '/css/hero-parallax.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-intro',
		IBM_COGNITIVE_URI . '/css/intro.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-running-line',
		IBM_COGNITIVE_URI . '/css/running-line.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-deep-blue',
		IBM_COGNITIVE_URI . '/css/deep-blue.css',
		array( 'ibm-cognitive-fonts', 'ibm-cognitive-running-line' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-tech-focus',
		IBM_COGNITIVE_URI . '/css/tech-focus.css',
		array( 'ibm-cognitive-fonts', 'ibm-cognitive-running-line' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-cognitive-story',
		IBM_COGNITIVE_URI . '/css/cognitive-story.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-cognitive-quote',
		IBM_COGNITIVE_URI . '/css/cognitive-quote.css',
		array( 'ibm-cognitive-fonts', 'ibm-cognitive-cognitive-story' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-data-teaser',
		IBM_COGNITIVE_URI . '/css/data-teaser.css',
		array( 'ibm-cognitive-fonts', 'ibm-cognitive-running-line' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-numbers',
		IBM_COGNITIVE_URI . '/css/numbers.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-firstsection',
		IBM_COGNITIVE_URI . '/css/firstsection.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-middle',
		IBM_COGNITIVE_URI . '/css/middle.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-last',
		IBM_COGNITIVE_URI . '/css/last.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-foster-quote',
		IBM_COGNITIVE_URI . '/css/foster-quote.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-bestseller-intro',
		IBM_COGNITIVE_URI . '/css/bestseller-intro.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-bestseller-story',
		IBM_COGNITIVE_URI . '/css/bestseller-story.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-bestseller-quote',
		IBM_COGNITIVE_URI . '/css/bestseller-quote.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-bestseller-horizontal',
		IBM_COGNITIVE_URI . '/css/bestseller-horizontal.css',
		array( 'ibm-cognitive-bestseller-intro', 'ibm-cognitive-bestseller-story', 'ibm-cognitive-bestseller-quote' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-goldcorp-horizontal',
		IBM_COGNITIVE_URI . '/css/goldcorp-horizontal.css',
		array( 'ibm-cognitive-bestseller-horizontal', 'ibm-cognitive-firstsection', 'ibm-cognitive-middle', 'ibm-cognitive-last' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-looties',
		IBM_COGNITIVE_URI . '/css/looties.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-ice-footer',
		IBM_COGNITIVE_URI . '/css/ice-footer.css',
		array( 'ibm-cognitive-fonts' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_style(
		'ibm-cognitive-style',
		get_stylesheet_uri(),
		array( 'ibm-cognitive-nav', 'ibm-cognitive-hero', 'ibm-cognitive-hero-parallax', 'ibm-cognitive-intro', 'ibm-cognitive-deep-blue', 'ibm-cognitive-running-line', 'ibm-cognitive-tech-focus', 'ibm-cognitive-cognitive-story', 'ibm-cognitive-cognitive-quote', 'ibm-cognitive-data-teaser', 'ibm-cognitive-numbers', 'ibm-cognitive-firstsection', 'ibm-cognitive-middle', 'ibm-cognitive-last', 'ibm-cognitive-goldcorp-horizontal', 'ibm-cognitive-foster-quote', 'ibm-cognitive-bestseller-intro', 'ibm-cognitive-bestseller-story', 'ibm-cognitive-bestseller-quote', 'ibm-cognitive-bestseller-horizontal', 'ibm-cognitive-looties', 'ibm-cognitive-ice-footer' ),
		IBM_COGNITIVE_VERSION
	);

	wp_enqueue_script(
		'gsap',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',
		array(),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'gsap-scroll-trigger',
		'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js',
		array( 'gsap' ),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-hero-parallax',
		IBM_COGNITIVE_URI . '/scripts/hero-parallax.js',
		array( 'gsap-scroll-trigger' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'lottie-web',
		'https://cdn.jsdelivr.net/npm/lottie-web@5.12.2/build/player/lottie.min.js',
		array(),
		'5.12.2',
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-deep-blue',
		IBM_COGNITIVE_URI . '/scripts/deep-blue.js',
		array( 'lottie-web', 'gsap-scroll-trigger' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-tech-focus',
		IBM_COGNITIVE_URI . '/scripts/tech-focus.js',
		array( 'gsap-scroll-trigger' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-cognitive-quote',
		IBM_COGNITIVE_URI . '/scripts/cognitive-quote.js',
		array( 'gsap-scroll-trigger' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-counters',
		IBM_COGNITIVE_URI . '/scripts/counters.js',
		array( 'gsap-scroll-trigger' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-looties2',
		IBM_COGNITIVE_URI . '/scripts/looties2.js',
		array( 'lottie-web' ),
		IBM_COGNITIVE_VERSION,
		true
	);

	wp_enqueue_script(
		'ibm-cognitive-bestseller-horizontal',
		IBM_COGNITIVE_URI . '/scripts/bestseller-horizontal.js',
		array(),
		IBM_COGNITIVE_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ibm_cognitive_enqueue_assets' );
