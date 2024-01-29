export default function (Alpine) {
    Alpine.data('contact', () => ({
        messages: [],
        message: null,
        wireId: null,
        nextStep: null,
        init() {
            setTimeout(() => this.startConversation(), 1000)
        },
        setWireId(id) {
            this.wireId = id
        },
        getWire() {
            return Livewire.find(this.wireId)
        },
        sendMessage(message, left = false, error = false) {
            if(! message)
                return 
   
            this.messages.push({
                left,
                content: message,
                time: `${new Date().getHours()}:${new Date().getMinutes()}`,
                key: Date.now(),
                error
            })
        },
        ask(message) {
            this.sendMessage(message, true)
        },
        sendError(error) {
            this.sendMessage(error, true, true)
        },
        reply() {
            this.sendMessage(this.message)
            if(this.nextStep)
                this.nextStep()
            this.message = null
        },
        delayAsks(messages) {
            return new Promise((resolve, reject) => {
                for(let iterator = 0; iterator < messages.length; iterator++) {
                    setTimeout(() => this.ask(messages[iterator]), (iterator + 1) * 1500)
                }
                resolve()
            })
        },
        async startConversation() {
            let messages = await this.getWire().startChat()
            this.delayAsks(messages)
            this.nextStep = () => this.configureName()  
        },
        async configureName() {
            this.getWire().set('name', this.message)
            let message = await this.getWire().checkValidationFor('name')
            
            if(message)
                return this.sendError(message)

            let messages = await this.getWire().getEmailChat()
            this.delayAsks(messages)

            this.nextStep = () => this.configureEmail()

        },
        async configureEmail() {
            this.getWire().set('email', this.message)
            let message = await this.getWire().checkValidationFor('email')
            
            if(message)
                return this.sendError(message)

            let messages = await this.getWire().getMessageChat()
                this.delayAsks(messages)

            this.nextStep = () => this.configureMessage()
        },
        async configureMessage() {
            this.getWire().set('message', this.message)
            let message = await this.getWire().checkValidationFor('message')
            
            if(message)
                return this.sendError(message)

            this.getWire().sendContactEmail()

            let messages = await this.getWire().getGoodbyeChat()
                this.delayAsks(messages)

            this.nextStep = null

        },
    }))
}
