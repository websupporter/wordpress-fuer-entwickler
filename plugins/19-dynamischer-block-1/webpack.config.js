const path = require( 'path' );
const webpack = require( 'webpack' );

module.exports = {
    entry: {
        block:'./assets/js/blocks/src/block.js'

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
