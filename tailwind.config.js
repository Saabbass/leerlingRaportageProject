import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            // scrollbar colors
            scrollbarLight: "rgba(74, 144, 226, 0.8)",
            scrollbarLightTrack: "rgba(255, 255, 255, 0.2)",
            scrollbarDark: "rgba(59, 89, 152, 0.8)",
            scrollbarDarkTrack: "rgba(28, 28, 46, 0.2)",

            // Text colors
            primaryLightText: "#FFFFFF",
            secondaryLightText: "#333333",

            primaryDarkText: "#E0E0E0",
            secondaryDarkText: "#FFC107",

            // Placeholder text colors
            primaryLightPlaceholder: "#FFFFFF",
            secondaryLightPlaceholder: "#333333",

            primaryDarkPlaceholder: "#989fac",
            secondaryDarkPlaceholder: "#FFC107",

            // Error text colors
            primaryLightErrorSucces: "#008614",
            primaryLightErrorFailed: "#c00000",
            
            primaryDarkErrorSucces: "#00a318",
            primaryDarkErrorFailed: "#c00e0e",
            
            // Text hover colors
            primaryLightTextHover: "#50E3C2",
            secondaryLightTextHover: "#FFC107",

            primaryDarkTextHover: "#FF6F61",
            secondaryDarkTextHover: "#FFC107",

            // Divide line colors
            primaryLightDevide: "#0a0600",
            secondaryLightDevide: "#F5A623",

            primaryDarkDevide: "#FF6F61",
            secondaryDarkDevide: "#FFC107",

            // Action text colors
            infoLightAction: "#50e3c2",
            createLightAction: "#ffc423",
            acceptLightAction: "#00700c",
            changeLightAction: "#001fc5",
            deleteLightAction: "#be1212",

            infoDarkAction: "#ffcb9c",
            createDarkAction: "#FFC107",
            acceptDarkAction: "#00bd1b",
            changeDarkAction: "#4865ff",
            deleteDarkAction: "#FF6F61",

            // Action text hover colors
            createLightActionHover: "#ffffff",
            acceptLightActionHover: "#ffffff",
            changeLightActionHover: "#ffffff",
            deleteLightActionHover: "#ffffff",

            createDarkActionHover: "#FF6F61",
            acceptDarkActionHover: "#FFC107",
            changeDarkActionHover: "#FFC107",
            deleteDarkActionHover: "#FFC107",

            // Border colors
            primaryLightBorder: "#ffffff",
            secondaryLightBorder: "#333333",

            primaryDarkBorder: "#ffffff",
            secondaryDarkBorder: "#FFC107",

            // Focus colors
            primaryLightFocusRing: "#2563eb",
            secondaryLightFocusRing: "#F5A623",

            primaryDarkFocusRing: "#2563eb",
            secondaryDarkFocusRing: "#FFC107",

            primaryLightFocusBorder: "#2563eb",
            secondaryLightFocusBorder: "#F5A623",

            primaryDarkFocusBorder: "#2563eb",
            secondaryDarkFocusBorder: "#FFC107",

            // demo
            hello: "#1fb6ff",
            pink: "#ff49db",
            orange: "#ff7849",
            green: "#13ce66",
            "gray-dark": "#273444",
            gray: "#8492a6",
            "gray-light": "#d3dce6",
        },
        backgroundColor: {
            // Header nav and footer colors
            primaryLightNav: "#4A90E2",
            secondaryLightNav: "#79b5ff",

            primaryDarkNav: "#3B5998",
            secondaryDarkNav: "#263238",

            // Header dropdown colors
            primaryLightDropdown: "#4A90E2",
            secondaryLightDropdown: "#79b5ff",

            primaryDarkDropdown: "#2E3B4E",
            secondaryDarkDropdown: "#263238",

            // Backgroundcolors
            primaryLightMain: "#F7F8FA",
            secondaryLightMain: "#79b5ff",

            primaryDarkMain: "#1C1C2E",
            secondaryDarkMain: "#263238",

            // Hero section colors
            primaryLightHero: "#4A90E2",
            secondaryLightHero: "#79b5ff",

            primaryDarkHero: "#2E3B4E",
            secondaryDarkHero: "#263238",

            // Button background colors
            primaryLightButton: "#4A90E2",
            secondaryLightButton: "#F5A623",
            cancelLightButton: "#c00000",
            acceptLightButton: "#008614",

            primaryDarkButton: "#2E3B4E",
            secondaryDarkButton: "#3B5998",
            cancelDarkButton: "#930000",
            acceptDarkButton: "#02580f",

            // Button background hover colors
            primaryLightButtonHover: "#357ABD",
            secondaryLightButtonHover: "#F5A623",
            cancelLightButtonHover: "#930000",
            acceptLightButtonHover: "#02580f",

            primaryDarkButtonHover: "#1b2e41",
            secondaryDarkButtonHover: "#FFC107",
            cancelDarkButtonHover: "#c00000",
            acceptDarkButtonHover: "#008614",
        },
    },

    plugins: [forms],
};
