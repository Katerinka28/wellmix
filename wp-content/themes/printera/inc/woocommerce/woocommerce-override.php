<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package printera
 */

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_meta_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals_product', 'woocommerce_cross_sell_display' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5 );
add_action( 'woocommerce_trending_product_summary', 'woocommerce_template_single_excerpt', 5 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title(){
		echo '<a href="'. get_the_permalink() .'" ><h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2></a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {
	/**
	 * Output the view cart button.
	 */
	function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html__( 'View cart', 'printera' ) . '</a>';
	}
}


if ( ! function_exists( 'woocommerce_cross_sell_display' ) ) {
	/**
	 * Output the cart cross-sells.
	 *
	 * @param  int    $limit (default: 2).
	 * @param  int    $columns (default: 2).
	 * @param  string $orderby (default: 'rand').
	 * @param  string $order (default: 'desc').
	 */
	function woocommerce_cross_sell_display( $limit = 2, $columns = 5, $orderby = 'rand', $order = 'desc' ) {
		if ( is_checkout() ) {
			return;
		}
		// Get visible cross sells then sort them at random.
		$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

		wc_set_loop_prop( 'name', 'cross-sells' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_cross_sells_columns', $columns ) );

		// Handle orderby and limit results.
		$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
		$order       = apply_filters( 'woocommerce_cross_sells_order', $order );
		$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
		$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
		$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;

		wc_get_template(
			'cart/cross-sells.php',
			array(
				'cross_sells'    => $cross_sells,
				// Not used now, but used in previous version of up-sells.php.
				'posts_per_page' => $limit,
				'orderby'        => $orderby,
				'columns'        => $columns,
			)
		);
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_product_addtocart_quantity', 'woocommerce_quantity_input', 10 );

add_action( 'woocommerce_product_button', 'product_wishlist_quickview_compare', 10 );
function product_wishlist_quickview_compare(){ ?>
    <?php
    if ( class_exists( 'YITH_WCQV' ) || class_exists( 'YITH_WCWL' ) || class_exists( 'YITH_Woocompare_Frontend' )): ?>
        <div class="product-button-wrap">
            <div class="product-button-hv">
                <?php
                    if ( class_exists( 'YITH_WCWL' )): 
                    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                        $printera_options = get_option( 'printera_options' ); 
                        if( $printera_options['products-wishlist-detail'] == 1 && is_product() ){ ?>
                            <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                        <?php } elseif( $printera_options['products-wishlist-button'] == 1 ){
                            if( $printera_options['products-wishlist'] == 1 ){ ?>
                                <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                            <?php }
                        }
                    } else { ?>
                        <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                    <?php } 
                    endif; ?>

                <?php if( class_exists( 'YITH_Woocompare_Frontend' ) ):
                    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                        $printera_options = get_option( 'printera_options' );
                        
                        if( $printera_options['products-compare-detail'] == 1 && is_product() ){ ?>
                            <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                        <?php } elseif( $printera_options['products-compare-button'] == 1 ){
                            if( $printera_options['products-compare'] == 1 ){ ?>
                                <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                            <?php }
                        }
                    } else { ?>
                            <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                <?php } endif; ?>
                
                <?php
                if ( class_exists( 'YITH_WCQV' )):
                    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                        $printera_options = get_option( 'printera_options' ); 
                        if( $printera_options['products-quick-view'] == 1 ){ ?>
                            <div class="quickview btn-hv" title="<?php esc_attr_e( 'Quickview', 'printera'); ?>"><?php echo do_shortcode( '[yith_quick_view]' ); ?></div>
                        <?php }
                    } else { ?>
                        <div class="quickview btn-hv" title="<?php esc_attr_e( 'Quickview', 'printera'); ?>"><?php echo do_shortcode( '[yith_quick_view]' ); ?></div>
                <?php } endif; ?>

            </div>
        </div>
    <?php
    endif;
}

add_action( 'woocommerce_product_quickview_button', 'product_quickview_button', 10 );
function product_quickview_button(){ ?>
    <div class="product-button-quickview">
    <?php
        if ( class_exists( 'YITH_WCQV' )):
            if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                $printera_options = get_option( 'printera_options' ); 
                if( $printera_options['products-quick-view'] == 1 ){ ?>
                    <div class="quickview btn-hv" title="<?php esc_attr_e( 'Quickview', 'printera'); ?>"><?php echo do_shortcode( '[yith_quick_view]' ); ?></div>
                <?php }
            } else { ?>
                <div class="quickview btn-hv" title="<?php esc_attr_e( 'Quickview', 'printera'); ?>"><?php echo do_shortcode( '[yith_quick_view]' ); ?></div>
                <?php
            }
        endif; ?>
    </div>
    <?php
}

