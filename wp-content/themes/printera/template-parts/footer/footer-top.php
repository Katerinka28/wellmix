<?php
/**
 * Footer Top
 */
?>
<?php 

if( class_exists( 'ReduxFramework' ) ) {  ?>

    <div id="footer-top" class="footer-top-section">
        <?php
        $printera_options = get_option( 'printera_options' );
        $count = count( $printera_options['title_field'] );
        echo '<div class="container">';
            echo '<div class="row footer-top-row">';
                for( $i=0; $i<$count; $i++ ){
                    echo '<div class="footer-top-columns">';
                        echo '<div class="footer-top-content">';
                            echo '<div>'. $printera_options['title_field'][$i] .'</div>';
                            echo do_shortcode( $printera_options['text_field'][$i] );
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
        ?>
    </div><!-- #footer-top -->

<?php
}
