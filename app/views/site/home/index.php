<!-- HERO -->
<section id="heroCarousel" class="relative w-full h-[calc(100dvh-80px)] overflow-hidden">
    <!-- SLIDES -->
    <div class="relative w-full h-full">
        <!-- ===== SLIDE 1 (VIDEO) ===== -->
        <div class="hero-slide absolute inset-0 opacity-100 transition-opacity duration-2000 z-10">
            <!-- FONDO -->
            <div class="absolute inset-0 bg-[#111D2D]"></div>
            <!-- VIDEO CENTRADO -->
            <div class="absolute inset-0 flex items-center justify-center">
                <video 
                    autoplay 
                    muted 
                    loop 
                    playsinline 
                    preload="none"
                    poster="<?= BASE_URL ?>public/assets/img/HERO.webp"
                    class="object-contain max-w-full md:max-w-[60%]"
                >
                    <source src="<?= BASE_URL ?>public/assets/vid/HERO.webm" type="video/webm">
                </video>
            </div>
        </div>
        <!-- ===== SLIDE 2 (IMAGEN + TEXTO) ===== -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-2000">
            <!-- BG IMAGE -->
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image:url('<?= BASE_URL ?>public/assets/img/banner-about.webp');">
            </div>
            <!-- OVERLAY -->
            <div class="absolute inset-0 bg-linear-to-b from-[#111D2D]/80 via-[#111D2D]/50 to-transparent">
            </div>
            <!-- CONTENIDO -->
            <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
                <div class="max-w-3xl text-white backdrop-blur-md border border-white/20 rounded-2xl p-8 md:p-12 shadow-3xl">

                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        Contabilidad y Tributación sin complicaciones
                    </h1>
                    <p class="text-lg md:text-xl text-gray-200 mb-8">
                        En SANEMOG CONSULTING ayudamos a empresas a cumplir con SUNAT, optimizar impuestos y tomar decisiones con información financiera clara.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="<?= BASE_URL ?>?url=booking" class="bg-white text-black px-8 py-3 rounded-lg font-semibold hover:scale-105 transition">
                            Solicitar asesoría
                        </a>
                        <a href="<?= BASE_URL ?>?url=services" class="border border-white px-8 py-3 rounded-lg hover:bg-white/60 hover:text-black hover:font-bold transition">
                            Ver servicios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTROLES -->
    <button id="prevSlide" class="group absolute left-6 top-1/2 -translate-y-1/2 z-20  text-white p-3 transition-all duration-300 hover:scale-120 cursor-pointer">
        <span class="material-symbols-outlined opacity-70 group-hover:opacity-100 transition-all duration-300 group-hover:-translate-x-1">
            arrow_back_ios
        </span>
    </button>
    <button id="nextSlide" class="group absolute right-6 top-1/2 -translate-y-1/2 z-20 text-white p-3 transition-all duration-300 hover:scale-125 cursor-pointer">
        <span class="material-symbols-outlined opacity-70 group-hover:opacity-100 transition-all duration-300 group-hover:translate-x-1">
            arrow_forward_ios
        </span>
    </button>
    <!-- INDICADORES -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-4 z-20">
        <button class="dot w-12 h-1 bg-white transition-all duration-300 hover:bg-white cursor-pointer"></button>
        <button class="dot w-12 h-1 bg-white/40 transition-all duration-300 hover:bg-white cursor-pointer"></button>
    </div>
</section>

