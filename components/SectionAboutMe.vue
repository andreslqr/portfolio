<template>
  <div class="min-h-[89vh] flex flex-col md:flex-row items-center container px-2 lg:px-0 mx-auto gap-x-4">
    <div class="flex flex-col items-center w-full md:w-1/2">
        <IconCloud :images="logos" />
    </div>
    <div class="flex flex-col w-full md:w-2/3">
      <h2 class="text-4xl md:text-5xl my-2 font-serif font-semibold">
        {{  $t('aboutme') }}
      </h2>
      <p class="text-lg md:text-xl my-2">
        {{ $t('aboutmedescription') }}
      </p>
      <div class="flex flex-wrap gap-4 md:gap-8 py-4 md:y-8">
        <Tag :value="technology" v-for="technology in technologies"></Tag>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
const slugs = [
  "php",
  "laravel",
  "typescript",
  "html5",
  "css",
  "postgresql",
  "nginx",
  "git",
  "jira",
  "mysql",
  "mariadb",
  "vue.js",
  "javascript",
  "github",
  "gitlab",
  "bitbucket",
  "filament",
  "linux",
  "macos",
  "alpine.js",
  "nuxt",
  "tailwindcss",
  "bootstrap"
]

const technologies = [
  "php",
  "html",
  "css",
  "javascript",
  "laravel",
  "vue",
  "mysql",
  "postgresql"
]

const logos = slugs.map((slug) => `https://cdn.simpleicons.org/${slug}/${slug}`);

</script>