<template>
    <ul class="flex flex-col md:flex-row gap-x-4 font-serif items-center">
        <li class="w-full md:w-auto">
            <Button as="router-link" label="Router" :to="localePath('index')" text size="large" class="capitalize w-full md:w-auto">
                {{ $t('home') }}
            </Button>
        </li>
        <li class="w-full md:w-auto">
            <Button as="router-link" label="Router" :to="localePath({name: 'blog-page', params: {page: '1'}})" text size="large" class="capitalize w-full md:w-auto" :aria-label="$t('blog')">
                {{ $t('blog') }}
            </Button>
        </li>
        <li class="hidden md:block">
            <DarkModeSwitch size="large"></DarkModeSwitch>
        </li>
        <li class="hidden md:block">
            <LangSwitch size="large" class="w-full md:w-auto"></LangSwitch>
        </li>
    </ul>
</template>
<script setup lang="ts">
const localePath = useLocalePath()
</script>