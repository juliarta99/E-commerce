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
      'poppins': ['Poppins','sans-serif', 'SFMono-Regular'],
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}
