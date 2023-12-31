/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
        'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],
    theme: {

        fontFamily: {
            "theme-heading": ["'Poppins'", "sans-serif"],
            "theme-content": ["century gothic", "sans-serif"],
        },
        extend: {
            colors: {
                "theme-primary": "#5368DF",
                "theme-secondary": "#348E21",
                "theme-grayish-blue": "#9194A1",
                "theme-dark-blue": "rgb(37, 43, 70)",
                "theme-dark-blue-tp": "rgba(37, 43, 70, 0.9)",
            },
        },

    },
    plugins: [
        require('flowbite/plugin')

    ],
}

