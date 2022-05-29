const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'main-gray': '#342E37',
                'light-gray': '#F3EFF5',
                'text-main-gray': '#342E37',
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
