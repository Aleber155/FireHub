<section id="training" class="relative isolate min-h-screen flex flex-col bg-slate-50 overflow-hidden">
    <div class="relative z-10 flex-1 flex items-center">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
        </div>
    
        <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 w-full pt-28 pb-16">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4 text-balance">
                    Programas de Capacitación
                </h2>
                <p class="text-slate-600 text-base leading-relaxed text-pretty">
                    La preparación salva vidas. Nuestros programas de capacitación en seguridad y respuesta ante emergencias están diseñados para brindar a tu equipo las herramientas y conocimientos necesarios para actuar con rapidez y eficacia.
                </p>
            </div>
      
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group cursor-pointer bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-red-100 mb-6 group-hover:bg-red-600 transition-colors duration-300">
                        <span class="material-symbols-outlined text-red-600 text-3xl group-hover:text-white transition-colors">
                            fire_extinguisher
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3 text-balance">
                        Uso y Manejo de Extintores
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed text-pretty">
                        Identificación de tipos de fuego, clasificación de extintores y técnicas de uso correcto para actuar con seguridad en situaciones de emergencia.
                    </p>
                </div>

                <div class="group cursor-pointer bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-blue-100 mb-6 group-hover:bg-blue-600 transition-colors duration-300">
                        <span class="material-symbols-outlined text-blue-600 text-3xl group-hover:text-white transition-colors">
                            health_and_safety
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3 text-balance">
                        Primeros Auxilios Básicos
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed text-pretty">
                        Capacitación en atención inmediata ante accidentes: evaluación primaria, RCP básico, control de hemorragias y estabilización del paciente.
                    </p>
                </div>

                <div class="group cursor-pointer bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-amber-100 mb-6 group-hover:bg-amber-500 transition-colors duration-300">
                        <span class="material-symbols-outlined text-amber-500 text-3xl group-hover:text-white transition-colors">
                            alt_route
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3 text-balance">
                        Plan de Evacuación y Respuesta a Emergencias
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed text-pretty">
                        Formación para identificar rutas de evacuación, roles de brigada y protocolos de actuación ante sismos, incendios u otras emergencias.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-20 bg-slate-900 text-white py-4 xl:py-8 px-6 overflow-hidden">
        <div class="relative max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
            <div class="max-w-xl">
                <h3 class="text-xl xl:text-2xl font-extrabold mb-3 text-balance">
                    ¿Necesitas una capacitación?
                </h3>
                <p class="text-slate-400 text-sm xl:text-base leading-relaxed text-pretty">
                    Nuestro equipo de instructores especializados brinda programas de capacitación adaptados a las necesidades de tu organización para fortalecer la prevención y la respuesta ante emergencias.
                </p>
            </div>
            <a href="<?= BASE_URL ?>?url=contact" class="group cursor-pointer relative inline-flex items-center justify-center overflow-hidden bg-red-600 hover:bg-red-700 text-white font-bold px-10 py-4 rounded-xl shadow-xl hover:shadow-red-600/20 transform hover:-translate-y-1 transition-all duration-300 shrink-0">
                <span class="transition-all duration-400 group-hover:-translate-x-3">
                    Solicitar información
                </span>
                <span class="material-symbols-outlined absolute right-0 translate-x-12 opacity-0 transition-all duration-400 group-hover:-translate-x-5 group-hover:opacity-100">
                    arrow_forward
                </span>
            </a>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', () => {
        if (typeof createFireParticles === 'function') {
            createFireParticles("training");
        } else {
            console.error("El archivo particles.js no está enlazado correctamente");
        }
        
    });
</script>