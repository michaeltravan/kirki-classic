<?php
/**
 * Adds class aliases for backwards compatibility.
 *
 * @package   KirkiClassic
 * @category  Core
 * @author    Michael Travan
 * @copyright Copyright (c) 2023, Michael Travan
 * @license   https://opensource.org/licenses/MIT
 * @since     0.1
 */

namespace KirkiClassic\Compatibility;

/**
 * Adds class aliases for backwards compatibility.
 *
 * @since 0.1
 */
class Aliases {

	/**
	 * An array of class aliases.
	 *
	 * @access private
	 * @since 0.1
	 * @var array
	 */
	private $aliases = [
		'generic'    => [
			[ 'KirkiClassic\Compatibility\KirkiClassic', 'Kirki' ],
			[ 'KirkiClassic\Compatibility\KirkiClassic', 'KirkiClassic' ],
			[ 'KirkiClassic\Compatibility\Config', 'KirkiClassic_Config' ],
			[ 'KirkiClassic\Compatibility\Control', 'KirkiClassic_Control' ],
			[ 'KirkiClassic\Compatibility\Field', 'KirkiClassic_Field' ],
			[ 'KirkiClassic\Util\Helper', 'KirkiClassic_Helper' ],
			[ 'KirkiClassic\Compatibility\Init', 'KirkiClassic_Init' ],
			[ 'KirkiClassic\L10n', 'KirkiClassic_L10n' ],
			[ 'KirkiClassic\Compatibility\Modules', 'KirkiClassic_Modules' ],
			[ 'KirkiClassic\Compatibility\Sanitize_Values', 'KirkiClassic_Sanitize_Values' ],
			[ 'KirkiClassic\Compatibility\Section', 'KirkiClassic_Section' ],
			[ 'KirkiClassic\Compatibility\Values', 'KirkiClassic_Values' ],
			[ 'KirkiClassic\Util\Util', 'KirkiClassic_Util' ],
			[ 'KirkiClassic\Compatibility\Framework', 'KirkiClassic_Toolkit' ],
			[ 'KirkiClassic\Module\CSS', 'KirkiClassic_Modules_CSS' ],
			[ 'KirkiClassic\Module\CSS\Output', 'KirkiClassic_Output' ],
			[ 'KirkiClassic\Module\CSS\Generator', 'KirkiClassic_Modules_CSS_Generator' ],
			[ 'KirkiClassic\Module\CSS\Property', 'KirkiClassic_Output_Property' ],
			[ 'KirkiClassic\Module\CSS\Property\Font_Family', 'KirkiClassic_Output_Property_Font_Family' ],
			[ 'KirkiClassic\Module\Preset', 'KirkiClassic_Modules_Preset' ],
			[ 'KirkiClassic\Module\Tooltips', 'KirkiClassic_Modules_Tooltips' ],
			[ 'KirkiClassic\Module\Webfonts', 'KirkiClassic_Modules_Webfonts' ],
			[ 'KirkiClassic\Module\Webfonts\Google', 'KirkiClassic_Fonts_Google' ],
			[ 'KirkiClassic\Module\Webfonts\Fonts', 'KirkiClassic_Fonts' ],
			[ 'KirkiClassic\Module\Webfonts\Embed', 'KirkiClassic_Modules_Webfonts_Embed' ],
			[ 'KirkiClassic\Module\Webfonts\Async', 'KirkiClassic_Modules_Webfonts_Async' ],
			[ 'KirkiClassic\Module\Field_Dependencies', 'KirkiClassic_Modules_Field_Dependencies' ],
			[ 'KirkiClassic\Module\Editor_Styles', 'KirkiClassic_Modules_Gutenberg' ],
			[ 'KirkiClassic\Module\Selective_Refresh', 'KirkiClassic_Modules_Selective_Refresh' ],
			[ 'KirkiClassic\Module\Postmessage', 'KirkiClassic_Modules_Postmessage' ],
			[ 'KirkiClassic\Field\Background', 'KirkiClassic_Field_Background' ],
			[ 'KirkiClassic\Field\CSS\Background', 'KirkiClassic_Output_Field_Background' ],
			[ 'KirkiClassic\Field\Checkbox', 'KirkiClassic_Field_Checkbox' ],
			[ 'KirkiClassic\Field\Checkbox_Switch', 'KirkiClassic_Field_Switch' ],
			[ 'KirkiClassic\Field\Checkbox_Switch', 'KirkiClassic\Field\Switch' ], // Preventing typo.
			[ 'KirkiClassic\Field\Checkbox_Toggle', 'KirkiClassic_Field_Toggle' ],
			[ 'KirkiClassic\Field\Checkbox_Toggle', 'KirkiClassic\Field\Toggle' ], // Preventing typo.
			[ 'KirkiClassic\Field\Code', 'KirkiClassic_Field_Code' ],
			[ 'KirkiClassic\Field\Color', 'KirkiClassic_Field_Color' ],
			[ 'KirkiClassic\Field\Color', 'KirkiClassic_Field_Color_Alpha' ],
			[ 'KirkiClassic\Field\Color_Palette', 'KirkiClassic_Field_Color_Palette' ],
			[ 'KirkiClassic\Field\Custom', 'KirkiClassic_Field_Custom' ],
			[ 'KirkiClassic\Field\Dashicons', 'KirkiClassic_Field_Dashicons' ],
			[ 'KirkiClassic\Field\Date', 'KirkiClassic_Field_Date' ],
			[ 'KirkiClassic\Field\Dimension', 'KirkiClassic_Field_Dimension' ],
			[ 'KirkiClassic\Field\Dimensions', 'KirkiClassic_Field_Dimensions' ],
			[ 'KirkiClassic\Field\CSS\Dimensions', 'KirkiClassic_Output_Field_Dimensions' ],
			[ 'KirkiClassic\Field\Dimensions', 'KirkiClassic_Field_Spacing' ],
			[ 'KirkiClassic\Field\Dimensions', 'KirkiClassic\Field\Spacing' ],
			[ 'KirkiClassic\Field\Editor', 'KirkiClassic_Field_Editor' ],
			[ 'KirkiClassic\Field\FontAwesome', 'KirkiClassic_Field_FontAwesome' ],
			[ 'KirkiClassic\Field\Generic', 'KirkiClassic_Field_KirkiClassic_Generic' ],
			[ 'KirkiClassic\Field\Generic', 'KirkiClassic_Field_Generic' ],
			[ 'KirkiClassic\Field\Text', 'KirkiClassic_Field_Text' ],
			[ 'KirkiClassic\Field\Textarea', 'KirkiClassic_Field_Textarea' ],
			[ 'KirkiClassic\Field\URL', 'KirkiClassic_Field_URL' ],
			[ 'KirkiClassic\Field\URL', 'KirkiClassic_Field_Link' ],
			[ 'KirkiClassic\Field\URL', 'KirkiClassic\Field\Link' ],
			[ 'KirkiClassic\Field\Image', 'KirkiClassic_Field_Image' ],
			[ 'KirkiClassic\Field\CSS\Image', 'KirkiClassic_Output_Field_Image' ],
			[ 'KirkiClassic\Field\Multicheck', 'KirkiClassic_Field_Multicheck' ],
			[ 'KirkiClassic\Field\Multicolor', 'KirkiClassic_Field_Multicolor' ],
			[ 'KirkiClassic\Field\CSS\Multicolor', 'KirkiClassic_Output_Field_Multicolor' ],
			[ 'KirkiClassic\Field\Number', 'KirkiClassic_Field_Number' ],
			[ 'KirkiClassic\Field\Palette', 'KirkiClassic_Field_Palette' ],
			[ 'KirkiClassic\Field\Repeater', 'KirkiClassic_Field_Repeater' ],
			[ 'KirkiClassic\Field\Dropdown_Pages', 'KirkiClassic_Field_Dropdown_Pages' ],
			[ 'KirkiClassic\Field\Preset', 'KirkiClassic_Field_Preset' ],
			[ 'KirkiClassic\Field\Select', 'KirkiClassic_Field_Select' ],
			[ 'KirkiClassic\Field\Slider', 'KirkiClassic_Field_Slider' ],
			[ 'KirkiClassic\Field\Sortable', 'KirkiClassic_Field_Sortable' ],
			[ 'KirkiClassic\Field\Typography', 'KirkiClassic_Field_Typography' ],
			[ 'KirkiClassic\Field\CSS\Typography', 'KirkiClassic_Output_Field_Typography' ],
			[ 'KirkiClassic\Field\Upload', 'KirkiClassic_Field_Upload' ],
		],
		'customizer' => [
			[ 'KirkiClassic\Control\Base', 'KirkiClassic_Control_Base' ],
			[ 'KirkiClassic\Control\Base', 'KirkiClassic_Customize_Control' ],
			[ 'KirkiClassic\Control\Checkbox', 'KirkiClassic_Control_Checkbox' ],
			[ 'KirkiClassic\Control\Checkbox_Switch', 'KirkiClassic_Control_Switch' ],
			[ 'KirkiClassic\Control\Checkbox_Toggle', 'KirkiClassic_Control_Toggle' ],
			[ 'WP_Customize_Code_Editor_Control', 'KirkiClassic_Control_Code' ],
			[ 'KirkiClassic\Control\Color', 'KirkiClassic_Control_Color' ],
			[ 'KirkiClassic\Control\Color_Palette', 'KirkiClassic_Control_Color_Palette' ],
			[ 'WP_Customize_Cropped_Image_Control', 'KirkiClassic_Control_Cropped_Image' ],
			[ 'KirkiClassic\Control\Custom', 'KirkiClassic_Control_Custom' ],
			[ 'KirkiClassic\Control\Dashicons', 'KirkiClassic_Control_Dashicons' ],
			[ 'KirkiClassic\Control\Date', 'KirkiClassic_Control_Date' ],
			[ 'KirkiClassic\Control\Dimension', 'KirkiClassic_Control_Dimension' ],
			[ 'KirkiClassic\Control\Editor', 'KirkiClassic_Control_Editor' ],
			[ 'KirkiClassic\Control\Generic', 'KirkiClassic_Control_Generic' ],
			[ 'KirkiClassic\Control\Image', 'KirkiClassic_Control_Image' ],
			[ 'KirkiClassic\Control\Multicheck', 'KirkiClassic_Control_Multicheck' ],
			[ 'KirkiClassic\Control\Generic', 'KirkiClassic_Control_Number' ],
			[ 'KirkiClassic\Control\Palette', 'KirkiClassic_Control_Palette' ],
			[ 'KirkiClassic\Control\Radio', 'KirkiClassic_Control_Radio' ],
			[ 'KirkiClassic\Control\Radio_Buttonset', 'KirkiClassic_Control_Radio_Buttonset' ],
			[ 'KirkiClassic\Control\Radio_Image', 'KirkiClassic_Control_Radio_Image' ],
			[ 'KirkiClassic\Control\Radio_Image', 'KirkiClassic_Controls_Radio_Image_Control' ],
			[ 'KirkiClassic\Control\Repeater', 'KirkiClassic_Control_Repeater' ],
			[ 'KirkiClassic\Control\Select', 'KirkiClassic_Control_Select' ],
			[ 'KirkiClassic\Control\Slider', 'KirkiClassic_Control_Slider' ],
			[ 'KirkiClassic\Control\Sortable', 'KirkiClassic_Control_Sortable' ],
			[ 'KirkiClassic\Control\Upload', 'KirkiClassic_Control_Upload' ],
			[ 'KirkiClassic\Settings\Repeater', 'KirkiClassic\Settings\Repeater_Setting' ],
			[ 'KirkiClassic\Settings\Repeater', 'KirkiClassic_Settings_Repeater_Setting' ],
			[ 'WP_Customize_Section', 'KirkiClassic_Sections_Default_Section' ],
			[ 'KirkiClassic\Section_Types\Expanded', 'KirkiClassic_Sections_Expanded_Section' ],
			[ 'KirkiClassic\Section_Types\Nested', 'KirkiClassic_Sections_Nested_Section' ],
			[ 'KirkiClassic\Section_Types\Link', 'KirkiClassic_Sections_Link_Section' ],
			[ 'KirkiClassic\Panel_Types\Nested', 'KirkiClassic_Panels_Nested_Panel' ],
		],
	];

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 0.1
	 */
	public function __construct() {
		$this->add_aliases();
		add_action( 'customize_register', [ $this, 'add_customizer_aliases' ] );
	}

	/**
	 * Adds object aliases.
	 *
	 * @access public
	 * @since 0.1
	 * @return void
	 */
	public function add_aliases() {
		foreach ( $this->aliases['generic'] as $item ) {
			if ( class_exists( $item[0] ) && ! class_exists( $item[1], false ) ) {
				class_alias( $item[0], $item[1] );
			}
		}
	}

	/**
	 * Adds object aliases for classes that get instantiated on customize_register.
	 *
	 * @access public
	 * @since 0.1
	 * @return void
	 */
	public function add_customizer_aliases() {
		foreach ( $this->aliases['customizer'] as $item ) {
			if ( class_exists( $item[0] ) && ! class_exists( $item[1], false ) ) {
				class_alias( $item[0], $item[1] );
			}
		}
	}
}
