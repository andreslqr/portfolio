import colors from 'tailwindcss/colors' 
import daisyUI from 'daisyui'

/** @type {import('tailwindcss').Config} */

export default {
    darkMode: 'class',
    content: [
        "./resources/web/views/**/*.blade.php"
    ],
    theme: {
        extend: {
            colors: {
                
            },
            height: {
                '8-screen': '8vh',
                '92-screen': '92vh',
                '75-screen': '75vh'
            },
            minHeight: {
                '8-screen': '8vh',
                '92-screen': '92vh',
            },
            aspectRatio: {
                'univision': '2/1'
            },
            zIndex: {
                '0': '0',
                '1': '1'
            }
        },
    },
    safelist: [
        'grid-cols-1',
        'md:grid-cols-2',
        'md:grid-cols-2',
        'md:grid-cols-3',
        'md:grid-cols-3'
    ],
    plugins: [
        daisyUI
    ],
    daisyui: {
        themes: [
            'corporate',
            'dim',
        ],
    }
}

