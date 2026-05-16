<section id="contact" class="relative isolate w-full min-h-screen flex flex-col bg-slate-50 overflow-hidden pt-26 lg:pt-24 xl:pt-32">
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <canvas id="particles" class="absolute inset-0"></canvas>
    </div>
    <div class="relative z-10 flex-1 flex items-center pb-8 lg:pb-6 xl:pb-12">
        <div class="w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-stretch">
                <div class="w-full flex flex-col h-full">
                    <div id="form-card" class="opacity-0 translate-y-10 transition-all duration-800 ease-out bg-white border border-slate-200 p-8 md:p-10 rounded-3xl shadow-xl flex-1 flex flex-col relative z-20">
                        <h2 class="text-3xl font-bold mb-8 text-slate-900">
                            Escríbenos
                        </h2>
                        <form id="form" action="#" method="POST" class="space-y-6 flex-1 flex flex-col justify-center">
                            <div class="relative">
                                <input type="text" id="nombre" name="nombre" required placeholder=" "
                                    class="input-field block px-4 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-transparent rounded-xl border border-slate-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-slate-50 transition-colors duration-300" />
                                <label for="nombre" class="inline-flex items-center absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 inset-s-2 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">person</span>
                                    Nombre Completo
                                </label>
                            </div>
                            
                            <div class="relative">
                                <input type="email" id="correo" name="correo" required placeholder=" "
                                    class="input-field block px-4 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-transparent rounded-xl border border-slate-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-slate-50 transition-colors duration-300" />
                                <label for="correo" class="inline-flex items-center absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 inset-s-2 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">mail</span>
                                    Correo Electrónico
                                </label>
                            </div>
                            
                            <div class="relative">
                                <input type="tel" id="teléfono" name="teléfono" required placeholder=" "
                                    class="input-field block px-4 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-transparent rounded-xl border border-slate-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-slate-50 transition-colors duration-300" />
                                <label for="teléfono" class="inline-flex items-center absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 inset-s-2 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">phone_iphone</span>
                                    Teléfono
                                </label>
                            </div>
                            
                            <div class="relative">
                                <textarea id="mensaje" rows="4" name="mensaje" required placeholder=" "
                                    class="input-field block px-4 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-transparent rounded-xl border border-slate-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-slate-50 transition-colors duration-300 resize-none"></textarea>
                                <label for="mensaje" class="inline-flex items-center absolute text-sm text-slate-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 inset-s-2 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">edit_note</span>
                                    Mensaje
                                </label>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="flex items-center h-5 mt-0.5">
                                    <input id="privacy_check" type="checkbox" required
                                        class="w-4 h-4 bg-slate-50 border-slate-300 rounded text-red-600 focus:ring-red-600 focus:ring-2 cursor-pointer transition-colors" />
                                </div>
                                <label for="privacy_check" class="text-sm text-slate-500 leading-tight cursor-pointer select-none">
                                    Al enviar este formulario, confirmo que he leído y acepto la 
                                    <a href="<?= BASE_URL ?>?url=privacy" class="font-bold underline text-slate-700 hover:text-red-700 transition-colors" onclick="event.stopPropagation()">
                                        política de privacidad
                                    </a> y el procesamiento de mis datos personales.
                                </label>
                            </div>

                            <button type="submit" id="btnSubmit" disabled
                                class="cursor-pointer mt-4 w-full bg-red-700 text-white font-black py-4 rounded-xl flex items-center justify-center gap-2 transition-all duration-300 
                                    shadow-[0_4px_14px_rgba(185,28,28,0.3)] hover:shadow-[0_6px_20px_rgba(185,28,28,0.4)] hover:bg-red-800 hover:-translate-y-1 
                                    disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:shadow-[0_4px_14px_rgba(185,28,28,0.3)] disabled:hover:bg-red-700 disabled:hover:translate-y-0 disabled:active:scale-100">
                                <span id="btnSubmitText">ENVIAR MENSAJE</span>
                                <span class="material-symbols-outlined text-xl">send</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div id="info-column" class="opacity-0 translate-y-10 transition-all duration-800 ease-out delay-200 w-full flex flex-col space-y-6 h-full relative z-20">
                    <div class="relative w-full min-h-63 lg:min-h-75 rounded-3xl overflow-hidden shadow-xl border border-slate-200 flex-1">
                        <div id="map-skeleton" class="absolute inset-0 bg-slate-200 animate-pulse"></div>
                        <iframe
                            id="map-frame"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1414.7317208104192!2d-76.93888320491054!3d-12.15830025983754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b9000dbd0cc3%3A0x6b4af0ab5dbb03fa!2sCompa%C3%B1%C3%ADa%20de%20Bomberos%20Voluntarios%20San%20Juan%20de%20Miraflores%20155!5e0!3m2!1ses!2spe!4v1714603415132!5m2!1ses!2spe"
                            class="absolute inset-0 w-full h-full"
                            style="border:0;"
                            allowfullscreen
                            loading="lazy"
                            onload="hideMapSkeleton()">
                        </iframe>
                    </div>
                    <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-xl">
                        <ul class="space-y-5 text-sm text-slate-600">
                            <li>
                                <a href="https://maps.app.goo.gl/gQ9nJqGZb5JqYJ7s9" target="_blank" rel="noopener noreferrer" class="group flex items-start gap-4 hover:text-red-700 hover:translate-x-1 transition-all duration-300">
                                    <span class="material-symbols-outlined text-red-600 group-hover:text-red-700 transition-colors duration-300 text-xl mt-0.5">
                                        location_on
                                    </span>
                                    <span class="leading-relaxed">
                                        <strong class="block text-slate-900 mb-1">Dirección</strong>
                                        Av. Atocongo s/n<br>
                                        Frente a Cementos Lima
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="tel:+5112936643" class="group flex items-center gap-4 hover:text-red-700 hover:translate-x-1 transition-all duration-300">
                                    <span class="material-symbols-outlined text-red-600 group-hover:text-red-700 transition-colors duration-300 text-xl">
                                        call
                                    </span>
                                    <span class="text-base font-medium">
                                        <strong class="block text-slate-900 text-sm mb-0.5">Teléfono</strong>
                                        (01) 293-6643
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:contacto@bomberos155.pe" class="group flex items-center gap-4 hover:text-red-700 hover:translate-x-1 transition-all duration-300">
                                    <span class="material-symbols-outlined text-red-600 group-hover:text-red-700 transition-colors duration-300 text-xl">
                                        mail
                                    </span>
                                    <span class="text-base font-medium">
                                        <strong class="block text-slate-900 text-sm mb-0.5">Correo</strong>
                                        contacto@bomberos155.pe
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="emergency-banner" class="opacity-0 translate-y-10 transition-all duration-800 ease-out delay-300 relative z-20 w-full bg-red-700 text-white py-3 px-3 shadow-[0_-10px_30px_rgba(185,28,28,0.2)] mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <p class="text-lg md:text-xl font-semibold text-center md:text-left flex items-center justify-center md:justify-start gap-2">
                <span class="material-symbols-outlined animate-pulse">emergency</span>
                En caso de emergencia llame inmediatamente al
                <a href="tel:116" class="font-bold text-2xl md:text-3xl hover:text-white/80 hover:scale-110 transform transition-all tracking-wider ml-1">
                    116
                </a>
            </p>
            <p class="text-xs md:text-sm text-white/80 text-center md:text-right max-w-xl leading-relaxed">
                Las llamadas falsas o malintencionadas constituyen una infracción grave y pueden generar la cancelación de la línea telefónica y multas de hasta 4 UIT.
            </p>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', () => {
        
        if (typeof createFireParticles === 'function') {
            createFireParticles("contact");
        } else {
            console.error("El archivo particles.js no está enlazado correctamente");
        }
        
    });
</script>

<script src="public/assets/js/contact.js?v=1.0"></script>