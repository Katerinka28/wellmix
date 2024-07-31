<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package printera
 */

get_header();
if ( is_front_page() ) {
	?>
	<div class="page-header inner-header-opacity">
		<div class="container">
			<div class="row printera-page-title text-center align-items-center breadcrumb-items-center">
				<div class="col-sm-12">		
				<div class="tt-breadcrumb-title">
					<h1 class="title"><?php esc_html_e( 'Home', 'printera' ); ?></h1>
				</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<main id="primary" class="site-main">
	<div class="container">
		<div class="row">

			<?php
			if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
				$printera_options = get_option( 'printera_options' );
				
				if( $printera_options['blog-alignment'] == 'blog-right' ){
					get_template_part( 'template-parts/blog/blog', 'right' );
				}elseif( $printera_options['blog-alignment'] == 'blog-left' ){
					get_template_part( 'template-parts/blog/blog', 'left' );
				}else{
					get_template_part( 'template-parts/blog/blog', 'full' );
				}
			} else {
				get_template_part( 'template-parts/blog/blog', 'right' );
			}
			?>
			
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
