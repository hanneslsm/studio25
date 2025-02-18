<?php
/**
 * Enqueue frontend and editor styles.
 *
 * @package studio25
 * @since 0.1.0
 */

/**
 * Enqueue global CSS and JavaScript for both the frontend and editor.
 */
function studio25_enqueue_scripts() {
	// Enqueue the global CSS.
	$global_style_path   = get_template_directory_uri() . '/build/css/global.css';
	$global_style_asset  = require get_template_directory() . '/build/css/global.asset.php';

	wp_enqueue_style(
		'studio25-global-style',
		$global_style_path,
		$global_style_asset['dependencies'],
		$global_style_asset['version']
	);

	// Enqueue the global JavaScript.
	$global_script_path   = get_template_directory_uri() . '/build/js/global.js';
	$global_script_asset  = require get_template_directory() . '/build/js/global.asset.php';

	wp_enqueue_script(
		'studio25-global-script',
		$global_script_path,
		$global_script_asset['dependencies'],
		$global_script_asset['version'],
		true
	);
}
add_action( 'enqueue_block_assets', 'studio25_enqueue_scripts' );

/**
 * Enqueue the screen CSS for the frontend.
 */
function studio25_enqueue_frontend_styles() {
	$screen_style_path   = get_template_directory_uri() . '/build/css/screen.css';
	$screen_style_asset  = require get_template_directory() . '/build/css/screen.asset.php';

	wp_enqueue_style(
		'studio25-screen-style',
		$screen_style_path,
		$screen_style_asset['dependencies'],
		$screen_style_asset['version']
	);
}
add_action( 'wp_enqueue_scripts', 'studio25_enqueue_frontend_styles' );

/**
 * Enqueue the editor CSS for the block editor.
 */
function studio25_enqueue_editor_styles() {
	$editor_style_path   = get_template_directory_uri() . '/build/css/editor.css';
	$editor_style_asset  = require get_template_directory() . '/build/css/editor.asset.php';

	wp_enqueue_style(
		'studio25-editor-style',
		$editor_style_path,
		$editor_style_asset['dependencies'],
		$editor_style_asset['version']
	);
}
add_action( 'enqueue_block_editor_assets', 'studio25_enqueue_editor_styles' );

/**
 * Enqueue individual block styles from the build/css/blocks directory.
 */
function studio25_enqueue_block_styles() {
	$blocks_dir   = get_theme_file_path( 'build/css/blocks/' );
	$block_styles = glob( $blocks_dir . '*.css' );

	if ( $block_styles ) {
		foreach ( $block_styles as $style_path ) {
			$filename   = basename( $style_path, '.css' );
			// Replace only the first hyphen with a slash for the block name.
			$block_name = preg_replace( '/-/', '/', $filename, 1 );
			$style_uri  = get_theme_file_uri( 'build/css/blocks/' . $filename . '.css' );

			wp_enqueue_block_style(
				$block_name,
				array(
					'handle' => 'studio25-' . $filename . '-style',
					'src'    => $style_uri,
				)
			);
		}
	}
}
add_action( 'init', 'studio25_enqueue_block_styles' );

/**
 * Enqueue styles from the build/css/styles folder.
 *
 * This includes:
 * - blocks.css : Bundled SCSS files for blocks.
 * - sections.css : Bundled SCSS files for sections.
 */
function studio25_enqueue_styles_folder_styles() {

	// Enqueue the blocks.css from the styles folder.
	$blocks_css_file   = get_template_directory() . '/build/css/styles/blocks.css';
	if ( file_exists( $blocks_css_file ) ) {
		$blocks_style_path = get_template_directory_uri() . '/build/css/styles/blocks.css';
		$blocks_asset_file = get_template_directory() . '/build/css/styles/blocks.asset.php';

		if ( file_exists( $blocks_asset_file ) ) {
			$blocks_style_asset = require $blocks_asset_file;
		} else {
			$blocks_style_asset = array(
				'dependencies' => array(),
				'version'      => filemtime( $blocks_css_file ),
			);
		}

		wp_enqueue_style(
			'studio25-styles-blocks',
			$blocks_style_path,
			$blocks_style_asset['dependencies'],
			$blocks_style_asset['version']
		);
	}

	// Enqueue the sections.css from the styles folder if it exists.
	$sections_css_file = get_template_directory() . '/build/css/styles/sections.css';
	if ( file_exists( $sections_css_file ) ) {
		$sections_style_path = get_template_directory_uri() . '/build/css/styles/sections.css';
		$sections_asset_file = get_template_directory() . '/build/css/styles/sections.asset.php';

		if ( file_exists( $sections_asset_file ) ) {
			$sections_style_asset = require $sections_asset_file;
		} else {
			$sections_style_asset = array(
				'dependencies' => array(),
				'version'      => filemtime( $sections_css_file ),
			);
		}

		wp_enqueue_style(
			'studio25-styles-sections',
			$sections_style_path,
			$sections_style_asset['dependencies'],
			$sections_style_asset['version']
		);
	}
}
add_action( 'wp_enqueue_scripts', 'studio25_enqueue_styles_folder_styles' );
