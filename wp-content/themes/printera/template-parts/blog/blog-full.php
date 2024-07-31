<?php
/**
 * Blog full
 */
?>

<div class="col-lg-12 col-sm-12 full" id="post_content">
    <?php
	if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) : ?>
		    <header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

        /* Start the Loop */
		while ( have_posts() ) :

            the_post();
            /*
            * Include the Post-Type-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
            */
            get_template_part( 'template-parts/content', get_post_type() );
            
            // If comments are open or we have at least one comment, load up the comment template.
            if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                $printera_options = get_option( 'printera_options' );
                if( $printera_options['blog-comment'] == 1 ){
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                }
            }else{
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            }
		endwhile;
        if ( ! is_single() ) :
            if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
                $printera_options = get_option( 'printera_options' );

                if( $printera_options['blog-pagination'] == 2 ){
                    echo '<div id="post_loadmore" class="post_loadmore infinite post_infinite">'. esc_html__( 'More posts', 'printera' ) .'</div>';
                }elseif( $printera_options['blog-pagination'] == 3 ){
                    echo '<div id="post_loadmore" class="post_loadmore loadButton post_loadButton">'. esc_html__( 'More posts', 'printera' ) .'</div>';
                }else{
                    printera_pagination();
                }
            }else{
                printera_pagination();
            }
        endif;

	else :

        get_template_part( 'template-parts/content', 'none' );

    endif; ?>
</div>
