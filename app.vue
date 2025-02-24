<template>
  <NuxtLayout>
    <NuxtPage></NuxtPage>
  </NuxtLayout>
</template>

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