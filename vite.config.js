import {defineConfig, loadEnv} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({mode}) => {
    const env = loadEnv(mode, process.cwd(), '')
    const theme = env.VITE_APPEARANCE_SITE_THEME ?? 'default'
    return {
        plugins: [
            laravel({
                buildDirectory: "static",
                input: [
                    `resources/themes/${theme}/styles/styles.scss`,
                    `resources/themes/${theme}/scripts/index.js`,
                    //
                    'resources/admin/styles/styles.scss',
                    'resources/admin/scripts/index.ts',
                ],
                refresh: [
                    'lang/**',
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
