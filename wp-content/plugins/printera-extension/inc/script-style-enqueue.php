<?php
/**
 * Enqueue all the custom script and style
 *
 * @package printera
 */

/**
 * Enqueue script and style
 */
function printera_custom_scripts_style(){

	/**
	 * Enqueue script
	 */


	if( ! wp_script_is( "owl-carousel", $list = 'enqueued' ) ) {
		wp_enqueue_script( 'owl-carousel', PRINTERA_TH_URL .'/assets/js/owl.carousel.min.js', array(), '2.3.4', true );
	}
	wp_enqueue_script( 'jquery-ui', PRINTERA_TH_URL .'/assets/js/jquery-ui.min.js', array(), '1.13.1', true );
	wp_enqueue_script( 'plugin-custom', PRINTERA_TH_URL .'/assets/js/custom.js', array(), '1.13.1', true );
	wp_enqueue_script( 'tt-marquee', PRINTERA_TH_URL .'/assets/js/marquee.js', array(), '1.6.0', true );
	wp_enqueue_script( 'tt-swiper', PRINTERA_TH_URL .'/assets/js/swiper-bundle.min.js', array(), '2.3.4', true );

	if( ! wp_script_is( "bootstrap", $list = 'enqueued' ) ) {
		wp_enqueue_script( 'tt-bootstrap', PRINTERA_TH_URL .'/assets/js/bootstrap.min.js', array(), '5.0.2', true );
	}

	if( ! wp_script_is( "fontawesome", $list = 'enqueued' ) ) {
		wp_enqueue_script( 'printera-fontawesome', PRINTERA_TH_URL .'/assets/js/all.min.js', array(), '6.1.1', true );
	}

	/**
	 * Enqueue style
	 */
	wp_enqueue_style( 'owl-carousel', PRINTERA_TH_URL .'/assets/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
	
	wp_enqueue_style( 'printera-swiper', PRINTERA_TH_URL .'/assets/css/swiper.min.css', array(), '2.3.4', 'all' );
	
	if( ! wp_style_is( "fontawesome", $list = 'enqueued' ) ) {
		wp_enqueue_style( 'printera-fontawesome', PRINTERA_TH_URL .'/assets/css/all.min.css', array(), '6.1.1', 'all' );
	}
	if( ! wp_style_is( "bootstrap", $list = 'enqueued' ) ) {
		wp_enqueue_style( 'printera-bootstrap', PRINTERA_TH_URL .'/assets/css/bootstrap.min.css', array(), '5.0.2', 'all' );
	}
	wp_enqueue_style( 'printera-marquee', PRINTERA_TH_URL .'/assets/css/marquee.css', array(), '1.6.0', 'all' );
	
	$rtlmode = isset( $_GET['rtlmode'] ) ? sanitize_text_field( $_GET['rtlmode'] ) : '';
	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['theme-rtl'] == 'rtl' || $rtlmode == 'rtl' ){
			wp_enqueue_style( 'style-rtl', PRINTERA_TH_URL .'/assets/css/style-rtl.css', array(), '1.0.0', 'all' );
			wp_enqueue_style( 'responsive-rtl', PRINTERA_TH_URL .'/assets/css/responsive-rtl.css', array(), '1.0.0', 'all' );
		}
	}

	wp_enqueue_style( 'plugin-style', PRINTERA_TH_URL .'/assets/css/style.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'plugin-responsive', PRINTERA_TH_URL .'/assets/css/responsive.css', array(), '1.0.0', 'all' );



	// wp_enqueue_style( 'custom', PRINTERA_TH_URL .'/assets/css/custom.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'ajax-script', PRINTERA_TH_URL . '/assets/js/ajax-script.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'printera_custom_scripts_style' );

add_action('wp_ajax_get_ajax_reload', 'get_ajax_reload');
add_action('wp_ajax_nopriv_get_ajax_reload', 'get_ajax_reload');
function get_ajax_reload(){

	wp_enqueue_script( 'ajax-script', PRINTERA_TH_URL . '/assets/js/ajax-script.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	$data = "this is for testing";
	// echo json_encode($data);
	
	wp_die();
	exit;
}



function printera_custom_scripts_style_admin(){
	wp_enqueue_script( 'plugin-admin-custom', PRINTERA_TH_URL .'/assets/js/admin-custom.js', array(), '1.0.0', true );
	wp_localize_script( 'plugin-admin-custom', 'admin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'admin_enqueue_scripts', 'printera_custom_scripts_style_admin' );