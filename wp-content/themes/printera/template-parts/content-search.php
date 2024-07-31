<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package printera
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="tt-post-wrapper">
		<?php
		if ( is_single() ) :
			?>
			<div class="tt-post-meta-wrap float-start w-100">
				<div class="tt-post-category float-start cursor-pointer">
					<?php
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $cat ) {
							echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
						}
					}
					?>
				</div>
				<div class="tt-post-author float-start cursor-pointer">
					<?php echo  printera_posted_by(); ?>
				</div>
				<div class="tt-post-comment float-start cursor-pointer">
					<a href="<?php echo get_comments_link( $post->ID ); ?>">
						<span><?php echo printera_get_comments_number_text(); ?></span>
					</a>
				</div>
			</div>
		<?php endif;
		if ( has_post_thumbnail() ) { ?>
			<div class="tt-post-thumbnail position-relative text-center">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<div class="tt-post-details float-start w-100">
			<?php
				if( ! empty( get_the_title() ) && ! is_single() ){ ?>
					<div class="tt-post-title float-start w-100">
						<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</div>
			<?php }
	
			if ( 'post' === get_post_type() &&  ! is_single() ){
				?>
				<div class="tt-post-meta-wrap float-start w-100">
					<?php
					if( class_exists( 'ReduxFramework' ) && function_exists( 'loadmore_postSC' ) ) {
						$printera_options = get_option( 'printera_options' );
						if( $printera_options['opt-author']['4'] == 1 ){ ?>
							<div class="tt-post-meta cursor-pointer float-start">
								<?php printera_posted_on(); ?>
							</div>
						<?php }
						if( $printera_options['opt-author']['1'] == 1 ){ ?>
							<div class="tt-post-category float-start cursor-pointer">
								<?php
								$categories = get_the_category();
								if ( ! empty( $categories ) ) {
									foreach ( $categories as $cat ) {
										echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
									}
								}
								?>
							</div>
						<?php }
						if( $printera_options['opt-author']['2'] == 1 ){ ?>
							<div class="tt-post-author float-start cursor-pointer">
								<?php echo  printera_posted_by(); ?>
							</div>
						<?php }
						if( $printera_options['opt-author']['3'] == 1 ){ ?>
							<div class="tt-post-comment float-start cursor-pointer">
								<a href="<?php echo get_comments_link( $post->ID ); ?>">
									<span><?php echo printera_get_comments_number_text(); ?></span>
								</a>
							</div>
						<?php }
					} else{ ?>

						<div class="tt-post-meta cursor-pointer float-start">
							<?php printera_posted_on(); ?>
						</div>

						<div class="tt-post-category float-start cursor-pointer">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								foreach ( $categories as $cat ) {
									echo '<a href="' . esc_url( get_category_link( $cat->cat_ID ) ) . '" class="position-relative d-inline-block">' . esc_html( $cat->name ) . '</a>';
								}
							}
							?>
						</div>

						<div class="tt-post-author float-start cursor-pointer">
							<?php echo  printera_posted_by(); ?>
						</div>
						
						<div class="tt-post-comment float-start cursor-pointer">
							<a href="<?php echo get_comments_link( $post->ID ); ?>">
								<span><?php echo printera_get_comments_number_text(); ?></span>
							</a>
						</div>

					<?php } ?>
				</div>
			<?php }
			
			if( ! empty( get_the_content() ) ){ ?>
				<div class="tt-post-content float-start w-100">
					<?php
					if( is_single() ){
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'printera' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					}else{
						the_excerpt();
					}
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'printera' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			<?php }
			if ( ! is_single() ) { ?>
				<div class="more-comment-wrap float-start w-100 d-none">
					<div class="tt-post-more float-start">
						<a href="<?php the_permalink(); ?>" class="position-relative"><?php esc_html_e('Read More','printera'); ?></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
