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
        "./resources/themes/default/views/vendor/cookie-consent/dialogContents.blade.php",
    ],
    theme: {
        fontFamily: {
            sans: ['"Montserrat"', 'sans-serif'],
            serif: ['"Lora"', 'serif', 'ui-serif'],
            mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
        },
        extend: {
            colors: {
                night: "#22212A"
            }
        },
    },
    plugins: [],
}

