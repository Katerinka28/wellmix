<?php
/**

 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress

 * @subpackage printera

 * @since printera 1.0

 * @version 1.0
 */

?>
<?php $id = esc_html( uniqid( 'btn-search-close' ) ); ?>

<div class="search">
	<button class="search-close-btn" aria-label="Close search form">
	  <i class="ion-close-round" aria-hidden="true"></i>
	  <i class="fas fa-times"></i>
	</button>

	<form method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search_box position-relative">
			<input type="search" id="<?php echo esc_attr( $id ); ?>" class="search-field search__input" placeholder="<?php esc_attr_e( 'Enter Search Keyword...', 'printera' ); ?>" name="s" autofocus>
			<button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Search', 'printera' ); ?></span></button> 
		</div>
	</form>
</div>
