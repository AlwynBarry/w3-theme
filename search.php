<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wt-theme
 */

get_header();
get_template_part( 'template-parts/pageheader', 'search' );
get_template_part( 'template-parts/sidebarcolumns' );
?>


	<main id="primary" class="site-main w3-content w3-container">

		<?php if ( have_posts() ) { ?>

			<section class="posts w3-section">

				<?php
				while ( have_posts() ) {
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				} // end while ?>
		
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
