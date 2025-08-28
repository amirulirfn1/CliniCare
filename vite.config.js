import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'public/assets',
    emptyOutDir: true,
    assetsDir: '',
    rollupOptions: {
      input: 'src/main.js',
      output: {
        entryFileNames: 'app.js',
        assetFileNames: 'app.[ext]'
      }
    }
  }
});
