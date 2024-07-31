<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package printera
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-excerpt">
			<?php

				the_content();

				wp_link_pages(
					array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'printera' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'printera' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
				?>
		</div>
		<!-- .entry-content -->
</div><!-- #post-<?php the_ID(); ?> -->
