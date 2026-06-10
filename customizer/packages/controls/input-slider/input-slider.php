<?php
/**
 * Plugin Name: KirkiClassic Input Slider
 * Plugin URI:  https://github.com/michaeltravan
 * Description: Input slider control for Kirki Classic Customizer Framework.
 * Version:     1.1
 * Author:      Michael Travan
 * Author URI:  https://github.com/michaeltravan
 * License:     GPL-3.0
 * License URI: https://oss.ninja/gpl-3.0?organization=KirkiClassic%20Framework&project=control%20input%20slider
 * Text Domain: kirki-input-slider
 * Domain Path: /languages
 *
 * @package kirki-input-slider
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'kirki_classic_load_input_slider_control' ) ) {

	/**
	 * Load input slider control.
	 */
	function kirki_classic_load_input_slider_control() {

		// Stop, if KirkiClassic is not installed.
		if ( ! defined( 'KIRKI_CLASSIC_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic controls are already loaded.
		if ( defined( 'KIRKI_CLASSIC_CONTROLS_VERSION' ) ) {
			return;
		}

		// Stop, if KirkiClassic Input Slider is already installed.
		if ( class_exists( '\KirkiClassic\InputSlider\Init' ) ) {
			return;
		}

		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_data = get_plugin_data( __FILE__ );

		define( 'KIRKI_CLASSIC_INPUT_SLIDER_VERSION', $plugin_data['Version'] );
		define( 'KIRKI_CLASSIC_INPUT_SLIDER_PLUGIN_FILE', __FILE__ );

		new \KirkiClassic\InputSlider\Init();

	}
	add_action( 'plugins_loaded', 'kirki_classic_load_input_slider_control' );

}
