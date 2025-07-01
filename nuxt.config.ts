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
      },
      link: [
        // Basic favicon
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },

        // Standard sizes
        { rel: 'icon', type: 'image/png', sizes: '16x16', href: '/favicon-16x16.png' },
        { rel: 'icon', type: 'image/png', sizes: '32x32', href: '/favicon-32x32.png' },

        // Apple devices
        { rel: 'apple-touch-icon', sizes: '180x180', href: '/apple-touch-icon.png' },

        // Android devices
        { rel: 'icon', type: 'image/png', sizes: '192x192', href: '/android-chrome-192x192.png' },
        { rel: 'icon', type: 'image/png', sizes: '512x512', href: '/android-chrome-512x512.png' },

        // Web App Manifest
        { rel: 'manifest', href: '/site.webmanifest' }
      ],
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