<template>
    <div class="min-h-[89vh] flex flex-col-reverse md:flex-row items-center container px-2 lg:px-0 mx-auto gap-x-4">
        <ParticlesBackground class="absolute inset-0"
            :quantity="100"
            :ease="100"
            :color="colorMode.preference == 'dark' ? '#FFF' : '#000'"
            :staticity="10"
            refresh>
            
        </ParticlesBackground>
        <div class="flex flex-col items-center w-full md:w-1/2 z-10">
            <div>

                <Button raised rounded class="my-4 px-8">
                    {{ $t("iam") }}
                </Button>
                <h1 class="text-5xl md:text-6xl font-semibold my-2">
                    Andrés López
                </h1>
                <span class="text-2xl md:text-3xl font-medium my-2">
                    Full Stack Web Developer
                </span>
                <div class="my-8">
                    <ul>
                        <li class="my-2 hover:text-primary">
                            <a href="mailto:me@andreslopez.com.mx" target="_blank" rel="noreferrer noopener">
                                <Icon name="heroicons:envelope" class="text-primary me-2" />
                                me@andreslopez.com.mx
                            </a>
                        </li>
                        <li class="my-2 hover:text-primary">
                            <a href="https://maps.app.goo.gl/h2treQiJowLVsPAE9" target="_blank" rel="noreferrer noopener">
                                <Icon name="heroicons:map-pin" class="text-primary me-2" />
                                Zapopan, Jalisco
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="flex justify-center gap-x-4">
                    <a href="https://www.linkedin.com/in/andresdevr" target="_blank" rel="noreferrer noopener">
                        <Icon name="mingcute:linkedin-line" class="dark:text-surface-400 text-surface-500 hover:text-primary text-2xl" />
                    </a>
                    <a href="https://github.com/andreslqr" target="_blank" rel="noreferrer noopener">
                        <Icon name="mingcute:github-line" class="dark:text-surface-400 text-surface-500 hover:text-primary text-2xl" />
                    </a>
                    <a href="https://redplug.com.mx" target="_blank" rel="noreferrer noopener">
                        <Icon name="mingcute:plugin-line" class="dark:text-surface-400 text-surface-500 hover:text-primary text-2xl" />
                    </a>
                </ul>
            </div>
        </div>
        <div class="w-full md:w-1/2 flex justify-center">
            <div class="rounded-full">
                <Image src="https://primefaces.org/cdn/primevue/images/galleria/galleria10.jpg" image-class="rounded-full w-60 h-60 md:w-72 md:h-72 lg:w-80 lg:h-80" class="rounded-full" alt="Image" preview :pt:preview-mask:class="'rounded-full'" />
            </div>
        </div>
    </div>
    <div class="min-h-screen"></div>
</template>
<script setup lang="ts">
const colorMode = useColorMode()

</script>