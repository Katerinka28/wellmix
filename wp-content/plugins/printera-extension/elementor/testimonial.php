<?php
/**
 * Counter Shortcode
 *
 * @package printera
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor testimonial widget.
 *
 * Elementor widget that displays a testimonial with the ability to control every
 * aspect of the testimonial design.
 *
 * @since 1.0.0
 */
class Widget_custom_testimonial extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Testimonial', 'printera' );
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve testimonial widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial', 'printera' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return array( 'printera' );
	}



	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}


	/**
	 * Register testimonial widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'testimonial',
			array(
				'label' => esc_html__( 'Testimonial', 'printera' ),
			)
		);

		/* $this->add_control(
			'testimonial-style',
			array(
				'label'   => esc_html__( 'Testimonial Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'Style 1', 'printera' ),
					'2' => esc_html__( 'Style 2', 'printera' ),
					'3' => esc_html__( 'Style 3', 'printera' ),
				),
				'default' => '1',
			)
		); */

		$this->add_control(
			'display-author',
			array(
				'label'   => esc_html__( 'Author', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
			)
		);
		$this->add_control(
			'display-designation',
			array(
				'label'   => esc_html__( 'Designation', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
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
				'default'     => '1',
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
				'default'     => '1',
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
				'default'     => '1',
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
				'default'     => '1',
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'   => esc_html__( 'Autoplay', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),

				),

			)
		);

		$this->add_control(
			'loop',
			array(
				'label'   => esc_html__( 'Loop', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),

				),

			)
		);

		$this->add_control(
			'dots',
			array(
				'label'   => esc_html__( 'Dots', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
					'true'  => esc_html__( 'True', 'printera' ),
					'false' => esc_html__( 'False', 'printera' ),

				),

			)
		);

		$this->add_control(
			'arrow',
			array(
				'label'   => esc_html__( 'Arrow', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => array(
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
			'gallary_style',
			array(
				'label' => esc_html__( 'Gallary Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title-color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-wrap .testimonial-info-wrapper .testimonial-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-wrap .testimonial-info-wrapper .testimonial-details p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .testimonial-wrap .testimonial-info-wrapper .testimonial-info .testimonial-designation::before' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'author-color',
			array(
				'label'     => esc_html__( 'Author Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-wrap .testimonial-info-wrapper .testimonial-info .testimonial-author' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'designation-color',
			array(
				'label'     => esc_html__( 'Designation Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-wrap .testimonial-info-wrapper .testimonial-info .testimonial-designation' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render testimonial widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$args = array(
			'post_type'        => 'tt-testimonial',
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'suppress_filters' => 0,
		);

		$the_query = new \WP_Query( $args );

		global $post;

		$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
		$this->add_render_attribute( 'carousel-setting', 'data-dots', $settings['dots'] );
		$this->add_render_attribute( 'carousel-setting', 'data-nav', $settings['arrow'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay', $settings['autoplay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );

		$this->add_render_attribute(
			'category-carousel',
			[
				'class' => ['swiper testimonial-section swiper-slider' ]
			]
		);

		// if ( $settings['testimonial-style'] == '1' ) {
			?>
				<div <?php echo $this->get_render_attribute_string( 'category-carousel' ); ?> data-id = "testimonial-section" >
					<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >
						<?php
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$full_image  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'tt_tesi1_415x315' );
								$author = get_post_meta( get_the_ID(), 'testi_author', true );
								$designation = get_post_meta( get_the_ID(), 'testi_designation', true );
								?>
								<div class="swiper-slide">
									<div class="testimonial-wrap d-flex justify-content-between align-items-center">
										<div class="testimonial-info-wrapper col-md-7 col-xs-12">
											
											<div class="testimonial-info">
												<?php
												if ( 'yes' === $settings['display-author'] ) { 
													if ( !empty( $author ) ) { ?>
														<span class="testimonial-author"><?php echo esc_html( $author ); ?></span>
														<?php 
													}
												} ?>
												<?php
												if ( 'yes' === $settings['display-designation'] ) { 
													if( !empty( $designation ) ){ ?>
														<p class="testimonial-designation"><?php echo esc_html( $designation ); ?></p>
														<?php
													}
												} ?>
											</div>
											<div class="testimonial-details">
												<?php the_content( $the_query->ID ); ?>
											</div>

										</div>
									</div>
								</div>
								<?php
							}
						}
						wp_reset_postdata();
						?>
					</div>
					<?php
						if($settings['dots'] == "true"){
					?>
							<div class="swiper-pagination"></div>
					<?php
					}
						if($settings['arrow'] == "true"){
					?>
							<div class="swiper-navigation">
								<div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
								<div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
							</div>
					<?php
						}
					?>
				</div>
			<?php
		// }
		
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>	
				if( jQuery('div').hasClass('testimonial-section') ){
					$this = jQuery('.swiper.testimonial-section');
	
					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplay = $this.find( '.swiper-wrapper' ).data('autoplay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');

					var next = '.'+jQuery(this).attr("data-id")+' '+".swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+".swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+".swiper-pagination";
	

					mySwiper = new Swiper('.swiper.testimonial-section', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,
						speed : speed,
						breakpoints: {
							0: {
								items: 	1
							},
							// breakpoint from 480 up
							480: {
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_custom_testimonial() );
