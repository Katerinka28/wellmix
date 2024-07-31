<?php
/**
 * Page Header
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Page Header Function
 */
function printera_page_header() {
	if ( ! is_front_page() && empty( $_GET['home'] ) && !is_page( '107' ) ) {
		?>
		<div class="page-header inner-header-opacity">
			<div class="container">
				<?php
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$printera_option = get_option( 'printera_options' );
					$op_align = $printera_option['ph-alignment'];
					if( '1' === $op_align ){ $align = 'start'; } 
					elseif( '2' === $op_align ) { $align = 'end'; }
					elseif( '3' === $op_align ) { $align = 'center'; }
					else { $align = 'center'; } 
				} else { $align = 'center'; }
				?>
				<div class="row printera-page-title text-<?php echo esc_html( $align ); ?> align-items-<?php echo esc_html( $align ); ?> breadcrumb-items-<?php echo esc_html( $align ); ?>">
					<?php if( printera_page_header_title()  !== null ){ ?>
					<div class="breadcrumb-title col-sm-12">
						<h1 class="title"><?php printera_page_header_title(); ?></h1>
					</div>
					<?php }
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$opt = $printera_option['opt-breadcrumbs'];
						if ( $opt == 1 ) { ?>
							<div class="breadcrumbs col-sm-12">
								<ul class="page-breadcrumb">	
									<li class="home">
										<?php printera_breadcrumbs(); ?>
									</li>
								</ul>
							</div>
						<?php }
					} else { ?>
						<div class="breadcrumbs col-sm-12">
							<ul class="page-breadcrumb">	
								<li class="home">
									<?php printera_breadcrumbs(); ?>
								</li>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php }
}
