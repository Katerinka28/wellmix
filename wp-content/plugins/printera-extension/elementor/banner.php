<?php
/**
 * Widget API: Elementer Banner Widget
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor banner widget.
 * Elementor widget that displays a banner with the ability to control every
 * aspect of the banner design.
 * @since 1.0.0
 */
class Widget_Banner extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve banner widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Banner', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve banner widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Banner', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve banner widget icon.
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
	 * Register banner widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {
		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'banner',
			array(
				'label' => esc_html__( 'Page Banner', 'printera' ),
			)
		);

		$this->add_control(
			'banner-image',
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
			'sub-title',
			array(
				'label'       => esc_html__( 'Sub title', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => 'Exclusive Collection 2023',
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
			'display-tag',
			array(
				'label'     => esc_html__( 'Use Tag', 'printera' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'yes'       => esc_html__( 'yes', 'printera' ),
				'no'        => esc_html__( 'no', 'printera' ),
			)
		);

		$this->add_control(
			'tag',
			array(
				'label'       => esc_html__( 'Tag', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'condition'   => array(
					'display-tag' => 'yes',
				),
				'label_block' => true,
				'default'     => 'Big Sale',
			)
		);

		$this->add_control(
			'display-button',
			array(
				'label'     => esc_html__( 'Use Button', 'printera' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'yes'       => esc_html__( 'yes', 'printera' ),
				'no'        => esc_html__( 'no', 'printera' ),
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
					'display-button' => 'yes',
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
				'condition'   => array(
					'display-button' => 'yes',
				),
				'placeholder' => esc_html__( 'https://your-link.com', 'printera' ),
				'default'     => array(
					'url' => '#',
				),
			)
		);

		$this->add_control(
			'button-style',
			array(
				'label' 	=> esc_html__( 'Button Style', 'nora' ),
				'type' 		=>Controls_Manager::SELECT,
				'condition'   => array(
					'display-button' => 'yes',
				),
				'default' => 'rectangle',
				'options' => array(
					'circle' => esc_html__( 'Circle', 'nora' ),
					'rectangle' => esc_html__( 'Rectangle', 'nora' ),
				),
			)
		);

		$this->add_control(
			'text-position',
			array(
				'label'   => esc_html__( 'Text Position', 'printera' ),
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
			'banner_font',
			array(
				'label' => esc_html__( 'Banner Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-banner .banner-text .banner-title',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'label' => esc_html__( 'SubTitle Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-banner .banner-text .banner-sub-title',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'tag_typography',
				'label' => esc_html__( 'Tag Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-banner .banner-tag a',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'btn_typography',
				'label' => esc_html__( 'Button Font', 'printera' ),
				'selector' => '{{WRAPPER}} .tt-banner .banner-text a.banner-button',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'banner-style',
			array(
				'label' => esc_html__( 'Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'sub_title_color',
			array(
				'label'     => esc_html__( 'Sub Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpbanner-content .banner-sub-title' => 'color: {{VALUE}};',
				), 
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpbanner-content .banner-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_bg_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-banner .banner-text a.banner-button' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_title_color',
			array(
				'label'     => esc_html__( 'Button Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-banner .banner-text a.banner-button' => 'color: {{VALUE}};',
				), 
			)
		);
		$this->add_control(
			'button_bg_hv_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-banner .banner-text a.banner-button:after' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_title_hv__color',
			array(
				'label'     => esc_html__( 'Button Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .tt-banner .banner-text a.banner-button:hover' => 'color: {{VALUE}};',
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

		$this->add_render_attribute( 'image', 'src', $settings['banner-image']['url'] );
		$this->add_render_attribute( 'image', 'srcset', $settings['banner-image']['url'] );
		$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['banner-image'] ) );
		$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['banner-image'] ) );
		$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'banner-image' );

		$this->add_render_attribute( 'button-attr', 'class', 'banner-button btn btn-primary' );
		$this->add_render_attribute( 'button-attr', 'href', $settings['btn-link']['url'] );

		$this->add_render_attribute( 'text-box', 'class', 'banner-text' );
		$this->add_render_attribute( 'text-box', 'class', esc_attr( $settings['text-position'] ) );
		$this->add_render_attribute( 'text-box', 'class', esc_attr( $settings['align'] ) );

		$output = '';
		$button_style = '';

		if($settings['button-style'] == "circle"){
			$button_style = 'circle-button';
		}

		$output .= '<div class="tt-banner">';		
			$output .= '<a href="#" class="banner-image">';
				$output .= $image_html;
			$output .= '</a>';
			if($settings['display-tag'] == "yes"){
				$output .= '<div class="banner-tag"><a href="#" class="btn btn-secondary">'.$settings['tag'].'</a></div>';
			}
			$output .= '<div ' . $this->get_render_attribute_string( 'text-box' ) . '>';
				$output .= '<div class="wpbanner-content">';
					if($settings['sub-title']){
						$output .= '<div class="banner-sub-title">'.$settings['sub-title'].'</div>';
					}
					if($settings['title']){
						$output .= '<div class="banner-title">'.$settings['title'].'</div>';
					}
					if($settings['display-button'] == "yes"){
						$output .= '<div class="button-banner-wrap '.$button_style.'">';
							$output .= '<a ' . $this->get_render_attribute_string( 'button-attr' ) . '>';
							$output .= $settings['btn-text'];
							$output .= '</a>';
						$output .= '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Banner() );
