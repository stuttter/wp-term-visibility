<?php

/**
 * Term Visibility Functions
 *
 * @since 0.1.2
 *
 * @package TermVisibility/Includes/Functions
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * Return all of the registered term visibilities
 *
 * @todo Registration API
 * @todo Better labels
 * @todo Role & capability callbacks
 *
 * @since 0.1.2
 *
 * @return array
 */
function wp_get_term_visibilities() {
	return apply_filters( 'wp_get_term_visibilities', array(
		'public'  => esc_html__( 'Public',  'wp-term-visibility' ),
		'private' => esc_html__( 'Private', 'wp-term-visibility' ),
		'hidden'  => esc_html__( 'Hidden',  'wp-term-visibility' ),
	) );
}
