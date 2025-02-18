<?php

/**
 * Patterns Setup
 *
 * @package studio25
 * @since 0.7
 */


/**
 * Remove core patterns.
 * @link https://developer.wordpress.org/themes/patterns/registering-patterns/#removing-core-patterns
 */
add_action('after_setup_theme', 'studio25_remove_core_patterns');

function studio25_remove_core_patterns()
{
    remove_theme_support('core-block-patterns');
}

/**
 * Disable remote patterns
 * @link https://developer.wordpress.org/themes/patterns/registering-patterns/#disabling-remote-patterns
 */
add_filter('should_load_remote_block_patterns', '__return_false');


/**
 * Register custom pattern categories
 * @link https://developer.wordpress.org/themes/patterns/registering-patterns/#registering-a-pattern-category
 */

add_action('init', 'studio25_register_pattern_categories');

function studio25_register_pattern_categories()
{
    register_block_pattern_category(
        'studio25/content',
        array(
            'label'       => __('Content', 'studio25'),
            'description' => __('Default basic heading & text layouts.', 'studio25')
        )
    );
}
