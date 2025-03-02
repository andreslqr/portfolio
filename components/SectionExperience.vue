<template>
  <div class="min-h-[89vh] container px-2 lg:px-0 mx-auto my-16">
    <h2 class="text-4xl md:text-5xl font-semibold font-serif text-center my-4 md:my-8 capitalize">
      {{ $t('experiencetitle') }}
    </h2>
    <div class="flex justify-center">
      <Timeline :value="jobs" class="w-full md:w-80" :pt:event:class="'md:even:flex-row-reverse'" :pt:event-opposite:class="'flex-none md:flex-1'">
          <template #content="slotProps">
            <div class="rounded-lg mt-4 mb-8 py-4 px-4 transition duration-700 dark:hover:bg-primary-950 hover:bg-primary-300 hover:scale-105 border border-primary-200" :class="{'md:hover:-translate-x-4 hover:translate-x-2 md:text-right': isOnLeft(slotProps.index), 'translate-x-2 md:hover:translate-x-4': ! isOnLeft(slotProps.index)}">
              <NuxtPicture :src="slotProps.item.logo" :img-attrs="{alt: `image of ${slotProps.item.name}`, class: 'h-20 w-auto bg-surface-300 dark:bg-transparent rounded p-2 ' + (isOnLeft(slotProps.index) ? 'md:ml-auto' : ''), height: 150, width: 150}" />
              <h3 class="font-serif text-3xl" v-text="slotProps.item.name">
              </h3>
              <Chip v-text="slotProps.item.year" class="my-2">
              </Chip>
              <p v-text="$t(slotProps.item.description)" class="mt-2">
              </p>
            </div>
          </template>
      </Timeline>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Job } from '~/types';
const jobs: Ref<Job[]> = ref([
  {
    name: 'Internet Brands',
    logo: '/images/internet-brands.png',
    description: 'experienceinternetbrands',
    year: 2024
  },
  {
    name: 'Netcommerce',
    logo: '/images/netcommerce.png',
    description: 'experiencenetcommerce',
    year: 2021
  },
  {
    name: 'CJP Telecom',
    logo: '/images/cjp.png',
    description: 'experiencecjp',
    year: 2020 
  },
  {
    name: 'Congreso del Estado de Jalisco',
    logo: '/images/gob.png',
    description: 'experiencegob',
    year: 2020
  }
])

const isOnLeft = (index: number) => {
  return (index + 1) % 2 == 0
}
</script>