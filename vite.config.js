import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            buildDirectory: "static",
            input: [
                'resources/scss/styles.scss',
                'resources/typescript/scripts.ts',
            ],
            refresh: true,
        }),
    ],
    // build: {
    //     rollupOptions: {
    //         output: {
    //             entryFileNames: `assets/[name].js`,
    //             assetFileNames: `assets/[name].[ext]`
    //         }
    //     }
    // }
});
