<?php

/**
 * Plugin Name: WP Term Visibility
 * Plugin URI:  https://wordpress.org/plugins/wp-term-visibility/
 * Description: Visibility for categories, tags, and other taxonomy terms
 * Author:      John James Jacoby
 * Version:     0.1.3
 * Author URI:  https://profiles.wordpress.org/johnjamesjacoby/
 * License:     GPL v2 or later
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Instantiate the main WordPress Term Color class
 *
 * @since 0.1.2
 */
function _wp_term_visibility() {

	// Bail if no term meta
	if ( ! function_exists( 'add_term_meta' ) ) {
		return;
	}

	// Setup the main file
	$file = __FILE__;
	$dir  = dirname( $file );

	// Include the main class
	include $dir . '/includes/functions.php';
	include $dir . '/includes/class-wp-term-meta-ui.php';
	include $dir . '/includes/class-wp-term-visibility.php';

	// Instantiate the main class
	new WP_Term_Visibility( $file );
}
add_action( 'init', '_wp_term_visibility', 98 );
