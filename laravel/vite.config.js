import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/ronaldoauto/app.css",
                "resources/js/app.js"
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        outDir: "public/build",
        rollupOptions: {
            output: {
                assetFileNames: "css/[name].[hash][extname]",
            },
        },
    },
    server: {
        host: "0.0.0.0",
        port: 5173,
        watch: {
            usePolling: true,
        },
        cors: true,
        hmr: {
            host: "localhost",
            port: 5173,
        },
    },
});
