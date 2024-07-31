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
 * Elementor section title widget.
 *
 * Elementor widget that displays a section title with the ability to control every
 * aspect of the section title design.
 *
 * @since 1.0.0
 */
class Widget_Section_Title extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve section title widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Section Title', 'printera' );
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve section title widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Section Title', 'printera' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve section title widget icon.
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
		return 'eicon-t-letter';
	}


	/**
	 * Register section title widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'Section_Title',
			array(
				'label' => esc_html__( 'Section Title', 'printera' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'printera' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Title', 'printera' ),
			)
		);

		$this->add_control(
			'tag',
			array(
				'label'   => esc_html__( 'Title Tag', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => array(
					'h2' => esc_html__( 'h2', 'printera' ),
					'h3' => esc_html__( 'h3', 'printera' ),
					'h4' => esc_html__( 'h4', 'printera' ),
					'h5' => esc_html__( 'h5', 'printera' ),
					'h6' => esc_html__( 'h6', 'printera' ),

				),
			)
		);


		$this->add_control(
			'use-tag',
			array(
				'label'     => esc_html__( 'Use Tag', 'printera' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'yes'       => esc_html__( 'yes', 'printera' ),
				'no'        => esc_html__( 'no', 'printera' ),
			)
		);

		$this->add_control(
			'title-tag',
			array(
				'label'       => esc_html__( 'Title Tag', 'printera' ),
				'type'        => Controls_Manager::MEDIA,
				'condition'   => array(
					'use-tag' => 'yes',
				),
			)
		);

		$this->add_control(
			'display-upper-title',
			array(
				'label'   => esc_html__( 'Display Upper Title', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
			)
		);


		$this->add_control(
			'upper-title',
			array(
				'label'       => esc_html__( 'Upper Title', 'printera' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active' => true,
				),
				'condition'   => array(
					'display-upper-title' => 'yes',
				),
				'placeholder' => esc_html__( 'Enter your title', 'printera' ),
				'default'     => esc_html__( 'Add Your Heading Text Here', 'printera' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'printera' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Description', 'printera' ),
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
			'title_font',
			array(
				'label' => esc_html__( 'Section Title Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-section-title .section-heading',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'label' => esc_html__( 'Desciption Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-section-title p',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			array(
				'label' => esc_html__( 'Section Title', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title-color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-section-title .section-heading' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .tt-section-title .tt-section-sab' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'description-color',
			array(
				'label'     => esc_html__( 'Description Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-section-title p' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render section title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'image', 'src', $settings['title-tag']['url'] );
		$this->add_render_attribute( 'image', 'srcset', $settings['title-tag']['url'] );
		$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['title-tag'] ) );
		$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['title-tag'] ) );
		$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'title-tag' );

		$align = $settings['align'];

		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );

		$this->add_render_attribute( 'section-heading', 'class', 'section-heading' );
		?>
		<div class="tt-section-title <?php echo esc_attr( $align ); ?>">
			<?php if ( $settings['display-upper-title'] == 'yes' ) { ?>
			<span class="tt-section-sab"><?php echo sprintf( '%1$s', esc_html( $settings['upper-title'] ) ); ?></span>
			<?php } ?>
			<?php if ( $settings['title-tag'] ) { ?>
				<div class="section-img"><a href="#"><?php echo $image_html; ?></a></div>
			<?php } ?>
			<?php if ( $settings['title'] ) { ?>
					<<?php echo esc_html( $settings['tag'] ); ?> <?php echo $this->get_render_attribute_string( 'section-heading' ); ?>><?php echo html_entity_decode( $settings['title'] ); ?></<?php echo esc_html( $settings['tag'] ); ?>>
			<?php } ?>
			<?php if ( $settings['description'] ) { ?>
				<p><?php echo html_entity_decode( $settings['description'] ); ?></P>
			<?php } ?>
		</div>  
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Section_Title() );
