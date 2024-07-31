<?php
/**
 * Widget API: Elementer Deal Of The Day Widget
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
 * Elementor Deal Of The Day widget.
 * Elementor widget that displays a Deal Of The Day with the ability to control every
 * aspect of the Deal Of The Day design.
 * @since 1.0.0
 */
class Widget_printera_DealOf_TheDay extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Deal Of The Day widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Deal Of The Day', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Deal Of The Day widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Deal Of The Day', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Deal Of The Day widget icon.
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
	 * Register Deal Of The Day widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Deal Of The Day',
			array(
				'label' => esc_html__( 'Deal Of The Day', 'printera' ),
			)
		);

		$this->add_control(
			'hover-style',
			array(
				'label'   => esc_html__( 'Hover Style', 'printera' ),
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
			'carousel',
			array(
				'label'     => esc_html__( 'Carousel', 'printera' ),
			)
		);

		$this->add_control(
			'desk',
			array(
				'label'       => esc_html__( 'Desktop', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '3',
			)
		);

		$this->add_control(
			'laptop',
			array(
				'label'       => esc_html__( 'Laptop', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '3',
			)
		);

		$this->add_control(
			'tablet',
			array(
				'label'       => esc_html__( 'Tablet', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '3',
			)
		);

		$this->add_control(
			'mobile',
			array(
				'label'       => esc_html__( 'Mobile', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '3',
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'     => esc_html__( 'Autoplay', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'false',
				'options'   => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),
				),
			)
		);

		$this->add_control(
			'loop',
			array(
				'label'     => esc_html__( 'Loop', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'options'   => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),
				),
			)
		);

		$this->add_control(
			'center',
			array(
				'label'     => esc_html__( 'Center', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'options'   => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),
				),
			)
		);

		$this->add_control(
			'dots',
			array(
				'label'     => esc_html__( 'Dots', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'options'   => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),
				),
			)
		);

		$this->add_control(
			'arrow',
			array(
				'label'     => esc_html__( 'Arrow', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'options'   => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),
				),
			)
		);

		$this->add_control(
			'margin',
			array(
				'label'     => esc_html__( 'Margin', 'printera' ),
				'type'      => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
					],
				],
				'default'   => array(
					'size' => 15,
				),
			)
		);
		
		$this->add_control(
			'speed',
			array(
				'label'     => esc_html__( 'Speed', 'printera' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '1500',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'recent-Product_style',
			array(
				'label' => esc_html__( 'Deal Of The Day Style', 'printera' ),
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
	 * Render Deal Of The Day widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		global $wpml, $product;

		// $this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-dots', $settings['dots'] );
		$this->add_render_attribute( 'carousel-setting', 'data-nav', $settings['arrow'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay', $settings['autoplay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-center', $settings['center'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );
	
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$product_per_page = $settings['product-number'];

		$this->add_render_attribute(
			'attribute',
			[
				'class' => ['swiper gallery-top' , $settings['hover-style'] ]
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

			'meta_query' => array(
				array(
					'key' 	  => 'custom_checkbox_field',
					'compare' => '=',
					'value'   => 'yes',
				),
				array(
					'key' 	  => '_sale_price_dates_from',
					'compare' => '!=',
					'value'   => '',
				),
				array(
					'key' 	  => '_sale_price_dates_to',
					'compare' => '!=',
					'value'   => '
					',
				),
			),
			
		);

		$loop = new \WP_Query($query); ?>
		
		<div class="section-deal-of-day">
			<div class="swiper gallery-thumbs product-deal" data-id = "product-deal" id="product-deal">
				<div class="swiper-wrapper"  <?php echo $this->get_render_attribute_string( "carousel-setting" ); ?>>
					<?php if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();

								echo '<div class="swiper-slide">';
									
									global $product;
									$attachment_ids = $product->get_gallery_image_ids();
									foreach( $attachment_ids as $attachment_id ) {
										// Display Image instead of URL
										echo wp_get_attachment_image($attachment_id, 'full');
										break;
									}
								
								echo '</div>';
									
							endwhile;
					} else {
						echo esc_html__( 'No products found' );
					} ?>
				</div>
			</div>
			<div <?php echo $this->get_render_attribute_string( 'attribute' ); ?> data-id = "product-deal" id="product-deal">

				<div class="swiper-wrapper product-deal"  <?php echo $this->get_render_attribute_string( "carousel-setting" ); ?>>
					<?php if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();

								echo '<div class="swiper-slide">';

									if( $settings['hover-style'] == "product-layout-default" ){
										global $product;
										wc_get_template_part( 'content', 'product' );
									}else{
										wc_get_template_part( 'content', 'product-classic' );
									}
								echo '</div>';
									
							endwhile;
					} else {
						echo esc_html__( 'No products found' );
					} ?>

				</div>

				<div class="swiper-navigation special-navigation">
					<div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></div>
					<div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div>
				</div>
				
			</div>
		</div>
		
		
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
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('product-deal') ){
					
						var galleryTop = new Swiper('.gallery-top', {
						// direction: "vertical",
						// effect: "cards",
						grabCursor: true,
						spaceBetween: 30,
						pagination: {
							el: ".swiper-pagination",
							type: "progressbar",
						},
						navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
						},
						// loop: true,
						loopedSlides: 1
					});

					var galleryThumbs = new Swiper('.gallery-thumbs', {
						spaceBetween: 30,
						centeredSlides: true,
						slidesPerView: 'auto',
						touchRatio: 0.2,
						slideToClickedSlide: true,
						// loop: true,
						loopedSlides: 1
						
					});
					galleryTop.controller.control = galleryThumbs;
					galleryThumbs.controller.control = galleryTop;
				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_printera_DealOf_TheDay() );
