export default function (Alpine) {
    Alpine.data('drawer', () => ({
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