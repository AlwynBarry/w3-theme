<?php
/**
 * Comments list using w3.css, to use within w3_theme
 *
 * @package w3_theme
 */

if ( ! function_exists( 'wt_comments_list' ) ) {
	/**
	 * Prints the banner header on the top of the page for pages with given titles
	 */
	function wt_comments_list( $comment, $args, $depth ) { ?>

		<?php
		/* Note - we are ignoring the specified tag in $args.  w3.css uses DIVs */
		?>
		
		<div id="comment-<?php comment_ID() ?>" class="comment <?php get_comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>">

		<?php
		/* Switch between different comment types */
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			?>
				<div class="pingback-entry w3-container">
					<span class="pingback-heading">
						<?php esc_html_e( 'Pingback:', 'textdomain' ); ?>
					</span>
					<span class="comment-author">
						<?php comment_author_link(); ?>
					</span>
				</div>
				<?php
				break;
				?>
			<?php
			default :
			?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
					<?php if ( $args['avatar_size'] != 0 ) { ?>
					<div class="w3-row">
						<div class="w3-col l2 m3">
							<div class="comment-avatar-surround">
								<?php
								/* Set the default avatar size */
								if ( ! empty( $args['avatar_size'] ) ) {
									$avatar_size =  $args['avatar_size'];
								} else {
									$avatar_size = 96; 
								}
								echo get_avatar( $comment, $avatar_size );
								?>
							</div><!-- comment-avatar-surround -->
						</div><!-- w3-col -->

						<div class="w3-col l10 m9">
					<?php } ?>
							<div class="comment-details">
								<h4 class="comment-author vcard">
								<?php /* Display author name */
									printf( __( '<span class="comment-author-name">%s</span>', 'textdomain' ), get_comment_author_link() );
								?>
								</h4><!-- .comment-author -->

								<span class="comment-meta commentmetadata">
									<?php
									/* translators: 1: date, 2: time */
									printf(
										__( '<span class="comment-date">%1$s</span> , <span class="comment-time">%2$s</span>', 'textdomain' ),
										get_comment_date(),
										get_comment_time()
									);
									?>
								</span><!-- .comment-meta -->

								<span class="edit-comment">
									<?php
									edit_comment_link( __( '(Edit)', 'textdomain' ), '  ', '' );
									?>
								</span>

								<div class="comment-text">
									<?php comment_text(); ?>
								</div><!-- .comment-text -->
								<?php
								/* Display comment moderation text */
								if ( $comment->comment_approved == '0' ) { ?>
									<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'textdomain' ); ?></em><br/><?php
								} ?>
							</div><!-- comment-details -->

							<!-- Reply Button -->
							<div class="reply w3-right">
								<?php
								/* Display comment reply link */
								comment_reply_link( array_merge( $args, array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								) ) );
								?>
							</div><!-- reply -->

					<?php if ( $args['avatar_size'] != 0 ) { ?>
						</div><!-- w3-col -->
					</div><!-- w3-row -->
					<?php } ?>
					
				</div><!-- .comment-body -->
			<?php
			break;
		endswitch; // End comment_type check.
		// IMPORTANT - WE DO NOT CLOSE THE OPENING DIV - WORDPRESS DOES THIS FOR US

	} // w3_comments_list
} // end if
