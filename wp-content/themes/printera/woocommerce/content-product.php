<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

$printera_options = get_option( 'printera_options' );

$view = !empty ($_GET['view']) ? sanitize_text_field( $_GET['view'] ) : '';
$ViewMode = !empty( $printera_options['product-view-mode'] ) ? sanitize_text_field( $printera_options['product-view-mode'] ) : '' ;

if ( $view == "short-view" || $ViewMode == 5 ){

	wc_get_template_part( 'content', 'short-view' );
	
}elseif ( $view == "list-view" || $ViewMode == 4 || $ViewMode == 2 ){
	
	wc_get_template_part( 'content', 'list-view' );

}else{ ?>

	<section <?php wc_product_class( '', $product ); ?>>
		<div class="product-content-wrap">
			<?php
			/**
			 * Hook: woocommerce_thumb_wrap_before.
			 *
			 * @hooked woocommerce_thumb_wrap_before_content - 10
			 */
			do_action( 'woocommerce_thumb_wrap_before' );

			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked sale_badge_percentage - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 15
			 * @hooked woocommerce_template_loop_stock - 20
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked sales_timer_countdown_product - 20
			 */
			do_action('woocommerce_before_shop_loop_item_timer');

			/**
			 * Hook: woocommerce_thumb_wrap_after.
			 *
			 * @hooked woocommerce_thumb_wrap_after_content - 10
			 */
			do_action( 'woocommerce_thumb_wrap_after' );

			/**
			 * Hook: woocommerce_before_content.
			 *
			 * @hooked printera_content_wrapper_before - 10
			 */
			do_action( 'woocommerce_before_content' );

			/**
			 * Hook: woocommerce_before_shop_loop_item_rating.
			 *
			 * @hooked woocommerce_template_loop_rating - 15
			 */
			do_action( 'woocommerce_before_shop_loop_item_rating' );

			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			if( class_exists( 'ReduxFramework' ) ) {
				$printera_options = get_option( 'printera_options' );
	
					if( $printera_options['products-desciption'] == 1 ){
						/**
						 * Hook: woocommerce_shop_loop_item_description.
						 *
						 * @hooked woocommerce_template_loop_product_desciption - 10
						 */
						do_action( 'woocommerce_trending_product_summary' );
					}
				}

			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * Hook: progress_bar.
			 *
			 * @hooked custom_stock_progressbar - 10
			 */
			do_action( 'woocommerce_stock_progressbar' );

			echo '<div class="product-buttons">';

				/**
				 * Hook: woocommerce_cart_button.
				 *
				 * @hooked product_cart_button - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );

				/**
				 * Hook: woocommerce_product_button.
				 *
				 * @hooked product_wishlist_quickview_compare - 10
				 */
				do_action( 'woocommerce_product_button' );

			echo '</div>';

			/**
			 * Hook: woocommerce_after_content.
			 *
			 * @hooked printera_content_wrapper_after - 10
			 */
			do_action( 'woocommerce_after_content' );
			?>
		</div>
	</section>

 <?php
}
