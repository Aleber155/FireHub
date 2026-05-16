document.addEventListener('DOMContentLoaded', () => {
    const postulationForm = document.getElementById('postulation-form');
    const btnSubmit = document.getElementById('btnSubmitPostulation');
    const btnSubmitText = document.getElementById('btnSubmitTextPostulation');
    const privacyCheck = document.getElementById('p_privacy_check');
    const inputs = document.querySelectorAll('.p-input');

    // --- Lógica del Checkbox de Privacidad ---
    if (privacyCheck && btnSubmit) {
        privacyCheck.addEventListener('change', function() {
            btnSubmit.disabled = !this.checked;
        });
    }

    // --- Validación visual adaptada a Dark Mode ---
    inputs.forEach((input) => {
        input.addEventListener('input', () => {
            input.classList.remove('border-red-500', 'border-green-400');

            if (input.value.trim() === '') {
                input.classList.add('border-red-500');
            } else {
                input.classList.add('border-green-400');
            }
        });
    });

    // --- Lógica de Envío AJAX ---
    if (postulationForm) {
        postulationForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const textoOriginal = btnSubmitText.innerText;
            btnSubmitText.innerText = 'Enviando...';
            btnSubmit.classList.add('opacity-70', 'pointer-events-none');
            btnSubmit.disabled = true;

            const formData = new FormData(this);

            try {
                // Necesitaremos un nuevo endpoint para postulaciones
                const response = await fetch('?url=postulation/processForm', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    alert('¡Postulación enviada! Revisaremos tus datos y te contactaremos.');
                    this.reset(); 
                    
                    inputs.forEach(input => input.classList.remove('border-green-400', 'border-red-500'));
                    btnSubmit.disabled = true;

                } else {
                    alert('Hubo un error al enviar la postulación. Por favor, intente de nuevo.');
                    if (privacyCheck.checked) btnSubmit.disabled = false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error de conexión. Revise su internet e intente de nuevo.');
                if (privacyCheck.checked) btnSubmit.disabled = false;
            } finally {
                btnSubmitText.innerText = textoOriginal;
                btnSubmit.classList.remove('opacity-70', 'pointer-events-none');
            }
        });
    }
});