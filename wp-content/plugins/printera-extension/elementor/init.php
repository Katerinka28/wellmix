<?php
/**
 * Widget API: Elementor Widgets
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

add_action( 'elementor/widgets/register', 'printera_elementor_widgets' );
/**
 * Elementor Widgets
 */
function printera_elementor_widgets() {

	require PRINTERA_TH_ROOT . '/elementor/product-categories.php';
	require PRINTERA_TH_ROOT . '/elementor/product-trending.php';
	require PRINTERA_TH_ROOT . '/elementor/product-by-categories.php';
	require PRINTERA_TH_ROOT . '/elementor/product-recent.php';
	require PRINTERA_TH_ROOT . '/elementor/dealOf-theDay-product.php';
	require PRINTERA_TH_ROOT . '/elementor/dealOf-theWeek-product.php';
	require PRINTERA_TH_ROOT . '/elementor/single-category-product.php';
	
	require PRINTERA_TH_ROOT . '/elementor/category-gallery.php';
	require PRINTERA_TH_ROOT . '/elementor/client.php';
	require PRINTERA_TH_ROOT . '/elementor/banner.php';
	require PRINTERA_TH_ROOT . '/elementor/slider.php';
	require PRINTERA_TH_ROOT . '/elementor/servicebox.php';
	require PRINTERA_TH_ROOT . '/elementor/blog.php';
	require PRINTERA_TH_ROOT . '/elementor/hotspot.php';
	require PRINTERA_TH_ROOT . '/elementor/text-carousel.php';
	require PRINTERA_TH_ROOT . '/elementor/portfolio.php';
	require PRINTERA_TH_ROOT . '/elementor/title.php';
	require PRINTERA_TH_ROOT . '/elementor/testimonial.php';
	require PRINTERA_TH_ROOT . '/elementor/timer.php';
	require PRINTERA_TH_ROOT . '/elementor/video.php';
	require PRINTERA_TH_ROOT . '/elementor/cms-block.php';
	require PRINTERA_TH_ROOT . '/elementor/best-selling.php';
}

add_action(
	'elementor/init',
	function() {
		\Elementor\Plugin::$instance->elements_manager->add_category(
			'printera',
			array(
				'title' => esc_html__( 'printera', 'printera' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}
);


add_action('elementor/editor/before_enqueue_scripts', function() {
	wp_enqueue_script( 'plugin-admin-custom', PRINTERA_TH_URL .'/assets/js/admin-custom.js', array(), '1.0.0', true );
	wp_localize_script( 'plugin-admin-custom', 'admin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
});