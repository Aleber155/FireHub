<section class="relative min-h-[20vh] w-full overflow-hidden flex items-center justify-center pt-20 pb-10 bg-background">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-cover bg-center grayscale contrast-125 brightness-50"
            style='background-image: url("<?= BASE_URL ?>public/assets/img/BANNER-01.png");'>
        </div>
        <div class="absolute inset-0 bg-linear-to-t from-background via-background/40 to-transparent"></div>
    </div>

    <div class="container relative z-10 mx-auto px-6 flex flex-col items-center justify-center mt-12">
        <div class="max-w-4xl flex flex-col items-center text-center animate-fade-up">
            
            <span class="inline-flex items-center gap-4 text-primary font-bold tracking-[0.3em] uppercase text-xs mb-6">
                <span class="hidden md:block h-1 w-12 bg-primary/60"></span>
                Crónica Institucional
                <span class="hidden md:block h-1 w-12 bg-primary/60"></span>
            </span>
            
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-tight text-balance">
                Nuevo Milenio <br>
                <span class="text-primary drop-shadow-sm">B-155</span>
            </h1>
            
            <p class="mt-8 text-white/60 uppercase tracking-[0.4em] text-xs md:text-sm font-medium">
                Villa María del Triunfo <span class="mx-2 text-primary/50">•</span> Lima, Perú
            </p>
            
        </div>
    </div>
</section>

