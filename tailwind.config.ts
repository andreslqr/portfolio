import type { Config } from 'tailwindcss'

export default <Partial<Config>>{
  darkMode: ['selector', '.dark-mode'],
  plugins: [require('tailwindcss-primeui')],
  content: [
    "./components/**/*.{js,vue,ts}",
    "./pages/**/*.{js,vue,ts}",
    "./layouts/**/*.{js,vue,ts}",
    "./plugins/**/*.{js,vue,ts}",
    "./themes/**/*.{js,vue,ts}",
    "./nuxt.config.{js,vue,ts}",
  ],
  theme: {
    extend: {
      colors: {
        'red-plug': {
          '50': 'rgb(var(--color-red-plug-50))',
          '100': 'rgb(var(--color-red-plug-100))',
          '200': 'rgb(var(--color-red-plug-200))',
          '300': 'rgb(var(--color-red-plug-300))',
          '400': 'rgb(var(--color-red-plug-400))',
          '500': 'rgb(var(--color-red-plug-500))',
          '600': 'rgb(var(--color-red-plug-600))',
          '700': 'rgb(var(--color-red-plug-700))',
          '800': 'rgb(var(--color-red-plug-800))',
          '900': 'rgb(var(--color-red-plug-900))',
          '950': 'rgb(var(--color-red-plug-950))',
        } 
      }
    }
  }
}
