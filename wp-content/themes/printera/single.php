<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package printera
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
					
				<?php
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$printera_options = get_option( 'printera_options' );
					if( $printera_options['blog-singal-alignment'] == 'single-blog-right' ){
						get_template_part( 'template-parts/blog/blog', 'right' );
					}elseif( $printera_options['blog-singal-alignment'] == 'single-blog-left' ){
						get_template_part( 'template-parts/blog/blog', 'left' );
					}else{
						get_template_part( 'template-parts/blog/blog', 'full' );
					}
				} else {
					get_template_part( 'template-parts/blog/blog', 'right' );
				} ?>

			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
