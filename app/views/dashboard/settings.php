<?php
    // Rompemos la caché añadiendo un parámetro de tiempo a la imagen
    $imageFile = !empty($image) ? $image : 'default.webp';
    $imagePath = BASE_URL . "public/assets/img/team/" . $imageFile . "?v=" . time();

    // Definir clases dinámicas para la alerta
    $msgType = isset($_GET['msg']) && strpos($_GET['msg'], 'success') !== false ? 'success' : 'error';

    $alertClasses = ($msgType === 'success') 
        ? 'bg-emerald-50 text-emerald-700 border-emerald-100' 
        : 'bg-red-50 text-red-700 border-red-100';

    $alertIcon = ($msgType === 'success') ? 'check_circle' : 'error';
?>

<main class="flex-1 flex flex-col h-[calc(100vh-76px)] md:h-screen px-4 py-6 md:px-8 md:py-8 lg:px-10 bg-[#f6f7f8] overflow-y-auto custom-scrollbar">
    
    <header class="mb-8 shrink-0">
        <h1 class="text-3xl md:text-[2.25rem] font-black tracking-tight leading-tight text-[#0d141b]">
            Configuración
        </h1>
        <p class="text-[#4c739a] text-sm md:text-base mt-1">
            Administra tu información personal y seguridad de la cuenta.
        </p>
    </header>

    <?php if (isset($_GET['msg'])): ?>
        <div class="mb-6 p-4 rounded-xl text-sm font-bold flex items-center gap-3 animate-fade-in border <?= $alertClasses ?>">
            <span class="material-symbols-outlined">
                <?= $alertIcon ?>
            </span>
            <span>
                <?php
                $msgs = [
                    'profile_success' => '¡Perfil actualizado con éxito!',
                    'pass_success'    => '¡Contraseña actualizada correctamente!',
                    'pass_mismatch'   => 'Las nuevas contraseñas no coinciden.',
                    'old_pass_wrong'  => 'La contraseña actual es incorrecta.',
                    'error'           => 'Ocurrió un error al procesar la solicitud.'
                ];
                echo $msgs[$_GET['msg']] ?? 'Operación finalizada.';
                ?>
            </span>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-12 gap-6 lg:gap-8 pb-10">
        
        <div class="col-span-12 lg:col-span-8 space-y-6">
            
            <section class="bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden">
                <div class="p-6 border-b border-[#e7edf3] flex items-center gap-3">
                    <span class="material-symbols-outlined text-[#0f66bd]">person</span>
                    <h2 class="text-lg font-bold text-[#0d141b]">Información del Perfil</h2>
                </div>
                
                <form action="<?= BASE_URL ?>?url=settings/updateProfile" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        
                        <div class="flex flex-col items-center gap-3 shrink-0 w-full md:w-auto">
                            <div class="w-28 h-28 md:w-36 md:h-36 rounded-full bg-[#f6f7f8] border-2 border-dashed border-[#cfdbe7] relative group overflow-hidden shadow-inner">
                                <img id="previewImg" src="<?= $imagePath ?>" class="w-full h-full object-cover">
                                <label for="avatarInput" class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                                    <span class="material-symbols-outlined text-white text-3xl">photo_camera</span>
                                </label>
                                <input type="file" id="avatarInput" name="image" class="hidden" accept="image/*" onchange="previewFile()">
                            </div>
                            <p id="fileName" class="text-[10px] text-[#4c739a] font-bold uppercase tracking-tight text-center max-w-37.5 line-clamp-2 wrap-break-word leading-tight">
                                Ningún archivo seleccionado
                            </p>
                        </div>

                        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-[#4c739a] uppercase">Nombre Completo</label>
                                <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required
                                       class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 outline-none transition-all">
                            </div>

                            <div class="space-y-1">
                                <label class="text-xs font-bold text-[#4c739a] uppercase">Nombre de Usuario</label>
                                <input type="text" readonly value="<?= htmlspecialchars($username) ?>"
                                       class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm opacity-60 cursor-not-allowed">
                            </div>

                            <div class="col-span-full pt-4">
                                <button type="submit" class="px-6 py-2.5 bg-[#0f66bd] text-white font-bold rounded-xl hover:bg-[#0b4d8f] transition-all shadow-md text-sm active:scale-95">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <section class="bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden">
                <div class="p-6 border-b border-[#e7edf3] flex items-center gap-3">
                    <span class="material-symbols-outlined text-orange-500">lock</span>
                    <h2 class="text-lg font-bold text-[#0d141b]">Seguridad y Contraseña</h2>
                </div>
                
                <form action="<?= BASE_URL ?>?url=settings/updatePassword" method="POST" class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-[#4c739a] uppercase">Contraseña Actual</label>
                            <input type="password" name="old_password" placeholder="••••••••" required
                                   class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-orange-500/20 outline-none">
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-[#4c739a] uppercase">Nueva Contraseña</label>
                            <input type="password" name="new_password" placeholder="Nueva" required
                                   class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-orange-500/20 outline-none">
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold text-[#4c739a] uppercase">Confirmar Nueva</label>
                            <input type="password" name="confirm_password" placeholder="Repite" required
                                   class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-orange-500/20 outline-none">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="px-6 py-2.5 bg-[#111D2D] text-white font-bold rounded-xl hover:bg-black transition-all shadow-md text-sm active:scale-95">
                            Actualizar Contraseña
                        </button>
                    </div>
                </form>
            </section>
        </div>

        <aside class="col-span-12 lg:col-span-4 space-y-6">
            <section class="bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden sticky top-0">
                <div class="p-6 border-b border-[#e7edf3] flex items-center gap-3">
                    <span class="material-symbols-outlined text-[#0f66bd]">assignment_turned_in</span>
                    <h2 class="text-lg font-bold text-[#0d141b]">Mis Servicios</h2>
                </div>
                
                <form action="<?= BASE_URL ?>?url=settings/updateUserServices" method="POST" class="p-6 space-y-4">
                    <p class="text-xs text-[#4c739a] mb-2">Selecciona los servicios que realizas como especialista.</p>
                    
                    <div class="space-y-3 max-h-125 overflow-y-auto custom-scrollbar pr-2">
                        <?php foreach ($allServices as $servicio): 
                            $isSelected = in_array($servicio['id'], $userServicesIds);
                        ?>
                            <div class="flex items-center justify-between p-3 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl hover:bg-white hover:border-[#0f66bd]/30 transition-all group">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-[#0d141b] leading-tight">
                                        <?= htmlspecialchars($servicio['nombre']) ?>
                                    </span>
                                    <span class="text-[10px] text-[#4c739a] uppercase font-bold tracking-tight mt-0.5">
                                        <?= $servicio['duracion'] ?> min · S/ <?= number_format($servicio['precio'], 2) ?>
                                    </span>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="servicios[]" value="<?= $servicio['id'] ?>" class="sr-only peer" <?= $isSelected ? 'checked' : '' ?>>
                                    <div class="w-8 h-4.5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-3.5 rtl:peer-checked:after:-translate-x-3.5 peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:inset-s-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3.5 after:w-3.5 after:transition-all peer-checked:bg-[#0f66bd]"></div>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="pt-4 border-t border-[#e7edf3] mt-2">
                        <button type="submit" class="w-full px-6 py-3 bg-[#0f66bd] text-white font-bold rounded-xl hover:bg-[#0b4d8f] transition-all shadow-md text-sm active:scale-95">
                            Guardar Preferencias
                        </button>
                    </div>
                </form>
            </section>
        </aside>

    </div>
</main>

<script>
function previewFile() {
    const preview = document.getElementById('previewImg');
    const fileInput = document.getElementById('avatarInput');
    const file = fileInput.files[0];
    const fileNameText = document.getElementById('fileName');

    if (file) {
        if(!file.type.match('image.*')) {
            alert("Por favor selecciona un archivo de imagen válido.");
            return;
        }

        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        }
        reader.readAsDataURL(file);
        fileNameText.textContent = file.name;
    } else {
        fileNameText.textContent = "Ningún archivo seleccionado";
    }
}
</script>