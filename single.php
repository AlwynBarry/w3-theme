<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package w3_theme
 */

get_header();
get_template_part( 'template-parts/pageheader', 'single' );
get_template_part( 'template-parts/sidebarcolumns' );
?>


	<main id="primary" class="site-main w3-content w3-container">
		
		<?php if ( have_posts() ) { ?>

			<section class="single-post">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );

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
get_template_part( 'template-parts/sidebarcontent' );
get_footer();
