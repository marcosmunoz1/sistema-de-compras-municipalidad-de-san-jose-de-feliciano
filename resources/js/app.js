import './bootstrap';


document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("theme-toggle");

    if (themeToggle) {
        themeToggle.addEventListener("click", () => {
            const html = document.documentElement;

            if (html.getAttribute("data-theme") === "dark") {
                html.setAttribute("data-theme", "light");
                localStorage.setItem("theme", "light");
            } else {
                html.setAttribute("data-theme", "dark");
                localStorage.setItem("theme", "dark");
            }
        });
    }

    // Mantener el modo al recargar
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        document.documentElement.setAttribute("data-theme", savedTheme);
    }
});

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