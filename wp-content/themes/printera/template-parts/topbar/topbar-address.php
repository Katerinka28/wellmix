<?php
/**
 * printera Header Top Address
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

 /**
 * Header Top Address
 */
$printera_options= get_option( 'printera_options' );

if ( ! empty( $printera_options['info-address'] ) ) {
	?>
	<li class="list-inline-item">
		<i class="fas fa-home"></i><?php echo esc_html( $printera_options['info-address'] ); ?>
	</li>
<?php }
