/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./App/Views/**/*.php", // Chemin vers les fichiers HTML dans le répertoire "App/Views"
    "./public/js/**/*.js",   // Chemin vers les fichiers JavaScript dans le répertoire "public/js"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};