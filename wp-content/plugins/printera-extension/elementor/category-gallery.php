<?php
/**
 * Widget API: Elementer Category Gallery
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
 * Elementor Category Gallery.
 * Elementor widget that displays a category with the ability to control every
 * aspect of the category design.
 * @since 1.0.0
 */
class Widget_Category_Gallery extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve Category Gallery name.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return esc_html__( 'Category Gallery', 'printera' );
	}

	/**
	 * Get widget title.
	 * Retrieve Category Gallery title.
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Category Gallery', 'printera' );
	}

	/**
	 * Get widget icon.
	 * Retrieve Category Gallery icon.
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
	 * Register Category Gallery controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'category-gallery',
			array(
				'label' => esc_html__( 'Category Gallery', 'printera' ),
			)
		);

		$this->add_control(
			'gallery-style',
			array(
				'label'   => esc_html__( 'Category Gallery Style', 'printera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'gallery-02',
				'options' => array(
					'gallery-01' => esc_html__( 'Default Style', 'printera' ),
					'gallery-02' => esc_html__( 'Morden Style', 'printera' ),
				),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Category Title', 'plugin-name' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Shop By Categories', 'plugin-name' ),
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
				'default'     => esc_html__( 'Top Categories', 'printera' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'plugin-name' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Add our new arrivals tp your weekly lineup', 'plugin-name' ),
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
			'btn-text',
			array(
				'label'   => esc_html__( 'Button Text', 'printera' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View All Collection', 'printera' ),
			)
		);

		$this->add_control(
			'btn-link',
			array(
				'label'       => esc_html__( 'Button URL', 'printera' ),
				'type'        => \Elementor\Controls_Manager::URL,
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
			'prod_cat',
			array(
				'label' 	=> esc_html__( 'Select Categories', 'printera' ),
				'type' 		=> Controls_Manager::SELECT,
				'multiple' 	=> true,
				'options' 	=> $this->get_product_categories(),
				'default' 	=> 'jewelry',
			)
		);

		$repeater->add_control(
			'gallery',
			array(
				'label' 	=> esc_html__( 'Select Images', 'printera' ),
				'type' 		=> Controls_Manager::GALLERY,
				'default' => [],
				'limit' => 5
			)
		);

		$this->add_control(
			'tabs',
			array(
				'label'  => esc_html__( 'List Gallery', 'printera' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_font',
			array(
				'label' => esc_html__( 'Category Gallery Font', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label' => esc_html__( 'Title Font', 'printera' ),
				'selector' => '{{WRAPPER}} .category-gallary-title .section-heading',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'desc_typography',
				'label' => esc_html__( 'Desciption Font', 'printera' ),
				'selector' => '{{WRAPPER}} .category-gallary-title p',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'gallary_style',
			array(
				'label' => esc_html__( 'Gallary Style', 'printera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

			$this->add_control(
				'title-color',
				array(
					'label'     => esc_html__( 'Title Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .category-gallary-title .tt-section-title .section-heading' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'subtitle-color',
				array(
					'label'     => esc_html__( 'Sub Title Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .category-gallary-title .tt-section-title .tt-section-sab' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'description-color',
				array(
					'label'     => esc_html__( 'Description Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .category-gallary-title .tt-section-title p' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'category-title-color',
				array(
					'label'     => esc_html__( 'Category Title Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} #gallary_tabs .category-name-wrap li a, #gallary_tabs.gallery-02 .category-name-wrap > li.active.category-name > a' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'category-title-hv-color',
				array(
					'label'     => esc_html__( 'Title Hover Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} #gallary_tabs .category-name-wrap li a:hover' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'border-color',
				array(
					'label'     => esc_html__( 'Border Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} #gallary_tabs .category-name-wrap li a::before' => 'background: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'button-text-color',
				array(
					'label'     => esc_html__( 'Button Text Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} #gallary_tabs .category-button a' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'button-border-color',
				array(
					'label'     => esc_html__( 'Button Border Color', 'printera' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} #gallary_tabs .category-button a::after' => 'color: {{VALUE}};',
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
	 * Render Category Gallery output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$align = $settings['align'];

		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );

		$this->add_render_attribute( 'section-heading', 'class', 'section-heading' );

		$this->add_render_attribute( 'button-attr', 'href', $settings['btn-link']['url'] );

		
		$tabs = $this->get_settings_for_display( 'tabs' );

		$output = '';
		$category = '';
		$cat_gallery = '';

		if($settings['gallery-style'] == "gallery-01"){

			$output .= '<div class="category-gallery-wrap">';

				$i = 0;
				$j = 1;
				$k = 1;
				if( !empty( $tabs ) ){
					foreach ( $tabs as $index => $item ) {

						if( !empty( $item['prod_cat'] ) ){
							// foreach( $item['prod_cat'] as $tid ){
								$tid = $item['prod_cat'];
								if( ! empty( $tid ) ){

									$categoryName = get_term_by( 'id', $tid, 'product_cat' );
									$categoryLink = get_term_link( (int)$tid, 'product_cat' );
								
									if( $j == 1 ){ $active = 'active'; }else{ $active = ''; }
									$category .= '<li class="category-name '.$active.'"><a data-id="category-gallery-'.$j.'" href="';
										if( !empty( $categoryLink ) ){ 
											$category .= $categoryLink;
										}
										$category .='">';
										if( !empty( $categoryName ) ){ 
											$category .= $categoryName->name;
										}
									$category .='</a></li>';
									$j++;
								
								}

							// }
						}
						
						$i = 0;
						$active = $k == 1 ? 'active' : '' ;
						$output .= '<div class="category-gallary category-gallery-'.$k.' '.$active.' ">';

							$output .= '<div class="cat-gallary">';
								$output .= '<div class="col-4 cat-left cat-img">';
									foreach( $item['gallery'] as $gallery ){

										if( $i < 3 ){
											$output .= '<div class="category-url cat-img-'.$i.'">';
												$output .= '<img src='.$gallery['url'].'>';
											$output .= '</div>';
										}
										$i++;
									}
								$output .= '</div>';
								$output .= '<div class="col-4 cat-right cat-img">';
									$i=0;
									foreach( $item['gallery'] as $gallery ){
										if( $i >= 3 && $i < 5 ){
											$output .= '<div class="category-url cat-img-'.$i.'">';
												$output .= '<img src='.$gallery['url'].'>';
											$output .= '</div>';
										}
										$i++;
									}
								$output .= '</div>';
							$output .= '</div>';
									
						$output .= '</div>';
						$k++;
						
					}
				}

			$output .= '</div>';

			$cat_gallery .= '<div id="gallary_tabs">';

				$cat_gallery .= '<div class="category-gallary-title col-4">';
			
					$cat_gallery .= '<div class="tt-section-title '. esc_attr( $align ) .' ">';
						if ( $settings['display-upper-title'] == 'yes' ) { 
						$cat_gallery .= '<span class="tt-section-sab"> '. sprintf( '%1$s', esc_html( $settings['upper-title'] ) ) .' </span>' ;
						}
					if ( $settings['title'] ) {
						$cat_gallery .= '<'. esc_html( $settings['tag'] ) .' '. $this->get_render_attribute_string( 'section-heading' ) .'>'. html_entity_decode( $settings['title'] ) .'</'. esc_html( $settings['tag'] ) .'>';
					}
					if ( $settings['description'] ) {
						$cat_gallery .= '<p>'. html_entity_decode( $settings['description'] ) .'</P>';
					}
					$cat_gallery .= '</div>';  

					$cat_gallery .= '<ul class="category-name-wrap">'.$category.'</ul>';

						$cat_gallery .= '<div class="category-button">';
							$cat_gallery .= '<a ' . $this->get_render_attribute_string( 'button-attr' ) . '>';
								$cat_gallery .= $settings['btn-text'];
							$cat_gallery .= '</a>';
						$cat_gallery .= '</div>';

					$cat_gallery .= '</div>';

				$cat_gallery .= $output;

			$cat_gallery .= '</div>';
		
		}else{

			$output .= '<div class="category-gallery-wrap category-gallery-wrap-02">';

				$i = 0;
				$j = 1;
				$k = 1;
				if( !empty( $tabs ) ){
					foreach ( $tabs as $index => $item ) {

						if( !empty( $item['prod_cat'] ) ){
							// foreach( $item['prod_cat'] as $tid ){
								$tid = $item['prod_cat'];
								if( ! empty( $tid ) ){

									$categoryName = get_term_by( 'id', $tid, 'product_cat' );
									$categoryLink = get_term_link( (int)$tid, 'product_cat' );
									
								
									if( $j == 1 ){ $active = 'active'; }else{ $active = ''; }
									$category .= '<li class="category-name '.$active.'"><a data-id="category-gallery-'.$j.'" href="';
									if( !empty( $categoryLink ) ){ 
										$category .= $categoryLink;
									}
									$category .='">';
									if( !empty( $categoryName ) ){ 
										$category .= $categoryName->name;
									}
									$category .='</a></li>';
									$j++;
								
								}

							// }
						}
						
						$i = 0;
						$active = $k == 1 ? 'active' : '' ;
						$output .= '<div class="category-gallary category-gallery-'.$k.' '.$active.' ">';

							$output .= '<div class="cat-gallary">';
								$output .= '<div class="col-12 cat-left cat-img">';
									foreach( $item['gallery'] as $gallery ){

										if( $i < 3 ){
											$output .= '<div class="category-url cat-img-'.$i.'">';
												$output .= '<img src='.$gallery['url'].'>';
											$output .= '</div>';
										}
										$i++;
									}
								$output .= '</div>';
							
							$output .= '</div>';
									
						$output .= '</div>';
						$k++;
						
					}
				}

			$output .= '</div>';

			$output .= '<ul class="category-name-wrap">'.$category.'</ul>';


			$cat_gallery .= '<div id="gallary_tabs" class="gallery-02">';

				$cat_gallery .= '<div class="category-gallary-title col-4">';
			
					$cat_gallery .= '<div class="tt-section-title '. esc_attr( $align ) .' ">';
						if ( $settings['display-upper-title'] == 'yes' ) { 
						$cat_gallery .= '<span class="tt-section-sab"> '. sprintf( '%1$s', esc_html( $settings['upper-title'] ) ) .' </span>' ;
						}
					if ( $settings['title'] ) {
						$cat_gallery .= '<'. esc_html( $settings['tag'] ) .' '. $this->get_render_attribute_string( 'section-heading' ) .'>'. html_entity_decode( $settings['title'] ) .'</'. esc_html( $settings['tag'] ) .'>';
					}
					if ( $settings['description'] ) {
						$cat_gallery .= '<p>'. html_entity_decode( $settings['description'] ) .'</P>';
					}
					$cat_gallery .= '</div>';  


				$cat_gallery .= '</div>';

				$cat_gallery .= $output;

			$cat_gallery .= '</div>';
	
		}
		
		echo $cat_gallery; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Category_Gallery() );