<div class="bg-background relative z-20">
    <div class="container mx-auto px-6 pt-10 md:px-12 py-16 grid grid-cols-1 lg:grid-cols-12 gap-16 xl:gap-24">

        <aside class="lg:col-span-5">
            <div class="sticky top-32">
                <div class="relative overflow-hidden p-8 md:p-12 rounded-[2.5rem] bg-white/5 backdrop-blur-2xl border border-white/10 shadow-2xl shadow-black/50">
                    <div class="absolute -top-24 -right-24 h-64 w-64 bg-primary/10 rounded-full blur-3xl"></div>
                    
                    <h3 class="relative text-2xl font-black text-white mb-16 flex items-center gap-4">
                        <span class="h-8 w-1 bg-primary"></span>
                        Línea del Tiempo
                    </h3>

                    <div id="timeline-menu" class="relative space-y-12 before:absolute before:left-5 before:top-2 before:bottom-2 before:w-1 before:bg-linear-to-b before:from-primary before:via-white/10 before:to-transparent">
                        
                        <a href="#historia" data-target="historia" class="timeline-link relative pl-14 group block cursor-pointer outline-none">
                            <div class="indicator absolute left-0 top-1 h-10 w-10 rounded-full border-2 flex items-center justify-center z-10 transition-colors duration-300 bg-background border-primary group-hover:border-primary">
                                <div class="pulse-dot h-2 w-2 rounded-full bg-white animate-pulse"></div>
                            </div>
                            <span class="date-text text-xs font-bold tracking-widest uppercase text-primary transition-colors duration-300">Año 1999</span>
                            <h4 class="text-white font-bold text-lg mt-1 group-hover:translate-x-2 transition-transform">Iniciativa Comunitaria</h4>
                            <p class="text-sm text-slate-400 mt-2">Creación del Comité en el A.H. 19 de Julio.</p>
                        </a>

                        <a href="#comite" data-target="comite" class="timeline-link relative pl-14 group block cursor-pointer outline-none">
                            <div class="indicator absolute left-0 top-1 h-10 w-10 rounded-full border-2 flex items-center justify-center z-10 transition-colors duration-300 bg-background border-white/20 group-hover:border-primary">
                                <div class="pulse-dot hidden h-2 w-2 rounded-full bg-white animate-pulse"></div>
                            </div>
                            <span class="date-text text-xs font-bold tracking-widest uppercase text-slate-500 transition-colors duration-300">24 de Enero, 2000</span>
                            <h4 class="text-white font-bold text-lg mt-1 group-hover:translate-x-2 transition-transform">Autorización Oficial</h4>
                            <p class="text-sm text-slate-400 mt-2">Resolución Jefatural N° 039-2000.</p>
                        </a>

                        <a href="#fundacion" data-target="fundacion" class="timeline-link relative pl-14 group block cursor-pointer outline-none">
                            <div class="indicator absolute left-0 top-1 h-10 w-10 rounded-full border-2 flex items-center justify-center z-10 transition-colors duration-300 bg-background border-white/20 group-hover:border-primary">
                                <div class="pulse-dot hidden h-2 w-2 rounded-full bg-white animate-pulse"></div>
                            </div>
                            <span class="date-text text-xs font-bold tracking-widest uppercase text-slate-500 transition-colors duration-300">31 de Marzo, 2000</span>
                            <h4 class="text-white font-bold text-lg mt-1 group-hover:translate-x-2 transition-transform">Fundación Oficial</h4>
                            <p class="text-sm text-slate-400 mt-2">Reconocimiento N° 145-2000.</p>
                        </a>

                        <a href="#operativo" data-target="operativo" class="timeline-link relative pl-14 group block cursor-pointer outline-none">
                            <div class="indicator absolute left-0 top-1 h-10 w-10 rounded-full border-2 flex items-center justify-center z-10 transition-colors duration-300 bg-background border-white/20 group-hover:border-primary">
                                <div class="pulse-dot hidden h-2 w-2 rounded-full bg-white animate-pulse"></div>
                            </div>
                            <span class="date-text text-xs font-bold tracking-widest uppercase text-slate-500 transition-colors duration-300">20 de Mayo, 2000</span>
                            <h4 class="text-white font-bold text-lg mt-1 group-hover:translate-x-2 transition-transform">Inicio Operativo</h4>
                            <p class="text-sm text-slate-400 mt-2">Activación con 15 voluntarios operativos.</p>
                        </a>

                    </div>
                </div>
            </div>
        </aside>

        <div class="lg:col-span-7 space-y-24">

            <article id="historia" class="group scroll-mt-32">
                <div class="flex items-start md:items-baseline gap-4 md:gap-6 mb-8">
                    <span class="text-5xl md:text-7xl font-black text-primary/80 leading-none group-hover:text-primary transition-colors duration-500">01</span>
                    <h2 class="text-2xl md:text-4xl font-bold text-white tracking-tight relative pb-3 md:pb-4 flex-1 mt-1 md:mt-0">
                        Historia y Fundación
                        <span class="absolute bottom-0 left-0 h-1 w-16 md:w-20 bg-primary"></span>
                    </h2>
                </div>
                <div class="space-y-6 text-lg leading-relaxed text-slate-300">
                    <p class="first-letter:text-5xl md:first-letter:text-6xl first-letter:font-black first-letter:text-primary first-letter:mr-3 first-letter:float-left first-letter:leading-none">
                        La Compañía de Bomberos Nuevo Milenio N° 155 nació de la visión y el esfuerzo comunitario en el distrito de Villa María del Triunfo, Lima. Su historia representa un ejemplo de compromiso civil y cooperación para fortalecer la seguridad en el Cono Sur de la capital.
                    </p>
                    <p>
                        A finales de 1999, dirigentes del Asentamiento Humano 19 de Julio, ubicado en la zona de Nuevo Milenio, impulsaron la creación de un Comité Organizador para fundar una nueva compañía. La comunidad decidió compartir su local comunal con el 
                        <span class="text-white font-semibold border-b border-primary/30">Cuerpo General de Bomberos Voluntarios del Perú</span>.
                    </p>
                    <div class="flex items-center gap-4 p-5 md:p-6 rounded-2xl bg-white/5 border border-white/10 italic text-slate-400">
                        <span class="material-symbols-outlined text-primary text-3xl shrink-0">location_on</span>
                        <span class="text-base">El terreno cedido, de 320 m², se encuentra en el cruce de las avenidas Javier Heraud y Ciro Alegría, donde se instaló provisionalmente la unidad.</span>
                    </div>
                </div>
            </article>

            <article id="comite" class="group scroll-mt-32">
                <div class="flex items-start md:items-baseline gap-4 md:gap-6 mb-8">
                    <span class="text-5xl md:text-7xl font-black text-primary/80 leading-none group-hover:text-primary transition-colors duration-500">02</span>
                    <h2 class="text-2xl md:text-4xl font-bold text-white tracking-tight relative pb-3 md:pb-4 flex-1 mt-1 md:mt-0">
                        El Comité Organizador
                        <span class="absolute bottom-0 left-0 h-1 w-16 md:w-20 bg-primary"></span>
                    </h2>
                </div>
                
                <div class="bg-primary/20 border-l-4 border-primary p-4 rounded-xl mb-8">
                    <p class="italic text-white">Resolución Jefatural N° 039-2000 — 24 de enero del 2000.</p>
                    <p class="mt-1 text-sm text-slate-400">Autorización oficial para el funcionamiento del Comité Organizador.</p>
                </div>

                <div class="grid md:grid-cols-2 gap-6 md:gap-8">
                    <div class="p-6 rounded-2xl bg-primary/20 backdrop-blur-md border border-primary/10">
                        <h4 class="text-primary font-bold uppercase text-sm mb-4">Directiva Fundadora</h4>
                        <ul class="space-y-4 text-slate-300">
                            <li class="flex flex-col"><span class="text-xs text-slate-500">Presidente</span> <span class="font-semibold text-white">Maguín Mora Quispe</span></li>
                            <li class="flex flex-col"><span class="text-xs text-slate-500">Vicepresidente</span> <span class="font-semibold text-white">Gerardo Benites Cabanillas</span></li>
                            <li class="flex flex-col"><span class="text-xs text-slate-500">Tesorera</span> <span class="font-semibold text-white">Noemí Pacheco Sánchez</span></li>
                        </ul>
                    </div>
                    <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                        <h4 class="text-slate-500 font-bold uppercase text-sm mb-4">Servicios y Supervisión</h4>
                        <ul class="space-y-4 text-slate-300">
                            <li class="flex flex-col"><span class="text-xs text-slate-500">Vocal Administrativo</span> <span class="text-white">Aparicio Fuentes Guizado</span></li>
                            <li class="flex flex-col"><span class="text-xs text-slate-500">Vocales de Servicio</span> <span class="text-white">Ninfa Moscoso de Roldán <br> Vilma Huamán Fernández</span></li>
                            <li class="flex flex-col pt-2 border-t border-white/10"><span class="text-xs text-primary">Supervisor</span> <span class="text-primary font-bold">Seccionario CBP José Joo Ortiz</span></li>
                        </ul>
                    </div>
                </div>
            </article>

            <article id="fundacion" class="group scroll-mt-32">
                <div class="flex items-start md:items-baseline gap-4 md:gap-6 mb-8">
                    <span class="text-5xl md:text-7xl font-black text-primary/80 leading-none group-hover:text-primary transition-colors duration-500">03</span>
                    <h2 class="text-2xl md:text-4xl font-bold text-white tracking-tight relative pb-3 md:pb-4 flex-1 mt-1 md:mt-0">
                        Fundación y Reconocimiento
                        <span class="absolute bottom-0 left-0 h-1 w-16 md:w-20 bg-primary"></span>
                    </h2>
                </div>
                
                <div class="bg-primary/20 border-l-4 border-primary p-4 rounded-xl mb-8">
                    <p class="italic text-white">Resolución Jefatural N° 145-2000.</p>
                    <p class="mt-1 text-sm text-slate-400">Reconocer oficialmente con el nombre 'Nuevo Milenio' y el número 155.</p>
                </div>

                <div class="space-y-6 text-lg text-slate-300">
                    <p>
                        La fecha oficial de fundación es el <strong class="text-white">31 de marzo del 2000</strong>. La puesta en marcha operativa se dio el <strong class="text-white">20 de mayo del 2000</strong>, tras completar el equipamiento de la unidad de agua, rescate y ambulancia.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                        <div class="p-6 text-center rounded-2xl bg-primary/20 backdrop-blur-md border border-primary/10 flex flex-col justify-center">
                            <p class="text-white/80 text-xs uppercase font-bold tracking-tighter mb-2">Primeros Jefes</p>
                            <p class="text-white font-black text-base md:text-lg leading-tight">Tte. CBP José Joo Ortiz</p>
                            <p class="text-white font-black text-base md:text-lg leading-tight mt-1 md:mt-2">Secc. CBP Ricardo de la Puente Granda</p>
                        </div>
                        <div class="p-6 flex flex-col items-center justify-center rounded-2xl bg-white/10 backdrop-blur-md border border-white/10">
                            <p class="text-slate-400 text-xs uppercase font-bold tracking-tighter">Efectivos Iniciales</p>
                            <p class="text-white font-black text-4xl mt-1">15</p>
                            <p class="text-slate-300 text-sm mt-1 text-center">Hombres y mujeres voluntarios</p>
                        </div>
                    </div>
                </div>
            </article>

            <article id="operativo" class="group scroll-mt-32">
                <div class="flex items-start md:items-baseline gap-4 md:gap-6 mb-8">
                    <span class="text-5xl md:text-7xl font-black text-primary/80 leading-none group-hover:text-primary transition-colors duration-500">04</span>
                    <h2 class="text-2xl md:text-4xl font-bold text-white tracking-tight relative pb-3 md:pb-4 flex-1 mt-1 md:mt-0">
                        Crecimiento Institucional
                        <span class="absolute bottom-0 left-0 h-1 w-16 md:w-20 bg-primary"></span>
                    </h2>
                </div>
                <div class="space-y-6 text-lg text-slate-300">
                    <p>
                        Inicialmente bajo la jurisdicción de la <strong class="text-white">IV Comandancia</strong>, la compañía pasó posteriormente a formar parte de la <strong class="text-white">XXIV Comandancia Departamental Lima Sur</strong>, consolidando su presencia operativa en el distrito.
                    </p>
                    <p>
                        Desde entonces, la B-155 continúa fortaleciendo su infraestructura, equipamiento y formación de voluntarios, manteniendo vivo el espíritu de servicio que dio origen a su creación.
                    </p>
                </div>
            </article>

        </div>
        
    </div>
