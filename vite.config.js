import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import {aliasToReal} from "lodash/fp/_mapping";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    }
});
