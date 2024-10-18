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
function studio25_enqueue_block_assets() {
    $asset_file = include( get_template_directory() . '/public/main.asset.php' );

    // Enqueue frontend and block editor style
    wp_enqueue_style(
        'studio25-block-styles',
        get_template_directory_uri() . '/public/main.css',
        array(),
        $asset_file['version']
    );

    // Enqueue frontend and block editor script
    wp_enqueue_script(
        'studio25-block-scripts',
        get_template_directory_uri() . '/public/main.js',
        $asset_file['dependencies'],
        $asset_file['version'],
        true  // Load in footer
    );
}
add_action( 'enqueue_block_assets', 'studio25_enqueue_block_assets' );


