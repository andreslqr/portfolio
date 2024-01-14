

export default function (Alpine) {
    Alpine.store('theme', {
        themes: {
            dim: 'dim',
            bumblebee: 'bumblebee',
            light: 'bumblebee',
            dark: 'dim'
        },
        name: null,
        init() {
            this.name = window.matchMedia('(prefers-color-scheme: dark)').matches ? this.themes.dark : this.themes.light
        },
        getName() {
            return this.name
        },
        setName(name) {
            this.name = name
        },
        enableDarkMode() {
            this.name = this.themes.dark
        },
        disableDarkMode() {
            this.name = this.themes.light
        },
        darkMode() {
            return this.name === this.themes.dark
        },
        lightMode() {
            return this.name === this.themes.light
        }
    });
    
    
}

