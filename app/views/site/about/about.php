<section class="relative w-full min-h-[calc(100vh-80px)] flex items-center overflow-hidden bg-gray-100">
    <!-- FONDO PARALLAX -->
    <div id="parallaxBg"
         class="absolute inset-0 bg-center bg-cover opacity-10 will-change-transform"
         style="background-image: url('public/assets/img/banner-about.webp');">
    </div>
    <!-- CAPA GLASS -->
    <div class="absolute inset-0 backdrop-blur-xs bg-white/20"></div>
    <!-- CONTENIDO -->
    <div class="relative max-w-5xl mx-auto px-5 w-full py-10">
        <!-- HEADER -->
        <div class="mb-8 opacity-0 translate-y-6 transition-all duration-700" id="aboutHeader">
            <h2 class="text-3xl md:text-6xl font-bold text-[#111D2D]">
                Conoce que nos define 
                como empresa
            </h2>
        </div>
        <!-- METRICAS -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl rounded-xl p-4 text-center shadow hover:shadow-xl hover:-translate-y-1 transition-all">
                <h3 class="text-2xl font-bold text-[#111D2D]" data-counter="50">0</h3>
                <p class="text-xs text-gray-600 mt-1">Clientes</p>
            </div>
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl rounded-xl p-4 text-center shadow hover:shadow-xl hover:-translate-y-1 transition-all">
                <h3 class="text-2xl font-bold text-[#111D2D]" data-counter="2">0</h3>
                <p class="text-xs text-gray-600 mt-1">Años experiencia</p>
            </div>
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl rounded-xl p-4 text-center shadow hover:shadow-xl hover:-translate-y-1 transition-all">
                <h3 class="text-2xl font-bold text-[#111D2D]" data-counter="50">0</h3>
                <p class="text-xs text-gray-600 mt-1">Proyectos</p>
            </div>
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl rounded-xl p-4 text-center shadow hover:shadow-xl hover:-translate-y-1 transition-all">
                <h3 class="text-2xl font-bold text-[#111D2D]" data-counter="100">0</h3>
                <p class="text-xs text-gray-600 mt-1">% Satisfacción</p>
            </div>
        </div>
        <!-- GRID -->
        <div class="grid md:grid-cols-2 gap-5">
            <!-- MISION -->
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl border border-white/30 rounded-xl p-8 shadow hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 opacity-0 translate-y-10" data-animate>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#111D2D] text-white">
                        <span class="material-symbols-outlined text-[18px] font-light">target</span>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D]">Misión</h3>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Impulsar el crecimiento de las empresas mediante servicios profesionales, asesorías y soluciones rápidas.
                </p>
            </div>
            <!-- VISION -->
            <div class="group cursor-pointer bg-white/50 backdrop-blur-xl border border-white/30 rounded-xl p-8 shadow hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 opacity-0 translate-y-10" data-animate>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#111D2D] text-white">
                        <span class="material-symbols-outlined text-[18px] font-light">rocket_launch</span>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#111D2D]">Visión</h3>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Ser una empresa líder en auditoría, peritaje y outsourcing, destacando por innovación y confianza.
                </p>
            </div>
        </div>
        <!-- VALORES -->
        <div class="mt-6 bg-white/50 backdrop-blur-xl border border-white/30 rounded-xl p-8 shadow opacity-0 translate-y-10 transition-all duration-700" id="valores">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#111D2D] text-white">
                    <span class="material-symbols-outlined text-[18px] font-light">diamond</span>
                </div>
                <h3 class="text-2xl font-semibold text-[#111D2D]">Valores</h3>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-4 text-center">
                <!-- ITEM -->
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">balance</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Ética</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">visibility</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Claridad</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">check_circle</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Cumplimiento</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">trending_up</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Mejora</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">schedule</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Puntualidad</p>
                </div>
                <div class="group cursor-pointer">
                    <div class="w-10 h-10 mx-auto flex items-center justify-center rounded-lg bg-gray-100 text-blue-600 mb-1 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[18px] font-light">local_fire_department</span>
                    </div>
                    <p class="text-[11px] text-gray-600">Pasión</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Animaciones entrada
    window.addEventListener("load", () => {
        document.getElementById("aboutHeader").classList.remove("opacity-0", "translate-y-6");
        document.getElementById("valores").classList.remove("opacity-0", "translate-y-10");
    });

    // PARALLAX
    const bg = document.getElementById("parallaxBg");
    window.addEventListener("scroll", () => {
        bg.style.transform = `translateY(${window.scrollY * 0.25}px)`;
    });

    // CONTADOR
    const counters = document.querySelectorAll("[data-counter]");
    let started = false;

    const runCounters = () => {
        if (started) return;
        started = true;

        counters.forEach(counter => {
            const target = +counter.dataset.counter;
            let count = 0;
            const step = target / 50;

            const update = () => {
                count += step;
                if (count < target) {
                    counter.innerText = Math.floor(count);
                    requestAnimationFrame(update);
                } else {
                    counter.innerText = target;
                }
            };

            update();
        });
    };

    const observer = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting) runCounters();
    });

    observer.observe(document.querySelector("[data-counter]"));

    // ANIMACIÓN CARDS
    const items = document.querySelectorAll("[data-animate]");
    const obs = new IntersectionObserver(entries => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.remove("opacity-0", "translate-y-10");
                }, i * 120);
            }
        });
    }, { threshold: 0.2 });

    items.forEach(el => obs.observe(el));
</script>