add_action( 'woocommerce_product_button_wrap', 'product_wishlist_compare', 10 );
function product_wishlist_compare(){
    if ( class_exists( 'YITH_WCWL' ) || class_exists( 'YITH_Woocompare_Frontend' )): ?>
        <div class="product-button-wrap">
            <div class="product-button-hv">
                <?php
                if ( class_exists( 'YITH_WCWL' )): 
                    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                        $printera_options = get_option( 'printera_options' ); 
                        if( $printera_options['products-wishlist-detail'] == 1 && is_product() ){ ?>
                            <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                        <?php } elseif( $printera_options['products-wishlist-button'] == 1 ){
                            if( $printera_options['products-wishlist'] == 1 ){ ?>
                                <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                            <?php }
                        }
                    } else { ?>
                        <div class="wishlist btn-hv" title="<?php esc_attr_e( 'Wishlist', 'printera'); ?>"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                    <?php } 
                endif; ?>

                <?php
                if( class_exists( 'YITH_Woocompare_Frontend' ) ):
                    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                        $printera_options = get_option( 'printera_options' );
                        
                        if( $printera_options['products-compare-detail'] == 1 && is_product() ){ ?>
                            <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                        <?php } elseif( $printera_options['products-compare-button'] == 1 ){
                            if( $printera_options['products-compare'] == 1 ){ ?>
                                <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                            <?php }
                        }
                    } else { ?>
                        <div class="compare btn-hv" title="<?php esc_attr_e( 'Compare', 'printera'); ?>"><?php echo do_shortcode( '[yith_compare_button]' ); ?></div>
                        <?php
                    }
                endif; ?>
            </div>
        </div>
        <?php
    endif;
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 15 );
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	/**
	 * Get the product thumbnail for the loop.
	 */
	function woocommerce_template_loop_product_thumbnail(){ ?>
        <a href="<?php echo get_the_permalink(); ?>" class="thumbnail-img">
            <?php 
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo woocommerce_get_product_thumbnail();
            ?>
        </a>
		<?php
	}
}

add_action( 'woocommerce_before_shop_loop_item_title_qty', 'woocommerce_template_loop_product_thumbnail_style2', 15 );
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail_style2' ) ) {
	/**
	 * Get the product thumbnail for the loop.
	 */
	function woocommerce_template_loop_product_thumbnail_style2() { ?>
		<div class="img-button-wrap">
			<a href="<?php echo get_the_permalink(); ?>" class="thumbnail-img">
				<?php 
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo woocommerce_get_product_thumbnail();
				?>
			</a>
		    <?php
                $product = wc_get_product( get_the_ID() );
            	if ( ! $product->is_sold_individually() /* && 'variable' != $product->get_type() */ && $product->is_purchasable() ) {
                    woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
                }
                echo woocommerce_template_loop_add_to_cart();
                echo sales_timer_countdown_product();
            ?>
        </div>
        <?php
	}
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_before_shop_loop_item_rating', 'woocommerce_template_loop_rating', 15 );

// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}

add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus qty_button">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus qty_button">-</button>';
}

/**
 * custom quantity fields script (plus minus)
 */
add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        jQuery( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = jQuery( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 1;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( jQuery( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 1 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }else{
                    $qty.val( 0 );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

/**
 * Get HTML for ratings.
 *
 * @since  3.0.0
 * @param  float $rating Rating being shown.
 * @param  int   $count  Total number of ratings.
 * @return string
 */
function wc_get_rate_html( $rating, $count = 0 ) {
	$html = '';
	if ( 0 < $rating ) {
		/* translators: %s: rating */
		$label = sprintf( esc_html__( 'Rated %s out of 5', 'printera' ), $rating );
		$html  = '<div class="wrap-rate"><div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div></div>';
	}else{
        $label = sprintf( esc_html__( 'Rated %s out of 5', 'printera' ), $rating );
		$html  = '<div class="wrap-rate"><div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div></div>';
    }
	return apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
}


function wc_get_rating_html_custom( $rating, $count = 0 ) {
	$html = '';
    /* translators: %s: rating */
    $label = sprintf( esc_html__( 'Rated %s out of 5', 'printera' ), $rating );
    $html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
	return apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
}

/**
 * Show Total Sales on Product Page
 */
add_action( 'woocommerce_single_product_sold', 'wp_product_sold_count', 11 );
function wp_product_sold_count() {
	global $product;
	$total_sold = get_post_meta( get_the_ID(), 'total_sales', true );
	if ( ! empty( $total_sold ) ){
        sprintf( esc_html__( '%s', 'printera' ), $total_sold );
    }
}

/**
 * Update override
 */

add_action( 'woocommerce_after_single_product_summary', 'printera_woocommerce_output_upsells', 15 );
function printera_woocommerce_output_upsells() {
    woocommerce_upsell_display( 5, 5 ); // Display max 3 products, 3 per row
}

// Remove the product description Title
add_filter( 'woocommerce_product_description_heading', '__return_null' );

/** 
 * remove on single product panel 'Additional Information' since it already says it on tab.
 */
add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');
function isa_product_additional_information_heading() {
    echo '';
}
