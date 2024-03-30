/** @type {import('tailwindcss').Config} */
module.exports = {
    // purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    content: [
        "./src/**/*Style.php",
        "./resources/**/*.blade.php",
        "./database/**/*.php",
        "./resources/**/*.scss",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                night: "#22212A"
            }
        },
    },
    plugins: [],
}

