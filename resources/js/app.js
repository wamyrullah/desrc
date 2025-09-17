// import "flowbite";
// import { initThemeToggle } from "./theme-toggle";

// function initAll() {
//     initThemeToggle();
//     initFlowbite();
// }

// // Init awal saat DOM siap
// document.addEventListener("DOMContentLoaded", initAll);

// // Re-init setelah navigasi Livewire (wire:navigate)
// document.addEventListener("livewire:navigated", initAll);

import { initFlowbite, Modal } from "flowbite";
import { initThemeToggle } from "./theme-toggle";

// Init awal
document.addEventListener("DOMContentLoaded", () => {
    try {
        initThemeToggle();
    } catch {}
    try {
        initFlowbite();
    } catch {}
});

// Re-init setelah NAVIGASI (wire:navigate)
document.addEventListener("livewire:navigated", () => {
    try {
        initThemeToggle();
    } catch {}
    try {
        initFlowbite();
    } catch {}
});

// Re-init setelah setiap KOMIT DOM Livewire (submit, update state, dsb.)
document.addEventListener("livewire:initialized", () => {
    // v3 hook resmi
    Livewire.hook("commit", ({ succeed }) => {
        succeed(() => {
            try {
                initFlowbite();
            } catch {}
        });
    });
});

// Tutup modal lewat Flowbite API (sinkron state internalnya)
document.addEventListener("close-modal", (e) => {
    const id = e?.detail?.id || "addRiderModal";
    const el = document.getElementById(id);
    if (!el) return;
    let inst = Modal.getInstance(el);
    if (!inst) inst = new Modal(el, { backdrop: "dynamic", closable: true });
    inst.hide();
});
