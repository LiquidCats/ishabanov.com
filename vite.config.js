import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            "@/admin": "resources/js/admin"
        }
    },
    plugins: [
        laravel({
            buildDirectory: "static",
            input: [
                'resources/scss/themes/default/styles.scss',
                'resources/js/themes/default/scripts.js',
                'resources/js/admin/index.ts',
            ],
            refresh: [
                'lang/**',
                'resources/views/**',
            ],
        }),
     vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
