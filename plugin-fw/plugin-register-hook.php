<?php
/**
 * Functions for plugin registration hook.
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if ( ! function_exists( 'mps_plugin_registration_hook' ) ) {
	/**
	 * Register the plugin when activated.
	 * Please note: use this function through register_activation_hook.
	 *
	 * @use activate_PLUGINNAME hook
	 */
	function mps_plugin_registration_hook() {
		$hook     = str_replace( 'activate_', '', current_filter() );
		$option   = get_option( 'mps_recently_activated', array() );
		$option[] = $hook;
		update_option( 'mps_recently_activated', $option );
	}
}
