import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import FullReload from 'vite-plugin-full-reload';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        FullReload([
            'resources/views/**',
        ]),
    ],
    server: {
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
        host: 'localhost',        // Changed: allow Docker to expose this
        port: 5000,
        allowedHosts: true,
        hmr: {
            host: 'localhost',   // Browser connects to localhost
        },
    },
});
