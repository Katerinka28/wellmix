<?php
/**
 * Portfolio Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Site Info', 'printera' ),
		'id'     => 'site-info-opt',
		'icon'   => 'el el-map-marker',
		'desc'   => esc_html__( 'This section contains options for footer.', 'printera' ),
		'fields' => array(

			array(
				'id'      => 'info-address',
				'type'    => 'text',
				'title'   => esc_html__( 'Address', 'printera' ),
				'default' => '7515 Carriage Court, Coachella, CA, 92236 USA',
			),

			array(
				'id'      => 'info-phone',
				'type'    => 'text',
				'title'   => esc_html__( 'Phone', 'printera' ),
				'default' => '(+001) 123-456-7890',
			),

			array(
				'id'      => 'opt-phone-two',
				'type'    => 'switch',
				'title'   => esc_html__( 'Alternate Phone', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),

			array(
				'id'       => 'info-phone-two',
				'type'     => 'text',
				'required' => array( 'opt-phone-two', '=', 1 ),
				'default'  => '(+001) 123-456-7890',
			),

			array(
				'id'       => 'info-email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'printera' ),
				'validate' => 'email',
				'msg'      => 'custom error message',
				'default'  => 'printera@templatetrip.com',
			),

			array(
				'id'      => 'opt-email-two',
				'type'    => 'switch',
				'title'   => esc_html__( 'Alternate Email', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),

			array(
				'id'       => 'info-email-two',
				'type'     => 'text',
				'required' => array( 'opt-email-two', '=', 1 ),
				'validate' => 'email',
				'msg'      => 'custom error message',
				'default'  => 'printera@templatetrip.com',
			),

			array(
				'id'      => 'info-hours',
				'type'    => 'text',
				'title'   => esc_html__( 'Office Time', 'printera' ),
				'default' => '8.00am to 7.00pm',
			),
			
			array(
				'id'      => 'info-social',
				'type'    => 'sortable',
				'title'   => esc_html__( 'Social Media', 'printera' ),
				'subtitle'     => esc_html__( 'Leave blank to hide icons', 'printera' ),
				'label'   => true,
				'options' => array(
					'facebook'    => '',
					'twitter' => '',
					'instagram'   => '',
					'vimeo'   => '',
					'linkedin'    => '',
					'skype'       => '',
					'youtube'     => '',
					'github'      => '',
				),
			),

		),
	)
);
