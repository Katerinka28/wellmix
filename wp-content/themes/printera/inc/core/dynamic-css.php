<?php
/**
 * printera Redux Dynamic CSS
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Redux Dynamic CSS
 */
function printera_dynamic_css() {
	
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {

		$printera_options = get_option( 'printera_options' );

		$dynamic_css = '';

		// Header Transparent.
		$header_tran_bg = '';
		if ( $printera_options['header-transparent'] == '1' ) {
			if ( ! empty( $printera_options['header_tran_bg']['rgba'] ) ) {
				$header_tran_bg = $printera_options['header_tran_bg']['rgba'];
			}
		}

		$container = $printera_options['container-width'];
		$dynamic_css .= 
			'@media (min-width: '. $container['width'] .') {
				.container{
					max-width: '. $container['width'] .';
					width:  100%;
				}
			}';
			

		// Footer Color.
		if ( ! empty( $printera_options['css-code'] ) ) {
			$printera_css    = $printera_options['css-code'];
			$dynamic_css .= esc_attr( $printera_css );
		}
		wp_add_inline_style( 'printera-responsive', $dynamic_css );
	}
}
add_action( 'wp_enqueue_scripts', 'printera_dynamic_css', 20 );
