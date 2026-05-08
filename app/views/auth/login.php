<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? "Autenticación - SANEMOG CONSULTING") ?></title>
    
    <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet">
</head>

<body class="bg-linear-to-br from-gray-50 to-gray-200 text-gray-800 font-['Public_Sans'] min-h-screen flex flex-col selection:bg-[#111D2D] selection:text-white">
    
    <main class="grow flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8 w-full">
        <div id="card" class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 bg-white rounded-3xl overflow-hidden shadow-2xl border border-gray-100 opacity-0 translate-y-10 transition-all duration-800 ease-out">
            
            <div class="hidden md:flex flex-col justify-between p-10 lg:p-12 bg-[#111D2D] text-white relative overflow-hidden">
                <div class="absolute -top-24 -right-24 size-80 bg-blue-500/20 rounded-full blur-3xl mix-blend-screen pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-24 size-72 bg-indigo-500/20 rounded-full blur-3xl mix-blend-screen pointer-events-none"></div>
                
                <div id="left-content" class="space-y-12 relative z-10 flex flex-col justify-center h-full opacity-0 translate-y-6 transition-all duration-700 ease-out">
                    <a href="<?= BASE_URL ?>?url=home" class="inline-flex items-center gap-4 group w-fit">
                        <img 
                            src="<?= BASE_URL ?>public/assets/img/LOGO.webp" 
                            alt="Logo SANEMOG"
                            class="size-14 object-contain transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3"
                        >
                        <div class="leading-none">
                            <h2 class="text-3xl tracking-tight">
                                <span class="font-extrabold">SANEMOG</span><br>
                                <span class="font-light text-xl opacity-80 tracking-widest">CONSULTING</span>
                            </h2>
                        </div>
                    </a>
                    
                    <div class="space-y-4">
                        <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight text-balance">
                            Gestión Contable <br>
                            <span class="text-transparent bg-clip-text bg-linear-to-r from-blue-400 to-indigo-400">
                                Moderna y Segura
                            </span>
                        </h2>
                        <p class="text-lg text-gray-300 max-w-sm leading-relaxed text-balance">
                            Plataforma integral para la gestión de citas.
                        </p>
                    </div>
                </div>
            </div>

            <div id="right-content" class="p-6 sm:p-10 lg:p-16 flex flex-col justify-center bg-white relative opacity-0 translate-y-6 transition-all duration-700 ease-out">
                
                <div class="md:hidden flex items-center gap-3 mb-10">
                    <img src="<?= BASE_URL ?>public/assets/img/LOGO.webp" alt="Logo SANEMOG" class="size-10 object-contain">
                    <h2 class="text-xl font-extrabold text-[#111D2D] tracking-tight">SANEMOG</h2>
                </div>

                <div class="mb-8 lg:mb-10">
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Iniciar Sesión</h3>
                    <p class="text-gray-500 mt-2 text-sm sm:text-base">Ingresa tus credenciales para acceder a tu panel.</p>
                </div>

                <?php if (!empty($error_message)): ?>
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-medium rounded-r-lg animate-fade-in-up">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500">error</span>
                            <?= htmlspecialchars($error_message) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?= BASE_URL ?>?url=auth/login" method="POST" class="space-y-5 sm:space-y-6">
                    
                    <div class="space-y-2 group">
                        <label for="username" class="text-xs font-bold uppercase tracking-wide text-gray-600">
                            Usuario
                        </label>
                        <div class="relative flex items-center group-focus-within:text-[#111D2D]">
                            <span class="material-symbols-outlined absolute left-4 text-gray-400 transition-colors group-focus-within:text-inherit">
                                person
                            </span>
                            <input 
                                id="username"
                                required 
                                type="text" 
                                name="username" 
                                value="<?= htmlspecialchars($username ?? '') ?>"
                                class="input-field w-full h-12 md:h-14 pl-12 pr-4 bg-gray-50/50 border <?= !empty($error_message) ? 'border-red-500' : 'border-gray-200' ?> text-gray-900 rounded-xl focus:ring-4 focus:ring-[#111D2D]/10 focus:border-[#111D2D] outline-none transition-all duration-300 placeholder:text-gray-400 font-medium" 
                                placeholder="Ingresa tu usuario"
                            >
                        </div>
                    </div>

                    <div class="space-y-2 group">
                        <label for="password" class="text-xs font-bold uppercase tracking-wide text-gray-600">
                            Contraseña
                        </label>
                        <div class="relative flex items-center group-focus-within:text-[#111D2D]">
                            <span class="material-symbols-outlined absolute left-4 text-gray-400 transition-colors group-focus-within:text-inherit">
                                lock
                            </span>
                            <input 
                                id="password"
                                required 
                                type="password" 
                                name="password" 
                                class="input-field w-full h-12 md:h-14 pl-12 pr-4 bg-gray-50/50 border <?= !empty($error_message) ? 'border-red-500' : 'border-gray-200' ?> text-gray-900 rounded-xl focus:ring-4 focus:ring-[#111D2D]/10 focus:border-[#111D2D] outline-none transition-all duration-300 placeholder:text-gray-400 font-medium" 
                                placeholder="••••••••"
                            >
                        </div>
                    </div>

                    <button type="submit" class="group w-full h-12 md:h-14 mt-6 bg-[#111D2D] text-white font-semibold rounded-xl hover:bg-[#0a121d] hover:-translate-y-1 hover:shadow-2xl hover:shadow-[#111D2D]/30 focus:ring-4 focus:ring-[#111D2D]/20 active:scale-[0.98] transition-all duration-300 shadow-lg shadow-[#111D2D]/10 flex items-center justify-center gap-2">
                        <span>Ingresar a mi cuenta</span>
                        <span class="material-symbols-outlined text-lg transition-transform duration-300 group-hover:translate-x-1.5">arrow_forward</span>
                    </button>
                    
                </form>
            </div>
        </div>
    </main>

    <footer id="footer" class="w-full py-6 px-4 text-center mt-auto opacity-0 translate-y-6 transition-all duration-700 ease-out">
        <a href="<?= BASE_URL ?>?url=home" class="inline-block text-xs sm:text-sm font-medium text-gray-500 hover:text-[#111D2D] transition-colors">
            © 2025 SANEMOG CONSULTING <br class="sm:hidden"> 
            <span class="hidden sm:inline">|</span> Todos los derechos reservados
        </a>
    </footer>

    <script>
        window.addEventListener("load", () => {
            const elementsToAnimate = [
                document.getElementById("card"),
                document.getElementById("left-content"),
                document.getElementById("right-content"),
                document.getElementById("footer")
            ];

            elementsToAnimate.forEach((el, index) => {
                if (el) {
                    setTimeout(() => {
                        el.classList.remove("opacity-0", "translate-y-10", "translate-y-6");
                    }, index * 150);
                }
            });
        });

        const inputs = document.querySelectorAll(".input-field");

        inputs.forEach(input => {
            input.addEventListener("input", () => {
                input.classList.remove(
                    "border-gray-200", "focus:border-[#111D2D]", "focus:ring-[#111D2D]/10",
                    "border-red-500", "focus:border-red-500", "focus:ring-red-500/20",
                    "border-green-500", "focus:border-green-500", "focus:ring-green-500/20"
                );

                if (input.value.trim() === "") {
                    input.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-500/20");
                } else {
                    input.classList.add("border-green-500", "focus:border-green-500", "focus:ring-green-500/20");
                }
            });
            
            input.addEventListener("blur", () => {
                if (input.value.trim() === "") {
                    input.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-500/20", "border-green-500", "focus:border-green-500", "focus:ring-green-500/20");
                    input.classList.add("border-gray-200", "focus:border-[#111D2D]", "focus:ring-[#111D2D]/10");
                }
            });
        });
    </script>
</body>
</html>