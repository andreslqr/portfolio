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
    server: {
      // Allow Dory / custom hosts without forcing wss:443 (that breaks http://localhost:3000
      // when local HTTPS is not listening, and Brave will keep the tab "loading").
      allowedHosts: [
        'localhost',
        '.dory.local',
        ...(process.env.NUXT_HMR_HOST ? [process.env.NUXT_HMR_HOST] : []),
      ],
      ...(process.env.NUXT_HMR_PROTOCOL || process.env.NUXT_HMR_CLIENT_PORT
        ? {
            hmr: {
              ...(process.env.NUXT_HMR_HOST
                ? { host: process.env.NUXT_HMR_HOST }
                : {}),
              ...(process.env.NUXT_HMR_PROTOCOL
                ? { protocol: process.env.NUXT_HMR_PROTOCOL as 'ws' | 'wss' }
                : {}),
              ...(process.env.NUXT_HMR_CLIENT_PORT
                ? { clientPort: Number(process.env.NUXT_HMR_CLIENT_PORT) }
                : {}),
            },
          }
        : {}),
    },
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
      include: ['Button', 'Chip', 'Drawer', 'FloatLabel', 'Image', 'Tag', 'Textarea', 'Timeline', 'Toast'],
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
