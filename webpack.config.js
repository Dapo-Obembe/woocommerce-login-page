const path = require( 'path' );
const glob = require( 'glob' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const { WebpackManifestPlugin } = require( 'webpack-manifest-plugin' );
const SvgSpriteLoaderPlugin = require( 'svg-sprite-loader/plugin' );

module.exports = ( env, argv ) => {
	// Create entries for each block
	const blockEntries = {};
	glob.sync( './blocks/*/src/index.js' ).forEach( ( filePath ) => {
		const blockName =
			'block-' +
			path.basename( path.dirname( path.dirname( filePath ) ) );
		blockEntries[ blockName ] = './' + filePath;
	} );

	return {
		entry: {
			main: './src/index.js', // Global styles/scripts
			...blockEntries, // Block-specific styles/scripts
		},
		output: {
			filename:
				argv.mode === 'development'
					? '[name].js'
					: '[name].[contenthash].js',
			path: path.resolve( __dirname, 'dist' ),
			publicPath: '',
		},
		resolve: {
			alias: {
				images: path.resolve( __dirname, 'src/images/' ),
			},
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [ '@babel/preset-env' ],
						},
					},
				},
				{
					test: /\.scss$/,
					use: [
						MiniCssExtractPlugin.loader,
						'css-loader',
						'sass-loader',
					],
				},
				{
					test: /\.svg$/,
					include: path.resolve( __dirname, 'src/icons' ),
					use: [
						{
							loader: 'svg-sprite-loader',
							options: {
								extract: true,
								spriteFilename: 'sprite.svg',
							},
						},
						'svg-transform-loader',
						{
							loader: 'svgo-loader',
							options: {
								plugins: [
									{
										name: 'convertColors',
										params: {
											currentColor: true,
										},
									},
								],
							},
						},
					],
				},
			],
		},
		plugins: [
			new CleanWebpackPlugin(),
			new MiniCssExtractPlugin( {
				filename:
					argv.mode === 'development'
						? '[name].css'
						: '[name].[contenthash].css',
			} ),
			new WebpackManifestPlugin( {
				writeToDisk: true,
			} ),
			new SvgSpriteLoaderPlugin( {
				plainSprite: true,
			} ),
		],
	};
};
