<?php
/**
 * Typography Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Typography', 'printera' ),
		'id'     => 'typography-opt',
		'icon'   => 'el el-text-width',
		'desc'   => esc_html__( 'This section contains options for Typography.', 'printera' ),
		'fields' => array(

			array(
				'id'       => 'opt-typography-body',
				'type'     => 'typography',
				'title'    => esc_html__( 'Body Font', 'printera' ),
				'color'    => false,
				'subtitle' => esc_html__( 'Specify the body font properties.', 'printera' ),
				'google'   => true,
				'output'   => array( 'body,header .humburger-icon-wrap .humburger-title' ),
				'text-align' => false,
				'subsets' => false,
				'font-backup' => true,
				'line-height' => false,
			),
			array(
				'id'          => 'div-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography Div', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( '.cat_desc .wpcat-content .cat_name,.tt-banner .banner-text .banner-title,.title-wrap .ui-tabs-nav li a,.category-grid .cat_desc .cat_name,.blog-style .tt-post-details .tt-post-content,.right-header .mini-cart .dropdown-menu-mini-cart .shopping_cart_top .cart-title' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),
		
			array(
				'id'          => 'h1-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H1', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h1,.site-header #site-navigation ul.nav-menu li.menu-item a' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

			array(
				'id'          => 'h2-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H2', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h2,.product .woocommerce-loop-product__title,.elementor-heading-title' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

			array(
				'id'          => 'h3-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H3', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h3' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

			array(
				'id'          => 'h4-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H4', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h4' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

			array(
				'id'          => 'h5-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H5', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h5' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

			array(
				'id'          => 'h6-typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Typography H6', 'printera' ),
				
				// 'compiler'      => true,  // Use if you want to hook in your own CSS compiler
				// 'google'      => false,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true,
				// Select a backup non-google font in addition to a google font
				// 'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				// 'subsets'       => false, // Only appears if google is true and subsets not set to false
				// 'font-size'     => false,
				// 'line-height'   => false,
				// 'word-spacing'  => true,  // Defaults to false
				// 'letter-spacing'=> true,  // Defaults to false.
				'color'       => false,
				'all_styles'  => true,
				// Enable all Google Font style/weight variations to be added to the page.
				'output'      => array( 'h6,.moon-svg h6, .sun-svg h6' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'compiler'    => array( 'site-description-compiler' ),
				// An array of CSS selectors to apply this font style to dynamically.
				'units'       => 'px',
				// Defaults to px.
				'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'printera' ),
				'text-align' => false,
				'subsets' => false,
				'line-height' => false,
			),

		),
	)
);

