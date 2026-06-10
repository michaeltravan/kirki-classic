<?php
/**
 * Backwards-compatibility for KirkiClassic filters.
 *
 * @package     KirkiClassic
 * @category    Core
 * @author      Michael Travan
 * @copyright   Copyright (c) 2023, Michael Travan
 * @license     https://opensource.org/licenses/MIT
 * @since       1.0
 */

namespace KirkiClassic\Compatibility;

/**
 * Please do not use this class directly.
 * You should instead extend it per-field-type.
 */
class Deprecated {

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 1.0
	 */
	public function __construct() {
		require_once __DIR__ . '/deprecated/classes.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
		require_once __DIR__ . '/deprecated/functions.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
		require_once __DIR__ . '/deprecated/filters.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude
	}
}
