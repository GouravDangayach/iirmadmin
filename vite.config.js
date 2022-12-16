// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import vue from '@vitejs/plugin-vue';

// export default defineConfig({
//     server: {
//         hmr: {
//           host: "localhost",
//         },
//         host: "localhost",
//         watch: {
//           usePolling: true,
//         },
//     },
//     plugins: [
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'],
//             refresh: true,
//         }),
//         vue(),
//     ],
// });
import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'
  export default defineConfig(({mode})=>{
    const env = loadEnv(mode, process.cwd());
    return{
      plugins: [vue()],
      server: {
        proxy: {
          "^/api": {
            target:env.VITE_PORT,
            changeOrigin: true,
            secure: false,
            withCredentials: true,
            rewrite: (path) => path.replace(/^\/api/, ``),
          },
        },
        port:4000
      },
    }
  })