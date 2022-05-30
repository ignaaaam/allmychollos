const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
            '3xl': '1630px',
        },
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'main-gray': '#342E37',
                'light-gray': '#F3EFF5',
                'text-main-gray': '#342E37',
                'text-lighter-gray': '#545456',
                'dark-gray': '#EAE7EA',
                'dark-gray-stroke': '#D4D2D4',
                'card-main-gray': '#342E37',
                'card-light-gray': '#4A444E',
                'category-gray': '#49424D',
                'category-light-gray': '#6a6070',
                'category-lighter-gray': '#807686',
                'button-light-red': '#EB7272',
                'button-dark-red': '#E35656',
                'price-color': '#D39A26',
                'button-light-orange': '#F7B32B',
                'button-dark-orange': '#D39A26',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
