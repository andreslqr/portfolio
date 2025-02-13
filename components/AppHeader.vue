<template>
    <Drawer v-model:visible="showMenu">
        <template #header>
            <HyperText text="ANDRÉS LÓPEZ" class="font-awesome text-2xl text-primary" />
        </template>
        <AppMenu />
        <template #footer>
            <div class="flex items-center gap-2">
                <LangSwitch size="large" class="w-full md:w-auto"></LangSwitch>
            </div>
        </template>
    </Drawer>
    <header class="py-2 sticky top-0 transition-colors duration-500 z-20" :class="{'bg-surface-100 dark:bg-surface-900': showHeaderBackground}">
        <div class="container mx-auto">
            <nav class="flex justify-between p-2 items-center">
                <div class="block md:hidden">
                    <Button text size="large" @click="toggleMenu" severity="secondary">
                        <Icon name="heroicons:bars-3" class="text-2xl"/>
                    </Button>
                </div>
                <div>
                    <AppLogo />
                </div>
                <div class="hidden md:block">
                    <AppMenu />
                </div>
                <div class="block md:hidden">
                    <DarkModeSwitch />
                </div>
            </nav>
        </div>
    </header>
</template>

<script setup lang="ts">
const { y: verticalWindowScroll } = useWindowScroll()
const showMenu = ref(false)
const showHeaderBackground = ref(false)
const scrollThreshold = ref(50)

const toggleMenu = () => {
    showMenu.value = !showMenu.value
}

watch(verticalWindowScroll, async (value) => {
    showHeaderBackground.value = value > scrollThreshold.value
})


</script>