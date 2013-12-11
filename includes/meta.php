<?php
/**
 * Registers metadata and related functions for the plugin.
 *
 * @package    WC Custom Post Types
 * @since      1.1
 * @author     Chris Baldelomar <chris@webplantmedia.com>
 * @copyright  Copyright (c) 2013, Chris Baldelomar
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Register meta on the 'init' hook. */
add_action( 'init', 'wc_cpt_register_meta' );

/**
 * Registers custom metadata for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function wc_cpt_register_meta() {

	register_meta( 'post', 'portfolio_item_url', 'wc_cpt_sanitize_meta' );
}

/**
 * Callback function for sanitizing meta when add_metadata() or update_metadata() is called by WordPress. 
 * If a developer wants to set up a custom method for sanitizing the data, they should use the 
 * "sanitize_{$meta_type}_meta_{$meta_key}" filter hook to do so.
 *
 * @since  0.1.0
 * @access public
 * @param  mixed  $meta_value The value of the data to sanitize.
 * @param  string $meta_key   The meta key name.
 * @param  string $meta_type  The type of metadata (post, comment, user, etc.)
 * @return mixed  $meta_value
 */
function wc_cpt_sanitize_meta( $meta_value, $meta_key, $meta_type ) {

	if ( 'portfolio_item_url' === $meta_key )
		return esc_url( $meta_value );

	return strip_tags( $meta_value );
}

?>
