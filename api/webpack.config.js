const Encore = require("@symfony/webpack-encore");
const path = require("path");
const dotenv = require('dotenv');
const fs = require('fs');
const TsconfigPathsPlugin = require('tsconfig-paths-webpack-plugin');

const ROOT_PATH = path.resolve(__dirname, './assets');
const APP_PATH = ROOT_PATH + '/app';
const MAIL_PATH = ROOT_PATH + '/mail';
const ALIASES = {
  '@components' : APP_PATH + '/components',
  '@hooks' : APP_PATH + '/hooks',
  '@models' : APP_PATH + '/models',
  '@api/types' : APP_PATH + '/api/types',
  '@api/utils' : APP_PATH + '/api/utils',
  '@services' : APP_PATH + '/services',
};

const fileExists = (filePath) => {
  try {
      return fs.statSync(filePath).isFile();
  } catch (err) {
      return false;
  }
}

const getEnvPaths = () => {
  let envFiles = '';

  if (Encore.isProduction())
    envFiles = [
      '.env.production',
      '.env'
    ]

  if (Encore.isDev())
    envFiles = [
      '.env.dev',
      '.env'
    ]

  if (Encore.isDevServer())
    envFiles = [
      '.env.dev.local',
      '.env.local',
      '.env.dev',
      '.env'
    ]
  
  return envFiles
    .map((file) => `${APP_PATH}/${file}`)
    .filter(
        fileExists
    );
}

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");
}

Encore.setOutputPath("public/app")
  .setPublicPath("/app")
  .setManifestKeyPrefix("app/")
  .addAliases(ALIASES)

  .addEntry("app", APP_PATH + "/app.ts")

  .copyFiles({
    from: APP_PATH + "/images",
    to: Encore.isProduction()
      ? "images/[path][name].[hash:8].[ext]"
      : "images/[path][name].[ext]",
  })
  .copyFiles({
    from: APP_PATH + "/documents",
    to: Encore.isProduction()
      ? "documents/[path][name].[hash:8].[ext]"
      : "documents/[path][name].[ext]",
  })

  .splitEntryChunks()

  .enableReactPreset()
  .enableTypeScriptLoader()
  .configureDefinePlugin(options => {
    const env = dotenv.config({ path: getEnvPaths() });

    if (env.error) {
        throw env.error;
    }

    Object.entries(env.parsed).forEach(([key, value]) => {
        if (key.startsWith('REACT_APP_')) {
            options['process.env.' + key] = JSON.stringify(value);
        }
    });
})

  .enableStimulusBridge(APP_PATH + "/controllers.json")

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
    watchOptions.poll = 700;
    watchOptions.aggregateTimeout = 100;
  })
  .configureDevServerOptions((options) => {
    options.host = "0.0.0.0";
    options.liveReload = true;
    options.hot = false;
    options.watchFiles = ["./templates/**/*", "./app/**/*"];
  });
const app = Encore.getWebpackConfig();
app.name = "app";
app.resolve.plugins = [
  new TsconfigPathsPlugin({
      configFile: APP_PATH + '/tsconfig.json',
      extensions: ['.js', '.jsx', '.json', '.ts', '.tsx']
  })
]

Encore.reset();
Encore.setOutputPath("public/mail")
  .setPublicPath("/mail")
  .setManifestKeyPrefix("mail/")

  .addStyleEntry("email", MAIL_PATH + "/email.css")

  .disableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()

  .enablePostCssLoader((options) => {
    options.postcssOptions = {
      config: path.resolve(__dirname, 'postcss.config.js'),
    };
  });

const mail = Encore.getWebpackConfig();
mail.name = "mail";

module.exports = [app, mail];
