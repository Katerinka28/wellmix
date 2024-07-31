<?php
/**
 * Widget API: Elementer Video Widget
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Video widget.
 * Elementor widget that displays a Video with the ability to control every
 * aspect of the Video design.
 * @since 1.0.0
 */
class Widget_Video_Popup extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Video widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Video Popup', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Video Popup widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Video', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Video widget icon.
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
	 * Register Video widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'video',
			array(
				'label' => esc_html__( 'Video Popup', 'printera' ),
			)
		);

		$this->add_control(
			'video-style',
			array(
				'label'   => esc_html__( 'video Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'video-style-1' => esc_html__( 'Morden Style', 'printera' ),
					'video-style-2' => esc_html__( 'Classic Style', 'printera' ),
				),
				'default' => 'video-style-1',
			)
		);

		$this->add_control(
			'video-image',
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
			'video-link',
			array(
				'label'       => esc_html__( 'Video URL', 'printera' ),
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

		$repeater = new Repeater();

		$repeater->add_control(
			'text-slider',
			array(
				'label'     => esc_html__( 'Add Text for Slider', 'printera' ),
				'type'      => Controls_Manager::TEXTAREA,
				'dynamic'   => array(
					'active' => true,
				),
			)
		);

		$this->add_control(
			'text-tabs',
			array(
				'label'  => esc_html__( 'Text Slider', 'printera' ),
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
			'icon-position',
			array(
				'label'   => esc_html__( 'Icon Position', 'printera' ),
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
					'tt-icon-bottom' => array(
						'title' => esc_html__( 'Bottom', 'printera' ),
						'icon'  => 'eicon-v-align-bottom',
					),
					'tt-icon-center' => array(
						'title' => esc_html__( 'Center', 'printera' ),
						'icon'  => 'eicon-h-align-center',
					),
				),

				'default' => 'tt-icon-top',

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
				'default'     => '5',
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
				'default'     => '5',
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
				'default'     => '5',
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
				'default'     => '5',
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
			'text_font',
			array(
				'label' => esc_html__( 'Text Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-video .swiper-js-container .swiper-slide',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text-style',
			array(
				'label' => esc_html__( 'Text Color', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-video .swiper-js-container .swiper-slide' => 'color: {{VALUE}};',
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

		$this->add_render_attribute( 'image', 'src', $settings['video-image']['url'] );
		$this->add_render_attribute( 'image', 'srcset', $settings['video-image']['url'] );
		$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['video-image'] ) );
		$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['video-image'] ) );
		$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'video-image' );

		$this->add_render_attribute( 'button-attr', 'class', 'youtube-popup' );
		$this->add_render_attribute( 'button-attr', 'href', $settings['video-link']['url'] );

		$this->add_render_attribute( 'video-popup', 'class', 'tt-video' );
		$this->add_render_attribute( 'video-popup', 'class', esc_attr( $settings['align'] ) );

		$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay-delay', $settings['autoplay-delay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );

		$tabs = $this->get_settings_for_display( 'text-tabs' );
		
		$output = '';
		$output .= '<div ' . $this->get_render_attribute_string( 'video-popup' ) . '>';

			if( $settings['video-style'] == "video-style-1" ){
				$output .= '<div class="swiper-js-container">';
					$output .= '<div class="swiper video swiper-video" data-id="video">';

						$output .= '<div '. $this->get_render_attribute_string( 'carousel-setting' ) .' >';
							foreach ( $tabs as $index => $item ) {
								$output .= '<div class="swiper-slide">'.$item['text-slider'].'</div>';
							}
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';

				$output .= $image_html;
				$output .= '<a ' . $this->get_render_attribute_string( 'button-attr' ) . '><div class="play-button"><i class="fa-solid fa-play"></i></div></a><br>';
			}

		$output .= '</div>';
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('video') ){

					$this = jQuery('.swiper.video');

					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplayDelay = $this.find( '.swiper-wrapper' ).data('autoplay-delay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');

					mySwiper = new Swiper('.swiper.video', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						autoplay: {
							enabled: true,
							delay: 1,
							disableOnInteraction: true
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
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Video_Popup() );
