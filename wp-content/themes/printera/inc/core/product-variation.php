<?php
/**
 * WooCommerce Product Variation
 *
 * @link https://woocommerce.com/
 *
 * @package printera
 */

/**
 * Get Variation option
 */
add_action( 'woocommerce_shop_loop_item_attribute', 'printera_product_attributes', 10 );
function printera_product_attributes(){

    global $product, $wpml, $woocommerce;
	
	$id = $product->get_id();
	$size = array();
	$img = array();
	$color = array();
	$product_Variable = '';

	if( $product->is_type( 'variable' ) ){
		$product_Variable = new WC_Product_Variable( $id );
	}

	if ( ! $product_Variable ) {
        return;
    }

	$variations = $product_Variable->get_available_variations();

	if( ! empty($variations) ){
		foreach ( $variations as $variation ) {
			if( ! empty( $variation['attributes']['attribute_pa_size'] ) ){
				$size[] = $variation['attributes']['attribute_pa_size'];
			}
			if( ! empty( $variation['attributes']['attribute_pa_color'] ) ){
				$colors[] = $variation['attributes']['attribute_pa_color'];
			}
		}		
		echo '<div class="product-attribute-wrap">';
					global $product;
					$default_color = '';
					$default_size = '';

					$default_select = get_post_meta( $product->get_id(), '_default_attributes');
					if( sizeof( $default_select ) != 0 ){ 
						$default_color = $default_select[0]['pa_color'];
						$default_size = $default_select[0]['pa_size'];
					}

					$terms_color = get_the_terms( $product->get_id() , 'pa_color' );
					$terms_size = get_the_terms( $product->get_id() , 'pa_size' );
					
					if( ! empty( $colors ) ){
						$colors_unique = array_unique( $colors );
						echo '<div class="list_color_attr">';
							echo '<div class="attr-title color-attr-title">Color :</div>';
							foreach($colors_unique as $color){
								// $id = array_search($color, $key_value); 
								$color_name = $color;
								$color_name = strtolower($color_name);
								if( $default_color == $color_name ){ $select_variation_color = 'select_variation'; }else{ $select_variation_color = ''; }

								if( !empty( $terms_color ) ) {
									foreach( $terms_color as $term ) {
										$term_color = strtolower( $term->name );
										if( $term_color == $color_name ){
											$get_color = get_term_meta( $term->term_id, 'pa_color_swatches_id_color', true );
											if( !empty( $get_color ) ){ $color = $get_color; }else{ $color = $term_color; }
											echo '<div class="list_product_color '.$term_color.' '. $select_variation_color .'" data-value='.$id.' data-id='.$term_color.' style="background: '. $color .'" title="'.$term_color.'"></div>';
										}
									}
								}
							}
						echo '</div>';
					}
					if( ! empty( $size ) ){
						$size_unique = array_unique( $size );
						echo '<div class="list_size_attr">';
							echo '<div class="attr-title size-attr-title">Size :</div>';
							foreach( $size_unique as $size_d ){
								$size_d = strtolower( $size_d );
								if( !empty( $terms_size ) ) {
									foreach( $terms_size as $term ) {
										$term_size = $term->slug;

										if( $default_size == $term_size ){ $select_variation_size = 'select_variation'; }else{ $select_variation_size = ''; }


										if( $term_size == $size_d ){
											echo '<div class="list_product_size '.$term->slug.' '. $select_variation_size .'" data-value='.$id.' data-id='.$term->slug.' title="'.$term->slug.'">'. $term->name .'</div>';

										}
									}
								}
							}
						echo '</div>';
					}

					if( is_product() ){
						echo '<a class="reset_custom_variations" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>' . esc_html__( 'Clear', 'printera' ) . '</a>';
					}
		
		echo '</div>';
	}

}

/**
 * Set variation option by custom ajax
 */
function printera_get_ajax_image(){

	global $product, $wpml;
	$id = sanitize_text_field( $_POST['id'] );
	$dataid = sanitize_text_field( $_POST['dataid'] );
	$select_variation = sanitize_text_field( $_POST['select_variation'] );
	$already_selected = sanitize_text_field( $_POST['already_selected'] );
	$already_selected2 = sanitize_text_field( $_POST['already_selected2'] );
	
	
	$product = new WC_Product_Variable( $id );
	$variations = $product->get_available_variations();

	$data = array();
	$size = array();
	$img = array();
	$color = array();
	$price = array();

	foreach ( $variations as $variation ) {
		$k = 'd';
		if( $variation['attributes']['attribute_pa_color'] == $dataid ){

			$k = 'color';

			$size[] = $variation['attributes']['attribute_pa_size'];
			$img[] = $variation['image']['full_src'];

			if( $variation['attributes']['attribute_pa_size'] == $already_selected ){

				$price[] = get_woocommerce_currency_symbol(). number_format( ( float ) $variation['display_price'], 2, '.', '' );
				$add_to_cart = '<a href="?add-to-cart='. $id .'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart product-button" data-product_id="'. $variation['variation_id'] .'"  rel="nofollow">'. esc_html( 'Add to cart', 'printera' ) .'</a>';

				$variation_id = $variation['variation_id'];
			}else{
				$price[] = $product->get_price_html();
			}
			$select_variation = 'color';
		}
		if( $variation['attributes']['attribute_pa_size'] == $dataid ){



			$color[] = $variation['attributes']['attribute_pa_color'];

			if( $variation['attributes']['attribute_pa_color'] == $already_selected ){

				$price[] = get_woocommerce_currency_symbol(). number_format( ( float ) $variation['display_price'], 2, '.', '' );
				$add_to_cart = '<a href="?add-to-cart='. $id .'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart product-button" data-product_id="'. $variation['variation_id'] .'"  rel="nofollow">'. esc_html( 'Add to cart', 'printera' ) .'</a>';

				$variation_id = $variation['variation_id'];

			}else{
				$price[] = $product->get_price_html();
			}
			$select_variation = 'size';

		}

	}
	
	$data['size'] = $size;
	$data['img']= $img;
	$data['color']= $color;
	$data['price']= $price;
	$data['cart']= $add_to_cart;
	$data['select_variation']= $select_variation;
	$data['variation_id']= $variation_id;
	$data['selected_id']= $id;
	$data['test']= $k;
	echo json_encode($data);
	wp_die();
	exit;
}
add_action('wp_ajax_get_ajax_image', 'printera_get_ajax_image');
add_action('wp_ajax_nopriv_get_ajax_image', 'printera_get_ajax_image');
