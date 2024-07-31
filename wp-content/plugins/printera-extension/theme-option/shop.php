<?php
/**
 * Shop Options
 *
 * @package printera
 * @subpackage Core
 * @since printera 1.0
 * @version 1.0
 */

Redux::setSection(
	'printera_options',
	array(
		'title'            => esc_html__( 'Shop', 'printera' ),
		'id'               => 'shop-redux',
		'icon'             => 'el el-quotes',
		'customizer_width' => '500px',
	)
);
Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Shop Page', 'printera' ),
		'id'         => 'shop-page-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for Shop.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'shop-page-display',
				'type'    => 'select',
				'title'   => esc_html__( 'Shop page display', 'printera' ),
				'options' => array(
					'products' => 'Show Products',
					'categories' => 'Show Categories',
					'both' => 'Show Products & Categories',
				),
				'default' => 'products',
			),

			array(
				'id'      => 'category-page-display',
				'type'    => 'select',
				'title'   => esc_html__( 'Category display', 'printera' ),
				'options' => array(
					'products' => 'Show Products',
					'subcategories' => 'Show Subcategories',
					'both' => 'Show Products & Subcategories',
				),
				'default' => 'products',
			),

			array(
				'id'      => 'shop-layout',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Products List Style', 'printera' ),
				'options' => array(
					'left' => array(
						'title' => esc_html__( 'Left Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/shop_02.jpg',
					),
					
					'right' => array(
						'title' => esc_html__( 'Right Sidebar', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/shop_01.jpg',
					),
					
					'full' => array(
						'title' => esc_html__( 'Full Width', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/shop_03.jpg',
					),
					'offside-left' => array(
						'title' => esc_html__( 'Off Sidebar Left', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/shop_05.jpg',
					),
					'offside-right' => array(
						'title' => esc_html__( 'Off Sidebar Right', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/shop_04.jpg',
					),
				),
				'default' => 'right',
			),
			array(
				'id'    => 'num-product-page',
				'type'  => 'text',
				'title' => esc_html__( "Number of Products Displayed per Page", 'printera' ),
				'default' => '12',
			),
			array(
				'id'    => 'num-product-row',
				'type'  => 'slider',
				'title' => esc_html__( "Number of Products Per Row", 'printera' ),
				"default"   => 4,
				"min"       => 2,
				"step"      => 1,
				"max"       => 6,
			),

			array(
				'id'      => 'product-layout',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Product Layout', 'printera' ),
				'options' => array(
					'product-layout-default' => array(
						'title' => esc_html__( 'Default', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/product_1.jpg',
					),
				),
				'default' => 'product-layout-default',
			),

			array(
				'id'      => 'products-desciption',
				'type'    => 'switch',
				'title'   => esc_html__( 'Product Hover Description' ),
					'on'  => 'True',
					'off' => 'False',
				'default' => 0,
			),

			array(
				'id'       => 'product-view-mode',
				'type'     => 'button_set',
				'title'    => esc_html__('Product View Mode', 'printera'),
				'options' => array(
					'1' => 'Grid / List', 
					'2' => 'List / Grid', 
					'3' => 'Grid Only',
					'4' => 'List Only',
					'5' => 'Sort Only'
				 ), 
				'default' => '1'
			),


			/* array(
				'id'      => 'product-hover-style',
				'type'    => 'select',
				'title'   => esc_html__( 'Product Hover Style', 'printera' ),
				'options' => array(
					'fade' => 'Fade Effect',
					'zoom' => 'Zoom Effect',
				),
				'default' => 'fade',
			), */

			array(
				'id'      => 'product-pagination',
				'type'    => 'select',
				'title'   => esc_html__( 'Select Product Pagination', 'printera' ),
				'options' => array(
					'default' => 'Default Pagination',
					'infinite' => 'Infinite Scroll',
					'ajax' => 'Ajax Load Button',
				),
				'default' => 'default',
			),

			array(
				'id'        => 'ajax-loader',
				'type'      => 'media',
				'url'       => false,
				'title'     => esc_html__( 'Shop Page Ajax Loader Image', 'printera' ),
				'read-only' => false,
				'default'   => array( 'url' => plugin_dir_url( __DIR__ ) . '/assets/images/loader.gif' ),
				'required' => array( 'product-load', 'equals', array('ajax','infinite') ),
			),

			array(
				'id'    => 'load-more-btn-text',
				'type'  => 'text',
				'title' => esc_html__( 'Load More Button Text', 'printera' ),
				'default' => 'Load More',
				'required' => array( 'product-load', 'equals', array('ajax','infinite') ),
			),

			array(
				'id'    => 'load-more-end-text',
				'type'  => 'text',
				'title' => esc_html__( 'Load More End Text', 'printera' ),
				'default' => 'No More Products',
				'required' => array( 'product-load', 'equals', array('ajax','infinite') ),
			),

			array(
				'id'      => 'products-sale-text',
				'type'    => 'switch',
				'title'   => esc_html__( 'Products Text Sale / Percentage ( sale / 10% )', 'printera' ),
					'on'  => 'Text',
					'off' => 'Value',
				'default' => 0,
			),

			array(
				'id'      => 'products-masonry',
				'type'    => 'switch',
				'title'   => esc_html__( 'Display Products With Masonry', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),

			array(
				'id'      => 'products-wishlist-button',
				'type'    => 'switch',
				'title'   => esc_html__( 'Product Wishlist', 'printera' ),
					'on'  => 'Custom',
					'off' => 'Default',
				'default' => 1,
			),

			array(
				'id'      => 'products-wishlist',
				'type'    => 'switch',
				'title'   => esc_html__( 'Wishlist', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
				'required' => array( 'products-wishlist-button', '=', 1 ),
			),
			

			array(
				'id'      => 'products-compare-button',
				'type'    => 'switch',
				'title'   => esc_html__( 'Product Compare', 'printera' ),
					'on'  => 'Custom',
					'off' => 'Default',
				'default' => 1,
			),

			array(
				'id'      => 'products-compare',
				'type'    => 'switch',
				'title'   => esc_html__( 'Compare', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
				'required' => array( 'products-compare-button', '=', 1 ),
			),
			
			array(
				'id'      => 'products-quick-view',
				'type'    => 'switch',
				'title'   => esc_html__( 'Quick View', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'products-catalog-mode',
				'type'    => 'switch',
				'title'   => esc_html__( 'Catalog Mode', 'printera' ),
				'on'  => 'On',
				'off' => 'Off',
				'default' => 0,
			),

			array(
				'id'      => 'estimate-shiping',
				'type'    => 'switch',
				'title'   => esc_html__( 'Display Estimated Delivery / Free Shipping', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),
			
			


			/* array(
				'id'      => 'opt-author',
				'type'    => 'checkbox',
				'title'   => esc_html__( 'Shop Page Meta Option', 'printera' ),
				// Must provide key => value pairs for multi checkbox options.
				'options' => array(
					'1' => 'Category',
					'2' => 'Author',
					'3' => 'Comment',
				),
				// See how std has changed? you also don't need to specify opts that are 0.
				'default' => array(
					'1' => '1',
					'2' => '1',
					'3' => '1',
				),
			), */

			/* array(
				'id'      => 'shop-pagination',
				'type'    => 'switch',
				'title'   => esc_html__( 'Pagination', 'printera' ),
				'options' => array(
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				),
				'default' => esc_html__( 'on', 'printera' ),
			), */

		),
	)
);
Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Product Single Page', 'printera' ),
		'id'         => 'shop-singal-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for Single Shop.', 'printera' ),
		'fields'     => array(

			array(
				'id'      => 'product-thumbnail-slider',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Select Product Thumbnail to display', 'printera' ),
				'options' => array(
					'thumbnail-slider-style1' => array(
						'title' => esc_html__( 'Product Style 1', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/product-style-1.jpg',
					),
					'thumbnail-slider-style2' => array(
						'title' => esc_html__( 'Product Style 2', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/product-style-2.jpg',
					),
					'thumbnail-slider-style3' => array(
						'title' => esc_html__( 'Product Style 3', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/product-style-3.jpg',
					),
				),
				'default' => 'thumbnail-slider-style1',
			),

			array(
				'id'      => 'singal-slider-style1',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Select Product Thumb to display', 'printera' ),
				'required' => array( 'product-thumbnail-slider', 'equals', array('thumbnail-slider-style1') ),
				'options' => array(
					'left-slider' => array(
						'title' => esc_html__( 'Thumbnail Left Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/thumb-slide-left.jpg',

					),
					'bottom-slider' => array(
						'title' => esc_html__( 'Thumbnail Bottom Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/thumb-slide-bottom.jpg',

					),
					'right-slider' => array(
						'title' => esc_html__( 'Thumbnail Right Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/thumb-slide-right.jpg',
					),
					'no-slider' => array(
						'title' => esc_html__( 'No Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/no-thumb-slide.jpg',
					),
				),
				'default' => 'left-slider',
			),
			array(
				'id'      => 'singal-slider-style2',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Select Product Thumb to display', 'printera' ),
				'required' => array( 'product-thumbnail-slider', 'equals', array('thumbnail-slider-style2') ),
				'options' => array(
					'left-slider' => array(
						'title' => esc_html__( 'Left Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/thumb-slide-left.jpg',

					),
					'right-slider' => array(
						'title' => esc_html__( 'Right Slider', 'printera' ),
						'img'   => plugin_dir_url( __DIR__ ) . '/assets/images/thumb-slide-right.jpg',
					),
				),
				'default' => 'left-slider',
			),
			
			array(
				'id'      => 'slider-infinite-loop',
				'type'    => 'switch',
				'title'   => esc_html__( 'Slider Infinite Loop', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),
			
			array(
				'id'      => 'arrow-on-slider',
				'type'    => 'switch',
				'title'   => esc_html__( 'Arrow on Slider', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'arrow-on-thumbnails',
				'type'    => 'switch',
				'title'   => esc_html__( 'Arrow on Thumbnails', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'light-box',
				'type'    => 'switch',
				'title'   => esc_html__( 'Light Box', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'zoom-style',
				'type'    => 'switch',
				'title'   => esc_html__( 'Zoom style', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),

			array(
				'id'      => 'products-wishlist-detail',
				'type'    => 'switch',
				'title'   => esc_html__( 'Wishlist', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
				'required' => array( 'products-wishlist-button', '=', 1 ),
			),

			array(
				'id'      => 'products-compare-detail',
				'type'    => 'switch',
				'title'   => esc_html__( 'Compare', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 0,
			),

			array(
				'id'      => 'single-estimate-shiping',
				'type'    => 'switch',
				'title'   => esc_html__( 'Display Estimated Delivery / Free Shipping', 'printera' ),
					'on'  => 'On',
					'off' => 'Off',
				'default' => 1,
			),
			
			/* array(
				'id'      => 'shop-singal-meta',
				'type'    => 'switch',
				'title'   => esc_html__( 'Shop Meta', 'printera' ),
				'options' => array(
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				),
				'default' => esc_html__( 'off', 'printera' ),
			),

			array(
				'id'       => 'shop-singal-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Shop Singal Social Share', 'printera' ),
				'required' => array( 'shop-singal-meta', '=', 'on' ),
				'options'  => array(
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				),
				'default'  => esc_html__( 'off', 'printera' ),
			), */

			/* array(
				'id'      => 'shop-comment',
				'type'    => 'switch',
				'title'   => esc_html__( 'Comments', 'printera' ),
				'options' => array(
					'on'  => esc_html__( 'On', 'printera' ),
					'off' => esc_html__( 'Off', 'printera' ),
				),
				'default' => esc_html__( 'on', 'printera' ),
			), */
		),
	)
);

Redux::setSection(
	'printera_options',
	array(
		'title'      => esc_html__( 'Cart Page', 'printera' ),
		'id'         => 'shop-cart-opt',
		'subsection' => true,
		'desc'       => esc_html__( 'This section contains options for Single Shop.', 'printera' ),
		'fields'     => array(
			array(
				'id'      => 'product-cart-style',
				'type'    => 'select',
				'title'   => esc_html__( 'Select Cart Page', 'printera' ),
				'options' => array(
					'style-1' => 'Cart Default',
					'style-2' => 'Cart Morden',
				),
				'default' => 'style-1',
			),
		),
	),
);