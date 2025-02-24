<template>
  <div class="h-[89vh] flex flex-col md:flex-row items-center container px-2 lg:px-0 mx-auto mt-8 mb-4">
    <div class="flex flex-col w-full md:w-1/2">
      <h2 class="text-4xl md:text-5xl font-semibold font-serif text-center md:text-start my-4 capitalize">
        {{ $t('contacttitle') }}
      </h2>
      <FloatLabel class="w-full mt-8">
          <Textarea id="message" v-model="body" rows="10" cols="30" class="resize-none w-full" required />
          <label for="message">Tu mensaje:</label>
      </FloatLabel>
      <div class="w-full flex justify-end mt-2">
        <GradientButton :bg-color="bgColor" :href="mailto">
          {{ $t('contactcta') }} 🚀
        </GradientButton>
      </div>
    </div>
    <div class="w-full md:w-1/2 flex justify-center">
      <IconCloud :images="logos" />
    </div>
  </div>
</template>
<script setup lang="ts">
const { t } = useI18n()

const isDark = computed(() => useColorMode().value == "dark")
const bgColor = computed(() => (isDark.value ? "#000" : "#fff"))
const body = ref(t('emailbody'))


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

const logos = slugs.map((slug) => `https://cdn.simpleicons.org/${slug}/${slug}`);

const mailto = computed(() => {
  const mailto = 'mailto'
  const email = 'developer@andreslopez.com.mx'
  const subject = t('emailsubject')

  return `${mailto}:${email}?` + encodeURI(`subject=${subject}&body=${body.value}`)
})
</script>

