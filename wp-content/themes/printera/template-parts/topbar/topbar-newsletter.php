<?php
/**
 * printera Header Top Email
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Header Top Email
 */
$printera_options= get_option( 'printera_options' );
if ( ! empty( $printera_options['footer-newsletter'] ) ) {
	?>
	<li class="list-inline-item">
		<?php echo do_shortcode( $printera_options['footer-newsletter'] ); ?>
	</li>
	<?php
}
