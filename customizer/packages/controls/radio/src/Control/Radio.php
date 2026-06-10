<?php
/**
 * Customizer Control: kirki-radio.
 *
 * @package   kirki-framework/control-radio
 * @copyright Copyright (c) 2023, Michael Travan
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace KirkiClassic\Control;

use KirkiClassic\Control\Base;
use KirkiClassic\URL;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Radio control
 */
class Radio extends Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-classic-radio';

	/**
	 * The version. Used in scripts & styles for cache-busting.
	 *
	 * @static
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public static $control_ver = '1.1';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @since 1.1
	 * @return void
	 */
	protected function content_template() {
		?>
		<span class="customize-control-title">{{{ data.label }}}</span>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<# _.each( data.choices, function( val, key ) { #>
			<label>
				<input
					{{{ data.inputAttrs }}}
					type="radio"
					data-id="{{ data.id }}"
					value="{{ key }}"
					{{ data.link }}
					name="_customize-radio-{{ data.id }}"
					<# if ( data.value === key ) { #> checked<# } #>
				/>
				<# if ( _.isArray( val ) ) { #>
					{{{ val[0] }}}<span class="option-description">{{{ val[1] }}}</span>
				<# } else { #>
					{{ val }}
				<# } #>
			</label>
		<# } ); #>
		<?php
	}
}
