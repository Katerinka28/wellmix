<?php
/**
 * Post Meta for CPT
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 2.0
 */

/**
 * Testimonial more details postmeta
 *
 * @param array $meta_boxes .
 */

function printera_postmeta( $meta_boxes ) {

	$meta_boxes[] = array(
		'title'      => esc_attr__( 'More Details', 'printera' ),
		'post_types' => 'tt-testimonial',
		'fields'     => array(
			array(
				'id'   => 'testi_author',
				'name' => esc_attr__( 'Author :', 'printera' ),
				'type' => 'text',
			),
			array(
				'type' => 'divider',
			),
			array(
				'id'   => 'testi_designation',
				'name' => esc_attr__( 'Designation :', 'printera' ),
				'type' => 'text',
			),
		),
	);

	$meta_boxes[] = array(
		'title'      => esc_attr__( 'More Details', 'printera' ),
		'post_types' => 'product',
		'fields'     => array(
			array(
				'id'   => 'estimated_delivery',
				'name' => esc_attr__( 'Estimated Delivery :', 'printera' ),
				'type' => 'text',
			),
			array(
				'id'   => 'free_shipping',
				'name' => esc_attr__( 'Free Shipping :', 'printera' ),
				'type' => 'text',
			),
		),
	);
	


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'printera_postmeta' );

add_action( 'add_meta_boxes', 'tt_360View_metabox' );
if ( ! function_exists( 'tt_360View_metabox' ) ) {
	function tt_360View_metabox() {
		global $printera_options;

		add_meta_box( 'tt-360-metabox', __( '360 View', 'printera' ), 'product360_meta_callback', 'product', 'normal', 'high' );
	}
}

if ( ! function_exists( 'product360_meta_callback' ) ) {
	function product360_meta_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'smart_product_meta_nonce' );
		$printera_smart_product = get_post_meta( $post->ID, 'tt-360-metabox', true );
		?>
		<table class="form-table">
			<tr>
				<td>
					<div id="smart-product-metabox">
						<a class="smart-product-add button" href="#" data-uploader-title="<?php echo esc_attr__( 'Add images', 'pgs-core' ); ?>" data-uploader-button-text="<?php echo esc_attr__( 'Add images', 'pgs-core' ); ?>">
							<?php echo esc_html__( 'Add images', 'pgs-core' ); ?>
						</a>
						<ul id="smart-product-metabox-list">
							<?php
							if ( $printera_smart_product ) :
								foreach ( $printera_smart_product as $key => $tt_360_metabox ) :
									$image = wp_get_attachment_image_src( $tt_360_metabox );
									?>
									<li>
										<div class="content-wrap">
											<input type="hidden" name="tt-360-metabox[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $tt_360_metabox ); ?>">
											<img class="image-preview" src="<?php echo esc_url( $image[0] ); ?>">
											<small>
												<a class="remove-image button" href="#">
													<i title="<?php echo esc_attr__( 'Remove Image', 'pgs-core' ); ?>" class="fa fa-times-circle" aria-hidden="true"></i>
												</a>
											</small>
											<a class="change-image button button-small" href="#" data-uploader-title="<?php echo esc_attr__( 'Change image', 'pgs-core' ); ?>" data-uploader-button-text="<?php echo esc_attr__( 'Change image', 'pgs-core' ); ?>">
												<i title="<?php echo esc_attr__( 'Change image', 'pgs-core' ); ?>" class="fa fa-exchange" aria-hidden="true"></i>
											</a>
											</br>
										</div>
									</li>
									<?php
								endforeach;
							endif;
							?>
						</ul>
					</div>
				</td>
			</tr>
		</table>
		<?php
	}
}



add_action( 'save_post', 'smart_product_meta_save' );
if ( ! function_exists( 'smart_product_meta_save' ) ) {
	function smart_product_meta_save( $post_id ) {
		if ( ! isset( $_POST['smart_product_meta_nonce'] ) || ! wp_verify_nonce( $_POST['smart_product_meta_nonce'], basename( __FILE__ ) ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		update_post_meta( $post_id, 'tt-360-metabox', $_POST['tt-360-metabox'] );
	}
}
