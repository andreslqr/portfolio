<script setup lang="ts">
import type { NuxtError } from '#app'
const colorMode = useColorMode()

const props = defineProps({
  error: Object as () => NuxtError
})

const handleError = () => clearError({ redirect: '/' })
</script>

<template>
  <AppHeader />
  <div class="h-[89vh] flex justify-center items-center">
    <ParticlesBackground class="absolute inset-0" :quantity="100" :ease="100"
      :color="colorMode.value == 'dark' ? '#FFF' : '#000'" :staticity="10" refresh>
      </ParticlesBackground>
    <div class="z-10">
      <h2 class="text-primary my-4 text-center text-7xl font-black">{{ error?.statusCode }}</h2>
      <h3 class="text-surface-500 dark:text-surface-300 text-2xl text-center">
        {{ error?.message }}
      </h3>
      <div class="flex justify-center my-4">
        <Button @click="handleError">
          {{ $t('ctaerror') }}
        </Button>
      </div>
    </div>
  </div>
  <AppFooter />
</template>
