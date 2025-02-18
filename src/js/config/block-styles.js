/** Register Block Styles
 * --------------------------------------------- */
import { registerBlockStyle } from '@wordpress/blocks';

const blockStyles = [
	{
		block: 'core/button',
		styles: [
			{ name: 'prolooks-brand', label: '🏅 Brand' },
			{ name: 'prolooks-base', label: '🏅 Base' },
		],
	},
	{
		block: 'core/cover',
		styles: [ { name: 'prolooks-cover-link', label: '🏅 Link' } ],
	},
	{
		block: 'core/details',
		styles: [ { name: 'prolooks-chevron', label: '🏅 Chevron' } ],
	},
	{
		block: 'core/gallery',
		styles: [ { name: 'prolooks-scale-effect', label: '🏅 Scale Effect' } ],
	},
	{
		block: 'core/group',
		styles: [ { name: 'prolooks-spotlight', label: '🏅 Spotlight' } ],
	},
	{
		block: 'core/list',
		styles: [
			{ name: 'prolooks-checkmark', label: '🏅 Checkmark' },
			{ name: 'prolooks-crossmark', label: '🏅 Crossmark' },
		],
	},
	{
		block: 'core/paragraph',
		styles: [ { name: 'prolooks-indicator', label: '🏅 Indicator' } ],
	},
];

blockStyles.forEach( ( { block, styles } ) => {
	styles.forEach( ( { name, label } ) => {
		wp.blocks.registerBlockStyle( block, { name, label } );
	} );
} );
