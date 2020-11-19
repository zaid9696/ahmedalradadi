const path = require('path');

BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
  entry: './src/js/index.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, './dist'),
  },
  optimization:{
    minimizer: [
      new OptimizeCssAssetsPlugin(),
      new TerserPlugin(),
    ]
  },
  mode: 'development',
  devtool: 'source-map',
  devServer: {
    contentBase: path.join(__dirname, './dist'),
    compress: true,
    port: 9000
  },
  module:{
    rules:[
        {
            test:[/\.css$/,/\.scss$/],
            use: [
              // Creates `style` nodes from JS strings MiniCssExtractPlugin.loader
              MiniCssExtractPlugin.loader,
              // Translates CSS into CommonJS
              'css-loader',
              // 'postcss-loader',
              // Compiles Sass to CSS
              'sass-loader',
            ],
        }
   ]
},
  plugins:[
    new BrowserSyncPlugin({
        files: ['**/*.php'],
        proxy: 'http://localhost/test/',
      }),
      new webpack.ProvidePlugin({
        $: path.resolve(path.join(__dirname, 'node_modules/jquery')),
        jQuery: path.resolve(path.join(__dirname, 'node_modules/jquery')),
        'window.jQuery': path.resolve(path.join(__dirname, 'node_modules/jquery')),
    }),
    new MiniCssExtractPlugin({
      filename: 'style.css'
    }),

  ]
};
