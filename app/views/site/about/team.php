<section class="w-full min-h-[calc(100vh-80px)] flex flex-col bg-gray-100 py-10 md:py-12">
    <div class="max-w-5xl mx-auto px-6 w-full h-full flex flex-col">
        <!-- TITULO -->
        <div class="text-center mb-12 opacity-0 translate-y-6 transition-all duration-700" id="title">
            <h1 class="text-4xl md:text-5xl font-bold text-[#111D2D]">
                Conoce a Nuestro Equipo
            </h1>
            <div class="w-20 h-1 bg-[#111D2D] mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Contamos con un equipo comprometido con la transparencia, la integridad y la excelencia en auditoría contable y consultoría estratégica.
            </p>
        </div>
        <!-- ================= EQUIPO ================= -->
        <div class="max-w-7xl mx-auto px-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr flex-1 opacity-0 translate-y-10 transition-all duration-700 delay-200" id="card">
            <!-- ===== PERSONA-1 ===== -->
            <div class="group flex flex-col h-full rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-600 bg-[#111D2D]">
                <!-- IMAGEN -->
                <div class="relative w-full h-90 overflow-hidden">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Juana_SantaMaria.webp" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-[#111D2D] via-[#111D2D]/10 to-transparent pointer-events-none"></div>
                    <!-- LinkedIn -->
                    <a href="#" target="_blank" class="absolute top-4 right-4 z-10">
                        <i class="inline-block bi bi-linkedin text-white/80 text-2xl transition hover:text-white hover:scale-120"></i>
                    </a>
                </div>
                <!-- CONTENIDO -->
                <div class="w-full p-5 bg-[#111D2D] text-white flex flex-col flex-1">
                    <h3 class="font-semibold text-lg leading-tight">
                        Mag. Juana Santa María Baca
                    </h3>
                    <p class="text-sm opacity-80 mb-3">
                        Gerente de Finanzas - Auditora
                    </p>
                    <!-- CONTACTO -->
                    <div class="text-sm space-y-1 mb-4">
                        <a href="mailto:jsantamaria@sanemog.com" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                mail
                            </span>
                            <span class="text-white/80 hover:text-white">
                                jsantamaria@sanemog.com
                            </span>
                        </a>
                        <a href="tel:944272013" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                call
                            </span>
                            <span class="text-white/80 hover:text-white">
                                944 272 013
                            </span>
                        </a>
                    </div>
                    <!-- BOTONES -->
                    <div class="flex justify-between mt-auto gap-2">
                        <button onclick="openModal('modalJuana')"
                            class="group/btn relative inline-flex items-center justify-center overflow-hidden 
                                border border-white/50 text-white font-semibold 
                                px-5 py-2 rounded-2xl bg-white/10 backdrop-blur-md
                                shadow-md hover:shadow-xl transition-all duration-300 
                                hover:bg-white hover:text-black hover:scale-105">
                            <span class="text-sm transition-all duration-300 group-hover/btn:-translate-x-2.5">
                                Ver perfil
                            </span>
                            <span class="material-symbols-outlined absolute right-1 
                                        opacity-0 transition-all duration-300 
                                        group-hover/btn:opacity-100
                                        text-[14px] leading-none
                                        [font-variation-settings:'wght'_350,'opsz'_20]">
                                visibility
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ===== PERSONA-2 ===== -->
            <div class="group flex flex-col h-full rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-600 bg-[#111D2D]">
                <!-- IMAGEN -->
                <div class="relative w-full h-90 overflow-hidden">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Elena_Montoya.webp" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-[#111D2D] via-[#111D2D]/10 to-transparent pointer-events-none"></div>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/helena.com26/" target="_blank" class="absolute top-4 right-4 z-10">
                        <i class="inline-block bi bi-instagram text-white/80 text-2xl transition hover:text-white hover:scale-120"></i>
                    </a>
                </div>
                <!-- CONTENIDO -->
                <div class="w-full p-5 bg-[#111D2D] text-white flex flex-col flex-1">
                    <h3 class="font-semibold text-lg leading-tight">
                        Dra. Elena Montoya Quevedo
                    </h3>
                    <p class="text-sm opacity-80 mb-3">
                        Auditora Financiera - Docente
                    </p>
                    <!-- CONTACTO -->
                    <div class="text-sm space-y-1 mb-4">
                        <a href="mailto:emontoya@sanemog.com" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                mail
                            </span>
                            <span class="text-white/80 hover:text-white">
                                emontoya@sanemog.com
                            </span>
                        </a>
                        <a href="tel:944272013" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                call
                            </span>
                            <span class="text-white/80 hover:text-white">
                                944 272 013
                            </span>
                        </a>
                    </div>
                    <!-- BOTONES -->
                    <div class="flex justify-between mt-auto gap-2">
                        <button onclick="openModal('modalElena')"
                            class="group/btn relative inline-flex items-center justify-center overflow-hidden 
                                border border-white/50 text-white font-semibold 
                                px-5 py-2 rounded-2xl bg-white/10 backdrop-blur-md
                                shadow-md hover:shadow-xl transition-all duration-300 
                                hover:bg-white hover:text-black hover:scale-105">
                            <span class="text-sm transition-all duration-300 group-hover/btn:-translate-x-2.5">
                                Ver perfil
                            </span>
                            <span class="material-symbols-outlined absolute right-1 
                                        opacity-0 transition-all duration-300 
                                        group-hover/btn:opacity-100
                                        text-[14px] leading-none
                                        [font-variation-settings:'wght'_350,'opsz'_20]">
                                visibility
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ===== PERSONA-3 ===== -->
            <div class="group flex flex-col h-full rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-600 bg-[#111D2D]">
                <!-- IMAGEN -->
                <div class="relative w-full h-90 overflow-hidden">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Carmen_Mogollon.webp" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-[#111D2D] via-[#111D2D]/10 to-transparent pointer-events-none"></div>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/carmen-lidia-mogollon-obregon/" target="_blank" class="absolute top-4 right-4 z-10">
                        <i class="inline-block bi bi-linkedin text-white/80 text-2xl transition hover:text-white hover:scale-120"></i>
                    </a>
                </div>
                <!-- CONTENIDO -->
                <div class="w-full p-5 bg-[#111D2D] text-white flex flex-col flex-1">
                    <h3 class="font-semibold text-lg leading-tight">
                        Mag. Carmen Mogollón Obregón
                    </h3>
                    <p class="text-sm opacity-80 mb-3">
                        Auditora Financiera - Docente
                    </p>
                    <!-- CONTACTO -->
                    <div class="text-sm space-y-1 mb-4">
                        <a href="mailto:cmogollon@sanemog.com" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                mail
                            </span>
                            <span class="text-white/80 hover:text-white">
                                cmogollon@sanemog.com
                            </span>
                        </a>
                        <a href="tel:944272013" class="flex items-center gap-2 hover:translate-x-1 transition">
                            <span class="material-symbols-outlined text-sm text-white/80 hover:text-white">
                                call
                            </span>
                            <span class="text-white/80 hover:text-white">
                                944 272 013
                            </span>
                        </a>
                    </div>
                    <!-- BOTONES -->
                    <div class="flex justify-between mt-auto gap-2">
                        <button onclick="openModal('modalCarmen')"
                            class="group/btn relative inline-flex items-center justify-center overflow-hidden 
                                border border-white/50 text-white font-semibold 
                                px-5 py-2 rounded-2xl bg-white/10 backdrop-blur-md
                                shadow-md hover:shadow-xl transition-all duration-300 
                                hover:bg-white hover:text-black hover:scale-105">
                            <span class="text-sm transition-all duration-300 group-hover/btn:-translate-x-2.5">
                                Ver perfil
                            </span>
                            <span class="material-symbols-outlined absolute right-1 
                                        opacity-0 transition-all duration-300 
                                        group-hover/btn:opacity-100
                                        text-[14px] leading-none
                                        [font-variation-settings:'wght'_350,'opsz'_20]">
                                visibility
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>

