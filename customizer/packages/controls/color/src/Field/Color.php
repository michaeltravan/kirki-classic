<?php
/**
 * Object used by the KirkiClassic framework to instantiate the control.
 *
 * This is a man-in-the-middle class, nothing but a proxy to set sanitization
 * callbacks and any usother properties we may need.
 *
 * @package   kirki-framework/control-color
 * @copyright Copyright (c) 2023, Michael Travan
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

namespace KirkiClassic\Field;

use KirkiClassic\Field;

/**
 * Field overrides.
 *
 * @since 1.0
 */
class Color extends ReactColorful {}
