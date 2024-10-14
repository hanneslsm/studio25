const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
const glob = require('glob');

module.exports = {
	...defaultConfig,
	entry: [
		...glob.sync(path.resolve(__dirname, 'resources/**/*.js')), // Include JS files
		...glob.sync(path.resolve(__dirname, 'resources/**/*.scss')), // Include SCSS files
		...glob.sync(path.resolve(__dirname, 'resources/**/*.css')), // Include CSS files
	],
	output: {
		...defaultConfig.output,
		path: path.resolve(__dirname, 'public'), // Ensure the output goes to the 'public' folder
	},
};
