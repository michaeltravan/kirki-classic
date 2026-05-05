<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package KirkiClassic
 * @category Core
 * @author Themeum
 * @copyright Copyright (c) 2023, Themeum
 * @license https://opensource.org/licenses/MIT
 * @since 3.0.12
 */

use KirkiClassic\Util\Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if KirkiClassic does not exist.
if ( ! class_exists( 'KirkiClassic' ) ) {
	return;
}

KirkiClassic::add_config(
	'kirki_classic_demo_config',
	[
		'option_type' => 'theme_mod',
		'capability'  => 'manage_options',
	]
);

/**
 * Add a panel.
 *
 * @link https://docs.themeum.com/kirki/getting-started/panels-sections/
 */
new \KirkiClassic\Panel(
	'kirki_classic_demo_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Kirki Classic Demo Panel', 'kirki-classic' ),
		'description' => esc_html__( 'Contains sections for all kirki controls.', 'kirki-classic' ),
	]
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://docs.themeum.com/kirki/getting-started/panels-sections/
 */
$sections = [
	'background'      => [ esc_html__( 'Background', 'kirki-classic' ), '' ],
	'code'            => [ esc_html__( 'Code', 'kirki-classic' ), '' ],
	'checkbox'        => [ esc_html__( 'Checkbox', 'kirki-classic' ), '' ],
	'color'           => [ esc_html__( 'Color', 'kirki-classic' ), '' ],
	'color_advanced'  => [ esc_html__( 'Color — Advanced', 'kirki-classic' ), '' ],
	'color_palette'   => [ esc_html__( 'Color Palette', 'kirki-classic' ), '' ],
	'custom'          => [ esc_html__( 'Custom', 'kirki-classic' ), '' ],
	'dashicons'       => [ esc_html__( 'Dashicons', 'kirki-classic' ), '' ],
	'date'            => [ esc_html__( 'Date', 'kirki-classic' ), '' ],
	'dimension'       => [ esc_html__( 'Dimension', 'kirki-classic' ), '' ],
	'dimensions'      => [ esc_html__( 'Dimensions', 'kirki-classic' ), '' ],
	'dropdown-pages'  => [ esc_html__( 'Dropdown Pages', 'kirki-classic' ), '' ],
	'editor'          => [ esc_html__( 'Editor', 'kirki-classic' ), '' ],
	'fontawesome'     => [ esc_html__( 'Font-Awesome', 'kirki-classic' ), '' ],
	'generic'         => [ esc_html__( 'Generic', 'kirki-classic' ), '' ],
	'image'           => [ esc_html__( 'Image', 'kirki-classic' ), '' ],
	'multicheck'      => [ esc_html__( 'Multicheck', 'kirki-classic' ), '' ],
	'multicolor'      => [ esc_html__( 'Multicolor', 'kirki-classic' ), '' ],
	'number'          => [ esc_html__( 'Number', 'kirki-classic' ), '' ],
	'palette'         => [ esc_html__( 'Palette', 'kirki-classic' ), '' ],
	'preset'          => [ esc_html__( 'Preset', 'kirki-classic' ), '' ],
	'radio'           => [ esc_html__( 'Radio', 'kirki-classic' ), esc_html__( 'A plain Radio control.', 'kirki-classic' ) ],
	'radio-buttonset' => [ esc_html__( 'Radio Buttonset', 'kirki-classic' ), esc_html__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'kirki-classic' ) ],
	'radio-image'     => [ esc_html__( 'Radio Image', 'kirki-classic' ), esc_html__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'kirki-classic' ) ],
	'repeater'        => [ esc_html__( 'Repeater', 'kirki-classic' ), '' ],
	'select'          => [ esc_html__( 'Select', 'kirki-classic' ), '' ],
	'slider'          => [ esc_html__( 'Slider', 'kirki-classic' ), '' ],
	'sortable'        => [ esc_html__( 'Sortable', 'kirki-classic' ), '' ],
	'switch'          => [ esc_html__( 'Switch', 'kirki-classic' ), '', 'outer' ],
	'toggle'          => [ esc_html__( 'Toggle', 'kirki-classic' ), '', 'outer' ],
	'typography'      => [ esc_html__( 'Typography', 'kirki-classic' ), '' ],
	'upload'          => [ esc_html__( 'Upload', 'kirki-classic' ), '' ],
];

foreach ( $sections as $section_id => $section ) {
	$section_args = [
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'kirki_classic_demo_panel',
	];
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	new \KirkiClassic\Section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}

new \KirkiClassic\Section(
	'pro_test',
	[
		'title'       => esc_html__( 'Test Link Section', 'kirki-classic' ),
		'type'        => 'link',
		'button_text' => esc_html__( 'Pro', 'kirki-classic' ),
		'button_url'  => 'https://www.themeum.com',
	]
);

