<template>
  <div class="min-h-[70vh] container px-2 lg:px-0 mx-auto mt-16 mb-4" v-if="posts && posts.length > 0">
    <h2 class="text-4xl md:text-5xl font-serif font-semibold text-center my-4 capitalize">
      {{ $t('blogtitle') }}
    </h2>
    <p class="text-lg text-center mt-2 mb-4">
      {{ $t('blogdescription') }}
    </p>
    <BlogGrid>
      <BlogCard v-for="post in posts" meteors :key="`blog-${post.id}`" :path="post.path" :title="post.title" :image="post.image" :description="post.description" />
    </BlogGrid>
    <div class="flex justify-center my-8">
      <Button size="large" as="router-link" label="Router" :to="localePath({name: 'blog-page', params: {page: '1'}})">
        {{ $t('readmore') }}
      </Button>
    </div>
  </div>
</template>
<script setup lang="ts">
const { locale } = useI18n()
const localePath = useLocalePath()

const postsLimit = ref(4)

const { data: posts } = await useAsyncData(`blog-posts:limit-${postsLimit.value}:locale-${locale.value}`, () => queryCollection(`${locale.value}Posts`)
                                              .select('id', 'title', 'path', 'image', 'description')
                                              .limit(postsLimit.value)
                                              .order('id', 'DESC')
                                              .all(), {
                                                watch: [locale]
                                              })
</script>
