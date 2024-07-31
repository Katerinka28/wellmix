<?php
/**
 * Widget API: Elementer Slider Widget
 *
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor slider widget.
 * Elementor widget that displays a slider with the ability to control every
 * aspect of the slider design.
 * @since 1.0.0
 */
class Widget_slider extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve slider widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Slider', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve slider widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slider', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve slider widget icon.
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
		return 'eicon-image-box';
	}

	/**
	 * Register slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'slider',
			array(
				'label' => esc_html__( 'Slider Box', 'printera' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => esc_html__( 'Add Your Title Text Here', 'printera' ),
			)
		);
		

		$repeater->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'printera' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => esc_html__( 'Enter your Description', 'printera' ),
				'default'     => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'printera' ),
			)
		);

		$repeater->add_control(
			'button',
			array(
				'label'       => esc_html__( 'Button', 'printera' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => 'Shop Now',
			)
		);

		$repeater->add_control(
			'slider-link',
			array(
				'label'       => esc_html__( 'Link', 'printera' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => esc_html__( 'https://your-link.com', 'printera' ),
				'default'     => array(
					'url' => '#',
				),
			)
		);

		$repeater->add_control(
			'image',
			array(
				'label'     => esc_html__( 'Choose Image', 'printera' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => array(
					'active' => true,
				),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'slider-tabs',
			array(
				'label'  => esc_html__( 'List Items', 'printera' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
				'default'     => '4',
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
				'default'     => '4',
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
				'default'     => '4',
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
				'default'   => '1500',
				
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_style',
			array(
				'label' => esc_html__( 'slider', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box .tt-feature-box-containt .tt-feature-box-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .tt-feature-box:hover .tt-feature-box-containt .tt-feature-box-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box .tt-feature-box-containt p' => 'color: {{VALUE}};',
				),
			)
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'list_style',
			array(

				'label'     => esc_html__( 'List Style', 'printera' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'slider-style' => 'tt-feature-box-style-3',
				),
			)
		);

		$this->add_control(
			'list_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-3 .tt-slider-list ul li i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-3 .tt-slider-list ul li' => 'color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Render fancybox widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$tabs = $this->get_settings_for_display( 'slider-tabs' );

		$this->add_render_attribute(
			'category-carousel',
			[
				'class' => ['swiper slider-block swiper-slider' ]
			]
		);

		$this->add_render_attribute( 'slider-attr', 'class', 'slider-button btn btn-primary' );
		$this->add_render_attribute( 'slider-attr', 'href', $settings['slider-link']['url'] );

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
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] ); ?>

			<div <?php echo $this->get_render_attribute_string( 'category-carousel' ); ?> data-id = "slider-block" >
				<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >
					<?php			
					foreach ( $tabs as $index => $item ) {
						
							$this->add_render_attribute( 'image', 'src', $item['image']['url'] );
							$this->add_render_attribute( 'image', 'srcset', $item['image']['url'] );
							$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $item['image'] ) );
							$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $item['image'] ) );
							$image_html = Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'image' );
						
						?>
						<div class="swiper-slide">
							<div class="swiper-top">
								<?php if ( ! empty( $image_html ) ) { ?>
									<div class="tt-slider-box"> 
										<?php echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</div>
								<?php } ?>
								<div class="tt-slider-box-containt">
									<?php if ( $item['title'] ) { ?>
									<div class="tt-slider-box-title"><?php echo sprintf( '%1$s', esc_html( $item['title'] ) ); ?></div>
									<?php } ?>
									<?php if ( $item['description'] ) { ?>
									<p class="slider-title"><?php echo sprintf( '%1$s', esc_html( $item['description'] ) ); ?></p>
									<?php } ?>
									<?php if ( $item['button'] ) { ?>
									<div class="slider-button">
										<a <?php echo $this->get_render_attribute_string( 'slider-attr' ); ?>><?php echo sprintf( '%1$s', esc_html( $item['button'] ) ); ?></a>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php 
					} ?>
				</div>
			</div>
		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('slider-block') ){
					$this = jQuery('.swiper.slider-block');
					
					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplay = $this.find( '.swiper-wrapper' ).data('autoplay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');

					var next = '.'+jQuery(this).attr("data-id")+".swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+".swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+".swiper-pagination";

					mySwiper = new Swiper('.swiper.slider-block', {
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
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_slider() );
