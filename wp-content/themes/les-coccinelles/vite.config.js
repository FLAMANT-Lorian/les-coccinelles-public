import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],
    root: '',
    base: process.env.NODE_ENV === 'development'
        ? ''
        : '/wp-content/themes/les-coccinelles/dist/',

    build: {
        manifest: true,
        outDir: resolve(__dirname, './dist'),
        emptyOutDir: true,
        rollupOptions: {
            input: {
                main: resolve(__dirname, './main.js'),
            }
        },
    },

    server: {
        cors: true,
        strictPort: true,
        port: 3000,
        https: false,
        hmr: {
            host: 'localhost',
        },

    },
})