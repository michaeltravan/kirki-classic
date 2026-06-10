<?php
/**
 * Handles CSS output for background-image.
 *
 * @package     KirkiClassic
 * @subpackage  Controls
 * @copyright   Copyright (c) 2023, Michael Travan
 * @license    https://opensource.org/licenses/MIT
 * @since       2.2.0
 */

namespace KirkiClassic\Module\CSS\Property;

use KirkiClassic\Module\CSS\Property;

/**
 * Output overrides.
 */
class Background_Image extends Property {

	/**
	 * Modifies the value.
	 *
	 * @access protected
	 */
	protected function process_value() {
		if ( is_array( $this->value ) && isset( $this->value['url'] ) ) {
			$this->value = $this->value['url'];
		}
		if ( false === strpos( $this->value, 'gradient' ) && false === strpos( $this->value, 'url(' ) ) {
			if ( empty( $this->value ) ) {
				return;
			}
			if ( preg_match( '/^\d+$/', $this->value ) ) {
				$this->value = 'url("' . set_url_scheme( wp_get_attachment_url( $this->value ) ) . '")';
			} else {
				$this->value = 'url("' . set_url_scheme( $this->value ) . '")';
			}
		}
	}
}
