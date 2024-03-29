<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * 
 * Name:		template-functions.php
 * Original file from: Underscores theme by Automattic
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
 *
 * @package w3_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wt_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ( ! is_active_sidebar( 'wt-site-sidebar' ) ) || is_page() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wt_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wt_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wt_pingback_header' );
