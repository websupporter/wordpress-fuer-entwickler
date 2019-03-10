const path = require( 'path' );
const webpack = require( 'webpack' );

module.exports = {
    entry: {
        zubereitung:'./assets/js/blocks/src/zubereitung.js',

    },
    output: {
        filename:'./assets/js/blocks/[name].js'
    },
    module: {
        rules: [
            {
                use: {
                    loader: 'babel-loader',
                },
            }
        ],
    }
};
