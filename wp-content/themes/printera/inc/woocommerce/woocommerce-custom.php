<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package printera
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

	/**
	 * Get the product thumbnail, or the placeholder if not set.
	 *
	 * @param string $size (default: 'woocommerce_thumbnail').
	 * @param int    $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
	 * @param int    $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
	 * @return string
	 */
	function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
		global $product;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'single-post-thumbnail' ); ?>

		<?php
		// Get gallery images IDs
		if( $gallery_image_ids = get_post_meta( $product->get_id(), '_product_image_gallery', true ) ) :
			// Convert a coma separated string of Ids to an array of Ids
			$gallery_image_ids = explode(',', $gallery_image_ids);
			// Display the first image (optional)
			?><img src="<?php echo wp_get_attachment_image_url( reset($gallery_image_ids),  'single-post-thumbnail'); ?>" data-id="<?php echo esc_html( $product->get_id() ); ?>" class="hover-img" alt="Hover">
		<?php endif; ?>

		<img alt="Thumbnail" src="<?php echo esc_url( $image[0] ); ?>" data-id="<?php echo esc_html( $product->get_id() ); ?>" class="product-thumbnail-main">
		<?php
	}
}


function printera_woocommerce_setup() {

		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width' => 150,
				'single_image_width'    => 300,
				'product_grid'          => array(
					'default_rows'    => 3,
					'min_rows'        => 1,
					'default_columns' => 4,
					'min_columns'     => 1,
					'max_columns'     => 6,
				),
			)
		);
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
}
add_action( 'after_setup_theme', 'printera_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function printera_woocommerce_scripts() {
	wp_enqueue_style( 'printera-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), 'printera_version' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'printera-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'printera_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function printera_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'printera_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function printera_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => -1,
		'columns'        => 5,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'printera_woocommerce_related_products_args' );

if ( ! function_exists( 'printera_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Main Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function printera_woocommerce_wrapper_before() {
		?>
		<main id="primary" class="site-main">
			<div class="container">
				<div class="row">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'printera_woocommerce_wrapper_before' );

if ( ! function_exists( 'printera_woocommerce_wrapper_after' ) ) {
	/**
	 * After Main Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function printera_woocommerce_wrapper_after() {
		?>
				</div>
			</div>
		</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'printera_woocommerce_wrapper_after' );

/**
 * content wrap
 */
if ( ! function_exists( 'printera_content_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * @return void
	 */
	function printera_content_wrapper_before() {
		echo '<div class="content-wrap">';
	}
}
add_action( 'woocommerce_before_content', 'printera_content_wrapper_before', 10 );

if ( ! function_exists( 'printera_content_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * @return void
	 */
	function printera_content_wrapper_after() {
		echo '</div>'; /* #content-wrap */
	}
}
add_action( 'woocommerce_after_content', 'printera_content_wrapper_after' );


/**
 * Thumb wrap
 */
if ( ! function_exists( 'woocommerce_thumb_wrap_before_content' ) ) {
	/**
	 * Before Thumb.
	 *
	 * @return void
	 */
	function woocommerce_thumb_wrap_before_content() {
			echo '<div class="thumbnail-wrap">';
	}
}
add_action( 'woocommerce_thumb_wrap_before', 'woocommerce_thumb_wrap_before_content', 10 );

if ( ! function_exists( 'woocommerce_thumb_wrap_after_content' ) ) {
	/**
	 * Before Thumb.
	 *
	 * @return void
	 */
	function woocommerce_thumb_wrap_after_content() {
		echo '</div>';
	}
}
add_action( 'woocommerce_thumb_wrap_after', 'woocommerce_thumb_wrap_after_content', 10 );



/**
 * Thumb wrap [ list-view ]
 */
if ( ! function_exists( 'woocommerce_thumb_wrap_before_content_list' ) ) {
	/**
	 * Before Thumb.
	 *
	 * @return void
	 */
	function woocommerce_thumb_wrap_before_content_list() {
		echo '<div class="row">';
			echo '<div class="thumbnail-wrap col-4">';
				echo '<div class="list-thumnail-wrap">';
	}
}
add_action( 'woocommerce_thumb_wrap_before_list', 'woocommerce_thumb_wrap_before_content_list', 10 );

if ( ! function_exists( 'woocommerce_thumb_wrap_after_content_list' ) ) {
	/**
	 * Before Thumb.
	 *
	 * @return void
	 */
	function woocommerce_thumb_wrap_after_content_list() {
			echo '</div>';
		echo '</div>';
	}
}
add_action( 'woocommerce_thumb_wrap_after_list', 'woocommerce_thumb_wrap_after_content_list', 10 );


/**
 * content wrap [ list-view ]
 */
if ( ! function_exists( 'printera_content_wrapper_before_list' ) ) {
	/**
	 * Before Content.
	 *
	 * @return void
	 */
	function printera_content_wrapper_before_list() {
		echo '<div class="list-content-wrap col-8">';
	}
}
add_action( 'woocommerce_before_content_list', 'printera_content_wrapper_before_list', 10 );

if ( ! function_exists( 'printera_content_wrapper_after_list' ) ) {
	/**
	 * After Content.
	 *
	 * @return void
	 */
	function printera_content_wrapper_after_list() {
			echo '</div>'; /* #content-wrap */
	}
}
add_action( 'woocommerce_after_content_list', 'printera_content_wrapper_after_list' );

/**
 * Thumb wrap [ short-view ]
 */
if ( ! function_exists( 'woocommerce_thumb_wrap_before_content_short' ) ) {
	/**
	 * Before Thumb.
	 *
	 * @return void
	 */
	function woocommerce_thumb_wrap_before_content_short() {
		echo '<div class="row">';
			echo '<div class="thumbnail-wrap col-xl-2 col-md-3 col-4">';
				echo '<div class="list-thumnail-wrap">';
	}
}
add_action( 'woocommerce_thumb_wrap_before_short', 'woocommerce_thumb_wrap_before_content_short', 10 );

/**
 * content wrap [ short-view ]
 */
if ( ! function_exists( 'printera_content_wrapper_before_short' ) ) {
	/**
	 * Before Content.
	 *
	 * @return void
	 */
	function printera_content_wrapper_before_short() {
		echo '<div class="list-content-wrap col-xl-10 col-md-9 col-8">';
	}
}
add_action( 'woocommerce_before_content_short', 'printera_content_wrapper_before_short', 10 );



add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <div id="mini-cart-count"><?php echo esc_html( $items_count ) ? esc_html( $items_count ) :0; ?></div>
	<?php if( $items_count > 0 ){ ?>
		<script>
			if (jQuery('.add_to_cart_button.ajax_add_to_cart').hasClass('added')){
				jQuery( ".yith-wcqv-head a.yith-wcqv-close" ).trigger( "click" );
				jQuery( ".mini-cart a.dropdown-back" ).trigger( "click" );
			}
		</script>
    <?php
		}
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

if ( ! function_exists( 'printera_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function printera_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'printera' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'printera' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'printera_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function printera_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php printera_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

add_action( 'woocommerce_init', 'remove_message_after_add_to_cart', 99);

function remove_message_after_add_to_cart(){
    if( isset( $_GET['add-to-cart'] ) ){
        wc_clear_notices();
    }
}

/**
 * Mini Cart
 */
function custom_mini_cart() {
	echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
	echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#414648" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>';
		echo '<div class="basket-item-count" style="display: inline;">';
			$items_count = WC()->cart->get_cart_contents_count();
			echo '<span id="mini-cart-count">';
				echo esc_html( $items_count ) ? esc_html( $items_count ) :0;
			echo '</span>';
		echo '</div>';
	echo '</a>';
	echo '<div class="dropdown-menu-mini-cart">';
		echo '<div class="cart-slider">';
			echo '<div class="shopping_cart_top"><div class="cart-title">'.esc_html__( 'Shopping Cart','printera' ).'</div><div class="cart-close"><i class="fas fa-times"></i></div></div>
			<div class="widget_shopping_cart_content_wrap"><div class="widget_shopping_cart_content">';
				woocommerce_mini_cart();
			echo '</div></div>
			</div>
	</div>';
}

/**
 * Timer
 */
function sales_timer_countdown_product() {  
    global $product;

    $sale_date_from = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
    $sale_date_to = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
	$local_time  = current_datetime();
	$now = $local_time->getTimestamp() + $local_time->getOffset();
	if ( ! empty( $sale_date_from ) && ! empty( $sale_date_to ) && $sale_date_from <= $now && $product->is_type( 'simple' ) ) {
	?>
		<div class="list-timer">
			<div class="sale-to" data-id="<?php echo esc_html( $product->get_id() ); ?>" data-from="<?php echo esc_html( $sale_date_from ); ?>" data-to="<?php echo esc_html( $sale_date_to ); ?>" ></div>
    	    <!-- this is where the countdown is displayed -->
 	       <div data-id="<?php echo esc_html( $product->get_id() ); ?>" class="timer"><i class="far fa-clock fa-fw"></i><p class="saleend"></p></div>
		</div>
        <?php
    }
}
add_action( 'woocommerce_before_shop_loop_item_timer', 'sales_timer_countdown_product', 20 );
add_action( 'woocommerce_single_product_summary', 'sales_timer_countdown_product', 20 );

/**
 * Sold Out Label
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_stock', 20 );
function woocommerce_template_loop_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() )
        echo '<p class="stock out-of-stock">'.esc_html__( 'Sold Out', 'printera' ).'</p>';
}

/**
 * Sale with percentage
 */
add_action( 'woocommerce_before_single_product_summary_pl', 'sale_badge_percentage', 10 );
add_action( 'woocommerce_single_shop_item', 'sale_badge_percentage', 20 );
add_action( 'woocommerce_before_shop_loop_item_title', 'sale_badge_percentage', 10 );
function sale_badge_percentage() {
   global $product, $percentage, $max_percentage;
   if ( ! $product->is_on_sale() ) return;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } elseif ( $product->is_type( 'variable' ) ) {
      $max_percentage = 0;
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }
   
   	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['products-sale-text'] == 0 ){
			if ( $max_percentage > 0 ) echo "<div class='printera-sale'><span class='onsale'>-" . round($max_percentage) . "%</span></div>"; // If you would like to show -40% off then add text after % sign
		}else{
			if ( $max_percentage > 0 ) echo "<div class='printera-sale'><span class='label'>". esc_html__( 'Sale', 'printera' ) ."</span></div>"; // If you would like to show -40% off then add text after % sign
		}
	}

}

/**
 * Number of product in dropdown
 */
add_action( 'woocommerce_before_shop_loop', 'ps_selectbox', 35 );
function ps_selectbox() {

	$args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
	$products = new WP_Query( $args );
	$total = $products->found_posts;

	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );
		$page_total = $printera_options['num-product-page'];
	}else{
		$page_total = 12;
	}

	$new = array();

	for( $i=$page_total; $i < $total; $i=$i+$page_total ) {
		$new[$i] = $i;
	}
	$new['-1'] = 'All';

	$per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);

	echo '<div class="woocommerce-perpage">';
	echo '<select onchange="if (this.value) window.location.href=this.value">';

	foreach( $new as $value => $label ) {
		echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label</option>";
	}
	echo '</select>';
	echo '</div>';
}

add_action( 'pre_get_posts', 'ps_pre_get_products_query' );
function ps_pre_get_products_query( $query ) {

	$per_page_get = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);

	if( empty( $per_page_get ) ){
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$printera_options = get_option( 'printera_options' );
			if( ! empty( $printera_options['num-product-page'] ) ){
				$per_pages = $printera_options['num-product-page'];
			}
		}
	}else{
		$per_pages = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
	}

   if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) && ! empty( $per_pages ) ){
        $query->set( 'posts_per_page', $per_pages );
    }
}

