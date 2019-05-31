<?php

/**
 * Plugin Name: WP Term Visibility
 * Plugin URI:  https://wordpress.org/plugins/wp-term-visibility/
 * Author:      John James Jacoby
 * Author URI:  https://profiles.wordpress.org/johnjamesjacoby/
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Visibility for categories, tags, and other taxonomy terms
 * Version:     2.0.0
 * Text Domain: wp-term-visibility
 * Domain Path: /assets/lang/
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Include the required files & dependencies
 *
 * @since 0.1.2
 */
function _wp_term_visibility() {

	// Setup the main file
	$plugin_path = plugin_dir_path( __FILE__ );

	// Classes
	require_once $plugin_path . '/includes/class-wp-term-meta-ui.php';
	require_once $plugin_path . '/includes/class-wp-term-visibility.php';

	// Functions
	require_once $plugin_path . '/includes/functions.php';
}
add_action( 'plugins_loaded', '_wp_term_visibility' );

/**
 * Instantiate the main class
 *
 * @since 0.2.0
 */
function _wp_term_visibility_init() {
	new WP_Term_Visibility( __FILE__ );
}
add_action( 'init', '_wp_term_visibility_init', 75 );
