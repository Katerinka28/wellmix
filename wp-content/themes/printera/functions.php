<?php
/**
 * printera functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package printera
 */

if ( ! defined( 'printera_version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'printera_version', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function printera_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on printera, use a find and replace
		* to change 'printera' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'printera', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/* Register WP3+ menus */
	register_nav_menu( 'header-menu', esc_html__( 'Main Menu', 'printera' ) );
	register_nav_menu( 'hamburger-menu', esc_html__( 'Hamburger Menu', 'printera' ) );
	register_nav_menu( 'footer-menu', esc_html__( 'Footer Menu', 'printera' ) );
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	function add_post_formats() {
		add_theme_support( 
			'post-formats',
			array( 
				'gallery', 
				'quote', 
				'video', 
				'aside', 
				'image', 
				'link' 
			) 
		);
	}
	 
	add_action( 'after_setup_theme', 'add_post_formats', 20 );


	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'printera_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'printera_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function printera_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'printera_content_width', 640 );
}
add_action( 'after_setup_theme', 'printera_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function printera_scripts() {
	wp_enqueue_style( 'printera-style', get_stylesheet_uri(), array(), 'printera_version' );
	wp_style_add_data( 'printera-style', 'rtl', 'printera_version' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'printera_scripts' );

function printera_get_comments_number_text( $zero = false, $one = false, $more = false, $post_id = 0 ) {
	$number = get_comments_number( $post_id );

	if ( $number > 1 ) {
		if ( false === $more ) {
			/* translators: %s: Number of comments. */
			$output = sprintf( esc_html_x( '%s', '%s Comments', $number, 'printera' ), number_format_i18n( $number ) );
		} else {
			// % Comments
			/*
			 * translators: If comment number in your language requires declension,
			 * translate this to 'on'. Do not translate into your own language.
			 */
			if ( 'on' === _x( 'off', 'Comment number declension: on or off', 'printera' ) ) {
				$text = preg_replace( '#<span class="screen-reader-text">.+?</span>#', '', $more );
				$text = preg_replace( '/&.+?;/', '', $text ); // Kill entities.
				$text = trim( strip_tags( $text ), '% ' );

				// Replace '% Comments' with a proper plural form.
				if ( $text && ! preg_match( '/[0-9]+/', $text ) && false !== strpos( $more, '%' ) ) {
					/* translators: %s: Number of comments. */
					$new_text = _n( '%s Comment', '%s Comments', $number, 'printera' );
					$new_text = trim( sprintf( $new_text, '' ) );

					$more = str_replace( $text, $new_text, $more );
					if ( false === strpos( $more, '%' ) ) {
						$more = '% ' . $more;
					}
				}
			}

			$output = str_replace( '%', number_format_i18n( $number ), $more );
		}
	} elseif ( 0 == $number ) {
		$output = ( false === $zero ) ? esc_html__( '0', 'printera' ) : $zero;
	} else { // Must be one.
		$output = ( false === $one ) ? esc_html__( '1', 'printera' ) : $one;
	}
	/**
	 * Filters the comments count for display.
	 *
	 * @since 1.5.0
	 *
	 * @see _n()
	 *
	 * @param string $output A translatable string formatted based on whether the count
	 *                       is equal to 0, 1, or 1+.
	 * @param int    $number The number of post comments.
	 */
	return apply_filters( 'comments_number', $output, $number );
}

require_once get_template_directory() . '/inc/init.php';

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'woocommerce_layered_nav_count', function( $text, $count ) {
    return '<span class="count">' . absint( $count ) . '</span>';
}, 10, 2 );


add_filter (  'woocommerce_layered_nav_any_label' ,  'remove_any_from_filter_dropdown' ,  10 ,  3  ) ; 

function remove_any_from_filter_dropdown (  $sprintf ,  $taxonomy_label ,  $taxonomy  ) { 
	// filter ...
	$sprintf = sprintf ( __ (  '%s' ,  'printera'  ) ,  $taxonomy_label  );
	return  $sprintf ; 
}

add_filter( 'woocommerce_single_product_zoom_options', 'custom_single_product_zoom_options' );
function custom_single_product_zoom_options( $zoom_options ) {
    // Changing the magnification level:
    $zoom_options['magnify'] = 0.9;

    return $zoom_options;
}

/* Empty cart */
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
    global $woocommerce;
    if ( isset( $_GET['empty-cart'] ) && $_GET['empty-cart'] == 'yes' ) {
        $woocommerce->cart->empty_cart();
    }
}

add_action( 'woocommerce_cart_coupon', 'woocommerce_empty_cart_button' );
function woocommerce_empty_cart_button() {
    global $woocommerce;
    $cart_url = $woocommerce->cart->get_cart_url();
    echo '<a href="'.$cart_url.'?empty-cart=yes" class="button empty_cart" title="' . esc_attr( 'Empty Cart', 'woocommerce' ) . '">' . esc_html( 'Empty Cart', 'woocommerce' ) . '</a>';
}

function custom_scripts(){
    ?>
    <script type="text/javascript">
        (function($){
            $(document).ready(function(){
                $(document).on('click','.empty_cart',function(e){
                    e.preventDefault();
                    if(confirm('Are you sure want to empty cart?')){
                        var url = $(this).attr('href');
                        window.location = url;
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}

add_action( 'wp_footer', 'custom_scripts', 10, 1 );