<!-- ================= MODALES ================= -->
<!-- MODAL JUANA -->
<div id="modalJuana" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full relative overflow-hidden shadow-2xl">
        <!-- BOTÓN CERRAR -->
        <button onclick="closeModal('modalJuana')" class="absolute top-4 right-4 z-20 text-black/60 hover:text-black transition">
            <span class="material-symbols-outlined text-xl">
                close
            </span>
        </button>
        <div class="grid md:grid-cols-[auto_1fr]">
            <!-- ================= IMAGEN ================= -->
            <div class="flex items-center justify-center p-3">
                <div class="relative w-auto h-60 md:w-auto md:h-90 rounded-xl overflow-hidden shadow-md">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Juana_SantaMaria.webp" class="w-full h-full object-cover object-top">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>
                    <!-- BOTONES -->
                    <div class="absolute bottom-2 left-3 right-2 flex justify-between items-center">
                        <!-- LINKEDIN -->
                        <a href="#" target="_blank" class="flex items-center justify-center rounded-lg shadow transition">
                            <i class="inline-block bi bi-linkedin text-white/80 text-2xl transition hover:text-white hover:scale-120 duration-600"></i>
                        </a>
                        <!-- CV -->
                        <a href="<?= BASE_URL ?>?url=SantaMaria" title="Ver más detalles" class="group flex items-center bg-white/10 backdrop-blur-xl border border-white/30 text-white p-1 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-white/30 hover:scale-105">
                            <span class="material-symbols-outlined text-base leading-none [font-variation-settings:'wght'_200,'opsz'_20] transition-transform duration-300">
                                visibility
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ================= CONTENIDO ================= -->
            <div class="p-6 md:p-8 flex flex-col justify-start">
                <h3 class="text-3xl font-bold mb-3 text-[#111D2D]">
                    Mag. Juana Santa María Baca
                </h3>
                <!-- CONTACTO -->
                <div class="space-y-2 mb-3 text-base">
                    <a href="mailto:jsantamaria@sanemog.com" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            mail
                        </span>
                        jsantamaria@sanemog.com
                    </a>
                    <a href="tel:944272013" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            call
                        </span>
                        944 272 013
                    </a>
                </div>
                <!-- SEPARADOR -->
                <div class="w-full h-px bg-[#111D2D]/20"></div>
                <!-- INFO -->
                <div class="space-y-2 mt-3 text-base text-stone-700">
                    <p>
                        <strong>Perfil:</strong>
                        Contadora Pública Colegiada con más de 25 años de experiencia en el sector privado. Actualmente, soy socia de SANEMOG CONSULTING S.A.C., especializada en auditoría interna basada en riesgos, control interno y análisis de datos.
                    </p>
                    <p>
                        Me desempeño como perito contable y asesora de alta dirección, aportando soluciones estratégicas en sectores como el farmacéutico, la construcción y los servicios generales. Mi trayectoria incluye más de 15 años en un laboratorio farmacéutico, donde trabajé en las áreas de finanzas y recursos humanos, lo que me ha permitido consolidar una visión integral de la gestión empresarial.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ELENA -->
