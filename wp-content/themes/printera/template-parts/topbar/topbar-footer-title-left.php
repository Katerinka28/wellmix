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
$layout1 = $printera_options['footer-top-option']['footer-left'];

if ( ! empty( $layout1['left-title'] ) && ! empty( $printera_options['footer-left-title'] ) ) {
	?>
	<li class="list-inline-item">
		<span><?php echo html_entity_decode( $printera_options['footer-left-title'] ); ?></span>
	</li>
	<?php
}
