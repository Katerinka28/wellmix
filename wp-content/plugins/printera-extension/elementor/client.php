<?php
/**
 * Widget API: Elementer Client Widget
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
 * Elementor client widget.
 * Elementor widget that displays a client with the ability to control every
 * aspect of the client design.
 * @since 1.0.0
 */
class Widget_Client extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve client widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Client', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve client widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Client', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve client widget icon.
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
	 * Register client widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'client',
			array(
				'label' => esc_html__( 'Client', 'printera' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Choose Image', 'printera' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'tabs',
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
		
		$this->end_controls_section();
	}

	/**
	 * Render client widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$tabs = $this->get_settings_for_display( 'tabs' );

 
		$this->add_render_attribute( 'carousel-setting', 'class', 'swiper-wrapper' );
		$this->add_render_attribute( 'carousel-setting', 'data-direction', $settings['direction'] );
		$this->add_render_attribute( 'carousel-setting', 'data-dots', $settings['dots'] );
		$this->add_render_attribute( 'carousel-setting', 'data-nav', $settings['arrow'] );
		$this->add_render_attribute( 'carousel-setting', 'data-desk', $settings['desk'] );
		$this->add_render_attribute( 'carousel-setting', 'data-laptop', $settings['laptop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-tablet', $settings['tablet'] );
		$this->add_render_attribute( 'carousel-setting', 'data-mobile', $settings['mobile'] );
		$this->add_render_attribute( 'carousel-setting', 'data-autoplay-delay', $settings['autoplay-delay'] );
		$this->add_render_attribute( 'carousel-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'carousel-setting', 'data-speed', $settings['speed'] );
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );

		$output = '';

		$client_class = '';

		if($settings['dots'] == "true"){ 
			$client_class = 'swiper-bul';
		}

		?>
		<div class="swiper-js-container">
			<div class="swiper client swiper-client <?php echo $client_class; ?>" data-id="client">
				<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?>>
					<?php foreach ( $tabs as $index => $item ) { ?>			
						<div class="swiper-slide">
							<div class="item">
								<a href="#">
									<img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="client"/>
								</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<?php
					if($settings['dots'] == "true"){
				?>
					<div class="swiper-pagination"></div>
				
					
				<?php
					}
				?>
			</div>
			<?php
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
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('client') ){

					$this = jQuery('.swiper.client');
				
					var direction = $this.find( '.swiper-wrapper' ).data('direction');
					var desktop = $this.find( '.swiper-wrapper' ).data('desk');
					var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
					var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
					var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
					var autoplayDelay = $this.find( '.swiper-wrapper' ).data('autoplay-delay');
					var loop = $this.find( '.swiper-wrapper' ).data('loop');
					var margin = $this.find( '.swiper-wrapper' ).data('margin');
					var speed = $this.find( '.swiper-wrapper' ).data('speed');

					var next = '.' + jQuery(this).attr("data-id") + ' ' + ".swiper-button-next";
					var prev = '.' + jQuery(this).attr("data-id") + ' ' + ".swiper-button-prev";
					var pagination = '.' + jQuery(this).attr("data-id") + ' ' + ".swiper-pagination";


					mySwiper = new Swiper('.swiper.client', {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,

						breakpoints: {
							0: {
								slidesPerView: 	1
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
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Client() );
