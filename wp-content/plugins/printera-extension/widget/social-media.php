<?php
/**
 * Widget API: printera_Widget_Social_Media class
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * printera Social Media
 */
function printera_social_media() {
	register_widget( 'printera_Widget_Social_Media' );
}
add_action( 'widgets_init', 'printera_social_media' );

/**
 * Core class used to implement a Social Media widget.
 *
 * @since 1.0.0
 *
 * @see printera_Widget
 */
class printera_Widget_Social_Media extends WP_Widget {

	/**
	 * Sets up a new Social Media widget instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct(
		// Base ID of your widget.
			'printera_Widget_Social_Media',
			// Widget name will appear in UI.
			__( 'printera Social Media', 'printera' ),
			// Widget description.
			array( 'description' => esc_html__( 'printera Social Media', 'printera' ) )
		);
	}

	/**
	 * Outputs the content for the current Social Media widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {

		global $wp_registered_sidebars;

		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes.
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// This is where you run the code and display the output.
		$printera_options= get_option( 'printera_options' );
		if ( isset( $printera_options['info-social'] ) ) {
			?>
		<ul class="social-media">
			<?php
			$data = $printera_options['info-social'];
			foreach ( $data as $key => $value ) {
				$a = 1;
				if ( $a < 9 ) {
					if ( $value ) {
						echo '<li><a href="' . esc_url( $value ) . '"><i class="fab fa-'. esc_attr( $key ) .'"></i></a></li>';
					}
					$a++;
				}
			}
			?>
		</ul>

			<?php
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Social Media widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'printera' );
		}
		// Widget admin form.
		?>
		<p><label for="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>"><?php esc_html_e( 'Title:', 'printera' ); ?></label>
		<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title', 'printera' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" /></p>
		<?php
	}

	/**
	 * Handles updating the settings for the current Conatct Info widget instance.
	 *
	 * @since 1.0.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}

}
?>
