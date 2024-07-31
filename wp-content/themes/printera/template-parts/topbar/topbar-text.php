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
if ( $printera_options['opt-top'] == 1 && ! empty( $printera_options['header-info-text'] ) ) {
	?>
	<li class="list-inline-item">
		<span><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.57 15.2702L15.11 8.73016M8.98 10.3702C9.30622 10.3702 9.61907 10.2406 9.84974 10.0099C10.0804 9.77923 10.21 9.46637 10.21 9.14016C10.21 8.81394 10.0804 8.50109 9.84974 8.27042C9.61907 8.03975 9.30622 7.91016 8.98 7.91016C8.65378 7.91016 8.34093 8.03975 8.11026 8.27042C7.87959 8.50109 7.75 8.81394 7.75 9.14016C7.75 9.46637 7.87959 9.77923 8.11026 10.0099C8.34093 10.2406 8.65378 10.3702 8.98 10.3702ZM15.52 16.0902C15.8462 16.0902 16.1591 15.9606 16.3897 15.7299C16.6204 15.4992 16.75 15.1864 16.75 14.8602C16.75 14.5339 16.6204 14.2211 16.3897 13.9904C16.1591 13.7597 15.8462 13.6302 15.52 13.6302C15.1938 13.6302 14.8809 13.7597 14.6503 13.9904C14.4196 14.2211 14.29 14.5339 14.29 14.8602C14.29 15.1864 14.4196 15.4992 14.6503 15.7299C14.8809 15.9606 15.1938 16.0902 15.52 16.0902Z" stroke="#414648" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M12 22C17.523 22 22 17.523 22 12C22 6.477 17.523 2 12 2C6.477 2 2 6.477 2 12C2 17.523 6.477 22 12 22Z" stroke="#414648" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg><?php echo do_shortcode( $printera_options['header-info-text'] ); ?></span>
	</li>
	<?php
}
