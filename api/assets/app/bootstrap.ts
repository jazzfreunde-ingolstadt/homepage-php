import { startStimulusApp } from '@symfony/stimulus-bridge';

export const app = startStimulusApp(import.meta.webpackContext(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    {
        recursive: true,
        regExp: /\.[jt]sx?$/,
    }
));
