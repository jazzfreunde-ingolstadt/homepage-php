/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    colors: {
      'blue': '#242c7f',
      'yellow': '#e8c400',
      'orange': '#ee8811',
      'red': '#bf1300',
      'grey-light': '#eeeef0',
      'white': '#ffffff',
    },
    extend: {},
  },
  plugins: [],
}