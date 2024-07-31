<?php
/**
 * printera Comments
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * printera Comment Function
 */
function printera_comments( $comment, $args, $depth ) {

	// Get correct tag used for the comments.
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">

	<?php
	// Switch between different comment types.
	switch ( $comment->comment_type ) :
		case 'pingback':
		case 'trackback':
			?>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'printera' ); ?></span> <?php comment_author_link(); ?></div>
			<?php
			break;
		default:
			if ( 'div' != $args['style'] ) {
				?>
				<div id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex">
					<?php } ?>
					<div class="comment-avtar flex-shrink-0">
						<?php
						if ( 0 != 70 ) {
							echo get_avatar( $comment, 70 );}
						?>
					</div>
					<div class="comment-wrap d-inline-block overflow-hidden flex-grow-1">
						<div class="comment-author vcard">
							<div class="comment-meta-wrap">
								<?php
								// Display author name.
								printf( __( '<cite class="fn">%s</cite>', 'printera' ), get_comment_author_link() );
								?>
							</div>
						</div><!-- .comment-author -->
						<div class="comment-details">
							<?php comment_text(); ?>
							<?php
							// Display comment moderation text.
							if ( $comment->comment_approved == '0' ) {
								?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'printera' ); ?></em><br/>
																				<?php
							}
							?>
						</div><!-- .comment-details -->
						<div class="comment-meta commentmetadata float-start w-100 d-flex align-items-center">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="float-start">
											<?php
											/* translators: 1: date, 2: time */
											printf(
												__( '%1$s at %2$s', 'printera' ),
												get_comment_date(),
												get_comment_time()
											);
											?>
							</a>
							<?php
							edit_comment_link( __( '(Edit)', 'printera' ), '  ', '' );
							?>
							<div class="reply d-flex flex-grow-1 justify-content-end">
								<?php
								// Display comment reply link
								comment_reply_link(
									array_merge(
										$args,
										array(
											'add_below' => $add_below,
											'depth'     => $depth,
											'max_depth' => $args['max_depth'],
										)
									)
								);
								?>
							</div>
						</div><!-- .comment-meta -->
					</div>
				<?php
				if ( 'div' != $args['style'] ) {
					?>
				</div>
				<?php }
				// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us.
			break;
	endswitch; // End comment_type check.
}

/**
 * Move comments fields in last
 *
 * @param string $fields .
 */
function printera_move_comment_form_below( $fields ) {

	// Save fields to use later.
	$comment_field = isset( $fields['comment'] ) ? $fields['comment'] : '';
	$cookies_field = isset( $fields['cookies'] ) ? $fields['cookies'] : '';

	// Remove from current position.
	unset( $fields['comment'] );
	unset( $fields['cookies'] );

	// Re-assign saved fields to fields array.
	$fields['comment'] = $comment_field;
	$fields['cookies'] = $cookies_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'printera_move_comment_form_below' );
