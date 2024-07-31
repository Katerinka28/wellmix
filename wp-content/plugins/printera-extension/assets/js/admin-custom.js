( function( $ ) {
	jQuery(document).ready( function($){
        
		jQuery('#elementor-control-default-c997').each( function() {
            jQuery(this).addClass('h1h2h3h4');
        })

        refreshPage();
		jQuery('.list_product_color, .list_product_size').on('click',function(){
			
			jQuery(this).toggleClass("select_variation").siblings().removeClass('select_variation');
			jQuery(this).closest('li').addClass('select_product');

			var id = jQuery(this).attr('id');
			var dataid = jQuery(this).attr('dataid');

			var select_variation = jQuery('.select_variation').attr('dataid');

			jQuery.ajax({
				type: "post",
				contentType: "application/x-www-form-urlencoded",
				dataType: "html",
				url: my_ajax_object.ajax_url,
				data: {
					action			 : 'get_ajax_image',
					id				 : id,
					dataid			 : dataid,
					select_variation : select_variation,
				},
				success: function(data) {
					var response = $.parseJSON(data);

					// console.log(response.price);

					if( response.img ){
						jQuery('.select_product').find('img').attr('srcset', response.img[0]);
					}
					i=0;
					if( response.size.length ){
						var size_length = response.size.length;
						for( i=0; i<size_length; i++){
							if( i==0 ){
								jQuery('.select_product').find( ".list_size_attr span."+response.size[i] ).css('opacity','1').siblings().css('opacity','0.5');
							}else{
								jQuery('.select_product').find( ".list_size_attr span."+response.size[i] ).css('opacity','1');
							}
						}
					}
					if( response.price.length ){
						var prize_length = response.price.length;
						for( i=0; i<prize_length; i++){
							if( i==0 ){
								jQuery('.select_product').find( "span.price").html(response.price[i]);
							}else{
								jQuery('.select_product').find( "span.price").append(response.price[i]);
							}
						}
					}
					if( response.color.length ){
						var color_length = response.color.length;
						for( i=0; i<color_length; i++){
							if( i==0 ){
								jQuery('.select_product').find( ".list_color_attr span."+response.color[i] ).css('opacity','1').siblings().css('opacity','0.5');
							}else{
								jQuery('.select_product').find( ".list_color_attr span."+response.color[i] ).css('opacity','1');
							}
						}
					}
					if( response.cart ){
						jQuery('.select_product').find('a.add_to_cart_button').replaceWith( response.cart );
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

		function refreshPage(){
			jQuery('.add_to_cart_button.ajax_add_to_cart').on('click', function(){
				setTimeout(function(){
					jQuery('.added_to_cart.wc-forward').remove();
				}, 5000);
			});
		}
		
		var smart_product;

        jQuery(document).on('click', '#smart-product-metabox a.smart-product-add', function(e) {

            e.preventDefault();

            if (smart_product){
                smart_product.close();
            }

            smart_product = wp.media.frames.smart_product = wp.media({
                title: jQuery(this).data('uploader-title'),
                button: {
                    text: jQuery(this).data('uploader-button-text'),
                },
                multiple: true
            });

            smart_product.on('select', function() {
                var listIndex = jQuery('#smart-product-metabox-list li').index(jQuery('#smart-product-metabox-list li:last')),
                selection = smart_product.state().get('selection');

                selection.map(function (attachment, i) {
                    attachment = attachment.toJSON(),
                    index = listIndex + (i + 1);
                    var img_title = jQuery(attachment,'img').attr('title');
                    var image_url;

                    if ( typeof attachment.sizes.thumbnail !== 'undefined' && attachment.sizes.thumbnail ) {
                        if ( typeof attachment.sizes.thumbnail.url !== 'undefined' ) {
                            image_url = attachment.sizes.thumbnail.url;
                        }
                    } else {
                        if ( typeof attachment.url !== 'undefined' ) {
                            image_url = attachment.url;
                        }
                    }

                    jQuery('#smart-product-metabox-list').append('<li><div class="content-wrap"><input type="hidden" name="tt-360-metabox[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + image_url + '" height="150"><small><a class="remove-image button" href="#"><i title="Remove Image" class="fa fa-times-circle" aria-hidden="true"></i></a></small><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image"><i title="Change image" class="fa fa-exchange" aria-hidden="true"></i></a><br></div></li>');
                });
            });

            makeSortable();
            smart_product.open();
        });

        jQuery(document).on('click', '#smart-product-metabox a.change-image', function (e) {
            
            e.preventDefault();
            
            var that = jQuery(this);
            
            if (smart_product){
                smart_product.close();
            }
            
            smart_product = wp.media.frames.smart_product = wp.media({
                title: jQuery(this).data('uploader-title'),
                button: {
                    text: jQuery(this).data('uploader-button-text'),
                },
                multiple: false
            });
            
            smart_product.on('select', function() {
                
                attachment = smart_product.state().get('selection').first().toJSON();
                var img_title = jQuery(attachment,'img').attr('title');

                that.parent().find('input:hidden').attr('value', attachment.id);
                that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
            
            });

            smart_product.open();

        });

        function resetIndex() {
            jQuery('#smart-product-metabox-list li').each(function (i) {
                jQuery(this).find('input:hidden').attr('name', 'tt-360-metabox[' + i + ']');
            });
        }

        function makeSortable() {
            if( jQuery( 'table' ).hasClass( 'smart-product' ) ){
                jQuery('#smart-product-metabox-list').sortable({
                    opacity: 0.6,
                    stop: function () {
                        resetIndex();
                    }
                });
            }
        }

        jQuery(document).on('click', '#smart-product-metabox a.remove-image', function(e) {
            e.preventDefault();

            jQuery(this).parents('li').animate({opacity: 0}, 200, function () {
                jQuery(this).remove();
                resetIndex();
            });
        });

        makeSortable();

        jQuery( '#redux-defaults-section-bottom, #redux-defaults-section-top, #redux-defaults-bottom, #redux-defaults-top' ).on('click', function(){
            setTimeout(function(){
                jQuery.ajax({
                    type: "post",
                    contentType: "application/x-www-form-urlencoded",
                    dataType: "html",
                    url: admin_ajax_object.ajax_url,
                    data: {
                        action			  : 'get_single_thumbnail_slider',
                        selected_option	  : 'left-slider',
                    },
                    success: function(data) {
                    },
                });
            }, 3000);
        });

        jQuery( '#redux_bottom_save, #redux_top_save' ).on('click', function(){

            if (jQuery("label.product-thumbnail-slider_1").hasClass("redux-image-select-selected")) {

                if (jQuery("label.singal-slider-style1_1").hasClass("redux-image-select-selected")) {
                    var selected_value = jQuery('label.singal-slider-style1_1.redux-image-select-selected').find( ':input' ).val();
                }
                
                if (jQuery("label.singal-slider-style1_2").hasClass("redux-image-select-selected")) {
                    var selected_value = jQuery('label.singal-slider-style1_2.redux-image-select-selected').find( ':input' ).val();
                }

                if (jQuery("label.singal-slider-style1_3").hasClass("redux-image-select-selected")) {
                    var selected_value = jQuery('label.singal-slider-style1_3.redux-image-select-selected').find( ':input' ).val();
                }
                var selected_option = jQuery('label.product-thumbnail-slider_1.redux-image-select-selected').find( ':input' ).val(); 
            }

            if (jQuery("label.product-thumbnail-slider_2").hasClass("redux-image-select-selected")) {


                if (jQuery("label.singal-slider-style2_1").hasClass("redux-image-select-selected")) {
                    var selected_value = jQuery('label.singal-slider-style2_1.redux-image-select-selected').find( ':input' ).val();
                }

                if (jQuery("label.singal-slider-style2_2").hasClass("redux-image-select-selected")) {
                    var selected_value = jQuery('label.singal-slider-style2_2.redux-image-select-selected').find( ':input' ).val();
                }

                var selected_option = jQuery('label.product-thumbnail-slider_2.redux-image-select-selected').find( ':input' ).val();
            }

            var slider_infinite_loop = jQuery('#printera_options-slider-infinite-loop input').val();
            var arrow_slider = jQuery('#printera_options-arrow-on-slider input').val();
            var arrow_thumbnails = jQuery('#printera_options-arrow-on-thumbnails input').val();
            var zoom_style = jQuery('#printera_options-zoom-style input').val();
            var light_box = jQuery('#printera_options-light-box input').val();
            var wishlist_button = jQuery('#printera_options-products-wishlist-button input').val();
            var compare_button = jQuery('#printera_options-products-compare-button input').val();

            jQuery.ajax({
                type: "post",
                contentType: "application/x-www-form-urlencoded",
                dataType: "html",
                url: admin_ajax_object.ajax_url,
                data: {
                    action			  : 'get_single_thumbnail_slider',
                    selected_value	  : selected_value,
                    selected_option	  : selected_option,

                    slider_infinite_loop : slider_infinite_loop,
                    arrow_slider      : arrow_slider,
                    arrow_thumbnails  : arrow_thumbnails,
                    light_box		  : light_box,
                    zoom_style		  : zoom_style,
                    wishlist_button   : wishlist_button,
                    compare_button    : compare_button,
                },
                success: function(data) {
                },
                error: function () {
                },
                complete: function () {
                }
            });

		});

	});    
} )( jQuery );