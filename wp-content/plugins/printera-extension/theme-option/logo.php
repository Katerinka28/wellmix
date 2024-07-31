<?php
/**
 * Logo Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Site Logo', 'printera' ),
		'id'     => 'logo-opt',
		'icon'   => 'el el-flag',
		'desc'   => esc_html__( 'This section contains options for Logo.', 'printera' ),
		'fields' => array(

			array(
				'id'       => 'opt-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Logo Style', 'printera' ),
				// Must provide key => value pairs for radio options.
				'on' => 'Logo Image',
				'off' => 'Logo Text',
				'default'  => '1',
			),

			array(
				'id'        => 'site-logo',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Dark Version Logo', 'printera' ),
				'required' => array('opt-logo','equals', 1 ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/logo.png' ),
				'subtitle'  => esc_html__( 'Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'printera' ),
			),

			
			array(
				'id'        => 'light-site-logo',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Light Version Logo', 'printera' ),
				'required' => array('opt-logo','equals', 1 ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/white-logo.png' ),
				'subtitle'  => esc_html__( 'Upload logo image for your Website. Otherwise site title will be displayed in place of logo. It work with dark mode only', 'printera' ),
			),

			/* array(
				'id'        => 'mobile-logo',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Mobile Logo', 'printera' ),
				'required' => array('opt-logo','equals', 1 ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/white-logo.png' ),
				'subtitle'  => esc_html__( 'Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'printera' ),
			), */

			array(
				'id'             => 'logo-height',
				'type'           => 'dimensions',
				'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
				'units_extended' => 'true',  // Allow users to select any type of unit
				'title'          => esc_html__( 'Logo Size', 'printera' ),
				'subtitle'     	=> esc_html__( 'Leave blank for auto', 'printera' ),
				'required' 		=> array('opt-logo','equals', 1 ),
				'output'         => array( 'header .site-branding a img.logo' ),
				// 'width'          => false,
			),

			array(
				'id'       => 'text-logo',
				'type'     => 'text',
				'title'    => esc_html__( 'Logo Text', 'printera' ),
				'required' => array('opt-logo','equals', 0 ),
				'subtitle' => esc_html__( 'Subtitle', 'printera' ),
				'desc'     => esc_html__( 'Field Description', 'printera' ),
				'default'  => 'printera',
			),

			array(
				'id'          => 'logo-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography h2.site-description', 'printera' ),
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false
				// 'color'         => false,
				// 'preview'       => false, // Disable the previewer.
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h1', 'color' => '.logo a' ),
				'required' => array('opt-logo','equals', 0 ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'text-align' => false,
				'default'     => array(
					'color' => '#ff4a17',
				),
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
			),

			array(
				'id'      => 'site-fevicon',
				'type'    => 'media',
				'url'     => false,
				'title'   => esc_html__( 'Site Fevicon', 'printera' ),
				'default' => array( 'url' => plugin_dir_url( __DIR__ ) . 'assets/images/favicon.png' ),
			),

		),
	)
);

