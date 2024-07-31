<?php
/**
 * Shortcode
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

if ( ! function_exists( 'printera_copyright' ) ) {
	/**
	 * [printera-copyright]
	 */
	function printera_copyright() {
		return '©';
	}
}
add_shortcode( 'printera-copyright', 'printera_copyright' );


/**
 * [printera-site-title]
 */
function printera_page_title() {
	return get_bloginfo( 'name' );
}
add_shortcode( 'printera-site-title', 'printera_page_title' );

if ( ! function_exists( 'printera_year' ) ) {
	/**
	 * [printera-year]
	 */
	function printera_year() {
		return gmdate( 'Y' );
	}
}
add_shortcode( 'printera-year', 'printera_year' );

if ( ! function_exists( 'printera_footer_menu' ) ) {
	/**
	 * [printera-footer-menu]
	 */
	function printera_footer_menu() {
		if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'menu_class'     => 'navbar-nav',
					'menu_id'        => 'footer-menu',
					'container_id'   => 'menu-container',
				)
			);
			?>
			<?php
		endif;
	}
}
add_shortcode( 'printera-footer-menu', 'printera_footer_menu' );

if ( ! function_exists( 'printera_footer_social_media' ) ) {
	/**
	 * [printera-social-media]
	 */
	function printera_footer_social_media() {
		$printera_options= get_option( 'printera_options' );
		$data      = $printera_options['info-social'];
		if( ! empty( $data ) ){
			
			$social = '<ul class="social-media d-flex float-start">';
			foreach ( $data as $key => $value ) {
				$a = 1;
				if ( $a < 9 ) {
					if ( $value ) {
						$social .= '<li><a href="' . esc_url( $value ) . '" target="_blank" class="btn btn-primary">
						<i class="fab fa-'. esc_attr( $key ) .'"></i>
						</a></li>';
					}
					$a++;
				}
			}
			$social .='</ul>';
			return $social;
		}
	}
}
add_shortcode( 'printera-social-media', 'printera_footer_social_media' );

function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {
	echo '<h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">'. esc_html__( 'recent view product', 'printera' ) .'</h3>';
	echo '<div class="products grid-view">';
	echo '<div class="row">';
		// Get shortcode parameters
		extract(shortcode_atts(array(
			"per_page" => '5'
		), $atts));

		// Get WooCommerce Global
		global $woocommerce;

		// Get recently viewed product cookies data
		$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
		$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );

		
		// Create the object
		ob_start();

		// Get products per page
		if( !isset( $per_page ) ? $number = 5 : $number = $per_page )

		// Create query arguments array
		$query_args = array(
						'posts_per_page' => $number, 
						'no_found_rows'  => 1, 
						'post_status'    => 'publish', 
						'post_type'      => 'product', 
						'post__in'       => $viewed_products, 
						'orderby'        => 'rand'
						);

		// Add meta_query to query args
		$query_args['meta_query'] = array();

		// Check products stock status
		$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

		// Create a new query
		$loop = new WP_Query($query_args);

		// If query return results
		if ( $loop->have_posts() ) {

			echo '<div class="owl-carousel">';

			// Start the loop
			while ( $loop->have_posts()) {
				$loop->the_post();
				global $product;

				$product_layout = isset( $_GET['product_layout'] ) ? $_GET['product_layout'] : '';
				
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$printera_options = get_option( 'printera_options' );

					if( $product_layout == "default" ){
						wc_get_template_part( 'content', 'product' );
					}elseif( $product_layout == "morden" ){
						wc_get_template_part( 'content', 'product-morden' );
					}elseif( $product_layout == "classic" ){
						wc_get_template_part( 'content', 'product-classic' );
					}elseif( $printera_options['product-layout'] == "product-layout-default" ){
						wc_get_template_part( 'content', 'product' );
					}
				}else{
					wc_get_template_part( 'content', 'product' );
				}

			}

			echo '</div>';

		}
	echo '</div>';
	echo '</div>';
	// Get clean object
	$content .= ob_get_clean();
	
	// Return whole content
	return $content;
	
}

// Register the shortcode
add_shortcode("recently_viewed_products", "rc_woocommerce_recently_viewed_products");