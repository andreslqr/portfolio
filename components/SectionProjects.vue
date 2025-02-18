<template>
  <div class="min-h-[89vh] container px-2 lg:px-0 mx-auto my-16">
    <h2 class="text-4xl md:text-5xl font-semibold text-center my-4 capitalize">
      {{ $t('projectstitle') }}
    </h2>
    <div class="relative flex flex-col items-center justify-center h-full overflow-hidden">
      <ClientOnly>
        <Marquee pause-on-hover class="[--duration:30s] [--gap:2rem] my-2">
          <ContributionCard v-for="contribution in firstRow" :key="contribution.id" :title="contribution.title" :image="contribution.image" :description="contribution.description" />
        </Marquee>
        <Marquee reverse pause-on-hover class="[--duration:30s] [--gap:2rem] my-2">
          <ContributionCard v-for="contribution in secondRow" :key="contribution.id" :title="contribution.title" :image="contribution.image" :description="contribution.description" />
        </Marquee>
      </ClientOnly>
      <div class="pointer-events-none absolute inset-y-0 left-0 w-1/5 bg-gradient-to-r from-white dark:from-[#121212]"></div>
      <div class="pointer-events-none absolute inset-y-0 right-0 w-1/5 bg-gradient-to-l from-white dark:from-[#121212]"></div>
    </div>
  </div>
</template>
<script setup lang="ts">
const { locale } = useI18n()

const { data: contributions, refresh } = useAsyncData(`projects:${locale.value}`, () => queryCollection('content')
                                                                                    .where('path', 'LIKE', `/${locale.value}/projects/%`)
                                                                                    .select('id', 'image', 'title', 'description')
                                                                                    .all(), {
                                                                                      watch: [locale]
                                                                                    })
  

const firstRow = computed(() => {
  const values = contributions.value ?? []
  return values.slice(0, values.length / 2)
});
const secondRow = computed(() => {
  const values = contributions.value ?? []
  return values.slice(values.length / 2)
});
</script>