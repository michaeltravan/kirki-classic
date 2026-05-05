<?php
/**
 * Plugin Name: KirkiClassic - Headlines & Divider Control
 * Plugin URI:  https://www.themeum.com
 * Description: Headlines & divider control for Kirki Classic Customizer Framework.
 * Version:     1.1
 * Author:      Themeum
 * Author URI:  https://www.themeum.com
 * License:     GPL-3.0
 * License URI: https://oss.ninja/gpl-3.0?organization=KirkiClassic%20Framework&project=control%20headline%20divider
 * Text Domain: kirki-headline-divider
 * Domain Path: /languages
 *
 * @package kirki-headline-divider
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'kirki_classic_load_headline_divider_control' ) ) {

	/**
	 * Load headline divider control.
	 */
	function kirki_classic_load_headline_divider_control() {

		// Stop, if KirkiClassic is not installed.
		if ( ! defined( 'KIRKI_CLASSIC_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic controls are already loaded.
		if ( defined( 'KIRKI_CLASSIC_CONTROLS_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic Headline Divider is already installed.
		if ( class_exists( '\KirkiClassic\HeadlineDivider\Init' ) ) {
			return;
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		define( 'KIRKI_CLASSIC_HEADLINE_DIVIDER_VERSION', $plugin_data['Version'] );
		define( 'KIRKI_CLASSIC_HEADLINE_DIVIDER_PLUGIN_FILE', __FILE__ );

		new \KirkiClassic\HeadlineDivider\Init();

	}
	add_action( 'plugins_loaded', 'kirki_classic_load_headline_divider_control' );

}
