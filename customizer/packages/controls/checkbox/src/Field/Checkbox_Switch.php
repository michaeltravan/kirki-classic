<?php
/**
 * Override field methods
 *
 * @package   kirki-framework/checkbox
 * @copyright Copyright (c) 2023, Michael Travan
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace KirkiClassic\Field;

/**
 * Field overrides.
 *
 * @since 1.0
 */
class Checkbox_Switch extends Checkbox {

	/**
	 * The field type.
	 *
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public $type = 'kirki-classic-switch';

	/**
	 * The control class-name.
	 *
	 * @access protected
	 * @since 0.1
	 * @var string
	 */
	protected $control_class = '\KirkiClassic\Control\Checkbox_Switch';

	/**
	 * Filter arguments before creating the control.
	 *
	 * @access public
	 * @since 0.1
	 * @param array                $args         The field arguments.
	 * @param WP_Customize_Manager $wp_customize The customizer instance.
	 * @return array
	 */
	public function filter_control_args( $args, $wp_customize ) {

		if ( $args['settings'] === $this->args['settings'] ) {
			$args         = parent::filter_control_args( $args, $wp_customize );
			$args['type'] = 'kirki-classic-switch';
		}

		return $args;

	}
}
