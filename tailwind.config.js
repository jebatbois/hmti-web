/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        hmti: {
          primary: '#16a34a',   // Hijau
          dark: '#14532d',      // Hijau Tua
          accent: '#facc15',    // Kuning
          marine: '#1e40af',    // Biru
          light: '#f0fdf4',     // Hijau pudar
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      }
    },
  },
  plugins: [],
}