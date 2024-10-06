import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const primeui = require('tailwindcss-primeui');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/**/*.{vue,js,ts,jsx,tsx}',
        './resources/js/presets/aura/**/*.{vue,js,ts,jsx,tsx}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                card: ["rgba(50, 50, 93, 0.25) 0px 2px 5px -1px", "rgba(0, 0, 0, 0.3) 0px 1px 3px -1px"],
                cardHover: ["rgba(50, 50, 93, 0.25) 0px 13px 27px -5px", "rgba(0, 0, 0, 0.3) 0px 8px 16px -8px"],
            }
        },
    },

    plugins: [forms, primeui],
};
