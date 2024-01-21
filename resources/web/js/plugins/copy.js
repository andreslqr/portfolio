export default function (Alpine) {
    Alpine.directive('copy', (el, { expression }, { cleanup }) => {
        let handler = async () => {
                navigator.clipboard.writeText(expression)
                el.classList.add('tooltip', 'tooltip-open')
                setTimeout(() => el.classList.remove('tooltip', 'tooltip-open'), 1500)
        } 

        el.addEventListener('click', handler)
        
        cleanup(() => {
            el.removeEventListener('click', handler)
        })
    })
}