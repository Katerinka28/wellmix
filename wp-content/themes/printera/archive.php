<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;
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

						get_template_part( 'template-parts/content', 'none' );

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
