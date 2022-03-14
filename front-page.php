<?php
/**
 * The template for displaying the Front Page
 *
 * This is the template that displays the front page by default.
 * Please note that this is the WordPress construct of front pages
 * and that to use it you need to set a static front page in Customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

get_header();
?>

	<main id="primary" class="site-main w3-content">
		
		<section class="page-posts">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// No comments on front page

			endwhile; // End of the loop.
			?>

		</section>
	
	</main><!-- #main -->

<?php
get_footer();
