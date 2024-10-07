import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: { // To work with Docker Compose
        host: true,
        hmr: {
            host: 'localhost' // If it doesn't work, try replacing it with your local machine's IP
        },
        port: 5174
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