/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
new \KirkiClassic\Field\Background(
	[
		'settings'    => 'kirki_classic_demo_background',
		'label'       => esc_html__( 'Background Control', 'kirki-classic' ),
		'description' => esc_html__( 'Background conrols are pretty complex! (but useful if properly used)', 'kirki-classic' ),
		'section'     => 'background_section',
		'default'     => [
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
	]
);

/**
 * Code control.
 *
 * @link https://docs.themeum.com/kirki/controls/code/
 */
new \KirkiClassic\Field\Code(
	[
		'settings'    => 'kirki_classic_demo_code_css',
		'label'       => esc_html__( 'Code Control — CSS', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of code control in CSS format', 'kirki-classic' ),
		'section'     => 'code_section',
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	]
);

/**
 * Checkbox control.
 *
 * @link https://docs.themeum.com/kirki/controls/checkbox/
 */
new \KirkiClassic\Field\Checkbox(
	[
		'settings'    => 'kirki_classic_demo_checkbox',
		'label'       => esc_html__( 'Checkbox Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of checkbox control', 'kirki-classic' ),
		'section'     => 'checkbox_section',
		'default'     => true,
	]
);

/**
 * Color Controls.
 *
 * @link https://docs.themeum.com/kirki/controls/color/
 */
KirkiClassic::add_field(
	'kirki_classic_demo_config',
	[
		'type'        => 'color',
		'settings'    => 'kirki_classic_demo_color_alpha_old',
		'label'       => 'Using <code>KirkiClassic::add_field</code> — With alpha',
		'description' => esc_html__( 'This is a color control registered using `KirkiClassic::add_field` with "alpha" => true (the old KirkiClassic API).', 'kirki-classic' ),
		'section'     => 'color_section',
		'transport'   => 'postMessage',
		'default'     => '#ff0055',
		'choices'     => [
			'alpha' => true,
		],
	]
);

new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_hex',
		'label'       => __( 'Hex only', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control without alpha channel.', 'kirki-classic' ),
		'section'     => 'color_section',
		'transport'   => 'postMessage',
		'default'     => '#0008DC',
	]
);

new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_alpha',
		'label'       => __( 'With alpha channel', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with alpha channel.', 'kirki-classic' ),
		'section'     => 'color_section',
		'transport'   => 'postMessage',
		'choices'     => [
			'alpha' => true,
		],
	]
);

new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_hue',
		'label'       => __( 'Hue only.', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with "mode" => "hue" (hue mode).', 'kirki-classic' ),
		'section'     => 'color_section',
		'transport'   => 'postMessage',
		'default'     => 160,
		'mode'        => 'hue',
	]
);

/**
 * Color Control (Advanced)
 */

/**
 * Color control with form_component value is HexColorPicker.
 *
 * The saved value will always be a string, for instance:
 * "#ff0000"
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_hex',
		'label'       => __( 'v4 — form_component — HexColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is HexColorPicker.', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => '#ffff00',
		'choices'     => [
			'form_component' => 'HexColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is RgbColorPicker.
 *
 * The saved value will be an rgba array.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * [
 *   'r' => 255,
 *   'g' => 255,
 *   'b' => 45,
 *   'a' => 0.5
 * ]
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_rgb',
		'label'       => __( 'v4 — form_component — RgbColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is RgbColorPicker. The saved value will be an array.', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => '#ffff00',
		'choices'     => [
			'form_component' => 'RgbColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is RgbStringColorPicker.
 *
 * The saved value will be an rgb string.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * "rgba(255, 255, 45)"
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_rgb_string',
		'label'       => __( 'v4 — form_component — RgbStringColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is RgbStringColorPicker. The saved value will be a string.', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => '#ffff00',
		'choices'     => [
			'form_component' => 'RgbStringColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is RgbaColorPicker.
 *
 * The saved value will be an rgba array.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * [
 *   'r' => 255,
 *   'g' => 255,
 *   'b' => 45,
 *   'a' => 0.5
 * ]
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_rgba',
		'label'       => __( 'v4 — form_component — RgbaColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is RgbaColorPicker.  The saved value will be an array.', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => '#ffff00',
		'choices'     => [
			'form_component' => 'RgbaColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is RgbaStringColorPicker.
 *
 * The saved value will be an rgba string.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * "rgba(255, 255, 45, 0.5)"
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_rgba_string',
		'label'       => __( 'v4 — form_component — RgbaStringColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is RgbaStringColorPicker. The saved value will be a string.', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => '#ffff00',
		'choices'     => [
			'form_component' => 'RgbaStringColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is HslColorPicker.
 *
 * The saved value will be an hsl array.
 * The format is following the `react-colorful` and `colord` formatting (int, without the percent sign), for instance:
 * [
 *   'h' => 180,
 *   's' => 40, // Is int, without the percent sign.
 *   'l' => 50, // Is int, without the percent sign.
 * ]
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_hsl',
		'label'       => __( 'v4 — form_component — HslColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is HslColorPicker. The saved value will be an array', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => 'hsl(206, 23%, 25%)',
		'choices'     => [
			'form_component' => 'HslColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is HslStringColorPicker.
 *
 * The saved value will be an hsl string.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * "hsl(180, 40%, 50%)"
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_hsl_string',
		'label'       => __( 'v4 — form_component — HslStringColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is HslStringColorPicker. The saved value will be a string', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => 'hsl(206, 23%, 25%)',
		'choices'     => [
			'form_component' => 'HslStringColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is HslaColorPicker.
 *
 * The saved value will be an hsla array.
 * The format is following the `react-colorful` and `colord` formatting (int, without the percent sign), for instance:
 * [
 *   'h' => 180,
 *   's' => 40, // Is int, without the percent sign.
 *   'l' => 50, // Is int, without the percent sign.
 *   'a' => 0.5
 * ]
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_hsla',
		'label'       => __( 'v4 — form_component — HslaColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is HslaColorPicker. The saved value will be an array', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => 'hsla(206, 23%, 25%, 0.7)',
		'choices'     => [
			'form_component' => 'HslaColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * Color control with form_component value is HslaStringColorPicker.
 *
 * The saved value will be an hsla string.
 * The format is following the `react-colorful` and `colord` formatting, for instance:
 * "hsla(180, 40%, 50%, 0.5)"
 */
