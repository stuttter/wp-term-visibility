<?php

/**
 * Term Visibility Class
 *
 * @since 0.1.2
 *
 * @package TermVisibility/Includes/Class
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_Term_Visibility' ) ) :
/**
 * Main WP Term Visibility class
 *
 * @since 0.1.2
 */
final class WP_Term_Visibility extends WP_Term_Meta_UI {

	/**
	 * @var string Plugin version
	 */
	public $version = '0.1.2';

	/**
	 * @var string Database version
	 */
	public $db_version = 201509010001;

	/**
	 * @var string Database version
	 */
	public $db_version_key = 'wpdb_term_visibility_version';

	/**
	 * @var string Metadata key
	 */
	public $meta_key = 'visibility';

	/**
	 * Hook into queries, admin screens, and more!
	 *
	 * @since 0.1.2
	 */
	public function __construct( $file = '' ) {

		// Setup the labels
		$this->labels = array(
			'singular'    => esc_html__( 'Visibility',   'wp-term-color' ),
			'plural'      => esc_html__( 'Visibilities', 'wp-term-color' ),
			'description' => esc_html__( 'Assign terms a custom color to visually separate them from each-other.', 'wp-term-color' )
		);

		// Call the parent and pass the file
		parent::__construct( $file );
	}

	/**
	 * Add help tabs for `color` column
	 *
	 * @since 0.1.2
	 */
	public function help_tabs() {
		get_current_screen()->add_help_tab(array(
			'id'      => 'wp_term_visibilities_help_tab',
			'title'   => __( 'Term Visibility', 'wp-term-visibility' ),
			'content' => '<p>' . __( 'Set term visibility to provide custom behaviors.', 'wp-term-visibility' ) . '</p>',
		) );
	}

	/**
	 * Align custom `color` column
	 *
	 * @since 0.1.0
	 */
	public function admin_head() {
		?>

		<style type="text/css">
			.column-visibility {
				width: 94px;
			}
		</style>

		<?php
	}

	/**
	 * Return visibility options for use in a dropdown
	 *
	 * @since 0.1.2
	 */
	protected function get_term_visibility_options( $term = '' ) {
		$options = wp_get_term_visibilities();

		// Start an output buffer
		ob_start();

		// Get the meta value
		$value = isset( $term->term_id )
			?  $this->get_meta( $term->term_id )
			: '';

		// Loop through visibilities and make them into option tags
		foreach ( $options as $option_id => $option ) : ?>

			<option value="<?php echo esc_attr( $option_id ); ?>" <?php selected( $option_id, $value ); ?>>
				<?php echo esc_html( $option ); ?>
			</option>

		<?php endforeach;

		// Return the output buffer
		return ob_get_clean();
	}

	/** Markup ****************************************************************/

	/**
	 * Output the "term-visibility" form field when adding a new term
	 *
	 * @since 0.1.2
	 */
	public function form_field( $term = '' ) {
		?>

		<select name="term-visibility" id="term-visibility">
			<?php echo $this->get_term_visibility_options( $term ); ?>
		</select>

		<?php
	}

	/**
	 * Output the "term-visibility" quick-edit field
	 *
	 * @since 0.1.2
	 */
	public function quick_edit_form_field() {
		?>

		<select name="term-visibility">
			<?php echo $this->get_term_visibility_options(); ?>
		</select>

		<?php
	}

	/**
	 * Return the formatted output for the colomn row
	 *
	 * @since 0.1.2
	 *
	 * @param string $meta
	 */
	protected function format_output( $meta = '' ) {
		$options = wp_get_term_visibilities();

		// Value?
		$retval = isset( $options[ $meta ] )
			? $options[ $meta ]
			: $this->no_value;

		// Return
		return esc_html( $retval );
	}
}
endif;
