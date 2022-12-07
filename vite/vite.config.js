import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
	plugins: [vue()],
	resolve: {
		alias: {
			'@': fileURLToPath(new URL('./src', import.meta.url)),
		},
	},
	build: {
		outDir: '../public',
		emptyOutDir: false,
		rollupOptions: {
			output: {
				assetFileNames: 'vue/[ext]/[name][extname]',
				chunkFileNames: 'vue/chunks/[name].[hash].js',
				entryFileNames: 'vue/js/[name].[hash].js',
			},
		},
	},
})
