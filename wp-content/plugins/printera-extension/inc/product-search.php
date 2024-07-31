<?php
/**
 * Woocommerce AJAX product search
 */

/*  Delete product categories transient
/*-------------------*/

function edit_product_term($term_id, $tt_id, $taxonomy) {
    $term = get_term($term_id,$taxonomy);
    if (!is_wp_error($term) && is_object($term)) {
        $taxonomy = $term->taxonomy;
        if ($taxonomy == "product_cat") {
            delete_transient( 'product-categories-hierarchy' );
        }
    }
}

function delete_product_term($term_id, $tt_id, $taxonomy, $deleted_term) {
    if (!is_wp_error($deleted_term) && is_object($deleted_term)) {
        $taxonomy = $deleted_term->taxonomy;
        if ($taxonomy == "product_cat") {
            delete_transient( 'product-categories-hierarchy' );
        }
    }
}
add_action( 'create_term', 'edit_product_term', 99, 3 );
add_action( 'edit_term', 'edit_product_term', 99, 3 );
add_action( 'delete_term', 'delete_product_term', 99, 4 );

add_action( 'save_post', 'save_post_action', 99, 3);
function save_post_action( $post_id ){

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if (!current_user_can( 'edit_page', $post_id ) ) return;

    $post_info = get_post($post_id);

    if (!is_wp_error($post_info) && is_object($post_info)) {
        $content   = $post_info->post_content;
        $post_type = $post_info->post_type;

        if ($post_type == "product"){
            delete_transient( 'enovathemes-product-categories' );
        }
    }

}

/*  Search action
/*-------------------*/

    function search_product() {

        global $wpdb, $woocommerce;
        // $output_test .= "Hello in this";

        if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {

            $Skeyword = $_POST['keyword'];
            //$keyword = str_replace(' ', '%', $Skeyword);
			$keyword = explode( ' ', $Skeyword );

            if (isset($_POST['category']) && !empty($_POST['category'])) {

                $output_test .= $_POST['category'];
                $category = $_POST['category'];

                $querystr = "SELECT DISTINCT * FROM $wpdb->posts AS p
                LEFT JOIN $wpdb->term_relationships AS r ON (p.ID = r.object_id)
            	INNER JOIN $wpdb->term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id)
            	INNER JOIN $wpdb->terms AS t ON (r.term_taxonomy_id = t.term_id)
            	WHERE p.post_type IN ('product')
            	AND p.post_status = 'publish'
                AND x.taxonomy = 'product_cat'
            	AND (
                    (x.term_id = {$category})
                    OR
                    (x.parent = {$category})
                )
                AND (
                    (p.ID IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_sku' AND meta_value LIKE '%{$keyword}%'))
                    OR
                    (p.post_title LIKE '%{$keyword[0]}%')
                )
            	ORDER BY t.name ASC, p.post_date DESC;";

            } else {
                $querystr = "SELECT DISTINCT $wpdb->posts.*
                FROM $wpdb->posts, $wpdb->postmeta
                WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
                AND (
                    ($wpdb->postmeta.meta_key = '_sku' AND $wpdb->postmeta.meta_value LIKE '%{$keyword}%')
                    OR
                    ($wpdb->posts.post_title LIKE '%{$keyword[0]}%')
					AND
                    ($wpdb->posts.post_title LIKE '%{$keyword[1]}%')
					AND
                    ($wpdb->posts.post_title LIKE '%{$keyword[2]}%')
					AND
                    ($wpdb->posts.post_title LIKE '%{$keyword[3]}%')
					AND
                    ($wpdb->posts.post_title LIKE '%{$keyword[4]}%')
                )
                AND $wpdb->posts.post_status = 'publish'
                AND $wpdb->posts.post_type = 'product'
                ORDER BY $wpdb->posts.post_date DESC";
            }

            $query_results = $wpdb->get_results($querystr);
            
            if (!empty($query_results)) {

                $output = '';

                foreach ($query_results as $result) {

                    $price      = get_post_meta($result->ID,'_regular_price');
                    $price_sale = get_post_meta($result->ID,'_sale_price');
                    $currency   = get_woocommerce_currency_symbol();

                    $sku   = get_post_meta($result->ID,'_sku');
                    $stock = get_post_meta($result->ID,'_stock_status');

                    $categories = wp_get_post_terms($result->ID, 'product_cat');

                    $output .= '<li>';
                        $output .= '<a href="'.get_post_permalink($result->ID).'">';
                            $output .= '<div class="product-image">';
                                $output .= '<img src="'.esc_url(get_the_post_thumbnail_url($result->ID,'thumbnail')).'">';
                            $output .= '</div>';
                            $output .= '<div class="product-data">';
                                $output .= '<h6>'.$result->post_title.'</h6>';
                                if (!empty($price)) {
                                    $output .= '<div class="product-price">';
                                        $output .= '<span class="regular-price">'.$currency.$price[0].'</span>';
                                        if (!empty($price_sale)) {
                                            $output .= '<span class="sale-price">'.$currency.$price_sale[0].'</span>';
                                        }
                                    $output .= '</div>';
                                }
                                /* if (!empty($categories)) {
                                    $output .= '<div class="product-categories">';
                                        foreach ($categories as $category) {
                                            if ($category->parent) {
                                                $parent = get_term_by('id',$category->parent,'product_cat');
                                                $output .= '<span>'.$parent->name.'</span>';
                                            }
                                            $output .= '<span>'.$category->name.'</span>';
                                        }
                                    $output .= '</div>';
                                }
                                if (!empty($sku)) {
                                    $output .= '<div class="product-sku">'.esc_html__( 'SKU:', 'textdomain' ).' '.$sku[0].'</div>';
                                } 

                                if (!empty($stock)) {
                                    $output .= '<div class="product-stock">'.$stock[0].'</div>';
                                } */

                            $output .= '</div>';
                            $output .= '</a>';
                    $output .= '</li>';
                }

                if (!empty($output)) {
                    echo $output;
                }
            }
        }

        die();
    }
    add_action( 'wp_ajax_search_product', 'search_product' );
    add_action( 'wp_ajax_nopriv_search_product', 'search_product' );

