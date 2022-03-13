<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package w3_theme
 */

if ( ! is_active_sidebar( 'wt-site-sidebar' ) ) {
	return;
} // end if
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'wt-site-sidebar' ); ?>
</aside><!-- #secondary -->
