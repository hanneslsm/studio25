/* Seperator
* @since ProLooks 0.2
--------------------------------------------- */

/**
 * Defaults
 */

wp.blocks.registerBlockVariation('core/spacer', {
	name: 'spacer',
	title: 'Spacer',
	isDefault: true,
	attributes: {
		height: 'var:preset|spacing|40',
	},
});
