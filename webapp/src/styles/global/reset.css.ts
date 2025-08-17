import { globalStyle } from '@vanilla-extract/css'

const parentElements = ['canvas', 'iframe', 'img', 'svg', 'video']
const childElements = [
  'svg *',
  'symbol *', // Mozilla Firefox Bug
]

globalStyle('*, *::before, *::after', {
  boxSizing: 'border-box',
})

globalStyle('*', {
  margin: 0,
  padding: 0,
  font: 'inherit',
})

globalStyle('body', {
  lineHeight: 1.5,
  WebkitFontSmoothing: 'antialiased',
  minHeight: '100svh',
})

globalStyle('img, picture, video, canvas, svg', {
  display: 'block',
  maxWidth: '100%',
})

globalStyle('input, button, textarea, select', {
  font: 'inherit',
})

globalStyle('p, h1, h2, h3, h4, h5, h6', {
  overflowWrap: 'break-word',
})

globalStyle(`*:not(${[...parentElements, ...childElements].join()})`, {
  all: 'unset',
  display: 'revert',
})

globalStyle('#root, #__next', {
  isolation: 'isolate',
})