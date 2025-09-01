import "flowbite";
import { initThemeToggle } from "./theme-toggle";
// Init awal saat DOM siap
document.addEventListener("DOMContentLoaded", () => initThemeToggle());
// Re-init setelah navigasi Livewire (kalau kamu pakai wire:navigate)
document.addEventListener("livewire:navigated", () => initThemeToggle());
// setiap pindah halaman dengan wire:navigate
document.addEventListener("livewire:navigated", () => initFlowbite());
