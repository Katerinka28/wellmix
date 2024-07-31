( function( $ ) {

	jQuery(document).ready(function() {

		jQuery( '.slider-popup-wrap' ).on('click', function(){
			jQuery( '.nslick-current.nslick-active a' ).trigger( "click" );
		});

		jQuery('.youtube-popup, .popup-vimeo, .popup-gmaps').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,

			fixedContentPos: false
		});

		if(jQuery('div').hasClass('gallery-top')){
			var galleryTop = new Swiper('.gallery-top', {
				// direction: "vertical",
				// effect: "cards",
				grabCursor: true,
				spaceBetween: 30,
				pagination: {
					el: ".swiper-pagination",
					type: "progressbar",
				},
				navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
				},
			});

			
		}

		jQuery( "#product-trending, #product-by-categories" ).tabs();
		
		jQuery('#gallary_tabs a').mouseover( function(){
			jQuery(this).parent().addClass('active').siblings().removeClass('active');
			var activeId = jQuery(this).data( 'id' );
			jQuery( '.category-gallery-wrap' ).children( '.'+activeId ).addClass('active').siblings().removeClass('active');
		});

		/* recent view product */
		jQuery('.recent-product .owl-carousel').owlCarousel({
			loop:true,
			nav: true,
			dots: false,
			margin:10,
			items:4,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					margin: 10
				},
				480:{
					items:2,
					margin: 20
				},
				768:{
					items:3,
					margin: 20
				},
				992:{
					items:3,
				},
				1200:{
					items:4,
					loop:false
				}
			}
		});

		/* up-sell product */
		jQuery('.up-sells .owl-carousel').owlCarousel({
			loop:true,
			nav: true,
			dots: false,
			margin:10,
			items:4,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					margin: 10
				},
				480:{
					items:2,
					margin: 20
				},
				768:{
					items:3,
					margin: 20
				},
				992:{
					items:3,
				},
				1200:{
					items:4,
					loop:false
				}
			}
		});

		/* related product */
		jQuery('.related .owl-carousel').owlCarousel({
			loop:true,
			nav: true,
			dots: false,
			margin:10,
			items:4,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					margin: 10
				},
				480:{
					items:2,
					margin: 20
				},
				768:{
					items:3,
					margin: 20
				},
				992:{
					items:3,
				},
				1200:{
					items:4,
					loop:false
				}
			}
		});


		swiper_load();
		swiper_slide();
		category_slide();
		video_slide();
		section_product();
		section_deal_product();
		section_best();
		productBy_category();
		blog_slide();

		jQuery(window).resize(function() {
			swiper_load();
			swiper_slide();
			video_slide();
			category_slide();
			section_product();
			section_deal_product();
			productBy_category();
			blog_slide();
		});	


		/**
		 * Trending Product
		 */
		function section_product(){
			if(jQuery('div').hasClass('product-swiper')){
				jQuery('.swiper.product-swiper').each(function() {

					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,
						speed : speed,
						
						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1,
								centeredSlides: false,
								spaceBetween: 20
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
								spaceBetween: 20,
							},
							// breakpoint from 768 up
							768: {
								slidesPerView: tablet,
								spaceBetween: 20,
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
							1401: {
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

				});
			}
		}


		/**
		 * Product By Categories
		 */
		function productBy_category(){
			if(jQuery('div').hasClass('productBy-category')){
				jQuery('.swiper.productBy-category').each(function() {

					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";

					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,

						
						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1,
								centeredSlides: false,
								spaceBetween: 20,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
								spaceBetween: 20,
							},
							// breakpoint from 576 up
							576: {
								slidesPerView: mobile,
								spaceBetween: 20,
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

				});
			}
		}

		/**
		 * Deal Of The Week
		 */
		function section_deal_product(){
			if(jQuery('div').hasClass('deal-swiper')){
				jQuery('.swiper.deal-swiper').each(function() {

					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination"; 
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,
						direction: direction,
						speed : speed,
						
						breakpoints: {
							0: {
								slidesPerView: 	1,
								centeredSlides: false,
								spaceBetween: 20,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
								spaceBetween: 20,
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

				});
			}
		}


		/**
		 * Best Selling
		 */
		function section_best(){
			if(jQuery('div').hasClass('best-sell')){
				jQuery('.swiper.best-sell').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination"; 
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						autoplay: autoplay,
						// speed: 50,
						
						breakpoints: {
							// breakpoint from 480 up
							0: {
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

				});
			}
		}

		/**
		 * ServiceBox
		 * Slider
		 * Testimonial
		 */
		function swiper_slide(){
			if(jQuery('div').hasClass('swiper-slider')){
				jQuery('.swiper.swiper-slider').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination"; 
			
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						autoplay: autoplay,
						/* mousewheel: true,*/
						
						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1,
								spaceBetween: 0,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
							},
							// breakpoint from 576 up
							576: {
								slidesPerView: mobile,
								spaceBetween: 0,
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
				});
			}
		}
		

		/**
		 * Blog
		 */
		function blog_slide(){
			if(jQuery('div').hasClass('blog-slider')){
				jQuery('.swiper.blog-slider').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination"; 
			
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						autoplay: autoplay,
						/* mousewheel: true,*/
						
						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1
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
							768: {
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
				});
			}
		}



		/**
		 * Product Categories
		 */
		function category_slide(){
			if(jQuery('div').hasClass('category-slider')){
				jQuery('.product-category-wrap .swiper.category-slider').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');
					var center = jQuery(this).find( '.swiper-wrapper' ).data('center');

					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";
		
					
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						centeredSlides: center,
						autoplay: autoplay,
						/* mousewheel: true,*/
						
						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	2,
								spaceBetween: 20,
							},
							// breakpoint from 480 up
							480: {
								slidesPerView: mobile,
								spaceBetween: 20,
							},
							// breakpoint from 576 up
							576: {
								slidesPerView: mobile,
								centeredSlides: false,
								spaceBetween: 20,
							},
							// breakpoint from 992 up
							768: {
								slidesPerView: tablet,
							},
							// breakpoint from 1200 up
							1200: {
								slidesPerView: laptop,
							},
							// breakpoint from 1400 up
							1401: {
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
				});
			}
		}
		

		/**
		 * Text Carousel
		 * Video Popup
		 */
		function video_slide(){
			if(jQuery('div').hasClass('swiper-video')){
				jQuery('.swiper.swiper-video').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplayDelay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay-delay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');
			
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,
						autoplay: {
							enabled: true,
							delay: 1,
							disableOnInteraction: true
						},

						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1
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
					});

				});
			}
		}


		/**
		 * Client
		 */
		function swiper_load(){
			if(jQuery('div').hasClass('swiper-client')){
				jQuery('.swiper.swiper-client').each(function() {

					var direction = jQuery(this).find( '.swiper-wrapper' ).data('direction');
					var desktop = jQuery(this).find( '.swiper-wrapper' ).data('desk');
					var laptop = jQuery(this).find( '.swiper-wrapper' ).data('laptop');
					var tablet = jQuery(this).find( '.swiper-wrapper' ).data('tablet');
					var mobile = jQuery(this).find( '.swiper-wrapper' ).data('mobile');
					var autoplayDelay = jQuery(this).find( '.swiper-wrapper' ).data('autoplay-delay');
					var loop = jQuery(this).find( '.swiper-wrapper' ).data('loop');
					var margin = jQuery(this).find( '.swiper-wrapper' ).data('margin');
					var speed = jQuery(this).find( '.swiper-wrapper' ).data('speed');
					
					var next = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-next";
					var prev = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-navigation .swiper-button-prev";
					var pagination = '.'+jQuery(this).attr("data-id")+' '+'+'+".swiper-pagination";
			
					mySwiper = new Swiper('.' + jQuery(this).attr("data-id"), {
						direction: direction,
						spaceBetween: margin,
						loop: loop,
						speed: speed,

						// speed: 50,
						breakpoints: {
							0: {
								slidesPerView: 	1,
								spaceBetween: 0
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
				});
			}
		}

		let options = {
			autostart: true,
			property: 'value',
			onComplete: null,
			duration: 20000,
			padding: 10,
			marquee_class: '.marquee',
			container_class: '.simple-marquee-container',
			sibling_class: 0,
			hover: true,
			velocity: 0.1,
			// direction: 'left'
		}

		jQuery( '.simple-marquee-container' ).SimpleMarquee(options);

		if(jQuery('div').hasClass('blog-carousel') || jQuery('div').hasClass('portfolio-carousel') ){
			jQuery( '.blog-carousel, .portfolio-carousel' ).each( function() {
				var $carousel = jQuery(this);
				$carousel.owlCarousel({
					items: $carousel.data("items"),
					loop: $carousel.data("loop"),
					margin: $carousel.data("margin"),
					stagePadding: $carousel.data("padding"),
					nav: $carousel.data("nav"),
					dots: $carousel.data("dots"),
					autoplay: $carousel.data("autoplay"),
					autoplayHoverPause: true,
					info: $carousel.data("info"),
					animateOut: 'fadeOut',
					navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
					responsiveClass: true,
					responsive: {
						// breakpoint from 0 up
						0: {
							items: 	1
						},
						// breakpoint from 480 up
						480: {
							items: $carousel.data("mobile")
						},
						// breakpoint from 576 up
						576: {
							items: $carousel.data("mobile")
						},
						// breakpoint from 992 up
						992: {
							items: $carousel.data("tablet"),
							// center: $carousel.data("center")
						},
						// breakpoint from 1200 up
						1200: {
							items: $carousel.data("laptop"),
							// center: $carousel.data("center")
						},
						// breakpoint from 1400 up
						1400: {
							items:$carousel.data("desk"),
							// center: $carousel.data("center")
						}
					}
				});
			});
		}



		if(jQuery('div').hasClass('head-slide')){
			jQuery(document).each(function() {
				new Swiper('.swiper.head-slide', {
					loop: true,
					autoplay: {
						enabled: true,
						delay: 1,
						disableOnInteraction: true
					},
					speed: 8000,
					breakpoints: {
						576: {
							slidesPerView: 	2,
						},
						992: {
							slidesPerView: 	2,
						},
						1200: {
							slidesPerView: 	3,
						},
					},
				});
			});
		}

		/**
		 * Clear
		 */
		jQuery('.reset_custom_variations').slideUp();
		jQuery( '.reset_custom_variations' ).on( 'click', function(){

			jQuery('.cart-wrap').html('<a href="javascript:void(0);" class="button product_type_variable add_to_cart_button button disable product-button" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>Add to cart</a>');
			
			jQuery( '.buy-now-wrap > a' ).addClass( 'product_type_variable' );
			
			jQuery('.list_color_attr div.select_variation').removeClass('select_variation');
			jQuery('.list_size_attr div.select_variation').removeClass('select_variation');
			
			jQuery('.list_color_attr div').css( { 'opacity':'1', 'pointer-events':'auto' } ).removeClass( 'not-available' );
			jQuery('.list_size_attr div').css( { 'opacity':'1', 'pointer-events':'auto' } ).removeClass( 'not-available' );
			jQuery('.single-update-price').remove();

			jQuery(this).slideUp();
			
		});


		

		/**
		 * Blog masonry
		 */
		 if (jQuery('div').hasClass('portfolio-grid')) {
			jQuery('.grid').masonry({
				itemSelector: '.grid-item'
			});
		}

		
		setInterval(swapImages, 1000);

		function swapImages() {

			// Get today's date and time
			var now = new Date().getTime();
			jQuery(".timer").each(function (index) {
	
				var countDownDateFrom = jQuery(this).parent().find('.sale-to').data('from') * 1000;
				var countDownDateTo = jQuery(this).parent().find('.sale-to').data('to') * 1000;
				var timer_id = jQuery(this).data('id');
				var sale_id = jQuery(this).parent().find('.sale-to').data('id');
	
				// Find the distance between now and the count down date
				if (countDownDateFrom <= now) {
					var distance = countDownDateTo - now;
				}
	
				if (distance > 0 && countDownDateFrom <= now) {
					// Time calculations for days, hours, minutes and seconds
					var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
					var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
					var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
					var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
	
					if (timer_id == sale_id) {
						jQuery(this).find(".saleend").each(function () {
							jQuery(this).html(days + ' : ' + hours + ' : ' + minutes + ' : ' + seconds);
						})
					}
				}
			});
	
			if (jQuery('div').hasClass('timer-datetime')) {
	
				$timeDate = jQuery('.timer-datetime').attr('data');
				var countDownTimer = new Date($timeDate).getTime();
	
				// Find the distance between now and the count down date
				var distance = countDownTimer - now;
				if (distance > 0) {
					// Time calculations for days, hours, minutes and seconds
					var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
					var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
					var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
					var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
				} else {
					var days = "00";
					var hours = "00";
					var minutes = "00";
					var seconds = '00';
				}
				jQuery('.timer-datetime').html(days + ' : ' + hours + ' : ' + minutes + ' : ' + seconds);
			}

			if (jQuery('div').hasClass('timer-date')) {
	
				$timeDate = jQuery('.timer-date').attr('data');
				var countDownTimer = new Date($timeDate).getTime();
	
				// Find the distance between now and the count down date
				var distance = countDownTimer - now;
				if (distance > 0) {
					// Time calculations for days, hours, minutes and seconds
					var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
					var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
					var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
					var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);
				} else {
					var days = "00";
					var hours = "00";
					var minutes = "00";
					var seconds = '00';
				}
				jQuery('.timer-date .days').html(days);
				jQuery('.timer-date .hours').html(hours);
				jQuery('.timer-date .minutes').html(minutes);
				jQuery('.timer-date .second').html(seconds);

			}
		}
	});
    
} )( jQuery );
