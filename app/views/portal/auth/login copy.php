<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'FireHub' ?></title>

    <link rel="icon" href="<?= BASE_URL ?>public/assets/img/LOGO.ico">

    <?php
    $is_local = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost';

    if ($is_local): ?>
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/assets/js/main.js"></script>
    <?php else: ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>public/dist/assets/main.css">
        <script type="module" src="<?= BASE_URL ?>public/dist/assets/main.js"></script>
    <?php endif;
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <script src="<?= BASE_URL ?>public/assets/js/particles.js" defer></script>
</head>

<body id="login" class="min-h-dvh flex flex-col items-center justify-center text-white font-sans relative overflow-x-hidden isolate bg-background p-4">

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div id="bgImage"
            class="absolute inset-0 bg-cover bg-center transition-all duration-500"
            style="background-image: url('<?= BASE_URL ?>public/assets/img/BACKGROUND-02.png');">
        </div>

        <div id="overlay"
            class="absolute inset-0 bg-linear-to-bl from-background/80 via-background/90 to-background transition-colors duration-500">
        </div>

        <canvas class="absolute inset-0 pointer-events-none"></canvas>
    </div>

    <div class="hidden sm:block w-full max-w-md pb-4 relative z-20 shrink-0">
        <a href="<?= BASE_URL ?>?url=home"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-white/5 backdrop-blur-md border border-white/10 text-white/70 hover:text-white hover:bg-white/10 text-sm font-medium transition-all duration-300">
            <span class="material-symbols-outlined text-base">
                arrow_back
            </span>
            Inicio
        </a>
    </div>

    <main class="w-full max-w-md relative z-10 flex flex-col">
        <div class="relative bg-white/5 backdrop-blur-md border border-white/10 rounded-xl p-1 flex overflow-hidden mb-5 shrink-0">
            <div id="indicator"
                class="absolute inset-y-1 left-1 w-[calc(50%-0.25rem)] bg-red-600/20 border border-red-600/40 rounded-lg transition-all duration-300">
            </div>

            <button id="btnEfectivo"
                class="relative z-10 flex-1 h-10 text-sm font-semibold text-white hover:text-white transition-colors">
                EFECTIVOS
            </button>

            <button id="btnAspirante"
                class="relative z-10 flex-1 h-10 text-sm font-semibold text-white/60 hover:text-white transition-colors">
                ASPIRANTES
            </button>
        </div>

        <div class="bg-white/5 backdrop-blur-md border border-white/10 p-5 sm:p-8 md:p-10 rounded-2xl shadow-2xl text-white">

            <div class="text-center mb-6">
                <div class="flex items-center justify-center">
                    <a href="" class="flex items-center gap-4">
                        <img src="<?= BASE_URL ?>public/assets/img/LOGO.png"
                            alt="Logo B-155"
                            class="w-20 h-20 sm:w-28 sm:h-28 object-contain drop-shadow-md">

                        <div class="hidden sm:flex flex-col items-center">
                            <p id="title"
                                class="text-xl font-black tracking-[0.3em] uppercase text-red-600 transition-colors">
                                Nuevo Milenio
                            </p>
                            <h1 class="text-6xl sm:text-7xl font-black leading-none tracking-tight">
                                B-155
                            </h1>
                        </div>
                    </a>
                </div>

                <p id="subtitle"
                    class="text-lg sm:text-xl font-bold tracking-[0.25em] text-red-600 mt-3 transition-colors">
                    SISTEMA DE GESTIÓN INTERNA
                </p>

                <div id="divider"
                    class="h-1 w-24 bg-red-600 mx-auto mt-4 rounded-full transition-colors">
                </div>
            </div>


