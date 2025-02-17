<?php

/**
 * Setup
 *
 * @package studio25
 * @since 0.1.0
 * @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
 */



if (!function_exists('studio25_setup')) :
	function studio25_setup()
	{
		// Make theme available for translation.
		load_theme_textdomain('studio25', get_template_directory() . '/languages');

		// Enqueue editor styles.
		add_editor_style('assets/css/editor-style.css');
	}
endif; // studio25_setup
add_action('after_setup_theme', 'studio25_setup');
