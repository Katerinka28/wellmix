<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>

<h2 class="woocommerce-Reviews-title">
	<?php
	$count = $product->get_review_count();
	if ( $count && wc_review_ratings_enabled() ) {
		/* translators: 1: reviews count 2: product name */
		$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'printera' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
		echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
	} else {
		esc_html_e( 'Reviews', 'printera' );
	}
	?>
</h2>

<div class="product-review-wrap">

	<div class="product-review-tab">

		<?php
		
		$total_product = $product->get_rating_count() ? $product->get_rating_count() : '' ;
		
		if( ! empty( $total_product ) ){
			$rating_5 = $product->get_rating_count(5);
			$rating_4 = $product->get_rating_count(4);
			$rating_3 = $product->get_rating_count(3);
			$rating_2 = $product->get_rating_count(2);
			$rating_1 = $product->get_rating_count(1);


			$progress_5 = ( $rating_5*100/ $total_product );
			$progress_4 = ( $rating_4*100/ $total_product );
			$progress_3 = ( $rating_3*100/ $total_product );
			$progress_2 = ( $rating_2*100/ $total_product );
			$progress_1 = ( $rating_1*100/ $total_product );
		}else{
			$rating_5 = 0; $rating_4 = 0; $rating_3 = 0; $rating_2 = 0; $rating_1 = 0;

			$progress_5 = 0; $progress_4 = 0; $progress_3 = 0; $progress_2 = 0; $progress_1 = 0;
		}
		?>
		<div class="review-wrap">
			<div class="review_tab">
				<div class="avrage_rating">
					<?php
						$product = wc_get_product( $product->get_id() );
						$rating  = $product->get_average_rating();
						echo esc_html( $rating );
					?>
				</div>
				<?php woocommerce_template_single_rating(); ?>
			</div>
			<div class="rating-wrap">
				
				<div class="rating-bar">
					<div class="rating" title="<?php esc_attr_e( 'Rated 5 out of 5', 'printera' ); ?>">
						<div class="rate-wrap"><i class="fa-solid fa-star"></i><?php esc_html_e( '5','printera' ); ?></div>
					</div>
					<div class="rating-percentage-bar">
						<span data-percent="<?php echo esc_html( $progress_5 ); ?>"></span>
					</div>
					<div class="rating-count"><?php echo esc_html( $rating_5 ); ?></div>
				</div>
				<div class="rating-bar">
					<div class="rating" title="<?php esc_attr_e( 'Rated 4 out of 4', 'printera' ); ?>">
						<div class="rate-wrap"><i class="fa-solid fa-star"></i><?php esc_html_e( '4','printera' ); ?></div>
					</div>
					<div class="rating-percentage-bar">
						<span data-percent="<?php echo esc_html( $progress_4 ); ?>"></span>
					</div>
					<div class="rating-count"><?php echo esc_html( $rating_4 ); ?></div>
				</div>
				<div class="rating-bar">
					<div class="rating" title="<?php esc_attr_e( 'Rated 3 out of 3', 'printera' ); ?>">
						<div class="rate-wrap"><i class="fa-solid fa-star"></i><?php esc_html_e( '3','printera' ); ?></div>
					</div>
					<div class="rating-percentage-bar">
						<span data-percent="<?php echo esc_html( $progress_3 ); ?>"></span>
					</div>
					<div class="rating-count"><?php echo esc_html( $rating_3 ); ?></div>
				</div>
				<div class="rating-bar">
					<div class="rating" title="<?php esc_attr_e( 'Rated 2 out of 2', 'printera' ); ?>">
						<div class="rate-wrap"><i class="fa-solid fa-star"></i><?php esc_html_e( '2','printera' ); ?></div>
					</div>
					<div class="rating-percentage-bar">
						<span data-percent="<?php echo esc_html( $progress_2 ); ?>"></span>
					</div>
					<div class="rating-count"><?php echo esc_html( $rating_2 ); ?></div>
				</div>
				<div class="rating-bar">
					<div class="rating" title="<?php esc_attr_e( 'Rated 1 out of 1', 'printera' ); ?>">
						<div class="rate-wrap"><i class="fa-solid fa-star"></i><?php esc_html_e( '1','printera' ); ?></div>
					</div>
					<div class="rating-percentage-bar">
						<span data-percent="<?php echo esc_html( $progress_1 ); ?>"></span>
					</div>
					<div class="rating-count"><?php echo esc_html( $rating_1 ); ?></div>
				</div>
			</div>
		</div>

	</div>

	<div id="reviews" class="woocommerce-Reviews">

		<div id="comments">
				<?php
			if ( have_comments() ) : ?>
				<ol class="commentlist">
					<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
				</ol>

				<?php
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
					echo '<nav class="woocommerce-pagination">';
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							array(
								'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
								'next_text' => is_rtl() ? '&larr;' : '&rarr;',
								'type'      => 'list',
							)
						)
					);
					echo '</nav>';
				endif;
				?>
			<?php else : ?>
				<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'printera' ); ?></p>
			<?php endif; ?>
		</div>


		<?php
		if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
			<div id="review_form_wrapper">
				<div id="review_form">
					<?php
					$commenter    = wp_get_current_commenter();
					$comment_form = array(
						/* translators: %s is product title */
						'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'printera' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'printera' ), get_the_title() ),
						/* translators: %s is product title */
						'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'printera' ),
						'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'   => '</span>',
						'comment_notes_after' => '',
						'label_submit'        => esc_html__( 'Submit', 'printera' ),
						'logged_in_as'        => '',
						'comment_field'       => '',
					);

					$name_email_required = (bool) get_option( 'require_name_email', 1 );
					$fields              = array(
						'author' => array(
							'label'    => esc_html__( 'Name *', 'printera' ),
							'type'     => 'text',
							'value'    => $commenter['comment_author'],
							'required' => $name_email_required,
						),
						'email'  => array(
							'label'    => esc_html__( 'Email *', 'printera' ),
							'type'     => 'email',
							'value'    => $commenter['comment_author_email'],
							'required' => $name_email_required,
						),
					);

					$comment_form['fields'] = array();

					foreach ( $fields as $key => $field ) {
						$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
						$field_html .= '</label><input placeholder="'.$field['label'].'" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . '></p>';

						$comment_form['fields'][ $key ] = $field_html;
					}

					$account_page_url = wc_get_page_permalink( 'myaccount' );
					if ( $account_page_url ) {
						/* translators: %s opening and closing link tags respectively */
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'printera' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
					}

					if ( wc_review_ratings_enabled() ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><select name="rating" id="rating" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'printera' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'printera' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'printera' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'printera' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'printera' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'printera' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea placeholder="Your review *" id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
					?>
				</div>
			</div>
		<?php else : ?>
			<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'printera' ); ?></p>
		<?php endif; ?>

		<div class="clear"></div>
	</div>

</div>
