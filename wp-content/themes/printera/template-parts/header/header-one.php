<?php
/**
 * Headr One
 */

get_template_part( 'template-parts/header/header', 'top' ); ?>
<header id="masthead" <?php printera_header_class(); ?>>
	<div class="container">

		<div class="site-branding d-flex align-items-center float-start w-100">
			
			<nav id="site-navigation" class="main-navigation navbar-expand-lg navbar-light text-center flex-lg-grow-1 justify-content-center p-lg-0 m-lg-0 me-3 d-lg-none d-block">
				<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					<button class="navbar-toggler b-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
					
					<?php
					wp_nav_menu(
						array(
							'container'      => 'div',
							'theme_location' => 'header-menu',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex nav-menu flex-wrap',
						)
					);
					?>
				<?php endif; ?>
			</nav><!-- #site-navigation -->

			<?php
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
				$printera_options = get_option( 'printera_options' );
				if( has_custom_logo() ) {
					the_custom_logo();
				}
				elseif( $printera_options['opt-logo'] == "1" ){
					$dark_logo_url = $printera_options['site-logo']['url'];
					$light_logo_url = $printera_options['light-site-logo']['url'];
					if( ! empty( $dark_logo_url ) ){ ?>
					<div class="header-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if( $printera_options['dark-light-mode'] == 0 ){ ?>
								<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( $light_logo_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'printera' ); ?>">
							<?php }else{ ?>
								<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( $dark_logo_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'printera' ); ?>">
							<?php } ?>
						</a>
					</div>
			<?php }
				}else{
					$logo_text = $printera_options['text-logo'];
					if( ! empty( $logo_text ) ){
			?>
				<h1 class="logo" alt="<?php esc_attr_e( 'Logo', 'printera' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $logo_text ); ?></a>
				</h1>
			<?php
					}
				}
			} else { 
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
					<img class="img-fluid logo" loading="lazy" src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php esc_attr_e( 'Logo', 'printera' ); ?>">
				</a>
			<?php }
			?>


			<div class="search-main float-none d-lg-block d-none">

				<?php
				/**
				 * Search
				 */
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$printera_options = get_option( 'printera_options' );
					if( $printera_options['opt-search'] == 1 ){
						?>
							<div class="product-search float-start w-100 position-relative">
								<form name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="search-wrapper">
										<select class="category">
											<option value=""><?php esc_html_e( 'All Collection', 'printera' ); ?></option>
											<?php $terms = get_terms( 'product_cat' ); ?>
											<?php foreach( $terms as $term ){ ?>
												<option value="<?php echo esc_html( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></option>
											<?php } ?>
										</select>
										<input type="search" name="s" class="search" placeholder="<?php echo esc_attr__( 'Search for product...', 'printera' ); ?>" value="">
										<button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i><?php esc_html_e( 'Search', 'printera' ); ?></button>
										<input type="hidden" name="product-search" value="1" />
										<?php echo svg_loading(); ?>
									</div>
								</form>
								<div class="search-results"></div>
							</div>
						<?php
					}
				} else{
					?>
					<div class="search-icon d-flex">
						<div class="search-wrap cursor-pointer d-flex align-items-center">
							<i class="fa-solid fa-magnifying-glass"></i>
						</div>
						<div class="top-search">
							<div class="search-fix">
								<div class="container">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				} 
				?>

			</div>
			

			<div class="right-header">
				<?php if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {			
					$printera_options = get_option( 'printera_options' ); ?>	
						<div class="wishlist-wrap">
							<div class="wishlist cursor-pointer d-flex align-items-center">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>wishlist" title="<?php esc_attr_e('wishlist','printera'); ?>" class="d-flex">
								<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#414648" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
								</a>
							</div>
						</div>
				<?php }

				/**
				 * Woocomerce Menu
				 */
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) { 
				?>
				<nav class="navbar-woocommerce">
					<a href="javascript:void(0)" title="<?php esc_attr_e('My Account','printera'); ?>" class="navbar-title position-relative">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#414648" stroke-width="2.0" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
					</a>
					<ul id="woocommerce-menu">
						<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_attr_e('My Account','printera'); ?>"><?php esc_html_e('My Account','printera'); ?></a></li>
						<?php if( class_exists( 'YITH_WCWL_Privacy' ) ) { ?>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>wishlist" title="<?php esc_attr_e('wishlist','printera'); ?>"><?php esc_html_e('Wishlist','printera'); ?></a></li>
						<?php } ?>
					</ul>
				</nav>
				<?php }
					/**
					 * Mini cart
					 */
					if( class_exists( 'WooCommerce' ) ) { 
				?>
					<div class="mini-cart">
						<?php custom_mini_cart(); ?>
					</div>
				<?php }
				?>
			</div>
		</div><!-- .site-branding -->
	</div>

	<div class="header-bottom">
		<div class="container">
			<div class="menu-content">

				<?php
				/**
				 * hamburger-menu
				 */
				if ( has_nav_menu( 'hamburger-menu' ) ) : ?>
					<div class="head-hamburger-menu-wrap d-lg-block d-none">
						<div class="head-hamburger-menu cursor-pointer d-flex position-relative">
							<div class="humburger-icon-wrap">
								<div class="humburger-icon"><img class="img-fluid menu" loading="lazy" src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/menu.png" alt="<?php esc_attr_e( 'Menu', 'printera' ); ?>"><span class="humburger-title">shop categories</span></div>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.000000 65.000000" preserveAspectRatio="xMidYMid meet" style="width: 12px;height: 12px;float: right;">
								<g transform="translate(0.000000,65.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
									<path d="M510 575 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M260 325 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M510 325 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path>
									<path d="M10 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M260 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path><path d="M510 75 l0 -65 65 0 65 0 0 65 0 65 -65 0 -65 0 0 -65z"></path>
								</g>
								</svg>
							</div>
							<div class="navbar-hamburger" id="navbar-hamburger1">
								<?php
									wp_nav_menu(
										array(
											'container'      => 'div',
											'container_class'=> 'navbar-hamburger-container',
											'theme_location' => 'hamburger-menu',
											'menu_id'        => 'hamburger-menu',
											'menu_class'     => 'hamburger-nav',
										)
									);
								?>

								<div class="navbar-hamburger-content">
									<?php
									if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
										$printera_options = get_option( 'printera_options' );
										if(  !empty( $printera_options['hamburger-content'] ) ){
											echo html_entity_decode( $printera_options['hamburger-content'] );
										}
									}
									?>
								</div>
							</div>
						</div>			
					</div>	
				<?php endif; ?>

				<nav id="site-navigation" class="main-navigation navbar-expand-lg navbar-light text-center flex-lg-grow-1 justify-content-center p-lg-0 m-lg-0 me-3 d-lg-block d-none">
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<button class="navbar-toggler b-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fas fa-bars"></i>
						</button>
						
						<?php
						wp_nav_menu(
							array(
								'container'      => 'div',
								'theme_location' => 'header-menu',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex nav-menu flex-wrap',
							)
						);
						?>
					<?php endif; ?>
				</nav><!-- #site-navigation -->

				<ul class="social-main d-xl-flex d-none justify-content-end flex-1">
					<?php
					$printera_opt = get_option( 'printera_options' );
					$layout1 = $printera_opt['header-bottom']['Left'];
					if ( $layout1 ) :
						foreach ( $layout1 as $key => $value ) {
							switch ( $key ) {
								case 'email':
									get_template_part( 'template-parts/topbar/topbar', 'email' );
									break;
								case 'phone':
									get_template_part( 'template-parts/topbar/topbar', 'phone' );
									break;
								case 'social-media':
									get_template_part( 'template-parts/topbar/topbar', 'social-media' );
									break;
								case 'text':
									get_template_part( 'template-parts/topbar/topbar', 'text' );
									break;
								case 'search':
									get_template_part( 'template-parts/topbar/topbar', 'search' );
									break;
								case 'address':
									get_template_part( 'template-parts/topbar/topbar', 'address' );
									break;
								case 'clear':
									get_template_part( 'template-parts/topbar/topbar', 'clear' );
									break;
								case 'lang-menu':
									get_template_part( 'template-parts/topbar/topbar', 'language-menu' );
									break;
								case 'currency-menu':
									get_template_part( 'template-parts/topbar/topbar', 'currency-menu' );
									break;
							}
						}
					endif;
					?>
				</ul>

			</div>
			<div class="search-main float-none d-lg-none d-block">
				<?php
				/**
				 * Search
				 */
				if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
					$printera_options = get_option( 'printera_options' );
					if( $printera_options['opt-search'] == 1 ){
						?>
							<div class="product-search float-start w-100 position-relative">
								<form name="product-search" method="get" class="search-form search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="search-wrapper">
										<select class="category">
											<option value=""><?php esc_html_e( 'All Collection', 'printera' ); ?></option>
											<?php $terms = get_terms( 'product_cat' ); ?>
											<?php foreach( $terms as $term ){ ?>
												<option value="<?php echo esc_html( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></option>
											<?php } ?>
										</select>
										<input type="search" name="s" class="search" placeholder="<?php echo esc_attr__( 'Search for product...', 'printera' ); ?>" value="">
										<button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i><?php esc_html_e( 'Search', 'printera' ); ?></button>
										<input type="hidden" name="product-search" value="1" />
										<?php echo svg_loading(); ?>
									</div>
								</form>
								<div class="search-results"></div>
							</div>
						<?php
					}
				} else{
					?>
					<div class="search-icon d-flex">
						<div class="search-wrap cursor-pointer d-flex align-items-center">
							<i class="fa-solid fa-magnifying-glass"></i>
						</div>
						<div class="top-search">
							<div class="search-fix">
								<div class="container">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				} 
				?>

				</div>

		</div>
	</div>
</header><!-- #masthead -->
