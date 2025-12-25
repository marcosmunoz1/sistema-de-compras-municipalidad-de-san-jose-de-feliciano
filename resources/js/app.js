import './bootstrap';
import $ from "jquery";
window.$ = $;
window.jQuery = $; 

import Alpine from 'alpinejs';

window.selectSearch = function selectSearch({ options, placeholder, value }) {
    const normalize = (s) => {
        if (s === null || typeof s === 'undefined') return '';
        return String(s)
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .trim();
    };

    return {
        open: false,
        search: '',
        selected: null,
        selectedValue: '',
        value,
        options,
        placeholder,

        init() {
            if (this.selectedValue === '' && typeof this.value !== 'undefined' && this.value !== null) {
                this.selectedValue = String(this.value);
            }
            const match = this.options.find(o => String(o.value) === String(this.selectedValue));
            this.selected = match ?? null;
        },

        get filtered() {
            const q = normalize(this.search);
            if (!q) return this.options;

            return this.options.filter(o => {
                const label = normalize(o.label);
                const val = normalize(o.value);
                return label.includes(q) || val.includes(q);
            })
        },

        select(option) {
            this.selected = option
            this.selectedValue = option?.value ?? ''
            this.open = false
            this.search = ''
        }
    }
}

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
