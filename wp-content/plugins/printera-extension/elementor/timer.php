<?php
/**
 * Timer Shortcode
 *
 * @package printera
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Elementor Timer widget.
 *
 * Elementor widget that displays a Timer with the ability to control every
 * aspect of the Timer design.
 *
 * @since 1.0.0
 */
class Widget_Timer extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve Timer widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Timer', 'printera' );
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve Timer widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Timer', 'printera' );
	}
	/**
	 * Get widget icon.
	 *
	 * Retrieve Timer widget icon.
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
		return 'eicon-tabs';
	}

	/**
	 * Register Timer widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'timer',
			array(
				'label' => esc_html__( 'Timer', 'printera' ),
			)
		);
		$this->add_control(
			'tab_heading',
			array(
				'label'   => esc_html__( 'Title', 'plugin-name' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Title', 'plugin-name' ),
			)
		);
		$this->add_control(
			'date_time',
			array(
				'label'       => esc_html__( 'Date & Time', 'printera' ),
				'type'        => Controls_Manager::DATE_TIME,
				'label_block' => true,
			)
		);	
		$this->add_control(
			'tab_content',
			array(
				'label'      => esc_html__( 'Description', 'printera' ),
				'type'       => Controls_Manager::TEXTAREA,
				'show_label' => false,
			)
		);
		$this->add_control(
			'button-text',
			array(
				'label'       => esc_html__( 'Button Text', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => esc_html__( 'Button', 'printera' ),
			)
		);

		$this->add_control(
			'button-link',
			array(
				'label'   => esc_html__( 'Link', 'printera' ),
				'type'    => Controls_Manager::URL,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => '#',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'timer-style',
			array(
				'label' => esc_html__( 'Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-head' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'timer_color',
			array(
				'label'     => esc_html__( 'Timer Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-datetime' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'timer_bg_color',
			array(
				'label'     => esc_html__( 'Timer Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-datetime' => 'background: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'deciption_color',
			array(
				'label'     => esc_html__( 'Desciption Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-content' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Button Text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-button' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'button_bg_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-button' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_title_hv__color',
			array(
				'label'     => esc_html__( 'Button Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-button:hover' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'button_bg_hv_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .banner-timer .timer-button:hover' => 'background: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}
	/**
	 * Render Timer widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$tabs     = $this->get_settings_for_display( 'tabs' );

		$tab_heading = $settings['tab_heading'] ? $settings['tab_heading'] : '';
		$date_time 	 = $settings['date_time'] ? $settings['date_time'] : '';
		$tab_content = $settings['tab_content'] ? $settings['tab_content'] : '';
		$button_text = $settings['button-text'] ? $settings['button-text'] : '';

		$this->add_render_attribute( 'button-attribute', 'class', 'timer-button btn btn-primary' );
		$this->add_render_attribute( 'button-attribute', 'href', $settings['button-link']['url'] );
		$settings['button-link']['is_external'] ? $this->add_render_attribute( 'button-attribute', 'target', '_blank' ):'';

		?>
		<div class="banner-timer">
			<?php if( ! empty( $tab_heading ) ){ ?><div class="timer-head"><?php echo $tab_heading; ?></div><?php } ?>
			<?php if( ! empty( $date_time ) ){ ?><div class="timer-datetime" id="timer-datetime" data="<?php echo $date_time; ?>"></div><?php } ?>
			<?php if( ! empty( $tab_content ) ){ ?><div class="timer-content"><?php echo $tab_content; ?></div><?php } ?>
			<?php if( ! empty( $button_text ) ){ ?><a <?php echo $this->get_render_attribute_string( 'button-attribute' ); ?> ><?php echo $button_text; ?></a><?php } ?>
		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Timer() );
