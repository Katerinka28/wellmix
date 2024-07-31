<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package printera
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
					
				<?php the_content(); ?>

			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
