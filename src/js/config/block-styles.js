/** Register Block Styles
 * --------------------------------------------- */
import { registerBlockStyle } from '@wordpress/blocks';

const blockStyles = [
	{
		block: 'core/button',
		styles: [
			{ name: 'bittnerkrull-button-brand', label: 'BK Brand' },
			{ name: 'bittnerkrull-button-base', label: 'BK Base' },
		],
	},
	{
		block: 'core/cover',
		styles: [
			{
				name: 'bittnerkrull-cover-hover-reveal',
				label: 'BK Hover Reveal',
			},
			{ name: 'cover-link', label: 'Link' },
		],
	},
	{
		block: 'core/details',
		styles: [
			{ name: 'details-chevron', label: 'Chevron' },
			{ name: 'details-chevron-2', label: 'Chevron 2' },
		],
	},
	{
		block: 'core/gallery',
		styles: [
			{ name: 'bittnerkrull-frontpage-logos', label: 'BK Logo Wall' },
			{ name: 'gallery-scale-effect', label: 'Scale Effect' },
		],
	},
	{
		block: 'core/list',
		styles: [
			{ name: 'list-checkmark', label: 'Checkmark' },
			{ name: 'list-crossmark', label: 'Crossmark' },
		],
	},
	{
		block: 'core/paragraph',
		styles: [
			{ name: 'paragraph-kicker', label: 'Kicker Text' },
			{ name: 'paragraph-intro', label: 'Intro Text' },
			{ name: 'paragraph-indicator', label: 'Indicator' },
		],
	},
];

blockStyles.forEach( ( { block, styles } ) => {
	styles.forEach( ( { name, label } ) => {
		wp.blocks.registerBlockStyle( block, { name, label } );
	} );
} );
