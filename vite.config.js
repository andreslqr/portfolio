import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/web/sass/app.scss',
                'resources/web/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
