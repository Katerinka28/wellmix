<?php
echo '<div class="col-sm-12 offsidebar-right shop-nosidebar">';
	if ( woocommerce_product_loop() ) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */

		if( class_exists( 'ReduxFramework' ) ) {
			$printera_options = get_option( 'printera_options' );
			if( $printera_options['shop-page-display'] == "categories" || $printera_options['shop-page-display'] == "both" ){
				do_action( 'woocommerce_shop_loop_categories' );
			}
			if( $printera_options['category-page-display'] == "subcategories" || $printera_options['category-page-display'] == "both" ){
				do_action( 'woocommerce_shop_loop_subcategories' );
			}
		}
		
		echo '<div class="product-top-sorting">';
			do_action( 'woocommerce_before_shop_loop' );
		echo '</div>';

		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );

				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					if( is_shop() ){
						if( $printera_options['shop-page-display'] == "products" || $printera_options['shop-page-display'] == "both" ){
							$printera_options = get_option( 'printera_options' );
							$product_layout = isset( $_GET['product_layout'] ) ? sanitize_text_field( $_GET['product_layout'] ) : '';

							if( $product_layout == "default" ){
								wc_get_template_part( 'content', 'product' );
							}elseif( $printera_options['product-layout'] == "product-layout-default" ){
								wc_get_template_part( 'content', 'product' );
							}
						}
					}
					if( ! is_shop() ){
						if( $printera_options['category-page-display'] == "products" || $printera_options['category-page-display'] == "both" ){

							$printera_options = get_option( 'printera_options' );
							$product_layout = isset( $_GET['product_layout'] ) ? sanitize_text_field( $_GET['product_layout'] ) : '';

							if( $product_layout == "default" ){
								wc_get_template_part( 'content', 'product' );
							}elseif( $printera_options['product-layout'] == "product-layout-default" ){
								wc_get_template_part( 'content', 'product' );
							}
						}
					}
				}else{
					wc_get_template_part( 'content', 'product' );
				}
			}
		}

		woocommerce_product_loop_end();

		if( class_exists( 'ReduxFramework' ) ) {
			$printera_options = get_option( 'printera_options' );
			if( $printera_options['shop-page-display'] == "products" || $printera_options['shop-page-display'] == "both" ){
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			}
		}else{
			do_action( 'woocommerce_after_shop_loop' );
		}
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	}

	echo '<div class="offside offside-right" id="offsidebar">';
			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' ); // Update shop page default widget to custom

	echo '</div>';

echo '</div>';
