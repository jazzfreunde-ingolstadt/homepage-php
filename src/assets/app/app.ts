import "./styles/app.css";
import './bootstrap.js'
import { registerReactControllerComponents } from '@symfony/ux-react';

registerReactControllerComponents(
    require.context('./controllers', true, /\.(j|t)sx?$/)
);