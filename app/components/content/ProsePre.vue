<script setup lang="ts">
const props = defineProps<{
  code?: string
  language?: string | null
  filename?: string | null
  highlights?: number[]
  meta?: string | null
}>()

const { t } = useI18n()
const toast = useToast()
const copied = ref(false)

async function copyCode() {
  if (!props.code) return

  try {
    await navigator.clipboard.writeText(props.code)
    copied.value = true
    toast.add({
      severity: 'success',
      summary: t('copied'),
      detail: t('copieddetail'),
      life: 2500,
    })
    window.setTimeout(() => {
      copied.value = false
    }, 2000)
  }
  catch {
    toast.add({
      severity: 'error',
      summary: t('copyfailed'),
      life: 3000,
    })
  }
}
</script>

<template>
  <div class="relative">
    <button
      v-if="code"
      type="button"
      class="absolute top-2 right-2 z-10 p-1.5 rounded-md bg-surface-200 dark:bg-surface-800 hover:bg-surface-300 dark:hover:bg-surface-700 transition-colors"
      :aria-label="copied ? t('copied') : t('copy')"
      @click="copyCode"
    >
      <Icon
        :name="copied ? 'heroicons:clipboard-document-check' : 'heroicons:clipboard-document'"
        class="text-lg text-surface-600 dark:text-surface-300"
      />
    </button>
    <pre :class="language ? `language-${language}` : undefined"><code><slot /></code></pre>
  </div>
</template>
