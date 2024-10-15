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



// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/app.js', array('gsap-js'), false, true );
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );
