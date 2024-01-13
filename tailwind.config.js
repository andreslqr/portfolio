import colors from 'tailwindcss/colors' 

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./resources/web/views/**/*.blade.php"
    ],
    theme: {
        extend: {
            primary: colors.indigo
        },
    },
    plugins: [
    ],
}

