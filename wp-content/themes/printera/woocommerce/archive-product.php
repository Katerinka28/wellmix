<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$printera_options = get_option( 'printera_options' );
	$shop_layout = isset( $_GET['shop_layout'] ) ? sanitize_text_field( $_GET['shop_layout'] ) : '';
	if ( is_active_sidebar( 'shop' ) ) {
		if( $shop_layout == "right" ){
			wc_get_template_part( 'content', 'product-right' );
		}elseif( $shop_layout == "left" ){
			wc_get_template_part( 'content', 'product-left' );
		}elseif( $shop_layout == "full" ){
			wc_get_template_part( 'content', 'product-full' );
		}elseif( $shop_layout == "offside-left" ){
			wc_get_template_part( 'content', 'product-offsidebar-left' );
		}elseif( $shop_layout == "offside-right" ){
			wc_get_template_part( 'content', 'product-offsidebar-right' );
		}elseif( $printera_options['shop-layout'] == "right" ){
			wc_get_template_part( 'content', 'product-right' );
		}elseif( $printera_options['shop-layout'] == "left" ){
			wc_get_template_part( 'content', 'product-left' );
		}elseif( $printera_options['shop-layout'] == "full" ){
			wc_get_template_part( 'content', 'product-full' );
		}elseif( $printera_options['shop-layout'] == "offside-left" ){
			wc_get_template_part( 'content', 'product-offsidebar-left' );
		}elseif( $printera_options['shop-layout'] == "offside-right" ){
			wc_get_template_part( 'content', 'product-offsidebar-right' );
		}
	}else{
		wc_get_template_part( 'content', 'product-full' );
	}
}else{
	if ( is_active_sidebar( 'shop' ) ) {
		wc_get_template_part( 'content', 'product-right' );
	}else{
		wc_get_template_part( 'content', 'product-full' );
	}
}


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
