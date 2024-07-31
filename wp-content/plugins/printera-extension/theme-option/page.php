<?php
/**
 * Page Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Page', 'printera' ),
		'id'     => 'page-opt',
		'icon'   => 'el-icon-align-justify',
		'desc'   => esc_html__( 'This section contains options for Page.', 'printera' ),
		'fields' => array(

			array(
				'id'      => 'page-alignment',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Page Alignment', 'printera' ),
				'options' => array(
					'1' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/right-side.jpg',
					),
					'2' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/left-side.jpg',
					),
					'3' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/single-column.jpg',
					),
				),
				'default' => '1',
			),

			array(
				'id'      => 'search-alignment',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Search Alignment', 'printera' ),
				'options' => array(
					'1' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/right-side.jpg',
					),
					'2' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/left-side.jpg',
					),
					'3' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/single-column.jpg',
					),
				),
				'default' => '1',
			),

			array(
				'id'      => 'archive-alignment',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Archive Alignment', 'printera' ),
				'options' => array(
					'1' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/right-side.jpg',
					),
					'2' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/left-side.jpg',
					),
					'3' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/single-column.jpg',
					),
				),
				'default' => '1',
			),
		),
	)
);

