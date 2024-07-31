<?php
/**
 * Widget API: Elementer hotspot Widget
 * @package printera
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor hotspot widget.
 * Elementor widget that displays a hotspot with the ability to control every
 * aspect of the hotspot design.
 * @since 1.0.0
 */
class Widget_hotspot_custom extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve hotspot widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Hotspot Template', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve hotspot widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Hotspot Template', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve hotspot widget icon.
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
		return 'eicon-image-hotspot';
	}

	/**
	 * Register hotspot widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {

		$this->start_controls_section(
			'section_content_general',
			array(
				'label' => esc_html__( 'General', 'printera' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'image_source',
			[
				'label'       => esc_html__( 'Image Source', 'printera' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'image',
				'description' => esc_html__( 'Select Border Shape.', 'printera' ),
				'options'     => [
					'image' => esc_html__( 'Image', 'printera' ),
					'link'  => esc_html__( 'External Link', 'printera' ),
				],
			]
		);
		
		$this->add_control(
			'hotspot_box_img',
			[
				'label'       => esc_html__( 'Hotspot Image', 'printera' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'Upload image.', 'printera' ),
				'dynamic'     => [
					'active' => false,
				],
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => [
					'image_source' => 'image',
				],
			]
		);
		
		$this->add_control(
			'hotspot_box_img_link',
			[
				'label'       => esc_html__( 'Hotspot Image Link', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Please enter image external link', 'printera' ),
				'condition'   => [
					'image_source' => 'link',
				],
			]
		);
		
		$this->add_control(
			'pointer_style',
			array(
				'label'       => esc_html__( 'Pointer Style', 'printera' ),
				'type'        => 'select_image',
				'description' => esc_html__( 'Select Pointer Style.', 'printera' ),
			)
		);
		
		$this->add_control(
			'hotspot_trigger',
			[
				'label'       => esc_html__( 'Trigger', 'printera' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'hover',
				'description' => esc_html__( 'Select trigger.', 'printera' ),
				'options'     => [
					'hover' => esc_html__( 'Hover', 'printera' ),
				],
			]
		);
		
		$this->add_control(
			'hotspot_color_scheme',
			[
				'label'       => esc_html__( 'Color Scheme', 'printera' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'light-bg',
				'description' => esc_html__( 'Select Color Scheme.', 'printera' ),
				'options'     => [
					'light-bg' => esc_html__( 'Light', 'printera' ),
					'dark-bg'  => esc_html__( 'Dark', 'printera' ),
					'theme-bg' => esc_html__( 'Theme', 'printera' ),
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_list_items',
			array(
				'label' => esc_html__( 'List Items', 'printera' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_responsive_control(
			'position-horizontal',
			[
				'label'       => esc_html__( 'Position Horizontal', 'printera' ),
				'type'        => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Please select Height Between 1 to 20.', 'printera' ),
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 100,
						'step' => 0.1,
					],
				],
				'default'     => [
					'size' => 50,
				],
				'selectors'   => [
					'{{WRAPPER}} {{CURRENT_ITEM}} ' => 'left:calc( {{SIZE}}% - 28px);',
				],
				'description' => esc_html__( 'Define hotspot position on background image for horizontal view. By clicking on Set Position  button you can drag the hotspot point to the desired position.', 'printera' ),
			]
		);
		
		$repeater->add_responsive_control(
			'position-vertical',
			[
				'label'       => esc_html__( 'Position Vertical', 'printera' ),
				'type'        => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Please select Height Between 1 to 20.', 'printera' ),
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 100,
						'step' => 0.1,
					],
				],
				'default'     => [
					'size' => 50,
				],
				'selectors'   => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top:calc({{SIZE}}% - 28px);',
				],
				'description' => esc_html__( 'Define hotspot position on background image for Vertical view. By clicking on Set Position  button you can drag the hotspot point to the desired position.', 'printera' ),
			]
		);
		
		$repeater->add_control(
			'hotspot_product_id',
			[
				'label'       => esc_html__( 'Product Id', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the product id.', 'printera' ),
			]
		);
		
		$repeater->add_control(
			'hotspot_list_direction',
			[
				'label'       => esc_html__( 'Direction', 'printera' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'right',
				'description' => esc_html__( 'Select Direction position.', 'printera' ),
				'options'     => [
					'up'    => esc_html__( 'Up', 'printera' ),
					'right' => esc_html__( 'Right', 'printera' ),
					'left'  => esc_html__( 'Left', 'printera' ),
					'down'  => esc_html__( 'Down', 'printera' ),
				],
			]
		);
		
		$this->add_control(
			'list_items',
			array(
				'label'       => esc_html__( 'List Items', 'printera' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				// 'title_field' => '{{{ hotspot_list_title }}}',
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

		$hotspot_image        = '';
		$list_items           = isset( $settings['list_items'] ) ? $settings['list_items'] : '';
		$hotspot_trigger      = isset( $settings['hotspot_trigger'] ) ? $settings['hotspot_trigger'] : '';
		$pointer_style        = isset( $settings['pointer_style'] ) ? $settings['pointer_style'] : 'style-1';
		$image_source         = isset( $settings['image_source'] ) ? $settings['image_source'] : '';
		$hotspot_color_scheme = isset( $settings['hotspot_color_scheme'] ) ? $settings['hotspot_color_scheme'] : '';
		$hotspot_box_img_link = isset( $settings['hotspot_box_img_link'] ) ? $settings['hotspot_box_img_link'] : '';
		$hotspot_box_img      = isset( $settings['hotspot_box_img']['id'] ) ? $settings['hotspot_box_img']['id'] : '';

		if ( ! is_array( $list_items ) || ! $list_items || ( ( count( $list_items ) === 1 ) && ! $list_items[0] ) ) {
			return;
		}

		$pointer_class = 'hotspot-dot dot-' . str_replace( '-', '', $pointer_style );
		if ( 'link' === $image_source && $hotspot_box_img_link ) {
			$hotspot_image = $hotspot_box_img_link;
		} elseif ( $hotspot_box_img ) {
			$hotspot_image_data = wp_get_attachment_image_src( $hotspot_box_img, 'full' );
			$hotspot_image      = $hotspot_image_data[0];
		}
		?>
		<div <?php $this->print_render_attribute_string( 'widget_wrapper' ); ?>>
			<?php
			if ( $hotspot_image ) {
				?>
				<div class="image-hotspot-wrapper">
					<div class="image-hotspot">
						<img src="<?php echo esc_url( $hotspot_image ); ?>"/>
						<?php
						if ( $list_items ) {
							?>
							<div class="hotspot-contents-wrapper">
								<?php
								foreach ( $list_items as $list_item ) {

									$list_classes   = array();
									$list_classes[] = 'image-hotspot';
									$list_classes[] = 'hotspot-' . $hotspot_color_scheme;
									$list_classes[] = 'elementor-repeater-item-' . $list_item['_id'];

									if ( isset( $list_item['hotspot_desktop'] ) && 'true' === $list_item['hotspot_desktop'] ) {
										$list_classes[] = 'hide-desktop';
									}
									if ( isset( $list_item['hotspot_mobile'] ) && 'true' === $list_item['hotspot_mobile'] ) {
										$list_classes[] = 'hide-mobile';
									}
									if ( 'click' === $hotspot_trigger ) {
										$list_classes[] = 'trigger-click';
									} else {
										$list_classes[] = 'trigger-hover';
									}
									$list_classes = implode( ' ', $list_classes );

									if ( array_key_exists( 'hotspot_product_id', $list_item ) ) {
										?>
										<div class="<?php echo esc_attr( $list_classes ); ?>">
											<div class="<?php echo esc_attr( $pointer_class ); ?>">

											<div class="promo-video">
											<div class="waves-block">
												<div class="waves wave-1"></div>
												<div class="waves wave-2"></div>
											</div>
											</div>

											<div class="hotspot-button">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
											</div>
											</div>
											<div class="hotspot-content hotspot-dropdown-<?php echo esc_attr( $list_item['hotspot_list_direction'] ); ?>">
												<?php
													global $product;
													$product = wc_get_product( $list_item['hotspot_product_id'] );
													
													$title = $product->get_title();
													$price = $product->get_price_html();
													$thumb = get_the_post_thumbnail_url( $list_item['hotspot_product_id'] );
													$url = get_permalink( $list_item['hotspot_product_id'] );						
												?>
												<a href="<?php echo esc_url( $url ); ?>" class="product_url">
													<div class="hotspot-content-image"><img src="<?php echo esc_url( $thumb ); ?>"/></div>
													<h6 class="hotspot-title"><?php echo esc_html( $title ); ?></h6>
													<div class="hotspot-content-price"><?php echo html_entity_decode( $price ); ?></div>
												</a>

											</div>
										</div>
										<?php
									}
								}
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php 
			}
			?>
		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_hotspot_custom() );
