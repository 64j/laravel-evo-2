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
      }
    }
  },

  plugins: [
    require('@tailwindcss/forms')
  ]
}
