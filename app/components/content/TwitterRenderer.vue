<template>
  <div class="flex justify-center">
    <blockquote class="twitter-tweet" :data-theme="colorMode.value">
       <a :href="props.url"></a>
    </blockquote>
  </div>
  <ClientOnly>
    <Teleport to="#teleports">
      <component is="script" v-once async src="https://platform.twitter.com/widgets.js" charset="utf-8"></component>
    </Teleport>
  </ClientOnly>
</template>

<script setup lang="ts">
const colorMode = useColorMode()

const props = defineProps({
  url: {
    type: String
  }
})
</script>