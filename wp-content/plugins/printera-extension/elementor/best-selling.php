<?php
/**
 * Widget API: Elementer Best Selling Widget
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
 * Elementor Best Selling widget.
 * Elementor widget that displays a Best Selling with the ability to control every
 * aspect of the Best Selling design.
 * @since 1.0.0
 */
class Widget_Best_selling extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Best Selling widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Best Selling', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Best Selling widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Best Selling', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Best Selling widget icon.
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
	 * Register Best Selling widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Best Selling',
			array(
				'label' => esc_html__( 'Best Selling', 'printera' ),
			)
		);

		$this->add_control(
			'row-style',
			array(
				'label'   => esc_html__( 'Carousel Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'row-01' => esc_html__( 'Row 1', 'printera' ),
					'row-02' => esc_html__( 'Row 2 [ More Than 4 Product ]', 'printera' ),
				),
				'default' => 'row-01',
			)
		);

		$this->add_control(
			'hover-style',
			array(
				'label'   => esc_html__( 'Hover Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'hover-01' => esc_html__( 'Hover List', 'printera' ),
					'hover-02' => esc_html__( 'Hover Grid', 'printera' ),
				),
				'default' => 'hover-01',
			)
		);

		$this->add_control(
			'trending-title',
			array(
				'label'       => esc_html__( 'Title', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default' => esc_html__( 'Best Sellings', 'printera' ),
			)
		);

		$this->add_control(
			'product-number',
			array(
				'label'       => esc_html__( 'Products per Page', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '5',
			)
		);

		$this->add_control(
			'display-stock',
			array(
				'label'     => esc_html__( 'Display Stock', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'nora' ),
					'no' => esc_html__( 'No', 'nora' ),
				),
				'default' => 'no',
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

		$this->add_control(
			'direction',
			array(
				'label'   => esc_html__( 'Direction', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => array(
					'horizontal' => esc_html__( 'Horizontal', 'printera' ),
					'vertical' => esc_html__( 'Vertical', 'printera' ),
				),
				'default' 	=> 'horizontal',
			)
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'owl',
			array(
				'label'     => esc_html__( 'Carousel', 'printera' ),
			)
		);

		$this->add_control(
			'desk-number',
			array(
				'label'       => esc_html__( 'Desktop', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '5',
			)
		);

		$this->add_control(
			'laptop-number',
			array(
				'label'       => esc_html__( 'Laptop', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '4',
			)
		);

		$this->add_control(
			'tablet-number',
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
			'mobile-number',
			array(
				'label'       => esc_html__( 'Mobile', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '2',
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'     => esc_html__( 'Autoplay', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
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
				'default'   => 'false',
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
				'default'   => '1000',
				
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'title_font',
			array(
				'label' => esc_html__( 'Section Title Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'label' => esc_html__( 'Desciption Font', 'printera' ),
				'selector' => '{{WRAPPER}} .product-title p',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_title_color',
				'label' => esc_html__( 'Heading Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .title-wrap .product-title .section-heading',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography_1',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .product .woocommerce-loop-product__title',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'Best Selling_style',
			array(
				'label' => esc_html__( 'Best Selling Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_title_color',
			array(
				'label'     => esc_html__( 'Heading Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title-wrap .product-title .section-heading' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'heading_border_color',
			array(
				'label'     => esc_html__( 'Heading Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  #product-deal-week .title-wrap .timer-date > div' => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pogress_bar_color',
			array(
				'label'     => esc_html__( 'pograsbar Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .progress-bar span' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .woocommerce-loop-product__title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product:hover .woocommerce-loop-product__title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'price_color',
			array(
				'label'     => esc_html__( 'Price Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .price' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'addtocard_color',
			array(
				'label'     => esc_html__( 'Add to Card Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button::after' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'product_hover_icon',
			array(
				'label'     => esc_html__( 'Product Icon Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button-wrap .btn-hv a:hover::before' => 'color: {{VALUE}};',
				),
			)
		);
		

		$this->end_controls_section();
	}

	/**
	 * Render Best Selling widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		global $wpml, $product;
		
		$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		/* $this->add_render_attribute(
			'category-carousel',
			[
				'class' => ['swiper productbest-sellingg' ]
			]
		); */

		$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
		$this->add_render_attribute( 'carousel-setting', 'data-dots', $settings['dots'] );
		$this->add_render_attribute( 'carousel-setting', 'data-nav', $settings['arrow'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk-number'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop-number'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet-number'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile-number'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay', $settings['autoplay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );

		$product_per_page = $settings['product-number'];

		$stock = '';
		if( $settings['display-stock'] == 'no'){
			$stock = 'no-stock';
		}

		$this->add_render_attribute(
			'attribute',
			[
				'class' => ['product-best-selling' , $settings['row-style'] , $stock ]
			]
		);

		$i=1;

		?>
				<div <?php echo $this->get_render_attribute_string( 'attribute' ); ?> id="product-best-selling">

					<div class="title-wrap">
						<?php if( ! empty( $settings['trending-title'] ) ){ ?>
							<div class="product-title">
								<h3 class="section-heading"><?php echo $settings['trending-title']; ?></h3>
							</div>
						<?php } ?>
					</div>
					<div class="sell-wrap">
						<div class="swiper products-best-sell best-selling best-sell <?php echo $settings['hover-style']; ?>" data-id = "best-selling" id = "best-selling" >
							<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >

								<?php	
								$devide = 1;	
								$query = array(
									'post_type'           => 'product',
									'post_status'         => 'publish',
									'ignore_sticky_posts' => 1,
									'posts_per_page'      => $product_per_page,
									'meta_key' 			  => 'total_sales',
									'order'               => 'desc',
									'orderby' 			  => 'meta_value_num',
									'paged'               => $paged,
								);
								$loop = new \WP_Query($query);
								$count = $loop->found_posts;
								
								if ( $loop->have_posts() ) {
									while ( $loop->have_posts() ) : $loop->the_post();


									if( $count < 4 || $settings['row-style'] == "row-01" ){
										echo '<div class="swiper-slide row-01">';
									}

										if( $count >= 4 && $settings['row-style'] == "row-02"){

											if( $devide%2 != 0 ){
												echo '<div class="swiper-slide row-02">';
												echo '<div class="item">';
											}

												wc_get_template_part( 'content', 'product' );
												
											if( $devide%2 == 0 ){
												echo '</div>';
												echo '</div>';
												$devide = 0;
											}

										}else{
											wc_get_template_part( 'content', 'product' );
										}

										
									if( $count < 4 || $settings['row-style'] == "row-01" ){
										echo '</div>';
									}
					
									$devide++;
									endwhile;
									
									if( $devide%2 == 0 &&  $count >= 8 ){
										echo '</div>';
										echo '</div>';
									}

								} else {
									echo esc_html__( 'No products found' );
								}
								wp_reset_postdata();
								?>
							</div>
						</div> <!-- #best-selling -->
						<?php
							if( $settings['dots'] == "true"){
						?>
							<div class="swiper-pagination"></div>
						<?php
							}
						?>
						<?php
							if( $settings['arrow'] == "true"){
						?>
							<div class="swiper-navigation">
								<div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
								<div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
							</div>
						<?php
							}
						?>
					</div>		
				</div>
		<!-- echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('products-best-sell') ){

						$this = jQuery('.swiper.products-best-sell');

						var direction = $this.find( '.swiper-wrapper' ).data('direction');
						var desktop = $this.find( '.swiper-wrapper' ).data('desk');
						var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
						var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
						var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
						var autoplay = $this.find( '.swiper-wrapper' ).data('autoplay');
						var loop = $this.find( '.swiper-wrapper' ).data('loop');
						var speed = $this.find( '.swiper-wrapper' ).data('speed');
						var margin = $this.find( '.swiper-wrapper' ).data('margin');

						var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
						var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
						var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";

						mySwiper = new Swiper('.swiper.products-best-sell', {
							direction: direction,
							spaceBetween: margin,
							loop: loop,
							autoplay: autoplay,
							speed : speed,
							breakpoints: {
								// breakpoint from 480 up
								0: {
									slidesPerView: mobile,
								},
								// breakpoint from 576 up
								576: {
									slidesPerView: mobile,
								},
								// breakpoint from 992 up
								992: {
									slidesPerView: tablet,
								},
								// breakpoint from 1200 up
								1200: {
									slidesPerView: laptop,
								},
								// breakpoint from 1400 up
								1400: {
									slidesPerView: desktop,
								}
							},
							pagination: {
								el: pagination,
								clickable: true,
							},
							navigation: {
								nextEl: next,
								prevEl: prev,
							},
						});

				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Best_selling() );
