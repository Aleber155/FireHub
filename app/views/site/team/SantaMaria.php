<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CV - Juana Santa Maria</title>
        <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">

        <!-- CSS -->
        <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
        <!-- ICONOS -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <!-- CSS PERSONALIZADO -->
        <style>
            /* ===== RESET ===== */
            html, body {
            margin: 0;
            padding: 0;
            }

            /* ===== VISIBILIDAD ===== */
            .cv-print { display: none; }

            /* ===== PRINT ===== */
            @page {
            size: A4;
            margin: 0;
            }

            @media print {
                html, body {
                    margin: 0 !important;
                    padding: 0 !important;
                    background: white;
                }
                .cv-web { display: none !important; }
                .no-print { display: none !important; }
                .cv-print { display: block; }

                .print-page {
                    width: 210mm;
                    height: 297mm;
                    display: flex;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
            }
        </style>
    </head>
    <body class="bg-gray-100 font-sans">
        <!-- BOTONES -->
        <div class="no-print fixed bottom-4 lg:bottom-6 left-1/2 -translate-x-1/2 z-50 w-full px-4">
            <div class="flex justify-center">
                <div class="flex flex-wrap justify-center gap-2 lg:gap-3 px-3 py-2 rounded-2xl bg-white/70 backdrop-blur-xl border border-white/50 shadow-xl">
                    <button onclick="window.print()" class="flex items-center justify-center gap-2 p-2.5 lg:px-4 lg:py-2 rounded-xl text-sm text-[#111D2D] hover:bg-[#111D2D] hover:text-white transition-all bg-white/80 lg:bg-transparent shadow-sm lg:shadow-none">
                        <span class="material-symbols-outlined">print</span>
                        <span class="hidden lg:inline">Imprimir</span>
                    </button>
                    <a href="<?= BASE_URL ?>public/assets/pdf/Juana_SantaMaria.pdf" download="CV Juana Santa Maria.pdf"
                        class="flex items-center justify-center gap-2 p-2.5 lg:px-4 lg:py-2 rounded-xl text-sm text-[#111D2D] hover:bg-[#111D2D] hover:text-white transition-all bg-white/80 lg:bg-transparent shadow-sm lg:shadow-none">
                        <span class="material-symbols-outlined">download</span>
                        <span class="hidden lg:inline">Descargar</span>
                    </a>
                    <a href="#" onclick="agregarContacto(event)" class="flex items-center justify-center gap-2 p-2.5 lg:px-4 lg:py-2 rounded-xl text-sm text-[#111D2D] hover:bg-[#111D2D] hover:text-white transition-all bg-white/80 lg:bg-transparent shadow-sm lg:shadow-none">
                        <span class="material-symbols-outlined">person_add</span>
                        <span class="hidden lg:inline">Agregar contacto</span>
                    </a>
                    <a href="<?= BASE_URL ?>?url=home" target="_blank" class="flex items-center justify-center gap-2 p-2.5 lg:px-4 lg:py-2 rounded-xl text-sm text-[#111D2D] hover:bg-[#111D2D] hover:text-white transition-all bg-white/80 lg:bg-transparent shadow-sm lg:shadow-none">
                        <span class="material-symbols-outlined">public</span>
                        <span class="hidden lg:inline">SANEMOG.COM</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- WEB VERSION -->
        <div class="cv-web w-[95%] sm:w-[90%] max-w-5xl mx-auto my-6 lg:my-10 mb-24 lg:mb-24 bg-white shadow-2xl rounded-2xl lg:rounded-3xl overflow-hidden flex flex-col lg:flex-row antialiased">
            <!-- SIDEBAR -->
            <div class="w-full lg:w-[35%] bg-[#111D2D] text-gray-200 px-6 py-8 lg:px-8 lg:py-10 flex flex-col">
                <div class="flex flex-row lg:flex-col items-center lg:items-center gap-5 mb-8">
                    <div class="w-[40%] sm:w-48 lg:w-full shrink-0 lg:flex lg:justify-center">
                        <img src="<?= BASE_URL ?>public/assets/img/team/Juana_SantaMaria.webp" 
                            alt="JUANA SANTA MARIA BACA" 
                            class="w-full h-auto aspect-3/4 object-cover object-top rounded-2xl lg:rounded-3xl border-2 border-white/80 shadow-xl">
                    </div>

                    <div class="lg:hidden flex-1">
                        <h1 class="text-xl md:text-3xl font-extrabold text-white tracking-tight leading-tight uppercase">
                            JUANA SANTA MARIA BACA
                        </h1>
                        <p class="text-xs md:text-lg font-bold text-[#2F80ED] mt-1 mb-3 uppercase tracking-wider">
                            Mg. en Auditoría Contable y Financiera | Auditora Financiera | Perito Contable
                        </p>
                        <div class="text-xs md:text-lg text-gray-400 space-y-1 border-l-2 border-[#2F80ED] pl-3">
                            <p class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">phone_iphone</span> 
                                944 272 013
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">mail</span> 
                                jsantamaria@sanemog.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-8">
                    <h2 class="text-white text-sm font-bold tracking-wider uppercase border-b border-gray-600 pb-1.5 mb-3">Perfil</h2>
                    <p class="text-sm leading-relaxed text-gray-300 text-pretty text-justify">
                        Contadora Pública Colegiada Certificada (CPCC), Magíster en Auditoría Contable y Financiera. 
                        Auditora independiente con sólida trayectoria como Gerente de Finanzas y Asesora a nivel directivo para importantes empresas del 
                        sector privado. Especialista en la gestión integral de contabilidad, tributación, finanzas y recursos humanos. Profesional proactiva, 
                        orientada a resultados y con gran capacidad de interacción para liderar y colaborar en equipos de trabajo multidisciplinarios.
                    </p>
                </div>

                <div class="mb-8">
                    <h2 class="text-white text-sm font-bold tracking-wider uppercase border-b border-gray-600 pb-1.5 mb-4">Especializaciones</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <p class="text-base font-semibold text-white leading-tight">Peritaje Contable</p>
                                <p class="text-xs text-gray-500 mt-1">Colegio de Contadores Públicos de Lima</p>
                            </div>
                            <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-2 py-0.5 rounded border border-[#2F80ED]/30 uppercase min-w-10 text-center">PER</span>
                        </div>
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <p class="text-base font-semibold text-white leading-tight">Contabilidad de Costos</p>
                                <p class="text-xs text-gray-500 mt-1">Universidad Peruana de Ciencias Aplicadas</p>
                            </div>
                            <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-2 py-0.5 rounded border border-[#2F80ED]/30 uppercase min-w-10 text-center">PER</span>
                        </div>
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <p class="text-base font-semibold text-white leading-tight">Auditoría Financiera</p>
                                <p class="text-xs text-gray-500 mt-1">Colegio de Contadores Públicos de Lima</p>
                            </div>
                            <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-2 py-0.5 rounded border border-[#2F80ED]/30 uppercase min-w-10 text-center">PER</span>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-white text-sm font-bold tracking-wider uppercase border-b border-gray-600 pb-1.5 mb-4">Habilidades</h2>
                    <div class="space-y-3.5">
                        <div>
                            <p class="text-sm text-gray-300 mb-1 flex justify-between">Contabilidad y Finanzas <span>95%</span></p>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-[#2F80ED] h-1.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-300 mb-1 flex justify-between">Auditoría y Tributación <span>90%</span></p>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-[#2F80ED] h-1.5 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-300 mb-1 flex justify-between">Software Contable Siscont <span>100%</span></p>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-[#2F80ED] h-1.5 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-300 mb-1 flex justify-between">Microsoft Excel Avanzado <span>85%</span></p>
                            <div class="w-full bg-gray-700 rounded-full h-1.5">
                                <div class="bg-[#2F80ED] h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-white text-sm font-bold tracking-wider uppercase border-b border-gray-600 pb-1.5 mb-3">Idiomas</h2>
                    <ul class="text-sm space-y-1.5 text-gray-300">
                        <li class="flex justify-between items-center">
                            <span>Inglés</span> <span class="text-sm bg-gray-700/50 px-2 py-0.5 rounded text-gray-300">Básico</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span>Italiano</span> <span class="text-sm bg-gray-700/50 px-2 py-0.5 rounded text-gray-300">Básico</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- CONTENIDO -->
            <div class="w-full lg:w-[65%] px-6 py-8 lg:px-10 lg:py-10 bg-white text-gray-800">
                <div class="hidden lg:block mb-8 border-b border-gray-100 pb-6 text-left">
                    <h1 class="text-2xl lg:text-4xl font-extrabold text-[#111D2D] tracking-tight mb-1 uppercase">
                        JUANA SANTA MARIA BACA
                    </h1>
                    <p class="text-base font-bold text-[#2F80ED] mb-4">
                        Mg. en Auditoría Contable y Financiera | Auditora Financiera | Perito Contable
                    </p>
                    <div class="text-sm text-gray-600 space-y-1 flex flex-col items-start border-l-4 border-[#2F80ED] pl-4">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">phone_iphone</span> 944 272 013</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">mail</span> jsantamaria@sanemog.com</p>
                    </div>
                </div>

                <h2 class="text-lg font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1.5 mb-6">Reconocimientos</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="bg-gray-50 p-4 rounded-xl border-l-4 border-[#2F80ED] shadow-sm md:col-span-2">
                        <p class="text-xs font-bold text-[#111D2D] uppercase tracking-wider mb-1">Trayectoria Profesional</p>
                        <p class="text-sm text-gray-700 font-medium">Reconocimiento por los 25 años de ejercicio profesional - CCPL</p>
                    </div>
                </div>
                
                <h2 class="text-lg font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1.5 mb-6">Experiencia Profesional</h2>
                <div class="space-y-8 lg:space-y-6 mb-10">
                    <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-baseline mb-1">
                            <h3 class="text-base font-bold text-[#111D2D] leading-tight">Contador General Externo</h3>
                        </div>
                        <p class="text-sm font-semibold text-gray-700 mt-1">Estudio Contable Santa María Baca</p>
                        <p class="text-sm text-gray-600 mt-1">Asesoría a múltiples empresas incluyendo:</p>
                        <p class="text-xs text-gray-500 mt-1 bg-gray-100 inline-block px-2 py-1 rounded">CIVELMEC SAC | SGA FARMA SAC | ELEMSIN EIRL | DAMI SALUD SAC</p>
                    </div>
                    <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-baseline mb-1">
                            <h3 class="text-base font-bold text-[#111D2D] leading-tight">Auditora</h3>
                        </div>
                        <p class="text-sm font-semibold text-gray-700 mt-1">Gobierno Regional De Salud</p>
                        <p class="text-sm text-gray-600 mt-1 leading-snug">Órgano de Control Institucional – DIRESA – Huacho – Lima</p>
                    </div>
                    <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-baseline mb-1">
                            <h3 class="text-base font-bold text-[#111D2D] leading-tight">Contador General</h3>
                        </div>
                        <p class="text-sm font-semibold text-gray-700 mt-1">Keops Constructores SRL</p>
                        <p class="text-sm text-gray-600 mt-1 leading-snug">Empresa dedicada a la construcción de edificios completos y afines.</p>
                        <p class="text-xs text-gray-500 mt-1 bg-gray-100 inline-block px-2 py-1 rounded">Rubro: Construcción</p>
                    </div>
                </div>
                <h2 class="text-lg font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1.5 mb-6">Formación y Postgrado</h2>
                <div class="space-y-4">
                    <div class="flex flex-col lg:flex-row lg:justify-between pb-3 border-b border-gray-100/50">
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Doctorado en Contabilidad
                                <p class="text-xs text-gray-500 mt-1 bg-gray-50 inline-block px-2 py-1 rounded">Por Sustentar</p>
                            </h3>
                            <p class="text-sm text-gray-600">Universidad Nacional Federico Villarreal</p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between pb-3 border-b border-gray-100/50">
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Maestría en Auditoria Contable y Financiera</h3>
                            <p class="text-sm text-gray-600">Universidad Nacional Federico Villarreal</p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between pb-3 border-b border-gray-100/50">
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Perito Contable</h3>
                            <p class="text-sm text-gray-600">Colegio de Contadores Públicos de Lima</p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between pb-3 border-b border-gray-100/50">
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Auditor Independiente</h3>
                            <p class="text-sm text-gray-600">Colegio de Contadores Públicos</p>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between">
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Contadora Pública Colegiada</h3>
                            <p class="text-sm text-gray-600">Universidad Inca Garcilaso de la Vega</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRINT VERSION -->
        <div class="cv-print">
            <div class="print-page flex flex-row w-full bg-white">
                
                <div class="w-[35%] bg-[#111D2D] text-white p-8 flex flex-col">
                    <div class="flex justify-center mb-8">
                        <img src="<?= BASE_URL ?>public/assets/img/team/Juana_SantaMaria.png" 
                             class="w-44 h-60 object-cover rounded-3xl border-2 border-white/50 shadow-lg">
                    </div>

                    <div class="mb-8">
                        <h2 class="text-base font-bold tracking-wider uppercase border-b border-white/30 pb-1.5 mb-3">Perfil</h2>
                        <p class="text-xs leading-relaxed text-gray-300 text-justify">
                            CPCC, Magíster en Auditoría. Auditora independiente con sólida trayectoria como Gerente de Finanzas. Especialista en gestión integral de contabilidad, tributación y recursos humanos.
                        </p>
                    </div>

                    <div class="mb-8">
                        <h2 class="text-base font-bold tracking-wider uppercase border-b border-white/30 pb-1.5 mb-4">Especializaciones</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-semibold text-white leading-tight">Peritaje Contable</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Colegio de Contadores Públicos de Lima</p>
                                </div>
                                <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-1 py-0.5 rounded border border-[#2F80ED]/30 uppercase">PER</span>
                            </div>
                            <div class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-semibold text-white leading-tight">Contabilidad de Costos</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Universidad Peruana de Ciencias Aplicadas</p>
                                </div>
                                <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-1 py-0.5 rounded border border-[#2F80ED]/30 uppercase">PER</span>
                            </div>
                            <div class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-semibold text-white leading-tight">Auditoría Financiera</p>
                                    <p class="text-xs text-gray-400 mt-0.5">Colegio de Contadores Públicos de Lima</p>
                                </div>
                                <span class="text-xs font-semibold bg-gray-700/50 text-gray-400 px-1 py-0.5 rounded border border-[#2F80ED]/30 uppercase">PER</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h2 class="text-base font-bold tracking-wider uppercase border-b border-white/30 pb-1.5 mb-4">Habilidades</h2>
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs text-gray-300 mb-1 flex justify-between">Contabilidad y Finanzas <span>95%</span></p>
                                <div class="w-full bg-gray-700 rounded-full h-1">
                                    <div class="bg-[#2F80ED] h-1 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-300 mb-1 flex justify-between">Auditoría y Tributación <span>90%</span></p>
                                <div class="w-full bg-gray-700 rounded-full h-1">
                                    <div class="bg-[#2F80ED] h-1 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-300 mb-1 flex justify-between">Software Contable Siscont <span>100%</span></p>
                                <div class="w-full bg-gray-700 rounded-full h-1">
                                    <div class="bg-[#2F80ED] h-1 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-300 mb-1 flex justify-between">Microsoft Excel Avanzado <span>85%</span></p>
                                <div class="w-full bg-gray-700 rounded-full h-1">
                                    <div class="bg-[#2F80ED] h-1 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-white text-base font-bold tracking-wider uppercase border-b border-gray-600 pb-1.5 mb-3">Idiomas</h2>
                        <ul class="text-sm space-y-1.5 text-gray-300">
                            <li class="flex justify-between items-center">
                                <span>Inglés</span> <span class="text-xs bg-gray-700/50 px-2 py-0.5 rounded text-gray-300">Básico</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span>Italiano</span> <span class="text-xs bg-gray-700/50 px-2 py-0.5 rounded text-gray-300">Básico</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-[65%] p-10 bg-white">
                    <div class="mb-6 border-b border-gray-100 pb-4">
                        <h1 class="text-3xl font-extrabold text-[#111D2D] tracking-tight mb-1 uppercase">
                            JUANA SANTA MARIA BACA
                        </h1>
                        <p class="text-base font-bold text-[#2F80ED] mb-3">
                            Mg. en Auditoría Contable y Financiera | Auditora Financiera | Perito Contable
                        </p>
                        <div class="text-xs text-gray-600 space-y-1 flex flex-col items-start border-l-4 border-[#2F80ED] pl-4">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-[12px]">phone_iphone</span> 944 272 013</p>
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-[12px]">mail</span> jsantamaria@sanemog.com</p>
                    </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-md font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1 mb-3">Reconocimientos</h2>
                        <div class="bg-gray-50 p-3 rounded-lg border-l-4 border-[#2F80ED]">
                            <p class="text-sm font-bold text-[#111D2D] uppercase tracking-wider">Trayectoria Profesional</p>
                            <p class="text-xs text-gray-700">Reconocimiento por los 25 años de ejercicio profesional - CCPL</p>
                        </div>
                    </div>

                    <h2 class="text-md font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1 mb-4">Experiencia Profesional</h2>
                    <div class="space-y-5 mb-8">
                        <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                            <h3 class="text-base font-bold text-[#111D2D]">Contador General Externo</h3>
                            <p class="text-sm font-semibold text-gray-700">Estudio Contable Santa María Baca</p>
                            <p class="text-xs text-gray-600 mt-0.5">CIVELMEC SAC | SGA FARMA SAC | ELEMSIN EIRL | DAMI SALUD SAC</p>
                        </div>

                        <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                            <h3 class="text-base font-bold text-[#111D2D]">Auditora</h3>
                            <p class="text-sm font-semibold text-gray-700">Gobierno Regional De Salud</p>
                            <p class="text-xs text-gray-600 mt-0.5">Órgano de Control Institucional – DIRESA – Huacho – Lima</p>
                        </div>

                        <div class="border-l-2 border-[#2F80ED]/40 pl-4">
                            <h3 class="text-base font-bold text-[#111D2D]">Contador General</h3>
                            <p class="text-sm font-semibold text-gray-700">Keops Constructores SRL</p>
                            <p class="text-xs text-gray-600 mt-0.5">Rubro: Construcción</p>
                        </div>
                    </div>

                    <h2 class="text-md font-bold text-[#111D2D] uppercase border-b-2 border-gray-100 pb-1 mb-4">Formación y Postgrado</h2>
                    <div class="space-y-3">
                        <div class="flex flex-col lg:flex-row lg:justify-between">
                            <div>
                                <h3 class="text-base font-bold text-[#111D2D]">Doctorado en Contabilidad
                                    <p class="text-xs text-gray-500 mt-1 bg-gray-50 inline-block px-2 py-1 rounded">Por Sustentar</p>
                                </h3>
                                <p class="text-sm text-gray-600">Universidad Nacional Federico Villarreal</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Maestría en Auditoría Contable y Financiera</h3>
                            <p class="text-sm text-gray-600">Universidad Nacional Federico Villarreal</p>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Perito Contable</h3>
                            <p class="text-sm text-gray-600">Colegio de Contadores Públicos de Lima</p>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Auditor Independiente</h3>
                            <p class="text-sm text-gray-600">Colegio de Contadores Públicos</p>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-[#111D2D]">Contadora Pública Colegiada</h3>
                            <p class="text-sm text-gray-600">Universidad Inca Garcilaso de la Vega</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    // Función auxiliar para convertir la imagen a Base64 (JPEG)
    async function obtenerFotoBase64(url) {
        return new Promise((resolve) => {
            const img = new Image();
            img.crossOrigin = 'Anonymous'; // Evita bloqueos de seguridad del navegador
            img.onload = () => {
                const canvas = document.createElement('canvas');
                // Reducimos un poco el tamaño para que el archivo .vcf no sea pesadísimo
                const MAX_WIDTH = 300;
                const scaleSize = MAX_WIDTH / img.width;
                canvas.width = MAX_WIDTH;
                canvas.height = img.height * scaleSize;
                
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                
                // Exportar a JPEG con 80% de calidad
                const dataURL = canvas.toDataURL('image/jpeg', 0.8);
                resolve(dataURL.split(',')[1]); // Solo queremos el código base64 puro
            };
            img.onerror = () => {
                console.warn("No se pudo cargar la imagen para el vCard");
                resolve(""); // Si falla, devolvemos vacío para no romper el código
            };
            img.src = url;
        });
    }

    async function agregarContacto(event) {
        event.preventDefault(); 
        
        // 1. Obtenemos la foto en base64 desde la ruta de tu servidor (Usamos la ruta del PNG de impresión)
        const imgUrl = "<?= BASE_URL ?>public/assets/img/team/Juana_SantaMaria.png";
        const fotoBase64 = await obtenerFotoBase64(imgUrl);

        // 2. Construimos el vCard. ¡Sin espacios a la izquierda!
        let vcard = `BEGIN:VCARD
VERSION:3.0
FN:Juana Santa Maria
N:Santa Maria;Juana;;;
ORG:SANEMOG
TITLE:Contadora Pública
TEL;TYPE=CELL:944272013
EMAIL:jsantamaria@sanemog.com
ADR:;;Av. San Felipe 695\\, Jesús María;Lima;;Perú
URL:https://sanemog.com`;

        // 3. Si se logró procesar la foto, la añadimos al vCard
        if (fotoBase64) {
            vcard += `\nPHOTO;ENCODING=b;TYPE=JPEG:${fotoBase64}`;
        }

        vcard += `\nEND:VCARD`;

        // 4. Detección de dispositivos y descarga
        const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);

        if (isIOS) {
            window.location.href = "data:text/vcard;charset=utf-8," + encodeURIComponent(vcard);
        } else {
            // Método para Android (S24 Ultra) y Escritorio
            const blob = new Blob([vcard], { type: 'text/vcard;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            
            link.href = url;
            link.setAttribute('download', 'Juana_SantaMaria.vcf');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            setTimeout(() => URL.revokeObjectURL(url), 100);
        }
    }
</script>
    </body>
</html>