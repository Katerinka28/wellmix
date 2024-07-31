<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage printera
 * @since printera 1.0
 * @version 1.0
 */

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$printera_options = get_option( 'printera_options' );
	$footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : '';

	if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ||
		is_active_sidebar( 'footer-4' ) ) :
		?>
		<div class="main-footer footer-widget">
			<div class="container">
				<div class="row">
				<?php
				$options = $printera_options['footer-layout'];

				if ( 1 === (int) $options ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
				}
				if ( 2 === (int) $options ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
				}
				if ( 3 === (int) $options || $footer_style == 2 ) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-4 col-sm-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-4 col-sm-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
					<div class="col-lg-4 col-sm-12">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
						<?php
					}
				}
				if ( 4 === (int) $options && $footer_style != 2) {
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
					<div class="col-lg-4 col-sm-12 footer-01">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-02">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
					<div class="col-lg-2 col-sm-12 footer-03">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-4' ) ) {
						?>
					<div class="col-lg-4 col-sm-12 footer-04">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
						<?php
					}
				}			
				?>
				</div>
			</div>
		</div>	
		<?php
	endif;
} else {
	if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ||
		is_active_sidebar( 'footer-4' ) ) :
		?>
		<div class="main-footer footer-widget">
			<div class="container">
				<div class="row">
					<?php
					if ( is_active_sidebar( 'footer-1' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-2' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-3' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						<?php
					}
					if ( is_active_sidebar( 'footer-4' ) ) {
						?>
						<div class="col-lg-3 col-md-6 col-sm-12">
						<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
<?php endif;
}
