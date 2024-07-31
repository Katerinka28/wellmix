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
if ( ! empty( $printera_options['header-clear-text'] ) ) {
	?>
	<li class="header-top-clear">
		<span><i class="fa-solid fa-tractor"></i><?php echo do_shortcode( $printera_options['header-clear-text'] ); ?></span>
	</li>
	<?php
}
