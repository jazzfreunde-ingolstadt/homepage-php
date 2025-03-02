/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./assets/**/*.{js,ts,tsx}",
    "./templates/**/*.html.twig",
  ],
  theme: {
    colors: {
      'current': 'currentColor',
      'blue': '#242c7f',
      'yellow': '#e8c400',
      'orange': '#ee8811',
      'red': '#bf1300',
      'grey': '#6b7280',
      'grey-light': '#eeeef0',
      'white': '#ffffff',
      'black': '#000000',
    },
    fontFamily: {
      sans: ['FF DIN', ...defaultTheme.fontFamily.sans],
    },
    fontSize: {
      sm: '1rem',
      base: '1.25rem',
      xl: '1.56rem',
      '2xl': '1.953rem',
      '3xl': '2.441rem',
      '4xl': '3.052rem',
      '5xl': '3.815rem',
      '6xl': '4.768rem',
      '7xl': '5.960rem',
      '8xl': '7.451rem',
    },
    extend: {},
  },
  plugins: [],
}