new \KirkiClassic\Field\Color(
	[
		'settings'    => 'kirki_classic_demo_color_form_component_hsla_string',
		'label'       => __( 'v4 — form_component — HslaStringColorPicker', 'kirki-classic' ),
		'description' => esc_html__( 'This is a color control with form_component value is HslaStringColorPicker. The saved value will be a string', 'kirki-classic' ),
		'section'     => 'color_advanced_section',
		'default'     => 'hsla(206, 23%, 25%, 0.7)',
		'choices'     => [
			'form_component' => 'HslaStringColorPicker',
		],
		'transport'   => 'postMessage',
	]
);

/**
 * DateTime Control.
 */
new \KirkiClassic\Field\Date(
	[
		'settings'    => 'kirki_classic_demo_date',
		'label'       => esc_html__( 'Date Control', 'kirki-classic' ),
		'description' => esc_html__( 'This is a date control.', 'kirki-classic' ),
		'section'     => 'date_section',
		'default'     => '',
	]
);

new \KirkiClassic\Field\Date(
	[
		'settings'    => 'kirki_classic_demo_date_2',
		'label'       => esc_html__( 'Date Control 2', 'kirki-classic' ),
		'description' => esc_html__( 'This is a date control.', 'kirki-classic' ),
		'section'     => 'date_section',
		'default'     => '',
	]
);

/**
 * Editor Controls
 */
new \KirkiClassic\Field\Editor(
	[
		'settings'    => 'kirki_classic_demo_editor_1',
		'label'       => esc_html__( 'First Editor Control', 'kirki-classic' ),
		'description' => esc_html__( 'This is an editor control.', 'kirki-classic' ),
		'section'     => 'editor_section',
		'default'     => '',
	]
);

new \KirkiClassic\Field\Editor(
	[
		'settings'    => 'kirki_classic_demo_editor_2',
		'label'       => esc_html__( 'Second Editor Control', 'kirki-classic' ),
		'description' => esc_html__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'kirki-classic' ),
		'section'     => 'editor_section',
		'default'     => esc_html__( 'Default Text', 'kirki-classic' ),
	]
);

/**
 * Color-Palette Controls.
 *
 * @link https://docs.themeum.com/kirki/controls/color-palette/
 */
new \KirkiClassic\Field\Color_Palette(
	[
		'settings'    => 'kirki_classic_demo_color_palette_simple',
		'label'       => esc_html__( 'Simple Colors Set', 'kirki-classic' ),
		'description' => esc_html__( 'With default size (28). The `size` here is inner size (without border)', 'kirki-classic' ),
		'section'     => 'color_palette_section',
		'default'     => '#888888',
		'transport'   => 'postMessage',
		'choices'     => [
			'colors' => [ '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ],
			'style'  => 'round',
		],
	]
);

new \KirkiClassic\Field\Color_Palette(
	[
		'settings'    => 'kirki_classic_demo_color_palette_material_all',
		'label'       => esc_html__( 'Material Design Colors — All', 'kirki-classic' ),
		'description' => esc_html__( 'Showing all material design colors using `round` shape and size is 17', 'kirki-classic' ),
		'section'     => 'color_palette_section',
		'default'     => '#D1C4E9',
		'transport'   => 'postMessage',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'all' ),
			'shape'  => 'round',
			'size'   => 17,
		],
	]
);

