<?php

/**
 * Enqueue files
 *
 * @package prolooks
 * @since 0.1
 */




/**
 * Enqueue Editor assets.
 */
function studio25_enqueue_editor_assets()
{
	$asset_file = include(get_template_directory() . '/build/index.asset.php');

	wp_enqueue_script(
		'studio25-editor-scripts',
		get_template_directory_uri() . '/build/index.js',
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_enqueue_style(
		'studio25-editor-styles',
		get_template_directory_uri() . '/build/index.css',
		array(),
		$asset_file['version']
	);
}
add_action('enqueue_block_editor_assets', 'studio25_enqueue_editor_assets');
