<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="row cart-row">
	
	<?php
	if( class_exists( 'ReduxFramework' ) ) {
		$printera_options = get_option( 'printera_options' );
		if( $printera_options['product-cart-style'] == "style-2" ){
			?>
			<div class="cart-content-left cart-style-02 col-12">
				<?php do_action( 'woocommerce_shop_cart_style' ); ?>
			</div>
			<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
			<div class="cart-content-right cart-style-02 col-lg-4 col-sm-5 col-12">
				<div class="cart-collaterals">
					<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action( 'woocommerce_cart_collaterals' );
					?>
				</div>
			</div>
			<?php
		}
		else{
			?>
		   <div class="cart-content-left col-lg-8 col-12">
				<?php do_action( 'woocommerce_shop_cart_style' ); ?>
		   </div>
			<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
		   <div class="cart-content-right col-lg-4 col-12">
		   		<div class="cart-collaterals">
					<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action( 'woocommerce_cart_collaterals' );
					?>
				</div>
		   </div>
		   <?php
	   }
	}
	else{
		?>
	   <div class="cart-content-left col-lg-8 col-12">
	  		<?php do_action( 'woocommerce_shop_cart_style' ); ?>
	   </div>
	   <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
	   <div class="cart-content-right col-lg-4 col-12">
			<div class="cart-collaterals">
				<?php
					/**
					 * Cart collaterals hook.
					 *
					 * @hooked woocommerce_cross_sell_display
					 * @hooked woocommerce_cart_totals - 10
					 */
					do_action( 'woocommerce_cart_collaterals' );
				?>
			</div>
	   </div>
	   <?php
   }

   do_action( 'woocommerce_cart_collaterals_product' );
	?>

	

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
