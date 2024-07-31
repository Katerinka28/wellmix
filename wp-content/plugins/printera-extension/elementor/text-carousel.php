<?php
/**
 * Widget API: Elementer Marquee Widget
 *
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Marquee widget.
 * Elementor widget that displays a Marquee with the ability to control every
 * aspect of the Marquee design.
 * @since 1.0.0
 */
class Widget_Marquee extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Marquee widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Text Carousel', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Marquee widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Text Carousel', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Marquee widget icon.
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
	 * Register Marquee widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'text-carousel',
			array(
				'label' => esc_html__( 'Text Carousel', 'printera' ),
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
				'default'     => esc_html__( 'Add Your Title Text', 'printera' ),
			)
		);

		$this->add_control(
			'marquee-tabs',
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
			'desk',
			array(
				'label'       => esc_html__( 'Desktop', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '2',
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
				'default'     => '2',
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
				'default'     => '2',
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
			'autoplay-delay',
			array(
				'label'     => esc_html__( 'Autoplay Delay Time', 'printera' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '1',
				
			)
		);
		$this->add_control(
			'speed',
			array(
				'label'     => esc_html__( 'Speed', 'printera' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '5000',
				
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
		
		$this->end_controls_section();

		$this->start_controls_section(
			'Marquee_font',
			array(
				'label' => esc_html__( 'Section Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .text-carousel .swiper-slide p',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'Marquee_style',
			array(
				'label' => esc_html__( 'Marquee Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .text-carousel .swiper-slide p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Border Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .text-carousel .swiper-slide p::after' => 'background: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
/* 
		$this->start_controls_section(
			'list_style',
			array(

				'label'     => esc_html__( 'List Style', 'printera' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'Marquee-style' => 'marquee-style-3',
				),
			)
		); */

		/* $this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .marquee-style-3 .tt-Marquee-list ul li' => 'color: {{VALUE}};',
				),
			)
		); */

		// $this->end_controls_section();
	}

	/**
	 * Render fancybox widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$tabs = $this->get_settings_for_display( 'marquee-tabs' );

		$this->add_render_attribute( 'marquee', 'class', 'marquee' );
		// $this->add_render_attribute( 'marquee', 'class', esc_attr( $settings['align'] ) );

		$this->add_render_attribute(
			'text-carousel',
			[
				'class' => ['swiper text-carousel swiper-video' ]
			]
		);
 
		$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay-delay', $settings['autoplay-delay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] ); ?>


			<div  <?php echo $this->get_render_attribute_string( 'text-carousel' ); ?> data-id="text-carousel">
				<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?>>
					<?php
					foreach ( $tabs as $index => $item ) {
						echo '<div class="swiper-slide"><p>'.esc_html__( $item['title'] ).'</p></div>';
					} ?>
				</div>
			</div>


		<?php
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('text-carousel') ){

					$this = jQuery('.swiper.text-carousel');
			
					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplayDelay = $this.find( '.swiper-wrapper' ).data('autoplay-delay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');


					mySwiper = new Swiper('.swiper.text-carousel', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						autoplay: {
							enabled: true,
							delay: 1,
							delay: autoplayDelay,
						},

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
					});
				}
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Marquee() );
