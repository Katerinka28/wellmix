<?php
/**
 * Color Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 2.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Color Switcher', 'printera' ),
		'id'     => 'color-opt',
		'icon'   => 'el el-brush',
		'desc'   => esc_html__( 'This section contains options for Color Switcher.', 'printera' ),
		'fields' => array(

			array(
				'id'       => 'opt-palette-color',
				'type'     => 'palette',
				'title'    => esc_html__( 'Palette Color Option', 'redux-framework-demo' ),
				'subtitle' => esc_html__( 'Switch over pre-defined color palette', 'redux-framework-demo' ),
				'default'  => 'red',
				'palettes' => array(
					'palettes-1'  => array(
						'#8e6e35',
						'#222222',
					),
					'palettes-2' => array(
						'#636b57',
						'#222222',
					),
					'palettes-3' => array(
						'#c48974',
						'#222222',
					),
					'palettes-4' => array(
						'#b86131',
						'#222222',
					),
					'palettes-5' => array(
						'#e48531',
						'#222222',
					),
					'palettes-6' => array(
						'#202220',
						'#383b38',
					),
				)
			),

			array(
				'id'          => 'primery-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Primary Color', 'printera' ),
				'default'     => '#8e6e35',
				'transparent' => false,
			),

			array(
				'id'          => 'secondary-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Secondary Color', 'printera' ),
				'default'     => '#222222',
				'transparent' => false,
			),

			array(
				'id'          => 'tertiary-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tertiary Color', 'printera' ),
				'default'     => '#ffffff',
				'transparent' => false,
			),

			array(
				'id'          => 'border-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'printera' ),
				'default'     => '#e5e5e5',
				'transparent' => false,
			),

		),
	)
);
