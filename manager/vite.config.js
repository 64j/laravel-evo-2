import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import { resolve } from 'path'

export default defineConfig({
  // root: process.cwd(),
  // base: '',
  // envDir: './',
  // build: {
  //   assetsDir: 'assets',
  //   outDir: 'public/build',
  //   rollupOptions: {
  //     output: {
  //       assetFileNames: (assetInfo) => {
  //         let extType = assetInfo.name.split('.').at(1)
  //
  //         if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
  //           extType = 'img'
  //         } else if (/webfonts|fonts/i.test(extType)) {
  //           extType = 'fonts'
  //         }
  //
  //         return `assets/${extType}/[name]-[hash][extname]`
  //       },
  //       chunkFileNames: 'assets/js/[name]-[hash].js',
  //       entryFileNames: 'assets/[name]-[hash].js'
  //     }
  //   }
  // },
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js'
      ],
      refresh: true
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    })
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
      '@assets': resolve(__dirname, '/resources/js/assets'),
    },
    extensions: ['.js', '.vue', '.json']
  }
})
