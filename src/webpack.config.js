const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/app')
    .setPublicPath('/build/app')
    // only needed for CDN's or subdirectory deploy
    .setManifestKeyPrefix('build/app/')

    .addEntry('app', './assets/app.js')
    .addEntry('events', './assets/events.js')
    .addEntry('home', './assets/home.js')

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

    .configureWatchOptions(function(watchOptions) {
        watchOptions.poll = 250;
        watchOptions.aggregateTimeout = 200;
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


const app = Encore.getWebpackConfig();
app.name = 'app';

Encore.reset();
Encore
    .setOutputPath('public/build/mail')
    .setPublicPath('/build/mail')
    .setManifestKeyPrefix('build/mail/')

    .addStyleEntry('email', './assets/styles/email.css')

    .splitEntryChunks()

    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()

    .enableSourceMaps(!Encore.isProduction())

    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })

    .enablePostCssLoader()

    .configureWatchOptions(function(watchOptions) {
        watchOptions.poll = 250;
        watchOptions.aggregateTimeout = 200;
    })
;

const mail = Encore.getWebpackConfig();
mail.name = 'mail';

module.exports = [ app, mail ];
