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
    <section class="flex justify-evenly py-4">
      <Button class="px-8" as="router-link" label="Router" :to="localePath({name: 'blog-page', params: {page: page - 1}})" v-if="page != 1">
        ←
      </Button>
      <Button class="px-8" as="router-link" label="Router" :to="localePath({name: 'blog-page', params: {page: page + 1}})" v-if="skip + postsLimit < (totalPosts ?? 0)">
        →
      </Button>
    </section>
  </div>
</template>

<script setup lang="ts">
const localePath = useLocalePath()
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


const page = Number(route.params.page)

const postsLimit = ref(12)
const skip = ref((page - 1) * postsLimit.value)

const { data: totalPosts } = useAsyncData(`blog-posts:count`, () => queryCollection(`esPosts`).count())


const { data: posts } = await useAsyncData(`blog-posts:lang-${locale.value}:page-${page}-limit-${postsLimit.value}`,  () => queryCollection(`esPosts`)
                                              .select('id', 'title', 'path', 'image', 'description')
                                              .limit(postsLimit.value)
                                              .skip(skip.value)
                                              .order('id', 'DESC')
                                              .all(), {
                                                watch: [locale]
                                              })
</script>
