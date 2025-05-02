// composables/useIsSpanish.ts
export default function useIsSpanish() {
    const { locale } = useI18n()
  
    const isSpanish = computed(() => locale.value === 'es')
  
    return isSpanish
  }