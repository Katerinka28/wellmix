<?php
/**
 * Widget API: Elementer ServiceBox Widget
 *
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor servicebox widget.
 * Elementor widget that displays a servicebox with the ability to control every
 * aspect of the servicebox design.
 * @since 1.0.0
 */
class Widget_Servicebox extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve servicebox widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'ServiceBox', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve servicebox widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'ServiceBox', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve servicebox widget icon.
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
	 * Register servicebox widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'servicebox',
			array(
				'label' => esc_html__( 'Service Box', 'printera' ),
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
			'select-media',
			array(
				'label'   => esc_html__( 'Icon / Image', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'printera' ),
					'image' => esc_html__( 'Image', 'printera' ),
				),
				'default' => 'image',

			)
		);

		$repeater->add_control(
			'servicebox-icon',
			array(
				'label'            => esc_html__( 'Icon', 'printera' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition'        => array(
					'select-media' => 'icon',
				),
				'default'          => array(
					'value' => 'fas fa-star',

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
				'condition' => array(
					'select-media' => 'image',
				),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'service-tabs',
			array(
				'label'  => esc_html__( 'List Items', 'printera' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);

		$this->add_control(
			'tag',
			array(
				'label'   => esc_html__( 'Title Tag', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h2' => esc_html__( 'h2', 'printera' ),
					'h3' => esc_html__( 'h3', 'printera' ),
					'h4' => esc_html__( 'h4', 'printera' ),
					'h5' => esc_html__( 'h5', 'printera' ),
					'h6' => esc_html__( 'h6', 'printera' ),
				),
				'default' => 'h4',

			)
		);

		$this->add_control(
			'icon-position',
			array(
				'label'   => esc_html__( 'Icon/Image Position', 'printera' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'tt-icon-left'  => array(
						'title' => esc_html__( 'Left', 'printera' ),
						'icon'  => 'eicon-h-align-left',
					),
					'tt-icon-top'   => array(
						'title' => esc_html__( 'Top', 'printera' ),
						'icon'  => 'eicon-v-align-top',
					),
					'tt-icon-right' => array(
						'title' => esc_html__( 'Right', 'printera' ),
						'icon'  => 'eicon-h-align-right',
					),
				),

				'default' => 'tt-icon-top',

			)
		);

		$this->add_control(
			'icon-size',
			array(
				'label'   => esc_html__( 'Icon/Image Size', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'tt-feature-icon-sm' => esc_html__( 'Small', 'printera' ),
					'tt-feature-icon-md' => esc_html__( 'Medium', 'printera' ),
					'tt-feature-icon-lg' => esc_html__( 'Large', 'printera' ),
				),
				'default' => 'tt-feature-icon-md',
			)
		);

		$this->add_responsive_control(
			'align',
			array(
				'label'   => esc_html__( 'Alignment', 'printera' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'text-start',
				'options' => array(
					'text-start'   => array(
						'title' => esc_html__( 'Left', 'printera' ),
						'icon'  => 'eicon-text-align-left',
					),
					'text-center' => array(
						'title' => esc_html__( 'Center', 'printera' ),
						'icon'  => 'eicon-text-align-center',
					),
					'text-end'  => array(
						'title' => esc_html__( 'Right', 'printera' ),
						'icon'  => 'eicon-text-align-right',
					),
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
			'servicebox_style',
			array(
				'label' => esc_html__( 'servicebox', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .service-block .swiper-slide .tt-feature-box-containt .tt-feature-box-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .service-block .swiper-slide:hover .tt-feature-box-containt .tt-feature-box-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .service-block .swiper-slide .tt-feature-box-containt > p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-hover-color',
			array(
				'label'     => esc_html__( 'Description Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box:hover .tt-feature-box-containt p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'icon-bg-hover-color',
			array(
				'label'     => esc_html__( 'Icon Background Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				/* 'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-4:hover.tt-feature-box-flat .tt-feature-box-icon' => 'background: {{VALUE}};',
				), */

			)
		);

		$this->add_control(
			'icon-color',
			array(
				'label'     => esc_html__( 'Icon Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'select-media' => 'icon',
				),
				/* 'selectors' => array(
					'{{WRAPPER}} .tt-feature-box .tt-feature-box-icon i' => 'color: {{VALUE}};',
				), */
			)
		);

		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				/* 'condition' => array(
					'servicebox-style' => 'tt-feature-box-style-2',
					'select-media'     => 'icon',
				), */
				/* 'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-2:hover .tt-feature-box-icon i' => 'color: {{VALUE}};',
				), */
			)
		);

		$this->add_control(
			'top-border-color',
			array(
				'label'     => esc_html__( 'Top Border Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .service-block' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'right-border-color',
			array(
				'label'     => esc_html__( 'Right Border Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box' => 'border-color: {{VALUE}};',
				),
			)
		);


		$this->add_control(
			'button-arror-color',
			array(
				'label'     => esc_html__( 'Button Arrow Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'servicebox-style' => 'tt-feature-box-style-2',
				),
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-2 .tt-feature-box-containt .read-more' => 'color: {{VALUE}};',
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
					'servicebox-style' => 'tt-feature-box-style-3',
				),
			)
		);

		$this->add_control(
			'list_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-3 .tt-servicebox-list ul li i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-feature-box.tt-feature-box-style-3 .tt-servicebox-list ul li' => 'color: {{VALUE}};',
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
		$tabs = $this->get_settings_for_display( 'service-tabs' );

		$this->add_render_attribute(
			'category-carousel',
			[
				'class' => ['swiper service-block swiper-slider' ]
			]
		);

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

			<div <?php echo $this->get_render_attribute_string( 'category-carousel' ); ?> data-id = "service-block" >
				<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >
					<?php			
					foreach ( $tabs as $index => $item ) {
						if( $item['select-media'] == 'image' ){
							$this->add_render_attribute( 'image', 'src', $item['image']['url'] );
							$this->add_render_attribute( 'image', 'srcset', $item['image']['url'] );
							$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $item['image'] ) );
							$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $item['image'] ) );
							$image_html = Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'image' );
						}else{
							if( !empty( $item['servicebox-icon']['value']['url'] ) ){
								$image_html = '<img src="'. $item['servicebox-icon']['value']['url'] .'" alt="services">';
							}else{
								$image_html = sprintf( '<i aria-hidden="true" class="%1$s"></i>', esc_attr( $item['servicebox-icon']['value'] ) );
							}
						}
						?>
						<div class="swiper-slide">
							<?php if ( ! empty( $image_html ) ) { ?>
								<div class="tt-feature-box-icon"> 
									<?php echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
							<?php } ?>
							<div class="tt-feature-box-containt">
								<?php if ( $item['title'] ) { ?>
								<<?php echo esc_html( $settings['tag'] ); ?> class="tt-feature-box-title"><?php echo sprintf( '%1$s', esc_html( $item['title'] ) ); ?></<?php echo esc_html( $settings['tag'] ); ?>>
								<?php } ?>
								<?php if ( $item['description'] ) { ?>
								<p><?php echo sprintf( '%1$s', esc_html( $item['description'] ) ); ?></p>
								<?php } ?>
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
				if( jQuery('div').hasClass('service-block') ){
					$this = jQuery('.swiper.service-block');

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

					mySwiper = new Swiper('.swiper.service-block', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,
						speed : speed,
						breakpoints: {
							0: {
								slidesPerView: 	1,
								spaceBetween: 0,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
							},
							// breakpoint from 576 up
							576: {
								slidesPerView: mobile,
								spaceBetween: 0,
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
							el: ".swiper-pagination",
							clickable: true,
						},
						navigation: {
							nextEl: ".swiper-button-next",
							prevEl: ".swiper-button-prev",
						},
					});
				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Servicebox() );
