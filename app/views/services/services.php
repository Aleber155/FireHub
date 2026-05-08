<!-- SERVICIOS FULL SCREEN -->
<section class="relative w-full min-h-[calc(100vh-80px)] flex items-center overflow-hidden bg-gray-100">
    <div class="max-w-7xl mx-auto px-5 w-full py-10">
        <!-- TITULO -->
        <div class="text-center mb-12 opacity-0 translate-y-6 transition-all duration-700" id="title">
            <h2 class="text-4xl md:text-5xl font-bold text-[#111D2D]">
                Nuestros Servicios
            </h2>
            <div class="w-20 h-1 bg-[#111D2D] mx-auto mt-4 rounded-full"></div>
        </div>
        <!-- GRID -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr opacity-0 translate-y-10 transition-all duration-700 delay-200" id="card">
            <!-- CARD -->
            <div onclick="openModal(0)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-file-earmark-text text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Outsourcing Contable</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Gestión integral de contabilidad: registros, libros, declaraciones, EEFF y asesoría continua.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
            <!-- CARD 2 -->
            <div onclick="openModal(1)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-graph-up-arrow text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Auditoría y Finanzas</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Revisión y análisis financiero, control interno, hallazgos y recomendaciones para decisiones seguras.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
            <!-- CARD 3 -->
            <div onclick="openModal(2)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-shield-check text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Tributación y Legal</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Cumplimiento tributario, planificación, atención de requerimientos y soporte legal empresarial.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
            <!-- CARD 4 -->
            <div onclick="openModal(3)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-person-badge text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Asesoría Laboral</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Contratos, planillas, CTS, gratificaciones, vacaciones, liquidaciones y soporte ante fiscalizaciones.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
            <!-- CARD 5 -->
            <div onclick="openModal(4)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-gear text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Asesoría Administrativa</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Optimización de procesos, control de gestión, mejora continua y orden administrativo para crecer.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
            <!-- CARD 6 -->
            <div onclick="openModal(5)" class="group cursor-pointer bg-white rounded-3xl p-8 shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-[#111D2D]/10 group-hover:scale-110 transition">
                        <i class="bi-journal-check text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D] leading-tight">Peritaje Contable</h3>
                </div>
                <p class="text-gray-600 text-lg mb-6">Informes periciales contables, análisis documentario y sustentos técnicos para procesos y controversias.</p>
                <span class="mt-auto block text-[#111D2D] text-sm font-semibold opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-900 ease-out hover:underline">
                    Saber más →
                </span>
            </div>
        </div>
    </div>
</section>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white rounded-3xl max-w-xl w-full p-10 relative shadow-2xl overflow-hidden animate-fadeIn">
        <!-- ICONO DECORATIVO -->
        <i id="modalIcon" class="bi bi-file-earmark-text blur-sm scale-125 transition-all duration-700 ease-out"></i>
        <!-- CONTENIDO -->
        <div class="relative z-10">
            <button onclick="closeModal()" class="absolute top-0 right-0 text-gray-400 hover:text-black text-xl">
                ✕
            </button>
            <h3 id="modalTitle" class="text-3xl font-bold mb-4 text-[#111D2D]"></h3>
            <p id="modalContent" class="text-lg text-gray-600 mb-6"></p>
            <a href="<?= BASE_URL ?>?url=booking" class="group relative inline-flex items-center justify-center overflow-hidden bg-[#111D2D] hover:bg-[#0D1622] text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                <span class="transition-all duration-300 group-hover:-translate-x-4">
                    Solicitar asesoría
                </span>
                <span class="material-symbols-outlined absolute right-0 translate-x-10 opacity-0 text-xl transition-all duration-300 group-hover:-translate-x-3 group-hover:opacity-100">
                    arrow_forward
                </span>
            </a>
        </div>
    </div>
</div>

<script>
    // Animación al cargar
    window.addEventListener("load", () => {
        document.getElementById("title").classList.remove("opacity-0", "translate-y-6");
        document.getElementById("card").classList.remove("opacity-0", "translate-y-10");
    });

    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modalTitle");
    const modalContent = document.getElementById("modalContent");
    const modalIcon = document.getElementById("modalIcon");

    const servicios = [
        { 
            title:"Outsourcing Contable", 
            content:"En un entorno empresarial cada vez más complejo, delegar la gestión contable no es solo una cuestión de orden, sino de seguridad y crecimiento. Nuestro servicio de Outsourcing Contable ofrece una solución completa que permite a los dueños de negocio y gerentes enfocarse en el core business mientras nosotros garantizamos el cumplimiento normativo y la salud financiera.", 
            icon:"bi-file-earmark-text" 
        },
        { 
            title:"Auditoría y Finanzas", 
            content:"La salud financiera de una organización no se mide solo por sus ingresos, sino por la integridad de su información y la solidez de sus controles. Nuestro servicio de Auditoría y Finanzas proporciona una evaluación objetiva y profunda que permite mitigar riesgos y proyectar un crecimiento sostenible basado en datos reales.", 
            icon:"bi-graph-up-arrow" 
        },
        { 
            title:"Tributación y Legal", 
            content:"Navegar el complejo entorno normativo exige una visión que integre el cumplimiento fiscal con la protección legal. Nuestro servicio de Tributación y Legal está diseñado para que tu empresa opere con total tranquilidad, optimizando su carga impositiva y blindando sus operaciones comerciales frente a contingencias.", 
            icon:"bi-shield-check" 
        },
        { 
            title:"Asesoría Laboral", 
            content:"La correcta administración del capital humano es el pilar de la estabilidad operativa. Nuestro servicio de Asesoría Laboral garantiza que tu empresa cumpla con todas las obligaciones vigentes, evitando sobrecostos por multas y fortaleciendo la relación con tus colaboradores mediante una gestión transparente y técnica.", 
            icon:"bi-person-badge" 
        },
        { 
            title:"Asesoría Administrativa", 
            content:"Una contabilidad sólida necesita una administración eficiente que la respalde. Nuestro servicio de Asesoría Administrativa se enfoca en ordenar la casa, optimizando los recursos y estructurando procesos que permitan a tu empresa escalar sin perder el control de sus operaciones.", 
            icon:"bi-gear" 
        },
        { 
            title:"Peritaje Contable", 
            content:"En situaciones de conflicto económico o procesos judiciales, la claridad técnica es la herramienta más poderosa. Nuestro servicio de Peritaje Contable ofrece un análisis especializado y objetivo de la información financiera, transformando datos complejos en pruebas contundentes y argumentos técnicos que facilitan la toma de decisiones en el ámbito legal.", 
            icon:"bi-journal-check" 
        }
    ];

    function openModal(i){
        modal.classList.remove("hidden");
        modal.classList.add("flex");

        modalTitle.innerText = servicios[i].title;
        modalContent.innerText = servicios[i].content;

        // 👇 CLAVE: actualizar icono correctamente
        modalIcon.className = `bi ${servicios[i].icon} absolute text-[#111D2D] opacity-5 text-[300px] right-[5px] bottom-[-150px] pointer-events-none z-0`;
    }

    function closeModal(){
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    modal.addEventListener("click", e => {
        if(e.target === modal) closeModal();
    });
</script>

<style>
    @keyframes fadeIn {
        from {opacity:0; transform:scale(.95);}
        to {opacity:1; transform:scale(1);}
    }

    .animate-fadeIn { animation: fadeIn .25s ease; }
</style>