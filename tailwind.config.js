import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Http/Livewire/Datatable/*.php",
    ],
    plugins: [forms],
    darkMode: 'class',
    // ModalUI
    safelist: [
        {
          pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
          variants: ['sm', 'md', 'lg', 'xl', '2xl']
        }      
      ],
};
