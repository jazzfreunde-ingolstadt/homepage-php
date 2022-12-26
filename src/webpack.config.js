const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or subdirectory deploy
    //.setManifestKeyPrefix('build/')
    .addEntry('app', './assets/app.js')
    .addEntry('events', './assets/js/events.js')

    .splitEntryChunks()

    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()

    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })

    .enablePostCssLoader()

    .enableIntegrityHashes(Encore.isProduction())

    // .autoProvidejQuery()

    .configureWatchOptions(function(watchOptions) {
        watchOptions.poll = 250; // useful when running inside a Virtual Machine
        watchOptions.aggregateTimeout = 200; // useful when running inside a Virtual Machine
    })
    .configureDevServerOptions((options) => {
        options.liveReload = true;
        options.hot = true;
        options.watchFiles = [
            './templates/**/*',
            './app/**/*'
        ]
    });
;

module.exports = Encore.getWebpackConfig();
