import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const btn = document.getElementById("darkModeBtn");

    // Cargar modo guardado
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme) {
        html.setAttribute("data-theme", savedTheme);
    }

    btn.addEventListener("click", () => {
        const current = html.getAttribute("data-theme");
        const newTheme = current === "light" ? "dark" : "light";

        html.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);
    });
});