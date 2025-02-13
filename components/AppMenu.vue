<template>
    <ul class="flex flex-col md:flex-row gap-x-4 font-serif items-center">
        <li v-for="menuItem in menuItems" class="w-full md:w-auto">
            <Button as="router-link" label="Router" :to="menuItem.path" text size="large" class="capitalize w-full md:w-auto">
                {{ $t(menuItem.label) }}
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

const menuItems: MenuItem[] = [
    {
        label: 'home',
        path : '/'
    },
    {
        label: 'blog',
        path: '/blog'
    }
]

interface MenuItem {
    label: string
    path: string
}

</script>