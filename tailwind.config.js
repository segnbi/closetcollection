const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Figtree", ...defaultTheme.fontFamily.sans],
        arialBlack: ['"Arial Black"'],
      },

      keyframes: {
        curtain: {
          'from': { transform: 'scalex(1)'},
          'to': { transform: 'scalex(0)'}
        },

        raise: {
          'from': {transform: 'translatey(100%)'},
          'to': {transform: 'translatey(0)'}
        },

        appear: {
          'from': {transform: 'translatey(20%)', opacity: '0'},
          'to': {transform: 'translatey(0)', opacity: '1'}
        },

        toBottom: {
          'from': {transform: 'translatey(-40px)'},
          'to': {transform: 'translatey(0)'}
        },

        toTop: {
          'from': {transform: 'translatey(40px)'},
          'to': {transform: 'translatey(0)'}
        },

        toRight: {
          'from': {transform: 'translatex(-40px)'},
          'to': {transform: 'translatex(0)'}
        },

        toLeft: {
          'from': {transform: 'translatex(40px)'},
          'to': {transform: 'translatex(0)'}
        },
      },

      animation: {
        curtain: 'curtain .8s ease-out 1s 1 forwards',
        raise: 'raise .5s ease-out .5s 1 both',
        appear: 'appear 1.5s ease-out .5s 1 both',
        toRight: 'toRight .5s ease-out .5s 1 both',
        toLeft: 'toLeft .5s ease-out .5s 1 both',
        toBottom: 'toBottom .5s ease-out .5s 1 both',
        toTop: 'toTop .5s ease-out .5s 1 both',
      }
    },
    colors: {
      transparent: "transparent",
      current: "currentColor",
      "white": "#ffffff",
      "black": {
        DEFAULT: '#000000',
        100: '#E6E6E6',
        200: '#B3B3B3',
        300: '#808080',
      },
      "golden-glow": {
        DEFAULT: "#FAE299",
        900: '#181301'
      },
      "gold-tips": "#E0B621",
      "kelly-green": "#3AB700",
      "ironside-grey": "#666666",
      "alabaster": "#FBFBF8",
      "red": "#FF3535",
      "soapstone": "#FFFCF5",
    },
  },

  plugins: [require("@tailwindcss/forms")],
};