if ( ! function_exists( 'get_product_search_form' ) ) {
	/**
	 * Display Product Search Field
	 *
	 * @return void
	 */
	function get_product_search_form() { ?>

		<div id="product-search-0" class="product-search floating">
			<div class="product-search-form">
				<form id="product-search-form-0" class="product-search-form show-submit-button" action="" method="get">
					<input id="product-search-field-0" name="s" type="text" class="product-search-field" placeholder="<?php esc_attr__( 'Search products …', 'printera' ); ?>" autocomplete="off">
					<input type="hidden" name="post_type" value="product">
					<input type="hidden" name="title" value="1">
					<input type="hidden" name="excerpt" value="1">
					<input type="hidden" name="content" value="1">
					<input type="hidden" name="categories" value="1">
					<input type="hidden" name="attributes" value="1">
					<input type="hidden" name="tags" value="1">
					<input type="hidden" name="sku" value="1">
					<input type="hidden" name="orderby" value="date-DESC">
					<input type="hidden" name="ixwps" value="1">
					<span title="Clear" class="product-search-field-clear" style="display:none"></span> 
					<button type="submit"><?php esc_html_e( 'Search', 'printera' ); ?></button>
				</form>
			</div>
			<div id="product-search-results-0" class="product-search-results">
				<div id="product-search-results-content-0" class="product-search-results-content" style="display: none;"></div>
			</div>
		</div>
	<?php }
}

