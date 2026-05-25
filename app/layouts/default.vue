<template>
    <NuxtLoadingIndicator :color="false" class="!bg-gradient-to-r !from-primary-500 !to-primary-200 !dark:from-primary-500 !dark:to-primary-950" />
    <main>
  
        <AppHeader />
        <slot />
        <ScrollTop />
        <AppFooter />
    </main>
    <Icon name="heroicons:computer-desktop" class="!hidden" />
    <Icon name="heroicons:sun" class="!hidden" />
    <Icon name="heroicons:moon" class="!hidden" />
    <Icon name="circle-flags:us-um" class="!hidden" />
    <Icon name="circle-flags:mx" class="!hidden"  />
</template>
