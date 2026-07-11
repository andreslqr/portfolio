<script setup lang="ts">
const props = defineProps<{
  code?: string
  language?: string | null
  filename?: string | null
  highlights?: number[]
  meta?: string | null
}>()

const { t } = useI18n()
const { copy, copied, isSupported } = useClipboard()

async function copyCode() {
  if (props.code) await copy(props.code)
}
</script>

<template>
  <div class="relative group my-4">
    <button
      v-if="isSupported && code"
      type="button"
      class="absolute top-2 right-2 z-10 p-1.5 rounded-md opacity-0 group-hover:opacity-100 focus:opacity-100 transition-opacity bg-surface-200 dark:bg-surface-800 hover:bg-surface-300 dark:hover:bg-surface-700"
      :aria-label="copied ? t('copied') : t('copy')"
      @click="copyCode"
    >
      <Icon
        :name="copied ? 'heroicons:clipboard-document-check' : 'heroicons:clipboard-document'"
        class="text-lg text-surface-600 dark:text-surface-300"
      />
    </button>
    <pre :class="language ? `language-${language}` : undefined">
      <code><slot /></code>
    </pre>
  </div>
</template>
