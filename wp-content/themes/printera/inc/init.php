<?php
/**
 * Initialization 
 */

 
/**
 * Enqueue script and style
 */
require get_template_directory() . '/inc/core/script-style-enqueue.php';

/**
 * Implement classes
 */
require get_template_directory() . '/inc/core/core-classes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * One Click Demo Import
 */
require get_template_directory() . '/inc/demo/import.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/woocommerce-custom.php';
	require get_template_directory() . '/inc/woocommerce/woocommerce-override.php';
	require get_template_directory() . '/inc/core/product-variation.php';
	require get_template_directory() . '/inc/core/product-threesixty.php';
}

/**
 * Paignation
 */
require_once get_template_directory() . '/inc/tgm/required-plugins.php';

require_once get_template_directory() . '/inc/core/pagination.php';

require_once get_template_directory() . '/inc/page-header/page-header.php';

require_once get_template_directory() . '/inc/page-header/title.php';

require_once get_template_directory() . '/inc/page-header/breadcrumbs.php';

require_once get_template_directory() . '/inc/comment.php';

require_once get_template_directory() . '/inc/core/sidebar.php';


if( class_exists( 'ReduxFramework' ) ) {
	require_once get_template_directory() . '/inc/core/dynamic-css.php';
	require_once get_template_directory() . '/inc/core/color-customization.php';
}

/**
 * theme options js in footer
 */
function printera_myscript() {
	$printera_options= get_option( 'printera_options' );
	if ( ! empty( $printera_options['js-code'] ) ) {
		?>
	<script>
		<?php echo wp_specialchars_decode( $printera_options['js-code'] ); ?>
	</script>
		<?php
	}
}
add_action( 'wp_footer', 'printera_myscript', 100 );

/**
 * theme option js in header
 */
function printera_myscript_jquery() {
	$printera_options= get_option( 'printera_options' );
	if ( ! empty( $printera_options['js-header-code'] ) ) {
		?>
	<script>
		<?php echo wp_specialchars_decode( $printera_options['js-header-code'] ); ?>
	</script>
		<?php
	}
}
add_action( 'wp_head', 'printera_myscript_jquery', 100 );

function svg_loading(){
	global $wp_filesystem;
    $file = $wp_filesystem->get_contents( get_template_directory() . '/assets/images/loading.svg'  );
	return $file;
}

if( isset( $_GET['product-search'] ) == 1 ){
	add_filter('pre_get_posts','wpshock_search_filter');
	function wpshock_search_filter( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', array('product') );
		}
		return $query;
	}
}else{
	function wpshock_search_filter( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', array('post') );
		}
		return $query;
	}
	add_filter('pre_get_posts','wpshock_search_filter');
}
