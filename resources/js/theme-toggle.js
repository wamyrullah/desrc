// resources/js/utils/theme-toggle.js
export function initThemeToggle(
    btnId = "theme-toggle",
    darkIconId = "theme-toggle-dark-icon",
    lightIconId = "theme-toggle-light-icon"
) {
    const btn = document.getElementById(btnId);
    const darkIcon = document.getElementById(darkIconId);
    const lightIcon = document.getElementById(lightIconId);

    if (!btn || !darkIcon || !lightIcon) return;

    // Hindari double listener kalau Livewire re-render
    if (btn.dataset.bound === "1") return;

    const applyIconState = () => {
        const prefDark = window.matchMedia(
            "(prefers-color-scheme: dark)"
        ).matches;
        const stored = localStorage.getItem("color-theme");
        const isDark = stored ? stored === "dark" : prefDark;

        if (isDark) {
            lightIcon.classList.remove("hidden");
            darkIcon.classList.add("hidden");
            document.documentElement.classList.add("dark");
        } else {
            darkIcon.classList.remove("hidden");
            lightIcon.classList.add("hidden");
            document.documentElement.classList.remove("dark");
        }
    };

    applyIconState();

    btn.addEventListener(
        "click",
        () => {
            darkIcon.classList.toggle("hidden");
            lightIcon.classList.toggle("hidden");

            const stored = localStorage.getItem("color-theme");
            // status saat ini (sebelum toggle)
            const isDark = stored
                ? stored === "dark"
                : document.documentElement.classList.contains("dark");

            if (isDark) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        },
        { passive: true }
    );

    btn.dataset.bound = "1";
}
