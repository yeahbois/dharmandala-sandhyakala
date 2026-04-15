/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
            "primary": "var(--theme-primary-600, #3755c3)",
            "on-primary": "var(--theme-on-primary, #ffffff)",
            "secondary": "var(--theme-secondary-600, #006d30)",
            "background": "var(--theme-background, #f8f9ff)",
            "surface": "var(--theme-surface, #f8f9ff)",
            "on-surface": "var(--theme-on-surface, #0d1c2f)",
            "surface-variant": "var(--theme-surface-variant, #d5e3fd)",
            "on-surface-variant": "var(--theme-on-surface-variant, #45464d)",
            "outline": "var(--theme-outline, #76777d)",
            "primary-container": "var(--theme-primary-container, #001453)",
            "on-primary-container": "var(--theme-on-primary-container, #607cec)",
            "brand-red": "#be123c",
            "brand-red-dark": "#881337",
            "on-tertiary-container": "#f13f5c",
            "surface-container-lowest": "#ffffff"
        }
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
