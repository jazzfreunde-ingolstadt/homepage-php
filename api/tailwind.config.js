/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
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
      xs: '0.75rem',
      sm: '0.875rem',
      base: '1rem',
      lg: '1.25rem',
      xl: '1.563rem',
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
