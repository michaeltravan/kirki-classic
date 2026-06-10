<?php
// phpcs:ignoreFile

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'kirki_classic_get_option' ) ) {
	/**
	 * Get the value of a field.
	 * This is a deprecated function that we used when there was no API.
	 * Please use get_theme_mod() or get_option() instead.
	 * @see https://developer.wordpress.org/reference/functions/get_theme_mod/
	 * @see https://developer.wordpress.org/reference/functions/get_option/
	 *
	 * @return mixed
	 */
	function kirki_classic_get_option( $option = '' ) {
		_deprecated_function( __FUNCTION__, '1.0.0', sprintf( esc_html__( '%1$s or %2$s', 'kirki-classic' ), 'get_theme_mod', 'get_option' ) );
		return KirkiClassic::get_option( '', $option );
	}
}

if ( ! function_exists( 'kirki_classic_sanitize_hex' ) ) {
	function kirki_classic_sanitize_hex( $color ) {
		_deprecated_function( __FUNCTION__, '1.0.0', 'ariColor::newColor( $color )->toCSS( \'hex\' )' );
		return KirkiClassic_Color::sanitize_hex( $color );
	}
}

if ( ! function_exists( 'kirki_classic_get_rgb' ) ) {
	function kirki_classic_get_rgb( $hex, $implode = false ) {
		_deprecated_function( __FUNCTION__, '1.0.0', 'ariColor::newColor( $color )->toCSS( \'rgb\' )' );
		return KirkiClassic_Color::get_rgb( $hex, $implode );
	}
}

if ( ! function_exists( 'kirki_classic_get_rgba' ) ) {
	function kirki_classic_get_rgba( $hex = '#fff', $opacity = 100 ) {
		_deprecated_function( __FUNCTION__, '1.0.0', 'ariColor::newColor( $color )->toCSS( \'rgba\' )' );
		return KirkiClassic_Color::get_rgba( $hex, $opacity );
	}
}

if ( ! function_exists( 'kirki_classic_get_brightness' ) ) {
	function kirki_classic_get_brightness( $hex ) {
		_deprecated_function( __FUNCTION__, '1.0.0', 'ariColor::newColor( $color )->lightness' );
		return KirkiClassic_Color::get_brightness( $hex );
	}
}

if ( ! function_exists( 'KirkiClassic' ) ) {
	function KirkiClassic() {
		return \KirkiClassic\Compatibility\Framework::get_instance();
	}
}

// Original Kirki function shims — forward to the kirki_classic_* equivalents.

if ( ! function_exists( 'kirki_get_option' ) ) {
	function kirki_get_option( $option = '' ) {
		return kirki_classic_get_option( $option );
	}
}

if ( ! function_exists( 'kirki_sanitize_hex' ) ) {
	function kirki_sanitize_hex( $color ) {
		return kirki_classic_sanitize_hex( $color );
	}
}

if ( ! function_exists( 'kirki_get_rgb' ) ) {
	function kirki_get_rgb( $hex, $implode = false ) {
		return kirki_classic_get_rgb( $hex, $implode );
	}
}

if ( ! function_exists( 'kirki_get_rgba' ) ) {
	function kirki_get_rgba( $hex = '#fff', $opacity = 100 ) {
		return kirki_classic_get_rgba( $hex, $opacity );
	}
}

if ( ! function_exists( 'kirki_get_brightness' ) ) {
	function kirki_get_brightness( $hex ) {
		return kirki_classic_get_brightness( $hex );
	}
}

if ( ! function_exists( 'Kirki' ) ) {
	function Kirki() {
		return \KirkiClassic\Compatibility\Framework::get_instance();
	}
}
