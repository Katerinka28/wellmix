<?php
/**
 * Subscribe Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Subscribe ', 'printera' ),
		'id'     => 'subscribe-opt',
		'icon'   => 'el el-envelope',
		'fields' => array(

			array(
				'id'    => 'subscribe-shortcode',
				'type'  => 'text',
				'title' => esc_html__( 'Subscribe Shortcode', 'printera' ),
			),
			array(
				'id'        => 'subscribe-image',
				'type'      => 'media',
				'url'       => true,
				'title'     => esc_html__( 'Subscribe Image', 'printera' ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/' . 'newsletter-bg.jpg' ),
			),
			array(
				'id'    => 'subscribe-title',
				'type'  => 'textarea',
				'title' => esc_html__( 'Subscribe Title', 'printera' ),
				'default' => esc_html__( 'Join Our Newsletter And Get 20% DIscount', 'printera' ),
			),
			array(
				'id'      => 'subscribe-text',
				'type'    => 'editor',
				'title'   => esc_html__( 'Subscribe Text', 'printera' ),
				'default' => esc_html__( 'We care about our customers - you have always been an integral part of who we are. Join today.', 'printera' ),
			),
		),
	)
);

