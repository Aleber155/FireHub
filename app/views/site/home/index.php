<section id="inicio" class="w-full flex flex-col">
    
    <div class="relative w-full min-h-[60vh] flex items-center overflow-hidden py-20">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: linear-gradient(rgba(10,10,10,0.75), rgba(10,10,10,0.75)), url('<?= BASE_URL ?>public/assets/img/HERO.png');">
        </div>
        
        <div class="relative w-full max-w-7xl mx-auto px-6 text-white">
            <div class="max-w-2xl">
                <span class="inline-block bg-red-700 px-4 py-1.5 text-xs font-bold tracking-widest uppercase mb-6 rounded shadow-lg shadow-red-700/30">
                    Compañía de Bomberos
                </span>
                <h2 class="text-5xl md:text-6xl font-black leading-tight mb-6">
                    Comprometidos con la vida, el servicio y la comunidad
                </h2>
                <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed">
                    Valor, disciplina y sacrificio al servicio de nuestra comunidad las 24 horas del día.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?= BASE_URL ?>?url=history" class="group relative inline-flex items-center justify-center overflow-hidden bg-red-700 hover:bg-red-600 text-white font-bold px-8 py-4 rounded-xl shadow-[0_0_20px_rgba(185,28,28,0.4)] hover:shadow-[0_0_25px_rgba(185,28,28,0.6)] transform hover:-translate-y-1 transition-all duration-300 shrink-0">
                        <span class="transition-all duration-300 group-hover:-translate-x-2">
                            Conoce Más
                        </span>
                        <span class="material-symbols-outlined absolute right-0 translate-x-8 opacity-0 transition-all duration-300 group-hover:-translate-x-4 group-hover:opacity-100">
                            info
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>?url=postulation" class="group relative inline-flex items-center justify-center overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 text-white font-semibold px-8 py-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 shrink-0">
                        <span class="transition-all duration-300 group-hover:-translate-x-2">
                            Postular Ahora
                        </span>
                        <span class="material-symbols-outlined absolute right-0 translate-x-8 opacity-0 transition-all duration-300 group-hover:-translate-x-4 group-hover:opacity-100">
                            chat_paste_go
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full py-24 px-6 bg-background">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            
            <div>
                <h2 class="text-3xl text-white md:text-4xl font-bold mb-6">
                    Nuestra Misión
                </h2>
                <p class="text-xl text-slate-400 leading-relaxed mb-4">
                    Brindar atención oportuna y eficiente ante emergencias, trabajando con profesionalismo y compromiso para salvaguardar vidas y bienes.
                </p>
                <p class="text-xl text-slate-400 leading-relaxed">
                    Somos una compañía formada por voluntarios preparados, dedicados al servicio y al crecimiento continuo.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4 md:gap-6">
                
                <div class="group bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl text-center hover:bg-white/20 hover:border-red-500 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)] hover:-translate-y-2 transition-all duration-500">
                    <div class="inline-flex p-4 rounded-full bg-red-500/20 text-red-400 group-hover:bg-red-600 group-hover:text-white transition-all duration-500 mb-5 scale-100 group-hover:scale-110">
                        <span class="material-symbols-outlined text-4xl">local_fire_department</span>
                    </div>
                    <h3 class="text-white font-bold text-lg md:text-xl tracking-wide">Incendio</h3>
                </div>

                <div class="group bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl text-center hover:bg-white/20 hover:border-red-500 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)] hover:-translate-y-2 transition-all duration-500">
                    <div class="inline-flex p-4 rounded-full bg-red-500/20 text-red-400 group-hover:bg-red-600 group-hover:text-white transition-all duration-500 mb-5 scale-100 group-hover:scale-110">
                        <span class="material-symbols-outlined text-4xl">medical_services</span>
                    </div>
                    <h3 class="text-white font-bold text-lg md:text-xl tracking-wide">Rescate</h3>
                </div>

                <div class="group bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl text-center hover:bg-white/20 hover:border-red-500 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)] hover:-translate-y-2 transition-all duration-500">
                    <div class="inline-flex p-4 rounded-full bg-red-500/20 text-red-400 group-hover:bg-red-600 group-hover:text-white transition-all duration-500 mb-5 scale-100 group-hover:scale-110">
                        <span class="material-symbols-outlined text-4xl">diversity_3</span>
                    </div>
                    <h3 class="text-white font-bold text-lg md:text-xl tracking-wide">Comunidad</h3>
                </div>

                <div class="group bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl text-center hover:bg-white/20 hover:border-red-500 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)] hover:-translate-y-2 transition-all duration-500">
                    <div class="inline-flex p-4 rounded-full bg-red-500/20 text-red-400 group-hover:bg-red-600 group-hover:text-white transition-all duration-500 mb-5 scale-100 group-hover:scale-110">
                        <span class="material-symbols-outlined text-4xl">school</span>
                    </div>
                    <h3 class="text-white font-bold text-lg md:text-xl tracking-wide">Capacitación</h3>
                </div>

            </div>
        </div>
    </div>

