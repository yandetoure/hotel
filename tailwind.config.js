import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'primary-ochre': '#C06C3E',
                'primary-blue': '#1A3C5A',
                'primary-green': '#2D5A47',
                'accent-gold': '#D4AF37',
                'sand-light': '#F9F5F0',
            },
        },
    },

    plugins: [forms],
};
