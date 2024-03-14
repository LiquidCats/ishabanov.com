import {defineConfig, loadEnv} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({mode}) => {
    const env = loadEnv(mode, process.cwd(), '')
    return {
        plugins: [
            laravel({
                buildDirectory: "static",
                input: [
                    `resources/themes/${env.APPEARANCE_SITE_THEME ?? 'default'}/styles/styles.scss`,
                    `resources/themes/${env.APPEARANCE_SITE_THEME ?? 'default'}/scripts/index.js`,
                    //
                    'resources/admin/styles/styles.scss',
                    'resources/admin/scripts/index.ts',
                ],
                refresh: [
                    'lang/**',
                    `resources/themes/${env.APPEARANCE_SITE_THEME ?? 'default'}/views/**`,
                    `resources/admin/views/**`,
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
