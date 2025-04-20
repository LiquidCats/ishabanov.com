// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  compatibilityDate: '2025-04-20',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  vite: {
    plugins: [
      tailwindcss(),
    ],
  },
  app: {
    head: {
      title: 'Ilya Shabanov - Back-End Engineer',
      bodyAttrs: {
        class: 'z-0 relative bg-zinc-900',
      }
    },
    meta: [
      { name: 'description', content: 'Ilya Shabanov - Back-End Engineer' },
    ],
    charset: 'utf-8',
    viewport: 'width=device-width, initial-scale=1, maximum-scale=1',
    htmlAttrs: {
      lang: 'en'
    }
  },
})