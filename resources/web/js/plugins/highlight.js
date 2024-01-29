import hljs from 'highlight.js'
import javascript from 'highlight.js/lib/languages/javascript'
import php from 'highlight.js/lib/languages/php'
import css from 'highlight.js/lib/languages/css'
import html from 'highlight.js/lib/languages/vbscript-html'
import sql from 'highlight.js/lib/languages/sql'
import bash from 'highlight.js/lib/languages/bash'

hljs.registerLanguage('javascript', javascript)
hljs.registerLanguage('php', php)
hljs.registerLanguage('css', css)
hljs.registerLanguage('html', html)
hljs.registerLanguage('sql', sql)
hljs.registerLanguage('bash', bash)

export default function (Alpine) {
    Alpine.directive('code', (el, { expression }) => {
        el.innerHTML = hljs.highlight(el.textContent, {language: expression}).value
    })
}
