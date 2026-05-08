<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<script>
    const BASE_URL = '<?= BASE_URL ?>';
</script>
<script src="<?= BASE_URL ?>public/assets/js/booking.js" defer></script>

<section class="py-12 bg-[#f4f7fb] min-h-screen font-sans text-[#0d141b]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <h1 class="text-3xl md:text-4xl font-black tracking-tight">Reserva de citas</h1>
            <p class="text-[#4c739a] mt-2 text-sm md:text-base">Formulario detallado para la solicitud de servicios de consultoría especializada.</p>
        </div> 

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-8 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 transition-all">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-neutral-200 text-[#111D2D] rounded-full flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20">
                            <i class="bi bi-briefcase-fill text-lg"></i>
                        </div>
                        <h2 class="text-xl font-bold text-[#0d141b]">Tipo de Servicio y Consultor</h2>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Tipo de Servicio</label>
                            <div class="relative group">
                                <select id="serviceSelect" name="servicio_id" class="form-input-custom appearance-none flex w-full rounded-lg text-slate-900 focus:outline-0 focus:ring-2 focus:ring-blue-500/50 border border-slate-300 bg-white h-12 px-4 pr-10 text-sm font-normal leading-normal cursor-pointer transition-all">
                                    <option value="" selected disabled class="text-slate-400">Seleccionar Servicio</option>
                                    <?php foreach($servicios as $s): ?>
                                        <option value="<?= $s['id'] ?>" class="text-slate-900">
                                            <?= htmlspecialchars($s['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 group-hover:text-slate-900 transition-colors">
                                    <i class="bi bi-chevron-down text-sm stroke-current stroke-2"></i>
                                </div>
                            </div>
                        </div>
                        <div id="consultantStep" class="opacity-50 pointer-events-none transition-opacity duration-300">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Seleccionar Consultor</label>
                            <div id="consultantGrid" class="space-y-3">
                                <p class="text-xs text-[#4c739a] p-3 border border-dashed border-gray-200 rounded-xl text-center">Selecciona un servicio primero.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="dateStep" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 opacity-50 pointer-events-none transition-opacity duration-300">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-neutral-200 text-[#111D2D] rounded-full flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20">
                            <i class="bi bi-calendar-event-fill text-lg"></i>
                        </div>
                        <h2 class="text-xl font-bold">Fecha y Horario</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-2">
                                <button id="calPrev" class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 rounded-lg text-gray-600 transition-all"><i class="bi bi-chevron-left text-xs"></i></button>
                                <div id="calTitle" class="text-sm font-bold capitalize">--</div>
                                <button id="calNext" class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 rounded-lg text-gray-600 transition-all"><i class="bi bi-chevron-right text-xs"></i></button>
                            </div>
                            <div class="grid grid-cols-7 mb-2 text-center text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                <div>Do</div><div>Lu</div><div>Ma</div><div>Mi</div><div>Ju</div><div>Vi</div><div>Sa</div>
                            </div>
                            <div id="calGrid" class="grid grid-cols-7 gap-1 text-center"></div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-4 text-center">Horas disponibles:</p>
                            <div id="slotGrid" class="grid grid-cols-2 gap-3">
                                <p class="col-span-2 text-xs text-[#4c739a] text-center border border-dashed border-gray-200 rounded-xl p-3">Selecciona una fecha</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="clientStep" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 opacity-50 pointer-events-none transition-opacity duration-300">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-neutral-200 text-[#111D2D] rounded-full flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20">
                            <i class="bi bi-person-vcard-fill text-sm"></i>
                        </div>
                        <h2 class="text-xl font-bold">Datos del Cliente</h2>
                    </div>
                    <form id="bookingForm" method="post" action="<?= BASE_URL ?>?url=booking/confirm" onsubmit="document.getElementById('btnConfirm').disabled = true; document.getElementById('btnConfirm').innerText = 'Procesando...';">
                        <input type="hidden" name="service_id" id="fService">
                        <input type="hidden" name="user_id" id="fConsultor">
                        <input type="hidden" name="date" id="fDate">
                        <input type="hidden" name="time" id="fTime">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">RUC</label>
                                <input type="text" name="ruc" placeholder="Ej. 20614097222" required class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">Razón Social</label>
                                <input type="text" name="razon_social" placeholder="Nombre legal de la empresa" required class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">Nombre del Solicitante</label>
                                <input type="text" name="nombre_contacto" placeholder="Nombre completo" required class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">Teléfono</label>
                                <input type="tel" name="telefono" placeholder="+51 944 272 013" required class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">Correo Electrónico</label>
                                <input type="email" name="email" placeholder="ejemplo@empresa.com" required class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase tracking-wider">Cargo</label>
                                <input type="text" name="cargo" placeholder="Ej. Gerente General" class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                            </div>
                            <div class="md:col-span-2 space-y-1.5">
                                <label class="text-[11px] font-bold text-[#4c739a] uppercase tracking-wider">Industria</label>
                                <select name="tipo_industria" class="w-full p-3 bg-white border border-gray-200 rounded-xl text-sm outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb] transition-all">
                                    <option>Seleccionar Industria</option>
                                    <option>Comercio</option>
                                    <option>Construcción</option>
                                    <option>Tecnología</option>
                                    <option>Logística</option>
                                    <option>Manufactura</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-28">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-[#4c739a] tracking-widest mb-6">Resumen de Cita</h3>
                    <div class="space-y-5">
                        <div class="flex gap-3 items-center">
                            <div class="w-5 h-5 flex items-center justify-center text-[#2563eb] shrink-0 mt-0.5">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400">Servicio</p>
                                <p id="sumService" class="text-lg font-semibold leading-tight mt-0.5">—</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <div class="w-5 h-5 flex items-center justify-center text-[#2563eb] shrink-0 mt-0.5">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400">Consultor</p>
                                <p id="sumConsultant" class="text-lg font-semibold leading-tight mt-0.5">—</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <div class="w-5 h-5 flex items-center justify-center text-[#2563eb] shrink-0 mt-0.5">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400">Fecha y Hora</p>
                                <p id="sumDate" class="text-lg font-semibold leading-tight mt-0.5">—</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col gap-4">
                        <div class="bg-slate-50/70 rounded-2xl p-4 md:p-5 border border-slate-100">
                            <div class="flex items-start gap-3 mb-5 px-1">
                                <span class="material-symbols-outlined text-[#2563eb] text-[18px] mt-0.5">shield_locked</span>
                                <p class="text-xs text-slate-500 leading-relaxed">
                                    Al confirmar, aceptas nuestra 
                                    <a href="<?= BASE_URL ?>?url=privacy" target="_blank" class="font-semibold text-slate-700 underline decoration-slate-300 hover:decoration-[#2563eb] hover:text-[#2563eb] transition-all cursor-pointer">
                                        política de privacidad
                                    </a>
                                    y el tratamiento seguro de tus datos corporativos.
                                </p>
                            </div>
                            <button id="btnConfirm" type="submit" form="bookingForm" disabled 
                                class="group relative w-full py-4 rounded-xl font-bold text-[13px] uppercase tracking-wide text-white bg-[#2563eb] hover:bg-blue-700 disabled:bg-slate-200 disabled:text-slate-400 transition-all duration-300 shadow-lg shadow-blue-600/25 disabled:shadow-none active:scale-[0.98]">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Confirmar Solicitud</span>
                                    <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1 group-disabled:opacity-50 group-disabled:translate-x-0">
                                        arrow_forward
                                    </span>
                                </div>
                            </button>
                        </div>
                        <div class="flex items-center justify-center gap-2 text-center px-4">
                            <p class="text-[11px] text-slate-500 leading-relaxed">
                                Nuestro equipo validará la disponibilidad y enviará el acceso a Zoom/Meet a su correo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#f4f7fb] border border-blue-100 rounded-2xl p-5 flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-[#2563eb] flex items-center justify-center shrink-0">
                        <i class="bi bi-headset text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold">Asistencia Personalizada</h4>
                        <p class="text-xs text-[#4c739a] mt-1 leading-relaxed">
                            ¿Necesita una consultoría presencial o una fecha específica? Escríbenos al <br>
                            <a href="tel:+51944272013" class="font-semibold text-[#111D2D] hover:text-[#2563eb] hover:underline transition-colors">
                                +51 944 272 013
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>