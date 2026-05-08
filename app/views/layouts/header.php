<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?? "SANEMOG CONSULTING" ?></title>

        <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">
        <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!-- Google Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <script src="<?= BASE_URL ?>public/assets//js/hero.js"defer></script>
    </head>
    <body class="">
        <!-- Header -->
        <header class="sticky top-0 w-full z-50 bg-[#111D2D] transition-all duration-600">
            <?php $current = $_GET['url'] ?? 'home'; ?>
            <!-- Navbar -->
            <div class="sticky top-0 z-50">
                <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20" aria-label="Global">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <a href="<?= BASE_URL ?>?url=home" class="flex items-center gap-3">
                            <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp" alt="Logo SANEMOG" class="w-12 h-12 object-contain">
                            <div class="flex flex-col">
                                <h2 class="text-2xl leading-none text-white">
                                    <span class="font-bold">SANEMOG</span>
                                    <span class="font-normal"> CONSULTING</span>
                                </h2>
                            </div>
                        </a>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="flex md:hidden">
                        <button type="button" popovertarget="mobile-menu" class="p-2 text-white/70 hover:text-white transition">
                            <span class="material-symbols-outlined text-3xl">menu</span>
                        </button>
                    </div>
                    <!-- Desktop / Tablet Menu -->
                    <div class="hidden md:flex md:gap-x-6 lg:gap-x-8 items-center">
                        <!-- Inicio -->
                        <a href="<?= BASE_URL ?>?url=home" class="hidden text-sm lg:block lg:text-base
                            <?= $current === 'home'
                                ? 'text-white font-bold'
                                : 'text-white/70 hover:text-white hover:scale-110 transition duration-300'?>">
                            Inicio
                        </a>
                        <!-- Nosotros -->
                        <a href="<?= BASE_URL ?>?url=about" class="text-sm lg:text-base
                            <?= $current === 'about'
                                ? 'text-white font-bold'
                                : 'text-white/70 hover:text-white hover:scale-110 transition duration-300'?>">
                            Nosotros
                        </a>
                        <!-- Nuestro Equipo -->
                        <a href="<?= BASE_URL ?>?url=team" class="text-sm lg:text-base
                            <?= $current === 'team'
                                ? 'text-white font-bold'
                                : 'text-white/70 hover:text-white hover:scale-110 transition duration-300'?>">
                            Nuestro Equipo
                        </a>
                        <!-- Servicios -->
                        <a href="<?= BASE_URL ?>?url=service" class="text-sm lg:text-base
                            <?= $current === 'service'
                                ? 'text-white font-bold'
                                : 'text-white/70 hover:text-white hover:scale-110 transition duration-300'?>">
                            Servicios
                        </a>
                        <!-- Contacto -->
                        <a href="<?= BASE_URL ?>?url=contact" class="text-sm lg:text-base
                            <?= $current === 'contact'
                                ? 'text-white font-bold'
                                : 'text-white/70 hover:text-white hover:scale-110 transition duration-300'?>">
                            Contáctenos
                        </a>
                    </div>
                    <!-- Redes sociales -->
                    <div class="hidden md:flex items-center gap-4 ml-6">
                        <a href="https://www.facebook.com/SANEMOGConsulting/" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-facebook text-2xl"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/sanemog" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-linkedin text-2xl"></i>
                        </a>
                        <a href="https://www.instagram.com/sanemogconsulting/" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-instagram text-2xl"></i>
                        </a>
                    </div>
                </nav>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" popover class="md:hidden fixed inset-0 z-50 h-screen w-screen bg-[#111D2D] overflow-y-auto p-4 text-white">
                <?php $current = $_GET['url'] ?? 'home'; ?>
                <!-- Header -->
                <div class="flex items-center justify-between mb-10">
                    <a href="<?= BASE_URL ?>?url=home" class="flex items-center gap-3">
                        <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp" alt="Logo SANEMOG" class="w-12 h-12 object-contain">
                        <div class="flex flex-col">
                            <h2 class="text-2xl leading-none text-white">
                                <span class="font-bold">SANEMOG</span>
                                <span class="font-normal"> CONSULTING</span>
                            </h2>
                        </div>
                    </a>
                    <button type="button" popovertarget="mobile-menu" popovertargetaction="hide" class="p-2 text-white/70 hover:text-white transition">
                        <span class="material-symbols-outlined text-3xl">close</span>
                    </button>
                </div>
                <!-- Links -->
                <div class="space-y-6">
                    <!-- Inicio -->
                    <a href="<?= BASE_URL ?>?url=home" class="block text-lg font-semibold
                    <?= $current === 'home'
                            ? 'text-white border-l-4 border-white pl-3'
                            : 'text-white/70 hover:text-white'?>">
                        Inicio
                    </a>
                    <!-- Nosotros -->
                     <a href="<?= BASE_URL ?>?url=about" class="block text-lg font-semibold
                    <?= $current === 'about'
                            ? 'text-white border-l-4 border-white pl-3'
                            : 'text-white/70 hover:text-white'?>">
                        Nosotros
                    </a>
                    <!-- Nuestro Equipo -->
                     <a href="<?= BASE_URL ?>?url=team" class="block text-lg font-semibold
                    <?= $current === 'team'
                            ? 'text-white border-l-4 border-white pl-3'
                            : 'text-white/70 hover:text-white'?>">
                        Nuestro Equipo
                    </a>
                    <!-- Servicios -->
                    <a href="<?= BASE_URL ?>?url=service" class="block text-lg font-semibold
                    <?= $current === 'service'
                            ? 'text-white border-l-4 border-white pl-3'
                            : 'text-white/70 hover:text-white'?>">
                        Servicios
                    </a>
                    <!-- Contacto -->
                    <a href="<?= BASE_URL ?>?url=contact" class="block text-lg font-semibold
                        <?= $current === 'contact'
                            ? 'text-white border-l-4 border-white pl-3'
                            : 'text-white/70 hover:text-white'?>">
                        Contacto
                    </a>
                    <!-- Redes sociales -->
                    <div class="pt-10 flex justify-center gap-8 text-3xl">
                        <a href="https://www.facebook.com/SANEMOGConsulting/" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/sanemog" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="https://www.instagram.com/sanemogconsulting/" target="_blank"
                        class="text-white/70 hover:text-white hover:scale-120 transition duration-300">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>