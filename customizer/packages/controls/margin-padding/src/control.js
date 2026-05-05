import "./control.scss";
import KirkiMarginPaddingControl from "./KirkiMarginPaddingControl";

// Register control type with Customizer.
wp.customize.controlConstructor["kirki-classic-margin"] = KirkiMarginPaddingControl;
wp.customize.controlConstructor["kirki-classic-padding"] = KirkiMarginPaddingControl;
