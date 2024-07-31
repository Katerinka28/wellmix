<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package printera
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area float-start w-100">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
			<?php
			$printera_comment_count = get_comments_number();
			if ( '1' === $printera_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'printera' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $printera_comment_count, 'comments title', 'printera' ) ),
					number_format_i18n( $printera_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'callback' => 'printera_comments',
					'style'    => 'ol',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'printera' ); ?></p>
			<?php
		endif;
		
	endif; // Check for have_comments().
	if ( comments_open() ) :
		?>
		<section class="respond-form">
			<?php
			$req      = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			$commenter = wp_get_current_commenter();
			$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

			$com_args = array(
				'class_form'          => 'comment-form contact-form',
				'title_reply_before'  => '<h3 id="reply-title" class="comment-reply-title text-blue mb-2">',
				'comment_notes_after' => '', // remove "Text or HTML to be displayed after the set of comment fields".
				'class_submit'        => 'submit button pull-left',
				/**
				 * Filters the default comment form fields.
				 *
				 * @since 3.0.0
				 *
				 * @param array $fields The default comment fields.
				 * @visible false
				 * @ignore
				 */
				'fields'              => apply_filters(
					'comment_form_default_fields',
					array(
						'author'  => '<div class="section-field comment-form-author col-md-6 col-sm-12 pe-md-3 pb-3 float-start">' .
							'<input id="author" class="placeholder" placeholder="' . esc_attr__( 'Name', 'printera' ) . '*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '>' .
							'</div>',
						'email'   => '<div class="section-field comment-form-email col-md-6 col-sm-12 ps-md-3 float-end">' .
							'<input id="email" class="placeholder" placeholder="' . esc_attr__( 'Email', 'printera' ) . '*" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '>' .
							'</div>',
						'cookies' => '<p class="comment-form-cookies-consent d-flex align-items-center"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . '>' .
							'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name and email in this browser for the next time I comment.', 'printera' ) . '</label></p>',
					)
				),
				'comment_field'       => '<div class="section-field textarea comment-form-comment py-3">' .
					'<textarea id="comment" class="input-message placeholder" name="comment" placeholder="' . esc_attr__( 'Comment', 'printera' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .
					'</div>',
			);
			comment_form( $com_args );
			// If registration required and not logged in.
			?>
		</section>
		<?php
	endif; ?>

</div><!-- #comments -->
