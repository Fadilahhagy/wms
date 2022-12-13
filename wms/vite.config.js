import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/assets/modules/nicescroll/jquery.nicescroll.min.js',
                    'resources/assets/modules/jquery.min.js',
                    'resources/assets/modules/bootstrap/css/bootstrap.min.css', 
                    'resources/assets/modules/fontawesome/css/all.min.css',
                    'resources/assets/css/components.css',
                    'resources/assets/css/style.css',
                    'resources/assets/modules/popper.js',
                    'resources/assets/modules/tooltip.js',
                    'resources/assets/modules/bootstrap/js/bootstrap.min.js',
                    'resources/assets/modules/moment.min.js',
                    'resources/assets/js/stisla.js',
                    'resources/assets/js/scripts.js',
                    'resources/assets/js/custom.js',
                    'resources/assets/modules/prism/prism.js',
                    'resources/assets/js/page/bootstrap-modal.js',
            ],
            refresh: true,
        }),
    ],
});
