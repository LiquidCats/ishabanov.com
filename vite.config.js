import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            buildDirectory: "static",
            input: [
                'resources/scss/styles.scss',
                'resources/js/scripts.js',
            ],
            refresh: true,
        }),
    ],
});
