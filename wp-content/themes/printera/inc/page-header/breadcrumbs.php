<?php
/**
 * Breadcrumbs
 *
 * @package printera
 * @subpackage printera
 * @since printera 1.0
 */

/**
 * Breadcrumbs function
 */
function printera_breadcrumbs() {

	$home_breadcrumbs = 0;
	$home             = 'Home'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$mycurrent        = 1;
	global $post;
	$myhome_url = esc_url( home_url( '/' ) );
	if ( is_front_page() ) {
		if ( 1 === $home_breadcrumbs ) {
			echo '<div id="crumbs"><a href="' . esc_url( $myhome_url ) . '">' .  $home . '</a></div>';
		}
	} else {
		echo '<div id="crumbs"><a href="' . esc_url( $myhome_url ) . '">' .  $home . '</a>';
		if ( is_home() ) {
			echo '<span class="active">' . esc_html__( 'Blogs', 'printera' ) . '</span>';
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			echo '<span class="active">' . esc_html__( 'Archive : ', 'printera' ) . ' "' . single_cat_title( '', false ) . '" </span>';
		} elseif ( is_search() ) {
			echo '<span class="active">' . esc_html__( 'Results : ', 'printera' ) . ' "' . get_search_query() . '"</span>';
		} elseif ( is_day() ) {
			echo '<a class="active" href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ';
			echo '<a class="active" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ';
			echo '<span class="active">' . get_the_time( 'd' ) . '</span>';
		} elseif ( is_month() ) {
			echo '<a class="active" href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ';
			echo '<span class="active">' . get_the_time( 'F' ) . '</span>';
		} elseif ( is_year() ) {
			echo '<span class="active">' . get_the_time( 'Y' ) . '</span>';
		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() !== 'post' ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;
				if ( 1 === $mycurrent ) {
					if( get_the_title() ){ echo '<span class="active">' . get_the_title() . '</span>'; }
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' );
				if ( 0 === $mycurrent ) {
					$cats = preg_replace( "#^(.+)\s$separator\s$#", '$1', $cats );
				}
				if ( 1 === $mycurrent ) {
					if( get_the_title() ){ echo '<span class="active">' . get_the_title() . '</span>'; }
				}
			}
		} elseif ( ! is_single() && ! is_page() && get_post_type() !== 'post' && ! is_404() ) {
			$post_type = get_post_type_object( 'product' );
			echo '<span class="active">' . $post_type->labels->singular_name . '</span>';
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			echo '<a class="active" href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>';
			if ( 1 === $mycurrent ) {
				echo ' ' . '<span class="active">' . get_the_title() . '</span>';
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 === $mycurrent ) {
				echo '<span class="active">' . get_the_title() . '</span>';
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a class="active" href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs = array_reverse( $breadcrumbs );

			if ( $mycurrent == 1 ) {
				echo '<span class="active">' . get_the_title() . '</span>';
			}
		} elseif ( is_tag() ) {
			echo '<span class="active">' . esc_html__( 'Posts tagged', 'printera' ) . ' "' . single_tag_title( '', false ) . '"</span>';
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo '<span class="active">' . esc_html__( 'Articles By : ', 'printera' ) . ' ' . $userdata->display_name . '</span>';
		} elseif ( is_404() ) {
			echo '<span class="active">' . esc_html__( '404', 'printera' ) . '</span>';
		}
		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html__( 'Page', 'printera' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}
		echo '</div>';
	}
}
