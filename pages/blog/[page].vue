<template>
  <div class="container mx-auto px-2 lg:px-0">
    <h1 class="text-center text-4xl md:text-5xl font-semibold font-serif capitalize my-4">
      {{ $t('blog') }}
    </h1>
    <section class="my-8" id="blog-posts">
      <BlogGrid>
        <BlogCard v-for="post in posts" :key="`blog-${post.id}`" :path="post.path" :title="post.title" :image="post.image" :description="post.description" />
      </BlogGrid>
    </section>
  </div>
</template>

<script setup lang="ts">
/**
 * Definitly WIP untill have +12 posts
 * if you are checking my code portfolio now you know that
 * i leave a product limit on my blog :P
 * i'm not being silly, i just don't have enough scope data
 */
const route = useRoute()
const router = useRouter()
const { t, locale } = useI18n()
const isBlogActive = useIsSpanish()

if(!isBlogActive.value) {
  router.push({ path: '/' })
}

const title = computed(() => `${t('indextitle')} | ${t('blog')}`)
const description = t('blogdescription')

definePageMeta({
  validate: async (route) => {
    return typeof route.params.page === 'string' && /^\d+$/.test(route.params.page)
  }
})

useSeoMeta({
  title,
  description,
  ogTitle: title,
  ogDescription: description,
  ogImage: `/images/index-${locale.value}.png`
})


const page = typeof route.params.page == 'number' ? route.params.page : 1
const postsLimit = ref(12)
const skip = ref(page == 1 ? 0 : page * postsLimit.value)

const { data: posts } = useAsyncData(`blog-posts:lang-${locale.value}:page-${page}-limit-${postsLimit.value}`,  () => queryCollection(`esPosts`)
                                              .select('id', 'title', 'path', 'image', 'description')
                                              .limit(postsLimit.value)
                                              .skip(skip.value)
                                              .order('id', 'DESC')
                                              .all(), {
                                                watch: [locale]
                                              })
</script>
