/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/views/*.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        default:['Montserrat', 'sans-serif'],
        display: ['Montserrat', 'sans-serif'],
        body: ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

