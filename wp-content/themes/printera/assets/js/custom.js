(function ($) {

	"use strict";

	/**
	 * Ready
	 */
	jQuery(document).ready(function () {

		new kursor({
			type: 4,
		})

		/**
		 * loader
		 */
		jQuery(".site-loader").delay(0).fadeOut("slow");
		toggleResize();
		ShopGrid();
		FilterToggle();

		jQuery(".wpml-ls-legacy-dropdown .wpml-ls-item > .wpml-ls-link").removeAttr("href");

		$(".wpml-ls-legacy-dropdown .wpml-ls-item > .wpml-ls-link").click(function () {
			alert("The language switcher showing for demo purpose.");
		});

		/**
		 * Trigger on Enter press
		 */
		jQuery(".quantity .qty").on("keypress", function (e) {
			if ((e.which || e.keyCode) === 13) {
				jQuery(this).parents(".product").find(".add_to_cart_button").trigger("click");
			}
		});

		jQuery(".quantity .qty").on("change", function () {
			var add_to_cart_button = jQuery(this).parents(".product").find(".add_to_cart_button");
			// For AJAX add-to-cart actions
			add_to_cart_button.attr("data-quantity", jQuery(this).val());
			// For non-AJAX add-to-cart actions
			add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + jQuery(this).val());
		});

		jQuery("#typed").typed({
			strings: ["Best Collection", "Global Brands", "Iconic Products"],
			typeSpeed: 100,
			startDelay: 0,
			backSpeed: 60,
			backDelay: 1000,
			loop: true,
			cursorChar: "",
			contentType: 'html'
		});

		/**
		 * select box down icon
		 */
		jQuery("select").wrap("<div class='select-wrap'></div>");

		jQuery('.search-icon .search-wrap').on('click', function () {
			jQuery('body').addClass("search-side-toggle");
		});

		jQuery(window).scroll(function () {
			if (jQuery('body').hasClass('hamburger-side-toggle')) {
				document.getElementById("navbar-hamburger1").style.width = "0";
				jQuery('.viewport').css('marginRight', '0');
				jQuery('body').removeClass('hamburger-side-toggle');
			}
		});

		/**
		 * hamburger-menu toggle
		 */
		jQuery('#hamburger-menu ul.sub-menu').before('<span class="toggle-sub-menu"></span>');
		jQuery('#hamburger-menu li.menu-item-has-children .toggle-sub-menu').on('click', function () {
			jQuery(this).next('ul.sub-menu').slideToggle();
			jQuery(this).parent().siblings().children('ul').slideUp();
			jQuery(this).parent().toggleClass('show').siblings().removeClass('show');
		});

		/**
		 * Grid List View
		 */
		jQuery('.product-sort-view a.filter.grid').on('click', function () {
			jQuery(this).addClass('active').siblings().removeClass('active');
			jQuery('div.products').addClass('grid-view').removeClass('list-view');
		});
		jQuery('.product-sort-view a.filter.list').on('click', function () {
			jQuery(this).addClass('active').siblings().removeClass('active');
			jQuery('div.products').addClass('list-view').removeClass('grid-view');
		});

		jQuery(window).resize(ShopGrid);
		jQuery(window).load(ShopGrid);

		function ShopGrid() {
			if (jQuery(window).width() > 1199) {
				jQuery(".body-grid-4 #grid").addClass('active').siblings().removeClass('active');
				jQuery(".body-grid-3 #grid-3").addClass('active').siblings().removeClass('active');
				jQuery(".body-grid-2 #grid-2").addClass('active').siblings().removeClass('active');
				jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
				jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
			}
			if (jQuery(window).width() <= 1199 && jQuery(window).width() >= 576) {
				jQuery(".body-grid-3 #grid-3, .body-grid-4 #grid-3, .body-grid-5 #grid-3, .body-grid-6 #grid-3").addClass('active').siblings().removeClass('active');
				jQuery(".body-grid-2 #grid-2").addClass('active').siblings().removeClass('active');
				jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
				jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
			}
			if (jQuery(window).width() <= 767) {
				jQuery(".body-grid-2 #grid-2, .body-grid-3 #grid-2, .body-grid-4 #grid-2, .body-grid-5 #grid-2, .body-grid-6 #grid-2").addClass('active').siblings().removeClass('active');
				jQuery(".body-list-view #list").addClass('active').siblings().removeClass('active');
				jQuery(".body-short-view #short").addClass('active').siblings().removeClass('active');
			}
		}

		/**
		 * Blog masonry
		 */
		if (jQuery('div').hasClass('.blog.grid')) {
			jQuery('.grid').masonry({
				columnWidth: 200,
				itemSelector: '.grid-item'
			});
		}


		/**
		 * Shop masonry
		 */
		if (jQuery('div').hasClass('shop grid')) {
			jQuery('.grid').masonry({
				itemSelector: '.grid-item',
			});
		}

		/**
		 * Filter
		 */

		jQuery('.filter.full').on('click', function () {
			jQuery('#post_sidebar').slideToggle();
		});

		jQuery('.filter.offside-left, .filter.offside-right').on('click', function () {
			jQuery('#post_sidebar').slideToggle();
			jQuery('body').addClass("filter-toggle");
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.site-main .offsidebar-left .widget-area .widget_block:first-child, .site-main .offsidebar-right .widget-area .widget_block:first-child').before('<span class="filter-close"></span>');
		jQuery('.filter-close').on("click", function () {
			jQuery('body').removeClass("filter-toggle");
		});


		jQuery(window).resize(FilterToggle);

		function FilterToggle() {
			if (jQuery(window).width() <= 991) {
				jQuery('.site-main .widget-area .widget_block:first-child').before('<span class="filter-close"></span>');
				jQuery('.filter-close').on("click", function () {
					jQuery('body').removeClass("filter-toggle");
				});
			}
		}

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".offside .widget-area")[0];
			var dropdown = jQuery(".offside .widget-area");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("filter-toggle");
			}
		});



		jQuery('.filter.right, .filter.left').on('click', function () {
			jQuery('#post_sidebar').slideDown();
			jQuery('body').addClass("toggle-filter");
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery('.shop-sidebar .widget-area .woocommerce:first-child').before('<span class="filter-close"></span>');
		jQuery('.filter-close').on("click", function () {
			jQuery('body').removeClass("toggle-filter");
		});

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".shop-sidebar .widget-area")[0];
			var dropdown = jQuery(".shop-sidebar .widget-area");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("toggle-filter");
			}
		});



		/**
		 * minicart
		 */
		jQuery(".mini-cart a.dropdown-back").on("click", function (event) {
			jQuery('body').addClass("side-toggle");
			event.stopPropagation();
			event.preventDefault();
		});
		jQuery('.dropdown-menu-mini-cart .cart-close').on("click", function () {
			jQuery('body').removeClass("side-toggle");
		});

		jQuery(document).on("click", function (event) {

			var trigger = jQuery(".cart-slider")[0];
			var dropdown = jQuery(".cart-slider");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('body').removeClass("side-toggle");
			}
		});

		/**
		 * close notice
		 */
		const Nsession = localStorage.getItem('noticeSession');
		if (Nsession == "notice") {
			jQuery('.temp-notice').hide();
		} else {
			jQuery('.temp-notice > svg').on('click', function () {
				localStorage.setItem('noticeSession', 'notice');
				jQuery(".temp-notice").fadeOut(500);
			});
		}

		stickyleft();

		/**
		 * Header Sticky
		 */
		jQuery(window).on('scroll', function () {
			if (jQuery(this).scrollTop() > 200) {
				jQuery('.header-sticky').addClass("sticky");
			}
			else {
				jQuery('.header-sticky').removeClass("sticky");
			}
		});

		/**
		 * Set the date we're counting down to
		 */
		setInterval(swapImages, 1000);

		jQuery('.product-360-button a').magnificPopup({
			type: 'inline',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			disableOn: false,
			preloader: false,
			fixedContentPos: false,
			callbacks: {
				open: function () {
					jQuery(window).resize()
				}
			}
		});

		jQuery('.progress-bar > span, .rating-percentage-bar > span').each(function () {
			var $this = jQuery(this);
			var width = jQuery(this).data('percent');

			$this.css({
				'transition': 'width 2s'
			});
			setTimeout(function () {
				$this.css('width', width + '%');
			}, 500);
		});

		jQuery('.navbar-woocommerce a.navbar-title').on('click', function () {
			jQuery(this).next('ul#woocommerce-menu').slideToggle();
			jQuery('body').toggleClass('show-user').siblings().removeClass('show-user');
			event.stopPropagation();
			event.preventDefault();
		});

		jQuery(document).on("click", function (event) {
			var trigger = jQuery(".navbar-woocommerce #woocommerce-menu")[0];
			var dropdown = jQuery(".navbar-woocommerce #woocommerce-menu");

			if (dropdown !== event.target && !dropdown.has(event.target).length && trigger !== event.target) {
				jQuery('.navbar-woocommerce a').next('ul#woocommerce-menu').slideUp();
				jQuery('body').removeClass('show-user');
			}
		});


		/**
	 * Coming Soon
	 */
		if (jQuery('div').hasClass('coming-soon-page')) {
			jQuery('body').addClass('coming-soon-mode');
			jQuery('.coming-soon-mode .site-header').remove();
			jQuery('.coming-soon-mode .header-top').remove();
			jQuery('.coming-soon-mode .page-header').remove();
			jQuery('.coming-soon-mode footer').remove();
		}

		/**
		 * back to top
		 */
		var back_top_btn = jQuery('#section-top');
		jQuery(window).on('scroll', function () {
			if (jQuery(window).scrollTop() > 300) {
				back_top_btn.addClass('show');
			} else {
				back_top_btn.removeClass('show');
			}
		});
		back_top_btn.on('click', function () {
			jQuery('html, body').animate({ scrollTop: 0 }, 0);
		});

		var progressPath = document.querySelector('.back-to-top path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = jQuery(window).scrollTop();
			var height = jQuery(document).height() - jQuery(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		jQuery(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;

		jQuery(window).on('scroll', function () {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').addClass('active-progress');
			} else {
				jQuery('.back-to-top').removeClass('active-progress');
			}
		});

		jQuery('.back-to-top').on('click', function (event) {
			event.preventDefault();
			jQuery('html, body').animate({ scrollTop: 0 }, duration);
			return false;
		});

		/**
		 * subscribe ( Newslatter )
		 */
		const EmailpSession = localStorage.getItem('emailSession');
		if (EmailpSession == "on") {
			jQuery('.email-popup-con').hide();
		} else {
			jQuery('.email-popup-con').delay(1000).fadeIn();
			jQuery('.nothanks').on('click', function () {
				jQuery(".email-popup-con").fadeOut(500);
				localStorage.setItem('emailSession', 'on');
			});
		}


		/**
		 * top view animation
		 * */
		var $moveable = jQuery('.section-img-01');
		var rectPosY = parseInt(jQuery('.section-img-01').css('top'), 10);
		var rectPosX = parseInt(jQuery('.section-img-01').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable.css({ 'top': rectPosY - e.pageY / 50, 'left': rectPosX - e.pageX / 50 });
		});

		var $moveable1 = jQuery('.section-img-02');
		var rectPos1Y = parseInt(jQuery('.section-img-02').css('top'), 10);
		var rectPos1X = parseInt(jQuery('.section-img-02').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable1.css({ 'top': rectPos1Y - e.pageY / 50, 'left': rectPos1X - e.pageX / 50 });
		});

		var $moveable2 = jQuery('.section-img-03');
		var rectPos2Y = parseInt(jQuery('.section-img-03').css('top'), 10);
		var rectPos2X = parseInt(jQuery('.section-img-03').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable2.css({ 'top': rectPos2Y - e.pageY / 50, 'left': rectPos2X - e.pageX / 50 });
		});

		var $moveable3 = jQuery('.section-img-04');
		var rectPos3Y = parseInt(jQuery('.section-img-04').css('top'), 10);
		var rectPos3X = parseInt(jQuery('.section-img-04').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable3.css({ 'top': rectPos3Y - e.pageY / 50, 'left': rectPos3X - e.pageX / 50 });
		});

		var $moveable4 = jQuery('.section-img-05');
		var rectPos4Y = parseInt(jQuery('.section-img-05').css('top'), 10);
		var rectPos4X = parseInt(jQuery('.section-img-05').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable4.css({ 'top': rectPos4Y - e.pageY / 50, 'left': rectPos4X - e.pageX / 50 });
		});

		var $moveable5 = jQuery('.section-img-06');
		var rectPos5Y = parseInt(jQuery('.section-img-06').css('top'), 10);
		var rectPos5X = parseInt(jQuery('.section-img-06').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable5.css({ 'top': rectPos5Y - e.pageY / 50, 'left': rectPos5X - e.pageX / 50 });
		});

		var $moveable6 = jQuery('.section-img-07');
		var rectPos6Y = parseInt(jQuery('.section-img-07').css('top'), 10);
		var rectPos6X = parseInt(jQuery('.section-img-07').css('left'), 10);
		jQuery(".section-top").mousemove(function (e) {
			$moveable6.css({ 'top': rectPos6Y - e.pageY / 60, 'left': rectPos6X - e.pageX / 60 });
		});

		var $moveable7 = jQuery('.hover-01');
		var rectPos7Y = parseInt(jQuery('.hover-01').css('top'), 10);
		var rectPos7X = parseInt(jQuery('.hover-01').css('left'), 10);
		jQuery(".about-hover-01").mousemove(function (e) {
			$moveable7.css({ 'top': rectPos7Y - e.pageY / 60, 'left': rectPos7X - e.pageX / 60 });
		});

		var $moveable8 = jQuery('.hover-02');
		var rectPos8Y = parseInt(jQuery('.hover-02').css('top'), 10);
		var rectPos8X = parseInt(jQuery('.hover-02').css('left'), 10);
		jQuery(".about-hover-01").mousemove(function (e) {
			$moveable8.css({ 'top': rectPos8Y - e.pageY / 60, 'left': rectPos8X - e.pageX / 60 });
		});

		var $moveable9 = jQuery('.hover-03');
		var rectPos9Y = parseInt(jQuery('.hover-03').css('top'), 10);
		var rectPos9X = parseInt(jQuery('.hover-03').css('left'), 10);
		jQuery(".about-hover-01").mousemove(function (e) {
			$moveable9.css({ 'top': rectPos9Y - e.pageY / 60, 'left': rectPos9X - e.pageX / 60 });
		});

	});

	jQuery(window).resize(toggleResize);

	jQuery('button.navbar-toggler').on('click', function () {
		jQuery('#primary-menu').slideToggle();
	});

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

		if (jQuery(window).width() <= 575) {
			header_toggle();
		}
		jQuery(window).resize(header_toggle);

		function header_toggle() {
			if (jQuery(window).width() <= 575) {
				jQuery(".header-stickybar-wrap").addClass('sticky');
			} else {
				jQuery(".header-stickybar-wrap").removeClass('sticky');
			}
		}

		if (jQuery('div').hasClass('timer-datetime')) {

			var $timeDate = jQuery('.timer-datetime').attr('data');
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
	}

	function toggleResize() {
		if (jQuery(window).width() <= 991) {
			// jQuery('#primary-menu .sub-menu').before('<span class="toggle-sub-menu"></span>');
			humburger_click();

		}
	}

	function humburger_click() {
		jQuery('#hamburger-menu ul.sub-menu').before('<span class="toggle-sub-menu"></span>');
		jQuery('li.menu-item-has-children .toggle-sub-menu').on('click', function () {
			jQuery(this).next('ul.sub-menu').slideToggle();
			jQuery(this).parent().siblings().children('ul').slideUp();
			jQuery(this).parent().toggleClass('show').siblings().removeClass('show');
		});
	}

	jQuery('.header_style.site-header .menu-content .head-hamburger-menu .humburger-icon-wrap').on('click', function () {
		jQuery(this).next().slideToggle('slow');
		event.stopPropagation();
		event.preventDefault();
	});

	jQuery(window).resize(stickyleft);

	function stickyleft() {
		if (jQuery(window).width() >= 992) {
			if (jQuery(document).width() <= 1199) {
				jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').theiaStickySidebar({
					additionalMarginBottom: 30,
					additionalMarginTop: 60
				});
			} else if (jQuery(document).width() >= 1200) {
				jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').theiaStickySidebar({
					additionalMarginBottom: 30,
					additionalMarginTop: 50
				});
			}
		} else {
			jQuery('#post_content, #post_sidebar, .single-product-image, .single-product-content, #tab-reviews .product-review-tab, .single-product.thumbnail-slider-style1 .woocommerce-tabs #tab-reviews #reviews').removeAttr("style");
		}
	}

	jQuery(window).on('scroll', function () {
		if (jQuery(this).scrollTop() > 600) {
			jQuery('.email-popup-con').addClass('fixed');
			jQuery('.sticky-addToCart').addClass('sticky');
		}
		else {
			jQuery('.email-popup-con').removeClass('fixed');
			jQuery('.sticky-addToCart').removeClass('sticky');
		}
	});

	jQuery(window).resize(ShopGrid);

	function ShopGrid() {
		if (jQuery(window).width() <= 991) {
			if (jQuery("#grid-3").hasClass("active") || jQuery("#grid-2").hasClass("active")) {
				jQuery("#grid").addClass('active');
			}
		}
	}

	jQuery('.wcml-dropdown li.wcml-cs-active-currency').on('click', function () {
		jQuery('.wcml-cs-submenu').slideToggle();
		jQuery('.wcml-cs-submenu').css('visibility', 'visible');
		jQuery('body').toggleClass('dropdownlscs');
		jQuery('.wpml-ls-sub-menu').slideUp();
	});
	jQuery('.wpml-ls-legacy-dropdown li.wpml-ls-item-legacy-dropdown').on('click', function () {
		jQuery('.wpml-ls-sub-menu').slideToggle();
		jQuery('.wpml-ls-sub-menu').css('visibility', 'visible');
		jQuery('body').toggleClass('dropdownlscs');
		jQuery('.wcml-cs-submenu').slideUp();
	});


	jQuery('.single-product #primary > .container > .row > .woocommerce-notices-wrapper').addClass("container");

	if (jQuery(window).width() <= 991) {
		footer_toggle();
	}
	jQuery(window).resize(footer_toggle);

	function footer_toggle() {
		if (jQuery(window).width() <= 991) {
			if (jQuery('.footer-click').length != 0) {
				jQuery(".footer-click").remove();
			}
			jQuery("footer .widget h2.widget-title").append("<span class='footer-click'></span>");
		} else {
			jQuery(".footer-click").remove();
		}
		jQuery('footer .widget h2.widget-title .footer-click').on('click', function () {
			jQuery(this).toggleClass('footer-clicked');
			jQuery(this).parent().next().slideToggle();
		});
	}


	jQuery('.sticky-close').on('click', function () {
		jQuery('body').addClass('nosticky');
	});

	jQuery(".elementor-accordion-item").on('click', function () {
		jQuery('.elementor-accordion-item .elementor-tab-content').removeAttr('hidden');
	});




})(jQuery);
