<template>
    <Drawer v-model:visible="showMenu" header="Red Plug">
        <div>

            <Button label="About" text plain active fluid />
                <Button label="Services" text plain fluid />
                <Button label="Pricing" text plain fluid />
        </div>
    </Drawer>
    <Toolbar>
        <template #start>
            <Button rounded outlined class="px-8 hidden md:block">
                Red Plug
            </Button>
            <Button type="button" severity="secondary" class="block md:hidden" @click="showMenu = true">
                <template #icon>
                    <Icon name="heroicons:bars-3" />
                </template>
            </Button>
            <div class="hidden md:flex gap-x-2 ms-5">
                <Button label="About" text plain active />
                <Button label="Services" text plain />
                <Button label="Pricing" text plain />
            </div>
        </template>

        <template #center>
            <Button rounded outlined class=" px-4 sm:px-8 block md:hidden">
                Red Plug
            </Button>
            
        </template>

        <template #end>
            <div class="flex items-center gap-2">
                <DarkModeSwitch />
            </div>
        </template>
    </Toolbar>
</template>

<script setup lang="ts">

const showMenu = ref(false)

</script>