<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package printera
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php	

	if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
		$printera_options = get_option( 'printera_options' );

		if ( ! empty( $printera_options['site-fevicon'] ) ) { ?>
				<link rel="shortcut icon" href="<?php echo esc_url( $printera_options['site-fevicon']['url'] ); ?>">
		<?php
		} else {
			if ( ! function_exists( 'has_site_icon' ) || ! wp_site_icon() ) {
				echo wp_site_icon();
			}
		}
	} else {
		if ( ! function_exists( 'has_site_icon' ) || ! wp_site_icon() ) {
			echo wp_site_icon();
		}
	}
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if( class_exists( 'ReduxFramework' ) ){
	$printera_options = get_option( 'printera_options' );
	if( $printera_options['mobile-header-option'] == 'mobile-header-01' ){
	?>
		<div class="header-stickybar-wrap">
	<div class="header-stickybar">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Home"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#232f3f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>shop" rel="home" title="Shop"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#232f3f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>wishlist" rel="home" title="Wishlist"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#232f3f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>cart" rel="home" title="Cart"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg></a>
	</div>
</div>
	<?php }else{ ?>
		<div class="">
	<?php } }?>
	<?php wp_body_open(); ?>

	<?php
	/**
	 * Loader
	 */
	get_template_part( 'template-parts/header/site', 'loader' );
	?>

	<div class="viewport">
	<div id="page" class="site overflow-hidden">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'printera' ); ?></a>

		<?php
		if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
			$printera_options = get_option( 'printera_options' );
			$header_style = isset( $_GET['header_style'] ) ? sanitize_text_field( $_GET['header_style'] ) : '';
				
				if( $header_style == 1 ){
					get_template_part( 'template-parts/header/header', 'one' );
				}else {
					get_template_part( 'template-parts/header/header', 'one' );
				}
		}else{

			get_template_part( 'template-parts/header/header', 'two' );
		
		}
		?>
	
		<?php
			$page_header = '1';
			if ( $page_header == 1 || is_search() || is_category() ) {
				printera_page_header();
			}