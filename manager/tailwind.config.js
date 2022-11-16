/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',

  content: [
    '../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/*/*.blade.php',
    './resources/views/*.blade.php',
    './resources/js/components/*.vue',
    './resources/js/views/*/*.vue',
    './resources/js/views/*.vue',
    './resources/js/App.vue'
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: '-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji"'
      },
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'white': '#ffffff',
        'evo': {
          50: '#b9c1c9',
          100: '#959ca4',
          200: '#797f86',
          300: '#6d7279',
          400: '#53575d',
          500: '#414449',
          600: '#3f4550',
          700: '#282c34',
          800: '#202329',
          900: '#1a1c21',
        },
      },
    }
  },

  plugins: [
    require('@tailwindcss/forms')
  ]
}
