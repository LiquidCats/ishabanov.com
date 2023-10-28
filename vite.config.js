import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            buildDirectory: "static",
            input: [
                'resources/scss/themes/default/styles.scss',
                'resources/js/themes/default/scripts.js',
            ],
            refresh: true,
        }),
    ],
});
