<?php
/**
 * Template part for displaying the page header for search result pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * @package w3_theme
 */
?>

<header class="w3-container page-header wt-no-print">
	<div class="page-header-inner">
		<h1 class="page-title">
		<?php
		if ( have_posts() ) {
			printf( esc_html__( 'Search Results for: %s', 'wt_theme' ), '<span>' . get_search_query() . '</span>' );  	/* translators: %s: search query. */
		} else {
			echo 'Search';
		} // end if
		?>		
		</h1>
		<?php theme_breadcrumb(); ?>
	</div><!-- .page-header-inner -->
</header><!-- .w3-container .page-header -->

