<template>
  <div class="flex w-full flex-col items-center justify-center">
    <NuxtLink :to="link">
      <div class="relative w-full group">
        <div class="absolute inset-0 size-full scale-[0.80] rounded-full">
        </div>
        <div class="relative flex h-full flex-col items-start justify-end overflow-hidden rounded-lg p-2 shadow group-hover:shadow-lg shadow-surface-200 dark:shadow-surface-700">
          <NuxtImg :src="props.image" class="rounded group-hover:rounded-b-none group-hover:saturate-150 group-hover:scale-105 transition duration-500" />
          <h3 v-text="props.title" class="text-xl font-serif my-2 group-hover:translate-y-1 group-hover:text-primary transition duration-500">
          </h3>
          <p v-text="props.description" class="my-1 text-surface-700 dark:text-surface-300">
          </p>
          <ClientOnly v-if="props.meteors" >
            <Meteors />
          </ClientOnly>
        </div>
      </div>

    </NuxtLink>
    </div>
</template>
<script setup lang="ts">
const localePath = useLocalePath()

const props = defineProps({
  meteors: Boolean,
  title: String,
  image: String,
  path: String,
  description: String
})

const link = computed(() => localePath('blog') + props.path)
</script>