/**
 * Filter Class
 * # Shop Layout
 */
add_action( 'woocommerce_before_shop_loop', 'woocommerce_offsidebar_filter', 25 );
function woocommerce_offsidebar_filter(){
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );
		$shop_layout = isset( $_GET['shop_layout'] ) ? sanitize_text_field( $_GET['shop_layout'] ) : '';

		if( $shop_layout == "right" ){
			$filter_class = "right";
		}elseif( $shop_layout == "left" ){
			$filter_class = "left";
		}elseif( $shop_layout == "full" ){
			$filter_class = "full";
		}elseif( $shop_layout == "offside-left" ){
			$filter_class = "offside-left";
		}elseif( $shop_layout == "offside-right" ){
			$filter_class = "offside-right";
		}else{
			$filter_class = $printera_options['shop-layout'];
		}
	}else{
		$filter_class = "right";
	}
	if ( is_active_sidebar( 'shop' ) ) {
		echo '<div class="toggle-filter"><a class="filter '. esc_html( $filter_class ) .'">'. esc_html__( 'Filter', 'printera' ) .'<i class="fas fa-align-right"></i></a></div>';
	}
}

/**
 * Grid and List option
 */
add_action( 'woocommerce_before_shop_loop', 'woocommerce_grid_list_view', 10 );
function woocommerce_grid_list_view(){
	echo '<div class="product-sort-view">';
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );
		$view_mode = !empty( $printera_options['product-view-mode'] ) ? sanitize_text_field( $printera_options['product-view-mode'] ) : '' ;
		$columns = $printera_options['num-product-row'];

		$grid = "";
		$grid2 = "";
		$grid3 = "";
		$list = "";
		$short = "";

		if( isset( $_GET['view'] ) ){

			if( $_GET['view'] == "grid-4" ){
				$grid = "active";
			}
			elseif( $_GET['view'] == "grid-3" ){
				$grid3 = "active";
			}elseif(  $_GET['view'] == "grid-2" ){
				$grid2 = "active";
			}elseif( $_GET['view'] == "list-view" ){
				$list = "active";
			}elseif( $_GET['view'] == "short-view" ){
				$short = "active";
			}
		}
		elseif( isset( $columns ) ){
			if( $columns == 3 ){
				$grid3 = "active";
			}elseif( $columns == 2 ){
				$grid2 = "active";
			}else{
				$grid = "active";
			}
		}else{
			if( $view_mode == 1 ){
				$grid = "active";
			}elseif( $view_mode == 2 ){
				$list = "active";
			}elseif( $view_mode == 3 ){
				$grid2 = "active";
			}elseif( $view_mode == 4 ){
				$list = "active";
			}else{
				$short = "active";
			}
		}

		$shop_page_url = wc_get_page_permalink( 'shop' );

		if( $view_mode == 1 || $view_mode == 2 ){
			echo '<a href="'. $shop_page_url .'?view=grid-4" id="grid" class="view grid '. $grid .'" title="'. esc_attr__( 'Grid View', 'printera') .'">
			<svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V12H0V0Z" fill="black"/><path d="M10 0H12V12H10V0Z" fill="black"/><path d="M5 0H7V12H5V0Z" fill="black"/><path d="M15 0H17V12H15V0Z" fill="black"/><path d="M20 0H22V12H20V0Z" fill="black"/><path d="M0 5H22V7H0V5Z" fill="black"/><path d="M0 10H22V12H0V10Z" fill="black"/><path d="M0 0H22V2H0V0Z" fill="black"/>
			</svg>
			</a>';
			echo '<a href="'. $shop_page_url .'?view=grid-3" id="grid-3" class="view grid-3 '. $grid3 .'" title="'. esc_attr__( '3 Column', 'printera') .'">
			<svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V12H0V0Z" fill="black"/><path d="M10 0H12V12H10V0Z" fill="black"/><path d="M5 0H7V12H5V0Z" fill="black"/><path d="M15 0H17V12H15V0Z" fill="black"/><path d="M0 5H17V7H0V5Z" fill="black"/><path d="M0 10H17V12H0V10Z" fill="black"/><path d="M0 0H17V2H0V0Z" fill="black"/>
			</svg>
			</a>';
			echo '<a href="'. $shop_page_url .'?view=grid-2" id="grid-2" class="view grid-2 '. $grid2 .'" title="'. esc_attr__( '2 Column', 'printera') .'">
			<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V12H0V0Z" fill="black"/><path d="M10 0H12V12H10V0Z" fill="black"/><path d="M5 0H7V12H5V0Z" fill="black"/><path d="M0 5H12V7H0V5Z" fill="black"/><path d="M0 10H12V12H0V10Z" fill="black"/><path d="M0 0H12V2H0V0Z" fill="black"/>
			</svg>
			</a>';
			echo '<a href="'. $shop_page_url .'?view=list-view" id="list" class="view list '. $list .'" title="'. esc_attr__( 'List View', 'printera') .'">
			<svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V12H0V0Z" fill="black"/><path d="M5 0H7V12H5V0Z" fill="black"/><path d="M15 0H17V12H15V0Z" fill="black"/><path d="M0 5H17V7H0V5Z" fill="black"/><path d="M0 10H17V12H0V10Z" fill="black"/><path d="M0 0H17V2H0V0Z" fill="black"/>
			</svg>
			</a>';
			echo '<a href="'. $shop_page_url .'?view=short-view" id="short" class="view short '. $short .'" title="'. esc_attr__( 'Short View', 'printera') .'">
			<svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H2V12H0V0Z" fill="black"/><path d="M4 0H6V12H4V0Z" fill="black"/><path d="M13 0H15V12H13V0Z" fill="black"/><path d="M0 0H15V2H0V0Z" fill="black"/><path d="M0 10H15V12H0V10Z" fill="black"/><path d="M0 7H15V8H0V7Z" fill="black"/><path d="M0 4H15V5H0V4Z" fill="black"/></svg>
			</a>';
		}
	}else{
		$filter_class = "default";
	}
	echo '</div>';
}


