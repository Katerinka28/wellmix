<?php
/**
 * Global Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Global Theme Options', 'printera' ),
		'id'     => 'global-opt',
		'icon'   => 'el el-website',
		'desc'   => esc_html__( 'This section contains options for Global Theme Options.', 'printera' ),
		'fields' => array(

			array(
				'id'      => 'dark-light-mode',
				'type'    => 'switch',
				'title'   => esc_html__( 'Dark/Light Mode', 'printera' ),
				'on' => 'Light',
				'off' => 'Dark',
				'default' => 1,
			),

			array(
				'id'      => 'theme-rtl',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Theme RTL', 'printera' ),
				'options' => array(
					'ltr' => 'LTR', 
					'rtl' => 'RTL'
				 ), 
				'default' => 'ltr'
			),

			array(
				'id'          => 'box-bg-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Box Background Color', 'printera' ),
				'required'    => array( 'theme-layout', '=', '4' ),
				'transparent' => false,
			),

			array(
				'id'        => 'box-bg-img',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Upload Box Background Image', 'printera' ),
				'read-only' => false,
				'required'  => array( 'theme-layout', '=', '4' ),
			),
			array(
				'id'      => 'dark-light-option',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Dark Light Swich Option', 'printera' ),
				'options' => array(
					'dark-light-01' => 'On', 
					'dark-light-02' => 'Off'
				 ), 
				'default' => 'dark-light-01'
			),
			array(
				'id'          => 'body-bg-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Body Background Color', 'printera' ),
				'transparent' => false,
				'output'   => array('background-color' => 'body'),
			),

			array(
				'id'       => 'container-width',
				'type'     => 'dimensions',
				'title'    => esc_html__( 'Container Width', 'printera' ),
				'compiler' => 'true',
				// 'output'   => array( '.container' ),
				'height'   => false,
				'default'  => array(
				'width'   => '1560px',
				),
				'units'    => array( 'px', 'em' ),
			),
			
				array(
				'id'      => 'opt-cursor',
				'type'    => 'button_set',
				'title'   => esc_html__( 'Cursor', 'printera' ),
				'options' => array(
					'default' => 'Default', 
					'modern' => 'Modern',
				 ), 
				'default' => 'default',
			),


			array(
				'id'      => 'opt-backtotop',
				'type'    => 'switch',
				'title'   => esc_html__( 'Back to top', 'printera' ),
				'on'  => esc_html__( 'On', 'printera' ),
				'off' => esc_html__( 'Off', 'printera' ),
				'default' => 1,
			),
			array(
				'id'      => 'backtotop-de-img',
				'type'    => 'switch',
				'title'   => esc_html__( 'Back to top Style', 'printera' ),
				'on'  => esc_html__( 'Default', 'printera' ),
				'off' => esc_html__( 'Image', 'printera' ),
				'default' => 1,
			),
			array(
				'id'        => 'backtotop-img',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Upload back to top Image', 'printera' ),
				'read-only' => false,
				'required'  => array( 'backtotop-de-img', '=', 0 ),
			),

		),
	)
);

