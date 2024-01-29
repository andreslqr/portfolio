export default function (Alpine) {
    Alpine.data('timer', () => ({
        currentTime: null,
        init() {
            this.setCurrentTime()
            setInterval(() => this.setCurrentTime(), 60000)
        },
        setCurrentTime() {
            this.currentTime = `${new Date().getHours()}:${new Date().getMinutes()}`
        },
        getCurrentTime() {
            return this.currentTime
        }
    }))
}
