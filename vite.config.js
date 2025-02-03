import {defineConfig, loadEnv} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig(({mode}) => {
    const env = loadEnv(mode, process.cwd(), '')
    const theme = env.VITE_APPEARANCE_SITE_THEME ?? 'default'
    return {
        resolve: {
            alias: {
                "@admin": path.resolve(__dirname, './resources/scripts/admin'),
                "@theme": path.resolve(__dirname, './resources/scripts/theme/default'),
                "@kernel": path.resolve(__dirname, './resources/scripts/kernel'),
            }
        },
        plugins: [
            laravel({
                buildDirectory: "static",
                input: [
                    `resources/styles/themes/${theme}/styles.scss`,
                    'resources/styles/admin/styles.scss',
                    //
                    `resources/scripts/themes/${theme}/index.ts`,
                    'resources/scripts/admin/index.ts',
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