</section>

















<!-- BANNER -->
<section class="relative h-[60vh] flex items-center overflow-hidden" id="inicio">
    <!-- Fondo -->
    <div class="absolute inset-0 bg-cover bg-center"
        style="background-image: linear-gradient(rgba(10,10,10,0.75), rgba(10,10,10,0.75)), url('<?= BASE_URL ?>public/assets/img/HERO.png');">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 text-white">
        <div class="max-w-2xl">
            <span class="inline-block bg-red-700 px-4 py-1 text-xs font-bold tracking-widest uppercase mb-6 rounded">
                Compañía de Bomberos
            </span>
            <h2 class="text-5xl md:text-5xl font-black leading-tight mb-6">
                Comprometidos con la vida, el servicio y la comunidad
            </h2>
            <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed">
                Valor, disciplina y sacrificio al servicio de nuestra comunidad las 24 horas del día.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?= BASE_URL ?>?url=history" class="group relative inline-flex items-center justify-center overflow-hidden bg-red-700 hover:bg-red-700/90 text-white font-bold px-10 py-4 rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 shrink-0">
                    <span class="transition-all duration-400 group-hover:-translate-x-3">
                        Conoce Más
                    </span>
                    <span class="material-symbols-outlined absolute right-0 translate-x-12 opacity-0 transition-all duration-400 group-hover:-translate-x-6 group-hover:opacity-100">
                        info
                    </span>
                </a>
                <a href="<?= BASE_URL ?>?url=postulation" class="group relative inline-flex items-center justify-center overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 text-white font-semibold px-10 py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 shrink-0">
                    <span class="transition-all duration-400 group-hover:-translate-x-3">
                        Postular Ahora
                    </span>
                    <span class="material-symbols-outlined absolute right-0 translate-x-12 opacity-0 transition-all duration-400 group-hover:-translate-x-6 group-hover:opacity-100">
                        chat_paste_go
                    </span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- NOSOTROS -->
<section class="py-20 px-6 bg-background">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl text-white md:text-4xl font-bold mb-6">
                Nuestra Misión
            </h2>
            <p class="text-xl text-slate-400 leading-relaxed mb-4">
                Brindar atención oportuna y eficiente ante emergencias,
                trabajando con profesionalismo y compromiso para salvaguardar
                vidas y bienes.
            </p>
            <p class="text-xl text-slate-400 leading-relaxed">
                Somos una compañía formada por voluntarios preparados,
                dedicados al servicio y al crecimiento continuo.
            </p>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class="bg-stone-900 p-6 rounded-xl text-center">
                <span class="material-symbols-outlined text-red-700 text-4xl mb-3">local_fire_department</span>
                <h3 class="text-white font-semibold">Incendio</h3>
            </div>
            <div class="bg-stone-900 p-6 rounded-xl text-center">
                <span class="material-symbols-outlined text-red-700 text-4xl mb-3">medical_services</span>
                <h3 class="text-white font-semibold">Rescate</h3>
            </div>
            <div class="bg-stone-900 p-6 rounded-xl text-center">
                <span class="material-symbols-outlined text-red-700 text-4xl mb-3">diversity_3</span>
                <h3 class="text-white font-semibold">Comunidad</h3>
            </div>
            <div class="bg-stone-900 p-6 rounded-xl text-center">
                <span class="material-symbols-outlined text-red-700 text-4xl mb-3">school</span>
                <h3 class="text-white font-semibold">Capacitación</h3>
            </div>
        </div>
    </div>
