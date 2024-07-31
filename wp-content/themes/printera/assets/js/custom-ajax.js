jQuery(function($){

	"use strict";

	jQuery(document).ready(function(){

		/************************
		 *  Load Mora Product
		 *************************/


		/**
		 * 	Product Load more on " Click "
		 */
		jQuery('.product_loadButton').click( function(){

			if( jQuery(this).prev().hasClass('list-view') ){
		
				var button = jQuery(this),
					data = {
					'action': 'loadmore_product_list',
					'query': printera_loadmore_params.posts,
					'page' : printera_loadmore_params.current_page
				};
		
				$.ajax({
					url : printera_loadmore_params.ajaxurl,
					data : data,
					type : 'POST',
					beforeSend : function ( xhr ) {
						button.text('Loading...');
					},
					success : function( data ){
						if( data ) {
							jQuery('div.products > .row').append(data);
							printera_loadmore_params.current_page++;
		
							if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
								jQuery('.product_loadmore').html('No More posts');
							}
						} else {
							button.remove();
						}
					}
				});
			}else{

				var button = jQuery(this),
					data = {
					'action': 'loadmore_product',
					'query': printera_loadmore_params.posts,
					'page' : printera_loadmore_params.current_page
				};
		
				$.ajax({
					url : printera_loadmore_params.ajaxurl,
					data : data,
					type : 'POST',
					beforeSend : function ( xhr ) {
						button.text('Loading...');
					},
					success : function( data ){
						if( data ) {
							jQuery('div.products > .row').append(data);
							printera_loadmore_params.current_page++;
		
							if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
								jQuery('.product_loadmore').html('No More posts');
							}
						} else {
							button.remove();
						}
					}
				});
			}

		});

		/**
		 * Product load more " Scroll ""
		 */
		
		if( jQuery('div').hasClass('product_infinite') ) {
    
			jQuery(window).scroll(productLodaMore);
			var viewed = false;

			function isScrolledProduct(elem) {
				var docViewTop = jQuery(window).scrollTop();
				var docViewBottom = docViewTop + jQuery(window).height() - 150;
		
				var elemTop = jQuery(elem).offset().top;
				var elemBottom = elemTop + jQuery(elem).height();
		
				return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
			}

			
			function productLodaMore(){
				if( jQuery('.product_infinite').prev().hasClass('list-view') ){
					if (isScrolledProduct(jQuery(".product_loadmore")) && !viewed) {
						viewed = true;
						var data = {
							'action': 'loadmore_product_list',
							'query': printera_loadmore_params.posts,
							'page' : printera_loadmore_params.current_page
						};
						$.ajax({
							url : printera_loadmore_params.ajaxurl,
							data:data,
							type:'POST',
							beforeSend: function( xhr ){
								jQuery('.shop-loadmore').text('Loading...');
							},
							success:function(data){
								if( data ) {
									jQuery('div.products > .row').append(data);
									printera_loadmore_params.current_page++;

									if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
										jQuery('.product_loadmore').html('No More Product');
									}

								} else {
									button.remove();
								}
							}
						});
					}
				}else{
					if (isScrolledProduct(jQuery(".product_loadmore")) && !viewed) {
						viewed = true;
						var data = {
							'action': 'loadmore_product',
							'query': printera_loadmore_params.posts,
							'page' : printera_loadmore_params.current_page
						};
						$.ajax({
							url : printera_loadmore_params.ajaxurl,
							data:data,
							type:'POST',
							beforeSend: function( xhr ){
								jQuery('.shop-loadmore').text('Loading...');
							},
							success:function(data){
								if( data ) {
									jQuery('div.products > .row').append(data);
									printera_loadmore_params.current_page++;
	
									if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
										jQuery('.product_loadmore').html('No More Product');
									}
	
								} else {
									button.remove();
								}
							}
						});
					}
				}
			}
		}

		/************************
		 *  Load Mora Post
		 *************************/


		/**
		 * Post load more on " Click ""
		 */
		if ( jQuery('div').hasClass('post_loadButton') ) {
			jQuery('.post_loadButton').click(function(){
		
				var button = jQuery(this),
					data = {
					'action': 'loadmore_post',
					'query': printera_loadmore_params.posts,
					'page' : printera_loadmore_params.current_page
				};
		
				$.ajax({
					url : printera_loadmore_params.ajaxurl,
					data : data,
					type : 'POST',
					beforeSend : function ( xhr ) {
						button.text('Loading...');
					},
					success : function( data ){
						if( data ) { 
							button.text( 'More posts' ).before(data);
							printera_loadmore_params.current_page++;
		
							if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
								jQuery('.post_loadmore').html('No More posts');
							} 
						} else {
							button.remove();
						}
					}
				});
			});
		}

		/**
		 * Post load more " Scroll"
		 */

		if ( jQuery('div').hasClass('post_infinite') ) {
    
			jQuery(window).scroll(postLodaMore);
			var viewed = false;

			function isScrolledPost(elem) {
				var docViewTop = jQuery(window).scrollTop();
				var docViewBottom = docViewTop + jQuery(window).height() - 150;
		
				var elemTop = jQuery(elem).offset().top;
				var elemBottom = elemTop + jQuery(elem).height();
		
				return ((elemBottom <= docViewBottom));
			}

			function postLodaMore() {
				if (isScrolledPost(jQuery(".post_loadmore")) && !viewed) {
					viewed = true;
					var data = {
						'action': 'loadmore_post',
						'query': printera_loadmore_params.posts,
						'page' : printera_loadmore_params.current_page
					};
					$.ajax({
						url : printera_loadmore_params.ajaxurl,
						data:data,
						type:'POST',
						beforeSend: function( xhr ){
							jQuery('#post_loadmore').addClass( 'loader' );
						},
						success:function(data){
							
							if( data ) {
								jQuery('#post_content').find('article:last-of-type').after( data );
								printera_loadmore_params.current_page++;

								if ( printera_loadmore_params.current_page == printera_loadmore_params.max_page ){
									jQuery('.post_loadmore').html('No More posts')
								}
							} else {
								button.remove();
							}

							setTimeout(function () {
								jQuery('#post_loadmore').removeClass( 'loader' );
							}, 1000);
						}
					});

				}
			}
		}

		if( jQuery( 'div' ).hasClass( 'product-sort-view' ) ){
			jQuery('.product-sort-view a.grid, .product-sort-view a.list').on('click',function(){
				var id = jQuery(this).attr('id');
				jQuery.ajax({
					type: "post",
					contentType: "application/x-www-form-urlencoded",
					dataType: "html",
					url: printera_loadmore_params.ajaxurl,
					data: {
						action			 : 'cookie_product_view',
						id				 : id,
					},
					success: function(data) {
						console.log(data);
					},
					error: function () {
					},
					complete: function () {
					// Handle the complete event
					}
				});
			});
		}
		
	});

});