new \KirkiClassic\Field\Color_Palette(
	[
		'settings'    => 'kirki_classic_demo_color_palette_material_primary',
		'label'       => esc_html__( 'Material Design Colors — Primary', 'kirki-classic' ),
		'description' => esc_html__( 'Showing primary material design colors', 'kirki-classic' ),
		'section'     => 'color_palette_section',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		],
	]
);

new \KirkiClassic\Field\Color_Palette(
	[
		'settings'    => 'kirki_classic_demo_color_palette_material_red',
		'label'       => esc_html__( 'Material Design Colors — Red', 'kirki-classic' ),
		'description' => esc_html__( 'Showing red material design colors', 'kirki-classic' ),
		'section'     => 'color_palette_section',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'red' ),
			'size'   => 16,
		],
	]
);

new \KirkiClassic\Field\Color_Palette(
	[
		'settings'    => 'kirki_classic_demo_color_palette_a100',
		'label'       => esc_html__( 'Material Design Colors — A100', 'kirki-classic' ),
		'description' => esc_html__( 'Showing "A100" variant of material design colors', 'kirki-classic' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF80AB',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'A100' ),
			'size'   => 60,
			'style'  => 'round',
		],
	]
);

KirkiClassic::add_field(
	'kirki_classic_demo_config',
	[
		'type'        => 'color-palette',
		'settings'    => 'kirki_classic_demo_color_palette_old',
		'label'       => 'The Old Way',
		'description' => 'Using `KirkiClassic::add_field` in round shape',
		'section'     => 'color_palette_section',
		'transport'   => 'postMessage',
		'choices'     => [
			'colors' => [ '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ],
			'style'  => 'round',
		],
	]
);

add_action(
	'customize_register',
	function( $wp_customize ) {
		/**
		 * The custom control class
		 */
		class KirkiClassic_Demo_Custom_Control extends KirkiClassic\Control\Base {
			public $type = 'kirki-classic-demo-custom-control';

			public function render_content() {

				$saved_value = $this->value();
				?>

				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-description description"><?php echo esc_html( $this->description ); ?></span>

				<div class="kirki-classic-demo-custom-control">
					<div class="slider"></div>
					<input type="text" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $saved_value ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				</div>

				<?php
			}
		}

		// Register our custom control with KirkiClassic.
		add_filter(
			'kirki_classic_control_types',
			function( $controls ) {
				$controls['kirki-classic-demo-custom-control'] = 'KirkiClassic_Demo_Custom_Control';
				return $controls;
			}
		);

	}
);

KirkiClassic::add_field(
	'kirki_classic_demo_config',
	[
		'type'        => 'kirki-classic-demo-custom-control',
		'settings'    => 'kirki_classic_demo_custom_control_old_way',
		'label'       => esc_html__( 'Custom Control', 'kirki-classic' ),
		'description' => 'A custom control demo, registered by extending `KirkiClassic\\Control\\Base` class.',
		'section'     => 'custom_section',
		'transport'   => 'postMessage',
	]
);

/**
 * Dashicons control.
 *
 * @link https://docs.themeum.com/kirki/controls/dashicons/
 */
new \KirkiClassic\Field\Dashicons(
	[
		'settings'    => 'kirki_classic_demo_dashicons_setting_0',
		'label'       => esc_html__( 'Dashicons Control', 'kirki-classic' ),
		'description' => esc_html__( 'Using a custom array of dashicons', 'kirki-classic' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
		'choices'     => [
			'menu',
			'admin-site',
			'dashboard',
			'admin-post',
			'admin-media',
			'admin-links',
			'admin-page',
		],
	]
);

new \KirkiClassic\Field\Dashicons(
	[
		'settings'    => 'kirki_classic_demo_dashicons_setting_1',
		'label'       => esc_html__( 'All Dashicons', 'kirki-classic' ),
		'description' => esc_html__( 'Showing all dashicons', 'kirki-classic' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
	]
);

/**
 * Dimension Control.
 */
new \KirkiClassic\Field\Dimension(
	[
		'settings'    => 'kirki_classic_demo_dimension_0',
		'label'       => esc_html__( 'Dimension Control', 'kirki-classic' ),
		'description' => esc_html__( 'A simple dimension control.', 'kirki-classic' ),
		'section'     => 'dimension_section',
		'default'     => '10px',
		'choices'     => [
			'accept_unitless' => true,
		],
	]
);

/**
 * Dimensions Control.
 */
new \KirkiClassic\Field\Dimensions(
	[
		'settings'    => 'kirki_classic_demo_dimensions_0',
		'label'       => esc_html__( 'Dimensions Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of dimensions control with 2 fields.', 'kirki-classic' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'width'  => '100px',
			'height' => '100px',
		],
	]
);

new \KirkiClassic\Field\Dimensions(
	[
		'settings'    => 'kirki_classic_demo_dimensions_1',
		'label'       => esc_html__( 'Dimension Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of dimensions control with 4 fields.', 'kirki-classic' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		],
	]
);

new \KirkiClassic\Field\Dimensions(
	[
		'settings'    => 'kirki_classic_demo_padding',
		'label'       => esc_html__( 'Padding Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of padding controls with 3 fields.', 'kirki-classic' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'top'        => '1em',
			'bottom'     => '10rem',
			'horizontal' => '1vh',
		],
	]
);

new \KirkiClassic\Field\Dimensions(
	[
		'settings'    => 'kirki_classic_demo_spacing',
		'label'       => esc_html__( 'Spacing Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of spacing controls with 4 fields.', 'kirki-classic' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'top'    => '1em',
			'bottom' => '10rem',
			'left'   => '1vh',
			'right'  => '10px',
		],
	]
);

/**
 * Dropdown-pages Control.
 */
new \KirkiClassic\Field\Dropdown_Pages(
	[
		'settings'    => 'kirki_classic_demo_dropdown_pages',
		'label'       => esc_html__( 'Dropdown Pages Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of dropdown pages control.', 'kirki-classic' ),
		'section'     => 'dropdown_pages_section',
		'default'     => [
			'width'  => '100px',
			'height' => '100px',
		],
	]
);

/**
 * Generic Controls.
 */
new \KirkiClassic\Field\Text(
	[
		'settings'        => 'kirki_classic_demo_generic_text',
		'label'           => esc_html__( 'Generic Control — Text Field', 'kirki-classic' ),
		'description'     => esc_html__( 'The demo of this control has partial refresh with transport is postMessage', 'kirki-classic' ),
		'section'         => 'generic_section',
		'transport'       => 'postMessage',
		'default'         => '',
		'partial_refresh' => [
			'generic_text_refresh' => [
				'selector'        => '.kirki-partial-refresh-demo',
				'render_callback' => function() {
					$value = get_theme_mod( 'kirki_classic_demo_generic_text' );
					return $value ? 'value of Generic URL Field control is: ' . $value : '';
				},
			],
		],
	]
);

new \KirkiClassic\Field\URL(
	[
		'settings'        => 'kirki_classic_demo_generic_url',
		'label'           => esc_html__( 'Generic Control — URL Field', 'kirki-classic' ),
		'description'     => esc_html__( 'The demo of this control has partial refresh without transport is defined', 'kirki-classic' ),
		'section'         => 'generic_section',
		'default'         => '',
		'partial_refresh' => [
			'generic_text_refresh2' => [
				'selector'        => '.kirki-partial-refresh-demo2',
				'render_callback' => function() {
					$value = get_theme_mod( 'kirki_classic_demo_generic_url' );
					return $value ? 'value of Generic URL Field control is: ' . $value : '';
				},
			],
		],
	]
);

new \KirkiClassic\Field\Textarea(
	[
		'settings'    => 'kirki_classic_demo_generic_textarea',
		'label'       => esc_html__( 'Generic Control — Textarea Field', 'kirki-classic' ),
		'description' => esc_html__( 'Description', 'kirki-classic' ),
		'section'     => 'generic_section',
		'default'     => '',
	]
);

new \KirkiClassic\Field\Generic(
	[
		'settings'    => 'kirki_classic_demo_generic_custom',
		'label'       => esc_html__( 'Generic Control — Custom Input.', 'kirki-classic' ),
		'description' => esc_html__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'kirki-classic' ),
		'section'     => 'generic_section',
		'default'     => '',
		'choices'     => [
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		],
	]
);

/**
 * Image Control.
 */
new \KirkiClassic\Field\Image(
	[
		'settings'    => 'kirki_classic_demo_image_url',
		'label'       => esc_html__( 'Image Control (URL)', 'kirki-classic' ),
		'description' => esc_html__( 'The saved value will be the URL.', 'kirki-classic' ),
		'section'     => 'image_section',
		'default'     => '',
	]
);

new \KirkiClassic\Field\Image(
	[
		'settings'    => 'kirki_classic_demo_image_id',
		'label'       => esc_html__( 'Image Control (ID)', 'kirki-classic' ),
		'description' => esc_html__( 'The saved value will an ID.', 'kirki-classic' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => [
			'save_as' => 'id',
		],
	]
);

new \KirkiClassic\Field\Image(
	[
		'settings'    => 'kirki_classic_demo_image_array',
		'label'       => esc_html__( 'Image Control (array)', 'kirki-classic' ),
		'description' => esc_html__( 'The saved value will an array.', 'kirki-classic' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => [
			'save_as' => 'array',
		],
	]
);

/**
 * Upload control.
 */
new \KirkiClassic\Field\Upload(
	[
		'settings'    => 'kirki_classic_demo_upload_url',
		'label'       => esc_html__( 'Upload Control (URL)', 'kirki-classic' ),
		'description' => esc_html__( 'The saved value will the URL.', 'kirki-classic' ),
		'section'     => 'upload_section',
		'default'     => '',
		'transport'   => 'postMessage',
	]
);

/**
 * Multicheck Control.
 */
new \KirkiClassic\Field\Multicheck(
	[
		'settings' => 'kirki_classic_demo_multicheck',
		'label'    => esc_html__( 'Multickeck Control', 'kirki-classic' ),
		'section'  => 'multicheck_section',
		'default'  => [ 'option-1', 'option-3', 'option-4' ],
		'priority' => 10,
		'choices'  => [
			'option-1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option-2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option-3' => esc_html__( 'Option 3', 'kirki-classic' ),
			'option-4' => esc_html__( 'Option 4', 'kirki-classic' ),
			'option-5' => esc_html__( 'Option 5', 'kirki-classic' ),
		],
	]
);

/**
 * Multicolor Control.
 */
new \KirkiClassic\Field\Multicolor(
	[
		'settings'  => 'kirki_classic_demo_multicolor',
		'label'     => esc_html__( 'Multicolor Control', 'kirki-classic' ),
		'section'   => 'multicolor_section',
		'priority'  => 10,
		'transport' => 'postMessage',
		'choices'   => [
			'link'      => esc_html__( 'Link Color', 'kirki-classic' ),
			'hover'     => esc_html__( 'And this is hover color with long label so you know how it is displayed.', 'kirki-classic' ),
			'active'    => esc_html__( 'Active Color', 'kirki-classic' ),
			'another1'  => esc_html__( 'Another color 1', 'kirki-classic' ),
			'another2'  => esc_html__( 'Another color 2', 'kirki-classic' ),
			'another3'  => esc_html__( 'Another color 3', 'kirki-classic' ),
			'another4'  => esc_html__( 'Another color 4', 'kirki-classic' ),
			'another5'  => esc_html__( 'Another color 5', 'kirki-classic' ),
			'another6'  => esc_html__( 'Another color 6', 'kirki-classic' ),
			'another7'  => esc_html__( 'Another color 7', 'kirki-classic' ),
			'another8'  => esc_html__( 'Another color 8', 'kirki-classic' ),
			'another9'  => esc_html__( 'Another color 9', 'kirki-classic' ),
			'another10' => esc_html__( 'Another color 10', 'kirki-classic' ),
			'another11' => esc_html__( 'Another color 11', 'kirki-classic' ),
			'another12' => esc_html__( 'Another color 12', 'kirki-classic' ),
			'another13' => esc_html__( 'Another color 13', 'kirki-classic' ),
			'another14' => esc_html__( 'Another color 14', 'kirki-classic' ),
			'another15' => esc_html__( 'Another color 15', 'kirki-classic' ),
		],
		'alpha'     => true,
		'default'   => [
			'link'   => '#0088cc',
			'hover'  => '#00aaff',
			'active' => '#00ffff',
		],
	]
);

/**
 * Number Control.
 */
new \KirkiClassic\Field\Number(
	[
		'settings' => 'kirki_classic_demo_number',
		'label'    => esc_html__( 'Number Control', 'kirki-classic' ),
		'section'  => 'number_section',
		'priority' => 10,
		'choices'  => [
			'min'  => -5,
			'max'  => 5,
			'step' => 1,
		],
	]
);

/**
 * Palette Control.
 */
new \KirkiClassic\Field\Palette(
	array(
		'settings' => 'kirki_classic_demo_palette',
		'label'    => esc_html__( 'Control Palette', 'kirki-classic' ),
		'section'  => 'palette_section',
		'default'  => 'blue',
		'choices'  => array(
			'a200'  => KirkiClassic_Helper::get_material_design_colors( 'A200' ),
			'blue'  => KirkiClassic_Helper::get_material_design_colors( 'blue' ),
			'green' => array( '#E8F5E9', '#C8E6C9', '#A5D6A7', '#81C784', '#66BB6A', '#4CAF50', '#43A047', '#388E3C', '#2E7D32', '#1B5E20', '#B9F6CA', '#69F0AE', '#00E676', '#00C853' ),
			'bnw'   => array( '#000000', '#ffffff' ),
		),
	)
);

/**
 * Radio Control.
 */
new \KirkiClassic\Field\Radio(
	[
		'settings'    => 'kirki_classic_demo_radio',
		'label'       => esc_html__( 'Radio Control', 'kirki-classic' ),
		'description' => esc_html__( 'The description here.', 'kirki-classic' ),
		'section'     => 'radio_section',
		'default'     => 'option-3',
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option-2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option-3' => esc_html__( 'Option 3', 'kirki-classic' ),
			'option-4' => esc_html__( 'Option 4', 'kirki-classic' ),
			'option-5' => esc_html__( 'Option 5', 'kirki-classic' ),
		],
	]
);

/**
 * Radio-Buttonset Control.
 */
new \KirkiClassic\Field\Radio_Buttonset(
	[
		'settings'    => 'kirki_classic_demo_radio_buttonset',
		'label'       => esc_html__( 'Radio-Buttonset Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of radio-buttonset control.', 'kirki-classic' ),
		'section'     => 'radio_buttonset_section',
		'default'     => 'option-2',
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option-2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option-3' => esc_html__( 'Option 3', 'kirki-classic' ),
		],
	]
);

/**
 * Radio-Image Control.
 */
new \KirkiClassic\Field\Radio_Image(
	[
		'settings'    => 'kirki_classic_demo_radio_image',
		'label'       => esc_html__( 'Radio-Image Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of radio image control.', 'kirki-classic' ),
		'section'     => 'radio_image_section',
		'default'     => 'travel',
		'choices'     => [
			'moto'    => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-moto.png',
			'cossack' => 'https://raw.githubusercontent.com/templatemonster/cossack-wapuula/master/cossack-wapuula.png',
			'travel'  => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-travel.png',
		],
	]
);

/**
 * Repeater Control.
 */
new \KirkiClassic\Field\Repeater(
	[
		'settings'    => 'kirki_classic_demo_repeater',
		'label'       => esc_html__( 'Repeater Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of repeater control.', 'kirki-classic' ),
		'section'     => 'repeater_section',
		'default'     => [
			[
				'link_text'   => esc_html__( 'Kirki Classic Site', 'kirki-classic' ),
				'link_url'    => 'https://www.themeum.com',
				'link_target' => '_self',
				'checkbox'    => false,
			],
			[
				'link_text'   => esc_html__( 'Kirki Classic Repository', 'kirki-classic' ),
				'link_url'    => 'https://github.com/themeum/kirki',
				'link_target' => '_self',
				'checkbox'    => false,
			],
		],
		'fields'      => [
			'link_text'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link Text', 'kirki-classic' ),
				'description' => esc_html__( 'This will be the label for your link', 'kirki-classic' ),
				'default'     => '',
			],
			'link_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link URL', 'kirki-classic' ),
				'description' => esc_html__( 'This will be the link URL', 'kirki-classic' ),
				'default'     => '',
			],
			'link_target' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Link Target', 'kirki-classic' ),
				'description' => esc_html__( 'This will be the link target', 'kirki-classic' ),
				'default'     => '_self',
				'choices'     => [
					'_blank' => esc_html__( 'New Window', 'kirki-classic' ),
					'_self'  => esc_html__( 'Same Frame', 'kirki-classic' ),
				],
			],
			'checkbox'    => [
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Checkbox', 'kirki-classic' ),
				'default' => false,
			],
		],
	]
);

