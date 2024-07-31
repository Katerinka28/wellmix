<?php
/**
 * printera Redux Color Customization
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Redux Color Customization Function
 */
function printera_color_customization() {

	$printera_options = get_option( 'printera_options' );
	$custom_css = '';

	$primary_color   = $printera_options['primery-color'];
	$secondary_color = $printera_options['secondary-color'];
	$tertiary_color  = $printera_options['tertiary-color'];
	$border_color  = $printera_options['border-color'];
	if( ! empty( $printera_options['opt-palette-color'] ) ){
		$color_palette = $printera_options['opt-palette-color'];
		if( $color_palette == "palettes-1" ){
			$primary_color   = "#a55e3f";
			$secondary_color = "#222222";	
		}elseif( $color_palette == "palettes-2" ){
			$primary_color   = "#da6647";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-3" ){
			$primary_color   = "#5b8567";
			$secondary_color = "#222222";	
		}elseif( $color_palette == "palettes-4" ){
			$primary_color   = "#567284";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-5" ){
			$primary_color   = "#e48531";
			$secondary_color = "#222222";
		}elseif( $color_palette == "palettes-6" ){																				
			$primary_color   = "#202220";
			$secondary_color = "#383b38";
		}
	}

	// Primary Color.
	if ( ! empty( $primary_color ) ) {

		$custom_css .= "
		code,
		a>code,
		cite ,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-category a:hover,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-category a:active,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-category a:focus,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-author:hover,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-author:active,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-author:focus,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:hover,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:active,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:focus,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:hover a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:focus a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:active a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:hover .fa-user,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:active .fa-user,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-meta-wrap .tt-post-author:focus .fa-user,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:hover a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:active a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:focus a,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:hover svg,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:active svg,
		.single-post .tt-post-details .tt-post-meta-wrap .tt-post-comment:focus svg,
		.wp-calendar-table tbody #today ,
		footer .mc4wp-form-fields p label,
		.page .blog-style .tt-post-more a:hover,
		.single-post .tt-post-details a:not(.single-post #comments a):not(.wp-block-button a.wp-block-button__link):not(.wp-block-cover-text a):not(.wp-block-file .wp-block-file__button):not(.wp-block-archives-list a):not(.wp-calendar-nav .wp-calendar-nav-prev a):not(.wp-block-latest-comments__comment-meta a):not(.wp-block-latest-posts__list a):not(.wp-block-tag-cloud a):not(.wp-block-rss a):not(.page-links a):not(table tbody tr th a):not(blockquote cite a),
		.page-links a.post-page-numbers ,
		.wp-block-image .aligncenter>figcaption a,
		.wp-block-image .alignleft>figcaption a,
		.wp-block-image .alignright>figcaption a ,
		.wp-block-button.is-style-outline .wp-block-button__link:hover,
		.search-icon .top-search .search-form button:hover .fa-search,
		.header-top .top-button a ,
		.search-icon .top-search .search-fix .search .search-close-btn:hover .fa-times,
		.back-to-top:hover::after,	
		.header-top .top-button a::before,
		#primary .woocommerce ul li a:hover,
		.product_loadmore ,
		.product-next-prev .product-popup .popup-content .popup-title,
		.single-product .product_meta .sku_wrapper,
		.single-product .product_meta .posted_in,
		.single-product .product_meta .tagged_as,
		.single-product .product .entry-summary .product-button-wrap .btn-hv a:hover, .single-product .product .entry-summary .product-button-wrap .btn-hv a:hover::before ,
		.single-product .product .entry-summary .product-button-wrap .btn-hv .compare-button a:hover, .single-product .product .entry-summary .product-button-wrap .btn-hv a:hover span,
		#primary .woocommerce ul li a:hover,
		div.list_product_size:hover,
		.woocommerce-active #primary .widget_block .wc-block-attribute-filter ul li:hover label ,
		.list_product_size.select_variation,
		.product a,
		.cat_desc .wpcat-content a,
		.single-product .entry-summary .star-rating+.woocommerce-review-link:hover,
		.product-top-sorting .filter:hover,
		.head-hamburger-menu svg ,.woocommerce-grouped-product-list-item__price .amount,
		.single-categories span,
		.cat_desc:hover .wpcat-content .cat_name,
		#page .blog-style .tt-post-title a:hover,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content h3 span a,
		.woocommerce-cart .cart-content-left th,.order_details .woocommerce-table__line-item .product-name a:hover ,
		.woocommerce-cart .cart-content-left td .amount,
		.woocommerce-account .woocommerce a,
		.woocommerce-edit-address .woocommerce-Address .title h3,
		.dark-mode .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count,
		#yith-quick-view-modal .yith-wcqv-wrapper .yith-wcqv-main .woocommerce.single-product .woocommerce-product-gallery__wrapper .owl-nav button span,
		.email-popup-inner-con .message,
		.single-update-price,
		.coming_section .tt-section-title .tt-section-sab,
		.contact_social svg,
		.contact_social svg:hover ,
		.service-block .text-start .row-01 .tt-feature-box-title:hover,
		.wishlist_table .product-price .amount,
		.rs-parallax-wrap .slider-btn.rev-btn::before,
		.deal_of_the_day ins .amount bdi,
		.single-product.dark-mode .buy-now-wrap .button::before,
		.single-product.dark-mode .product .entry-summary .cart-wrap .product-button,
		.dark-mode.single-product .buy-now-wrap .button,
		footer .main-footer .social-media a:hover,
		.single-product.dark-mode .comment-form .form-submit .submit,
		.product .product-button-wrap .btn-hv a:hover::before,
		.woocommerce-account #primary .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
		.woocommerce-account #primary .woocommerce .woocommerce-MyAccount-navigation ul li a:hover,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content h3 strong,
		.single-product .product-estimate .delivery-shipping-wrap span,
		.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button:hover,
		#product-deal-week .title-wrap .timer-date > div > p.second,
		.swiper-wrapper .testimonial-wrap .testimonial-info-wrapper .testimonial-info .testimonial-author,
		.ttcontent .tt-feature-box-title,.service-block .swiper-slide:hover .tt-feature-box-containt .tt-feature-box-title,
		.blog-style .tt-post-details .tt-post-title a,footer .mc4wp-form-fields .newsletter-form > button:hover		{
            color: $primary_color;
		}";


		$custom_css .= "
		
		.elementor-button,
		.testimonial-section.swiper .swiper-pagination-bullet.swiper-pagination-bullet-active,
		.page .wpvideo-content .btn-primary,
		.footer-style-1 .footer-newsletter .news-form .newsletter-form2 .btn-primary::after,
		.single-product .product .entry-summary .cart-wrap .product-button,
		.blog-style .tt-post-thumbnail .zoom-icon:hover,
		.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button.checkout,
		.pagination .page-numbers li .current,
		.pagination .page-numbers li>a:hover,
		.pagination .page-numbers li>a:active,
		.printera-sale span ,
		::selection,
		.right-header .mini-cart .dropdown-menu-mini-cart .widget_shopping_cart_content .buttons .button:hover::before,
		.product .product-button::after,
		.home .transparent.header_style.site-header:hover,
		.header_style.site-header.header-style-1.transparent.sticky .site-branding,
		.parallax-button .elementor-button::after,
		.slider-buttom-04 .elementor-button::after,
		.section-ser .section-ser-title .tt-section-title,.night-light-label .night-light-ball,
		.page .cart-content-right .checkout-button::after,
		.woocommerce-active.archive .site-main .products.short-view .product .timer,
		.woocommerce-active.archive .site-main .products.list-view .product .timer ,
		.woocommerce-active.archive .products.list-view .product .list-cart-wrap .product-button::after ,
		.widget_price_filter.woocommerce .price_slider_amount .button:hover,
		.widget_block .wc-block-price-slider .wc-block-components-price-slider.wc-block-components-price-slider--has-filter-button .wc-block-components-price-slider__controls>button,
		.list-view .product .cart-button-list .product-button-wrap .btn-hv::after ,
		.page-links .post-page-numbers.current,
		.page-links a.post-page-numbers:hover,.deal_of_the_day .quickview a::after, .deal_of_the_day .product-button-hv .compare .compare-button a::after, .deal_of_the_day .yith-wcwl-add-to-wishlist span::after ,
		.page-links a.post-page-numbers:focus,.deal_of_the_day .cart-wrap a::after ,
		.woocommerce-active #primary .wc-block-attribute-filter ul li:hover label .wc-filter-element-label-list-count,
		.page-links a.post-page-numbers:active ,.deal_of_the_day .wishlist .yith-wcwl-add-button a::before ,
		.pagination .page-numbers li>a:focus ,
		.progress-bar span,
		.printera-sale span,
		footer.site-footer #footer-top,
		.single-product .stickycart-popup .cart-wrap .product-button,
		.wp-block-button .wp-block-button__link:hover,.product-category .product .product-button::after ,
		.btn-primary::after,.btn.btn-secondary,.blog_02 .blog-style .tt-post-more a,.footer-bottom .footer-newsletter,
		.button-cat-wrap,.product-category .product .product-button-wrap .wishlist a::after,
		.woocommerce-active.archive .list-view .product .product-content-wrap .list-cart-wrap .product-button-wrap .product-button-hv .btn-hv .exists a ,
		.category-grid.product-category .swiper-wrapper .swiper-slide>a .wpcat-content .cat_name::after
		{
			background : $primary_color;
		}";

		$custom_css .= "
		.single-product .buy-now-wrap .button:hover ,
		#product-deal-week .title-wrap .timer-date > div,
		.blog-style .tt-post-thumbnail .zoom-icon:hover,
		.pagination .page-numbers li .current,
		.pagination .page-numbers li>a:hover,
		.pagination .page-numbers li>a:active,
		.page .blog-style .tt-post-more a:hover,
		.product_loadmore .shop-loadmore:hover,
		.pagination .page-numbers li>a:focus ,
		.wp-block-button.is-style-outline .wp-block-button__link:hover
		{ 
			  border-color: $primary_color; 
		}";

	}

	// Secondary Color.
	if ( ! empty( $secondary_color ) ) {

		$custom_css .= "
		header .social-main li > a:hover,.product .wrap-rate .star-rating::before,.product .star-rating span::before
		{ 
			color: $secondary_color; 
		}";


		$custom_css .= "
		.header-style-1 .right-header .mini-cart .dropdown-back .basket-item-count #mini-cart-count,
		.site-header ul#primary-menu li>a::after,
	#mega-menu-wrap-header-menu #mega-menu-header-menu > li.mega-menu-item > a.mega-menu-link::before 
		{
			background : $secondary_color;
		}";
		
		$custom_css .= "
		.wishlist-wrap .wishlist a:hover svg,
		header .social-main li > a:hover svg,
		.navbar-woocommerce .navbar-title:hover > svg,
		.search-icon .search-wrap:hover svg,
		.right-header .mini-cart:hover .dropdown-back svg
		{
			stroke: $secondary_color;
		}";
		$custom_css .= "
		#product-deal-week #deal-week.hover-02
		{
		border-color: $secondary_color;
		}";
		

	}

	// Tertiary Color.
	if ( ! empty( $tertiary_color ) ) {

		$custom_css .= " 
		.testimonial-wrap .testimonial-info-wrapper .testimonial-info .testimonial-author, .tt-banner .banner-text.printera-icon-center, .single-product .single-product-thumbnail .printera-sale span.label, h1.title
		{
			 color: $tertiary_color; 
		} ";

	}

	// Border Color.
	if ( ! empty( $border_color ) ) {

		$custom_css .= " 
		.single-product .entry-summary .list-timer, .tt-post-meta-wrap, .search-form input[type='search'], .widget.widget_search input[type='search'], .wp-block-search input[type='search'], .single-product .product .sticky-addToCart .quantity, .variations_form .variations td.value .select_box.attribute_pa_size .select_option span, table.wishlist_table tbody td, table.wishlist_table thead th, .woocommerce-account .woocommerce-MyAccount-content .edit-account fieldset, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation, .woocommerce-account .woocommerce #customer_login .u-column1, .woocommerce-checkout .woocommerce .checkout .order_review-wrap .shop_table th, .woocommerce-checkout .woocommerce .checkout .order_review-wrap .shop_table td, .woocommerce-cart .cart-content-left th, .woocommerce-cart .cart-content-left td, .woocommerce-cart .woocommerce-cart-form .product-quantity .quantity, .single-product .product .sticky-addToCart .quantity, .single-product.thumbnail-slider-style2 .woocommerce-tabs ul li, .single-product.thumbnail-slider-style3 .woocommerce-tabs ul li, .single-product .product .entry-summary .price, .single-product .product_meta, .single-product .woocommerce-tabs ul.tabs, .single-product .woocommerce-tabs, .woocommerce-active.archive .shop-sidebar .sidebar-filter .widget, .woocommerce-active.archive .shop-nosidebar .widget, .product-top-sorting .select-wrap select, .woocommerce .select2-container--default .select2-selection--single, .widget_block .wc-block-price-filter__title::after, .widget .wc-block-attribute-filter__title::after, .woocommerce.widget .widget-title::after, .widget .wc-block-attribute-filter .components-form-token-field, .product .product-button-wrap, .right-header .mini-cart .dropdown-menu-mini-cart .cart-slider, .page-links a.post-page-numbers, footer .site-info .copyright, .pagination .page-numbers li>a, .pagination .page-numbers li>span, .comment-list li.comment .comment-body, #post_sidebar .widget ul li, #post_sidebar .widget ol li, .single-post .tt-post-details ul.wp-block-archives-list li, footer.site-footer, .wp-block-table.is-style-stripes, blockquote, .wp-block-quote.is-style-large, table, table td, table th, .woocommerce-active.single-post .tt-post-wrapper, .widget-area .widget, .blog .format-standard .tt-post-wrapper
		{
			 border-color: $border_color; 
		} ";

	}


	wp_add_inline_style( 'printera-custom', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'printera_color_customization', 10 );
