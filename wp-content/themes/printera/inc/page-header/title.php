<?php
/**
 * Page Header Title
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Page Header Title Function
 */
function printera_page_header_title() {

	$printera_options= get_option( 'printera_redux' );

	if ( is_archive() ) {
		?>
		<h1 class="title"><?php the_archive_title(); ?></h1>
		<?php
	} elseif ( is_search() ) {
		if ( have_posts() ) :
			?>
			<h1 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'printera' ), '<span>' . get_search_query() . '</span>' ); ?></span></h1>

		<?php else : ?>
			<h1 class="title"><?php esc_html_e( 'Nothing Found', 'printera' ); ?></h1>

			<?php
		endif;
	} elseif ( is_404() ) {

		if ( isset( $printera_options['404_title'] ) ) {
			?>
			<h2 class="title">
				<?php
				$title = $printera_options['404_title'];
				echo esc_html( $title );
				?>
			</h2>
			<?php
		} else {
			?>
			<h2 class="title"><?php esc_html_e( 'Oops! That page can not be found.', 'printera' ); ?></h2>
			<?php
		}
	} elseif ( is_home() ) {
		?>
		<h1 class="title"><?php esc_html_e( 'Blog', 'printera' ); ?></h1>
		<?php
	} else {
		if( ! empty( get_the_title() ) ){ ?>
		<h1 class="title"><?php echo get_the_title(); ?></h1>
		<?php }
	}
}
