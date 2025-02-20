<template>
  <figure class="relative w-64 cursor-pointer overflow-hidden rounded-lg border border-surface-300 dark:border-surface-700 bg-surface-50 dark:bg-surface-900 p-2">
      <a :href="props.link" target="_blank" rel="noreferrer noopener">
      <NuxtImg :src="props.image" :alt="props.title" class="rounded border border-primary-0" />
      <h3 class="my-1 text-lg font-semibold font-serif" v-text="props.title">
      </h3>
      <p class="text-surface-700 dark:text-surface-300" v-text="props.description">
      </p>
    </a>
    </figure>
</template>
<script setup lang="ts">
const props = defineProps({
  title: String,
  description: String,
  image: String,
  link: String
})
</script>