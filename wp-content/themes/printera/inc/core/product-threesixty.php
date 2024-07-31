<?php
/**
 * WooCommerce Product Threesixty
 *
 * @link https://woocommerce.com/
 *
 * @package printera
 */

add_action('woocommerce_single_product_product_360_view', 'printera_product_360_view', 10);
if ( ! function_exists( 'printera_product_360_view') ) {
	/**
	 * Product 360 view
	 */
	function printera_product_360_view() {
		global $post;
		$images = get_post_meta( $post->ID, 'tt-360-metabox', true);
		if ( empty( $images ) ){ return; }

		$id = rand(100, 999);
		$title = '';
		$frames_count = count($images);
		$images_js_string = '';
		?>
		<div class="product-360-button-wrap">
			<div class="product-360-button">
				<a class="product-popup" href="<?php esc_attr_e( '#product-360-view', 'printera' ); ?>" title="<?php esc_attr_e( 'Product 360 view', 'printera' ); ?>"><i class="fa-solid fa-rotate"></i></a>
			</div>
			<div id="product-360-view" class="product-360-view-wrapper mfp-hide">
				<div class="tt-360-veiw threed-id-<?php echo esc_attr( $id ); ?>">
					<?php if ( !empty( $title ) ): ?>
						<h3 class="threed-title"><span><?php echo esc_html( $title ); ?></span></h3>
					<?php endif ?>
					<ul class="threed-view-images">
						<?php
						if ( count( $images ) > 0 ):
							$i = 0;
							foreach ( $images as $img_id ) : $i++;
								$img = wp_get_attachment_image_src($img_id, 'full');
								$width = $img[1];
								$height = $img[2];
								$images_js_string .= "'" . $img[0] . "'";
								if ($i < $frames_count) {
									$images_js_string .= ",";
								}
							endforeach;
						endif; ?>
					</ul>
					<div class="spinner">
						<span><?php esc_html_e( '0%', 'printera' ); ?></span>
					</div>
				</div>
				<script>
					jQuery(document).ready(function() {
						jQuery('.threed-id-<?php echo esc_attr($id); ?>').ThreeSixty({
							totalFrames: <?php echo esc_attr($frames_count); ?>,
							endFrame: <?php echo esc_attr($frames_count); ?>,
							currentFrame: 1,
							imgList: '.threed-view-images',
							progress: '.spinner',
							imgArray: [<?php echo htmlentities($images_js_string); ?>],
							
							height: <?php echo esc_attr( $height ); ?>,
                            width: <?php echo esc_attr( $width ); ?>,
							responsive: true,
							navigation: true
						});
					});
				</script>
			</div>
		</div>
		<?php
	}
}
