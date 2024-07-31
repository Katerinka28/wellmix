<?php
/**
 * Widget API: printera_widget_product_tag class
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * Product Tag
 */
function printera_recent_post_widget() {
	register_widget( 'printera_widget_product_tag' );
}
add_action( 'widgets_init', 'printera_recent_post_widget' );

/**
 * Core class used to implement a Recent Post widget.
 *
 * @since 1.0.0
 *
 * @see printera_Widget
 */
class printera_widget_product_tag extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct(
		// Base ID of your widget.
			'printera_widget_product_tag',
			// Widget name will appear in UI.
			__( 'Product Tag', 'printera' ),
			// Widget description.
			array( 'description' => esc_html__( 'Product Tag', 'printera' ) )
		);
	}

	/**
	 * Outputs the content for the current Recent Post widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {

		$title  = apply_filters( 'widget_title', $instance['title'] );
		$description  = apply_filters( 'widget_description', $instance['description'] );
		

		// before and after widget arguments are defined by themes.
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( ! empty( $description ) ) {
			echo '<div class="description">'. $description .'</div>';
		}


		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		);

		$product_tags = get_terms( 'product_tag', $args ); ?>
		<ul>
			<?php
			
			foreach( $product_tags as $tag ){
				echo '<li>';
				echo '<a href="'. get_tag_link( $tag->term_id ) .'">'. $tag->name .'</a>';
				echo '</li>';
			} ?>
		</ul>

		<?php
		wp_reset_postdata();
		echo $args['after_widget'];
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
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['description']     = sanitize_text_field( $new_instance['description'] );

		/* $instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['image']     = isset( $new_instance['image'] ) ? (bool) $new_instance['image'] : false; */
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Post widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$description     = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';

		/* $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$image     = isset( $instance['image'] ) ? (bool) $instance['image'] : false; */

		?>
		<p><label for="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>"><?php esc_html_e( 'Title:', 'printera' ); ?></label>
		<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title', 'printera' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" /></p>

		<p><label for="<?php echo esc_html( $this->get_field_id( 'number', 'printera' ) ); ?>"><?php esc_html_e( 'Description:' ); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text" cols="30" rows="5"><?php echo esc_attr( $description ); ?></textarea></p>

		<?php
	}

}
