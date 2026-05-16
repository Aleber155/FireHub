<section id="postulation" class="relative isolate min-h-screen flex items-start lg:items-center pt-10 lg:pt-0 text-white overflow-hidden">

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div 
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('<?= BASE_URL ?>public/assets/img/BACKGROUND-01.png');">
        </div>
        <div class="absolute inset-0 bg-linear-to-bl from-background/80 via-background/90 to-background"></div>
        <canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 w-full py-20">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <div class="text-center lg:text-left">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mb-6 leading-tight text-white">
                    Únete a nuestras filas.
                    <br class="hidden sm:block" />
                    Sirve a tu comunidad.
                </h2>

                <p class="text-white/80 mb-10 text-base sm:text-lg max-w-xl mx-auto lg:mx-0">
                    Buscamos hombres y mujeres con vocación de servicio, 
                    disciplina y ganas de marcar la diferencia.
                </p>

                <ul class="space-y-6 max-w-md mx-auto lg:mx-0 text-left">
                    <?php
                    $requisitos = [
                        [
                            "Edad mínima 18 años",
                            "Cumplidos al momento de la inscripción.",
                            "calendar_month"
                        ],
                        [
                            "Residencia cercana",
                            "Vivir o trabajar dentro del radio de acción.",
                            "location_on"
                        ],
                        [
                            "Aptitud física y mental",
                            "Evaluaciones médicas y psicológicas.",
                            "fitness_center"
                        ],
                        [
                            "Antecedentes Limpios",
                            "Certificado sin observaciones.",
                            "verified_user"
                        ]
                    ];

                    foreach ($requisitos as $req): ?>
                        <li class="flex items-start gap-4 group select-none cursor-pointer transition-all duration-300 hover:scale-105 hover:translate-x-2">
                            <span class="material-symbols-outlined bg-white/5 border border-white/10 p-2 rounded-xl shrink-0 text-white group-hover:bg-primary group-hover:text-white transition-all duration-300">
                                <?= $req[2] ?>
                            </span>
                            <div>
                                <h5 class="font-bold text-base sm:text-lg text-white"><?= $req[0] ?></h5>
                                <p class="text-sm text-white/70"><?= $req[1] ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="w-full max-w-lg mx-auto">
                <div class="bg-white/5 backdrop-blur-md border border-white/10 p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl text-white">
                    
                    <h3 class="text-xl sm:text-2xl font-black mb-6 text-center lg:text-left text-white">
                        Formulario de Postulación
                    </h3>

                    <form id="postulation-form" action="#" method="POST" class="space-y-6">

                        <div class="relative">
                            <input type="text" id="nombre" name="nombre" required placeholder=" "
                                class="p-input block w-full px-4 pb-2.5 pt-6 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />
                            <label for="nombre" class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                                <span class="material-symbols-outlined text-[18px] me-1.5">person</span>
                                Nombre Completo
                            </label>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="relative">
                                <input type="text" id="dni" name="dni" required maxlength="8" pattern="[0-9]{8}" placeholder=" "
                                    class="p-input block w-full px-4 pb-2.5 pt-6 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />
                                <label for="dni" class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">badge</span>
                                    DNI
                                </label>
                            </div>

                            <div class="relative">
                                <input type="tel" id="teléfono" name="teléfono" required placeholder=" "
                                    class="p-input block w-full px-4 pb-2.5 pt-6 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />
                                <label for="teléfono" class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                                    <span class="material-symbols-outlined text-[18px] me-1.5">phone_iphone</span>
                                    Teléfono
                                </label>
                            </div>
                        </div>

                        <div class="relative">
                            <input type="email" id="correo" name="correo" required placeholder=" "
                                class="p-input block w-full px-4 pb-2.5 pt-6 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />
                            <label for="correo" class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                                <span class="material-symbols-outlined text-[18px] me-1.5">mail</span>
                                Correo Electrónico
                            </label>
                        </div>

                        <div class="flex items-start gap-3 pt-2">
                            <div class="flex items-center h-5 mt-0.5">
                                <input id="p_privacy_check" type="checkbox" required
                                    class="w-4 h-4 bg-transparent border-white/30 rounded text-red-600 focus:ring-red-600 focus:ring-2 cursor-pointer transition-colors" />
                            </div>
                            <label for="p_privacy_check" class="text-sm text-white/70 leading-tight cursor-pointer select-none">
                                Al enviar este formulario, confirmo que he leído y acepto la 
                                <a href="<?= BASE_URL ?>?url=privacy" class="font-bold underline text-white hover:text-red-500 transition-colors" onclick="event.stopPropagation()">
                                    política de privacidad
                                </a> y el procesamiento de mis datos.
                            </label>
                        </div>

                        <div class="pt-2">
                            <button id="btnSubmitPostulation" disabled
                                class="cursor-pointer w-full bg-red-700 text-white font-black hover:bg-red-800 transition-colors duration-300 py-3 sm:py-4 rounded-xl flex items-center justify-center gap-2 text-sm sm:text-base disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-red-700" 
                                type="submit">
                                <span id="btnSubmitTextPostulation">ENVIAR POSTULACIÓN</span>
                                <span class="material-symbols-outlined">send</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', () => {
        if (typeof createFireParticles === 'function') {
            createFireParticles("postulation");
        } else {
            console.error("El archivo particles.js no está enlazado correctamente");
        }
        
    });
</script>

<script src="public/assets/js/postulation.js?v=1.0"></script>