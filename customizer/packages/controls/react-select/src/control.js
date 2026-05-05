/* global wp */

import "./control.scss";

import KirkiSelectControl from './KirkiSelectControl';

// Register control type with Customizer.
wp.customize.controlConstructor['kirki-classic-react-select'] = KirkiSelectControl;
