const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require("path");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
const { merge } = require("webpack-merge");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");
const fs = require("fs");

module.exports = function (env) {
	const isProduction = process.env.NODE_ENV === "production";
	const mode = isProduction ? "production" : "development";
	console.log(`#### mode: ${mode} ####`);

	// Dynamically get all SCSS files in the blocks folder
	const blockStyles = fs.readdirSync(path.resolve(__dirname, "src/scss/blocks"))
		.filter((file) => file.endsWith(".scss"))
		.reduce((entries, file) => {
			const name = `css/blocks/${file.replace(".scss", "")}`;
			entries[name] = path.resolve(__dirname, "src/scss/blocks", file);
			return entries;
		}, {});

	// Define plugins array and conditionally push plugins
	const plugins = [
		...(defaultConfig.plugins || []),
		new RemoveEmptyScriptsPlugin({
			/* ensures it runs after `*.asset.php` files are generated */
			stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
		}),
	];

	if (isProduction) {
		// Copy images and minimize them only in production
		plugins.push(
			new CopyWebpackPlugin({
				patterns: [
					{
						from: path.resolve(__dirname, "src/images"),
						to: path.resolve(__dirname, "build/images"),
					},
				],
			}),
			new ImageMinimizerPlugin({
				minimizer: {
					implementation: ImageMinimizerPlugin.sharpMinify,
					options: {
						resize: {
							width: 2560,
							withoutEnlargement: true,
						},
						encodeOptions: {
							jpeg: { quality: 50 },
							png: { quality: 50 },
							webp: { quality: 50 },
							avif: { quality: 50 },
						},
					},
				},
			}),
		);
	}

	// Merge with defaultConfig
	return merge(defaultConfig, {
		entry: {
			"css/global": path.resolve(__dirname, "src", "global.scss"),
			"css/screen": path.resolve(__dirname, "src", "screen.scss"),
			"css/editor": path.resolve(__dirname, "src", "editor.scss"),
			"js/global": path.resolve(__dirname, "src", "global.js"),
			...blockStyles, // Include dynamically generated block styles
		},
		plugins, // Use the plugins array
		mode: mode,
	});
};
