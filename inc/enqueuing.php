<?php
/**
 * Enqueue frontend and editor styles
 *
 * @package studio25
 * @since 0.1.0
 */

/**
* global.css and global.js are loaded for both frontend and editor.
* screen.css is only loaded on the frontend.
* editor.css is exclusively loaded in the block editor.
*/


function studio25_enqueue_scripts() {
    // Enqueue the global CSS for both the frontend and editor
    $global_style_path = get_template_directory_uri() . '/build/css/global.css';
    $global_style_asset = require get_template_directory() . '/build/css/global.asset.php';

    wp_enqueue_style(
        'studio25-global-style',
        $global_style_path,
        $global_style_asset['dependencies'],
        $global_style_asset['version']
    );

    // Enqueue the global JavaScript for both the frontend and editor
    $global_script_path = get_template_directory_uri() . '/build/js/global.js';
    $global_script_asset = require get_template_directory() . '/build/js/global.asset.php';

    wp_enqueue_script(
        'studio25-global-script',
        $global_script_path,
        $global_script_asset['dependencies'],
        $global_script_asset['version'],
        true // Load in the footer
    );
}
add_action('enqueue_block_assets', 'studio25_enqueue_scripts');

function studio25_enqueue_frontend_styles() {
    // Enqueue the screen CSS only on the frontend
    $screen_style_path = get_template_directory_uri() . '/build/css/screen.css';
    $screen_style_asset = require get_template_directory() . '/build/css/screen.asset.php';

    wp_enqueue_style(
        'studio25-screen-style',
        $screen_style_path,
        $screen_style_asset['dependencies'],
        $screen_style_asset['version']
    );
}
add_action('wp_enqueue_scripts', 'studio25_enqueue_frontend_styles');

function studio25_enqueue_editor_styles() {
    // Enqueue the editor CSS only in the block editor
    $editor_style_path = get_template_directory_uri() . '/build/css/editor.css';
    $editor_style_asset = require get_template_directory() . '/build/css/editor.asset.php';

    wp_enqueue_style(
        'studio25-editor-style',
        $editor_style_path,
        $editor_style_asset['dependencies'],
        $editor_style_asset['version']
    );
}
add_action('enqueue_block_editor_assets', 'studio25_enqueue_editor_styles');


function studio25_enqueue_block_styles() {
    // Define the directory containing block styles
    $blocks_dir = get_theme_file_path( 'build/css/blocks/' );

    // Use glob() to get all .css files in the blocks directory
    $block_styles = glob( $blocks_dir . '*.css' );

    // Iterate over each stylesheet
    foreach ( $block_styles as $style_path ) {
        // Extract the block name from the filename
        $filename = basename( $style_path, '.css' );

        // Replace only the first hyphen with a slash
        $block_name = preg_replace( '/-/', '/', $filename, 1 );

        // Construct the URL for the stylesheet
        $style_uri = get_theme_file_uri( 'build/css/blocks/' . $filename . '.css' );

        // Enqueue the block style
        wp_enqueue_block_style(
            $block_name,
            [
                'handle' => 'studio25-' . $filename . '-style',
                'src'    => $style_uri,
            ]
        );
    }
}
add_action( 'init', 'studio25_enqueue_block_styles' );