/**
 * Remove default customiz option
 * # Column per page
 * # Row per page
 */
function blogpress_theme_colors_section( $wp_customize ) {
    $wp_customize->remove_control('woocommerce_catalog_columns');
    $wp_customize->remove_control('woocommerce_catalog_rows');
}
add_action( 'customize_register', 'blogpress_theme_colors_section' );

/**
 * Number of product per page
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );
		$cols = $printera_options['num-product-page'];
	}else{
		$cols = 12;
	}
	return $cols;
}

/**
 * Number of product per row
 */
add_filter( 'loop_shop_columns', 'lw_loop_shop_columns' );
function lw_loop_shop_columns( $columns ) {
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );
		$product_column = isset( $_GET['product_column'] ) ? sanitize_text_field( $_GET['product_column'] ) : '';
		if( ! empty( $product_column ) ){
			$columns = $product_column;
		}
		elseif( !empty( $_GET['view'] ) ){
			if( $_GET['view'] == "grid-3" ){
				$columns = 3;
			}elseif( $_GET['view'] == "grid-2" ){
				$columns = 2;
			}
		}else{
			$columns = $printera_options['num-product-row'];
		}
	}else{
		$columns = 4;
	}
	return $columns;
}

/**
 * Catalog mode on
 */
if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$printera_options = get_option( 'printera_options' );
	if( $printera_options['products-catalog-mode'] == 1 ){
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');

		add_action( 'template_redirect', 'skip_cart_redirect' );
		function skip_cart_redirect(){
			if ( is_cart() || is_checkout() ) {
				wp_safe_redirect( home_url() ); 
				exit();
			}
		}
	}
}

