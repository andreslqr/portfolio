export default function (Alpine) {
    Alpine.data('dropdown', () => ({
        isOpen: false,
        open() {
            this.isOpen = true
        },
        close() {
            this.isOpen = false
        },
        toggle() {
            this.isOpen = ! this.isOpen
        }
    }))
}