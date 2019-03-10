const path = require( 'path' );
const webpack = require( 'webpack' );

module.exports = {
    entry: {
        rezeptzeiten:'./assets/js/blocks/src/rezeptzeiten.js',
        richtext:'./assets/js/blocks/src/richtext.js',
        mediaupload:'./assets/js/blocks/src/mediaupload.js',
        alignment:'./assets/js/blocks/src/alignment.js',
        spacing:'./assets/js/blocks/src/custom-toolbar.js',
        inspector:'./assets/js/blocks/src/block-with-inspector.js'

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
