

export default function (Alpine) {
    Alpine.store('theme', {
        themes: {
            dim: 'dim',
            bumblebee: 'bumblebee',
            light: 'bumblebee',
            dark: 'dim'
        },
        name: 'dim',
        init() {
            this.name = sessionStorage.getItem('theme') ?? (window.matchMedia('(prefers-color-scheme: dark)').matches ? this.themes.dark : this.themes.light)
        },
        getName() {
            return this.name
        },
        setName(name) {
            sessionStorage.setItem('theme', this.name = name)
        },
        enableDarkMode() {
            this.setName(this.themes.dark)
        },
        disableDarkMode() {
            this.setName(this.themes.light)
        },
        darkMode() {
            return this.name === this.themes.dark
        },
        lightMode() {
            return this.name === this.themes.light
        }
    });
    
    
}

