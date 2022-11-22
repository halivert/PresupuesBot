import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.scss", "resources/ts/app.ts"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/ts",
        },
    },
});
