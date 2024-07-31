<?php
/**
 * Subscribe Popup
 */

if( class_exists( 'ReduxFramework' ) ) {
	$printera_options = get_option( 'printera_options' );
	if( !empty( $printera_options['subscribe-shortcode'] ) ){ ?>
		<div class="email-popup-con">
			<div class="email-popup-inner-con">
				<span class="nothanks"></span>

				<?php if( ! empty( $printera_options['subscribe-image']['url'] ) ){ ?>
					<div class="email-popup-img-con col-12">		
						<div class="newsletter_01 newsletter">
							<img src="<?php echo esc_url( $printera_options['subscribe-image']['url'] ); ?>" alt="<?php esc_attr__( 'Email Subscribe Image', 'printera' ); ?>">
						</div>
					</div>
				<?php } ?>

				<div class="message-overlay-con col-12">
					<?php
					if( !empty( $printera_options['subscribe-title'] ) ){ ?>
						<span class="message"><?php echo esc_html( $printera_options['subscribe-title'] ); ?></span>
						<?php
					}
					if( !empty( $printera_options['subscribe-title'] ) ){ ?>
						<span class="message-desc"><?php echo esc_html( $printera_options['subscribe-text'] ); ?></span>
						<?php
					} ?>
				</div>
				<?php echo do_shortcode( $printera_options['subscribe-shortcode'] ); ?>
			</div>
		</div>
		<?php
	}
}