</section>

<!-- UNIDADES -->
<section class="py-24 bg-white" id="unidades">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-red-700 font-bold uppercase tracking-widest text-sm">
                Nuestro Parque Automotor
            </span>
            <h2 class="text-3xl md:text-4xl font-black mt-2 text-slate-900">
                Unidades de Respuesta
            </h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- MAQ-155 -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">
                <div class="h-56 bg-slate-100">
                    <img class="w-full h-full object-cover"
                        src="<?= BASE_URL ?>public/assets/img/MAQ-155.png"
                        alt="Unidad MAQ-155">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-xl font-bold text-slate-900">Autobomba</h4>
                        <span class="bg-primary/10 text-red-700 text-[10px] font-black px-2 py-1 rounded">
                            M155-1
                        </span>
                    </div>
                    <p class="text-sm text-slate-600 mb-6">
                        Máquina de ataque rápido contra incendios estructurales.
                    </p>
                    <div class="grid grid-cols-2 gap-4 py-4 border-t border-slate-200">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Capacidad</p>
                            <p class="font-bold text-slate-800">1,000 Gal.</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Año</p>
                            <p class="font-bold text-slate-800">2014</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MED-155 -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">
                <div class="h-56 bg-slate-100">
                    <img class="w-full h-full object-cover"
                        src="<?= BASE_URL ?>public/assets/img/MED-155.png"
                        alt="Unidad MED-155">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-xl font-bold text-slate-900">Ambulancia</h4>
                        <span class="bg-primary/10 text-red-700 text-[10px] font-black px-2 py-1 rounded">
                            MED-155
                        </span>
                    </div>
                    <p class="text-sm text-slate-600 mb-6">
                        Unidad de soporte vital con equipo de desfibrilación.
                    </p>
                    <div class="grid grid-cols-2 gap-4 py-4 border-t border-slate-200">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Personal</p>
                            <p class="font-bold text-slate-800">3 Paramédicos</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Año</p>
                            <p class="font-bold text-slate-800">2021</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CIST-155 -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300">
                <div class="h-56 bg-slate-100">
                    <img class="w-full h-full object-cover"
                        src="<?= BASE_URL ?>public/assets/img/CIST-155.png"
                        alt="Unidad CIST-155">
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="text-xl font-bold text-slate-900">Cisterna</h4>
                        <span class="bg-primary/10 text-red-700 text-[10px] font-black px-2 py-1 rounded">
                            CIST-155
                        </span>
                    </div>
                    <p class="text-sm text-slate-600 mb-6">
                        Cisterna de apoyo logístico para incendios de gran magnitud.
                    </p>
                    <div class="grid grid-cols-2 gap-4 py-4 border-t border-slate-200">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Capacidad</p>
                            <p class="font-bold text-slate-800">8,000 Gal.</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Año</p>
                            <p class="font-bold text-slate-800">1998</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CENTRO DE INFORMACIÓN -->
