import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    root: 'public', // Tu servidor corre desde la carpeta public
    plugins: [
        tailwindcss(), // Este plugin reemplaza la necesidad de tailwind.config.js
    ],
    server: {
        origin: 'http://localhost:5173',
        strictPort: true,
        cors: true,
    },
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        rollupOptions: {
            input: path.resolve(__dirname, 'public/assets/js/main.js'),
        },
    },
});
