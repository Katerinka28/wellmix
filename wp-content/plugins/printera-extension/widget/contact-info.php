<?php
/**
 * Widget API: printera_Widget_Contact_Info class
 *
 * @package printera
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * printera Contact Info
 */
function printera_contact_info() {
	register_widget( 'printera_Widget_Contact_Info' );
}
add_action( 'widgets_init', 'printera_contact_info' );

/**
 * Core class used to implement a Contact Info widget.
 *
 * @since 1.0.0
 *
 * @see printera_Widget
 */
class printera_Widget_Contact_Info extends WP_Widget {

	/**
	 * Sets up a new Contact Info widget instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct(
		// Base ID of your widget.
			'printera_Widget_Contact_Info',
			// Widget name will appear in UI.
			__( 'Contact Info', 'printera' ),
			// Widget description.
			array( 'description' => __( 'Contact Info', 'printera' ) )
		);
	}

	/**
	 * Outputs the content for the current Contact Info widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Contact Info widget instance.
	 */
	public function widget( $args, $instance ) {
		$title   = apply_filters( 'widget_title', $instance['title'] );
		$address = isset( $instance['address'] ) ? $instance['address'] : false;
		$phone   = isset( $instance['phone'] ) ? $instance['phone'] : false;
		$alternate_phone   = isset( $instance['alternate_phone'] ) ? $instance['alternate_phone'] : false;
		$email   = isset( $instance['email'] ) ? $instance['email'] : false;
		$alternate_email   = isset( $instance['alternate_email'] ) ? $instance['alternate_email'] : false;

		// before and after widget arguments are defined by themes.
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$printera_options = '';
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$printera_options = get_option( 'printera_options' );
		}
		?>
			<ul class="contact-info">
				<?php
				if ( $address == 1 ){
					?>
					<li>
						<div><?php echo esc_html__( 'Address:', 'printera' ); ?></div><span><?php echo esc_html( $printera_options['info-address'] ); ?> </span>
					</li>
					<?php
				}
				if ( $phone ){
					?>
					<li>
						<div><?php echo esc_html__( 'Phone:', 'printera' ); ?></div><a href="tel:<?php echo str_replace( str_split( '(),-" ' ), '', $printera_options['info-phone'] ); ?>"><span><?php echo esc_html( $printera_options['info-phone'] ); ?></span></a>
					</li>
					<?php
				}
				if ( $alternate_phone ){
					if( $printera_options['opt-phone-two'] != 0 ){
						?>
						<li>
							<div><?php echo esc_html__( 'Phone:', 'printera' ); ?></div><a href="tel:<?php echo str_replace( str_split( '(),-" ' ), '', $printera_options['info-phone-two'] ); ?>"><span><?php echo esc_html( $printera_options['info-phone-two'] ); ?></span></a>
						</li>
						<?php
					}
				}
				if ( $email ){
					?>
					<li>
					<div><?php echo esc_html__( 'Emails:', 'printera' ); ?></div><a href="mailto:<?php echo esc_html( $printera_options['info-email'] ); ?>"><span><?php echo esc_html( $printera_options['info-email'] ); ?></span></a>
					</li>
					<?php
				}
				if ( $alternate_email ){
					if( $printera_options['opt-email-two'] != 0 ){
						?>
						<li>
						<div><?php echo esc_html__( 'Emails:', 'printera' ); ?></div><a href="mailto:<?php echo esc_html( $printera_options['info-email-two'] ); ?>"><span><?php echo esc_html( $printera_options['info-email-two'] ); ?></span></a>
						</li>
						<?php
					}
				}
				?>
			</ul>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Contact Info widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = esc_html__( 'New title', 'printera' );
		}
		$address = isset( $instance['address'] ) ? (bool) $instance['address'] : false;
		$phone   = isset( $instance['phone'] ) ? (bool) $instance['phone'] : false;
		$alternate_phone   = isset( $instance['alternate_phone'] ) ? (bool) $instance['alternate_phone'] : false;
		$email   = isset( $instance['email'] ) ? (bool) $instance['email'] : false;
		$alternate_email   = isset( $instance['alternate_email'] ) ? (bool) $instance['alternate_email'] : false;

		// Widget admin form.
		?>
		<p><label for="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>"><?php esc_html_e( 'Title:', 'printera' ); ?></label>
		<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title', 'printera' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $address ); ?> id="<?php echo esc_html( $this->get_field_id( 'address', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'address', 'printera' ) ); ?>" />
		<label for="<?php echo esc_html( $this->get_field_id( 'address', 'printera' ) ); ?>"><?php esc_html_e( 'Address', 'printera' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $phone ); ?> id="<?php echo esc_html( $this->get_field_id( 'phone', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'phone', 'printera' ) ); ?>" />
		<label for="<?php echo esc_html( $this->get_field_id( 'phone', 'printera' ) ); ?>"><?php esc_html_e( 'Phone Number', 'printera' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $alternate_phone ); ?> id="<?php echo esc_html( $this->get_field_id( 'alternate_phone', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'alternate_phone', 'printera' ) ); ?>" />
		<label for="<?php echo esc_html( $this->get_field_id( 'alternate_phone', 'printera' ) ); ?>"><?php esc_html_e( 'Alternate Phone Number', 'printera' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $email ); ?> id="<?php echo esc_html( $this->get_field_id( 'email', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'email', 'printera' ) ); ?>" />
		<label for="<?php echo esc_html( $this->get_field_id( 'email', 'printera' ) ); ?>"><?php esc_html_e( 'Email', 'printera' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $alternate_email ); ?> id="<?php echo esc_html( $this->get_field_id( 'alternate_email', 'printera' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'alternate_email', 'printera' ) ); ?>" />
		<label for="<?php echo esc_html( $this->get_field_id( 'alternate_email', 'printera' ) ); ?>"><?php esc_html_e( 'Alternate Email', 'printera' ); ?></label></p>

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
		$instance            = array();
		$instance['title']   = sanitize_text_field( $new_instance['title'] );
		$instance['address'] = isset( $new_instance['address'] ) ? (bool) $new_instance['address'] : false;
		$instance['phone']   = isset( $new_instance['phone'] ) ? (bool) $new_instance['phone'] : false;
		$instance['alternate_phone']   = isset( $new_instance['alternate_phone'] ) ? (bool) $new_instance['alternate_phone'] : false;
		$instance['email']   = isset( $new_instance['email'] ) ? (bool) $new_instance['email'] : false;
		$instance['alternate_email']   = isset( $new_instance['alternate_email'] ) ? (bool) $new_instance['alternate_email'] : false;
		return $instance;
	}

}
