<?php
/**
 * Plugin Name: KirkiClassic Tabs
 * Plugin URI:  https://github.com/michaeltravan
 * Description: Tab control for Kirki Classic Customizer Framework.
 * Version:     1.1
 * Author:      Michael Travan
 * Author URI:  https://github.com/michaeltravan
 * License:     GPL-3.0
 * License URI: https://oss.ninja/gpl-3.0?organization=KirkiClassic%20Framework&project=control%20tab
 * Text Domain: kirki-classic
 * Domain Path: /languages
 *
 * @package kirki-tabs
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'kirki_classic_load_tab_control' ) ) {

	/**
	 * Load tab control inside "plugins_loaded" hook.
	 * This is necessary to check if KirkiClassic plugin is installed.
	 */
	function kirki_classic_load_tab_control() {

		// Stop, if KirkiClassic is not installed.
		if ( ! defined( 'KIRKI_CLASSIC_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic controls are already loaded.
		if ( defined( 'KIRKI_CLASSIC_CONTROLS_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic Tabs is already installed.
		if ( class_exists( '\KirkiClassic\Tabs\Init' ) ) {
			return;
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		define( 'KIRKI_CLASSIC_TAB_VERSION', $plugin_data['Version'] );
		define( 'KIRKI_CLASSIC_TAB_PLUGIN_FILE', __FILE__ );

		new \KirkiClassic\Tabs\Init();

	}

	add_action( 'plugins_loaded', 'kirki_classic_load_tab_control' );

}
