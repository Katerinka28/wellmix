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
		'title'  => esc_html__( 'Product Sharing', 'printera' ),
		'id'     => 'sharing-opt',
		'icon'   => 'el el-share-alt',
		'desc'   => esc_html__( 'This section contains options for Social.', 'printera' ),
		'fields' => array(

			array(
				'id'      => 'opt_fb_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Facebook', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 1,
			),

			array(
				'id'      => 'opt_twitter_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Twitter', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 1,
			),

			array(
				'id'      => 'opt_linkedin_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Linkedin', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 1,
			),

			array(
				'id'      => 'opt_pinterest_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Pinterest', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 0,
			),

			array(
				'id'      => 'opt_tumblr_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Tumblr', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 0,
			),

			array(
				'id'      => 'opt_email_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Email', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 0,
			),

			array(
				'id'      => 'opt_whats_shar',
				'type'    => 'switch',
				'title'   => esc_html__( 'Whatsapp', 'printera' ),
				'options' => array(
					'yes' => esc_html__( 'On', 'printera' ),
					'no'  => esc_html__( 'Off', 'printera' ),
				),
				'default' => 0,
			),

		),
	)
);