<section class="py-24 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Card Descargas -->
            <div class="bg-slate-50 p-10 rounded-2xl shadow-lg border border-slate-200 text-slate-900">
                <h3 class="text-2xl font-black mb-8 flex items-center gap-3 text-slate-900">
                    <span class="material-symbols-outlined text-red-700 text-3xl">
                        menu_book
                    </span>
                    Centro de Descargas
                </h3>

                <div class="space-y-4">

                    <a href="<?= BASE_URL ?>public/assets/pdf/uso-de-extintores.pdf" download="Manual de Uso de Extintores.pdf" class="flex items-center justify-between p-4 bg-white rounded-xl border border-slate-200 hover:bg-red-700 hover:text-white hover:shadow-md transition-all duration-300 group">
                        <span class="font-semibold">
                            Manual de Uso de Extintores
                        </span>
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-white transition-colors">
                            download
                        </span>
                    </a>

                    <a href="<?= BASE_URL ?>public/assets/pdf/plan-de-evacuacion.pdf" download="Plan de Evacuación Familiar.pdf" class="flex items-center justify-between p-4 bg-white rounded-xl border border-slate-200 hover:bg-red-700 hover:text-white hover:shadow-md transition-all duration-300 group">
                        <span class="font-semibold">
                            Plan de Evacuación Familiar
                        </span>
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-white transition-colors">
                            download
                        </span>
                    </a>

                    <a href="<?= BASE_URL ?>public/assets/pdf/primeros-auxilios.pdf" download="Guía de Primeros Auxilios.pdf" class="flex items-center justify-between p-4 bg-white rounded-xl border border-slate-200 hover:bg-red-700 hover:text-white hover:shadow-md transition-all duration-300 group">
                        <span class="font-semibold">
                            Guía de Primeros Auxilios
                        </span>
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-white transition-colors">
                            download
                        </span>
                    </a>

                </div>
            </div>
            <!-- Texto + Números -->
            <div>
                <h2 class="text-4xl font-black mb-6 tracking-tight text-slate-900">
                    Prevenir es vivir
                </h2>
                <p class="text-slate-600 mb-10 leading-relaxed max-w-xl">
                    Descarga nuestro material educativo diseñado para capacitar a la comunidad
                    en la prevención de riesgos y respuesta ante emergencias domésticas.
                    El conocimiento salva vidas.
                </p>
                <!-- Números de emergencia -->
                <div class="flex flex-wrap justify-center items-center gap-12 text-center">
                    <div class="flex flex-col items-center">
                        <p class="text-6xl md:text-7xl font-black text-red-700 leading-none">
                            116
                        </p>
                        <p class="mt-2 text-sm font-bold text-slate-600 uppercase tracking-widest">
                            Bomberos
                        </p>
                    </div>
                    <div class="hidden sm:block h-16 w-px bg-slate-300"></div>
                    <div class="flex flex-col items-center">
                        <p class="text-6xl md:text-7xl font-black text-red-700 leading-none">
                            105
                        </p>
                        <p class="mt-2 text-sm font-bold text-slate-600 uppercase tracking-widest">
                            Policía
                        </p>
                    </div>
                    <div class="hidden sm:block h-16 w-px bg-slate-300"></div>
                    <div class="flex flex-col items-center">
                        <p class="text-6xl md:text-7xl font-black text-red-700 leading-none">
                            106
                        </p>
                        <p class="mt-2 text-sm font-bold text-slate-600 uppercase tracking-widest">
                            SAMU
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- POSTULA AHORA -->
<section class="py-20 px-6 bg-red-700 text-center">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            ¿Quieres formar parte de nuestra compañía?
        </h2>
        <p class="mb-8 text-white/90">
            Únete a nuestra familia de voluntarios y ayuda a marcar la diferencia.
        </p>
        <a href="<?= BASE_URL ?>?url=postulation" class="group relative inline-flex items-center justify-center overflow-hidden px-10 py-3 bg-neutral-200 hover:bg-neutral-50 text-red-700 font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 shrink-0">
            <span class="transition-all duration-400 group-hover:-translate-x-4">
                Postular Ahora
            </span>
            <span class="material-symbols-outlined absolute right-0 translate-x-12 opacity-0 text-red-700 transition-all duration-400 group-hover:-translate-x-6 group-hover:opacity-100">
                chat_paste_go
            </span>
        </a>
    </div>
</section>