# Kirki Classic #
**Tags:** customizer, options framework, theme, mods, toolkit
**Requires at least:** 5.3
**Tested up to:** 6.8
**Stable tag:** 5.2.3
**License:** MIT
**License URI:** https://opensource.org/licenses/MIT

A lightweight WordPress Customizer framework for theme developers — forked from Kirki at v5.2.3.

## Why this fork? ##

Kirki was once the go-to Customizer framework for WordPress theme developers. Over time, the project shifted toward becoming a full visual page builder — a direction most existing users never asked for.

Kirki Classic forks Kirki at v5.2.3, the last stable, lightweight release before that pivot. The goal is to keep the original Customizer-focused toolkit alive: no bloat, no builder, just a clean API for building theme options.

## Features ##

* 30+ custom Customizer controls
* Simplified field registration API
* Automatic CSS generation
* Automatic `postMessage` script generation
* Partial refresh support
* Conditional logic
* Google Fonts integration
* GDPR compliant

## Controls ##

Background, Code, Checkbox, Color, Color Palette, Dashicons, Date, Dimension, Dimensions, Dropdown Pages, Editor, Generic, Image, Link, Multicheck, Multicolor, Number, Radio, Radio Buttonset, Radio Image, Repeater, Select, Slider, Sortable, Switch, Text, Textarea, Toggle, Typography, Upload.

## Differences from Kirki ##

- Plugin slug and text domain: `kirki-classic`
- PHP namespace: `KirkiClassic` (instead of `Kirki`)
- Constants prefix: `KIRKI_CLASSIC_` (instead of `KIRKI_`)
- Function/hook prefix: `kirki_classic_` (instead of `kirki_`)

Kirki Classic can be installed alongside the original Kirki plugin without conflicts.

## Installation ##

Install as a standard WordPress plugin and activate. To bundle it in a theme or plugin, require `kirki-classic.php` directly from your code.

## Changelog ##

See [CHANGELOG.md](CHANGELOG.md) for the upstream history up to v5.2.3.
