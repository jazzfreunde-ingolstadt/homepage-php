import { globalStyle } from '@vanilla-extract/css';
import { vars } from '@styles';

globalStyle('h1, h2, h3, h4, h5, h6', {
  fontWeight: 'bold',
});

globalStyle('h1', {
  fontSize: vars.typography.fontSizes['5xl'],
  paddingBottom: vars.spaces.md,
});

globalStyle('h2', {
  fontSize: vars.typography.fontSizes['4xl'],
  paddingBottom: vars.spaces.md,
});

globalStyle('h3', {
  fontSize: vars.typography.fontSizes['2xl'],
  paddingBottom: vars.spaces.sm,
});

globalStyle('h4', {
  fontSize: vars.typography.fontSizes['xl'],
  paddingBottom: vars.spaces.md,
});

globalStyle('h5', {
  fontSize: vars.typography.fontSizes['lg'],
  paddingBottom: vars.spaces.md,
});

globalStyle('h6', {
  fontSize: vars.typography.fontSizes['default'],
  paddingBottom: vars.spaces.md,
});

globalStyle('p', {
  paddingBottom: vars.spaces.md,
});

globalStyle('ul, ol', {
    listStyleType: 'none',
    listStylePosition: 'inside',
});

globalStyle('strong', {
  fontWeight: vars.typography.fontWeights.bold,
});