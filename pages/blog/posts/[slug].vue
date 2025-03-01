<template>
  <div class="max-w-4xl mx-auto px-2 lg:px-0">
    <div class="leading-loose">
      <h1 class="text-center text-4xl md:text-5xl font-extrabold font-serif mt-4 mb-8">
        {{ post?.title }}
      </h1>
    </div>
    <p class="text-xs my-4 text-surface-600 dark:text-surface-200">
      {{ $t('publishedby') }} Andrés López
    </p>
    <NuxtPicture :src="post?.image" :img-attrs="{alt: post?.title, class: 'rounded mx-auto my-4 w-full shadow-lg dark:shadow-surface-700'}" />
    <section id="blog-content">
      <ContentRenderer v-if="post" :value="post" />
    </section>
    <section class="my-4">
      <div class="flex p-2 md:p-4 dark:bg-surface-950 bg-surface-200 rounded gap-x-2 md:gap-x-4 items-center">
        <NuxtPicture src="/images/me.png" :img-attrs="{alt: 'Andrés López', class: 'w-16 rounded-lg md:w-20'}" />
        <div class="w-auto md:max-w-sm">
          <h2 class="font-serif text-lg md:text-2xl font-bold mb-1">
            Andrés López
          </h2>
          <p class="text-xs md:text-base text-surface-800 dark:text-surface-300">
            {{ $t('medescription') }}
          </p>
        </div>
      </div>
      <div class="flex justify-center my-4">
        <NuxtLink :to="localePath({name: 'blog-page', params: {page: '1'}})" class="text-primary hover:text-primary-500 underline">
          {{ $t('blogback') }}
        </NuxtLink>
      </div>
    </section>
  </div>
</template>
<script setup lang="ts">
const route = useRoute()
const { t, locale } = useI18n()
const localePath = useLocalePath()

const slug = typeof route.params.slug == 'string' ? `/${route.params.slug}` : ''

const { data: post } = await useAsyncData(slug,  () => queryCollection(`${locale.value}Posts`).path(slug).first(), {
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