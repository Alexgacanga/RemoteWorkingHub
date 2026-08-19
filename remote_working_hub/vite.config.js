import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/add-option.js',
                'resources/js/edit-option.js',
                'resources/js/add-subscription.js',
                'resources/js/customer.js'
            ],
            refresh: true,
        }),
    ],
});
