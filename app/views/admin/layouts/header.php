<?php
    $imageFile = !empty($image) ? $image : 'default.webp';
    $imagePath = BASE_URL . "public/assets/img/team/" . $imageFile . "?v=" . time();
    $currentUrl = $_GET['url'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html class="light" lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?= htmlspecialchars($title ?? 'Panel de Control - SANEMOG') ?></title>

        <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">
        <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body class="bg-surface text-on-surface">
        <div class="md:hidden flex items-center justify-between bg-[#111D2D] px-6 py-4 sticky top-0 z-50 shadow-md">
            <div class="flex items-center gap-3">
                <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp" alt="Logo SANEMOG" class="w-12 h-12 object-contain">
                <div class="flex flex-col">
                    <h2 class="text-2xl leading-none text-white whitespace-nowrap">
                        <span class="font-bold uppercase">Sanemog</span><br>
                        <span class="font-normal text-lg opacity-70 tracking-[0.2em]">CONSULTING</span>
                    </h2>
                </div>
            </div>
            <button id="mobileMenuBtn" class="p-2 text-gray-300 hover:text-white transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>

        <div class="flex min-h-screen relative">
            <div id="mobileOverlay" class="fixed inset-0 bg-black/60 z-40 hidden md:hidden transition-opacity opacity-0"></div>
            
            <aside id="sidebar" class="fixed md:sticky top-0 z-50 h-screen overflow-y-auto no-scrollbar bg-[#111D2D] flex flex-col py-6 shrink-0 transition-all duration-300 ease-in-out -translate-x-full md:translate-x-0 w-64 md:w-20 lg:w-72 border-r border-white/5">
                
                <div class="mb-10 px-6 shrink-0">
                    <div class="flex items-center gap-3">
                        <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp" alt="Logo SANEMOG" class="w-12 h-12 object-contain shrink-0">
                        <div class="flex flex-col md:hidden lg:flex">
                            <h2 class="text-2xl leading-none text-white whitespace-nowrap">
                                <span class="font-bold uppercase">Sanemog</span><br>
                                <span class="font-normal text-lg opacity-70 tracking-[0.2em]">CONSULTING</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="flex-1 space-y-1.5 px-4 md:px-2 lg:px-4">
                    <?php
                    $menuItems = [
                        'dashboard' => ['Panel Control', 'dashboard'],
                        'calendar'  => ['Calendario', 'calendar_month'],
                        'clients'   => ['Clientes', 'group'],
                        'services'   => ['Servicios', 'inventory_2'],
                        'settings'  => ['Configuración', 'settings']
                    ];

                    foreach ($menuItems as $url => $info):
                        $isActive = (strpos($currentUrl, $url) !== false);
                        $class = $isActive 
                            ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20' 
                            : 'text-gray-400 hover:bg-white/5 hover:text-white';
                    ?>
                        <a href="<?= BASE_URL ?>?url=<?= $url ?>" 
                           class="flex items-center md:justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 group <?= $class ?>" 
                           title="<?= $info[0] ?>">
                            <span class="material-symbols-outlined <?= $isActive ? 'fill-1' : '' ?> group-hover:scale-110 transition-transform">
                                <?= $info[1] ?>
                            </span>
                            <span class="md:hidden lg:block"><?= $info[0] ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="mt-8 px-4 md:px-2 lg:px-6 space-y-4 shrink-0">
                    <div class="border-t border-white/10 pt-4">
                        <div class="flex items-center justify-center lg:justify-start gap-3 px-2 mb-4">
                            <div class="size-15 rounded-full bg-white/5 flex items-center justify-center text-white/30 shrink-0 overflow-hidden relative border border-white/10">
                                <span class="material-symbols-outlined absolute text-3xl">person</span>
                                <img src="<?= $imagePath ?>" alt="Perfil" class="w-full h-full object-cover relative z-10" onerror="this.style.display='none';" />
                            </div>
                            <div class="md:hidden lg:block overflow-hidden w-full">
                                <div class="text-lg font-bold text-white leading-tight line-clamp-2" title="<?= htmlspecialchars($name ?? 'Admin') ?>">
                                    <?= htmlspecialchars($name ?? 'Admin') ?>
                                </div>
                            </div>
                        </div>
                        <a class="flex items-center md:justify-center lg:justify-start gap-3 px-3 py-3 text-red-400 hover:bg-white/5 rounded-xl text-sm font-medium tracking-tight transition-all" title="Cerrar Sesión" href="<?= BASE_URL ?>?url=auth/logout">
                            <span class="material-symbols-outlined" data-icon="logout">logout</span>
                            <span class="md:hidden lg:block">Cerrar Sesión</span>
                        </a>
                    </div>
                </div>
            </aside>

            <div class="flex-1 min-w-0 flex flex-col bg-[#f8fafc]">
                    
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');

        function toggleMenu() {
            sidebar.classList.toggle('-translate-x-full');
                            
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }
        }

        btn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    });
</script>