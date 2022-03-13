<?php
/**
 * Template part for displaying archives using the post excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3_theme
 */

?>

<article id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', get_post_class() ) ); ?> archive-entry w3-section w3-card">

	<?php wt_post_thumbnail(); ?>


	<div class="wt-archive-entry-inner w3-container">

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->
		
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				wt_posted_on();
				wt_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="entry-content">
			<?php
			the_excerpt(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wt' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wt' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php wt_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<div class="entry-read-more">
			<?php echo '<a href="' . get_permalink( $post->ID ) . '" class="w3-button more-link" title="Read More">Read More</a>'; ?>
		</div>

	</div><!-- archive-entry-inner -->

</article><!-- #post-<?php the_ID(); ?> -->
