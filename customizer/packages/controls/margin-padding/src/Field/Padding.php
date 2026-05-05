<?php
/**
 * Override field methods.
 *
 * @package kirki-padding
 * @since   1.0
 */

namespace KirkiClassic\Field;

/**
 * Field overrides.
 *
 * @since 1.0
 */
class Padding extends Margin {

	/**
	 * The field type.
	 *
	 * @since 1.0
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-classic-padding';

	/**
	 * The control class-name.
	 *
	 * @since 1.0
	 * @access protected
	 * @var string
	 */
	protected $control_class = '\KirkiClassic\Control\Padding';

	/**
	 * Filter arguments before creating the control.
	 *
	 * @param array                 $args The field arguments.
	 * @param \WP_Customize_Manager $wp_customize The customizer instance.
	 *
	 * @return array $args The maybe-filtered arguments.
	 */
	public function filter_control_args( $args, $wp_customize ) {

		if ( $args['settings'] === $this->args['settings'] ) {
			$args         = parent::filter_control_args( $args, $wp_customize );
			$args['type'] = 'kirki-classic-padding';
		}

		return $args;

	}

}
