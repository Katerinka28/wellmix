<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage printera
 * @since printera 1.0
 * @version 1.0
 */

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
	$printera_options= get_option( 'printera_options' );
		if ( ! empty( $printera_options['copyright-left'] ) || ! empty( $printera_options['copyright-right'] )) {		
	?>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="copyright d-sm-flex d-block">
						<?php
						if ( ! empty( $printera_options['copyright-left'] ) ) {
						?>
							<div class="copyright-left flex-grow-1 flex-basis-0 justify-content-center d-flex">
								<?php echo do_shortcode( $printera_options['copyright-left'] ); ?>
							</div>
						<?php
						}
						?>
						<?php
						if ( ! empty( $printera_options['copyright-right'] ) ) {
						?>
							<div class="copyright-right flex-grow-1 flex-basis-0 justify-content-sm-end justify-content-center d-flex">
								<?php echo do_shortcode( $printera_options['copyright-right'] ); ?>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>
	<?php
		}
} else {
	?>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="copyright">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'printera' ) ); ?>" class="imprint">
							<?php
								/* translators: %s: WordPress */
							printf( esc_html__( 'Copyright 2023, %s All rights reserved', 'printera' ), 'WordPress' );
							?>
						</a>
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>
	<?php
}
