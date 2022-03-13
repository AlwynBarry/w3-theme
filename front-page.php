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
