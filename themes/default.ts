import Aura from '@primeuix/themes/aura'
import { definePreset } from '@primeuix/themes'

/** PrimeVue components used in this app (keeps theme CSS lean). */
const usedComponents = [
  'button',
  'chip',
  'drawer',
  'floatlabel',
  'image',
  'tag',
  'textarea',
  'timeline',
  'toast',
  'tooltip',
] as const

const theme = definePreset(Aura, {
  semantic: {
    primary: {
      50: 'var(--color-purple-heart-50)',
      100: 'var(--color-purple-heart-100)',
      200: 'var(--color-purple-heart-200)',
      300: 'var(--color-purple-heart-300)',
      400: 'var(--color-purple-heart-400)',
      500: 'var(--color-purple-heart-500)',
      600: 'var(--color-purple-heart-600)',
      700: 'var(--color-purple-heart-700)',
      800: 'var(--color-purple-heart-800)',
      900: 'var(--color-purple-heart-900)',
      950: 'var(--color-purple-heart-950)',
    },
  },
}) as {
  components?: Record<string, unknown>
  primitive?: Record<string, unknown>
}

if (theme.components) {
  theme.components = Object.fromEntries(
    Object.entries(theme.components).filter(([key]) =>
      (usedComponents as readonly string[]).includes(key),
    ),
  )
}

if (theme.primitive) {
  theme.primitive = {
    borderRadius: theme.primitive.borderRadius,
    slate: theme.primitive.slate,
    zinc: theme.primitive.zinc,
  }
}

export default theme
