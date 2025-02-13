<template>
    <Button type="button" severity="secondary" size="large" text @click="changeLang">
   
            <Icon name="circle-flags:us-um" v-if="locale == 'en'" class="text-xl" />
            <Icon name="circle-flags:mx" v-if="locale == 'es'"  class="text-xl" />
    
    </Button>
</template>
<script setup lang="ts">
const { locale, setLocale } = useI18n()

const changeLang = () => {
    setLocale(locale.value == 'en' ? 'es': 'en')
}
</script>