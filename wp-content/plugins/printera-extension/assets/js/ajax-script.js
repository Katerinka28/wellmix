( function( $ ) {
	jQuery(document).ready( function($){
		refreshPage();

		jQuery(window).load(function() {

			if( jQuery( 'div' ).hasClass( 'select_variation' ) ){

				jQuery( '.summary.entry-summary').addClass( 'select_product' );
				jQuery( '.owl-carousel .select_variation, .has-default-attributes').closest('section').addClass( 'select_product_list' );

				jQuery( ".select_product_list" ).each(function( i ) {
					jQuery(this).attr( 'id','selected_list_'+i );
					i++;
				});
			
				jQuery( ".select_product_list" ).each(function() {

					var already_selected_size = jQuery(this).find('.list_product_size.select_variation').attr('data-id');
					var id = jQuery(this).find( '.list_color_attr .select_variation' ).attr( 'data-value' );
					var dataid = jQuery(this).find( '.list_color_attr .select_variation' ).attr( 'data-id' );
					var product_id = jQuery(this).find( 'a.add_to_cart_button.disable' ).attr( 'data-product_id' );
					var availableV = "color";

					jQuery.ajax({
						type: "post",
						contentType: "application/x-www-form-urlencoded",
						dataType: "html",
						url: my_ajax_object.ajax_url,
						data: {
							action			  : 'get_ajax_image',
							id				  : id,
							dataid			  : dataid,
							select_variation  : dataid,
							availableV		  : availableV,
							product_id		  : product_id,
							already_selected  : already_selected_size,
							already_selected2 : already_selected_color,
						},
						success: function(data) {

							var response = $.parseJSON(data);							
							jQuery( ".select_product_list" ).each(function() {
								selected_id = jQuery(this).find('a.add_to_cart_button').attr('data-product_id') ;
								if( response.product_id == selected_id ){
									if( response.img != null ){
										jQuery(this).find('img.product-thumbnail-main').attr('src', response.img[0]);
									}
								}
							});
							
						}
					});	
				});	
			}
		});

		jQuery('.archive .list_product_color, .archive .list_product_size, .owl-carousel .list_product_color , .owl-carousel .list_product_size').on('click',function(){

			var already_selected_size = jQuery(this).parents('.product-attribute-wrap').find('.list_product_size.select_variation').attr('data-id');
			var already_selected_color = jQuery(this).parents('.product-attribute-wrap').find('.list_product_color.select_variation').attr('data-id');
			
			jQuery(this).toggleClass("select_variation").siblings().removeClass('select_variation');
			jQuery(this).addClass('select_variation');
			
			jQuery( '.list_product_color, .list_product_size' ).closest('section') .removeClass('select_product_list');
			jQuery( this ).closest('section').addClass('select_product_list');

			var id = jQuery(this).attr('data-value');
			var dataid = jQuery(this).attr('data-id');
			var select_variation = jQuery('.select_variation').attr('data-id');

			jQuery.ajax({
				type: "post",
				contentType: "application/x-www-form-urlencoded",
				dataType: "html",
				url: my_ajax_object.ajax_url,
				data: {
					action			  : 'get_ajax_image',
					id				  : id,
					dataid			  : dataid,
					select_variation  : select_variation,
					already_selected  : already_selected_size,
					already_selected2 : already_selected_color,
				},
				success: function(data) {
					var response = $.parseJSON(data);

					if( response.size.length != null ){

						var size_length = response.size.length;
						for( let j = 0; j < size_length; j++ ){						
							jQuery('.select_product_list').find( ".list_color_attr div."+response.color[j] ).siblings().css( { 'opacity':'1', 'pointer-events':'auto' } );
						}

					}					

					if( response.img ){
						jQuery( ".select_product_list" ).each(function() {
							jQuery(this).find('img.product-thumbnail-main').attr('src', response.img[0]);
						});
					}

				}

			});

		});


		jQuery('.entry-summary .list_product_color, .entry-summary .list_product_size').on('click',function(){

			
			var already_selected_size = jQuery(this).parents('.product-attribute-wrap').find('.list_product_color.select_variation').attr('data-id');
			var already_selected_color = jQuery(this).parents('.product-attribute-wrap').find('.list_product_size.select_variation').attr('data-id');

			jQuery(this).toggleClass("select_variation").siblings().removeClass('select_variation');
			jQuery(this).addClass('select_variation');

			jQuery( '.summary.entry-summary').addClass( 'select_product' );
			jQuery( '.owl-carousel .select_variation, .has-default-attributes').closest('section').addClass( 'select_product_list' );

			var id = jQuery(this).attr('data-value');
			var dataid = jQuery(this).attr('data-id');
			var select_variation = jQuery('.select_variation').attr('data-id');
			var availableV = "color";

			jQuery.ajax({
				type: "post",
				contentType: "application/x-www-form-urlencoded",
				dataType: "html",
				url: my_ajax_object.ajax_url,
				data: {
					action			  : 'get_ajax_image',
					id				  : id,
					dataid			  : dataid,
					availableV		  : availableV,
					select_variation  : select_variation,
					already_selected  : already_selected_size,
					already_selected2 : already_selected_color,
				},
				success: function(data) {
					var response = $.parseJSON(data);

					if( response.size.length != null ){
						var size_length = response.size.length;
						for( let j = 0; j < size_length; j++ ){
							jQuery('.select_product').find( ".list_color_attr div."+response.color[j] ).siblings().css( { 'opacity':'1', 'pointer-events':'auto' } );
						}
					}

					if( response.color.length != null ){
						var color_length = response.color.length;
						for( let k = 0; k < color_length; k++ ){
							if( response.select_variation != null ){
								if( k == 0 ){
									jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).css( { 'opacity':'1', 'pointer-events':'auto' } ).siblings().css( { 'opacity':'0.5', 'pointer-events':'none' } );

									jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).removeClass( 'not-available' ).siblings().addClass( 'not-available' );

								}else{
									jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).css( { 'opacity':'1', 'pointer-events':'auto' } );
									jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).removeClass( 'not-available' );

								}
							}else{
								jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).siblings().css( { 'opacity':'1', 'pointer-events':'auto' } );
							}
						}
					}

					if(jQuery('section').hasClass('select_product_list') ){
						if( response.img != null ){
							jQuery('.select_product_list').find('img.product-thumbnail-main').attr('src', response.img[0]);
						}
					}
				}
			});
		});

		function refreshPage(){
			jQuery('.add_to_cart_button.ajax_add_to_cart').on('click', function(){
				setTimeout(function(){
					jQuery('.added_to_cart.wc-forward').remove();
				}, 5000);
			});
		}
		
	

		/**
		 * Woocommerce Ajax Search
		 */

		function productSearch(form,query,currentQuery,timeout,category){

			var search   = form.find('.search'),
			category_val   = form.find('.category option:selected').val();

			form.next('.search-results').html('').removeClass('active');
	
			query = query.trim();
	
			if (query.length >= 3) {
	
				if (timeout) {
					clearTimeout(timeout);
				}
	
				form.next('.search-results').removeClass('empty');
	
				search.parent().addClass('loading');
				if (query != currentQuery) {
					timeout = setTimeout(function() {
	
						$.ajax({
							url: my_ajax_object.ajax_url,
							type: 'post',
							data: { action: 'search_product', keyword: query, category: category_val, },
							success: function(data) {

								currentQuery = query;
								search.parent().removeClass('loading');
	
								if (!form.next('.search-results').hasClass('empty')) {
	
									if (data.length) {
										form.next('.search-results').html('<ul>'+data+'</ul>').addClass('active');
									} else {
										form.next('.search-results').html('Product not found.');
									}
	
								}
	
								clearTimeout(timeout);
								timeout = false;
	
	
							}
						});
	
					}, 500);
				}
			} else {
	
				search.parent().removeClass('loading');
				form.next('.search-results').empty().removeClass('active').addClass('empty');
	
				clearTimeout(timeout);
				timeout = false;
	
			}
		}
	
		jQuery('form[name="product-search"]').each(function(){
	
			var form          = jQuery(this),
				search        = form.find('.search'),
				category      = form.find('.category'),
				currentQuery  = '',
				timeout       = false;
	
			category.on('change',function(){
				currentQuery  = '';
				var query = search.val();
				productSearch(form,query,currentQuery,timeout,category);
			});
	
			search.keyup(function(){
				var query = jQuery(this).val();
				productSearch(form,query,currentQuery,timeout,category);
			});
	
		});

		jQuery( '.button.yith-wcqv-button' ).on( 'click', function(){

			setTimeout(function () {
				jQuery( '.entry-summary' ).addClass( 'select_product' );
				onLoadVariation();

			 }, 2000);
		});

		function onLoadVariation(){
				jQuery('.list_product_color, .list_product_size').on('click',function(){
			
					if( jQuery(this).parent().attr('class') == "list_color_attr" ){
						var already_selected = jQuery(this).parents('.product-attribute-wrap').find('.list_product_size.select_variation').attr('data-id');
						var already_selected2 = jQuery(this).parents('.product-attribute-wrap').find('.list_product_color.select_variation').attr('data-id');
					}else{
						var already_selected = jQuery(this).parents('.product-attribute-wrap').find('.list_product_color.select_variation').attr('data-id');
						var already_selected2 = jQuery(this).parents('.product-attribute-wrap').find('.list_product_size.select_variation').attr('data-id');
					}
					
					jQuery(this).toggleClass("select_variation").siblings().removeClass('select_variation');
					jQuery(this).addClass('select_variation');
					jQuery( '.list_product_color, .list_product_size' ).closest('section') .removeClass('select_product');
					jQuery( this ).closest('section').addClass('select_product');
		
					var id = jQuery(this).attr('data-value');
					var dataid = jQuery(this).attr('data-id');
					var select_variation = jQuery('.select_variation').attr('data-id');
		
					jQuery.ajax({
						type: "post",
						contentType: "application/x-www-form-urlencoded",
						dataType: "html",
						url: my_ajax_object.ajax_url,
						data: {
							action			  : 'get_ajax_image',
							id				  : id,
							dataid			  : dataid,
							select_variation  : select_variation,
							already_selected  : already_selected,
							already_selected2 : already_selected2,
						},
						success: function(data) {
							var response = $.parseJSON(data);
				
								if( jQuery( 'section' ).hasClass( 'summary entry-summary select_product' ) ){
									jQuery('.entry-summary').children().find(".reset_custom_variations").slideDown();
								}
								jQuery('#yith-quick-view-content').children().find(".reset_custom_variations").slideDown();

		
								if( response.img ){
									jQuery('.select_product').find('img').attr('srcset', response.img[0]);
									jQuery('.nslick-current.nslick-active').find('img').attr('srcset', response.img[0]);
								}
								if( response.size.length != null ){
		
									var size_length = response.size.length;
									for( let j = 0; j < size_length; j++ ){
										jQuery('.select_product').find( ".list_color_attr div."+response.color[j] ).siblings().css( { 'opacity':'1', 'pointer-events':'auto' } );
									}
								}
		
								price_sort = response.price;
								price_sort.sort();
								i=0;
								$.each(price_sort, function(key, obj) {
									if( i==0 ){
										jQuery('.select_product').find( ".product-default-price").html( '<span class="woocommerce-Price-amount amount">'+obj+'</span>' );
									}else{
										jQuery('.select_product').find( ".product-default-price").append( ' - '+'<span class="woocommerce-Price-amount amount">'+obj+'</span>' );
									}
									i++;
								});
		
								if( response.color.length != null ){
									
									var color_length = response.color.length;
									for( let k = 0; k < color_length; k++ ){
										if( response.select_variation != null ){
											if( k == 0 ){
												jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).css( { 'opacity':'1', 'pointer-events':'auto' } ).siblings().css( { 'opacity':'0.5', 'pointer-events':'none' } );
		
												jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).removeClass( 'not-available' ).siblings().addClass( 'not-available' );
		
											}else{
												jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).css( { 'opacity':'1', 'pointer-events':'auto' } );
												jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).removeClass( 'not-available' );
		
											}
										}else{
											jQuery('.select_product').find( ".list_color_attr div."+response.color[k] ).siblings().css( { 'opacity':'1', 'pointer-events':'auto' } );
										}
		
									}
								}
		
								if( response.cart != null ){
									if( response.select_variation != null ){
										newId = response.variation_id;
										
										jQuery('.select_product').find('a.add_to_cart_button').replaceWith( response.cart );
		
										if( jQuery( 'body' ).hasClass( 'single' ) ){
											defaultId = jQuery('.buy-now-wrap a').attr('href');
											newUrl = defaultId.replace(defaultId.split('=')[1],newId);
											jQuery('.select_product').find('.buy-now-wrap a').attr( 'href', newUrl );
											jQuery('.select_product').find('.buy-now-wrap a').removeClass( 'product_type_variable' );
										}
		
									}
								}else{
									jQuery('.cart-wrap').html('<a href="javascript:void(0);" class="button product_type_variable add_to_cart_button button disable product-button" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>Add to cart</a>');
									jQuery( '.buy-now-wrap > a' ).addClass( 'product_type_variable' );
								}
								if( response.select_variation == null || response.select_variation == '' ){
									var Dhref = jQuery('.select_product').find('a.thumbnail-img').attr( 'href' );
									jQuery('.select_product').find('a.add_to_cart_button').attr( 'href', Dhref );
								}
								
		
							refreshPage();
		
						},
						error: function () {
		
						},
						complete: function () {
						// Handle the complete event
						}
					});
				});


				jQuery( '.reset_custom_variations' ).on( 'click', function(){

					jQuery('.cart-wrap').html('<a href="javascript:void(0);" class="button product_type_variable add_to_cart_button button disable product-button" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>Add to cart</a>');
					
					jQuery( '.buy-now-wrap > a' ).addClass( 'product_type_variable' );
					
					jQuery('.list_color_attr div.select_variation').removeClass('select_variation');
					
					jQuery('.list_color_attr div').css( { 'opacity':'1', 'pointer-events':'auto' } ).removeClass( 'not-available' );
		
					jQuery(this).slideUp();
					
				});
		}

	});
} )( jQuery );
