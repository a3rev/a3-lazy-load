<?php
/**
 * WP Rocket: exclude a3 Lazy Load wp_localize_script() inline blocks from deferred inline JS processing.
 *
 * WordPress prints localized data with script id "{handle}-js-extra". WP Rocket uses substring
 * matches from the rocket_defer_inline_exclusions filter.
 *
 * @package A3_Lazy_Load
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'rocket_defer_inline_exclusions', 'a3_lazy_load_rocket_defer_inline_exclusions', 10, 1 );

/**
 * Append script id fragments for localized lazy-load scripts.
 *
 * @param string[] $inline_exclusions_list Partial string matches for inline scripts to leave unchanged.
 * @return string[]
 */
function a3_lazy_load_rocket_defer_inline_exclusions( $inline_exclusions_list ) {
	if ( ! is_array( $inline_exclusions_list ) ) {
		$inline_exclusions_list = array();
	}

	// Handles from classes/class-a3-lazy-load.php → WordPress id "{handle}-js-extra".
	$inline_exclusions_list[] = 'jquery-lazyloadxt-js-extra';
	$inline_exclusions_list[] = 'jquery-lazyloadxt-extend-js-extra';

	return $inline_exclusions_list;
}
