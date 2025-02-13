<template>
    <NuxtLink :to="localePath('index')">
        <div class="font-awesome text-3xl sm:text-4xl text-primary group">
            <div class="hidden sm:group-hover:block">
                <HyperText
                    text="ANDRÉS LÓPEZ"
                    :duration="800"
                />
            </div>
            <div class="sm:group-hover:hidden">
                <span>AL</span>
            </div>
        </div>
    </NuxtLink>
</template>
<script setup>
const localePath = useLocalePath()
</script>