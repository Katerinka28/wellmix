<?php
/**
 * Widget API: Elementer Portfolio Widget
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Portfolio widget.
 * Elementor widget that displays a Portfolio with the ability to control every
 * aspect of the Portfolio design.
 * @since 1.0.0
 */
class Widget_Portfolio extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Portfolio widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Portfolio', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Portfolio widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Portfolio', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Portfolio widget icon.
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
	 * Register Portfolio widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {

		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'portfolio',
			array(
				'label' => esc_html__( 'Portfolio', 'printera' ),
			)
		);

		$this->add_control(
			'portfolio-style',
			array(
				'label'   => esc_html__( 'Portfolio Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'Portfolio-style-1' => esc_html__( 'Morden Style', 'printera' ),
					'Portfolio-style-2' => esc_html__( 'Classic Style', 'printera' ),
				),
				'default' => 'Portfolio-style-1',
			)
		);

		$this->add_control(
			'portfolio-type',
			array(
				'label'   => esc_html__( 'Portfolio Type', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'slider' => esc_html__( 'Slider', 'printera' ),
					'grid'   => esc_html__( 'Grid', 'printera' ),
				),
				'default' => 'slider',
			)
		);


		$this->add_control(
			'display-date',
			array(

				'label'   => esc_html__( 'Post Date', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
			)
		);

		$this->add_control(
			'post-number',
			array(
				'label'       => esc_html__( 'Products per Page', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default'     => '5',
			)
		);

		$this->add_control(
			'post-order',
			array(
				'label'   => esc_html__( 'Post Order', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => array(
					'DESC' => esc_html__( 'Descending', 'printera' ),
					'ASC'  => esc_html__( 'Ascending', 'printera' ),

				),

			)
		);

		$this->add_control(
			'portfolio-col',
			array(
				'label'     => esc_html__( 'Portfolio Slider Style', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'condition' => array(
					'portfolio-type' => 'grid',
				),
				'options'   => array(
					'col-md-12'                  => esc_html__( 'Column 1', 'printera' ),
					'col-md-6'                   => esc_html__( 'Column 2', 'printera' ),
					'col-xl-4 col-lg-6 col-md-6' => esc_html__( 'Column 3', 'printera' ),
					'col-lg-3 col-md-6'          => esc_html__( 'Column 4', 'printera' ),
				),
				'default'   => 'col-xl-4 col-lg-6 col-md-6',
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
				'condition'   => array(
					'portfolio-type' => 'slider',
				),
				'label_block' => true,
				'default'     => '3',
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
				'condition'   => array(
					'portfolio-type' => 'slider',
				),
				'label_block' => true,
				'default'     => '3',
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
				'condition'   => array(
					'portfolio-type' => 'slider',
				),
				'label_block' => true,
				'default'     => '3',
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
				'condition'   => array(
					'portfolio-type' => 'slider',
				),
				'label_block' => true,
				'default'     => '2',
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'     => esc_html__( 'Autoplay', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'condition' => array(
					'portfolio-type' => 'slider',
				),
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
				'condition' => array(
					'portfolio-type' => 'slider',
				),
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
				'condition' => array(
					'portfolio-type' => 'slider',
				),
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
				'condition' => array(
					'portfolio-type' => 'slider',
				),
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
				'condition' => array(
					'portfolio-type' => 'slider',
				),
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

	}

	/**
	 * Render Portfolio widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type'        => 'tt-portfolio',
			'post_status'      => 'publish',
			'posts_per_page'   => $settings['post-number'],
			'order'            => $settings['post-order'],
			'suppress_filters' => 0,
		);

		$the_query = new \WP_Query( $args );

		global $post;

		$this->add_render_attribute( 'owl-setting', 'data-dots', $settings['dots'] );
		$this->add_render_attribute( 'owl-setting', 'data-nav', $settings['arrow'] );
		$this->add_render_attribute( 'owl-setting', 'data-desk', $settings['desk-number'] );
		$this->add_render_attribute( 'owl-setting', 'data-laptop', $settings['laptop-number'] );
		$this->add_render_attribute( 'owl-setting', 'data-tablet', $settings['tablet-number'] );
		$this->add_render_attribute( 'owl-setting', 'data-mobile', $settings['mobile-number'] );
		$this->add_render_attribute( 'owl-setting', 'data-autoplay', $settings['autoplay'] );
		$this->add_render_attribute( 'owl-setting', 'data-loop', $settings['loop'] );
		$this->add_render_attribute( 'owl-setting', 'data-margin', $settings['margin']['size'] );

		$this->add_render_attribute(
			'attribute-owl',
			[
				'class' => [ 'owl-carousel portfolio-carousel', $settings['portfolio-style'] ]
			]
		);

		$this->add_render_attribute(
			'attribute',
			[
				'class' => ['portfolio-grid', $settings['portfolio-style'] ]
			]
		);

			$output = '';
			if ( 'slider' === $settings['portfolio-type'] ) {
				$output .= '<div '. $this->get_render_attribute_string( 'attribute-owl' ) .' ' . $this->get_render_attribute_string( 'owl-setting' ) . ' >';

					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();

							if ( has_post_thumbnail() ) {
								$output .= '<div class="tt-portfolio-thumbnail grid-item">';
									$output .= '<a href="' . get_permalink() . '">';
										$output .= get_the_post_thumbnail();
										$output .= '<span>'.get_the_title().'</span>';
									$output .= '</a>';
								$output .='</div>';
							}
						}
						wp_reset_postdata();
					}

				$output .= '</div>';
			}



			if ( 'grid' === $settings['portfolio-type'] ) {
				$output .= '<div '. $this->get_render_attribute_string( 'attribute' ) .'>';
				$output .= '<div class="row grid">';
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();

							if ( has_post_thumbnail() ) {
								$output .= '<div class="tt-portfolio-thumbnail col-sm-4 grid-item">';
									$output .= '<a href="' . get_permalink() . '">';
										$output .= get_the_post_thumbnail();
										$output .= '<span>'.get_the_title().'</span>';
									$output .= '</a>';
								$output .='</div>';
							}
						}
					}
					wp_reset_postdata();
				$output .= '</div>';
				$output .= '</div>';
			}

		
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				jQuery('.portfolio-carousel').each(function() {
					var $carousel = jQuery(this);
					$carousel.owlCarousel({
						items: $carousel.data("desk"),
						loop: $carousel.data("loop"),
						margin: $carousel.data("margin"),
						stagePadding: $carousel.data("padding"),
						nav: $carousel.data("nav"),
						dots: $carousel.data("dots"),
						autoplay: $carousel.data("autoplay"),
						center: $carousel.data("center"),
						info: $carousel.data("info"),
						animateOut: 'fadeOut',
						autoplayTimeout: $carousel.data("autoplay-timeout"),
						navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
						responsiveClass: true,
						responsive: {
							// breakpoint from 0 up
							0: {
								items: 1
							},
							// breakpoint from 320 up
							480: {
								items: $carousel.data("mobile")
							},
							// breakpoint from 576 up
							576: {
								items: $carousel.data("mobile")
							},
							// breakpoint from 992 up
							992: {
								items: $carousel.data("tablet")
							},
							// breakpoint from 1200 up
							1200: {
								items: $carousel.data("laptop")
							},
							// breakpoint from 1400 up
							1400: {
								items:$carousel.data("desk")
							}
						}
					});
				});
			</script>
			<?php
		endif;
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Portfolio() );