/*  Widget
/*-------------------*/

    add_action('widgets_init', 'register_product_search_widget');
    function register_product_search_widget(){
    	register_widget( 'Enovathemes_Addons_WP_Product_Search' );
    }

    class Enovathemes_Addons_WP_Product_Search extends WP_Widget {

    	public function __construct() {
    		parent::__construct(
    			'product_search_widget',
    			esc_html__('* Product ajax search', 'textdomain'),
    			array( 'description' => esc_html__('Product ajax search', 'textdomain'))
    		);
    	}

    	public function widget( $args, $instance) {

    		wp_enqueue_script('search-main');

    		extract($args);

    		$title = apply_filters( 'widget_title', $instance['title'] );

    		echo $before_widget;

    			if ( ! empty( $title ) ){echo $before_title . $title . $after_title;}

                ?>

    			<div class="product-search">
    				<form name="product-search" method="POST">
                        <div class="search-wrapper">
                            <input type="search" name="search" class="search" placeholder="<?php echo esc_html__( 'Search for product...', 'textdomain' ); ?>" value="">
                            <?php echo file_get_contents( PRINTERA_TH_ROOT .'assets/images/loading.svg' ); ?>
                        </div>
    	            </form>
                    <div class="search-results"></div>
        		</div>

    		<?php echo $after_widget;
    	}

     	public function form( $instance ) {

     		$defaults = array(
     			'title' => esc_html__('Product search', 'textdomain'),
     		);

     		$instance = wp_parse_args((array) $instance, $defaults);

    		?>

    		<div id="<?php echo esc_attr($this->get_field_id( 'widget_id' )); ?>">

    			<p>
    				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'textdomain' ); ?></label>
    				<input class="widefat <?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
    			</p>

    		</div>

    		<?php
    	}

    	public function update( $new_instance, $old_instance ) {
    		$instance = $old_instance;
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		return $instance;
    	}

    }
    