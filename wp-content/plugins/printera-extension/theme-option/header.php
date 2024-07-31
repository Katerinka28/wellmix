<?php
/**
 * Header Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'            => esc_html__( 'Header', 'printera' ),
		'id'               => 'header-redux',
		'icon'             => 'el el-arrow-up',
		'customizer_width' => '500px',
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Header Top', 'printera' ),
		'id'         => 'header-top-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for header.', 'printera' ),
		'fields'     => array(

			array(
				'id'       => 'header-top-nav-bar',
				'type'     => 'editor',
				'title'    => esc_html__( 'Top Navbar Text (Notice)', 'printera' ),
			),

			array(
				'id'      => 'opt-top',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Top', 'printera' ),
				'options' => array(
					'on'  => 'On',
					'off' => 'Off',
				),
				'default' => 0,
			),

			array(
				'id'       => 'header-top',
				'type'     => 'sorter',
				'title'    => 'Header Top Elements',
				'subtitle' => 'You can add multiple drop areas or columns.  Note: Change your details like phone number, e-mail, address etc from "Site Info" tab.',
				'compiler' => 'true',
				'options'  => array(
					'Left'   => array(
						'text'   => 'Text',
					),
					'center'  => array(
						'email'   => 'Email',
					),
					'Right'  => array(
						'phone' => 'Phone Number',
					),
					'Unused' => array(
						'clear' => 'Clearance Sales',
						'phone' => 'Phone Number',
						'lang-menu'  => 'Language Menu',
						'currency-menu'  => 'Currency Menu',
					),
				),
			),

			array(
				'id'      => 'header-info-text',
				'type'    => 'editor',
				'title'   => esc_html__( 'Text', 'printera' ),
				'default' => esc_html__( 'We are creative, ambitious and ready for challenges! Hire Us', 'printera' ),
			),
			array(
				'id'      => 'header-lang-menu',
				'type'    => 'text',
				'title'   => esc_html__( 'Add Shortcode (Language Menu)', 'printera' ),
			),
			array(
				'id'      => 'header-currency-menu',
				'type'    => 'text',
				'title'   => esc_html__( 'Add Shortcode (Currency Menu)', 'printera' ),
			),

			array(
				'id'      => 'header-clear-text',
				'type'    => 'editor',
				'title'   => esc_html__( 'Clearance', 'printera' ),
			),

		),
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Header Style', 'printera' ),
		'id'         => 'header-type',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for header.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'header-style',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Header Style', 'printera' ),
				'options' => array(
					'header-style-1' => array(
						'title' => esc_html__( '1st Variation', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/header_1.jpg',
					),
				),
				'default' => 'header-style-1',
			),
			array(
				'id'      => 'mobile-header-option',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Mobile Header Option', 'printera' ),
				'options' => array(
					'mobile-header-01' => 'On', 
					'mobile-header-02' => 'Off'
				 ), 
				'default' => 'mobile-header-01'
			),

			array(
				'id'       => 'header-bottom',
				'type'     => 'sorter',
				'title'    => 'Header Bottom Element',
				'subtitle' => 'You can add multiple drop areas or columns.  Note: Change your details like phone number, e-mail, address etc from "Site Info" tab.',
				'compiler' => 'true',
				'options'  => array(
					'Left'   => array(
						'phone' => 'Phone Number',
					),
					'Unused' => array(
						'text'   => 'Text',
						'email'   => 'Email',
						'clear' => 'Clearance Sales',
						'phone' => 'Phone Number',
						'lang-menu'  => 'Language Menu',
						'currency-menu'  => 'Currency Menu',
					),
				),
			),

			array(
				'id'      => 'opt-search',
				'type'    => 'switch',
				'title'   => esc_html__( 'WooCommerce Search', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'       => 'hamburger-content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Hamburger Menu Content', 'printera' ),
				'subtitle' => sprintf(
					wp_kses(
						__( 'You can use shortcodes or content in your Footer Top.', 'printera' ),
						array(
							'span' => array(
								'class' => true,
							),
							'br'   => array(),
						)
					)
				),
			),

			

		),
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Header Layout', 'printera' ),
		'id'         => 'header-layout-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for header.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'header-transparent',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Transparent', 'printera' ),
				'on' => 'Yes',
				'off' => 'No',
				'default' => 0,
			),

			array(
				'id'      => 'header-sticky',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Sticky', 'printera' ),
				'on' => 'Yes',
				'off' => 'No',
				'default' => 0,
			),

			array(
				'id'      => 'header-width',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Size', 'printera' ), // Must provide key => value pairs for select options
				'on'       => esc_html__( 'FullWidth', 'printera' ),
				'off' => esc_html__( 'Container', 'printera' ),
				'default' => 1,
			),

			array(
				'id'      => 'header-color',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Colors', 'printera' ),
				'on' => 'Default',
				'off' => 'Custom',
				'default' => 1,
			),

			array(
				'id'          => 'header_background_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Background Color', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'subtitle'    => esc_html__( 'Choose Header Background Color', 'printera' ),
				'transparent' => false,
				'output'   => array('background-color' => '.header_style.site-header'),
			),

			array(
				'id'          => 'header_text_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Text Color', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array("color"=>".search-main .search-wrapper > button,.search-main .search-wrapper > button,.search-wrapper > .select-wrap > .category,.search-wrapper > .select-wrap::after,.header_style.site-header #site-navigation ul.nav-menu li.menu-item.menu-item-has-children > a,.site-header #primary-menu a,header.header-style-1 .humburger-icon-wrap,.header-style-1 .right-header .mini-cart .dropdown-back,.site-header #site-navigation ul.nav-menu > li.menu-item.menu-item-has-children > a::before,.search-wrap, body .navbar-woocommerce a, header .social-main li > a,body .right-header .mini-cart .dropdown-back, body .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count, header .head-hamburger-menu svg, .header_style.site-header #site-navigation ul.nav-menu li.menu-item a, #site-navigation .navbar-toggler > svg" , "stroke" => ".navbar-woocommerce a > svg, .right-header .search-wrap > svg", "background" => ".site-header ul li>a::after, #mega-menu-wrap-header-menu #mega-menu-header-menu>li.mega-menu-item>a.mega-menu-link::before,.header-style-1 .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count", "stroke" => "header .social-main li > a > svg,.wishlist-wrap .wishlist a svg, header .social-main li > a svg, .navbar-woocommerce .navbar-title > svg, .search-icon .search-wrap svg, .right-header .mini-cart .dropdown-back svg"),
			),
			array(
				'id'          => 'header_hover_text_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header  hover Text Color', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array("color"=>".header_style.site-header #site-navigation ul.nav-menu li.menu-item:hover a,header .social-main li > a:hover, .product .wrap-rate .star-rating::before, .product .star-rating span::before,.site-header #site-navigation ul.nav-menu > li.menu-item.menu-item-has-children:hover > a::before", "stroke"=>"header .social-main li > a:hover > svg,body .navbar-woocommerce a:hover svg,.wishlist-wrap .wishlist a:hover svg, header .social-main li > a:hover svg, .navbar-woocommerce .navbar-title:hover > svg, .search-icon .search-wrap:hover svg, .right-header .mini-cart:hover .dropdown-back svg"),
			),
			array(
				'id'          => 'header_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Link hover Color', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array('color' => '.site-header #site-navigation ul.nav-menu li.menu-item:hover a', "background"=>".site-header #site-navigation ul.nav-menu li.menu-item a::after" )
			),

			array(
				'id'          => 'header_sticky_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Sticky', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array( "background" => ".home header.site-header.header-style-2.sticky .site-branding" )
			),
			array(
				'id'          => 'header_top_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Top', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array( "background" => ".header-top" )
			),
			array(
				'id'          => 'header_top_text_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header Text Top', 'printera' ),
				'required'    => array( 'header-color', '=', 0 ),
				'transparent' => false,
				'output'   => array( "color" => ".site .header-top ul li span,.site .header-top ul li.header-top-clear span a, .site .header-top ul li.header-top-clear span","stroke" => ".site .header-top ul li span svg" )
			),

		),
	)
);


