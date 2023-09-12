/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/View/**/*.php", // Chemin vers les fichiers HTML dans le répertoire "App/View"
    "./public/js/**/*.js",   // Chemin vers les fichiers JavaScript dans le répertoire "public/js"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};