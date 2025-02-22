// https://nuxt.com/docs/api/configuration/nuxt-config
import Theme from "./themes/default"

export default defineNuxtConfig({
  compatibilityDate: '2024-04-03',
  devtools: { enabled: true },
  typescript: {
    typeCheck: true,
    strict: true
  },
  extends: [
    // ['github:red-plug/layers-nutrix', { auth: process.env.GITHUB_TOKEN }]
  ],
  modules: [
    '@nuxt/image',
    '@nuxt/content',
    '@nuxt/icon',
    '@nuxt/fonts',
    '@nuxtjs/i18n',
    '@nuxtjs/tailwindcss',
    '@nuxtjs/color-mode',
    '@primevue/nuxt-module',
    '@vueuse/nuxt',
    'nuxt-lodash'
  ],
  primevue: {
    options: {
      theme: {
        preset: Theme,
        options: {
          darkModeSelector: '.dark-mode',
          cssLayer: {
            name: 'primevue',
            order: 'tailwind-base, primevue, tailwind-utilities'
          }
        }
      },
      ripple: true,
    },
  },
  colorMode: {

  },
  image: {
    format: ['webp']
  },
  i18n: {
    vueI18n: './i18n.config.ts',
    locales: [
      { code: 'en', language: 'en-US', },
      { code: 'es', language: 'es-MX', }
    ],
    defaultLocale: 'en',
  },
  nitro: {
    prerender: {
      routes: [
        '/_ipx/_/images/content/projects/bensbargains.png',
        '/_ipx/_/images/content/projects/carlos-alfonso-stylist.png',
        '/_ipx/_/images/content/projects/cjp-telecom.png',
        '/_ipx/_/images/content/projects/class-a-drivers.png',
        '/_ipx/_/images/content/projects/ekar-de-gas.png',
        '/_ipx/_/images/content/projects/honda-de-mexico.png',
        '/_ipx/_/images/content/projects/redplug.png',
        '/_ipx/_/images/content/projects/visor-logistico.png'
      ]
    }
  },
  runtimeConfig: {
    serverToken: process.env.SERVER_TOKEN,
    public: {
      apiBase: process.env.API_URL
    }
  }
})