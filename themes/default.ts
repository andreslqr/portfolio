import Aura from "@primevue/themes/aura"

import { definePreset } from '@primevue/themes'

export default definePreset(Aura, {
    semantic: {
        primary: {
            50: 'rgb(var(--color-purple-heart-50))',
            100: 'rgb(var(--color-purple-heart-100))',
            200: 'rgb(var(--color-purple-heart-200))',
            300: 'rgb(var(--color-purple-heart-300))',
            400: 'rgb(var(--color-purple-heart-400))',
            500: 'rgb(var(--color-purple-heart-500))',
            600: 'rgb(var(--color-purple-heart-600))',
            700: 'rgb(var(--color-purple-heart-700))',
            800: 'rgb(var(--color-purple-heart-800))',
            900: 'rgb(var(--color-purple-heart-900))',
            950: 'rgb(var(--color-purple-heart-950))'
        }
    }
})