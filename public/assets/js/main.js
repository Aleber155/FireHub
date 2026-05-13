// IMPORTANTE: Ruta exacta desde public/assets/js/ hacia public/assets/css/
import '../css/input.css';

import 'flowbite';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
Alpine.start();
window.Swal = Swal;

console.log('FireHub: Conexión exitosa con Vite v4');
