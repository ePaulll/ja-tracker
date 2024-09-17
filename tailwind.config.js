import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from "daisyui"

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
           
            colors: {
                'custom-black': '#021526', // Custom color
                'custom-navy': '#03346E', // Another custom color
                'custom-powder': '#D1E9F6', // Another custom color
                'custom-beige': '#E2E2B6', // Another custom color
                'custom-powder-dark': '#6EACDA', // Another custom color
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, daisyui],
    
    daisyui: {
        themes: ["dark", "light", "cupcake"],
      },
    
};
