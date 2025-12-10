import './bootstrap';
import $ from "jquery";
window.$ = $;
window.jQuery = $;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggle = document.getElementById("themeToggle");
    if (!toggle) return;

    const THEME_KEY = "theme";
    const LIGHT = "light";
    const DARK = "dark";

    function applyTheme(theme) {
        html.setAttribute("data-theme", theme);
        toggle.checked = theme === DARK;
        localStorage.setItem(THEME_KEY, theme);
    }

    const savedTheme = localStorage.getItem(THEME_KEY);
    if (savedTheme === LIGHT || savedTheme === DARK) {
        applyTheme(savedTheme);
    } else {
        const prefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
        applyTheme(prefersDark ? DARK : LIGHT);
    }

    toggle.addEventListener("change", () => {
        applyTheme(toggle.checked ? DARK : LIGHT);
    });
});