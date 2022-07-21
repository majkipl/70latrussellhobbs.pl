import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
const dotenv = require('dotenv');

dotenv.config();

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: process.env.DOCKER_VITE_PORT,
        hmr: {
            host: '127.0.0.1',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/panel.scss',
                'resources/js/app.js',
                'resources/js/panel.js',
            ],
            refresh: true,
        }),
    ],
});
