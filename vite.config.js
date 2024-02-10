import {defineConfig, loadEnv} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({mode}) => {
    const env = loadEnv(mode, process.cwd(), '')
    return {
         resolve: {
            alias: {
                "@/admin": "resources/js/admin"
            }
        },
        plugins: [
            laravel({
                buildDirectory: "static",
                input: [
                    `themes/${env.APPEARANCE_SITE_THEME}/styles/styles.scss`,
                    `themes/${env.APPEARANCE_SITE_THEME}/scripts/scripts.js`,
                    //
                    'resources/scss/admin/styles.scss',
                    'resources/js/admin/index.ts',
                ],
                refresh: [
                    'lang/**',
                    `themes/${env.APPEARANCE_SITE_THEME}/views/**`,
                    `admin/views/**`,
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
    }
});
