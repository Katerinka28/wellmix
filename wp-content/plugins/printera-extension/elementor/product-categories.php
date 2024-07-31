<?php
/**
 * Widget API: Elementer Product Categories Widget
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
 * Elementor categories widget.
 * Elementor widget that displays a categories with the ability to control every
 * aspect of the categories design.
 * @since 1.0.0
 */
class Widget_printera_Categories extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve categories widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Product Categories', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve categories widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product Categories', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve categories widget icon.
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
	 * Register categories widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'categories',
			array(
				'label' => esc_html__( 'Product Categories', 'printera' ),
			)
		);

		$this->add_control(
			'category-Style',
			array(
				'label'   => esc_html__( 'Categories View', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'category-carousel' => esc_html__( 'Category Carousel', 'printera' ),
					'category-grid' => esc_html__( 'Category Grid', 'printera' ),
				),
				'default' => 'category-carousel',
			)
		);

		$this->add_control(
			'product-Style',
			array(
				'label'   => esc_html__( 'Categories Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'category-style1' => esc_html__( 'Category Style 1', 'printera' ),
					'category-style2' => esc_html__( 'Category Style 2', 'printera' ),
				),
				'default' => 'category-style1',
			)
		);

		$this->add_control(
			'taxonomies',
			array(
				'label' 	=> esc_html__( 'Select Categories', 'printera' ),
				'type' 		=> Controls_Manager::SELECT2,
				'multiple' 	=> true,
				'options' 	=> $this->get_product_categories(),
			)
		);

		$this->add_control(
			'btn-text',
			array(
				'label'       => esc_html__( 'Button Text', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'condition'   => array(
					'category-Style' => 'category-grid',
				),
				'label_block' => true,
				'default'     => 'View All Product',
			)
		);

		$this->add_control(
			'display-count',
			array(
				'label'     => esc_html__( 'Display Counter', 'printera' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'yes'       => esc_html__( 'yes', 'printera' ),
				'no'        => esc_html__( 'no', 'printera' ),
			)
		);

		$this->add_control(
			'display-description',
			array(
				'label'     => esc_html__( 'Display Description', 'printera' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'yes'       => esc_html__( 'yes', 'printera' ),
				'no'        => esc_html__( 'no', 'printera' ),
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
			'categories_font',
			array(
				'label' => esc_html__( 'Category Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .cat_desc .wpcat-content .cat_name',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'label' => esc_html__( 'Counter Font', 'printera' ),
				'selector' => '{{WRAPPER}} .cat_desc .wpcat-content .cat_total_product',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'categories_style',
			array(
				'label' => esc_html__( 'Categories Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'heading_color',
			array(
				'label'     => esc_html__( 'heading Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .category-grid .cat_desc .cat_name' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat_desc .wpcat-content .cat_name' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat_desc .wpcat-content .cat_name:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Count Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat_desc .wpcat-content .cat_total_product' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_hover_color',
			array(
				'label'     => esc_html__( 'button Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn-primary::after' => 'background: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function get_product_categories() {
	
		$taxonomies = get_categories(  
			array( 
				'taxonomy' => 'product_cat',
				'orderby' => 'name',
			)
		);

		$options = [ '' => '' ];

		foreach ( $taxonomies as $taxonomy ) {
			$options[ $taxonomy->cat_ID ] = $taxonomy->name;
		}

		return $options;
	}

	/**
	 * Render categories widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		global $product;
		$settings = $this->get_settings();
		$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if($settings['category-Style'] == "category-carousel"){
			$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
			$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
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
		}else{
			$this->add_render_attribute( 'carousel-setting', 'class', 'cat-row' );
		}

		$output = '';
		$devide = 1;

		$cat_class = '';
		if($settings['dots'] == "true"){ 
			$cat_class = 'swiper-bul';
		}

		$center_class = '';
		if($settings['center'] == "true"){ 
			$center_class = 'center_class';
		}

		$col_view = '';
		if($settings['category-Style'] == "category-grid"){
			$col_view = 'col-lg-3 col-md-4 col-6';
		}
		
		$output .='<div class="product-category-wrap">';

			if($settings['category-Style'] == "category-carousel"){
				$output .='<div class="swiper product-category category-slider '.$cat_class.' '.$center_class.' " data-id = "product-category" >';
			}else{
				$output .='<div class="category-grid">';
			}
						
				$output .= '<div ' . $this->get_render_attribute_string( 'carousel-setting' ) . ' >';

					if( $settings['taxonomies'] ){
						$total_category = count( $settings['taxonomies'] );
					}

					foreach( $settings['taxonomies'] as $taxonomies ){
						$prod_categories = get_terms( 'product_cat', array(
							'include'	=> $taxonomies,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'hide_empty' => true
						));

						foreach( $prod_categories as $prod_cat ) :

						if($settings['category-Style'] == "category-carousel"){
							$output .= '<div class="swiper-slide">';
						}

								$cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
								$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' );
								$term_link = get_term_link( $prod_cat, 'product_cat' );

								if( ! empty( $shop_catalog_img ) ){
									$cat_image = '<img src="'. $shop_catalog_img[0] .'" alt="'. $prod_cat->name .'">';
								}else{
									$cat_image = '<img src="'. PRINTERA_TH_URL .'/assets/images/woocommerce-placeholder.png" alt="placeholder">';
								}

									$output .= '<a href="'. $term_link .'" class="cat_desc '. $col_view .'">';
										if($settings['category-Style'] == "category-grid"){
											$output .= '<div class="cat_name">'. $prod_cat->name .'</div>';
										}
										$output .= '<div class="cat_image">'. $cat_image .'</div>';
									
										$output .= '<div class="wpcat-content">';
											if($settings['category-Style'] == "category-carousel"){
												$output .= '<div class="cat_name">'. $prod_cat->name .'</div>';
											}
											if( $settings['display-description'] == 'yes' ){
												$output .= '<div class="cat_description">'. $prod_cat->description .'</div>';
											}
											if($settings['category-Style'] == "category-grid"){
												$output .= '<div class="cat_button btn btn-primary">'. $settings['btn-text'] .'</div>';
											}
											if( $settings['display-count'] == 'yes'){
												$output .= '<div class="cat_total_product"> '. $prod_cat->count .'-Items </div>';
											}
										$output .= '</div>';
									$output .= '</a>';

						if($settings['category-Style'] == "category-carousel"){
							$output .= '</div>';
						}

						endforeach;

						wp_reset_query();
					}
				$output .= '</div>';
			$output .= '</div>';
				
				if($settings['dots'] == "true" && $settings['category-Style'] == "category-carousel"){
					$output .= '<div class="swiper-pagination"></div>';
				}

				if($settings['arrow'] == "true" && $settings['category-Style'] == "category-carousel"){
					$output .= '<div class="swiper-navigation">';
						$output .= '<div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>';
						$output .= '<div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>';
					$output .= '</div>';
				}
			$output .= '</div>';
			
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('product-category') ){
					
					$this = jQuery('.swiper.product-category');
					
					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplay = $this.find( '.swiper-wrapper' ).data('autoplay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var center = $this.find( '.swiper-wrapper' ).data('center');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";

					mySwiper = new Swiper('.swiper.product-category', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						centeredSlides: center,
						autoplay: autoplay,
						speed : speed,
						// mousewheel: true,

						breakpoints: {
							0: {
								slidesPerView: 	2,
								spaceBetween: 20,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
								spaceBetween: 20,
							},
							// breakpoint from 576 up
							576: {
								slidesPerView: mobile,
								centeredSlides: false,
								spaceBetween: 20,
							},
							// breakpoint from 992 up
							768: {
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
				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_printera_Categories() );
