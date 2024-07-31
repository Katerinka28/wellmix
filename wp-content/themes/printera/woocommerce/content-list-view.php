<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-list-view.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>

<section <?php wc_product_class( '', $product ); ?>>
	<div class="product-content-wrap">

		<?php
			/**
			 * Hook: woocommerce_thumb_wrap_before.
			 *
			 * @hooked woocommerce_thumb_wrap_before_content - 10
			 */
			do_action( 'woocommerce_thumb_wrap_before_list' );

			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked sale_badge_percentage - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 15
			 * @hooked woocommerce_template_loop_stock - 20
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * Hook: woocommerce_thumb_wrap_after.
			 *
			 * @hooked woocommerce_thumb_wrap_after_content - 10
			 */
			do_action( 'woocommerce_thumb_wrap_after_list' );

			/**
			 * Hook: woocommerce_before_content.
			 *
			 * @hooked printera_content_wrapper_before - 10
			 */
			do_action( 'woocommerce_before_content_list' );

			echo '<div class="list-content">';

				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
			
				do_action( 'woocommerce_shop_loop_item_title' );

				/**
				 * Hook: woocommerce_before_shop_loop_item_rating.
				 *
				 * @hooked woocommerce_template_loop_rating - 15
				 */
				do_action( 'woocommerce_before_shop_loop_item_rating' );

				/**
				 * short description
				 */
				echo '<div class="list-description">';
					the_excerpt();
				echo '</div>';

				
				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked sales_timer_countdown_product - 20
				 */
				do_action('woocommerce_before_shop_loop_item_timer');
			

				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked printera_product_attributes - 10
				 */
				// do_action('woocommerce_shop_loop_item_attribute');

				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );

				do_action( 'woocommerce_stock_progressbar' );

				/**
				 * Estimated Delivery Date
				 */
				if( class_exists( 'ReduxFramework' ) ) {
					$printera_options = get_option( 'printera_options' );
					if( $printera_options['estimate-shiping'] == 1 ){
						echo '<div class="product-estimate">';
							do_action( 'woocommerce_product_estimated_delivery' );
						echo '</div>';
					}
				}
				
			echo '</div>';

			echo '<div class="list-cart-wrap">';


				echo '<div class="cart-button-list">';

					/**
					 * Hook: woocommerce_after_shop_loop_item.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' );

					/**
					 * Hook: woocommerce_product_button.
					 *
					 * @hooked product_wishlist_quickview_compare - 10
					 */
					do_action( 'woocommerce_product_button' );

				echo '</div>';

			echo '</div>';

	
			/**
			 * Hook: woocommerce_after_content.
			 *
			 * @hooked printera_content_wrapper_after - 10
			 */
			do_action( 'woocommerce_after_content_list' );
		?>
		</div>

	</div>
</section>