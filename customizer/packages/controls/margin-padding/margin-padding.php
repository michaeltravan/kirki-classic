<?php
/**
 * Plugin Name: KirkiClassic Margin & Padding
 * Plugin URI:  https://github.com/michaeltravan
 * Description: Margin & padding control for Kirki Classic Customizer Framework.
 * Version:     1.1
 * Author:      Michael Travan
 * Author URI:  https://github.com/michaeltravan
 * License:     GPL-3.0
 * License URI: https://oss.ninja/gpl-3.0?organization=KirkiClassic%20Framework&project=control%20margin%20padding
 * Text Domain: kirki-margin-padding
 * Domain Path: /languages
 *
 * @package kirki-margin-padding
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'kirki_classic_load_margin_padding_control' ) ) {

	/**
	 * Load margin & padding control.
	 */
	function kirki_classic_load_margin_padding_control() {

		// Stop, if KirkiClassic is not installed.
		if ( ! defined( 'KIRKI_CLASSIC_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic controls are already loaded.
		if ( defined( 'KIRKI_CLASSIC_CONTROLS_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic Margin & Padding is already installed.
		if ( class_exists( '\KirkiClassic\MarginPadding\Init' ) ) {
			return;
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		define( 'KIRKI_CLASSIC_MARGIN_PADDING_VERSION', $plugin_data['Version'] );
		define( 'KIRKI_CLASSIC_MARGIN_PADDING_PLUGIN_FILE', __FILE__ );

		new \KirkiClassic\MarginPadding\Init();

	}
	add_action( 'plugins_loaded', 'kirki_classic_load_margin_padding_control' );

}
