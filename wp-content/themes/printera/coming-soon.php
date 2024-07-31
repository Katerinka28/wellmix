<?php
/**
 * Template Name: Coming Soon
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package printera
 */

get_header();

$printera_options = get_option( 'printera_options' );

?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">

					<?php if( $printera_options['opt-comingSoon'] == 1 ){ ?>
						<div class="coming-soon-page">
							<div class="container">
								<div class="coming-soon-wrap">
									<h2 class="coming-title"><?php echo esc_html( $printera_options['comingsoon-title'] ); ?></h2>

									<div class="coming-desc"><?php echo html_entity_decode( $printera_options['comingsoon-text'] ); ?></div>

									<?php $date_time = $printera_options['comingsoon-date'] ?>

									<div class="banner-timer">
										<?php if( ! empty( $date_time ) ){ ?><div class="timer-datetime" id="timer-datetime" data="<?php echo esc_html( $date_time ); ?>"></div><?php } ?>
									</div>

									<div class="back-to-home">
										<a href="<?php echo get_home_url(); ?>" class="btn btn-primary"><?php esc_html_e('Back To Home','printera') ?></a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php
						the_content();
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
