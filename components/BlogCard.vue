<template>
  <div class="flex w-full flex-col items-center justify-center h-full">
    <NuxtLink :to="link" class="h-full">
      <div class="relative w-full h-full group">
        <div class="absolute inset-0 size-full scale-[0.80] rounded-full">
        </div>
        <div class="relative flex h-full flex-col items-start justify-start overflow-hidden rounded-lg p-4 shadow group-hover:shadow-md group-hover:dark:shadow-surface-700 shadow-surface-200 dark:shadow-surface-700">
          <NuxtPicture :src="props.image" class="w-full" :img-attrs="{class: 'rounded group-hover:rounded-b-none group-hover:saturate-150 group-hover:scale-110 transition duration-500 w-full', alt: props.title, width: 350, height: 200}" />
          <h3 v-text="props.title" class="text-xl font-serif my-2 group-hover:translate-y-2 group-hover:text-primary transition duration-500">
          </h3>
          <p v-text="props.description" class="my-1 text-surface-700 dark:text-surface-300 mt-auto group-hover:translate-y-2 transition duration-500">
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

const link = computed(() => localePath({name: 'blog-posts-slug', params: {slug: props.path?.replace('/', '')}}))
</script>