add_action( 'wp_ajax_nopriv_checking_cart_items', 'checking_cart_items' );
add_action( 'wp_ajax_checking_cart_items', 'checking_cart_items' );
function checking_cart_items() {
        // For 2 different cart items
        ?>
		<script>
				jQuery( ".mini-cart a.dropdown-back" ).trigger( "click" );
		<script>
		<?php
    die(); // To avoid server error 500
}

function product_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = sanitize_text_field( $_POST['page'] ) + 1; // we need next page to be loaded
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore_product', 'product_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore_product', 'product_loadmore_ajax_handler'); 

function product_loadmore_ajax_list_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = sanitize_text_field( $_POST['page'] ) + 1; // we need next page to be loaded
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
			wc_get_template_part( 'content', 'product-list' );
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore_product_list', 'product_loadmore_ajax_list_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore_product_list', 'product_loadmore_ajax_list_handler'); 




function post_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = sanitize_text_field( $_POST['page'] ) + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore_post', 'post_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore_post', 'post_loadmore_ajax_handler');

add_action( 'woocommerce_product_options_general_product_data', 'woocommerce_add_custom_general_fields' );
function woocommerce_add_custom_general_fields() {
    global $woocommerce, $post, $product_object;

	woocommerce_wp_text_input(
		array(
			'id' => '_video_tutorial_url',
			'wrapper_class' => 'show_if_simple',
			'label' => esc_html__('Video Tutorial', 'printera'),
			'placeholder' => 'Tutorial url',
			'description' => esc_html__('Has Video Tutorial?', 'printera'),
		  
		)
	);
}

function custom_fields_save( $post_id ){
    update_post_meta( $post_id, '_video_tutorial_url', sanitize_text_field( $_POST['_video_tutorial_url'] ) );
}
add_action( 'woocommerce_process_product_meta', 'custom_fields_save' );

function get_product_brand_name(){
	global $product;
	$terms = get_the_terms( $product->get_id(), 'brand' );

	if( !empty( $terms ) ){
		echo '<div class="single-categories">';
			echo '<span>'.esc_html__( 'Brands : ', 'printera' ).'</span>';
			echo '<div class="printera-brands">';
			foreach ( $terms as $term ) {
				if( ! empty( $term->name ) ){
					echo '<a href="'. get_term_link( $term->term_id ) .'">'. esc_html( $term->name ) .'</a>';
				}
			}
			echo '</div>';
		echo '</div>';
	}
}
add_action( 'woocommerce_product_brand_name', 'get_product_brand_name' );

function get_product_estimated_delivery(){
	echo '<div class="delivery-shipping-wrap">';
	$delivery = get_post_meta( get_the_ID(), 'estimated_delivery', true );
	if( !empty( $delivery ) ){
		echo '<div class="estimated-delivery">';
			echo '<span>'.esc_html__( 'Estimated Delivery : ', 'printera' ).'</span>';
			echo '<p>'. esc_html( $delivery ) .'</p>';
		echo '</div>';
	}
}
add_action( 'woocommerce_product_estimated_delivery', 'get_product_estimated_delivery', 10 );

function get_product_free_shipping(){
		$shipping = get_post_meta( get_the_ID(), 'free_shipping', true );
		if( !empty( $shipping ) ){
			echo '<div class="free-shipping">';
				echo '<span>'.esc_html__( 'Free Shipping : ', 'printera' ).'</span>';
				echo '<p>'. esc_html( $shipping ) .'</p>';
			echo '</div>';
		}
	echo '</div>';#delivery-shipping-wrap
}
add_action( 'woocommerce_product_estimated_delivery', 'get_product_free_shipping', 20 );

//Add image field in taxonomy page
add_action( 'brand_add_form_fields', 'add_custom_taxonomy_image', 10, 2 );
function add_custom_taxonomy_image( $taxonomy ) {
?>
    <div class="form-field term-group">

        <label for="image_id"><?php esc_html__('Image', 'printera'); ?></label>
        <input type="hidden" id="image_id" name="image_id" class="custom_media_url" value="">

        <div id="image_wrapper"></div>

        <p>
            <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php esc_attr__( 'Add Image', 'printera' ); ?>">
            <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php esc_attr__( 'Remove Image', 'printera' ); ?>">
        </p>

    </div>
<?php
}

//Save the taxonomy image field
add_action( 'created_brand', 'save_custom_taxonomy_image', 10, 2 );
function save_custom_taxonomy_image ( $term_id, $tt_id ) {
    if( isset( $_POST['image_id'] ) ){
     $image = sanitize_text_field( $_POST['image_id'] );
     add_term_meta( $term_id, 'category_image_id', $image, true );
    }
}

