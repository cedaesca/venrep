import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const custom = {
    styles: [],
    scripts: [
        'resources/js/users/show.js',
        'resources/js/reputations/create.js'
    ]
};

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                ...custom.styles,
                ...custom.scripts
            ],
            refresh: true,
        }),
    ],
});