<!-- ROLE SWITCH -->
            <div
                class="mt-8 flex items-center justify-center">

                <div
                    class="relative flex items-center bg-white/5 border border-white/10 rounded-2xl p-1 w-full max-w-[340px] overflow-hidden">

                    <div id="indicator"
                        class="absolute left-1 top-1 bottom-1 w-[calc(50%-4px)] rounded-xl bg-red-600 shadow-[0_0_25px_rgba(255,0,0,0.45)] transition-all duration-300">
                    </div>

                    <button id="btnEfectivo"
                        class="relative z-10 flex-1 h-12 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 text-white transition-all duration-300">

                        <span class="material-symbols-outlined text-[18px]">
                            local_fire_department
                        </span>

                        Efectivos
                    </button>

                    <button id="btnAspirante"
                        class="relative z-10 flex-1 h-12 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 text-white/50 transition-all duration-300">

                        <span class="material-symbols-outlined text-[18px]">
                            school
                        </span>

                        Aspirantes
                    </button>
                </div>
            </div>



            <form class="space-y-5">
                <div class="relative">
                    <input type="text"
                        id="codigo"
                        name="codigo"
                        required
                        placeholder=" "
                        class="p-input block w-full px-4 pb-2.5 pt-6 h-14 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />

                    <label for="codigo"
                        id="labelUser"
                        class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                        <span id="iconUser"
                            class="material-symbols-outlined text-[18px] me-1.5 text-red-700 transition-colors">
                            badge
                        </span>
                        Código de Usuario
                    </label>
                </div>

                <div class="relative">
                    <input id="password"
                        name="password"
                        type="password"
                        required
                        placeholder=" "
                        class="p-input block w-full px-4 pb-2.5 pt-6 pr-12 h-14 text-sm sm:text-base text-white bg-white/5 rounded-xl border border-white/30 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer hover:bg-white/10 transition-colors duration-300 autofill:[transition:background-color_5000s_ease-in-out_0s] autofill:[-webkit-text-fill-color:#fff]" />

                    <label for="password"
                        id="labelPass"
                        class="inline-flex items-center absolute text-sm text-white/70 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-left inset-s-4 peer-focus:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 pointer-events-none">
                        <span id="iconLock"
                            class="material-symbols-outlined text-[18px] me-1.5 text-red-700 transition-colors">
                            lock
                        </span>
                        Contraseña
                    </label>

                    <button type="button"
                        id="togglePassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-white/40 hover:text-white transition z-20">
                        <span id="toggleIcon"
                            class="material-symbols-outlined">
                            visibility
                        </span>
                    </button>
                </div>

                <div class="flex items-center justify-between gap-4 text-sm">
                    <label class="flex items-center gap-2 text-white/60 cursor-pointer select-none">
                        <input type="checkbox"
                            class="w-4 h-4 bg-transparent border-white/30 rounded text-red-600 focus:ring-red-600 focus:ring-2 cursor-pointer transition-colors">
                        Recordarme
                    </label>

                    <a href="#" class="text-white/50 hover:text-red-500 transition-colors">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <div class="pt-1">
                    <button type="submit"
                        id="loginBtn"
                        class="cursor-pointer w-full bg-red-700 text-white font-black hover:bg-red-800 transition-colors duration-300 py-4 rounded-xl flex items-center justify-center gap-2 text-sm sm:text-base shadow-lg shadow-red-700/20 active:scale-[0.98] uppercase tracking-wider">
                        <span class="material-symbols-outlined">
                            login
                        </span>
                        INICIAR SESIÓN
                    </button>
                </div>
            </form>

            


            <div class="mt-5 overflow-hidden rounded-xl border border-white/10 bg-white/5 backdrop-blur-md">
                <div id="slides" class="flex w-[200%] transition-transform duration-500">
                    <div class="w-1/2 p-4 text-xs text-white/70">
                        <div class="flex gap-3">
                            <span class="material-symbols-outlined text-red-500">
                                verified_user
                            </span>
                            <div>
                                Acceso exclusivo para personal activo autorizado.
                                <p class="text-white/40 mt-2 border-t border-white/10 pt-2 text-[10px]">
                                    * Actividad monitoreada y registrada.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2 p-4 text-xs text-white/70">
                        <div class="flex gap-3">
                            <span class="material-symbols-outlined text-blue-500">
                                school
                            </span>
                            <div>
                                Portal de formación y seguimiento académico.
                                <p class="text-white/40 mt-2 border-t border-white/10 pt-2 text-[10px]">
                                    * Uso interno exclusivo para aspirantes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="w-full max-w-md relative z-10 text-center pt-6 pb-2 text-xs text-white/40 space-y-2 shrink-0">
        <div class="font-medium tracking-wide">
            Nuevo Milenio B-155 | Gestión Interna v1.0
        </div>

        <div class="flex items-center justify-center gap-1 text-white/30">
            <span class="material-symbols-outlined text-xs">
                e911_emergency
            </span>
            <span>
                FireHub
            </span>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof createFireParticles === 'function') {
                createFireParticles("login");
            }

            const bgImage = document.getElementById("bgImage");
            const btnE = document.getElementById("btnEfectivo");
            const btnA = document.getElementById("btnAspirante");
            const indicator = document.getElementById("indicator");
            const title = document.getElementById("title");
            const subtitle = document.getElementById("subtitle");
            const divider = document.getElementById("divider");
            const loginBtn = document.getElementById("loginBtn");
            const overlay = document.getElementById("overlay");
            const iconUser = document.getElementById("iconUser");
            const iconLock = document.getElementById("iconLock");
            const inputUser = document.getElementById("codigo");
            const inputPass = document.getElementById("password");
            const labelUser = document.getElementById("labelUser");
            const labelPass = document.getElementById("labelPass");
            const slides = document.getElementById("slides");
            const togglePassword = document.getElementById("togglePassword");
            const toggleIcon = document.getElementById("toggleIcon");

            // MUESTRA Y OCULTA CONTRASEÑA
            togglePassword.addEventListener("click", () => {
                const isPassword = inputPass.type === "password";
                inputPass.type = isPassword ? "text" : "password";
                toggleIcon.textContent = isPassword ? "visibility_off" : "visibility";
            });

            // INTERCAMBIO DE TEMÁTICAS SEGÚN ROL SELECCIONADO
            function setRole(role) {
                if (role === "aspirante") {
                    bgImage.style.backgroundImage = "url('<?= BASE_URL ?>public/assets/img/BACKGROUND-03.png')";
                    indicator.style.transform = "translateX(100%)";
                    slides.style.transform = "translateX(-50%)";

                    title.classList.replace("text-red-600", "text-blue-600");
                    subtitle.classList.replace("text-red-600", "text-blue-600");
                    divider.classList.replace("bg-red-600", "bg-blue-600");

                    loginBtn.classList.replace("bg-red-700", "bg-blue-700");
                    loginBtn.classList.replace("hover:bg-red-800", "hover:bg-blue-800");

                    indicator.classList.replace("bg-red-600/20", "bg-blue-600/20");
                    indicator.classList.replace("border-red-600/40", "border-blue-600/40");

                    iconUser.classList.replace("text-red-700", "text-blue-500");
                    iconLock.classList.replace("text-red-700", "text-blue-500");

                    inputUser.classList.replace("focus:border-red-600", "focus:border-blue-600");
                    inputPass.classList.replace("focus:border-red-600", "focus:border-blue-600");

                    labelUser.classList.replace("peer-focus:text-red-500", "peer-focus:text-blue-500");
                    labelPass.classList.replace("peer-focus:text-red-500", "peer-focus:text-blue-500");

                    btnE.classList.replace("text-white", "text-white/60");
                    btnA.classList.replace("text-white/60", "text-white");
                } else {
                    bgImage.style.backgroundImage = "url('<?= BASE_URL ?>public/assets/img/BACKGROUND-02.png')";
                    indicator.style.transform = "translateX(0%)";
                    slides.style.transform = "translateX(0%)";

                    title.classList.replace("text-blue-600", "text-red-600");
                    subtitle.classList.replace("text-blue-600", "text-red-600");
                    divider.classList.replace("bg-blue-600", "bg-red-600");

                    loginBtn.classList.replace("bg-blue-700", "bg-red-700");
                    loginBtn.classList.replace("hover:bg-blue-800", "hover:bg-red-800");

                    indicator.classList.replace("bg-blue-600/20", "bg-red-600/20");
                    indicator.classList.replace("border-blue-600/40", "border-red-600/40");

                    iconUser.classList.replace("text-blue-500", "text-red-700");
                    iconLock.classList.replace("text-blue-500", "text-red-700");

                    inputUser.classList.replace("focus:border-blue-600", "focus:border-red-600");
                    inputPass.classList.replace("focus:border-blue-600", "focus:border-red-600");

                    labelUser.classList.replace("peer-focus:text-blue-500", "peer-focus:text-red-500");
                    labelPass.classList.replace("peer-focus:text-blue-500", "peer-focus:text-red-500");

                    btnA.classList.replace("text-white", "text-white/60");
                    btnE.classList.replace("text-white/60", "text-white");
                }
            }

            btnE.addEventListener("click", () => setRole("efectivo"));
            btnA.addEventListener("click", () => setRole("aspirante"));
        });
    </script>
</body>

</html>