export default function (Alpine) {
    Alpine.directive('scroll-into', (el, { expression }, { cleanup }) => {
        
        let handler = () => document.querySelector(expression).scrollIntoView({ behavior: "smooth"})

        el.addEventListener('click', handler)
        
        cleanup(() => {
            el.removeEventListener('click', handler)
        })
    })
}