<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package printera
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<section class="error-404 not-found">
						<?php
						if( class_exists( 'ReduxFramework' ) ) {
							$printera_options = get_option( 'printera_options' );
							if( ! empty( $printera_options['404-image']['url'] ) ){
								printf( "<img src='%s' alt='%s'>", esc_url( $printera_options['404-image']['url'] ), esc_attr__( '404','printera' ) );
							} else {
								printf( "<h2>%s</h2>", esc_html__( '404','printera' ) );
							}
							if( ! empty( $printera_options['404-title'] ) ){
								printf( "<h3 class='page-title'>%s</h3>", esc_html( $printera_options['404-title'] ) );
							} else {
								printf( "<h3 class='page-title'>%s</h3>", esc_html__( 'Oops! That page can&rsquo;t be found.', 'printera' ) );
							}
							if( ! empty( $printera_options['404-description'] ) ){ ?>
								<div class="page-content">
									<?php printf( "<p>%s</p>", esc_html( $printera_options['404-description'] ) ); ?>
								</div><!-- .page-content -->
								<?php 
							}
						} else {
							printf( '<h2>%s</h2>', esc_html__( '404','printera' ) );
							printf( '<h3 class="page-title">%s</h3>', esc_html__( 'Oops! That page can&rsquo;t be found.', 'printera' ) );
							?>					
							<div class="page-content">
								<?php printf( '<p>%s</p>', esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'printera' ) ); ?>
							</div><!-- .page-content -->
						<?php } ?>
						<div class="back-home-button">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back To Home', 'printera' ); ?></a>
						</div>
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
