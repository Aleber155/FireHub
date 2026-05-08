<!-- Footer -->
<footer class="bg-[#111D2D] text-slate-400 py-16 border-t border-white/10" id="contacto">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 mb-16">

            <!-- Columna 1 -->
            <div>
                <!-- Logo + Nombre -->
                <div class="flex items-center gap-4 mb-6 text-white">
                    <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp"
                        alt="Logo SANEMOG"
                        class="w-20 h-20 object-contain">
                    <div class="flex flex-col leading-none">
                        <h1 class="font-sans text-4xl font-bold tracking-tight">
                            SANEMOG
                        </h1>
                        <p class="text-3xl font-normal tracking-wide text-slate-200">
                            CONSULTING
                        </p>
                    </div>
                </div>

                <!-- Descripción -->
                <p class="text-sm leading-relaxed text-slate-300 max-w-md">
                    Nuestro propósito es fortalecer la gestión financiera de su empresa, convirtiéndonos en su socio estratégico en auditoría contable, peritaje y outsourcing. Brindamos un servicio sustentado en la transparencia, el cumplimiento normativo y un análisis riguroso, generando confianza en cada resultado.
                </p>

            </div>
            <!-- Columna 2 -->
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">
                    Navegación
                </h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="<?= BASE_URL ?>?url=home" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Inicio</a></li>
                    <li><a href="<?= BASE_URL ?>?url=about" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Nosotros</a></li>
                    <li><a href="<?= BASE_URL ?>?url=team" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Nuestro Equipo</a></li>
                    <li><a href="<?= BASE_URL ?>?url=service" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Servicios</a></li>
                    <li><a href="<?= BASE_URL ?>?url=contact" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Contáctenos</a></li>
                    <li><a href="<?= BASE_URL ?>?url=booking" class="inline-block hover:text-white hover:scale-110 transition-all duration-300">Reserva de Citas</a></li>
                </ul>
            </div>
            <!-- Columna 3 -->
            <div>
                <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">
                    Contacto
                </h4>
                <ul class="space-y-4 text-sm text-slate-300">
                    <!-- Correo -->
                    <li class="flex items-center gap-3 group cursor-pointer">
                        <!-- ICONO -->
                        <span class="material-symbols-outlined text-lg text-white/80 transition-all duration-300 group-hover:text-white group-hover:scale-110">
                            mail
                        </span>
                        <!-- TEXTO -->
                        <a href="mailto:contacto@sanemog.com" class="inline-block text-white/80 transition-all duration-300 group-hover:text-white group-hover:scale-110">
                            contacto@sanemog.com
                        </a>
                    </li>
                </ul>
                <!-- Redes sociales -->
                <div class="flex gap-4 mt-6">
                    <!-- Facebook -->
                    <a 
                        href="https://www.facebook.com/SANEMOGConsulting/"
                        target="_blank"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-primary hover:text-white hover:scale-120 transition-all duration-300"
                    >
                        <i class="fa-brands fa-facebook-f text-lg"></i>
                    </a>
                    <!-- LinkedIn -->
                    <a 
                        href="https://www.linkedin.com/company/sanemog"
                        target="_blank"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-primary hover:text-white hover:scale-120 transition-all duration-300"
                    >
                        <i class="fa-brands fa-linkedin text-lg"></i>
                    </a>
                    <!-- Instagram -->
                    <a 
                        href="https://www.instagram.com/sanemogconsulting/"
                        target="_blank"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-primary hover:text-white hover:scale-120 transition-all duration-300"
                    >
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Barra inferior -->
        <div class="pt-8 border-t border-slate-800 text-xs flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
            <a href="<?= BASE_URL ?>?url=home" class="cursor-pointer hover:text-white transition">
                © SANEMOG CONSULTING 2025 | Todos los derechos reservados
            </a>
            <div class="flex gap-6">
                <a href="<?= BASE_URL ?>?url=auth/login" class="hover:text-white transition-colors">Gestión de citas</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>