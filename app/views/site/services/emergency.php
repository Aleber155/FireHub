<section id="emergency" class="relative min-h-screen flex flex-col justify-center overflow-hidden pt-24">

    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('<?= BASE_URL ?>public/assets/img/BACKGROUND-02.png');">
        </div>

        <div class="absolute inset-0 bg-linear-to-br from-background/80 via-background/90 to-background"></div>

        <canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
    </div>

    <div class="px-6 md:px-12 lg:px-24 py-5 xl:py-12">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-3xl">
                <h1 class="text-white text-4xl xl:text-6xl font-black leading-tight tracking-tight text-balance">
                    Servicios de Emergencia
                </h1>

                <p class="text-slate-300 text-lg xl:text-xl leading-relaxed mt-3 xl:mt-6 text-pretty">
                    Respuesta rápida cuando cada segundo cuenta. Equipos preparados para actuar con precisión en emergencias, protegiendo la vida y la tranquilidad de nuestra comunidad.
                </p>
            </div>
        </div>
    </div>

    <div class="px-6 md:px-12 lg:px-24 pb-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-01.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">fire_hydrant</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Combate de Incendios
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Extinción profesional de incendios estructurales y vehiculares mediante tácticas avanzadas y equipo especializado.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-02.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">car_crash</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Rescate Vehicular
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Extricación técnica en accidentes de tránsito con herramientas hidráulicas para salvar vidas atrapadas.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-03.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">health_and_safety</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Atención Médica
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Soporte vital básico y avanzado, estabilización y traslado seguro de pacientes en situaciones críticas.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-04.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">biotech</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Materiales Peligrosos
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Identificación, contención de sustancias químicas y mitigación de riesgos ambientales y de salud.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-05.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">support</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Búsqueda y Rescate
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Maniobras de rescate en estructuras colapsadas, espacios confinados y zonas de difícil acceso para salvaguardar vidas.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

            <div class="group cursor-pointer flex flex-col bg-white/80 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-white/10 h-full">
                <div class="relative h-52 overflow-hidden">
                    <div class="absolute inset-0 bg-red-600/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('<?= BASE_URL ?>public/assets/img/SERVICIO-06.png');">
                    </div>
                    <div class="absolute top-4 left-4 z-20 bg-red-600 text-white p-2.5 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined block text-2xl">pets</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1 text-left">
                    <h3 class="text-slate-900 text-xl font-extrabold mb-3 text-balance">
                        Rescate Animal
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 text-pretty">
                        Asistencia especializada para el rescate y recuperación de mascotas y fauna silvestre en situaciones de peligro.
                    </p>
                    <div class="mt-auto inline-flex items-center text-red-600 font-bold text-sm group/btn">
                        Saber más 
                        <span class="material-symbols-outlined ml-1 text-sm transition-transform group-hover/btn:translate-x-1">arrow_forward</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    window.addEventListener('load', () => {
        if (typeof createFireParticles === 'function') {
            createFireParticles("emergency");
        } else {
            console.error("El archivo particles.js no está enlazado correctamente");
        }
        
    });
</script>