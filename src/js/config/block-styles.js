/** Register Block Styles
 * --------------------------------------------- */
import { registerBlockStyle } from '@wordpress/blocks';

/**
 * Core Button
 */

wp.blocks.registerBlockStyle( 'core/button', {
	name: 'bittnerkrull-button-brand',
	label: 'BK Brand',
} );

wp.blocks.registerBlockStyle( 'core/button', {
	name: 'bittnerkrull-button-base',
	label: 'BK Base',
} );

/**
 * Core Cover
 */

wp.blocks.registerBlockStyle( 'core/cover', {
	name: 'bittnerkrull-cover-hover-reveal',
	label: 'BK Hover Reveal',
} );

wp.blocks.registerBlockStyle( 'core/cover', {
	name: 'cover-link',
	label: 'Link',
} );

/**
 * Core Details
 */
wp.blocks.registerBlockStyle( 'core/details', {
	name: 'details-chevron',
	label: 'Chevron',
} );

wp.blocks.registerBlockStyle( 'core/details', {
	name: 'details-chevron-2',
	label: 'Chevron 2',
} );

/**
 * Core Gallery
 */

wp.blocks.registerBlockStyle( 'core/gallery', {
	name: 'bittnerkrull-frontpage-logos',
	label: 'BK Logo Wall',
} );

wp.blocks.registerBlockStyle( 'core/gallery', {
	name: 'gallery-scale-effect',
	label: 'Scale Effect',
} );

/**
 * Core List
 */
wp.blocks.registerBlockStyle( 'core/list', {
	name: 'list-checkmark',
	label: 'Checkmark',
} );

wp.blocks.registerBlockStyle( 'core/list', {
	name: 'list-crossmark',
	label: 'Crossmark',
} );

/**
 * Core Paragraph
 */
wp.blocks.registerBlockStyle( 'core/paragraph', {
	name: 'paragraph-kicker',
	label: 'Kicker Text',
} );

wp.blocks.registerBlockStyle( 'core/paragraph', {
	name: 'paragraph-intro',
	label: 'Intro Text',
} );

wp.blocks.registerBlockStyle( 'core/paragraph', {
	name: 'paragraph-indicator',
	label: 'Indicator',
} );
