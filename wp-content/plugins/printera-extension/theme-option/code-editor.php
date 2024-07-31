<?php
/*
 * CSS Code Options
 */
Redux::setSection(
	'printera_options',
	array(
		'title'  => esc_html__( 'Custom Code', 'printera' ),
		'id'     => 'code',
		'icon'   => 'el el-css',
		'desc'   => esc_html__( 'This section contains options for Code.', 'printera' ),
		'fields' => array(

			array(
				'id'       => 'css-code',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Header CSS Code', 'printera' ),
				'subtitle' => esc_html__( 'Paste your css code here.', 'printera' ),
				'mode'     => 'css',
				'desc'     => esc_html__( 'Paste your custom CSS code here.  It set before </head> tag.', 'printera' ),
				'default'  => '',
			),

			array(
				'id'       => 'js-header-code',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Header JS Code', 'printera' ),
				'subtitle' => esc_html__( 'Paste your js code in header.', 'printera' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => esc_html__( 'Paste your custom JS code here.  It set before </head> tag.', 'printera' ),
				'default'  => "jQuery(document).ready(function($){\n\n})",
			),

			array(
				'id'       => 'js-code',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Footer JS Code', 'printera' ),
				'subtitle' => esc_html__( 'Paste your js code in footer.', 'printera' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => esc_html__( 'Paste your custom JS code here. It set before </footer> tag.', 'printera' ),
				'default'  => "jQuery(document).ready(function($){\n\n})",
			),

		),
	)
);
