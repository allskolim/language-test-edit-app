
const path = require('path');

module.exports = {
  mode: 'development',
  entry: './index.js',
  output: {
  	path: path.resolve(__dirname, 'dist'),
    filename: 'main.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
      	test: /\.css$/,
      	use: {
      		loader: 'css-loader'
      	}
      }
      
    ]
  }
};