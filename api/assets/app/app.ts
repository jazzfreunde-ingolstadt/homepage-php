import "./styles/app.css";
import './bootstrap.ts'
import { registerReactControllerComponents } from '@symfony/ux-react';

registerReactControllerComponents(
    import.meta.webpackContext('./controllers', {
        recursive: true,
        regExp: /\.(j|t)sx?$/,
    })
);