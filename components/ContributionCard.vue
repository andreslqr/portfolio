<template>
  <figure class="relative w-64 cursor-pointer overflow-hidden rounded-lg border border-surface-300 dark:border-surface-700 bg-surface-50 dark:bg-surface-900 p-2">
    <NuxtImg :src="props.image" :alt="props.title" class="rounded" />
    <h3 class="my-1 text-lg font-semibold font-serif" v-text="props.title">
    </h3>
    <p class="text-m" v-text="props.description">
    </p>
  </figure>
</template>
<script setup lang="ts">
const props = defineProps({
  title: String,
  description: String,
  image: String
})
</script>