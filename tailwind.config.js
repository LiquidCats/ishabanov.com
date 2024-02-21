/** @type {import('tailwindcss').Config} */
export default {
    // purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    content: [
        "./resources/**/*.blade.php",
        "./database/**/*.php",
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

