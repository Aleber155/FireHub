/**
 * Lógica del Formulario de Contacto - SANEMOG
 * Maneja animaciones, validación visual, envío por correo (AJAX) y redirección a WhatsApp.
 */

// 1. Animación principal (Se dispara apenas los recursos cargan)
window.addEventListener('load', () => {
    const titleElement = document.getElementById('title');
    const cardElement = document.getElementById('card');

    if (titleElement) titleElement.classList.remove('opacity-0', 'translate-y-6');
    if (cardElement) cardElement.classList.remove('opacity-0', 'translate-y-10');
});

// 2. Lógica de interactividad y envío (Se dispara cuando el DOM está listo)
document.addEventListener('DOMContentLoaded', () => {
    // --- Referencias ---
    const form = document.getElementById('form');
    const inputs = document.querySelectorAll('.input-field');
    const btnWhatsapp = document.getElementById('btnWhatsapp');
    const btnSubmit = document.getElementById('btnSubmit');
    const btnSubmitText = document.getElementById('btnSubmitText');

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

    // --- Lógica para el botón de WhatsApp ---
    if (btnWhatsapp) {
        btnWhatsapp.addEventListener('click', function (e) {
            e.preventDefault(); // Evita que la página salte arriba

            // Capturamos los valores de los inputs (con validación de seguridad si no existen)
            const nombre = document.getElementById('c_nombre')?.value || 'No especificado';
            const email = document.getElementById('c_email')?.value || 'No especificado';
            const celular = document.getElementById('c_celular')?.value || 'No especificado';
            const empresa = document.getElementById('c_empresa')?.value || 'No especificada';
            const ruc = document.getElementById('c_ruc')?.value || 'No especificado';
            const mensaje = document.getElementById('c_mensaje')?.value || 'Sin mensaje adicional.';

            // Construimos el texto del mensaje con un formato corporativo y formal
            const textoWhatsapp = `Estimado equipo de SANEMOG,

Me dirijo a ustedes para solicitar una consulta profesional. A continuación, remito mi información corporativa para que un asesor especializado se ponga en contacto conmigo:

*Datos del Solicitante:*
• *Empresa:* ${empresa}
• *RUC / DNI:* ${ruc}
• *Nombre:* ${nombre}
• *Correo:* ${email}
• *Teléfono:* ${celular}

*Detalle del Requerimiento:*
"${mensaje}"

Quedo a la espera de su pronta comunicación.
Saludos cordiales.`;

            // Redirigimos a WhatsApp
            const numeroDestino = '51944272013';
            const urlWpp = `https://wa.me/${numeroDestino}?text=${encodeURIComponent(textoWhatsapp)}`;
            window.open(urlWpp, '_blank');
        });
    }

    // --- Lógica para el envío de Correo (AJAX) ---
    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault(); // Evita la recarga nativa de la página

            // Bloqueamos el botón y cambiamos el texto
            const textoOriginal = btnSubmitText.innerText;
            btnSubmitText.innerText = 'Enviando...';
            btnSubmit.classList.add('opacity-70', 'pointer-events-none');

            const formData = new FormData(this);

            try {
                // Endpoint al controlador MVC que procesa el correo
                const response = await fetch('?url=contact/processForm', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    alert('¡Mensaje enviado correctamente! Nos pondremos en contacto pronto.');
                    this.reset(); // Limpia los campos del formulario

                    // Retiramos los bordes verdes de validación
                    inputs.forEach((input) =>
                        input.classList.remove('border-green-500', 'focus:ring-green-500'),
                    );
                } else {
                    alert('Hubo un error al enviar el mensaje. Intente de nuevo o use WhatsApp.');
                }
            } catch (error) {
                console.error('Error en petición Fetch:', error);
                alert('Error de conexión. Por favor intente vía WhatsApp.');
            } finally {
                // Restauramos el botón a la normalidad
                btnSubmitText.innerText = textoOriginal;
                btnSubmit.classList.remove('opacity-70', 'pointer-events-none');
            }
        });
    }
});
