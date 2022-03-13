<?php
/**
 * Template part for displaying the page header for single page/post pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3_theme
 */

?>

<header class="w3-container page-header">
	<div class="page-header-inner">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php theme_breadcrumb(); ?>
	</div><!-- .page-header-inner -->
</header><!-- .w3-container .page-header -->

