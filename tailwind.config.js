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
                '92-screen': '92vh'
            },
            minHeight: {
                '8-screen': '8vh',
                '92-screen': '92vh'
            } 
        },
    },
    plugins: [
        daisyUI
    ],
    daisyui: {
        themes: [
            'bumblebee',
            'dim',
        ],
    }
}

