<?php
/**
 * Blog Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'            => esc_html__( 'Blog', 'printera' ),
		'id'               => 'blog-redux',
		'icon'             => 'el el-quotes',
		'customizer_width' => '500px',
	)
);
Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Blog Page', 'printera' ),
		'id'         => 'blog-page-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for Blog Page.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'blog-alignment',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Blog Page Layout', 'printera' ),
				'options' => array(
					'blog-left' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/left-side.jpg',
					),

					'blog-right' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/right-side.jpg',
					),
					
					'blog-full' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/single-column.jpg',
					),
				),
				'default' => 'blog-right',
			),

			array(
				'id'      => 'opt-author',
				'type'    => 'checkbox',
				'title'   => esc_html__( 'Blog Post Meta Option', 'printera' ),
				// Must provide key => value pairs for multi checkbox options.
				'options' => array(
					'1' => 'Category',
					'2' => 'Author',
					'3' => 'Comment',
					'4' => 'Date',
				),
				// See how std has changed? you also don't need to specify opts that are 0.
				'default' => array(
					'1' => '1',
					'2' => '1',
					'3' => '1',
					'4' => '1',
				),
			),

			array(
				'id'      => 'blog-pagination',
				'type'    => 'select',
				'title'   => esc_html__( 'Select Blog Pagination', 'printera' ),
				'options' => array(
					'1' => 'Default Pagination',
					'2' => 'Infinite Scroll',
					'3' => 'Ajax Load Button',
				),
				'default' => '1',
			),

			array(
				'id'      => 'blog-masonry',
				'type'    => 'switch',
				'title'   => esc_html__( 'Display Blog With Masonry', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),
			

		),
	)
);
Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Single Page', 'printera' ),
		'id'         => 'blog-singal-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for Single Page.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'blog-singal-alignment',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Blog Single Alignment', 'printera' ),
				'options' => array(
					
					'single-blog-left' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/left-side.jpg',
					),
					'single-blog-right' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/right-side.jpg',
					),
					'single-blog-full' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/single-column.jpg',
					),
				),
				'default' => 'single-blog-right',
			),

			array(
				'id'      => 'blog-comment',
				'type'    => 'switch',
				'title'   => esc_html__( 'Comments', 'printera' ),
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				'default' => 1,
			),

		),
	)
);

