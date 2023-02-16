const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Ubuntu', ...defaultTheme.fontFamily.sans],
            },

            backgroundImage: {
                'product': "url('/storage/background/product2.webp')",
                'construction2': "url('/storage/landing/construction2.jpg')",
                'wood': "url('/storage/background/wood4.jpg')",
              },

            colors: {
                'blue-charcoal': {
                    '50': '#eff2ff',
                    '100': '#dee4ff',
                    '200': '#b5c9ff',
                    '300': '#749cff',
                    '400': '#2a6aff',
                    '500': '#0044f9',
                    '600': '#0031d5',
                    '700': '#0025ac',
                    '800': '#00218e',
                    '900': '#010618',
                },
                
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),require('@tailwindcss/line-clamp'),],
};
