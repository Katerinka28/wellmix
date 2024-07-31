<?php
/**
 * Required Plugins
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'printera_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function printera_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		
		array(
			'name'     => esc_html__( 'Printera Extension', 'printera' ),
			'slug'     => 'printera-extension',
			'source'   => esc_url( 'https://wordpress.templatetrip.com/pkg-plugins/WCMTM018_printera/printera-extension.zip' ),
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Revolution Slider', 'printera' ),
			'slug'     => 'revslider',
			'source'   => esc_url( 'https://wordpress.templatetrip.com/pkg-plugins/revslider.zip' ),
			'required' => true,
		),
		
		array(
			'name'     => esc_html__( 'OTGS Installer ( WPML )', 'printera' ),
			'slug'     => 'otgs-installer',
			'source'   => esc_url( 'https://wordpress.templatetrip.com/pkg-plugins/otgs-installer.zip' ),
			'required' => true,
		),

		array(
			'name'     => esc_html__( ' WooCommerce Multilingual & Multicurrency', 'printera' ),
			'slug'     => 'woocommerce-multilingual',
			'required' => true,
		),
		
		array(
			'name'     => esc_html__( 'Elementor', 'printera' ),
			'slug'     => 'elementor',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Woocommerce', 'printera' ),
			'slug'     => 'woocommerce',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Yith Color and Label Variations for Woocommerce', 'printera' ),
			'slug'     => 'yith-color-and-label-variations-for-woocommerce',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'YITH Woocommerce Wishlist', 'printera' ),
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'YITH Woocommerce Quick View', 'printera' ),
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'YITH Woocommerce Compare', 'printera' ),
			'slug'     => 'yith-woocommerce-compare',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Mailchimp', 'printera' ),
			'slug'     => 'mailchimp-for-wp',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Smash Balloon Instagram Feed', 'printera' ),
			'slug'     => 'instagram-feed',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Max Mega Menu', 'printera' ),
			'slug'     => 'megamenu',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Redux Framework', 'printera' ),
			'slug'     => 'redux-framework',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'One Click Demo Import', 'printera' ),
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Contact Form 7', 'printera' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );

}

/*
------------------------------------------------------------
		 installation requirement after theme activate
------------------------------------------------------------*/
function printera_theme_activation() {
	// set frontpage to display_posts
	update_option( 'show_on_front', 'posts' );

	// flush rewrite rules
	flush_rewrite_rules();

	do_action( 'printera_theme_activation' );

	if ( class_exists( 'TGM_Plugin_Activation' ) ) {
		$tgmpa                       = TGM_Plugin_Activation::$instance;
		$is_redirect_require_install = false;
		foreach ( $tgmpa->plugins as $p ) {
			$path = ABSPATH . 'wp-content/plugins/' . $p['slug'];
			if ( ! is_dir( $path ) ) {
				$is_redirect_require_install = true;
				break;
			}
		}
		if ( $is_redirect_require_install ) {
			header( 'Location: ' . admin_url() . 'admin.php?page=tgmpa-install-plugins' );
		}
	}
}
add_action( 'after_switch_theme', 'printera_theme_activation' );
