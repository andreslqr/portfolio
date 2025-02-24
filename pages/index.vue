<template>
  <div>
    <section id="welcome">
      <SectionHeroWelcome />
    </section>
    <section id="about-me" class="bg-surface-100 dark:bg-surface-900">
      <SectionAboutMe />
    </section>
    <section id="experience">
      <SectionExperience />
    </section>
    <section id="projects">
      <SectionProjects />
    </section>
    <section id="blog">
      <SectionBlog />
    </section>
    <section id="contact">
      <SectionContact />
    </section>
  </div>
</template>

<script setup lang="ts">
const { t, locale } = useI18n()

const title = computed(() => `${t('indextitle')} | ${t('portfolio')}`)
const description = t('indexdescription')

useSeoMeta({
  title,
  description,
  ogTitle: title,
  ogDescription: description,
  ogImage: `/images/index-${locale.value}.png`
})
</script>