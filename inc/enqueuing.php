<?php

/**
 * Enqueue files
 *
 * @package prolooks
 * @since 0.1
 */

function studio25_enqueue_block_assets() {
    $public_dir = get_template_directory() . '/public/';
    $public_uri = get_template_directory_uri() . '/public/';

    if ( ! is_dir( $public_dir ) ) {
        return;
    }

    // Function to recursively get all files with specific extensions
    if ( ! function_exists( 'studio25_get_files_recursive' ) ) {
        function studio25_get_files_recursive( $dir, $extensions ) {
            $files = array();
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator( $dir )
            );
            foreach ( $iterator as $file ) {
                if ( $file->isFile() && in_array( $file->getExtension(), $extensions ) ) {
                    $files[] = $file;
                }
            }
            return $files;
        }
    }

    // Enqueue JS files
    $js_files = studio25_get_files_recursive( $public_dir, array( 'js' ) );
    foreach ( $js_files as $file ) {
        $relative_path = str_replace( $public_dir, '', $file->getPathname() );
        $handle = 'studio25-' . str_replace( array( '/', '\\', '.' ), '-', $relative_path );

        // Load the .asset.php file
        $asset_file = $file->getPathname() . '.asset.php';
        if ( file_exists( $asset_file ) ) {
            $asset = include( $asset_file );
        } else {
            $asset = array(
                'dependencies' => array(),
                'version'      => filemtime( $file->getPathname() ),
            );
        }

        wp_enqueue_script(
            $handle,
            $public_uri . $relative_path,
            $asset['dependencies'],
            $asset['version'],
            true
        );
    }

    // Enqueue CSS files
    $css_files = studio25_get_files_recursive( $public_dir, array( 'css' ) );
    foreach ( $css_files as $file ) {
        $relative_path = str_replace( $public_dir, '', $file->getPathname() );
        $handle = 'studio25-' . str_replace( array( '/', '\\', '.' ), '-', $relative_path );

        wp_enqueue_style(
            $handle,
            $public_uri . $relative_path,
            array(), // Add dependencies if necessary
            filemtime( $file->getPathname() )
        );
    }
}
add_action( 'enqueue_block_assets', 'studio25_enqueue_block_assets' );
