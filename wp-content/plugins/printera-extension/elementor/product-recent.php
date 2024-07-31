<?php
/**
 * Widget API: Elementer Recent Product Widget
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Recent Product widget.
 * Elementor widget that displays a Recent Product with the ability to control every
 * aspect of the Recent Product design.
 * @since 1.0.0
 */
class Widget_printera_Recent_Product extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Recent Product widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Recent Product', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Recent Product widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Recent Product', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Recent Product widget icon.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return array( 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve heading widget icon.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Register Recent Product widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Recent Product',
			array(
				'label' => esc_html__( 'Recent Product', 'printera' ),
			)
		);

		$this->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Select Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'product-layout-default' => esc_html__( 'Default', 'printera' ),
				),
				'default' => 'product-layout-default',
			)
		);

		$this->add_control(
			'number-columns',
			array(
				'label'       => esc_html__( 'Number of Columns', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'default' => '4',
			)
		);

		$this->add_control(
			'product-number',
			array(
				'label'       => esc_html__( 'Products Per Pages', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '12',
			)
		);

		$this->add_control(
			'product-order',
			array(
				'label'   => esc_html__( 'Product Order', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => array(
					'DESC' => esc_html__( 'Descending', 'printera' ),
					'ASC'  => esc_html__( 'Ascending', 'printera' ),

				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'recent-Product_style',
			array(
				'label' => esc_html__( 'Recent Product Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-title .post-min-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-title .post-min-title a:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_color',
			array(
				'label'     => esc_html__( 'Category Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-category a' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_hover_color',
			array(
				'label'     => esc_html__( 'Category Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-category a:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_bg_color',
			array(
				'label'     => esc_html__( 'Category BG Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-category a' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'category_bg_hover_color',
			array(
				'label'     => esc_html__( 'Category BG Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-category a:hover' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-excerpt p' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Render Recent Product widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		global $wpml, $product;
	
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$product_per_page = $settings['product-number'];

		$this->add_render_attribute(
			'attribute',
			[
				'class' => ['product-recent' , $settings['style'] ]
			]
		);
		$query = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $product_per_page,
			'orderby'             => 'date',
			'order'               => 'desc',
			'paged'                => $paged,
		);

		$loop = new \WP_Query($query); ?>
		
			<div <?php echo $this->get_render_attribute_string( "attribute" ); ?> id="product-Recent">
				<div class="products columns-<?php echo $settings["number-columns"]; ?>">
					<?php if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
								if( $settings['style'] == "product-layout-default" ){
									wc_get_template_part( 'content', 'product' );
								}
							endwhile;
					} else {
						echo esc_html__( 'No products found' );
					} ?>
				</div>
			</div>
			<?php
				if ( $loop->max_num_pages > 1 ) :
					echo '<div class="recent-viewall">';
						echo '<a href="'. wc_get_page_permalink( 'shop' ) .'" id="printera_loadmore" class="btn btn-primary">View All Products</a>'; // you can use <a> as well
					echo '</div>';
				endif;
			?>
			<!-- <div class="col-md-12 col-sm-12">
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation">
						<?php $total_pages = $loop->max_num_pages;
						if ( $total_pages > 1 ) {
							$current_page = max( 1, get_query_var( 'paged' ) );
							echo paginate_links(
								array(
									'base'      => get_pagenum_link( 1 ) . '%_%',
									'format'    => '/page/%#%',
									'current'   => $current_page,
									'total'     => $total_pages,
									'type'      => 'list',
									'prev_text' => wp_kses( '<span aria-hidden="true"></span>', 'printera' ),
									'next_text' => wp_kses( '<span aria-hidden="true"></span>', 'printera' ),
								)
							);
						}; ?>
					</nav>
				</div>
			</div> -->
		<?php wp_reset_postdata(); ?>
		<!-- echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -->
		<?php

	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_printera_Recent_Product() );
