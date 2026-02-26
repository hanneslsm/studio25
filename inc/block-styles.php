<?php
/**
 * Register block-style variations and link them to the handles
 * created in enqueuing.php
 *
 * @package studio25
 */

add_action( 'init', 'studio25_register_block_style_variations', 10 );
function studio25_register_block_style_variations() {

	$block_styles = [
		'core/button' => [
			[ 'name' => 'brand', 'label' => __( 'Brand', 'studio25' ) ],
			[ 'name' => 'base',  'label' => __( 'Base',  'studio25' ) ],
		],
		'core/cover' => [
			[ 'name' => 'blurred', 'label' => __( 'Blurred', 'studio25' ) ],
		],
		'core/details' => [
			[ 'name' => 'chevron', 'label' => __( 'Chevron', 'studio25' ) ],
		],
		'core/gallery' => [
			[ 'name' => 'scale-effect', 'label' => __( 'Scale Effect', 'studio25' ) ],
		],
		'core/group' => [
			[ 'name' => 'spotlight', 'label' => __( 'Spotlight', 'studio25' ) ],
		],
		'core/image' => [
			[ 'name' => 'picture-frame', 'label' => __( 'Picture Frame', 'studio25' ) ],
		],
		'core/list' => [
			[ 'name' => 'checkmark',   'label' => __( 'Checkmark',         'studio25' ) ],
			[ 'name' => 'crossmark',   'label' => __( 'Crossmark',         'studio25' ) ],
			[ 'name' => 'crossmark-2', 'label' => __( 'Crossmark 2 Red',   'studio25' ) ],
			[ 'name' => 'checkmark-2', 'label' => __( 'Checkmark 2 Green', 'studio25' ) ],
		],
		'core/paragraph' => [
			[ 'name' => 'indicator', 'label' => __( 'Indicator', 'studio25' ) ],
			[ 'name' => 'overline',  'label' => __( 'Overline',  'studio25' ) ],
			[ 'name' => 'checkmark', 'label' => __( 'Checkmark', 'studio25' ) ],
		],
	];

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style ) {
			register_block_style( $block, [
				'name'         => $style['name'],
				'label'        => $style['label'],
				'style_handle' => 'studio25-block-style-' . str_replace( '/', '-', $block ) . '-' . $style['name'],
			] );
		}
	}
}
