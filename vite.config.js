import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const path = require('path')
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    resolve: {
        alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',

                'resources/css/user.css',
                'resources/js/user.js',

                'resources/assets/staff/js/app.js',
                'resources/assets/staff/js/main.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: ([
                        'resources/assets/staff/',
                        'resources/assets/plugins/',
                        'resources/assets/frontend/',
                        'resources/assets/user/',
                    ]),
                    dest: 'assets/'
                }
            ]
        })
    ],
});
