<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package printera
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    			<div class="col-lg-8 col-sm-12 left" id="post_content">
			<?php } else {
   			?>
    			<div class="col-lg-12 col-sm-12 left" id="post_content">
    		<?php
			}
				if ( have_posts() ) : ?>

					<?php
					$product_layout = isset( $_GET['product-search'] ) ? $_GET['product-search'] : '';
					
					if( $product_layout == 1 ){
						echo '<div class="products grid-view columns-4"><div class="row">';
					}
					

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */

						if( $product_layout == 1 ){
							wp_redirect( home_url( '/shop/?s='.$_GET['s'].'&product-search=1' ) );
						}else{
							get_template_part( 'template-parts/content', 'search' );
						}
					endwhile;
					if( $product_layout == 1 ){
						echo '</div></div>';
					}

					if ( ! is_single() ) :
						if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
							$printera_options = get_option( 'printera_options' );
				
							if( $printera_options['blog-pagination'] == 2 ){
								echo '<div id="post_loadmore" class="post_loadmore infinite post_infinite">More posts</div>';
							}elseif( $printera_options['blog-pagination'] == 3 ){
								echo '<div id="post_loadmore" class="post_loadmore loadButton post_loadButton">More posts</div>';
							}else{
								printera_pagination();
							}
						}else{
							printera_pagination();
						}
					endif;

				else :

					if( $product_layout == 1 ){
						wp_redirect( home_url( '/shop/?s='.$_GET['s'].'&product-search=1' ) );
					}else{
						get_template_part( 'template-parts/content', 'none' );
					}          

				endif;
				?>
				</div>
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
					<div class="col-lg-4 col-sm-12 right" id="post_sidebar">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
