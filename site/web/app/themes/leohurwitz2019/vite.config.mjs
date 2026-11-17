import { fileURLToPath } from 'node:url'
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

// Set APP_URL if it doesn't exist for Laravel Vite plugin
if (! process.env.APP_URL) {
  process.env.APP_URL = 'http://leohurwitz.test';
}

// Note: package.json deliberately has no "type": "module". Bootstrap 4 and
// lightGallery 1 are CommonJS/UMD builds, and their jQuery import only
// resolves correctly when the importing files are not treated as native ES
// modules.
export default defineConfig({
  base: '/app/themes/leohurwitz2019/public/build/',
  plugins: [
    laravel({
      input: [
        'resources/css/app.scss',
        'resources/js/app.js',
      ],
      refresh: true,
      assets: ['resources/images/**', 'resources/fonts/**'],
    }),
  ],
  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
      // Use the jQuery that WordPress loads instead of bundling a second copy.
      jquery: fileURLToPath(new URL('./resources/js/jquery.js', import.meta.url)),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        // Bootstrap 4 predates the Sass module system.
        quietDeps: true,
        silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'slash-div'],
      },
    },
  },
})
