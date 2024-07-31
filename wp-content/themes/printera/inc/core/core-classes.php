<?php
/**
 * printera Class
 */

/**
 * Header Class
 */
if( ! function_exists( 'printera_header_class' ) ){

	function printera_header_class(){
		$printera_header_class = array();
		$printera_header_class[] = 'site-header header_style';
		
		if( class_exists( 'ReduxFramework' ) ) {
			$printera_options = get_option( 'printera_options' );

			$Transparent = $printera_options['header-transparent'];
			if( $Transparent == 1 ){
				$printera_header_class[] = 'transparent';
			}

			$header_sticky = $printera_options['header-sticky'];
			if( $header_sticky == 1 ){
				$printera_header_class[] = 'header-sticky';
			}
			if( $printera_options['header-width'] == 0 ){

				$printera_header_class[] = 'container';
			}

			$header_style = isset( $_GET['header_style'] ) ? sanitize_text_field( $_GET['header_style'] ) : '';
			
			if( $header_style == 1 ){
				$printera_header_class[] = "header-style-1";
			}else{
				$printera_header_class[] = $printera_options['header-style'];
			}
		}
		
		echo 'class="' . esc_attr( implode( ' ', $printera_header_class  ) ) . '"';
	}

}
if( ! function_exists( 'product_list_parent_class' ) ){

	function product_list_parent_class(){
		
		if( class_exists( 'ReduxFramework' ) ) {
			$printera_options = get_option( 'printera_options' );
			$view = isset( $_GET['view'] ) ? sanitize_text_field( $_GET['view'] ) : '';
			
			$ViewMode = !empty( $printera_options['product-view-mode'] ) ? sanitize_text_field( $printera_options['product-view-mode'] ) : '' ;		

			if( $view == 'list-view' || $ViewMode == 4 || $ViewMode == 2 ){
				$product_list_parent_class[] = "list-view";
			}elseif( $view == 'short-view' || $ViewMode == 5 ){
				$product_list_parent_class[] = "short-view";
			}else{
				$product_list_parent_class[] = "grid-view";
			}
				
			$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

			/* if( $printera_options['products-masonry'] == 1 || $printera_options['product-thumbnail-slider'] == "thumbnail-slider-style3" ){
				$product_list_parent_class[] = 'shop grid';
			} */
			
		}else{
			$product_list_parent_class[] = "grid-view woo-default";
		}
		echo esc_attr( implode( ' ', $product_list_parent_class  ) );
	}
	
}

function filter_woocommerce_post_class( $classes, $product ) {    
    $classes[] = '';
    return $classes;
}
add_filter( 'woocommerce_post_class', 'filter_woocommerce_post_class', 10, 2 );

function custom_class( $classes ) {
	if ( class_exists( 'WooCommerce' ) ) {
		
		if( is_Shop() || is_product_category() || is_tax() || is_product() || is_cart()){
			if( class_exists( 'ReduxFramework' ) ) {
				$printera_options = get_option( 'printera_options' );
				$product_layout = isset( $_GET['product_layout'] ) ? sanitize_text_field( $_GET['product_layout'] ) : '';

				if( $product_layout == "default" ){
					$classes[] = "product-layout-default";
				}elseif( !empty( $printera_options['product-layout'] ) ){
					$classes[] = $printera_options['product-layout'];
				}

				if( !empty( $printera_options['theme-layout'] ) ){
					$classes[] = $printera_options['theme-layout'];
				}
		
				$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

				if( $thumbnail_slider == 1 ){
					$classes[] = "thumbnail-slider-style1";
				}elseif( $thumbnail_slider == 2 ){
					$classes[] = "thumbnail-slider-style2";
				}elseif( $thumbnail_slider == 3 ){
					$classes[] = "thumbnail-slider-style3";
				}elseif( !empty( $printera_options['product-thumbnail-slider'] ) ){
					$classes[] = $printera_options['product-thumbnail-slider'];
				}

				$view = isset( $_GET['view'] ) ? sanitize_text_field( $_GET['view'] ) : 'grid-' . wc_get_loop_prop( 'columns' );
				$classes[] = 'body-'.$view;
				
			}else{
				$classes[] = "product-layout-default";
			}
		}
	}
	$darkmode = isset( $_GET['darkmode'] ) ? sanitize_text_field( $_GET['darkmode'] ) : '';

	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['dark-light-mode'] == 0 ){
			$classes[] = "dark-mode";
		}
		if( $darkmode == 1 ){
			$classes[] = "dark-mode";
		}	
	}

	$rtlmode = isset( $_GET['rtlmode'] ) ? sanitize_text_field( $_GET['rtlmode'] ) : '';

	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['theme-rtl'] == 'rtl' ){
			$classes[] = "rtl";
		}
		if( $rtlmode == 'rtl' ){
			$classes[] = "rtl";
		}
	}
	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['opt-cursor'] == 'default' ){
			$classes[] = "theme-cursor";
		}
	}

	return $classes;
}
add_filter( 'body_class', 'custom_class' );

