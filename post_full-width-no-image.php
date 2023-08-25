<?php
/**
 * Template Name: Post Full Width, no image, no meta data
 * Template Post Type: post
 *
 * The template for displaying single posts but with no sidebar and no featured image or meta data
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
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

get_header();
get_template_part( 'template-parts/pageheader', 'single' );
?>


	<main id="primary" class="site-main w3-content w3-container">
		
		<?php if ( have_posts() ) { ?>

			<section class="single-post">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'page' );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'wt' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'wt' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} // end if

				} // end while
				?>
				
			</section> <!-- single-post -->

		<?php } else { ?>
		
			<section class="no-posts w3-section">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</section> <!-- no-posts -->

		<?php } // end if ?>
		
	</main><!-- #main -->


<?php
get_footer();
