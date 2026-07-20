// https://nuxt.com/docs/api/configuration/nuxt-config
import Theme from "./themes/default"

export default defineNuxtConfig({
  compatibilityDate: '2025-05-25',
  devtools: { enabled: process.env.NODE_ENV !== 'production' },
  sourcemap: {
    server: false,
    client: false,
  },
  vite: {
    optimizeDeps: {
      include: [
        '@vue/devtools-core',
        '@vue/devtools-kit',
        'clsx',
        'motion-v',
        'tailwind-merge',
      ],
    },
    ...(process.env.NUXT_HMR_HOST
      ? {
          server: {
            allowedHosts: [process.env.NUXT_HMR_HOST],
            hmr: {
              protocol: 'wss',
              host: process.env.NUXT_HMR_HOST,
              clientPort: 443,
            },
          },
        }
      : {}),
  },
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
  ],
  css: ['~/assets/css/tailwind.css'],
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
    components: {
      include: ['Button', 'Chip', 'Drawer', 'FloatLabel', 'Image', 'Tag', 'Textarea', 'Timeline'],
    },
    directives: {
      include: ['Tooltip'],
    },
    options: {
      theme: {
        preset: Theme,
        options: {
          darkModeSelector: '.dark',
          cssLayer: {
            name: 'primevue',
            order: 'theme, base, primevue',
          },
        },
      },
      ripple: true,
    },
  },
  colorMode: {
    classSuffix: ''
  },
  image: {
    format: ['webp'],
    screens: {
      xxl: 2560,
      '3xl': 3072,
    }
  },
  i18n: {
    baseUrl: 'https://andreslopez.com.mx',
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
        '/_ipx/s_500x280/images/content/projects/visor-logistico.png',
        '/es/blog/1',
        '/es/blog/2'
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
