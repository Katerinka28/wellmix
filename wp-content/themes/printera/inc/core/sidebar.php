<?php
/**
 * printera custom sidebar
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function printera_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'printera' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'printera' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'printera' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'printera' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'printera' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'printera' ),
			'id'            => 'shop',
			'description'   => esc_html__( 'Add widgets here.', 'printera' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'printera_widgets_init' );
