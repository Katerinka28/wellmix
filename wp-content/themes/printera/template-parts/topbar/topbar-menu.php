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
if ( ! empty( $printera_options['info-email'] ) ) {
	?>
	<li class="list-inline-item"><a href="mailto:<?php echo esc_attr( $printera_options['info-email'] ); ?>">
		<i class="fas fa-envelope"></i><?php echo esc_html( $printera_options['info-email'] ); ?></a>
	</li>
	<?php
}
