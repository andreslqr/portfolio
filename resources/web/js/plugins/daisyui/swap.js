export default function (Alpine) {
    Alpine.data('swap', () => ({
        isOn: false,
        on() {
            this.isOn = true
        },
        off() {
            this.isOn = false
        },
        toggle() {
            this.isOn = ! this.isOn
        }
    }))
}