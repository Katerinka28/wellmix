<?php
/**
 * Widget API: Elementer cms-block Widget
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor cms-block widget.
 * Elementor widget that displays a cms-block with the ability to control every
 * aspect of the cms-block design.
 * @since 1.0.0
 */
class Widget_tt_cms_block extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve cms-block widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Cms Block', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve cms-block widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Cms Block', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve cms-block widget icon.
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
	 * Register cms-block widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'cms-block',
			array(
				'label' => esc_html__( 'Page cms-block', 'printera' ),
			)
		);

		$this->add_control(
			'cms-block-image',
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
			'title',
			array(
				'label'       => esc_html__( 'Title', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => 'The Summer Sale',
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => 'All new for women`s',
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
				'label_block' => true,
				'default'     => 'Big Sale',
			)
		);

		$this->add_control(
			'btn-link',
			array(
				'label'       => esc_html__( 'Button URL', 'printera' ),
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
			'content-rev',
			array(
				'label'   => esc_html__( 'Content Order', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DEF',
				'options' => array(
					'DEF' => esc_html__( 'Default', 'printera' ),
					'REV'  => esc_html__( 'Reverse', 'printera' ),
				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'cms-font',
			array(
				'label' => esc_html__( 'Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-cms-block .cms-block-text .wpcms-block-content .cms-block-title',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_01',
				'label' => esc_html__( 'Sub Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-cms-block .cms-block-text .wpcms-block-content .cms-block-content',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography_02',
				'label' => esc_html__( 'Buttton Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-cms-block .cms-block-text .wpcms-block-content .button-cms-block .cms-block-button',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'servicebox-style',
			array(
				'label' => esc_html__( 'Color', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);


		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpcms-block-content .cms-block-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'content_color',
			array(
				'label'     => esc_html__( 'Content Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpcms-block-content .cms-block-content' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_title_color',
			array(
				'label'     => esc_html__( 'Button Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpcms-block-content .button-cms-block .cms-block-button' => 'color: {{VALUE}};',
				), 
			)
		);
		$this->add_control(
			'button_title_hv__color',
			array(
				'label'     => esc_html__( 'Button Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpcms-block-content .button-cms-block:hover .cms-block-button' => 'color: {{VALUE}};',
				), 
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-cms-block .cms-block-text .wpcms-block-content .button-cms-block .cms-block-button' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_bg_hv_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-cms-block .cms-block-text .wpcms-block-content .button-cms-block .cms-block-button::after' => 'background: {{VALUE}};',
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

		$this->add_render_attribute( 'image', 'src', $settings['cms-block-image']['url'] );
		$this->add_render_attribute( 'image', 'srcset', $settings['cms-block-image']['url'] );
		$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['cms-block-image'] ) );
		$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['cms-block-image'] ) );
		$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'cms-block-image' );

		$this->add_render_attribute( 'button-attr', 'class', 'cms-block-button btn btn-primary' );
		$this->add_render_attribute( 'button-attr', 'href', $settings['btn-link']['url'] );

		$this->add_render_attribute( 'text-box', 'class', 'cms-block-text' );
		$this->add_render_attribute( 'text-box', 'class', esc_attr( $settings['align'] ) );

		$content_rev = '';

		if($settings['content-rev'] == "REV"){ 
			$content_rev = 'content-reverce';
		}

		$output = '';
		$output .= '<div class="tt-cms-block '. $content_rev .'">';
			$output .= '<a href="#" class="cms-block-image">';
				$output .= $image_html;
			$output .= '</a>';
				$output .= '<div ' . $this->get_render_attribute_string( 'text-box' ) . '>';
					$output .= '<div class="wpcms-block-content">';
						
						$output .= '<div class="cms-block-content">'.$settings['content'].'</div>';
						$output .= '<div class="cms-block-title">'.$settings['title'].'</div>';
					
							$output .= '<div class="button-cms-block">';
								$output .= '<a ' . $this->get_render_attribute_string( 'button-attr' ) . '>';
								$output .= $settings['btn-text'];
								$output .= '</a>';
							$output .= '</div>';
				
					$output .= '</div>';
				$output .= '</div>';
		$output .= '</div>';
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_tt_cms_block() );