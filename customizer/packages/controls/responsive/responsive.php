<?php
/**
 * Plugin Name: KirkiClassic Responsive
 * Plugin URI:  https://www.themeum.com
 * Description: Responsive control for Kirki Classic Customizer Framework.
 * Version:     1.1
 * Author:      Themeum
 * Author URI:  https://www.themeum.com
 * License:     GPL-3.0
 * License URI: https://oss.ninja/gpl-3.0?organization=KirkiClassic%20Framework&project=control%20input%20slider
 * Text Domain: kirki-responsive
 * Domain Path: /languages
 *
 * @package kirki-responsive
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'kirki_classic_load_responsive_control' ) ) {

	/**
	 * Load responsive control.
	 */
	function kirki_classic_load_responsive_control() {

		// Stop, if KirkiClassic is not installed.
		if ( ! defined( 'KIRKI_CLASSIC_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic controls are already loaded.
		if ( defined( 'KIRKI_CLASSIC_CONTROLS_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic Responsive is already installed.
		if ( class_exists( '\KirkiClassic\Responsive\Init' ) ) {
			return;
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		define( 'KIRKI_CLASSIC_RESPONSIVE_VERSION', $plugin_data['Version'] );
		define( 'KIRKI_CLASSIC_RESPONSIVE_PLUGIN_FILE', __FILE__ );

		new \KirkiClassic\Responsive\Init();

	}
	add_action( 'plugins_loaded', 'kirki_classic_load_responsive_control' );

}
