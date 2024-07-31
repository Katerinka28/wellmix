<?php
/**
 * Footer Main
 */
?>

<footer id="colophon" class="site-footer">
    <?php
    /**
     * Footer Top
     */
    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
        $printera_options = get_option( 'printera_options' );
		// $footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : 1;

        if( $printera_options['footer-top'] == 1 ){
            get_template_part( 'template-parts/footer/footer', 'top' );
        }
    }
    /**
     * Footer widget
     */
    ?>
    <div class="widget-wrap">
        <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
        </div>
        
    <?php
    /**
     * Footer Bottom
     */
    if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
        $printera_options = get_option( 'printera_options' );
		// $footer_style = isset( $_GET['footer_style'] ) ? sanitize_text_field( $_GET['footer_style'] ) : 1;

        if( $printera_options['footer-bottom'] == 1 ){
            get_template_part( 'template-parts/footer/footer', 'bottom' );
        }
    }
    
    /**
     * Copyright
     */
    ?>
   
        <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
   
</footer><!-- #colophon -->
