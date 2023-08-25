<?php
/**
 * Common template functionality, factored out to avoid repetition.
 * 
 * Name: template-helper-functions.php
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
 * 
 * @package w3_theme
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

if ( ! function_exists( 'wt_page_header_single' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with given titles
	 */
	function wt_page_header_single() {
		echo '
		<header class="w3-container page-header">
			<div class="page-header-inner">
		';
		echo '<h1 class="page-title">' . get_the_title() . '</h1>';
		theme_breadcrumb();
		echo '
			</div><!-- .page-header-inner -->
		</header><!-- .w3-container .page-header -->
		';
	} // wt_page_header_single
} // end if


if ( ! function_exists( 'wt_page_header_archive' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with archive titles
	 */
	function wt_page_header_archive() {
		echo '
		<header class="w3-container page-header">
			<div class="page-header-inner">
		';
		echo '<h1 class="page-title">' . get_the_archive_title() . '</h1>';
		theme_breadcrumb();
		echo '
			</div><!-- .page-header-inner -->
		</header><!-- .w3-container .page-header -->
		';
	} // wt_page_header_archive
} // end if


if ( ! function_exists( 'wt_page_header_single_or_archive' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with archive titles
	 */
	function wt_page_header_single_or_archive() {
		echo '
		<header class="w3-container page-header">
			<div class="page-header-inner">
		';
		if ( is_singular() ) {
			echo '<h1 class="page-title">' . get_the_title() . '</h1>';
		} else {
			echo '<h1 class="page-title">' . get_the_archive_title() . '</h1>';
		} // end if
		theme_breadcrumb();
		echo '
			</div><!-- .page-header-inner -->
		</header><!-- .w3-container .page-header -->
		';
	} // wt_page_header_single_or_archive
} // end if


if ( ! function_exists( 'wt_page_header_search' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with archive titles
	 */
	function wt_page_header_search() {
		echo '
		<header class="w3-container page-header">
			<div class="page-header-inner">
		';
		if ( have_posts() ) {
			echo '<h1 class="page-title">';
			printf( esc_html__( 'Search Results for: %s', 'wt_theme' ), '<span>' . get_search_query() . '</span>' );  	/* translators: %s: search query. */
			echo '</h1>';
		} else {
			echo '<h1 class="page-title">Search</h1>';
		} // end if
		theme_breadcrumb();
		echo '
			</div><!-- .page-header-inner -->
		</header><!-- .w3-container .page-header -->
		';
	} // wt_page_header_search
} // end if


if ( ! function_exists( 'wt_render_side_bar_columns' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with archive titles
	 */
	function wt_render_side_bar_columns() {
		if (is_active_sidebar( 'wt-site-sidebar' )) {
			echo '
			<div class="w3-row">
				<div class= "w3-col l9">
			';
		} // end if
	} // wt_render_side_bar_columns
} // end if


if ( ! function_exists( 'wt_render_side_bar' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with archive titles
	 */
	function wt_render_side_bar() {
		if (is_active_sidebar( 'wt-site-sidebar' )) {
			echo '
				</div> <!-- w3-col l9 -->
				<div class= "w3-col l3 wt-sidebar-surround">
			';
			get_sidebar();
			echo '
				</div>  <!-- w3-col l3 -->
			</div> <!-- w3-row -->
			';
		} // end if
	} // wt_render_side_bar
} // end if