<div id="modalElena" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full relative overflow-hidden shadow-2xl">
        <!-- BOTÓN CERRAR -->
        <button onclick="closeModal('modalElena')" class="absolute top-4 right-4 z-20 text-black/60 hover:text-black transition">
            <span class="material-symbols-outlined text-xl">
                close
            </span>
        </button>
        <div class="grid md:grid-cols-[auto_1fr]">
            <!-- ================= IMAGEN ================= -->
            <div class="flex items-center justify-center p-3">
                <div class="relative w-auto h-60 md:w-auto md:h-90 rounded-xl overflow-hidden shadow-md">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Elena_Montoya.webp" class="w-full h-full object-cover object-top">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>
                    <!-- BOTONES -->
                    <div class="absolute bottom-2 left-3 right-2 flex justify-between items-center">
                        <!-- INSTAGRAM -->
                        <a href="https://www.instagram.com/helena.com26/" target="_blank" class="flex items-center justify-center rounded-lg shadow transition">
                            <i class="inline-block bi bi-instagram text-white/80 text-2xl transition hover:text-white hover:scale-120 duration-600"></i>
                        </a>
                        <!-- CV -->
                        <a href="<?= BASE_URL ?>?url=Montoya" title="Ver más detalles" class="group flex items-center bg-white/10 backdrop-blur-xl border border-white/30 text-white p-1 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-white/30 hover:scale-105">
                            <span class="material-symbols-outlined text-base leading-none [font-variation-settings:'wght'_200,'opsz'_20] transition-transform duration-300">
                                visibility
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ================= CONTENIDO ================= -->
            <div class="p-6 md:p-8 flex flex-col justify-start">
                <h3 class="text-3xl font-bold mb-3 text-[#111D2D]">
                    Dra. Elena Montoya Quevedo
                </h3>
                <!-- CONTACTO -->
                <div class="space-y-2 mb-3 text-base">
                    <a href="mailto:emontoya@sanemog.com" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            mail
                        </span>
                        emontoya@sanemog.com
                    </a>
                    <a href="tel:944272013" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            call
                        </span>
                        944 272 013
                    </a>
                </div>
                <!-- SEPARADOR -->
                <div class="w-full h-px bg-[#111D2D]/20"></div>
                <!-- INFO -->
                <div class="space-y-2 mt-3 text-base text-stone-700">
                    <p>
                        <strong>Perfil:</strong> 
                        Contadora Pública Colegiada, PhD, con más de 25 años de experiencia en el sector público y privado, principalmente en empresas de seguros, docente universitaria, con el reconocimiento de Dra. Honoris Causa y Dra. Académica, otorgados por prestigiosas entidades académicas.
                        Liderando equipos de trabajo bajo estrategias que combinan valor agregado y proactividad como especialista en auditoría financiera, perito contable y conciliadora extrajudicial.
                    </p>
                    <p>
                        Desempeñandome como socia de SANEMOG CONSULTING S.A.C., especialista en auditoría interna basada en riesgos, control interno y análisis de datos. Además, cuento con una destacada trayectoria en asesorías externas dirigidas a la alta dirección empresarial.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CARMEN -->