<!-- SERVICIOS PRINCIPALES -->
<section class="relative w-full flex items-center justify-center py-30 bg-neutral-100">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <!-- TITULO -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#111D2D]">
                Servicios principales
            </h2>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Soluciones contables y financieras diseñadas para ayudarte a crecer con seguridad.
            </p>
        </div>
        <!-- SERVICIOS -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- CARD -->
            <div class="group cursor-pointer bg-white p-10 rounded-2xl border border-gray-100 shadow-sm transition-all duration-500 transform hover:-translate-y-3 hover:shadow-2xl hover:border-[#111D2D]/20">
                <div class="flex flex-col items-center text-center">
                    <!-- ICONO -->
                    <div class="mb-5 text-[#111D2D] text-5xl transition-all duration-500 group-hover:scale-125 group-hover:text-blue-600">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <!-- TITULO -->
                    <h3 class="text-xl font-bold mb-3 text-[#111D2D] group-hover:text-blue-600 transition">
                        Auditoría Financiera
                    </h3>
                    <!-- TEXTO -->
                    <p class="text-gray-500 leading-relaxed">
                        Emitimos una opinión independiente sobre la razonabilidad de tus estados financieros.
                    </p>
                </div>
            </div>
            <!-- CARD -->
            <div class="group cursor-pointer bg-white p-10 rounded-2xl border border-gray-100 shadow-sm transition-all duration-500 transform hover:-translate-y-3 hover:shadow-2xl hover:border-[#111D2D]/20">
                <div class="flex flex-col items-center text-center">
                    <div class="mb-5 text-[#111D2D] text-5xl transition-all duration-500 group-hover:scale-125 group-hover:text-blue-600">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-[#111D2D] group-hover:text-blue-600 transition">
                        Peritaje Contable
                    </h3>
                    <p class="text-gray-500 leading-relaxed">
                        Generamos informe pericial, en base a nuestro expertis, sustentado al objeto pericial, planteado en el expediente o carpeta fiscal.
                    </p>
                </div>
            </div>
            <!-- CARD -->
            <div class="group cursor-pointer bg-white p-10 rounded-2xl border border-gray-100 shadow-sm transition-all duration-500 transform hover:-translate-y-3 hover:shadow-2xl hover:border-[#111D2D]/20">
                <div class="flex flex-col items-center text-center">
                    <div class="mb-5 text-[#111D2D] text-5xl transition-all duration-500 group-hover:scale-125 group-hover:text-blue-600">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-[#111D2D] group-hover:text-blue-600 transition">
                        Outsourcing Contable
                    </h3>
                    <p class="text-gray-500 leading-relaxed">
                        Nos encargamos de todo el proceso contable, de las diferentes empresas, en los regímenes tributarios y laborales.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PORQUE ELEGIRNOS -->
<section class="relative w-full flex items-center justify-center py-30 bg-white">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- IMAGEN -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img 
                    src="<?= BASE_URL ?>public/assets/img/banner-services.webp"
                    alt="Equipo profesional"
                    loading="lazy"
                    class="w-full max-w-lg h-100 object-cover rounded-2xl shadow-2xl"
                >
            </div>
            <!-- CONTENIDO -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-4xl md:text-5xl font-bold text-[#111D2D] mb-10">
                    ¿Por qué elegirnos?
                </h2>
                <div class="space-y-8">
                    <!-- ITEM -->
                    <div class="flex items-start gap-4 group cursor-pointer transition-all duration-300">
                        <div class="shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-[#111D2D] flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-600">
                                <span class="material-symbols-outlined text-white text-[18px] transition-all duration-300 group-hover:scale-110">
                                    done_all
                                </span>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group-hover:translate-x-1">
                            <h4 class="text-xl font-bold text-[#111D2D] mb-1 transition group-hover:text-blue-600">
                                Enfoque en tu rubro
                            </h4>
                            <p class="text-gray-500 transition group-hover:text-gray-700">
                                Experiencia en comercio, servicios y construcción. Adaptamos procesos a tu operación.
                            </p>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="flex items-start gap-4 group cursor-pointer transition-all duration-300">
                        <div class="shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-[#111D2D] flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-600">
                                <span class="material-symbols-outlined text-white text-[18px] transition-all duration-300 group-hover:scale-110">
                                    done_all
                                </span>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group-hover:translate-x-1">
                            <h4 class="text-xl font-bold text-[#111D2D] mb-1 transition group-hover:text-blue-600">
                                Cumplimiento
                            </h4>
                            <p class="text-gray-500 transition group-hover:text-gray-700">
                                Revisiones preventivas y soporte constante para evitar contingencias.
                            </p>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="flex items-start gap-4 group cursor-pointer transition-all duration-300">
                        <div class="shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-[#111D2D] flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-600">
                                <span class="material-symbols-outlined text-white text-[18px] transition-all duration-300 group-hover:scale-110">
                                    done_all
                                </span>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group-hover:translate-x-1">
                            <h4 class="text-xl font-bold text-[#111D2D] mb-1 transition group-hover:text-blue-600">
                                Reportes claros
                            </h4>
                            <p class="text-gray-500 transition group-hover:text-gray-700">
                                Información financiera clara para tomar decisiones con confianza.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- CTA -->
                <div class="mt-12">
                    <a href="<?= BASE_URL ?>?url=booking" class="inline-block bg-[#111D2D] text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:bg-black hover:scale-105 transition-all duration-300">
                        Agendar una Consulta
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>