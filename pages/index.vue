<script setup lang="ts">
import type { DataTablePageEvent } from 'primevue/datatable';

const checked1 = ref(true)
const checked2 = ref(true)
const value = ref()
const color = ref()
const visible = ref(false)
const amberSwitch = ref({
    handle: {
        borderRadius: '4px'
    },
    colorScheme: {
        light: {
            root: {
                checkedBackground: '{amber.500}',
                checkedHoverBackground: '{amber.600}',
                borderRadius: '4px'
            },
            handle: {
                checkedBackground: '{amber.50}',
                checkedHoverBackground: '{amber.100}'
            }
        },
        dark: {
            root: {
                checkedBackground: '{amber.400}',
                checkedHoverBackground: '{amber.300}',
                borderRadius: '4px'
            },
            handle: {
                checkedBackground: '{amber.900}',
                checkedHoverBackground: '{amber.800}'
            }
        }
    }
})

const selectedCities = ref()
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
])

useHead({
    htmlAttrs: {
        class: 'scroll-smooth'
    }
})


const resources = ref()
const res = ref({})

const pageSize = ref(1)
const pageNumber = ref(1)
const lastPage = ref(0)
const totalRecords = ref(0)
const loading = ref(false)

const toast = useToast()

const getResources = async function() {
    
    visible.value = true
    loading.value = true

    try {
        const response = await fetch_Resources({
            page: {
                number: pageNumber.value,
                size: pageSize.value
            }
        })
        res.value = response
        resources.value = response.data
        pageSize.value = response.meta?.page.perPage ?? pageSize.value
        pageNumber.value = response.meta?.page.currentPage ?? pageNumber.value
        lastPage.value = response.meta?.page.lastPage ?? lastPage.value
        totalRecords.value = response.meta?.page.total ?? totalRecords.value
        resources.value = resources.value
    }
    catch(error) {
        toast.add({
            severity: 'error',
            summary: 'Fatal error',
            detail: `Can't connect to Administratix API 'cause: ${error}`
        })
        visible.value = false
    }

    loading.value = false
}

const handlePagination = async function(event: DataTablePageEvent) {
    pageNumber.value = event.page + 1
    pageSize.value = event.rows
    getResources()
}

const { $jsonApi } = useNuxtApp()
</script>