//Add the image field in edit form page
add_action( 'brand_edit_form_fields', 'update_custom_taxonomy_image', 10, 2 );
function update_custom_taxonomy_image ( $term, $taxonomy ) { ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="image_id"><?php esc_html__( 'Image', 'printera' ); ?></label>
        </th>
        <td>

            <?php $image_id = get_term_meta ( $term -> term_id, 'image_id', true ); ?>
            <input type="hidden" id="image_id" name="image_id" value="<?php echo esc_attr( $image_id ); ?>">

            <div id="image_wrapper">
            <?php if ( $image_id ) { ?>
               <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
            <?php } ?>

            </div>

            <p>
                <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php esc_attr__( 'Add Image', 'printera' ); ?>">
                <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php esc_attr__( 'Remove Image', 'printera' ); ?>">
            </p>

        </div></td>
    </tr>
<?php
}

/**
 * single page review
 */
add_action( 'average_review_on_tab ','woocommerce_template_single_rating', 10 );

// adds notice at single product page above add to cart
add_action( 'woocommerce_after_single_product', 'recviproducts', 31 );
function recviproducts() {
	if( function_exists( 'loadmore_postSC' ) ) {
    	echo do_shortcode ('[recently_viewed_products]');
	}
}

// https://github.com/woocommerce/woocommerce/issues/9724#issuecomment-160618200
function custom_track_product_view() {
    if ( ! is_singular( 'product' ) ) {
        return;
    }

    global $post;

    if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) )
        $viewed_products = array();
    else
        $viewed_products = (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] );

    if ( ! in_array( $post->ID, $viewed_products ) ) {
        $viewed_products[] = $post->ID;
    }

    if ( sizeof( $viewed_products ) > 15 ) {
        array_shift( $viewed_products );
    }

    // Store for session only
    wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

add_action( 'template_redirect', 'custom_track_product_view', 20 );