add_filter('post_class', function( $classes ) {
	$additional_classes = array();
	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );

		$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

		if( $thumbnail_slider == 3 ){
			$additional_classes = 'grid-item';
            array_push($classes , $additional_classes);
		}elseif( $printera_options['products-masonry'] == 1 || $printera_options['product-thumbnail-slider'] == "thumbnail-slider-style3" ){
        	$additional_classes = 'grid-item';
            array_push($classes , $additional_classes);
		}

		$slider_style = isset( $_GET['slider_style'] ) ? sanitize_text_field( $_GET['slider_style'] ) : '';

		if( $thumbnail_slider == 1 ){
			if( $slider_style == "left" ){
				$additional_classes = "left-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "bottom" ){
				$additional_classes = "bottom-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "right" ){
				$additional_classes = "right-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "no-slider" ){
				$additional_classes = "no-slider";
				array_push($classes , $additional_classes);
			}elseif( !empty( $printera_options['singal-slider-style1'] ) && $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style1' ){
				$additional_classes = $printera_options['singal-slider-style1'];
				array_push($classes , $additional_classes);
			}
		}elseif( $printera_options['product-thumbnail-slider'] == "thumbnail-slider-style1" ) {
			$slider_style = isset( $_GET['slider_style'] ) ? sanitize_text_field( $_GET['slider_style'] ) : '';
			
			if( $slider_style == "left" ){
				$additional_classes = "left-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "bottom" ){
				$additional_classes = "bottom-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "right" ){
				$additional_classes = "right-slider";
				array_push($classes , $additional_classes);
			}elseif( $slider_style == "no-slider" ){
				$additional_classes = "no-slider";
				array_push($classes , $additional_classes);
			}elseif( !empty( $printera_options['singal-slider-style1'] ) && $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style1' ){
				$additional_classes = $printera_options['singal-slider-style1'];
				array_push($classes , $additional_classes);
			}
		}

		if( $thumbnail_slider == 2 ){
			if( !empty( $printera_options['singal-slider-style2'] ) ){
				$additional_classes = $printera_options['singal-slider-style2'];
				array_push($classes , $additional_classes);
			}
		}elseif( $printera_options['product-thumbnail-slider'] == "thumbnail-slider-style2" ) {
			if( !empty( $printera_options['singal-slider-style2'] ) ){
				$additional_classes = $printera_options['singal-slider-style2'];
				array_push($classes , $additional_classes);
			}
		}
	}else{
		$additional_classes = 'default-blog';
		array_push( $classes , $additional_classes );
	}
    return $classes;
},10,3);

if( ! function_exists( 'single_list_class' ) ){

	function single_list_class(){
		if( class_exists( 'ReduxFramework' ) ) {
			$printera_options = get_option( 'printera_options' );

			if( $printera_options['products-compare'] == 0 ){
				$single_list_class = "list-btn-none";
			}else{
				$single_list_class = "list-btn-block";
			}

		echo esc_html( $single_list_class );
		}
	}
}
