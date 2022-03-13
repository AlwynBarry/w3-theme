<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cambray_w3
 */

get_header();
get_template_part( 'template-parts/pageheader' );
?>

	<main id="primary" class="site-main w3-content w3-container">
		
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
get_footer();
