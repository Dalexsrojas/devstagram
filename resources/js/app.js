import './bootstrap';

// resources/js/app.js
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
  once: false,
});

// Si usas Inertia.js o Livewire, reinicializa AOS tras cada navegación:
document.addEventListener('inertia:navigate', () => {
  AOS.refresh();
});