</div>

<section class="relative py-8 overflow-hidden border-t border-white/5 bg-background">
    <div class="absolute inset-0 bg-primary/10"></div>
    <div class="container relative z-10 mx-auto px-6 text-center">
        <span class="material-symbols-outlined text-6xl text-primary/40 mb-8 select-none">format_quote</span>
        <h2 class="text-3xl md:text-4xl font-serif italic text-white leading-tight max-w-4xl mx-auto text-balance">
            “El compromiso sigue vivo en cada sirena que resuena en Villa María del Triunfo.”
        </h2>
        <div class="mt-12 flex flex-col items-center gap-4">
            <div class="h-1 w-24 bg-primary rounded-full"></div>
            <p class="text-xs uppercase text-slate-400 font-semibold">
                Cuerpo General de Bomberos Voluntarios del Perú
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // 1. Obtenemos todos los artículos y los enlaces del menú
    const articles = document.querySelectorAll("article[id]");
    const navLinks = document.querySelectorAll(".timeline-link");

    // 2. Función que actualiza los estilos visuales del menú
    function activateMenu(targetId) {
        navLinks.forEach(link => {
            const isTarget = link.getAttribute("data-target") === targetId;
            
            // Elementos internos del enlace
            const indicator = link.querySelector(".indicator");
            const pulseDot = link.querySelector(".pulse-dot");
            const dateText = link.querySelector(".date-text");

            if (isTarget) {
                // Estado ACTIVO (Rojo y con pulso)
                indicator.classList.remove("border-white/20");
                indicator.classList.add("border-primary");
                
                dateText.classList.remove("text-slate-500");
                dateText.classList.add("text-primary");
                
                pulseDot.classList.remove("hidden");
            } else {
                // Estado INACTIVO (Gris y sin pulso)
                indicator.classList.remove("border-primary");
                indicator.classList.add("border-white/20");
                
                dateText.classList.remove("text-primary");
                dateText.classList.add("text-slate-500");
                
                pulseDot.classList.add("hidden");
            }
        });
    }

    // 3. Configuramos el Observer (El espía de Scroll)
    const observerOptions = {
        root: null, // usa el viewport del navegador
        rootMargin: "-20% 0px -60% 0px", // Margen para considerar que un elemento está "leyéndose"
        threshold: 0 // Con que asome un pixel dentro del rootMargin se activa
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Si el artículo entró en nuestra "zona de lectura", lo activamos
                activateMenu(entry.target.id);
            }
        });
    }, observerOptions);

    // 4. Empezamos a observar todos los artículos
    articles.forEach(article => observer.observe(article));

    // 5. Soporte para el clic (al hacer clic activamos de inmediato sin esperar el scroll)
    navLinks.forEach(link => {
        link.addEventListener("click", function() {
            const targetId = this.getAttribute("data-target");
            activateMenu(targetId);
        });
    });
});
</script>