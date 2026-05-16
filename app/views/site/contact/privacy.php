<section id="privacy-policy" class="relative isolate w-full min-h-screen flex flex-col bg-slate-50 overflow-hidden pt-26 lg:pt-26 xl:pt-32">
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <canvas id="particles" class="absolute inset-0"></canvas>
    </div>

    <div class="relative z-10 flex-1 flex items-center pb-20">
        <div class="w-full max-w-4xl mx-auto px-6 sm:px-8">
            
            <div id="privacy-header" class="opacity-0 translate-y-10 transition-all duration-700 ease-out text-center mb-8">
                <h1 class="text-2xl md:text-4xl font-bold text-primary leading-tight">
                    Políticas de Privacidad y Términos de Uso
                </h1>
                <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full shadow-[0_2px_10px_rgba(185,28,28,0.3)]"></div>
            </div>

            <div id="privacy-card" class="opacity-0 translate-y-10 transition-all duration-700 delay-200 ease-out bg-white border border-slate-200 rounded-3xl shadow-2xl p-8 md:p-14 text-slate-600 leading-relaxed space-y-10 relative z-20">

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-900 text-white text-sm font-bold">1</span>
                        <h2 class="text-2xl font-bold text-slate-900">Identidad y Compromiso</h2>
                    </div>
                    <p class="text-lg">
                        En la compañia de bomberos <strong class="text-slate-900 font-bold">Nuevo Milenio B-155</strong>, valoramos y respetamos la privacidad de nuestros usuarios. Este documento detalla cómo recopilamos, protegemos y tratamos la información personal que usted nos proporciona a través de nuestros formularios, cumpliendo estrictamente con la normativa vigente de protección de datos personales.
                    </p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-900 text-white text-sm font-bold">2</span>
                        <h2 class="text-2xl font-bold text-slate-900">Datos que Recopilamos</h2>
                    </div>
                    <p>Al utilizar nuestros servicios de contacto o postulación, recopilamos los datos necesarios para brindar una atención profesional:</p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <li class="flex items-center gap-2 bg-slate-50 p-3 rounded-xl border border-slate-100 hover:border-slate-400 transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-slate-900 text-lg">check_circle</span>
                            Nombres y apellidos completos.
                        </li>
                        <li class="flex items-center gap-2 bg-slate-50 p-3 rounded-xl border border-slate-100 hover:border-slate-400 transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-slate-900 text-lg">check_circle</span>
                            Documento de identidad.
                        </li>
                        <li class="flex items-center gap-2 bg-slate-50 p-3 rounded-xl border border-slate-100 hover:border-slate-400 transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-slate-900 text-lg">check_circle</span>
                            Correo electrónico.
                        </li>
                        <li class="flex items-center gap-2 bg-slate-50 p-3 rounded-xl border border-slate-100 hover:border-slate-400 transition-colors cursor-pointer">
                            <span class="material-symbols-outlined text-slate-900 text-lg">check_circle</span>
                            Número de teléfono.
                        </li>
                    </ul>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-900 text-white text-sm font-bold">3</span>
                        <h2 class="text-2xl font-bold text-slate-900">Finalidad del Tratamiento</h2>
                    </div>
                    <p>La información será utilizada exclusivamente para:</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-900 mt-2.5"></span>
                            <span>Gestionar requerimientos  o postulaciones.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-900 mt-2.5"></span>
                            <span>Coordinar capacitaciones.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-900 mt-2.5"></span>
                            <span>Comunicación relacionada con los servicios solicitados.</span>
                        </li>
                    </ul>
                    <div class="mt-4 p-4 bg-slate-100 border-l-4 border-slate-900 rounded-r-xl">
                        <p class="text-slate-900 font-semibold text-sm">
                            IMPORTANTE: La Compañía de Bomberos Nuevo Milenio B-155, no venderá ni comercializará sus datos bajo ninguna circunstancia.
                        </p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-900 text-white text-sm font-bold">4</span>
                        <h2 class="text-2xl font-bold text-slate-900">Seguridad</h2>
                    </div>
                    <p>
                        Adoptamos medidas técnicas de alto nivel para garantizar la confidencialidad de sus datos, evitando accesos no autorizados mediante protocolos de cifrado y servidores seguros.
                    </p>
                </div>

                <hr class="border-slate-100">

                <div class="flex justify-center">
                    <a href="javascript:history.back()" class="group inline-flex items-center gap-2 text-slate-900 font-black hover:text-red-700 transition-all duration-300 uppercase tracking-widest text-xs">
                        <span class="material-symbols-outlined transition-transform group-hover:-translate-x-1">arrow_back</span>
                        Volver a la página anterior
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    // Lógica de Partículas y Animaciones
    window.addEventListener('load', () => {
        // Inicializar partículas
        if (typeof createFireParticles === 'function') {
            createFireParticles("privacy-policy");
        }

        // Ejecutar animaciones de entrada
        const header = document.getElementById('privacy-header');
        const card = document.getElementById('privacy-card');

        setTimeout(() => {
            if (header) header.classList.remove('opacity-0', 'translate-y-10');
            if (card) card.classList.remove('opacity-0', 'translate-y-10');
        }, 100);
    });
</script>