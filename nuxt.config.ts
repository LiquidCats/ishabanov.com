// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  compatibilityDate: '2025-04-20',
  devtools: { enabled: true },
  css: ['@/assets/css/main.css'],

  vite: {
    plugins: [
      tailwindcss(),
    ],
  },

  app: {
    head: {
      title: 'Ilya Shabanov - Back-End Engineer',
      bodyAttrs: {
        class: 'z-0 relative bg-zinc-100 dark:bg-zinc-900',
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

  gtag: {
    enabled: process.env.NODE_ENV === 'production',
    id: 'G-5WBHV3DLQ3'
  },

  shadcn: {
    /**
     * Prefix for all the imported component
     */
    prefix: '',
    /**
     * Directory that the component lives in.
     * @default "./components/ui"
     */
    componentDir: './components/ui'
  },

  modules: [
    '@nuxt/content',
    '@nuxt/image',
    'nuxt-gtag',
    'shadcn-nuxt',
    'motion-v/nuxt',
    '@nuxt/scripts',
  ],
})