<?php
/**
 * Page Header Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Page Header Breadcrumbs', 'printera' ),
		'id'     => 'page-header-opt',
		'icon'   => 'el el-cog',
		'desc'   => esc_html__( 'This section contains options for Page Header.', 'printera' ),
		'fields' => array(

			array(
				'id'      => 'ph-alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Page Header Alignment', 'printera' ),
				'options' => array(
					'1' => 'Left',
					'2' => 'Right',
					'3' => 'Center',
				),
				'default' => '3',
			),

			array(
				'id'      => 'opt-breadcrumbs',
				'type'    => 'switch',
				'title'   => esc_html__( 'Breadcrumbs', 'printera' ),
				'on'  => 'On',
				'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'ph-type',
				'type'    => 'switch',
				'title'   => esc_html__( 'Page Header Option', 'printera' ),
					'on' => 'Color',
					'off' => 'Image',
				'default' => 1,
			),

			array(
				'id'          => 'ph-bg-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'printera' ),
				'required'    => array( 'ph-type', '=', 1 ),
				// 'default'     => '#232434',
				'mode'        => 'background',
				'transparent' => false,
				'output'   => array('background-color' => '.viewport .page-header'),
			),
			array(
				'id'          => 'ph-text-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'printera' ),
				'required'    => array( 'ph-type', '=', 1 ),
				// 'default'     => '#ffffff',
				'mode'        => 'color',
				'transparent' => false,
				'output'   => array('color' => '.viewport .page-header .breadcrumbs #crumbs a, .viewport .page-header .breadcrumbs #crumbs, .viewport #crumbs .active::after, .page-header .title'),
			),

			array(
				'id'               => 'ph-background',
				'type'             => 'background',
				'required'         => array( 'ph-type', '=', 0 ),
				'background-color' => false,
				'title'            => esc_html__( 'Page Header Background', 'printera' ),
				'transparent'      => false,
				'output'   		   => array('.viewport .page-header'),
			),

			array(
				'id'       => 'ph-max-height',
				'type'     => 'dimensions',
				'title'    => esc_html__( 'Page Header Height', 'printera' ),
				'compiler' => 'true',
				'width'    => false,
				'units'    => array( 'em', 'px' ),
				'output'   => array( '.viewport .page-header' ),
			),

			array(
				'id'             => 'ph-top-padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,
				'bottom'         => true,
				'right'          => false,
				'left'           => false,
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'true',                 // 'display_units' => 'false',
				'title'          => esc_html__( 'Top Padding Option', 'printera' ),
				'output'         => array( '.viewport .page-header' ),
			),

		),
	)
);

