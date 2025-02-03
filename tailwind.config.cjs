/** @type {import('tailwindcss').Config} */
module.exports = {
    // purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    content: [
        "./resources/**/*.scss",
        "./resources/**/*.js",
        "./resources/**/*.ts",
        "./resources/**/*.vue",
        "./resources/**/*.blade.php",
    ],
    theme: {
        fontFamily: {
            sans: ['"Montserrat"', "'Pixelify Sans'", 'sans-serif'],
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

