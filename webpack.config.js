const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');
const path = require('path');
const process = require('process');
module.exports = {
    ...defaultConfig,
    ...{
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'src/'),
            },
        }
    },
    entry: {
        ...defaultConfig.entry(),
        "metabox/index": "./src/metabox/index.js",
    }
}