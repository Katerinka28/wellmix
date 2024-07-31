<?php
/**
 * Widget API: Elementer Blog Widget
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor blog widget.
 * Elementor widget that displays a blog with the ability to control every
 * aspect of the blog design.
 * @since 1.0.0
 */
class Widget_Blog extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve blog widget name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Blog', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve blog widget title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blog', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve blog widget icon.
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
	 * Register blog widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	// @codingStandardsIgnoreStart
	protected function register_controls() {

		// @codingStandardsIgnoreEnd
		$this->start_controls_section(
			'Blog',
			array(
				'label' => esc_html__( 'Blog', 'printera' ),
			)
		);

		$this->add_control(
			'blog-style',
			array(
				'label'   => esc_html__( 'Blog Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'blog-style-1' => esc_html__( 'Style 1', 'printera' ),
				),
				'default' => 'blog-style-1',
			)
		);

		$this->add_control(
			'blog-type',
			array(
				'label'   => esc_html__( 'Blog Type', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'slider' => esc_html__( 'Slider', 'printera' ),
					'grid'   => esc_html__( 'Grid', 'printera' ),
				),
				'default' => 'slider',
			)
		);

		$this->add_control(
			'display-title',
			array(
				'label'   => esc_html__( 'Post Title', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
			)
		);

		$this->add_control(
			'display-category',
			array(

				'label'   => esc_html__( 'Post Category', 'printera' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'yes'     => esc_html__( 'yes', 'printera' ),
				'no'      => esc_html__( 'no', 'printera' ),
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
			'blog-col',
			array(
				'label'     => esc_html__( 'Blog Slider Style', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'condition' => array(
					'blog-type' => 'grid',
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
			'pagination',
			array(
				'label'     => esc_html__( 'Pagination', 'printera' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'true',
				'condition'   => array(
					'blog-type' => 'grid',
				),
				'options'   => array(
					'default' => 'Default',
					'infinite' => 'Infinite Scroll',
					'ajax' => 'Ajax Load Button',
				),
				'default' => 'default',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
					'blog-type' => 'slider',
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
			'blog_font',
			array(
				'label' => esc_html__( 'Blog Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Blog Title', 'printera' ),
				'selector' => '{{WRAPPER}} .blog-style .tt-post-details .tt-post-title h6',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography01',
				'label' => esc_html__( 'Blog Desciption', 'printera' ),
				'selector' => '{{WRAPPER}} .blog-style .tt-post-details .tt-post-content',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography02',
				'label' => esc_html__( 'Blog Button', 'printera' ),
				'selector' => '{{WRAPPER}} .blog-style .tt-post-more a',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography03',
				'label' => esc_html__( 'Blog Date', 'printera' ),
				'selector' => '{{WRAPPER}} .blog-style .tt-post-details .tt-post-meta, .blog-style .tt-post-thumbnail .tt-post-meta',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'blog-color-style',
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
					'{{WRAPPER}} .blog-style .tt-post-details .tt-post-content' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-details .tt-post-content:hover' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Desciption Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-details .tt-post-content' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'button_text_color',
			array(
				'label'     => esc_html__( 'Button text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-more a' => 'color: {{VALUE}};',
				), 
			)
		);
		$this->add_control(
			'button_text_border_color',
			array(
				'label'     => esc_html__( 'Button text Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-more a' => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_text_hv',
			array(
				'label'     => esc_html__( 'Button text Hover Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .page .blog-style .tt-post-more a:hover' => 'color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'button_text_border_hv',
			array(
				'label'     => esc_html__( 'Date Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .page .blog-style .tt-post-more a:hover' => 'border-color: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'date_bg_color',
			array(
				'label'     => esc_html__( 'Date Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-details .tt-post-meta, .blog-style .tt-post-thumbnail .tt-post-meta' => 'background: {{VALUE}};',
				), 
			)
		);

		$this->add_control(
			'content_bg_color',
			array(
				'label'     => esc_html__( 'Content Background Color', 'printera' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style .tt-post-wrapper .tt-post-details' => 'background: {{VALUE}};',
				), 
			)
		);


		$this->end_controls_section();

	}

	/**
	 * Render blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		global $post;
		$settings = $this->get_settings();
		$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'paged'            => $paged,
			'posts_per_page'   => $settings['post-number'],
			'order'            => $settings['post-order'],
			'suppress_filters' => 0,
		);

		$the_query = new \WP_Query( $args );

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

		/* $this->add_render_attribute(
			'attribute-owl',
			[
				'class' => ['owl-carousel blog-section','blog-style' , $settings['blog-style'] ]
			]
		); */

		$cat_class = '';

		if($settings['dots'] == "true"){ 
			$cat_class = 'swiper-bul';
		}

		$masonry = '';
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$tt_options = get_option( 'tt_options' );
			if(  !empty( $tt_options['blog-masonry'] ) == 1 ){
				$masonry = "grid";
			}
		}

		$output = '';
			if ( 'slider' === $settings['blog-type'] ) {
				$output .= '<div class="swiper-blog-wrap">';
					$output .= '<div class="swiper blog-section blog-slider blog-style '.$settings['blog-style'].' '.$cat_class.'" data-id = "blog-section" >';
						$output .= '<div '. $this->get_render_attribute_string( 'carousel-setting' ) .'>';
							if ( $the_query->have_posts() ) {
								while ( $the_query->have_posts() ) {
									$the_query->the_post();
									$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'tt_blog_415x500' );
									$tt_info = get_the_author_meta( 'tt_info' );
										$output .= '<div class="swiper-slide">';
										$output .= '<div class="tt-post-wrapper float-start w-100">';
											if ( has_post_thumbnail() ) {
												$output .= '<div class="tt-post-thumbnail position-relative">';
													$output .= '<a href="' . get_permalink() . '"><img alt="blog" class="img-fluid" src="' . esc_url( $full_image[0] ) . '"></a>';
													if($settings['blog-style'] == "blog-style-1"){
														if( $settings['display-date'] == "yes" ){
														$output .= '<div class="post-meta-wrap position-absolute">';	
															$output .= '<div class="tt-post-meta">';
																	$output .= sprintf( '%s', get_the_date() );
															$output .='</div>';
														$output .='</div>';
														}
													}
												$output .='</div>';
											}
											$output .='<div class="tt-post-details ">';		
												if( ! empty( get_the_title() ) ){
													if( $settings['display-title'] == "yes" ){
														$output .= '<div class="tt-post-title">';
															$output .= '<h6><a class="testtest" href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
																$output .= get_the_title();
															$output .='</a></h6>';
														$output .='</div>';
													}
												}
												if( ! empty( get_the_content() ) ){
													$output .= '<div class="tt-post-content">';
														$output .= substr(get_the_excerpt(), 0,100);
													$output .='</div>';
												}
												$output .='<div class="tt-post-more float-start">';
													$output .='<a href="'. get_permalink() .'" class="position-relative">'. esc_html__('Read More','printera') .'</a>';
												$output .='</div>';
											$output .='</div>';
										$output .='</div>';
										$output .='</div>';
									wp_reset_postdata();
								}
							}	
						$output .= '</div>';	
					$output .= '</div>';
					
					if($settings['dots'] == "true"){
						$output .= '<div class="swiper-pagination"></div>';
					}
	
					if($settings['arrow'] == "true"){
						$output .= '<div class="swiper-navigation">';
							$output .= '<div class="swiper-button swiper-button-prev"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></div>';
							$output .= '<div class="swiper-button swiper-button-next"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></div>';
						$output .= '</div>';
					}
				$output .= '</div>';
			}

			if ( 'grid' === $settings['blog-type'] ) {
				$output .= '<div class="swiper blog-section swiper-slider blog-style '.$settings['blog-style'].' '.$cat_class.'" data-id = "blog-section" >';

					$output .= '<div '. $this->get_render_attribute_string( 'attribute' ) .'>';
					$output .= '<div class="row">';
						if ( $the_query->have_posts() && $settings['pagination'] == "default" ) {
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$full_image  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
								$tt_info  = get_the_author_meta( 'tt_info' );
								$designation = get_post_meta( get_the_ID(), 'author_designation', true );
								$output .= '<div class="tt-post-wrapper grid-item float-start '. $settings['blog-col'] .'">';
									if ( has_post_thumbnail() ) {
										$output .= '<div class="tt-post-thumbnail position-relative">';
											$output .= '<a href="' . get_permalink() . '"><img alt="blog" class="img-fluid" src="' . esc_url( $full_image[0] ) . '"></a>';
											if($settings['blog-style'] == "blog-style-1"){
												if( $settings['display-date'] == "yes" ){
													$output .= '<div class="post-meta-wrap position-absolute">';	
														$output .= '<div class="tt-post-meta">';
															$output .= sprintf( '%s', get_the_date() );
														$output .='</div>';
													$output .='</div>';
												}
											}
										$output .='</div>';
									}
									$output .='<div class="tt-post-details">';		
										if( ! empty( get_the_title() ) ){
											$output .= '<div class="tt-post-title">';
											$output .= '<h6><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
											$output .= get_the_title();
											$output .='</a></h6>';
											$output .='</div>';
										}
										if( ! empty( get_the_content() ) ){
											$output .= '<div class="tt-post-content">';
												$output .= substr(get_the_excerpt(), 0,100);
											$output .='</div>';
										}
										$output .='<div class="tt-post-more float-start">';
											$output .='<a href="'. get_permalink() .'" class="position-relative">'. esc_html__('Read More','printera') .'</a>';
										$output .='</div>';
									$output .='</div>';
								$output .='</div>';
							}
						}
						if( $settings['pagination'] == "default" ){
							$output .= '<div class="col-md-12 col-sm-12">';
								$output .= '<div class="pagination justify-content-center">';
									$output .= '<nav aria-label="Page navigation">';
										$total_pages = $the_query->max_num_pages;
										if ( $total_pages > 1 ) {
											$current_page = max( 1, get_query_var( 'paged' ) );
											$output      .= paginate_links(
												array(
													'base'      => get_pagenum_link( 1 ) . '%_%',
													'format'    => '/page/%#%',
													'current'   => $current_page,
													'total'     => $total_pages,
													'type'      => 'list',
													'prev_text' => wp_kses( '<span aria-hidden="true"></span>', 'printera' ),
													'next_text' => wp_kses( '<span aria-hidden="true"></span>', 'printera' ),
												)
											);
										};
									$output .= '</nav>';
								$output .= '</div>';
							$output .= '</div>';
						}
						if( $settings['pagination'] == "infinite" ){
							?>
							<div class="col-md-12 content">
								<div class = "inner-box content no-right-margin darkviolet">
									<script>
										jQuery(document).ready(function($) {
											// This is required for AJAX to work on our page
											var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

											function cvf_load_all_posts(page, col = "<?php echo $settings['blog-col']; ?>"){
												// Start the transition
												$(".cvf_pag_loading").fadeIn().css('background','#ccc');

												// Data to receive from our server
												// the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 
												var data = {
													page: page,
													col: col,
													action: "loadmore_postSC",
													post_per_page: <?php echo $settings['post-number']; ?>,
												};

												// Send the data
												$.post(ajaxurl, data, function(response) {
													// If successful Append the data into our html container
													$(".tt-pagination-nav").remove();
													$(".tt-universal-content").append(response);
													// End the transition
													$(".cvf_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
												});
											}

											// Load page 1 as the default
											cvf_load_all_posts(1);

											jQuery(document).scroll(postLodaMore_liveScroll);
											var viewed = false;

											function isScrolledPost_live(elem) {
												var docViewTop = jQuery(window).scrollTop();
												var docViewBottom = docViewTop + jQuery(window).height() - 150;
										
												var elemTop = jQuery(elem).offset().top;
												var elemBottom = elemTop + jQuery(elem).height();
										
												return ((elemBottom <= docViewBottom));
											}

											function postLodaMore_liveScroll() {
												if (isScrolledPost_live(jQuery(".tt-universal-pagination li.active")) && !viewed) { 
													viewed = true;
													var page = $('li.active').attr('p');
													cvf_load_all_posts(page);
												}
											}
										}); 
									</script>
									<div <?php echo $this->get_render_attribute_string( 'attribute' ) ?>>
										<div class = "cvf_pag_loading tt-universal-content row"></div>
									</div>
								</div>      
							</div>
							<?php
						}
						if( $settings['pagination'] == "ajax" ){
							?>
							<div class="col-md-12 content">
								<div class = "inner-box content no-right-margin darkviolet">
									<script>
										jQuery(document).ready(function($) {
											// This is required for AJAX to work on our page
											var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

											function cvf_load_all_posts(page, col = "<?php echo $settings['blog-col']; ?>" ){
												// Start the transition
												$(".cvf_pag_loading").fadeIn().css('background','#ccc');

												// Data to receive from our server
												// the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 
												var data = {
													page: page,
													col: col,
													post_per_page: <?php echo $settings['post-number']; ?>,
													action: "loadmore_postSC"
												};

												// Send the data
												$.post(ajaxurl, data, function(response) {
													// If successful Append the data into our html container
													$(".tt-pagination-nav").remove();
													$(".tt-universal-content").append(response);
													// End the transition
													$(".cvf_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
												});
											}

											// Load page 1 as the default
											cvf_load_all_posts(1);

											// Handle the clicks
											jQuery(document).on('click','.tt-universal-pagination li.active',function(){
												var page = $(this).attr('p');
												cvf_load_all_posts(page);

											});

										}); 
									</script>
									<div <?php echo $this->get_render_attribute_string( 'attribute' ) ?>>
										<div class = "cvf_pag_loading tt-universal-content row"></div>
									</div>      
								</div>      
							</div>
							<?php
						}

						wp_reset_postdata();
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
			}
		
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			?>
			<script>
				if( jQuery('div').hasClass('blog-section') ){
					$this = jQuery('.swiper.blog-section');
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

					mySwiper = new Swiper('.swiper.blog-section', {
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
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Blog() );
