/** Register Block Styles
 * --------------------------------------------- */
import { registerBlockStyle } from '@wordpress/blocks';

const blockStyles = [
	{
		block: 'core/button',
		styles: [
			{ name: 'studio25-button-brand', label: 'Studio25 Brand' },
			{ name: 'studio25-button-base', label: 'Studio25 Base' },
		],
	},
];

blockStyles.forEach( ( { block, styles } ) => {
	styles.forEach( ( { name, label } ) => {
		wp.blocks.registerBlockStyle( block, { name, label } );
	} );
} );
