<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
$sticky_content = '';
if( class_exists( 'ReduxFramework' ) ) {
	$printera_options = get_option( 'printera_options' );
	$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

	if( $thumbnail_slider == 1 ){
		$sticky_content = "";
		$sticky_product_content = "";
	}elseif( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
		$sticky_content = "single-product-image";
		$sticky_product_content = "single-product-content";
	}elseif( $printera_options['product-thumbnail-slider'] == "thumbnail-slider-style1" ){
		$sticky_content = "";
		$sticky_product_content = "";
	}else{
		$sticky_content = "single-product-image";
		$sticky_product_content = "single-product-content";
	}
	$sticky_content = "col-lg-6";
	$sticky_product_content = "col-lg-6";
	
}else{
	$sticky_content = "col-lg-5 single-product-default";
	$sticky_product_content = 'col-lg-7 single-content-default';
}
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<div class="container">
	<div class="single-product-thumb-content">
		<?php
			do_action( 'woocommerce_single_product_prev_next' );
		?>
		<div class="col-12 <?php echo esc_attr( $sticky_content ); ?> single-product-thumb">
			<div class="single-product-thumbnail">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				// do_action('woocommerce_single_shop_item');
				do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
		</div>
		
		<div class="col-12 <?php echo esc_attr( $sticky_product_content ); ?> single-product-detail">
			<section class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked bbloomer_prev_next_product - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
			     * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				
				do_action( 'woocommerce_single_product_summary' );

				/**
				 * Hook: woocommerce_product_button.
				 *
				 * @hooked product_wishlist_quickview_compare - 10
				 */
				do_action( 'woocommerce_product_button' );

				/**
				 * Meta
				 */
				do_action( 'woocommerce_single_product_meta_summary' );
					
				/**
				 * Estimated Delivery Date
				 */
				if( class_exists( 'ReduxFramework' ) ) {
					$printera_options = get_option( 'printera_options' );
					if( $printera_options['single-estimate-shiping'] == 1 ){
						echo '<div class="product-estimate">';
							do_action( 'woocommerce_product_estimated_delivery' );
						echo '</div>';
					}
				}
				
				if( class_exists( 'ReduxFramework' ) ) {
					if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
						do_action( 'custom_single_products_summary' );
					}elseif( $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' ){
						do_action( 'custom_single_products_summary' );
					}
				}
				?>
				
			</section>
		</div>

		<?php if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) { ?>
			<div class="sticky-addToCart">
				<div class="sticky-close"></div>
				<div class="container">
					<div class="stickycart-popup">
						<?php
							do_action( 'add_to_cart_information' );
						?>

						<div class="stickycart-wrap">
							<?php 
								if ( 'grouped' == $product->get_type() ) {
									do_action( 'woocommerce_grouped_add_to_cart' );
								}elseif ( 'variable' == $product->get_type() ) {
									do_action( 'woocommerce_variable_add_to_cart' );
								}elseif ( 'external' == $product->get_type() ) {
									do_action( 'woocommerce_external_add_to_cart' );
								}elseif ( 'simple' == $product->get_type() ) {
									do_action( 'woocommerce_simple_add_to_cart' );
								}
							?>
						</div>
					</div>
				</div>
			</div> 
		<?php } ?>
		<?php
			/**
			* Social Share
			*/
			do_action( 'printera_social_share' );
		?>
	</div>	
</div>

<?php 
	if( class_exists( 'ReduxFramework' ) ) {
		if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ||  $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' ){ 
		?>
			<div class="product-border"></div>
		<?php
		}
	}
?>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		if( class_exists( 'ReduxFramework' ) ) {
			if( $thumbnail_slider == 1 ){
				do_action( 'custom_single_products_summary' );
			}elseif( $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style1' && $thumbnail_slider != 2 && $thumbnail_slider != 3 ){
				do_action( 'custom_single_products_summary' );
			}

			if( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
				do_action( 'woocommerce_after_single_product_summary_style2' );
			}elseif( $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' && $thumbnail_slider != 1 ){
				do_action( 'woocommerce_after_single_product_summary_style2' );
			}
		}else{
			do_action( 'custom_single_products_summary' );
		}
	?>
</div>
<div class="container">
	<div class="recent-product <?php single_list_class(); ?>">
		<?php do_action( 'woocommerce_after_single_product' ); ?>
	</div>
</div>
