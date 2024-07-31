<?php
/**
 * Footer Top
 */
?>
<?php 

if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {  ?>

    <div id="footer-bottom" class="footer-bottom">
        <?php
        $printera_options = get_option( 'printera_options' );
        if( !empty( $printera_options['footer-bottom-content'] ) ){
            echo do_shortcode( $printera_options['footer-bottom-content'] );
        }
        ?>
    </div><!-- #colophon -->

<?php
}