/**
 * Select Control.
 */
new \KirkiClassic\Field\Select(
	[
		'settings'    => 'kirki_classic_demo_select',
		'label'       => esc_html__( 'Select Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of single mode select control.', 'kirki-classic' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'placeholder' => esc_html__( 'Select an option', 'kirki-classic' ),
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option-2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option-3' => esc_html__( 'Option 3', 'kirki-classic' ),
			'option-4' => esc_html__( 'Option 4', 'kirki-classic' ),
			'option-5' => esc_html__( 'Option 5', 'kirki-classic' ),
		],
	]
);

new \KirkiClassic\Field\Select(
	[
		'settings'    => 'kirki_classic_demo_select_multiple',
		'label'       => esc_html__( 'Select Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of multiple mode select control.', 'kirki-classic' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'multiple'    => 3,
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option-2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option-3' => esc_html__( 'Option 3', 'kirki-classic' ),
			'option-4' => esc_html__( 'Option 4', 'kirki-classic' ),
			'option-5' => esc_html__( 'Option 5', 'kirki-classic' ),
		],
	]
);

/**
 * Slider Control.
 */
new \KirkiClassic\Field\Slider(
	[
		'settings'    => 'kirki_classic_demo_slider',
		'label'       => esc_html__( 'Slider Control', 'kirki-classic' ),
		'description' => esc_html__( 'Sample of slider control.', 'kirki-classic' ),
		'section'     => 'slider_section',
		'default'     => '10',
		'transport'   => 'postMessage',
		'tooltip'     => esc_html__( 'This is the tooltip', 'kirki-classic' ),
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	]
);

