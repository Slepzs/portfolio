const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'mblack': '#121212',
                'mgrey': '#1d1d1d',
                'morange': '#e59a8b'
            },
            boxShadow: {
                link: '0 -4px 0 0 rgba(218, 113, 91, 0.7) inset',
                linkhover: '0 -12px 0 0 rgba(218, 113, 91, 0.7) inset',
            },
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },


    plugins: [require('@tailwindcss/forms')],
};
