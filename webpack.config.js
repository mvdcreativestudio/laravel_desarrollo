const path = require('path');

module.exports = {
  entry: './resources/js/charts.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'public/backend/assets/js'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        },
      },
    ],
  }
};