KirkiClassic::add_field(
	'kirki_classic_demo_config',
	[
		'type'        => 'slider',
		'settings'    => 'kirki_classic_demo_slider_old',
		'label'       => esc_html__( 'Slider Control — Using Old Way', 'kirki-classic' ),
		'description' => 'Added using `KirkiClassic::add_field` (the old KirkiClassic API)',
		'section'     => 'slider_section',
		'transport'   => 'postMessage',
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		],
	]
);

/**
 * Sortable control.
 */
new \KirkiClassic\Field\Sortable(
	[
		'settings' => 'kirki_classic_demo_sortable',
		'label'    => __( 'This is a sortable control.', 'kirki-classic' ),
		'section'  => 'sortable_section',
		'default'  => [ 'option3', 'option1', 'option4' ],
		'choices'  => [
			'option1' => esc_html__( 'Option 1', 'kirki-classic' ),
			'option2' => esc_html__( 'Option 2', 'kirki-classic' ),
			'option3' => esc_html__( 'Option 3', 'kirki-classic' ),
			'option4' => esc_html__( 'Option 4', 'kirki-classic' ),
			'option5' => esc_html__( 'Option 5', 'kirki-classic' ),
			'option6' => esc_html__( 'Option 6', 'kirki-classic' ),
		],
	]
);

