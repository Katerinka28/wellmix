<?php
/**
 * 404 Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( '404 Page', 'printera' ),
		'id'     => '404-opt',
		'icon'   => 'el-icon-error',
		'desc'   => esc_html__( 'This section contains options for 404 Page.', 'printera' ),
		'fields' => array(

			array(
				'id'        => '404-image',
				'type'      => 'media',
				'url'       => true,
				'title'     => esc_html__( '404 Page Image', 'printera' ),
				'read-only' => false,
				// 'default'   => array( 'url' => get_template_directory_uri() . '/assets/images/backend/404.svg' ),
			),

			array(
				'id'      => '404-title',
				'type'    => 'text',
				'title'   => esc_html__( '404 Title', 'printera' ),
				'default' => esc_html__( 'Oops! This Page is Not Found.', 'printera' ),
			),

			array(
				'id'      => '404-description',
				'type'    => 'editor',
				'title'   => esc_html__( '404 Description', 'printera' ),
				'default' => esc_html__( 'Sorry for the inconvenience. Go to our homepage or check out our latest solution for your finance and insurance needs.', 'printera' ),
			),

			array(
				'id'      => 'search-onOff',
				'type'    => 'switch',
				'title'   => esc_html__( 'Comments', 'printera' ),
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				'default' => 1,
			),

		),
	)
);