<template>
    <div class="min-h-screen flex flex-col justify-center items-center gap-y-8">
        <h1 class="text-5xl font-semibold">
            General Template
        </h1>
        <p class="text-lg max-w-4xl">
            Bienvenido al template de Red Plug, este template esta preparado para comenzar a desarrollar un sitio
            gracias a las tecnologías descritas debajo, sientete libre de eliminar todo el contenido y construir tu propia aplicación
        </p>
        <div class="flex gap-x-4 gap-y-4 md:gap-y-0 flex-col md:flex-row">
            <Button as="a" href="https://primevue.org" target="_blank"
                v-tooltip.top="'Componentes de Vue ampliamemente personalizables'">
                <Icon name="prime:prime" class="text-3xl"></Icon>
                PrimeVue
            </Button>
            <Button as="a" href="https://nuxt.com/modules/icon" target="_blank"
                v-tooltip.top="'Accede a +200,000 iconos de software libre'">
                <Icon name="logos:nuxt-icon" class=""></Icon>
                Nuxt Icon
            </Button>
            <Button as="a" href="https://nuxt.com/modules/tailwindcss" target="_blank"
                v-tooltip.top="'Personaliza el css sin abandonar el html y los componentes, además ampliamente compatible con PrimeVue'">
                <Icon name="logos:tailwindcss-icon" class=""></Icon>
                Nuxt Tailwind
            </Button>
            <Button as="a" href="https://nuxt.com/modules/tailwindcss" target="_blank"
                v-tooltip.top="'Personaliza el css sin abandonar el html y los componentes, además ampliamente compatible con PrimeVue'">
                <Icon name="heroicons:cloud-16-solid" class="text-xl"></Icon>
                Administratix
            </Button>
        </div>
    </div>
    <div
        class="min-h-screen flex flex-col md:flex-row justify-center items-center gap-y-8 container mx-auto">
        <div class="max-w-lg">
            <h1 class="text-5xl font-semibold animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-zoomin', leaveClass: 'animate-fadeout' }" >
                PrimeVue
            </h1>
            <p class="text-lg animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-zoomin', leaveClass: 'animate-fadeout' }" >
                PrimeVue cuenta con un montón de componentes personalizables, cuenta con una opción de <a
                   class="underline text-primary" href="https://primevue.org/theming/styled" target="_blank">theming general</a> el cual esta platilla
                esta prepara para usar
            </p>
        </div>
        <div class="w-full min-h-screen grid grid-cols-2">
            <div>
                <Card class=" animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-flipleft', leaveClass: 'animate-fadeout' }">
                    <template #header>
                        <img alt="user header" src="https://primefaces.org/cdn/primevue/images/card-vue.jpg" />
                    </template>
                    <template #title>Advanced Card</template>
                    <template #footer>
                        <div class="flex gap-4 mt-1">
                            <Button label="Cancel" severity="secondary" outlined class="w-full" />
                            <Button label="Save" class="w-full" />
                        </div>
                    </template>
                </Card>

                <Image src="https://primefaces.org/cdn/primevue/images/galleria/galleria10.jpg" alt="Image" width="250"
                    preview class="mt-4 mx-auto animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-flipup', leaveClass: 'animate-fadeout' }" />
            </div>
            <div>
                <div>
                    <div class="flex flex-col items-center mb-4 ms-1 animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-flipleft', leaveClass: 'animate-fadeout' }">
                        <div class="font-bold text-xl mb-2">Authenticate Your Account</div>
                        <p class="text-surface-500 dark:text-surface-400 block mb-8">Please enter the code sent to your
                            phone.</p>
                        <InputOtp v-model="value" :length="6" style="gap: 0">
                            <template #default="{ attrs, events, index }">
                                <input type="text" v-bind="attrs" v-on="events"
                                    class="p-inputtext p-component p-inputotp-input" />
                                <div v-if="index === 3" class="px-4">
                                    -
                                </div>
                            </template>
                        </InputOtp>
                        <div class="flex justify-between mt-8 self-stretch">
                            <Button label="Resend Code" link class="p-0"></Button>
                            <Button label="Submit Code"></Button>
                        </div>
                    </div>
                </div>
                <Tabs value="0" class="ms-1 animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-flipup', leaveClass: 'animate-fadeout' }">
                    <TabList>
                        <Tab value="0">Header I</Tab>
                        <Tab value="1">Header II</Tab>
                        <Tab value="2">Header III</Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel value="0">
                            <p class="m-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut
                                aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt
                                mollit anim id est laborum.
                            </p>
                        </TabPanel>
                        <TabPanel value="1">
                            <p class="m-0">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium,
                                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                beatae vitae
                                dicta sunt explicabo. Nemo enim
                                ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                                magni
                                dolores eos qui ratione voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia
                                non numquam
                                eius modi.
                            </p>
                        </TabPanel>
                        <TabPanel value="2">
                            <p class="m-0">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum
                                deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non
                                provident, similique sunt in culpa
                                qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                                rerum facilis
                                est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
                                cumque nihil
                                impedit quo minus.
                            </p>
                        </TabPanel>
                    </TabPanels>
                </Tabs>
            </div>
            <div>
                <Stepper value="1" v-animateonscroll="{ enterClass: 'animate-flipup', leaveClass: 'animate-fadeout' }" class=" animate-duration-1000">
                    <StepList>
                        <Step value="1">Header I</Step>
                        <Step value="2">Header II</Step>
                        <Step value="3">Header III</Step>
                    </StepList>
                    <StepPanels>
                        <StepPanel v-slot="{ activateCallback }" value="1">
                            <div class="flex flex-col h-48">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium">
                                    Content I</div>
                            </div>
                            <div class="flex pt-6 justify-end">
                                <Button label="Next" icon="pi pi-arrow-right" iconPos="right"
                                    @click="activateCallback('2')" />
                            </div>
                        </StepPanel>
                        <StepPanel v-slot="{ activateCallback }" value="2">
                            <div class="flex flex-col h-48">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium">
                                    Content II</div>
                            </div>
                            <div class="flex pt-6 justify-between">
                                <Button label="Back" severity="secondary" icon="pi pi-arrow-left"
                                    @click="activateCallback('1')" />
                                <Button label="Next" icon="pi pi-arrow-right" iconPos="right"
                                    @click="activateCallback('3')" />
                            </div>
                        </StepPanel>
                        <StepPanel v-slot="{ activateCallback }" value="3">
                            <div class="flex flex-col h-48">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium">
                                    Content III</div>
                            </div>
                            <div class="pt-6">
                                <Button label="Back" severity="secondary" icon="pi pi-arrow-left"
                                    @click="activateCallback('2')" />
                            </div>
                        </StepPanel>
                    </StepPanels>
                </Stepper>

            </div>
            <div class="mt-4 ms-4">
                <ColorPicker class=" animate-duration-1000" v-model="color" inline v-animateonscroll="{ enterClass: 'animate-flipleft', leaveClass: 'animate-fadeout' }" />
                <MultiSelect v-model="selectedCities" :options="cities" optionLabel="name" filter placeholder="Select Cities"
                :maxSelectedLabels="3" class="w-full md:w-80 animate-duration-1000" v-animateonscroll="{ enterClass: 'animate-flipright', leaveClass: 'animate-fadeout' }" />
            </div>
        </div>
    </div>
    <div
        class="min-h-screen flex flex-col md:flex-row justify-center items-center gap-y-8 container mx-auto">
        <div  class="w-full grid grid-cols-2 px-8">
            <div class="flex gap-x-2">
                <ToggleSwitch v-model="checked1" />
                <ToggleSwitch v-model="checked2" :dt="amberSwitch" />
            </div>
            <div class="grid grid-cols-2 gap-4 max-h-32">
                <div>
                    <Button label="Submit" :dt="{ borderRadius: 0 }" />
                </div>
                <div>
                    <Button label="Submit" :dt="{ primaryColor: '#00ffff' }" />
                </div>
                <div>
                    <Button label="Submit" :dt="{ borderRadius: '30em' }" />
                </div>
                <div>
                    <Button label="Submit" :dt="{ paddingX: '2em' }" />
                </div>
            </div>
            <div class="col-span-2 flex flex-col gap-y-4 mt-8">
                <Toolbar :dt="{background: '#aa42f5'}">
                    <template #start>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:magnifying-glass" />
                            </template>
                        </Button>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:document-plus" />
                            </template>
                        </Button>
                        <Button severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:arrow-down-tray" />
                            </template>
                        </Button>
                    </template>

                    <template #center>
                        <IconField>
                            <InputIcon>
                                <Icon name="heroicons:magnifying-glass" />
                            </InputIcon>
                            <InputText placeholder="Search" />
                        </IconField>
                    </template>
                </Toolbar>
                <Toolbar :dt="{border: {radius: 0, color: '#aa42f5'}}">
                    <template #start>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:magnifying-glass" />
                            </template>
                        </Button>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:document-plus" />
                            </template>
                        </Button>
                        <Button severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:arrow-down-tray" />
                            </template>
                        </Button>
                    </template>

                    <template #center>
                        <IconField>
                            <InputIcon>
                                <Icon name="heroicons:magnifying-glass" />
                            </InputIcon>
                            <InputText placeholder="Search" />
                        </IconField>
                    </template>
                </Toolbar>
                <Toolbar>
                    <template #start>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:magnifying-glass" />
                            </template>
                        </Button>
                        <Button class="mr-2" severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:document-plus" />
                            </template>
                        </Button>
                        <Button severity="secondary" text>
                            <template #icon>
                                <Icon name="heroicons:arrow-down-tray" />
                            </template>
                        </Button>
                    </template>

                    <template #center>
                        <IconField>
                            <InputIcon>
                                <Icon name="heroicons:magnifying-glass" />
                            </InputIcon>
                            <InputText placeholder="Search" />
                        </IconField>
                    </template>
                </Toolbar>
            </div>
        </div>
        <div class="max-w-lg">
            <h1 class="text-5xl font-semibold">
                PrimeVue - Scoped Tokens
            </h1>
            <p class="text-lg">
                PriveVue es muy flexible y su principal herramienta de personalizalización son los <a class="underline text-primary" href="https://primevue.org/theming/styled/#scopedtokens" target="_blank">scoped tokens</a>, estos
                permiten manejar un estilo unico por cada componente si asi se desea, permitiendo desacoplarlos entre si
                pero manteniendo su funcionalidad
            </p>
        </div>
    </div>
    <div class="min-h-screen flex flex-col justify-center items-center gap-y-8">
        <h1 class="text-5xl font-semibold">
            <Icon name="logos:tailwindcss-icon"></Icon> TailwindCSS
        </h1>
        <p class="text-lg max-w-4xl">
            TailwindCSS es una librería de CSS autogenerado en base a utilidades, lo cual permite agregar CSS sin dejar el HTML, además de contar con un plugin compatible con <Icon name="prime:prime" class="text-xl"></Icon> PrimeVue lo cual nos permite
            tener clases extra como <code class="text-primary text-sm">.text-primary</code> y utilizar la paleta de colores de nuestro tema, para más info lee la <a class="underline text-primary" href="https://primevue.org/tailwind/#plugin" target="_blank"> documentación de integración</a>.
        </p>
        <div class="flex gap-x-4 gap-y-4 md:gap-y-0 flex-col md:flex-row">
            
        </div>
    </div>
    <div class="min-h-screen flex flex-col justify-center items-center gap-y-8">
        <h1 class="text-5xl font-semibold">
            <Icon name="logos:nuxt-icon" class=""></Icon> Nuxt Icon
        </h1>
        <p class="text-lg max-w-4xl">
            Deja de preocuparte por los iconos y comienza a programar, <a href="https://nuxt.com/modules/icon" target="_blank" class="underline text-primary">Nuxt Icon</a> permite acceder a cientos de librerías de iconos de software libre, por ejemplo todos los iconos usados en este template
        </p>
        <div class="flex gap-x-4 gap-y-4 md:gap-y-0 flex-col md:flex-row">
            
        </div>
    </div>
    <div class="min-h-screen flex flex-col justify-center items-center gap-y-8">
        <h1 class="text-5xl font-semibold">
            <Icon name="line-md:cloud-alt" class=""></Icon> Administratix
        </h1>
    
        <p class="text-lg max-w-4xl">
            Administratix es un framework interno de <span class="text-red-plug-500">Red Plug</span> basado en  <Icon name="logos:laravel" /> Laravel  el cual nos permite crear administradores de recursos y compartir estos recuerdos mediante API, puedes hacer una prueba para ver que recursos tiene tu API solo haz click en el siguiente botón
                Recuerda tener configurada la variable .env <code class="text-xs">API_URL</code>
            
        </p>
        <div class="flex gap-x-4 gap-y-4 md:gap-y-0 flex-col md:flex-row">
            <Button @click="getResources">
                <Icon name="svg-spinners:wind-toy" class="text-2xl"/> Try me!
            </Button>
        </div>
        <Dialog v-model:visible="visible" modal header="Resources available" class="w-full md:w-3/4 lg:w-1/2">
            <h3 class="mb-2">
                Tu API cuenta con los siguientes resources para su comsumo (se esta usando un <a href="https://primevue.org/datatable/#lazy_virtualscroll" target="_blank" class="underline text-primary">DataTable proveido por PrimeVue</a> que se actualiza con tu API):
            </h3>
            <DataTable :value="resources" class="w-full" lazy paginator showGridlines :loading="loading" :rows="pageSize" :totalRecords="totalRecords" @page="handlePagination" :rowsPerPageOptions="[1,2,3,4,5,6,7,8,9,10]">
                <Column field="id" header="ID"></Column>
            </DataTable>
            <code class="my-4 text-xs">
<pre>
{{ res }}
</pre>
            </code>
        </Dialog>
        <Toast />
    </div>
</template>