<div id="modalCarmen" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-4xl w-full relative overflow-hidden shadow-2xl">
        <!-- BOTÓN CERRAR -->
        <button onclick="closeModal('modalCarmen')" class="absolute top-4 right-4 z-20 text-black/60 hover:text-black transition">
            <span class="material-symbols-outlined text-xl">
                close
            </span>
        </button>
        <div class="grid md:grid-cols-[auto_1fr]">
            <!-- ================= IMAGEN ================= -->
            <div class="flex items-center justify-center p-3">
                <div class="relative w-auto h-60 md:w-auto md:h-90 rounded-xl overflow-hidden shadow-md">
                    <img src="<?= BASE_URL ?>public/assets/img/team/Carmen_Mogollon.webp" class="w-full h-full object-cover object-top">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent"></div>
                    <!-- BOTONES -->
                    <div class="absolute bottom-2 left-3 right-2 flex justify-between items-center">
                        <!-- LINKEDIN -->
                        <a href="https://www.linkedin.com/in/carmen-lidia-mogollon-obregon/" target="_blank" class="flex items-center justify-center rounded-lg shadow transition">
                            <i class="inline-block bi bi-linkedin text-white/80 text-2xl transition hover:text-white hover:scale-120 duration-600"></i>
                        </a>
                        <!-- CV -->
                        <a href="<?= BASE_URL ?>?url=Mogollon" title="Ver más detalles" class="group flex items-center bg-white/10 backdrop-blur-xl border border-white/30 text-white p-1 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-white/30 hover:scale-105">
                            <span class="material-symbols-outlined text-base leading-none [font-variation-settings:'wght'_200,'opsz'_20] transition-transform duration-300">
                                visibility
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- ================= CONTENIDO ================= -->
            <div class="p-6 md:p-8 flex flex-col justify-start">
                <h3 class="text-3xl font-bold mb-3 text-[#111D2D]">
                    Mag. Carmen Lidia Mogollón Obregón
                </h3>
                <!-- CONTACTO -->
                <div class="space-y-2 mb-3 text-base">
                    <a href="mailto:cmogollon@sanemog.com" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            mail
                        </span>
                        cmogollon@sanemog.com
                    </a>
                    <a href="tel:944272013" class="flex items-center gap-2 text-stone-700 hover:text-black transition">
                        <span class="material-symbols-outlined leading-none">
                            call
                        </span>
                        944 272 013
                    </a>
                </div>
                <!-- SEPARADOR -->
                <div class="w-full h-px bg-[#111D2D]/20"></div>
                <!-- INFO -->
                <div class="space-y-2 mt-3 text-base text-stone-700">
                    <p>
                        <strong>Perfil:</strong> 
                        Contadora Pública Colegiada con mas de 12 años de experiencia, en sector privado, como clínicas, cadena de servicios gastronómicos, empresas de servicios y otros. 
                    </p>
                    <p>
                        Socia de SANEMOG CONSULTING SAC, especializada en tributación, perito contable, auditoria financiera, análisis de datos y estudiante de Derecho.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Animación al cargar
    window.addEventListener("load", () => {
        document.getElementById("title").classList.remove("opacity-0", "translate-y-6");
        document.getElementById("card").classList.remove("opacity-0", "translate-y-10");
    });

    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>