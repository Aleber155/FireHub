<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "FireHub" ?></title>
    <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">
    
    <?php
    $is_local = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost');
    if ($is_local): ?>
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/assets/js/main.js"></script>
    <?php else: ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>public/dist/assets/main.css">
        <script type="module" src="<?= BASE_URL ?>public/dist/assets/main.js"></script>
    <?php endif; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    
    <script src="<?= BASE_URL ?>public/assets/js/particles.js" defer></script>
</head>
<body class="bg-neutral-secondary-soft text-body antialiased">

<?php $current = $_GET['url'] ?? 'home'; ?>

<header class="fixed top-0 left-0 w-full z-50 pt-4 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto flex flex-col gap-2">
        
        <nav class="bg-black/60 backdrop-blur-2xl border border-white/10 shadow-lg shadow-black/20 rounded-full transition-all duration-300">
            <div class="flex items-center justify-between px-3 py-3">
                
                <a href="<?= BASE_URL ?>?url=home" class="flex items-center space-x-3 rtl:space-x-reverse transition-opacity hover:opacity-80 shrink-0">
                    <img src="<?= BASE_URL ?>public/assets/img/LOGO.png" class="h-10 w-10 object-contain" alt="FireHub Logo" />
                    <div class="flex flex-col">
                        <span class="text-[8.2px] font-bold tracking-[0.2em] text-primary uppercase leading-none mb-0.5">Nuevo Milenio</span>
                        <span class="text-3xl text-white font-black leading-none whitespace-nowrap">B-155</span>
                    </div>
                </a>
                
                <div class="hidden md:flex items-center space-x-1 font-medium text-sm text-white">
                    
                    <a href="<?= BASE_URL ?>?url=home" class="hidden lg:block px-4 py-2 rounded-full transition-colors <?= $current === 'home' ? 'bg-primary text-white font-bold shadow-md shadow-primary/30' : 'text-white hover:bg-white/10' ?>">
                        Inicio
                    </a>
                    
                    <div class="relative group">
                        <button class="flex items-center gap-1.5 px-4 py-2 rounded-full transition-colors <?= in_array($current, ['history','organic']) ? 'text-primary font-semibold' : 'hover:text-white hover:bg-primary/50' ?>">
                            Nosotros <svg class="w-2.5 h-2.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-52 bg-black/60 backdrop-blur-3xl border border-white/10 rounded-2xl opacity-0 translate-y-1 group-hover:opacity-100 group-hover:translate-y-0 invisible group-hover:visible transition-all duration-200 z-10 overflow-hidden shadow-xl shadow-black/30">
                            <div class="p-1.5 flex flex-col">
                                <a href="<?= BASE_URL ?>?url=history" class="px-4 py-2.5 rounded-xl text-slate-200 hover:bg-primary/50 hover:text-white transition-colors">Nuestra Historia</a>
                                <a href="<?= BASE_URL ?>?url=organic" class="px-4 py-2.5 rounded-xl text-slate-200 hover:bg-primary/50 hover:text-white transition-colors">Cuadro Orgánico</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center gap-1.5 px-4 py-2 rounded-full transition-colors <?= in_array($current, ['emergencies','training']) ? 'text-primary font-semibold' : 'hover:text-white hover:bg-primary/50' ?>">
                            Servicios <svg class="w-2.5 h-2.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-52 bg-black/60 backdrop-blur-3xl border border-white/10 rounded-2xl opacity-0 translate-y-1 group-hover:opacity-100 group-hover:translate-y-0 invisible group-hover:visible transition-all duration-200 z-10 overflow-hidden shadow-xl shadow-black/30">
                            <div class="p-1.5 flex flex-col">
                                <a href="<?= BASE_URL ?>?url=emergencies" class="px-4 py-2.5 rounded-xl text-slate-200 hover:bg-primary/50 hover:text-white transition-colors">Emergencias</a>
                                <a href="<?= BASE_URL ?>?url=training" class="px-4 py-2.5 rounded-xl text-slate-200 hover:bg-primary/50 hover:text-white transition-colors">Capacitaciones</a>
                            </div>
                        </div>
                    </div>

                    <a href="<?= BASE_URL ?>?url=postulation" class="px-4 py-2 rounded-full transition-colors <?= $current === 'postulation' ? 'text-primary font-semibold' : 'hover:text-white hover:bg-primary/50' ?>">Postulación</a>
                    <a href="<?= BASE_URL ?>?url=contact" class="px-4 py-2 rounded-full transition-colors <?= $current === 'contact' ? 'text-primary font-semibold' : 'hover:text-white hover:bg-primary/50' ?>">Contacto</a>
                </div>

                <div class="flex items-center space-x-1 shrink-0">
                    <a href="<?= BASE_URL ?>?url=history" class="group relative inline-flex items-center justify-center overflow-hidden bg-primary hover:bg-primary/90 text-white text-sm font-medium px-8 lg:px-8 py-3 lg:py-3 rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 shrink-0">
                        <span class="transition-all duration-400 group-hover:-translate-x-3">
                            Portal
                        </span>
                        <span class="material-symbols-outlined absolute right-0 translate-x-10 opacity-0 transition-all duration-400 group-hover:-translate-x-4 group-hover:opacity-100 text-[18px]">
                            login
                        </span>
                    </a>
                    
                    <button data-collapse-toggle="navbar-main" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-white rounded-full md:hidden hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/20 transition-all">
                        <span class="sr-only">Abrir menú</span>
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
                
            </div>
        </nav>

        <div class="hidden w-full md:hidden transition-all duration-300" id="navbar-main">
            <div class="flex flex-col p-4 bg-black/40 backdrop-blur-3xl border border-white/10 rounded-3xl shadow-2xl shadow-black/50 space-y-2 mt-2">
                
                <a href="<?= BASE_URL ?>?url=home" class="block px-4 py-3 rounded-xl text-white hover:bg-primary/50 transition-all duration-300 <?= $current === 'home' ? 'bg-primary/50 font-semibold text-primary' : '' ?>">
                    Inicio
                </a>
                
                <div class="px-4 py-3 bg-white/5 rounded-2xl border border-white/5">
                    <span class="text-[10px] font-bold text-white/50 uppercase tracking-widest mb-3 block">Nosotros</span>
                    <div class="flex flex-col space-y-1 ml-2 border-l border-white/10 pl-2">
                        <a href="<?= BASE_URL ?>?url=history" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-primary/50 hover:text-white transition-colors <?= $current === 'history' ? 'text-primary font-bold' : '' ?>">
                            Nuestra Historia
                        </a>
                        <a href="<?= BASE_URL ?>?url=organic" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-primary/50 hover:text-white transition-colors <?= $current === 'organic' ? 'text-primary font-bold' : '' ?>">
                            Cuadro Orgánico
                        </a>
                    </div>
                </div>

                <div class="px-4 py-3 bg-white/5 rounded-2xl border border-white/5">
                    <span class="text-[10px] font-bold text-white/50 uppercase tracking-widest mb-3 block">Servicios</span>
                    <div class="flex flex-col space-y-1 ml-2 border-l border-white/10 pl-2">
                        <a href="<?= BASE_URL ?>?url=emergencies" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-primary/50 hover:text-white transition-colors <?= $current === 'emergencies' ? 'text-primary font-bold' : '' ?>">
                            Emergencias
                        </a>
                        <a href="<?= BASE_URL ?>?url=training" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:bg-primary/50 hover:text-white transition-colors <?= $current === 'training' ? 'text-primary font-bold' : '' ?>">
                            Capacitaciones
                        </a>
                    </div>
                </div>

                <a href="<?= BASE_URL ?>?url=postulation" class="block px-4 py-3 rounded-xl bg-white/5 text-white hover:bg-primary/50 transition-all duration-300 <?= $current === 'postulation' ? 'bg-white/10 font-semibold text-primary' : '' ?>">
                    Postulación
                </a>
                <a href="<?= BASE_URL ?>?url=contact" class="block px-4 py-3 rounded-xl bg-white/5 text-white hover:bg-primary/50 transition-all duration-300 <?= $current === 'contact' ? 'bg-white/10 font-semibold text-primary' : '' ?>">
                    Contacto
                </a>
                
            </div>
        </div>
    </div>
</header>