<?php
/**
 * Widget API: Elementer Trending Product Widget
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
 * Elementor Trending Product widget.
 * Elementor widget that displays a Trending Product with the ability to control every
 * aspect of the Trending Product design.
 * @since 1.0.0
 */
class Widget_Trending_Product extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Trending Product widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Trending Product', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Trending Product widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Trending Product', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Trending Product widget icon.
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
	 * Register Trending Product widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Trending Product',
			array(
				'label' => esc_html__( 'Trending Product', 'printera' ),
			)
		);

		$this->add_control(
			'owl-style',
			array(
				'label'   => esc_html__( 'Carousel Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'home-default' => esc_html__( 'Row 1', 'printera' ),
					'home-morden' => esc_html__( 'Row 2', 'printera' ),
				),
				'default' => 'home-default',
			)
		);

		$this->add_control(
			'product-tab',
			array(
				'label'   => esc_html__( 'Product Tab', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'tab-true' => esc_html__( 'True', 'printera' ),
					'tab-false' => esc_html__( 'False', 'printera' ),
				),
				'default' => 'tab-true',
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
				'default' => esc_html__( 'Trending Products', 'printera' ),
			)
		);

		$this->add_control(
			'select-categories',
			array(
				'label' 	=> esc_html__( 'Select Categories', 'printera' ),
				'type' 		=>Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'new-products' => esc_html__( 'New Arrivals', 'printera' ),
					'featured'  => esc_html__( 'Featured Products', 'printera' ),
					'top-selling' => esc_html__( 'Top Selling', 'printera' ),
					'special' => esc_html__( 'Special', 'printera' ),
				],
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
			'Trending Product_style',
			array(
				'label' => esc_html__( 'Trending Product Style', 'printera' ),
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
			'upper-title-color',
			array(
				'label'     => esc_html__( 'Upper Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => array(
					'display-upper-title' => 'yes',
				),
				'selectors' => array(
					'{{WRAPPER}} .product-title .tt-section-sab' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .product .price .amount bdi, .product .price ins' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'tab_color',
			array(
				'label'     => esc_html__( 'Tab Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ui-tabs-nav .ui-tabs-tab.ui-state-active a' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'tab_hover_color',
			array(
				'label'     => esc_html__( 'Tab Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ui-tabs-nav .ui-tabs-tab a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'tab_before_hover_color',
			array(
				'label'     => esc_html__( 'Tab Before Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ui-tabs-nav .ui-tabs-tab:hover a::before' => 'background-color: {{VALUE}};',
				),
			)
		);
		
		$this->add_control(
			'tab_before_color',
			array(
				'label'     => esc_html__( 'Tab Before Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ui-tabs-nav .ui-tabs-tab.ui-state-active a::before' => 'background-color: {{VALUE}};',
				),
			)
		);
$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product-title p' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'product_hover_color',
			array(
				'label'     => esc_html__( 'Product Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button-wrap .btn-hv a::after' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'like_hover_color',
			array(
				'label'     => esc_html__( 'Like Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button-wrap .btn-hv .exists a::before ' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'sale_color',
			array(
				'label'     => esc_html__( 'Sale Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-sale span.label ' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'rating_color',
			array(
				'label'     => esc_html__( 'Rating Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .wrap-rate .star-rating::before ' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'rating__before_color',
			array(
				'label'     => esc_html__( 'Rating before Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .star-rating span::before' => 'color: {{VALUE}};',
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
			'product_hover_icon',
			array(
				'label'     => esc_html__( 'Product Icon Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button-wrap .btn-hv a:hover::before' => 'color: {{VALUE}};',
				),
			)
		);
			$this->add_control(
			'add_to_card_hover',
			array(
				'label'     => esc_html__( 'Add to card Hover 01', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button::after' => 'background: {{VALUE}};',
				),
			)
		);
		
			$this->add_control(
			'add_to_card_after_focus',
			array(
				'label'     => esc_html__( 'Add-to-card After focus', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product-layout-default section.product .cart-wrap .product-button.loading' =>'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'comper_focus',
			array(
				'label'     => esc_html__( 'comper focus', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .product .product-button-wrap .compare a.added' =>  'background-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render Trending Product widget output on the frontend.
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
				'class' => ['swiper product-trending' ]
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
				'class' => ['product-trending' , $settings['owl-style'], $stock ]
			]
		);

		$i=1;

		?>
				<div <?php echo $this->get_render_attribute_string( 'attribute' ); ?> id="product-trending">
					<div class="title-wrap">
						<?php if( ! empty( $settings['trending-title'] ) ){ ?>
							<div class="product-title">
								<h2 class="section-heading"><?php echo $settings['trending-title']; ?></h2>
							</div>
						<?php }
						if( !empty( $settings['select-categories'] ) ){
							if($settings['product-tab'] == "tab-true"){ ?>
								<ul>
									<?php foreach( $settings['select-categories'] as $categories ){
										$title = str_replace("-", " ", $categories);
										$c_title = ucwords( $title ); ?>
										<li><a href="#<?php echo $categories; ?>"><?php esc_html_e($c_title, 'printera'); ?></a></li>
									<?php } ?>
								</ul>
							<?php
							}
						} ?>
					</div>
					<?php 
					if( !empty( $settings['select-categories'] ) ){
						foreach( $settings['select-categories'] as $categories ){
							if( $categories == 'featured' ) { ?>
							<div class="product-main" id = "featured">
								<div class="swiper products-trending featured product-swiper" data-id = "featured" >
									<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >

										<?php
										$devide = 1;
										$tax_query[] = array(
											'taxonomy' => 'product_visibility',
											'field'    => 'name',
											'terms'    => 'featured',
											'operator' => 'IN', // or 'NOT IN' to exclude feature products
										);
										$featured = array(
											'post_type'           => 'product',
											'post_status'         => 'publish',
											'ignore_sticky_posts' => 1,
											'posts_per_page'      => $product_per_page,
											'orderby'             => 'date',
											'order'               => 'desc',
											'tax_query'           => $tax_query 
										);
										$loop = new \WP_Query($featured);
										$count = $loop->found_posts;

										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();

												echo '<div class="swiper-slide">';

													if( $count >= 10 && $settings['owl-style'] == "home-morden"){
														if( $devide%2 != 0 ){
															echo '<div class="item">';
														}
															
															wc_get_template_part( 'content', 'product' );
															
														if( $devide%2 == 0 ){
															echo '</div>';
															$devide = 0;
														}
													} else {
														
														wc_get_template_part( 'content', 'product' );
														
													}

												echo '</div>';
							
											$devide++;
											endwhile;
											if( $devide%2 == 0 &&  $count >= 10 && $settings['owl-style'] == "home-morden"){
												echo '</div>';
											}
										} else {
											echo esc_html__( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
									</div>
								</div><!-- #featured -->
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
							<?php }elseif( $categories == 'new-products' ){ ?>
							<div class="product-main" id = "new-products">
								<div class="swiper products-trending new-products product-swiper" data-id = "new-products" >
									<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >

										<?php
										$devide = 1;		
										$new_products = array(
											'post_type' 	 => 'product',
											'posts_per_page' => -1,
											'orderby'        => 'date',
											'order'  		 => 'desc',
											'posts_per_page'      => $product_per_page,
										);
										$loop = new \WP_Query($new_products);
										$count = $loop->found_posts;

										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();
												echo '<div class="swiper-slide">';
													if( $count >= 8 && $settings['owl-style'] == "home-morden"){
									
														if( $devide%2 != 0 ){
															echo '<div class="item">';
														}
															
															wc_get_template_part( 'content', 'product' );
															
									
															/* echo '<span>'.$devide.'</span>'; */
									
														if( $devide%2 == 0 ){
															echo '</div>';
															$devide = 0;
														}
									
													} else {
														if ( class_exists( 'WooCommerce' ) ) {
															
															wc_get_template_part( 'content', 'product' );
															
														}
													}
												echo '</div>';
											$devide++;
											endwhile;
											if( $devide%2 == 0 &&  $count >= 8 && $settings['owl-style'] == "home-morden"){
												echo '</div>';
											}
										} else {
											echo esc_html__( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
									</div>
								</div><!-- #new-products -->
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
							<?php }elseif( $categories == 'top-selling' ){ ?>
							<div class="product-main"  id = "top-selling" >
								<div class="swiper products-trending top-selling product-swiper" data-id = "top-selling">
									<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >

										<?php
										$devide = 1;		
										$top_sell = array(
											'post_type' 		=> 'product',
											'meta_key'  		=> 'total_sales',
											'orderby'   		=> 'meta_value_num',
											'order' 			=> 'desc',
											'posts_per_page'	=> -1,
											'posts_per_page'      => $product_per_page,
										);
										$loop = new \WP_Query($top_sell);
										$count = $loop->found_posts;

										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();
												echo '<div class="swiper-slide">';
													if( $count >= 8 && $settings['owl-style'] == "home-morden"){
									
														if( $devide%2 != 0 ){
															echo '<div class="item">';
														}
															
															wc_get_template_part( 'content', 'product' );
															
															/* echo '<span>'.$devide.'</span>'; */
									
														if( $devide%2 == 0 ){
															echo '</div>';
															$devide = 0;
														}
									
													} else {
														
														wc_get_template_part( 'content', 'product' );
														
													}
												echo '</div>';
											$devide++;
											endwhile;
											if( $devide%2 == 0 &&  $count >= 8 && $settings['owl-style'] == "home-morden"){
												echo '</div>';
											}
										} else {
											echo esc_html__( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
									</div>
								</div><!-- #top-selling -->
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
							<?php }elseif( $categories == 'special' ){ ?>
							<div class="product-main" id = "special">
								<div class="swiper products-trending special product-swiper" data-id = "special" >
									<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >

										<?php	
										$devide = 1;	
										$top_sell = array(
											'post_type' 		=> 'product',
											'posts_per_page'	=> -1,
											'posts_per_page'      => $product_per_page,
											'meta_query'     => array(
												'relation' => 'OR',
												array( // Simple products type
													'key'           => '_sale_price',
													'value'         => 0,
													'compare'       => '>',
													'type'          => 'numeric'
												),
												array( // Variable products type
													'key'           => '_min_variation_sale_price',
													'value'         => 0,
													'compare'       => '>',
													'type'          => 'numeric'
												)
											)
										);
										$loop = new \WP_Query($top_sell);
										$count = $loop->found_posts;
										
										if ( $loop->have_posts() ) {
											while ( $loop->have_posts() ) : $loop->the_post();
												
												echo '<div class="swiper-slide">';
													if( $count >= 8 && $settings['owl-style'] == "home-morden"){
									
														if( $devide%2 != 0 ){
															echo '<div class="item">';
														}
															
															wc_get_template_part( 'content', 'product' );
															
															/* echo '<span>'.$devide.'</span>'; */
									
														if( $devide%2 == 0 ){
															echo '</div>';
															$devide = 0;
														}
									
													} else {
														wc_get_template_part( 'content', 'product' );
													}
												echo '</div>';
							
											$devide++;
											endwhile;
											if( $devide%2 == 0 &&  $count >= 10 && $settings['owl-style'] == "home-morden"){
												echo '</div>';
											}
										} else {
											echo esc_html__( 'No products found' );
										}
										wp_reset_postdata();
										?>
									
									</div>
								</div> <!-- #special -->
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
							<?php }
						} 
					} ?>
				</div>
		<!-- echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -->
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('products-trending') ){

						$this = jQuery('.swiper.products-trending');

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

						mySwiper = new Swiper('.swiper.products-trending', {
							direction: direction,
							spaceBetween: margin,
							loop: loop,
							autoplay: autoplay,
							speed : speed,
							breakpoints: {
								0: {
									slidesPerView: 	1,
									centeredSlides: false,
									spaceBetween: 20
								},
								// breakpoint from 480 up
								480: {
									slidesPerView: mobile,
									spaceBetween: 20,
								},
								// breakpoint from 768 up
								768: {
									slidesPerView: tablet,
									spaceBetween: 20,
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
								1401: {
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
						
					jQuery( "#product-trending" ).tabs();
				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Trending_Product() );
