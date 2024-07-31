<?php
/**
 * Widget API: Elementer Product by Categories Widget
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$product_categories = array();
$prod_categories = get_terms( 'product_cat', array(
	'orderby'    => 'name',
	'order'      => 'ASC',
	'parent'	 => 0,
	'hide_empty' => true
));
foreach( $prod_categories as $prod_cat ) :	
	$product_categories[] =$prod_cat->name;			
endforeach;

/**
 * Elementor Product by Categories widget.
 * Elementor widget that displays a Product by Categories with the ability to control every
 * aspect of the Product by Categories design.
 * @since 1.0.0
 */
class Widget_printera_Product_by_categories extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Product by Categories widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Product By Categories', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Product by Categories widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product By Categories', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Product by Categories widget icon.
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
	 * Register Product by Categories widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {

		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Product by Categories',
			array(
				'label' => esc_html__( 'Product by Categories', 'printera' ),
			)
		);

		$this->add_control(
			'category-title',
			array(
				'label'       => esc_html__( 'Title', 'printera' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
				'default' => esc_html__( 'Product by Categoriess', 'printera' ),
			)
		);

		$this->add_control(
			'row-style',
			array(
				'label'   => esc_html__( 'Carousel Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'row-01' => esc_html__( 'Row 1', 'printera' ),
					'row-02' => esc_html__( 'Row 2 [ More Than 4 Product ]', 'printera' ),
				),
				'default' => 'row-01',
			)
		);

		$this->add_control(
			'hover-style',
			array(
				'label'   => esc_html__( 'Hover Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'hover-01' => esc_html__( 'Hover List', 'printera' ),
					'hover-02' => esc_html__( 'Hover Grid', 'printera' ),
				),
				'default' => 'hover-01',
			)
		);

		$this->add_control(
			'banner-image',
			array(
				'label'     => esc_html__( 'Choose Banner', 'tt' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => array(
					'active' => true,
				),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'taxonomies',
			array(
				'label' 	=> esc_html__( 'Select Categories', 'plugin-name' ),
				'type' 		=>Controls_Manager::SELECT,
				'multiple' 	=> true,
				'options' 	=> $this->get_product_categories(),
			)
		);

		$repeater->add_control(
			'image',
			array(
				'label'     => esc_html__( 'Choose Banner', 'tt' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => array(
					'active' => true,
				),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'product-number',
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
			'categories-tabs',
			array(
				'label'  => esc_html__( 'Categories Items', 'tt' ),
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
			'Product_by_Categories_style',
			array(
				'label' => esc_html__( 'Product by Categories Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-title .post-min-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-title .post-min-title a:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'price_color',
			array(
				'label'     => esc_html__( 'Price Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .printera-post .post-details .post-title .post-min-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	protected function get_product_categories() {
	
		$taxonomies = get_categories(  
			array( 
				'taxonomy' => 'product_cat',
				'orderby' => 'name',
			)
		);

		$options = [ '' => '' ];

		foreach ( $taxonomies as $taxonomy ) {
			$options[ $taxonomy->cat_ID ] = $taxonomy->name;
		}

		return $options;
	}

	/**
	 * Render Product by Categories widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		global $wpml;

		$tabs = $this->get_settings_for_display( 'categories-tabs' );

		$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

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
		$this->add_render_attribute( 'carousel-setting', 'data-margin', $settings['margin']['size'] );

		$this->add_render_attribute(
			'attribute',
			[
				'class' => ['product-by-category', 'row', $settings['style'], $settings['row-style'] ]
			]
		);

		$i=1;
		$output = '';

		$prod_categories = get_terms( 'product_cat', array(
			'orderby'    => 'name',
			'order'      => 'ASC',
			// 'parent'	 => 0,
			'hide_empty' => true
		));
		?>

		<div id="product-by-categories" <?php echo $this->get_render_attribute_string( 'attribute' ); ?>>

			<div class="category-banner col-5 col-lg-3 d-md-block d-none">
				<?php 
					$this->add_render_attribute( 'image', 'src', $settings['banner-image']['url'] );
					$this->add_render_attribute( 'image', 'srcset', $settings['banner-image']['url'] );
					$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['banner-image'] ) );
					$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['banner-image'] ) );
					$bg_image = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'banner-image' );

					echo $bg_image;
				?>
			</div>
			<div class="section-cat-wrap col-md-7 col-lg-9 col-12">
				<div class="title-wrap">

					<?php
					if( ! empty( $settings['category-title'] ) ){ ?>
						<div class="product-title">
							<h2 class="section-heading"><?php echo $settings['category-title']; ?></h2>
						</div>
					<?php } ?>
					<ul>
						<?php
						foreach ( $tabs as $index => $item ) {
							$term_id = $item['taxonomies'];
							if( !empty( $term_id ) ){
								?>
								<li><a href="#<?php echo 'productby-'.$item['taxonomies']; ?>"><?php echo get_term( $term_id )->name; ?></a></i>
								<?php
							}
						} ?>
					</ul>

				</div>
				
				<?php
				foreach ( $tabs as $index => $item ) {
					$product_per_page = $item['product-number'];
					if( !empty( $item['taxonomies'] ) ){
						$args = array(
							'post_type'             => 'product',
							'post_status'           => 'publish',
							'ignore_sticky_posts'   => 1,
							'posts_per_page'        => $product_per_page,
							'tax_query'             => array(
								array(
									'taxonomy'  => 'product_cat',
									'field'     => 'term_id',
									'terms'     =>  $item['taxonomies'],
									'operator'  => 'IN',
								)
							)
						);

						$devide = 1;	
						$loop = new \WP_Query($args);
						$count = $loop->found_posts;	
						
						$this->add_render_attribute( 'image', 'src', $item['image']['url'] );
						$this->add_render_attribute( 'image', 'srcset', $item['image']['url'] );
						$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $item['image'] ) );
						$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $item['image'] ) );
						$banner_image = Group_Control_Image_Size::get_attachment_image_html( $item, 'thumbnail', 'image' );
						?>
						<div class="swiper productBy-category productby-<?php echo $item['taxonomies']; ?> <?php echo $settings['hover-style']; ?>" data-id = "productby-<?php echo $item['taxonomies']; ?>" id="productby-<?php echo $item['taxonomies']; ?>" >
							<?php //echo $banner_image; ?>
							<div <?php echo $this->get_render_attribute_string( 'carousel-setting' ); ?> >
								<?php																
								if ( $loop->have_posts() ) {
									while ( $loop->have_posts() ) : $loop->the_post();

									if( $count < 4 || $settings['row-style'] == "row-01" ){
										echo '<div class="swiper-slide">';
									}

										if( $count >= 4 && $settings['row-style'] == "row-02"){
											if( $devide%2 != 0 ){
												echo '<div class="swiper-slide row-02">';
												echo '<div class="item">';
											}
		
												wc_get_template_part( 'content', 'product' );
												
											if( $devide%2 == 0 ){
												echo '</div>';
												echo '</div>';
												$devide = 0;
											}
										}else{
											wc_get_template_part( 'content', 'product' );
										}

									if( $count < 4 || $settings['row-style'] == "row-01" ){
										echo '</div>';	
									}	

									$devide++;
									endwhile;

									if( $devide%2 == 0 &&  $count >= 4 ){
										echo '</div>';
										echo '</div>';
									}

								} else {
									echo esc_html__( 'No products found' );
								}
								wp_reset_postdata(); ?>
							</div>
						</div><?php
					}
				} ?>
			</div>
		</div>
			

		<?php
		// echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				jQuery( "#product-by-categories" ).tabs();
				if( jQuery('div').hasClass('productBy-category') ){

						$this = jQuery('.swiper.productBy-category');

						var direction = $this.find( '.swiper-wrapper' ).data('direction');
						var desktop = $this.find( '.swiper-wrapper' ).data('desk');
						var laptop = $this.find( '.swiper-wrapper' ).data('laptop');
						var tablet = $this.find( '.swiper-wrapper' ).data('tablet');
						var mobile = $this.find( '.swiper-wrapper' ).data('mobile');
						var autoplay = $this.find( '.swiper-wrapper' ).data('autoplay');
						var loop = $this.find( '.swiper-wrapper' ).data('loop');
						var speed = $this.find( '.swiper-wrapper' ).data('speed');
						var margin = $this.find( '.swiper-wrapper' ).data('margin');

						var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";

						mySwiper = new Swiper('.swiper.productBy-category', {
							direction: direction,
							spaceBetween: margin,
							loop: loop,
							autoplay: autoplay,
							speed : speed,

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
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_printera_Product_by_categories() );
