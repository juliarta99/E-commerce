/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/preline/dist/*.js",
  ],
  theme: {
    extend: {},
    fontFamily:{
      'poppins': ['Poppins','ui-monospace', 'SFMono-Regular'],
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}
