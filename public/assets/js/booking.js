document.addEventListener('DOMContentLoaded', () => {
    // Referencias
    const calGrid = document.getElementById('calGrid');
    const calTitle = document.getElementById('calTitle');
    const slotGrid = document.getElementById('slotGrid');
    const consultantGrid = document.getElementById('consultantGrid');
    const serviceSelect = document.getElementById('serviceSelect');
    const btnConfirm = document.getElementById('btnConfirm');

    // Contenedores de Pasos
    const consultantStep = document.getElementById('consultantStep');
    const dateStep = document.getElementById('dateStep');
    const clientStep = document.getElementById('clientStep');

    // Elementos del Resumen
    const sumService = document.getElementById('sumService');
    const sumConsultant = document.getElementById('sumConsultant');
    const sumDate = document.getElementById('sumDate');

    // Campos del Formulario
    const fService = document.getElementById('fService');
    const fConsultor = document.getElementById('fConsultor');
    const fDate = document.getElementById('fDate');
    const fTime = document.getElementById('fTime');

    let dateContext = new Date();
    let currentMonth = dateContext.getMonth();
    let currentYear = dateContext.getFullYear();
    let selectedDate = null;

    // Aseguramos la URL base. Si falla el script de arriba, asume ruta relativa.
    const apiUrl = typeof BASE_URL !== 'undefined' ? BASE_URL : '';

    const meses = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre',
    ];
    const diasSemana = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];

    // 1. Cambio de Servicio
    serviceSelect.addEventListener('change', async () => {
        const sId = serviceSelect.value;
        const option = serviceSelect.selectedOptions[0];

        // Blindaje: Solo actualiza si el elemento existe en el HTML
        if (sumService) sumService.textContent = option.text.split(' (')[0];
        fService.value = sId;

        // Resetear visualmente
        resetFromStep(1);
        consultantGrid.innerHTML =
            '<p class="text-xs text-blue-500 font-bold animate-pulse p-3 text-center border border-dashed border-blue-200 rounded-xl">Buscando especialistas...</p>';
        activateStep(consultantStep); // ¡Aquí se desbloquea visualmente!

        try {
            const response = await fetch(`${apiUrl}?url=booking/getConsultants&sId=${sId}`);
            if (!response.ok) throw new Error('Error en el servidor');

            const consultants = await response.json();

            if (!Array.isArray(consultants) || consultants.length === 0) {
                consultantGrid.innerHTML =
                    '<p class="text-xs text-red-500 p-3 text-center border border-dashed border-red-200 rounded-xl">No hay especialistas asignados a este servicio.</p>';
                return;
            }
            renderConsultants(consultants);
        } catch (error) {
            console.error('AJAX Error:', error);
            consultantGrid.innerHTML =
                '<p class="text-xs text-red-500 p-3 text-center border border-dashed border-red-200 rounded-xl">Error de conexión.</p>';
        }
    });

    function renderConsultants(list) {
        // Mantenemos la cuadrícula de 3 columnas
        consultantGrid.className = 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3';
        consultantGrid.innerHTML = '';

        list.forEach((con) => {
            const div = document.createElement('div');

            // CAMBIOS CLAVE:
            // 1. items-center: Centra verticalmente el texto y el ícono.
            // 2. min-h-[4.5rem]: Da una altura base para que las cajas de 1 línea midan lo mismo que las de 2.
            // 3. p-4: Un padding ligeramente mayor para respirar mejor.
            div.className =
                'p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-blue-600 hover:bg-blue-50 transition-all flex items-center justify-between group h-full min-h-[4.5rem]';

            div.innerHTML = `
                <div class="pr-2 w-full flex items-center h-full">
                    <p class="text-sm font-semibold text-slate-800 group-hover:text-blue-700 transition-colors line-clamp-2 leading-tight m-0" title="${con.name}">
                        ${con.name}
                    </p>
                </div>
                <div class="check-icon opacity-0 text-blue-600 transition-opacity shrink-0 ml-2 flex items-center">
                    <i class="bi bi-check-circle-fill text-2xl"></i>
                </div>
            `;

            div.onclick = () => selectConsultant(con.id, con.name, div);
            consultantGrid.appendChild(div);
        });
    }

    function selectConsultant(id, name, element) {
        Array.from(consultantGrid.children).forEach((el) => {
            el.classList.remove('border-blue-500', 'bg-blue-50');
            el.querySelector('.check-icon').classList.remove('opacity-100');
            el.querySelector('.check-icon').classList.add('opacity-0');
        });

        element.classList.add('border-blue-500', 'bg-blue-50');
        element.querySelector('.check-icon').classList.remove('opacity-0');
        element.querySelector('.check-icon').classList.add('opacity-100');

        fConsultor.value = id;
        if (sumConsultant) sumConsultant.textContent = name;

        resetFromStep(2);
        activateStep(dateStep);
        renderCalendar(currentMonth, currentYear);
    }

    // 2. Calendario
    function renderCalendar(month, year) {
        calGrid.innerHTML = '';
        calTitle.textContent = `${meses[month]} ${year}`;

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            calGrid.appendChild(document.createElement('div'));
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateIter = new Date(year, month, day);
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = day;

            if (dateIter < today) {
                btn.className =
                    'h-8 w-full rounded-lg text-xs font-bold opacity-30 cursor-not-allowed bg-gray-50 text-gray-400';
                btn.disabled = true;
            } else {
                btn.className =
                    'h-8 w-full rounded-lg text-xs font-bold transition-all hover:bg-blue-50 hover:text-blue-600 text-gray-600';

                const isSelected =
                    selectedDate?.day === day &&
                    selectedDate?.month === month &&
                    selectedDate?.year === year;
                if (isSelected) {
                    btn.className =
                        'h-8 w-full rounded-lg text-xs font-bold bg-blue-600 text-white shadow-md';
                }

                btn.onclick = () => {
                    selectedDate = { day, month, year };
                    fDate.value = `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                    renderCalendar(month, year);
                    loadSlots();
                };
            }
            calGrid.appendChild(btn);
        }
    }

    // 3. Horarios
    async function loadSlots() {
        if (!fConsultor.value || !fDate.value) return;

        slotGrid.innerHTML =
            '<p class="col-span-2 text-center text-[11px] animate-pulse text-blue-500 font-bold p-3 border border-dashed border-blue-200 rounded-xl">Buscando espacios...</p>';

        const params = `uId=${fConsultor.value}&date=${fDate.value}&sId=${fService.value}`;
        try {
            const response = await fetch(`${apiUrl}?url=booking/getSlots&${params}`);
            if (!response.ok) throw new Error('Error al consultar horarios');
            const slots = await response.json();
            renderSlots(slots);
        } catch (error) {
            slotGrid.innerHTML =
                '<p class="col-span-2 text-center text-[11px] text-red-500 font-bold p-3 border border-dashed border-red-200 rounded-xl">Error de servidor.</p>';
        }
    }

    function renderSlots(slots) {
        if (!slotGrid) return;
        slotGrid.innerHTML = '';
        if (!Array.isArray(slots) || slots.length === 0) {
            slotGrid.innerHTML =
                '<p class="col-span-2 text-center text-[11px] text-red-400 font-bold p-3 border border-dashed border-red-200 rounded-xl">Sin horarios disponibles.</p>';
            if (sumDate) sumDate.textContent = '—';
            return;
        }

        slots.forEach((slot) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = slot.inicio;

            // Estado base: fondo blanco, texto gris y los hover claros
            btn.className =
                'py-2.5 border border-blue-200 bg-white rounded-lg text-xs font-bold transition-all text-gray-600 hover:bg-blue-50 hover:text-blue-600';

            btn.onclick = () => {
                // 1. Reiniciar todos los botones al estado inactivo
                Array.from(slotGrid.children).forEach((b) => {
                    // Quitamos las clases del estado activo (incluyendo su hover oscuro)
                    b.classList.remove(
                        'bg-blue-600',
                        'text-white',
                        'border-blue-600',
                        'hover:bg-blue-700',
                    );
                    // Restauramos las clases inefectivas y sus hovers originales
                    b.classList.add(
                        'bg-white',
                        'text-gray-600',
                        'border-blue-200',
                        'hover:bg-blue-50',
                        'hover:text-blue-600',
                    );
                });

                // 2. Activar el botón seleccionado
                // ¡IMPORTANTE! Quitamos el hover:bg-blue-50 y hover:text-blue-600 para que no reaccione al pasar el ratón
                btn.classList.remove(
                    'bg-white',
                    'text-gray-600',
                    'border-blue-200',
                    'hover:bg-blue-50',
                    'hover:text-blue-600',
                );
                // Añadimos el fondo sólido, texto blanco y un hover azul más oscuro (bg-blue-700)
                btn.classList.add(
                    'bg-blue-600',
                    'text-white',
                    'border-blue-600',
                    'hover:bg-blue-700',
                );

                // Guardar valor en el input oculto
                if (fTime) fTime.value = slot.value;

                // Actualizar texto del resumen
                const dateObj = new Date(selectedDate.year, selectedDate.month, selectedDate.day);
                const dayName = diasSemana[dateObj.getDay()];
                const dayPadded = selectedDate.day.toString().padStart(2, '0');
                const shortMonth = meses[selectedDate.month].substring(0, 3);

                if (sumDate)
                    sumDate.textContent = `${dayName}, ${dayPadded} ${shortMonth} ${selectedDate.year} - ${slot.inicio}`;

                // Continuar al formulario de cliente
                activateStep(clientStep);
                validateForm();
            };
            slotGrid.appendChild(btn);
        });
    }

    function activateStep(stepElement) {
        if (stepElement) stepElement.classList.remove('opacity-50', 'pointer-events-none');
    }

    function resetFromStep(stepNumber) {
        if (btnConfirm) btnConfirm.disabled = true;

        if (stepNumber <= 1) {
            fConsultor.value = '';
            if (sumConsultant) sumConsultant.textContent = '—';
            if (consultantStep) consultantStep.classList.add('opacity-50', 'pointer-events-none');
            if (consultantGrid)
                consultantGrid.innerHTML =
                    '<p class="text-xs text-[#4c739a] p-3 border border-dashed border-gray-200 rounded-xl text-center">Selecciona un servicio primero.</p>';
        }
        if (stepNumber <= 2) {
            fDate.value = '';
            fTime.value = '';
            if (sumDate) sumDate.textContent = '—';
            selectedDate = null;
            if (dateStep) dateStep.classList.add('opacity-50', 'pointer-events-none');
            if (slotGrid)
                slotGrid.innerHTML =
                    '<p class="col-span-2 text-xs text-[#4c739a] text-center border border-dashed border-gray-200 rounded-xl p-3">Selecciona una fecha</p>';
        }
        if (stepNumber <= 3) {
            if (clientStep) clientStep.classList.add('opacity-50', 'pointer-events-none');
        }
    }

    function validateForm() {
        if (btnConfirm)
            btnConfirm.disabled = !(
                fService.value &&
                fConsultor.value &&
                fDate.value &&
                fTime.value
            );
    }

    document.getElementById('calPrev').onclick = (e) => {
        e.preventDefault();
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    };

    document.getElementById('calNext').onclick = (e) => {
        e.preventDefault();
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    };
});
