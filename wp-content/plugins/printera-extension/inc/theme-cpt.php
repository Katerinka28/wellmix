<?php
/**
 * printera custom post type
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * Register Testimonial
 */
function printera_testimonial_post() {
	$labels = array(
		'name'                  => esc_html__( 'Testimonial', 'printera' ),
		'singular_name'         => esc_html__( 'Testimonial', 'printera' ),
		'featured_image'        => esc_html__( 'Image', 'printera' ),
		'set_featured_image'    => esc_html__( 'Set Image', 'printera' ),
		'remove_featured_image' => esc_html__( 'Remove Image', 'printera' ),
		'use_featured_image'    => esc_html__( 'Use as Image', 'printera' ),
		'menu_name'             => esc_html__( 'Testimonial', 'printera' ),
		'name_admin_bar'        => esc_html__( 'Testimonial', 'printera' ),
		'add_new'               => esc_html__( 'Add New', 'printera' ),
		'add_new_item'          => esc_html__( 'Add New Testimonial', 'printera' ),
		'new_item'              => esc_html__( 'New Testimonial', 'printera' ),
		'edit_item'             => esc_html__( 'Edit Testimonial', 'printera' ),
		'view_item'             => esc_html__( 'View Testimonial', 'printera' ),
		'all_items'             => esc_html__( 'All Testimonials', 'printera' ),
		'search_items'          => esc_html__( 'Search Testimonial', 'printera' ),
		'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'printera' ),
		'not_found'             => esc_html__( 'No Testimonials found.', 'printera' ),
		'not_found_in_trash'    => esc_html__( 'No Testimonials found in Trash.', 'printera' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tt-testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'tt-testimonial', $args );
}
add_action( 'init', 'printera_testimonial_post' );

/**
 * Brands taxonomies for product
 */

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_brand_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_brand_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
		'name' => esc_html_x( 'Brands', 'taxonomy general name' ),
		'singular_name' => esc_html_x( 'Brand', 'taxonomy singular name' ),
		'search_items' =>  esc_html__( 'Search Brands' ),
		'all_items' => esc_html__( 'All Brands' ),
		'parent_item' => esc_html__( 'Parent Brand' ),
		'parent_item_colon' => esc_html__( 'Parent Brand:' ),
		'edit_item' => esc_html__( 'Edit Brand' ), 
		'update_item' => esc_html__( 'Update Brand' ),
		'add_new_item' => esc_html__( 'Add New Brand' ),
		'new_item_name' => esc_html__( 'New Brand Name' ),
		'menu_name' => esc_html__( 'Brands' ),
	);    
 
	// Now register the taxonomy
	register_taxonomy('brand',array('product'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite'           => array( 'slug' => 'brand' ),
        'supports'          => array( 'thumbnail' ),
	));
 
}

/**
 * Register Portfolio
 */
function tt_portfolio_post() {
	$labels = array(
		'name'                  => esc_html__( 'Portfolio', 'printera' ),
		'singular_name'         => esc_html__( 'Portfolio', 'printera' ),
		'featured_image'        => esc_html__( 'Image', 'printera' ),
		'set_featured_image'    => esc_html__( 'Set Image', 'printera' ),
		'remove_featured_image' => esc_html__( 'Remove Image', 'printera' ),
		'use_featured_image'    => esc_html__( 'Use as Image', 'printera' ),
		'menu_name'             => esc_html__( 'Portfolio', 'printera' ),
		'name_admin_bar'        => esc_html__( 'Portfolio', 'printera' ),
		'add_new'               => esc_html__( 'Add New', 'printera' ),
		'add_new_item'          => esc_html__( 'Add New Portfolio', 'printera' ),
		'new_item'              => esc_html__( 'New Portfolio', 'printera' ),
		'edit_item'             => esc_html__( 'Edit Portfolio', 'printera' ),
		'view_item'             => esc_html__( 'View Portfolio', 'printera' ),
		'all_items'             => esc_html__( 'All Portfolios', 'printera' ),
		'search_items'          => esc_html__( 'Search Portfolio', 'printera' ),
		'parent_item_colon'     => esc_html__( 'Parent Portfolio:', 'printera' ),
		'not_found'             => esc_html__( 'No Portfolios found.', 'printera' ),
		'not_found_in_trash'    => esc_html__( 'No Portfolios found in Trash.', 'printera' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tt-portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'tt-portfolio', $args );
}
add_action( 'init', 'tt_portfolio_post' );
