<?php
/**
 * Template part for displaying the page header for search result pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3_theme
 */

?>

<header class="w3-container page-header">
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

