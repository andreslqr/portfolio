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
    'nuxt-lodash',
  ],
  app: {
    pageTransition: { name: 'page', mode: 'out-in' },
    head: {
      script: [
        {
          src: 'https://analytics.ahrefs.com/analytics.js',
          'data-key': 'IsYkb8Q0EGCEgn3+MZJ4jA',
          async: true
        }
      ],
      htmlAttrs: {
        class: 'scroll-smooth'
      },
    },

  },
  primevue: {
    options: {
      theme: {
        preset: Theme,
        options: {
          darkModeSelector: '.dark',
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
    classSuffix: ''
  },
  image: {
    format: ['webp']
  },
  i18n: {
    baseUrl: 'https://andreslopez.com.mx',
    vueI18n: './i18n.config.ts',
    locales: [
      { code: 'en', language: 'en-US', },
      { code: 'es', language: 'es-MX', }
    ],
    defaultLocale: 'en',
  },
  content: {
    build: {
      markdown: {
        highlight: { 
          theme: {
            default: 'slack-ochin',
            dark: 'one-dark-pro',
          },
          langs: [
              'js',
              'json',
              'html',
              'php',
              'sql',
              'vue-html',
              'vue',
              'bash',
              'blade'
          ]
        }
      }
    }
  },
  nitro: {
    prerender: {
      routes: [
        '/_ipx/w_3072&f_webp/images/me-xl.webp',
        '/_ipx/w_2560&f_webp/images/me-xl.webp',
        '/_ipx/w_2048&f_webp/images/me-xl.webp',
        '/_ipx/w_1536&f_webp/images/me-xl.webp',
        '/_ipx/w_1024&f_webp/images/me-xl.webp',
        '/_ipx/w_768&f_webp/images/me-xl.webp',
        '/_ipx/w_640&f_webp/images/me-xl.webp',
        '/_ipx/w_320&f_webp/images/me-xl.webp',
        '/_ipx/s_250x140/images/content/projects/bensbargains.png',
        '/_ipx/s_250x140/images/content/projects/carlos-alfonso-stylist.png',
        '/_ipx/s_250x140/images/content/projects/cjp-telecom.png',
        '/_ipx/s_250x140/images/content/projects/class-a-drivers.png',
        '/_ipx/s_250x140/images/content/projects/ekar-de-gas.png',
        '/_ipx/s_250x140/images/content/projects/honda-de-mexico.png',
        '/_ipx/s_250x140/images/content/projects/redplug.png',
        '/_ipx/s_250x140/images/content/projects/visor-logistico.png',
        '/_ipx/s_500x280/images/content/projects/bensbargains.png',
        '/_ipx/s_500x280/images/content/projects/carlos-alfonso-stylist.png',
        '/_ipx/s_500x280/images/content/projects/cjp-telecom.png',
        '/_ipx/s_500x280/images/content/projects/class-a-drivers.png',
        '/_ipx/s_500x280/images/content/projects/ekar-de-gas.png',
        '/_ipx/s_500x280/images/content/projects/honda-de-mexico.png',
        '/_ipx/s_500x280/images/content/projects/redplug.png',
        '/_ipx/s_500x280/images/content/projects/visor-logistico.png'
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