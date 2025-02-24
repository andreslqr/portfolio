<template>
  <div class="max-w-4xl mx-auto px-2 lg:px-0">
    <h1 class="text-center text-4xl md:text-5xl font-extrabold font-serif mt-4 mb-8">
      {{ post?.title }}
    </h1>
    <p class="text-xs my-4 text-surface-600 dark:text-surface-200">
      {{ $t('publishedby') }} Andrés López
    </p>
    <NuxtImg :src="post?.image" :alt="post?.title" class="rounded mx-auto my-4 w-full shadow-lg" />
    <section id="blog-content">
      <ContentRenderer v-if="post" :value="post" />
    </section>
  </div>
</template>
<script setup lang="ts">
const route = useRoute()
const { t, locale } = useI18n()

const slug = typeof route.params.slug == 'string' ? route.params.slug : ''

const { data: post } = await useAsyncData(slug,  () => queryCollection(`${locale.value}Posts`).path(`/${slug}`).first(), {
                                                watch: [locale]
                                    })


if(post.value == null) {
  showError({
    statusCode: 404,
    statusMessage: t('pagenotfound')
  })
}

useSeoMeta({
  title: post.value?.title,
  description: post.value?.description,
  ogTitle: post.value?.title,
  ogDescription: post.value?.description,
  ogImage: post.value?.image
})
</script>