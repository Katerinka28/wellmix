<?php
/**
 * printera Header Text
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Header Text
 */

$printera_options= get_option( 'printera_options' );
if ( $printera_options['footer-top'] == 1 && ! empty( $printera_options['footer-top-text'] ) ) {
	?>
	<li class="list-inline-item">
		<span><?php echo do_shortcode( $printera_options['footer-top-text'] ); ?></span>
	</li>
	<?php
}
