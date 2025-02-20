<template>
  <div class="min-h-[89vh] container px-2 lg:px-0 mx-auto my-16">
    <h2 class="text-4xl md:text-5xl font-serif font-semibold text-center my-4 capitalize">
      {{ $t('projectstitle') }}
    </h2>
    <p class="text-lg text-center my-2">
      {{ $t('projectsdescription') }}
    </p>
    <div class="relative flex flex-col items-center justify-center h-full overflow-hidden"> 
      <Marquee pause-on-hover :reverse="index % 2 == 0" :key="`project-chunk-${index}`" class="[--duration:30s] [--gap:2rem] my-2" v-for="(contributionChunk, index) in contributions">
        <ContributionCard v-for="contribution in contributionChunk" :key="`project-${contribution.id}`"  :title="contribution.title" :image="contribution.image" :description="contribution.description" :link="contribution.link" />
      </Marquee>
      <div class="pointer-events-none absolute inset-y-0 left-0 w-1/5 bg-gradient-to-r from-white dark:from-[#121212]"></div>
      <div class="pointer-events-none absolute inset-y-0 right-0 w-1/5 bg-gradient-to-l from-white dark:from-[#121212]"></div>
    </div>
  </div>
</template>
<script setup lang="ts">
const { locale } = useI18n()

const itemsPerMarquee = ref(4)

const { data } = useAsyncData(`projects:${locale.value}`, () => queryCollection(`${locale.value}Projects`)
                                                                                    .select('id', 'image', 'title', 'description', 'link')
                                                                                    .all(), {
                                                                                      watch: [locale],
                                                                                    })

const contributions = computed(() => {
  return useChunk(data.value, itemsPerMarquee.value)
});

</script>