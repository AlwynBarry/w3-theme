<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3_theme
 */

get_header();
get_template_part( 'template-parts/pageheader' );
get_template_part( 'template-parts/sidebarcolumns' );
?>


	<main id="primary" class="site-main w3-content w3-container">

		<?php if ( have_posts() ) {	?>

			<section class="posts w3-section">

				<?php
				/* Start the Loop */
				while ( have_posts() ) {
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				} // end while
				?>
				
			</section> <!-- posts -->

			<section class="posts-navigation w3-container w3-section">
				<?php the_posts_navigation(); ?>
			</section> <!-- posts-navigation -->
		
		<?php } else { ?>
		
			<section class="no-posts w3-section">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</section> <!-- no-posts -->

		<?php } // end if ?>

	</main><!-- #main -->


<?php
get_template_part( 'template-parts/sidebarcontent' );
get_footer();
