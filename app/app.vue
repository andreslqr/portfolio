<template>
  <NuxtLayout>
    <NuxtPage></NuxtPage>
  </NuxtLayout>
</template>
<script setup lang="ts">
const i18nHead = useLocaleHead()

useHead(() => ({
  htmlAttrs: {
    lang: i18nHead.value.htmlAttrs!.lang
  },
}))

</script>
<style>
.page-enter-active,
.page-leave-active {
  @apply transition-all duration-200;
}
.page-enter-from,
.page-leave-to {
  @apply opacity-25 grayscale;
}
</style>