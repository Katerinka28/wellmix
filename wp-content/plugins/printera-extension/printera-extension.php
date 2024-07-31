<?php
/**
 * Printera Extension
 *
 * Plugin Name: Printera Extension
 * Plugin URI:
 * Description: Printera plugin provides Custom Post Type, Custom Widget(elementor), Theme Options.
 * Author: Templatetrip
 * Version: 1.0.0
 * Text Domain: printera
 *
 * @package printera
 * @category extension
 */

if ( ! defined( 'PRINTERA_TH_ROOT' ) ) {
	define( 'PRINTERA_TH_ROOT', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'PRINTERA_TH_URL' ) ) {
	define( 'PRINTERA_TH_URL', plugins_url( '', __FILE__ ) );
}

if ( ! defined( 'PRINTERA_NAME' ) ) {
	define( 'PRINTERA_NAME', 'printera' );
}

require_once PRINTERA_TH_ROOT . 'elementor/init.php';
require_once PRINTERA_TH_ROOT . 'inc/script-style-enqueue.php';
require_once PRINTERA_TH_ROOT . '/inc/shortcode.php';

/**
 * Custom post type
 */
require_once PRINTERA_TH_ROOT . 'inc/theme-cpt.php';

/**
 * Custom post meta
 */
require_once PRINTERA_TH_ROOT . 'inc/post-meta/post-meta.php';

/**
 * Custom meta for cpt
 */
if ( class_exists( 'RW_Meta_Box' ) ) {
	require_once PRINTERA_TH_ROOT . 'inc/theme-postmeta.php';
}


/* if ( ! function_exists( 'printera_extension_textdomain' ) ) {
	/**
	 * Languages File
	 *
	function printera_extension_textdomain() {
		load_plugin_textdomain( 'printera_extension', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
	add_action( 'plugins_loaded', 'printera_extension_textdomain' );
} */


// Redux Framework.
if ( class_exists( 'ReduxFramework' ) ) {
	require_once PRINTERA_TH_ROOT . '/theme-option/init.php';
    require_once PRINTERA_TH_ROOT . 'inc/product-video-gallery-slider-for-woocommerce.php';
}

require_once PRINTERA_TH_ROOT . 'widget/contact-info.php';
require_once PRINTERA_TH_ROOT . 'widget/social-media.php';
require_once PRINTERA_TH_ROOT . 'widget/about-text.php';
require_once PRINTERA_TH_ROOT . 'widget/product-tag.php';

/**
 * Woocommerce AJAX product search
 */
require_once PRINTERA_TH_ROOT . 'inc/product-search.php';


function loadmore_postSC(){

    global $wpdb;
    // Set default variables
    $output = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = $_POST['page'];
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = $_POST['post_per_page'];
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;


        $args = array(
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'posts_per_page'   => -1,
        );

        $c_query = new \WP_Query( $args );
        $count = $c_query->found_posts;

        /**
         * Use WP_Query:
         */
        $the_query = new WP_Query(
            array(
                'post_type'         => 'post',
                'post_status '      => 'publish',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_page,
                'offset'            => $start
            )
        );

           
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $full_image  = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                $printera_info  = get_the_author_meta( 'printera_info' );
                $designation = get_post_meta( get_the_ID(), 'author_designation', true );
                $output .= '<div class="tt-post-wrapper float-start '. $_POST['col'] .'">';
                    if ( has_post_thumbnail() ) {
                        $output .= '<div class="tt-post-thumbnail position-relative">';
                            $output .= '<a href="' . get_permalink() . '"><img alt="blog" class="img-fluid" src="' . esc_url( $full_image[0] ) . '"></a>';
                            $output .= '<div class="zoom-icon"><i class="fas fa-search"></i></div>';
                            if($settings['blog-style'] == "blog-style-1"){
                                if( $settings['display-date'] == "yes" ){
                                    $output .= '<div class="tt-post-meta position-absolute">';
                                        $output .= sprintf( '%s', get_the_date() );
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
                            $output .= substr(get_the_excerpt(), 0,50);
                            $output .='</div>';
                        }
                        $output .='<div class="tt-post-more float-start">';
                            $output .='<a href="'. get_permalink() .'" class="position-relative">'. esc_html__('Read More','printera') .'</a>';
                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
            }
        }

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        // Pagination Buttons logic     
        $pag_container .= "
        <div class='printera-universal-pagination'>
            <ul>";

        // Pagination Buttons logic     
        $pag_container .= "
        <div class='printera-universal-pagination'>
            <ul>";
                if ($next_btn && $cur_page < $no_of_paginations) {
                    $nex = $cur_page + 1;
                    $pag_container .= "<li p='$nex' class='active'>Next</li>";
                } else if ($next_btn) {
                    $pag_container .= "<li class='inactive'>No More Post</li>";
                }

                $pag_container = $pag_container . "
            </ul>
        </div>";

        // We echo the final output
        echo $output  . 
        '<div class = "printera-pagination-nav">' . $pag_container . '</div>';
    }
    exit(); 
	die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore_postSC', 'loadmore_postSC'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore_postSC', 'loadmore_postSC');
