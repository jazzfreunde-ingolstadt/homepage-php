import Encore from '@symfony/webpack-encore';
import dotenv from 'dotenv';
import fs from 'node:fs';
import path from 'node:path';
import TsconfigPathsPlugin from 'tsconfig-paths-webpack-plugin';

const ROOT_PATH = path.resolve(import.meta.dirname, './assets');
const APP_PATH = path.join(ROOT_PATH, 'app');
const MAIL_PATH = path.join(ROOT_PATH, 'mail');
const SHARED_API_PATH = path.resolve(import.meta.dirname, '../shared/api');
const ALIASES = {
  '@components': path.join(APP_PATH, 'components'),
  '@hooks': path.join(APP_PATH, 'hooks'),
  '@models': path.join(APP_PATH, 'models'),
  '@api/types': path.join(SHARED_API_PATH, 'types'),
  '@api/utils': path.join(SHARED_API_PATH, 'utils'),
  '@services': path.join(APP_PATH, 'services'),
};

const fileExists = (filePath) => {
  try {
    return fs.statSync(filePath).isFile();
  } catch (err) {
    return false;
  }
};

const getEnvPaths = () => {
  let envFiles = '';

  if (Encore.isProduction()) {
    envFiles = [
      '.env.production',
      '.env'
    ];
  }

  if (Encore.isDev()) {
    envFiles = [
      '.env.dev',
      '.env'
    ];
  }

  if (Encore.isDevServer()) {
    envFiles = [
      '.env.dev.local',
      '.env.local',
      '.env.dev',
      '.env'
    ];
  }

  return envFiles
    .map((file) => path.join(APP_PATH, file))
    .filter(fileExists);
};

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore.setOutputPath('public/app')
  .setPublicPath('/app')
  .setManifestKeyPrefix('app/')
  .addAliases(ALIASES)

  .addEntry('app', path.join(APP_PATH, 'app.ts'))

  .copyFiles({
    from: path.join(APP_PATH, 'images'),
    to: Encore.isProduction()
      ? 'images/[path][name].[hash:8].[ext]'
      : 'images/[path][name].[ext]',
  })
  .copyFiles({
    from: path.join(APP_PATH, 'documents'),
    to: Encore.isProduction()
      ? 'documents/[path][name].[hash:8].[ext]'
      : 'documents/[path][name].[ext]',
  })

  .splitEntryChunks()

  .enableReactPreset((options) => {
    options.development = !Encore.isProduction();
  })
  .enableTypeScriptLoader()
  .configureDefinePlugin((options) => {
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

  .enableStimulusBridge(path.join(APP_PATH, 'controllers.json'))

  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()

  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())

  .configureBabel((config) => {
    config.plugins.push([
      'babel-plugin-polyfill-corejs3',
      { method: 'usage-global', version: '3.23' },
    ]);
  })

  .enablePostCssLoader()
  .configureCssMinimizerPlugin((options, MinimizerPlugin) => {
    options.minify = MinimizerPlugin.cssnanoMinify;
  })

  .enableIntegrityHashes(Encore.isProduction())

  .configureWatchOptions((watchOptions) => {
    watchOptions.poll = 700;
    watchOptions.aggregateTimeout = 100;
    watchOptions.ignored = [path.resolve('public/'), path.resolve('node_modules/')];
  })
  .configureDevServerOptions((options) => {
    options.host = '0.0.0.0';
    options.liveReload = true;
    options.hot = false;
    options.watchFiles = [path.resolve('templates/**/*'), path.resolve('src/**/*.php')];
  });

const app = await Encore.getWebpackConfig();
app.name = 'app';
app.resolve.plugins = [
  new TsconfigPathsPlugin({
    configFile: path.join(APP_PATH, 'tsconfig.json'),
    extensions: ['.js', '.jsx', '.json', '.ts', '.tsx'],
  }),
];
app.resolve.modules = [
  path.resolve(import.meta.dirname, 'node_modules'),
  'node_modules',
];

Encore.reset();
Encore.setOutputPath('public/mail')
  .setPublicPath('/mail')
  .setManifestKeyPrefix('mail/')

  .addStyleEntry('email', path.join(MAIL_PATH, 'email.css'))

  .disableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()

  .enablePostCssLoader((options) => {
    options.postcssOptions = {
      config: path.resolve(import.meta.dirname, 'postcss.config.js'),
    };
  })
  .configureCssMinimizerPlugin((options, MinimizerPlugin) => {
    options.minify = MinimizerPlugin.cssnanoMinify;
  });

const mail = await Encore.getWebpackConfig();
mail.name = 'mail';

export default [app, mail];