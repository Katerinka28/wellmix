<?php
/**
 * Loader Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Site Loader', 'printera' ),
		'id'     => 'loader-opt',
		'icon'   => 'el el-refresh',
		'desc'   => esc_html__( 'This section contains options for Site Loader.', 'printera' ),
		'fields' => array(

			array(
				'id'        => 'site-loader',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Loader Image', 'printera' ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/loader.gif' ),
				'subtitle'  => esc_html__( 'Upload loader image for your Website. Remove image to disable loader screen', 'printera' ),
			),
			array(
				'id'          => 'bg-loader-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Loader Background Color', 'printera' ),
				'transparent' => false,
				'default'     => '#ffffff',
				'output'   => array('background-color' => '.site-loader'),
			),

		),
	)
);

