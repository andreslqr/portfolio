<template>
    <Button type="button" severity="secondary" @click="changeTheme">
        <template #icon>
            <Icon :name="selectedTheme.icon" />
        </template>
    </Button>
</template>

<script setup lang="ts">

const themes = ref([
    { 'key': 'system', 'label': 'System', 'icon': 'heroicons:computer-desktop' },
    { 'key': 'light', 'label': 'Light', 'icon': 'heroicons:sun' },
    { 'key': 'dark', 'label': 'Dark', 'icon': 'heroicons:moon' },
])
const colorMode = useColorMode()
const index = ref<number>(0)

index.value = themes.value.findIndex(theme => theme.key === colorMode.preference)
const selectedTheme = ref(themes.value[index.value])
    
const changeTheme = () => {
    index.value = index.value < 2 ? index.value + 1 : 0
    colorMode.preference = themes.value[index.value].key
    selectedTheme.value = themes.value[index.value]
}

</script>