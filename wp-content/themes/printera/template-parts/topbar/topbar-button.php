<?php
/**
 * printera Header Top Button
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Header Top Button
 */

$printera_options= get_option( 'printera_options' );

if ( isset( $printera_options['head-top-button'] ) ) {
	$opt = $printera_options['head-top-button'];
	if ( 'on' === (string) $opt ) {
		if ( ( ! empty( $printera_options['button-title'] ) ) && ( ! empty( $printera_options['button-link'] ) ) ) {
			$link  = $printera_options['button-link'];
			$title = $printera_options['button-title'];
			?>
			<li class="button">
				<div class="top-button">
					<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
				</div>
			</li>
			<?php
		}
	}
}
