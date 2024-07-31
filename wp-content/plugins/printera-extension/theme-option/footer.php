<?php
/**
 * Footer Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

$options_sidebar = array();
global $wp_registered_sidebars;
foreach ( $wp_registered_sidebars as $sidebar ) {
	$options_sidebar[$sidebar['id']] = array( 'value' => $sidebar['name'] );
}

Redux::setSection(
	'printera_options',
	array(
		'title'            => esc_html__( 'Footer', 'printera' ),
		'id'               => 'footer-redux',
		'icon'             => 'el el-arrow-down',
		'customizer_width' => '500px',
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Footer Top', 'printera' ),
		'id'         => 'footer-top-area',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for footer.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'footer-top',
				'type'    => 'switch',
				'title'   => esc_html__( 'Footer Top', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),


			array(
				'id'         => 'footer-field',
				'type'       => 'repeater',
				'title'      => esc_html__( 'Footer Top Content', 'printera' ),
				'subtitle'   => esc_html__( '', 'printera' ),
				'desc'       => esc_html__( '', 'printera' ),
				//'group_values' => true, // Group all fields below within the repeater ID
				//'item_name' => '', // Add a repeater block name to the Add and Delete buttons
				//'bind_title' => '', // Bind the repeater block title to this field ID
				//'static'     => 2, // Set the number of repeater blocks to be output
				//'limit' => 2, // Limit the number of repeater blocks a user can create
				//'sortable' => false, // Allow the users to sort the repeater blocks or not
				'fields'     => array(
					array(
						'id'          => 'title_field',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Title', 'printera' ),
					),
					array(
						'id'          => 'text_field',
						'type'        => 'editor',
						'placeholder' => esc_html__( 'Text Field', 'printera' ),
					),
				)
			),
			array(
				'id'          => 'footer-top-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Top Color', 'printera' ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array( 'background' => 'footer.site-footer #footer-top'),
			),
			array(
				'id'          => 'footer-text01-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Text Color', 'printera' ),
				'mode'        => 'color',
				'transparent' => false,
				'output'	=> array( 'color' => 'footer .footer-newsletter .news-title .widget-title,footer .footer-newsletter .news-title .widget-title::before,footer .mc4wp-form-fields .newsletter-form > button'),
			),
			array(
				'id'          => 'footer-text-hover-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Text Hover Color', 'printera' ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array( 'color' => 'footer .mc4wp-form-fields .newsletter-form > button:hover'),
			),
		),
	),
);
Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Footer Style', 'printera' ),
		'id'         => 'footer-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for footer.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'footer-style',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Footer Style', 'printera' ),
				'options' => array(
					'footer-style-1' => array(
						'title' => esc_html__( 'Footer Style 1', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/footer_1.jpg',
					),
				),
				'default' => 'footer-style-1',
			),

			array(
				'id'      => 'footer-layout',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Footer Layout', 'printera' ),
				'options' => array(
					'1' => array(
						'title' => esc_html__( 'One Column', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/footer-12.png',
					),
					'2' => array(
						'title' => esc_html__( 'Two Column', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/footer6+6.png',
					),
					'3' => array(
						'title' => esc_html__( 'Three Column', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/footer4+4+4.png',
					),
					'4' => array(
						'title' => esc_html__( 'Four Column', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/footer3+3+3+3.png',
					)
				),
				'default' => '4',
			),

			array(
				'id'      => 'footer-type',
				'type'    => 'switch',
				'title'   => esc_html__( 'Footer Set Option', 'printera' ),
					'on' => 'Color',
					'off' => 'Image',
				'default' => 1,
			),

			array(
				'id'               => 'footer-background',
				'type'             => 'background',
				'output'           => array( 'footer.site-footer' ),
				// 'required'         => array( 'footer-type', '=', 0 ),
				'background-color' => false,
				'title'            => esc_html__( 'Footer Background', 'printera' ),
				'transparent'      => false,
				'output'		   => array('footer .site-info, footer .site-info'),
			),

			array(
				'id'          => 'footer-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Color', 'printera' ),
				'subtitle'    => esc_html__( 'Choose Footer Background Color', 'printera' ),
				// 'required'    => array( 'footer-type', '=', 1 ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array('footer.site-footer , footer .site-info'),
			),

			array(
				'id'          => 'footer-title-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Title Color', 'printera' ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array('color'=>'footer h3.widget-title, footer .widget-wrap .widget .widget-title,footer h5'),
			),

			array(
				'id'          => 'footer-text-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Text Color', 'printera' ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array('color'=>'footer, footer.site-footer a, footer.site-footer li, footer div, footer .site-info .copyright a, footer .copyright .copyright-left'),
			),

			array(
				'id'          => 'footer-link-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Footer Link Hover Color', 'printera' ),
				'mode'        => 'background',
				'transparent' => false,
				'output'	=> array('color'=>'footer.site-footer a:hover', 'background' => 'footer input[type="submit"]:hover'),
			),

		),
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Footer Bottom', 'printera' ),
		'id'         => 'footer-bottom-area',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for footer.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'footer-bottom',
				'type'    => 'switch',
				'title'   => esc_html__( 'Footer Bottom', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),
			
			array(
				'id'       => 'footer-bottom-content',
				'type'     => 'editor',
				'required' => array( 'footer-bottom', '=', 1 ),
				'title'    => esc_html__( 'Footer Bottom Content', 'printera' ),
				'subtitle' => sprintf(
					wp_kses(
						__( 'You can use shortcodes or content in your Footer Bottom.', 'printera' ),
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
		'title'      => esc_html__( 'Footer Copyright', 'printera' ),
		'id'         => 'footer-copyright',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for footer.', 'printera' ),
		'fields'     => array(

			array(
				'id'       => 'copyright-left',
				'type'     => 'editor',
				'title'    => esc_html__( 'Copyright Left', 'printera' ),
				'default'  => esc_html__( 'Copyright 2024, All Rights Reserved.', 'printera' ),
				'subtitle' => sprintf(
					wp_kses(
						__( 'You can use following shortcodes in your footer text: <br><span class="code">[printera-copyright]</span><span class="code">[printera-site-title]</span> <span class="code">[printera-year]</span> <span class="code">[printera-social-media]</span> <span class="code">[printera-footer-menu]</span>', 'printera' ),
						array(
							'span' => array(
								'class' => true,
							),
							'br'   => array(),
						)
					)
				),
			),

			array(
				'id'       => 'copyright-right',
				'type'     => 'editor',
				'title'    => esc_html__( 'Copyright Right', 'printera' ),
				'subtitle' => sprintf(
					wp_kses(
						__( 'You can use following shortcodes in your footer text: <br><span class="code">[printera-copyright]</span><span class="code">[printera-site-title]</span> <span class="code">[printera-year]</span> <span class="code">[printera-social-media]</span> <span class="code">[printera-footer-menu]</span>', 'printera' ),
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
