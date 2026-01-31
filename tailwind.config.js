/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#1E293B",
                secondary: "#0F172A",
                alam: "#228B22",
                berdaya: "#FF8C00",
                budaya: "#8B4513",
                suara: "#4682B4",
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
