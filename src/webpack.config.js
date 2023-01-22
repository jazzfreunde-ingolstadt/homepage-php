const Encore = require("@symfony/webpack-encore");

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");
}

Encore.setOutputPath("public/build/app")
  .setPublicPath("/build/app")
  .setManifestKeyPrefix("build/app/")

  .addEntry("app", "./assets/app/app.js")
  .addEntry("events", "./assets/app/events.js")
  .addEntry("home", "./assets/app/home.js")

  .copyFiles({
    from: "./assets/app/images",
    to: Encore.isProduction() ? 'images/[path][name].[hash:8].[ext]' : "images/[path][name].[ext]",
  })

  .splitEntryChunks()

  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()

  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())

  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = "usage";
    config.corejs = "3.23";
  })

  .enablePostCssLoader()

  .enableIntegrityHashes(Encore.isProduction())

  .configureWatchOptions(function (watchOptions) {
    watchOptions.poll = 500;
    watchOptions.aggregateTimeout = 100;
  })
  .configureDevServerOptions((options) => {
    options.liveReload = true;
    options.hot = true;
    options.watchFiles = [ "./templates/**/*", "./app/**/*" ];
  });
const app = Encore.getWebpackConfig();
app.name = "app";

Encore.reset();
Encore.setOutputPath("public/build/mail")
  .setPublicPath("/build/mail")
  .setManifestKeyPrefix("build/mail/")

  .addStyleEntry("email", "./assets/mail/email.css")

  .splitEntryChunks()

  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()

  .enableSourceMaps(!Encore.isProduction())

  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = "usage";
    config.corejs = "3.23";
  })

  .enablePostCssLoader()

  .configureWatchOptions(function (watchOptions) {
    watchOptions.poll = 250;
    watchOptions.aggregateTimeout = 200;
  });

const mail = Encore.getWebpackConfig();
mail.name = "mail";

module.exports = [app, mail];
