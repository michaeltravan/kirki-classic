<?php
/**
 * Lightweight PSR-4 autoloader for KirkiClassic packages.
 *
 * This replaces the per-package Composer vendor folders so we only keep
 * one shared autoloader and source files to reduce build size.
 */

defined( 'ABSPATH' ) || exit;

// Prevent registering multiple times.
if ( defined( 'KIRKI_CLASSIC_AUTOLOAD_REGISTERED' ) ) {
	return;
}

define( 'KIRKI_CLASSIC_AUTOLOAD_REGISTERED', true );

$packages = array(
	'headline-divider' => 'HeadlineDivider',
	'input-slider'     => 'InputSlider',
	'margin-padding'   => 'MarginPadding',
	'responsive'       => 'Responsive',
	'tabs'             => 'Tabs',
);

$base_dir = __DIR__ . '/controls/';

$psr4_map = array(
	'KirkiClassic\\Control\\' => array(),
	'KirkiClassic\\Field\\'   => array(),
);

foreach ( $packages as $slug => $namespace ) {
	$package_base = $base_dir . $slug;

	$control_dir = $package_base . '/src/Control';
	if ( is_dir( $control_dir ) ) {
		$psr4_map['KirkiClassic\\Control\\'][] = $control_dir;
	}

	$field_dir = $package_base . '/src/Field';
	if ( is_dir( $field_dir ) ) {
		$psr4_map['KirkiClassic\\Field\\'][] = $field_dir;
	}

	$root_dir = $package_base . '/src';
	if ( is_dir( $root_dir ) ) {
		$psr4_map[ 'KirkiClassic\\' . $namespace . '\\' ][] = $root_dir;
	}
}

spl_autoload_register(
	function ( $class ) use ( $psr4_map ) {
		foreach ( $psr4_map as $prefix => $directories ) {
			if ( 0 !== strpos( $class, $prefix ) ) {
				continue;
			}

			$relative_class = substr( $class, strlen( $prefix ) );
			$relative_path  = str_replace( '\\', '/', $relative_class ) . '.php';

			foreach ( $directories as $directory ) {
				$file = $directory . '/' . $relative_path;

				if ( file_exists( $file ) ) {
					require_once $file;
					return;
				}
			}
		}
	}
);

