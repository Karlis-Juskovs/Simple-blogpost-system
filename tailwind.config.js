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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        'border-gray-400',
        'border-blue-400',
        'border-red-400',
        'hover:bg-gray-400',
        'hover:bg-blue-400',
        'hover:bg-red-400',
        'focus:bg-gray-600',
        'focus:bg-blue-600',
        'focus:bg-red-600',
    ],

    plugins: [forms],
};
