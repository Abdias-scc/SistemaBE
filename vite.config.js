import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/js/dashboard/main.js',
                    'resources/js/dashboard/nav.js',
                    'resources/css/sobre_nosotros.css',
                    'resources/css/menu_lateral.css',
                    'resources/css/general.css',],
            refresh: true,
        }),
    ],
});
