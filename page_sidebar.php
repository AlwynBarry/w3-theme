<?php
/**
 * Template Name: Sidebar Page
 * Template Post Type: page
 *
 * The template for displaying pages which have a side bar too
 *
 * This is the template that displays full width pages.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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
get_template_part( 'template-parts/pageheader' );
get_template_part( 'template-parts/sidebarcolumns' );
?>

	<main id="primary" class="site-main w3-padding w3-container">
		
		<?php if ( have_posts() ) { ?>

			<section class="page-posts">

				<?php
				while ( have_posts() ) {
				
					the_post();
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				} // end while
				?>

			</section> <!-- page-posts -->
			
			<?php if ( ! is_singular() ) { ?>
			<section class="archive-navigation w3-container w3-section">
				<?php the_posts_navigation(); ?>
			</section><!-- archive-navigation -->
			<?php } // end if ?>

		
		<?php } else { ?>
		
			<section class="no-page-posts">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</section> <!-- no-page-posts -->

		<?php } // end if ?>

	
	</main><!-- #primary -->

<?php
get_template_part( 'template-parts/sidebarcontent' );
get_footer();
