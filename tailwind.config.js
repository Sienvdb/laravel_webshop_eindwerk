const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            // new hex color
            colors: {
                'primary': '#DC3545',
                'red': '#FF6347',
                'danger': '#DC3545',
            },
    
        },
    
    },

    plugins: [require('@tailwindcss/forms')],
};
