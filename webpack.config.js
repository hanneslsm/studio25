// WordPress webpack config.
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const { getWebpackEntryPoints } = require( '@wordpress/scripts/utils/config' );

// Utilities.
const path = require('path');
const glob = require('glob');
const { globSync } = require('glob');

//Plugins
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');


// Automatically gather block stylesheets
const blockStylesheets = () => globSync( './resources/scss/blocks/core/*.scss' ).reduce(
	( files, filepath ) => {
		const name = path.parse( filepath ).name;

		files[ `css/blocks/core/${ name }` ] = path.resolve(
			process.cwd(),
			'resources/scss/blocks/core',
			`${ name }.scss`
		);

		return files;
	}, {}
);

module.exports = {
	...defaultConfig,
	entry: {
		...getWebpackEntryPoints(),
		...blockStylesheets(),
		// Automatically include all JS, SCSS, and CSS files while preserving their folder structure
		...glob.sync(path.resolve(__dirname, 'resources/**/*.js')).reduce((entries, filepath) => {
			const entryName = path.relative(path.resolve(__dirname, 'resources'), filepath).replace(/\\/g, '/').replace(/\.[^/.]+$/, '');
			entries[entryName] = filepath;
			return entries;
		}, {}),
		...glob.sync(path.resolve(__dirname, 'resources/**/*.scss')).reduce((entries, filepath) => {
			const entryName = path.relative(path.resolve(__dirname, 'resources'), filepath).replace(/\\/g, '/').replace(/\.[^/.]+$/, '');
			entries[entryName] = filepath;
			return entries;
		}, {}),
		...glob.sync(path.resolve(__dirname, 'resources/**/*.css')).reduce((entries, filepath) => {
			const entryName = path.relative(path.resolve(__dirname, 'resources'), filepath).replace(/\\/g, '/').replace(/\.[^/.]+$/, '');
			entries[entryName] = filepath;
			return entries;
		}, {}),
	},
	output: {
		...defaultConfig.output,
		path: path.resolve(__dirname, 'public'), // Output to 'public' folder
		// Preserve folder structure and file names
		filename: '[name].js', // Use the entry name for the output JS file names
		assetModuleFilename: '[name][ext]', // For other asset types like CSS or SCSS
	},
	plugins: [
		...defaultConfig.plugins,
		new DependencyExtractionWebpackPlugin(),
	],
};
