<?php
/**
 * One Click Demo
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * One Click Demo Import Array
 */
function printera_import_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Demo 1', 'printera' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/printera.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/printera-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/printera-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-01/printera_options.json',
					'option_name' => 'printera_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-01/demo-01.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM018_printera/',
		),
		array(
			'import_file_name'             => esc_html__( 'Demo 2', 'printera' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/printera.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/printera-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/printera-export.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/demo-02/printera_options.json',
					'option_name' => 'printera_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo/demo-02/demo-02.jpg',
			'preview_url'                  => 'https://wordpress.templatetrip.com/WCMTM01/WCMTM018_printera/home-02/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'printera_import_files' );

if ( ! function_exists( 'printera_after_import' ) ) :

	$args = array(
		'post_type'   => 'elementor_library',
		'meta_query'  => array(
			array(
				'key'   => '_elementor_template_type',
				'value' => 'kit',
			),
		),
	);
	
	$query = get_posts( $args );
	
	if ( ! empty( $query ) && isset( $query[1] ) && isset( $query[1]->ID ) ) {
		update_option( 'elementor_active_kit', $query[1]->ID );
	}


	/**
	 * Menu Setting
	 *
	 * @param array $selected_import .
	 */
	function printera_after_import( $selected_import ) {

		// Assign menus to their locations.
		$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
		$menus     = wp_get_nav_menus(); // registered menus

		if ( $menus ) {
			foreach ( $menus as $menu ) { // assign menus to theme locations

				if ( $menu->name == 'main menu' ) {
					$locations['header-menu'] = $menu->term_id;
				}

				if ( $menu->name == 'shop categories' ) {
					$locations['hamburger-menu'] = $menu->term_id;
				}

				if ( $menu->name == 'Information' ) {
					$locations['footer-menu'] = $menu->term_id;
				}
			}
		}
		set_theme_mod( 'nav_menu_locations', $locations );

		if ( 'Demo 1' === $selected_import['import_file_name'] ) {

			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home 01' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );

			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-01/slider-01.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}

		} elseif ( 'Demo 2' === $selected_import['import_file_name'] ) {
			// Same codes as above for the demo 2
			$front_page_id = get_page_by_title( 'Home 02' );
			$blog_page_id  = get_page_by_title( 'Blog' );

			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
			// Import Revolution Slider.
			if ( class_exists( 'RevSlider' ) ) {
				$slider_array = array(
					get_template_directory() . '/inc/demo/demo-02/slider-02.zip',
				);

				$slider = new RevSlider();

				foreach ( $slider_array as $filepath ) {
					$slider->importSliderFromPost( true, true, $filepath );
				}
			}

		}

		// remove default post
		wp_delete_post( 1 );

	}
	add_action( 'pt-ocdi/after_import', 'printera_after_import' );
endif;

