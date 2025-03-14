import "./styles/app.css";
import './bootstrap.ts'
import { registerReactControllerComponents } from '@symfony/ux-react';

registerReactControllerComponents(
    require.context('./controllers', true, /\.(j|t)sx?$/)
);