function printera_social_share_button(){
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {

		$printera_options = get_option( 'printera_options' );
		?>
		<div class="xs_social_share_widget xs_share_url main_content  wslu-style-3 wslu-share-box-shaped wslu-fill-brand-hover-colored wslu-share-m-5 wslu-none wslu-share-horizontal wslu-theme-font-no wslu-main_content">
			<ul>
				<?php
				if( $printera_options['opt_fb_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-facebook-f"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_twitter_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-twitter"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_linkedin_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-linkedin-in"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_pinterest_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-pinterest-p"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_tumblr_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://tumblr.com/share/link?url=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-tumblr"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_email_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="https://mailto:?subject=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-regular fa-envelope"></i></div></a>
					</li>
				<?php }
				if( $printera_options['opt_whats_shar'] == 1 ){ ?>
					<li>
						<a target="_blank" href="whatsapp://send?text=<?php the_permalink(); ?>"><div class="xs-social-icon"><i class="fa-brands fa-whatsapp"></i></div></a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php
	}
}
add_action( 'printera_social_share', 'printera_social_share_button'  );

add_action( 'woocommerce_buyNow_buttton', 'woocommerce_custom_buyNow_buttton' );
function woocommerce_custom_buyNow_buttton() {
	global $product;

	$id = $product->get_ID();

	$classes = implode(
		' ',
		array_filter(
			array(
				'button',
				'product_type_' . $product->get_type(),
			)
		)
	);

	ob_start();
	if ( 'external' !== $product->get_type() ) {
		?>
			<div class="buy-now-wrap">
				<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>?add-to-cart=<?php echo absint( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> btn btn-primary" rel="nofollow">
					<?php echo esc_html__( 'Buy Now', 'printera' ); ?>
				</a>
			</div>
		<?php
	}
	echo ob_get_clean();
}

add_action( 'woocommerce_stock_progressbar', 'custom_stock_progressbar' );
function custom_stock_progressbar(){
	global $product;
	$stock = $product->get_stock_quantity();
	$available_stock = $stock ? $stock : 0 ;

	if( $available_stock > 0 ){
		$sold = get_post_meta( get_the_ID(), 'total_sales', true );
		$sold_out = $sold ? $sold : 0;

		$total_product = $available_stock + $sold_out;
		$stock_progress = ( $available_stock*100/ $total_product );

		echo '<div class="stock-progress">';
			echo '<span class="stock-progress-wrap">'. esc_html( 'Available:- '. $available_stock . ' ', 'printera' ).'</span>';
			echo '<div class="stock progress-bar">';
				echo '<span data-percent="'. esc_html( $stock_progress ) .'"></span>';
			echo '</div>';
		echo '</div>';
	}
}

add_action( 'custom_single_products_summary', 'single_products_summary' );
function single_products_summary(){
	global $product;
	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {

		$printera_options = get_option( 'printera_options' );

		$thumbnail_slider = isset( $_GET['thumbnail_slider'] ) ? sanitize_text_field( $_GET['thumbnail_slider'] ) : '';

		if( $thumbnail_slider == 1 ){
			do_action( 'woocommerce_after_single_product_summary' );
		}elseif( $thumbnail_slider == 2 || $thumbnail_slider == 3 ){
			remove_action( 'woocommerce_after_single_product_summary', 'printera_woocommerce_output_upsells', 15 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			
			do_action( 'woocommerce_after_single_product_summary' );
			add_action( 'woocommerce_after_single_product_summary_style2', 'woocommerce_output_related_products', 20 );
		}elseif( $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style1' ){
			do_action( 'woocommerce_after_single_product_summary' );
		}elseif( $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style2' || $printera_options['product-thumbnail-slider'] == 'thumbnail-slider-style3' ){
			
			remove_action( 'woocommerce_after_single_product_summary', 'printera_woocommerce_output_upsells', 15 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			
			do_action( 'woocommerce_after_single_product_summary' );		
			add_action( 'woocommerce_after_single_product_summary_style2', 'woocommerce_output_related_products', 20 );	
		}
	}else{
		do_action( 'woocommerce_after_single_product_summary' );
	}
}

add_action('wp_ajax_get_single_thumbnail_slider', 'get_single_thumbnail_slider');
add_action('wp_ajax_nopriv_get_single_thumbnail_slider', 'get_single_thumbnail_slider');
function get_single_thumbnail_slider(){

	$selected_value = sanitize_text_field( $_POST['selected_value'] );
	$selected_option = sanitize_text_field( $_POST['selected_option'] );

	$arrow_slider = sanitize_text_field( $_POST['arrow_slider'] );
	$arrow_thumbnails = sanitize_text_field( $_POST['arrow_thumbnails'] );
	$light_box = sanitize_text_field( $_POST['light_box'] );
	$zoom_style = sanitize_text_field( $_POST['zoom_style'] );
	$zoom_style = sanitize_text_field( $_POST['zoom_style'] );
	$slider_infinite_loop = sanitize_text_field( $_POST['slider_infinite_loop'] );
	$wishlist_button = sanitize_text_field( $_POST['wishlist_button'] );
	$compare_button = sanitize_text_field( $_POST['compare_button'] );

	if( $selected_option == "thumbnail-slider-style1" ){
		if( $selected_value == "left-slider" ){
			update_option( 'nickx_slider_layout', 'left' );
		} else if( $selected_value == "bottom-slider" ){
			update_option( 'nickx_slider_layout', 'horizontal' );
		} else if( $selected_value == "right-slider" ){
			update_option( 'nickx_slider_layout', 'right' );
		}
	}

	if( $selected_option == "thumbnail-slider-style2" ){
		if( $selected_value == "left-slider" ){
			update_option( 'nickx_slider_layout', 'left' );
		}else if( $selected_value == "right-slider" ){
			update_option( 'nickx_slider_layout', 'right' );
		}
	}

	if( $arrow_slider == 1 ){
		update_option( 'nickx_arrowdisable', 'yes' );
	}else{
		update_option( 'nickx_arrowdisable', 'no' );
	}
	if( $arrow_thumbnails == 1 ){
		update_option( 'nickx_arrow_thumb', 'yes' );
	}else{
		update_option( 'nickx_arrow_thumb', 'no' );
	}
	if( $light_box == 1 ){
		update_option( 'nickx_show_lightbox', 'yes' );
	}else{
		update_option( 'nickx_show_lightbox', 'no' );
	}
	if( $zoom_style == 1 ){
		update_option( 'nickx_show_zoom', 'yes' );
	}else{
		update_option( 'nickx_show_zoom', 'no' );
	}
	if( $slider_infinite_loop == 1 ){
		update_option( 'nickx_arrowinfinite', 'yes' );
	}else{
		update_option( 'nickx_arrowinfinite', 'no' );
	}
	if( $wishlist_button == 1 ){
		update_option( 'yith_wcwl_button_position', 'no' );
	}else{
		update_option( 'yith_wcwl_button_position', 'add-to-cart' );
	}
	if( $compare_button == 1 ){
		update_option( 'yith_woocompare_compare_button_in_product_page', 'no' );
	}else{
		update_option( 'yith_woocompare_compare_button_in_product_page', 'yes' );
	}
    exit();
}

function add_to_cart_info(){
	global $product;
	$_product = wc_get_product( $product->get_id() );
	?>
	<div class="sticky-addcart-info">
		<div class="thumb"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
		<div class="sticky-content">
			<div class="title"><?php echo html_entity_decode( $_product->get_title() ); ?></div>
			<div class="price"><?php echo html_entity_decode( $product->get_price_html() ); ?></div>
		</div>
	</div>
	<?php	
}
add_action( 'add_to_cart_information', 'add_to_cart_info' );

add_action( 'woocommerce_product_options_general_product_data', 'custom_checkbox_field_product_options_sku' );
function custom_checkbox_field_product_options_sku(){
    global $post, $product_object;

    if ( ! is_a( $product_object, 'WC_Product' ) ) {
        $product_object = wc_get_product( $post->ID );
    }

    $values = $product_object->get_meta('custom_checkbox_field');

    woocommerce_wp_checkbox( array(
        'id'            => 'custom_checkbox_field',
        'value'         => empty($values) ? 'yes' : $values, // Checked by default
        'label'         => esc_html__( 'Deal Of The Product', 'printera' ),
        'description'   => esc_html__( 'This product will be shown on the product deals of the day.', 'printera' ),
    ) );
}

add_action( 'woocommerce_admin_process_product_object', 'save_custom_field_product_options_sku' );
function save_custom_field_product_options_sku( $product ) {
    $product->update_meta_data( 'custom_checkbox_field', isset($_POST['custom_checkbox_field']) ? 'yes' : 'no' );
}

function woocommerce_shop_loop_category(){
	if( is_shop() ){
		echo '<div class="product-categories product-shop-categories swiper">';
		echo '<div class="swiper-wrapper">';
			$taxonomies = get_categories(  
				array( 
					'taxonomy' => 'product_cat',
					'orderby' => 'name',
					'parent' => 0,
				)
			);
			foreach( $taxonomies as $prod_cat ) :
				echo '<div class="category-item swiper-slide">';
					$cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' );
					$term_link = get_term_link( $prod_cat, 'product_cat' );

					if( ! empty( $shop_catalog_img ) ){
						$cat_image = '<img src="'. $shop_catalog_img[0] .'" alt="'. $prod_cat->name .'">';
					}else{
						$cat_image = '<img src="'. PRINTERA_TH_URL .'/assets/images/woocommerce-placeholder.png" alt="placeholder">';
					}
					echo '<a href="'. $term_link .'" class="cat_desc">';
						echo '<div class="cat_image">'. $cat_image . '</div>';
					
						echo '<div class="wpcat-content">';
							echo '<div class="cat_name">'. $prod_cat->name .'</div>';
							echo '<div class="cat_total_product">  '. $prod_cat->count .' items </div>';
						echo '</div>';
					echo '</a>';
				echo '</div>';
			endforeach;
			echo '</div>';
		echo '</div>';
	}
}
add_action( 'woocommerce_shop_loop_categories', 'woocommerce_shop_loop_category' );

function woocommerce_shop_loop_subcategory(){
	if( ! is_shop() ){
		$category = get_queried_object();
		$parent_term_id = $category->term_id; // term id of parent term (edited missing semi colon)

		$thumbnail_id = get_term_meta( $parent_term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );

		$description = category_description( $parent_term_id );

		echo '<div class="category-head">';

			echo '<div class="product-categories product-shop-categories swiper">';
				echo '<span>'. $description .'</span>';
				echo '<div class="swiper-wrapper">';
					$taxonomies = array( 
						'product_cat',
					);

					$args = array(
						'parent'         => $parent_term_id,
						// 'child_of'      => $parent_term_id, 
					); 

					$terms = get_terms($taxonomies, $args);
					foreach( $terms as $prod_subcat ) :
						echo '<div class="category-item swiper-slide">';
							$cat_thumb_id = get_term_meta( $prod_subcat->term_id, 'thumbnail_id', true );
							$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' );
							$term_link = get_term_link( $prod_subcat, 'product_cat' );

							if( ! empty( $shop_catalog_img ) ){
								$cat_image = '<img src="'. $shop_catalog_img[0] .'" alt="'. $prod_subcat->name .'">';
							}else{
								$cat_image = '<img src="'. PRINTERA_TH_URL .'/assets/images/woocommerce-placeholder.png" alt="placeholder">';
							}
							echo '<a href="'. $term_link .'" class="cat_desc">';
								echo '<div class="cat_image">'. $cat_image . '</div>';
							
								echo '<div class="wpcat-content">';
									echo '<div class="cat_name">'. $prod_subcat->name .'</div>';
									echo '<div class="cat_total_product">  '. $prod_subcat->count .' items </div>';
								echo '</div>';
							echo '</a>';
						echo '</div>';
					endforeach;
				echo '</div>';
			echo '</div>';

		echo '</div>';
	}
}
add_action( 'woocommerce_shop_loop_subcategories', 'woocommerce_shop_loop_subcategory' );

add_action( 'woocommerce_shop_cart_style', 'woocommerce_shop_custom_cart_style' );
function woocommerce_shop_custom_cart_style(){
	?>

	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
			<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php esc_html_e( 'Product', 'printera' ); ?></th>
					<th class="product-price"><?php esc_html_e( 'Price', 'printera' ); ?></th>
					<th class="product-quantity"><?php esc_html_e( 'Quantity', 'printera' ); ?></th>
					<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'printera' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
							<td class="product-remove">
								<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa-solid fa-trash-can"></i></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_html__( 'Remove this item', 'printera' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
								?>
							</td>
							<td class="product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key );
								if ( ! $product_permalink ) {
									echo html_entity_decode( $thumbnail ); // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
								?>
							</td>
							<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'printera' ); ?>">
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}
								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
								// Meta data.
								echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
								// Backorder notification.
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'printera' ) . '</p>', $product_id ) );
								}
								?>
							</td>
							<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'printera' ); ?>">
								<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.?>
							</td>
							<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'printera' ); ?>">
								<div class="cart-qty-wrap">
									<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1">', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '0',
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
									}
									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
									?>
								</div>
							</td>
							<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'printera' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</td>
						</tr>
						<?php
					}
				}
				do_action( 'woocommerce_cart_contents' ); ?>
				<tr>
					<td colspan="6" class="actions">
						<?php if ( wc_coupons_enabled() ) { ?>
							<div class="coupon">
							<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'printera' ); ?>" /> <button type="submit" class="button btn btn-primary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'printera' ); ?>"><?php esc_html_e( 'Apply coupon', 'printera' ); ?></button>
								<?php do_action( 'woocommerce_cart_coupon' ); ?>
							</div>
						<?php } ?>
						<button type="submit" class="button btn btn-primary" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'printera' ); ?>"><?php esc_html_e( 'Update cart', 'printera' ); ?></button>
						<?php do_action( 'woocommerce_cart_actions' ); ?>
						<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
					</td>
				</tr>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>		

	<?php
}
