/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        fontFamily: {
            inter: ["Inter", "sans-serif"],
        },
        extend: {
            colors: {
                primary: "#307C96",
                "primary-100": "#C2F0FF",
                light: "#FAFAFC",
                white: "#fff",
                dark: "#656565",
                black: "#131313",
                warning: "#ef4444",
                orange: "#F90",
            },
        },
    },
    plugins: [],
};