/**
 * Switch control.
 */
new \KirkiClassic\Field\Checkbox_Switch(
	[
		'settings'    => 'kirki_classic_demo_switch',
		'label'       => esc_html__( 'Switch Field', 'kirki-classic' ),
		'description' => esc_html__( 'Simple switch control', 'kirki-classic' ),
		'section'     => 'switch_section',
		'transport'   => 'postMessage',
		'default'     => true,
	]
);

new \KirkiClassic\Field\Checkbox_Switch(
	[
		'settings'        => 'kirki_classic_demo_switch_custom_label',
		'label'           => esc_html__( 'Switch Field — With custom labels', 'kirki-classic' ),
		'description'     => esc_html__( 'Switch control using custom labels', 'kirki-classic' ),
		'section'         => 'switch_section',
		'default'         => true,
		'choices'         => [
			'on'  => esc_html__( 'Enabled', 'kirki-classic' ),
			'off' => esc_html__( 'Disabled', 'kirki-classic' ),
		],
		'active_callback' => [
			[
				'setting'  => 'kirki_classic_demo_switch',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);

/**
 * Toggle control.
 */
KirkiClassic::add_field(
	'kirki_classic_demo_config',
	[
		'type'        => 'toggle',
		'settings'    => 'kirki_classic_demo_toggle_setting',
		'label'       => esc_html__( 'Toggle Field', 'kirki-classic' ),
		'description' => esc_html__( 'Toggle is just utilizing switch control but aligned horizontally & without the text', 'kirki-classic' ),
		'section'     => 'toggle_section',
		'default'     => '1',
		'priority'    => 10,
		'transport'   => 'postMessage',
	]
);

/**
 * Typography Control.
 */
new \KirkiClassic\Field\Typography(
	[
		'settings'    => 'kirki_classic_demo_kirki_classic_typography_setting',
		'label'       => esc_html__( 'Typography Control', 'kirki-classic' ),
		'description' => esc_html__( 'The full set of options.', 'kirki-classic' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'postMessage',
		'default'     => [
			'font-family'     => 'Roboto',
			'variant'         => 'regular',
			'font-style'      => 'normal',
			'color'           => '#333333',
			'font-size'       => '14px',
			'line-height'     => '1.5',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => 'left',
			'margin-top'      => '0',
			'margin-bottom'   => '0',
		],
		'output'      => [
			[
				'element' => 'body, p',
			],
		],
		'choices'     => [
			'fonts' => [
				'google'   => [ 'popularity', 60 ],
				'families' => [
					'custom' => [
						'text'     => 'My Custom Fonts (demo only)',
						'children' => [
							[
								'id'   => 'helvetica-neue',
								'text' => 'Helvetica Neue',
							],
							[
								'id'   => 'linotype-authentic',
								'text' => 'Linotype Authentic',
							],
						],
					],
				],
				'variants' => [
					'helvetica-neue'     => [ 'regular', '900' ],
					'linotype-authentic' => [ 'regular', '100', '300' ],
				],
			],
		],
	]
);

new \KirkiClassic\Field\Typography(
	[
		'settings'    => 'kirki_classic_demo_typography_setting_1',
		'label'       => esc_html__( 'Typography Control', 'kirki-classic' ),
		'description' => esc_html__( 'Just the font-family and font-weight.', 'kirki-classic' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family' => 'Roboto',
		],
		'output'      => [
			[
				'element' => [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ],
			],
		],
	]
);

/**
 * Example function that creates a control containing the available sidebars as choices.
 *
 * @return void
 */
function kirki_classic_sidebars_select_example() {
	$sidebars = [];
	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) {
		$sidebars = $GLOBALS['wp_registered_sidebars'];
	}
	$sidebars_choices = [];
	foreach ( $sidebars as $sidebar ) {
		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name'];
	}
	if ( ! class_exists( 'KirkiClassic' ) ) {
		return;
	}
	new \KirkiClassic\Field\Select(
		[
			'settings'    => 'kirki_classic_demo_sidebars_select',
			'label'       => esc_html__( 'Sidebars Select', 'kirki-classic' ),
			'description' => esc_html__( 'An example of how to implement sidebars selection.', 'kirki-classic' ),
			'section'     => 'select_section',
			'default'     => 'primary',
			'choices'     => $sidebars_choices,
			'priority'    => 30,
		]
	);
}
add_action( 'init', 'kirki_classic_sidebars_select_example', 999 );
