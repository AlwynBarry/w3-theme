<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.0
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


	<?php if ( is_active_sidebar( 'wt-site-footer' ) || is_active_sidebar( 'wt-site-bottom-bar' ) ) { ?>
	<footer id="wt-colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'wt-site-footer' ) ) { ?>
		<div class="wt-top-footer w3-container">
			<div class="w3-cell-row">
				<?php dynamic_sidebar( 'wt-site-footer' ); ?>
			</div><!-- .w3-cell-row -->
		</div><!-- .top-footer -->
		<?php } // end if ?>
		<?php if ( is_active_sidebar( 'wt-site-bottom-bar' ) ) { ?>
		<div class="wt-bottom-footer site-bottom-bar w3-container">
			<div class="w3-cell-row">
				<?php dynamic_sidebar( 'wt-site-bottom-bar' ); ?>
			</div><!-- .w3-cell-row -->
		</div><!-- .wt-site-bottom-bar -->
		<?php } // end if ?>
	</footer><!-- #wt-colophon -->
	<?php } // end if ?>


</div><!-- #page -->

<!-- End of page -->


<?php wp_footer(); ?>


<!-- End of included scripts -->

</body>
</html>
