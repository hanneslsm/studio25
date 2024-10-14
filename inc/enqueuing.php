<?php

/**
 * Enqueue files
 *
 * @package prolooks
 * @since 0.1
 */

/**
 * Enqueue assets for both frontend and block editor.
 */
function studio25_enqueue_assets() {
    $asset_file = include( get_template_directory() . '/public/main.asset.php' );

    // Enqueue script
    wp_enqueue_script(
        'studio25-scripts',
        get_template_directory_uri() . '/public/main.js',
        $asset_file['dependencies'],
        $asset_file['version'],
        true  // Load in footer
    );

    // Enqueue style
    wp_enqueue_style(
        'studio25-styles',
        get_template_directory_uri() . '/public/main.css',
        array(),
        $asset_file['version']
    );
}
add_action( 'wp_enqueue_scripts', 'studio25_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'studio25_enqueue_assets' );
