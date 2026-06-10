<?php
/**
 * Customizer Control: switch.
 *
 * @package   kirki-framework/checkbox
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
 * Switch control (modified checkbox).
 *
 * @since 1.0
 */
class Checkbox_Switch extends Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public $type = 'kirki-classic-switch';

	/**
	 * The control version.
	 *
	 * @static
	 * @access public
	 * @since 1.0
	 * @var string
	 */
	public static $control_ver = '1.0.3';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.4.0
	 */
	public function to_json() {

		// Get the basics from the parent class.
		parent::to_json();

		$this->json['checkboxType'] = str_ireplace( 'kirki-classic-', '', $this->type );

		$this->json['defaultChoices'] = [
			'on'  => __( 'On', 'kirki-classic' ),
			'off' => __( 'Off', 'kirki-classic' ),
		];

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @since 1.0
	 * @return void
	 */
	protected function content_template() {
		?>

		<div class="kirki-classic-{{ data.checkboxType }}-control kirki-{{ data.checkboxType }}">
			<# if ( data.label || data.description ) { #>
				<div class="kirki-classic-control-label">
					<# if ( data.label ) { #>
						<label class="customize-control-title" for="kirki_classic_{{ data.checkboxType }}_{{ data.id }}">
							{{{ data.label }}}
						</label>
					<# } #>

					<# if ( data.description ) { #>
						<span class="description customize-control-description">{{{ data.description }}}</span>
					<# } #>
					</div>
			<# } #>

			<div class="kirki-classic-control-form">
				<input class="screen-reader-text kirki-toggle-switch-input" {{{ data.inputAttrs }}} name="kirki_classic_{{ data.checkboxType }}_{{ data.id }}" id="kirki_classic_{{ data.checkboxType }}_{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}}<# if ( '1' == data.value ) { #> checked<# } #> />
				<label class="kirki-classic-toggle-switch-label" for="kirki_classic_{{ data.checkboxType }}_{{ data.id }}">
					<# if ('switch' === data.checkboxType) { #>
						<span class="toggle-on">
							<# data.choices.on = data.choices.on || data.defaultChoices.on #>
							{{ data.choices.on }}
						</span>
						<span class="toggle-off">
							<# data.choices.off = data.choices.off || data.defaultChoices.off #>
							{{ data.choices.off }}
						</span>
					<# } #>
				</label>
			</div>
		</div>

		<?php
	}
}
