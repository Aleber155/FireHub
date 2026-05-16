/**
 * Lógica del Formulario de Contacto - FireHub
 * Maneja animaciones, validación visual y envío por correo (AJAX).
 */

// --- Funciones Globales ---
// Debe ser global porque el <iframe> del mapa la llama directamente desde el HTML
window.hideMapSkeleton = function () {
    const skeleton = document.getElementById('map-skeleton');
    if (skeleton) {
        skeleton.style.opacity = '0';
        skeleton.style.transition = 'opacity 0.4s ease';
        setTimeout(() => skeleton.remove(), 400);
    }
};

// 1. Animación principal (Se dispara apenas el HTML está listo, sin esperar al mapa)
document.addEventListener('DOMContentLoaded', () => {
    const formCard = document.getElementById('form-card');
    const infoColumn = document.getElementById('info-column');
    const emergencyBanner = document.getElementById('emergency-banner');

    setTimeout(() => {
        // Al quitar opacity-0 y agregar opacity-100 forzamos la aparición
        if (formCard) {
            formCard.classList.remove('opacity-0', 'translate-y-10');
            formCard.classList.add('opacity-100', 'translate-y-0');
        }
        if (infoColumn) {
            infoColumn.classList.remove('opacity-0', 'translate-y-10');
            infoColumn.classList.add('opacity-100', 'translate-y-0');
        }
        if (emergencyBanner) {
            emergencyBanner.classList.remove('opacity-0', 'translate-y-10');
            emergencyBanner.classList.add('opacity-100', 'translate-y-0');
        }
    }, 100);
});

// 2. Lógica de interactividad y envío (Se dispara cuando el DOM está listo)
document.addEventListener('DOMContentLoaded', () => {
    // --- Referencias ---
    const form = document.getElementById('form');
    const inputs = document.querySelectorAll('.input-field');
    const btnSubmit = document.getElementById('btnSubmit');
    const btnSubmitText = document.getElementById('btnSubmitText');
    const privacyCheck = document.getElementById('privacy_check');

    // --- Lógica del Checkbox de Privacidad ---
    if (privacyCheck && btnSubmit) {
        privacyCheck.addEventListener('change', function () {
            // Si el check está marcado (true), el botón NO está deshabilitado (false)
            btnSubmit.disabled = !this.checked;
        });
    }

    // --- Validación visual tipo SaaS ---
    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            // Limpiamos clases previas
            input.classList.remove(
                'border-red-500',
                'border-green-500',
                'focus:ring-red-500',
                'focus:ring-green-500',
            );

            if (input.value.trim() === '') {
                input.classList.add('border-red-500', 'focus:ring-red-500');
            } else {
                input.classList.add('border-green-500', 'focus:ring-green-500');
            }
        });
    });

    // --- Lógica para el envío de Correo (AJAX) ---
    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault(); // Evita la recarga nativa de la página

            // Bloqueamos el botón y cambiamos el texto
            const textoOriginal = btnSubmitText.innerText;
            btnSubmitText.innerText = 'Enviando...';
            btnSubmit.classList.add('opacity-70', 'pointer-events-none');

            // Refuerzo de seguridad: evitamos doble clic
            btnSubmit.disabled = true;

            const formData = new FormData(this);

            try {
                // Endpoint al controlador MVC que procesa el correo
                const response = await fetch('?url=contact/processForm', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    alert('¡Mensaje enviado correctamente! Nos pondremos en contacto pronto.');
                    this.reset(); // Limpia los campos y desmarca el checkbox visualmente

                    // Retiramos los bordes verdes de validación
                    inputs.forEach((input) =>
                        input.classList.remove('border-green-500', 'focus:ring-green-500'),
                    );

                    // SOLUCIÓN AL BUG: Mantenemos el botón apagado porque this.reset() limpió el check
                    btnSubmit.disabled = true;
                } else {
                    alert('Hubo un error al enviar el mensaje. Por favor, intente de nuevo.');
                    // Si hubo error y el check estaba marcado, le devolvemos la vida al botón
                    if (privacyCheck.checked) btnSubmit.disabled = false;
                }
            } catch (error) {
                console.error('Error en petición Fetch:', error);
                alert('Error de conexión. Por favor, revise su internet e intente de nuevo.');
                if (privacyCheck.checked) btnSubmit.disabled = false;
            } finally {
                // Restauramos el botón a la normalidad (textos y clases)
                btnSubmitText.innerText = textoOriginal;
                btnSubmit.classList.remove('opacity-70', 'pointer-events-none');
            }
        });
    }
});
