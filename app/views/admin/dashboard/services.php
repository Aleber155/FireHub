<?php
// Romper caché para la imagen del header si fuera necesario
$imagePath = BASE_URL . "public/assets/img/team/" . ($image ?? 'default.webp') . "?v=" . time();
?>

<main class="flex-1 flex flex-col h-[calc(100vh-76px)] md:h-screen px-4 py-6 md:px-8 md:py-8 lg:px-10 bg-[#f6f7f8] overflow-y-auto custom-scrollbar">
    <header class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between shrink-0">
        <div>
            <h1 class="text-2xl md:text-[2.25rem] font-black tracking-tight leading-tight text-[#0d141b]">Gestión de Servicios</h1>
            <p class="text-[#4c739a] text-xs md:text-base mt-1">Administra los tipos de servicios.</p>
        </div>
        
        <button onclick="openServiceModal()" class="flex items-center justify-center gap-2 px-5 py-3 bg-[#0f66bd] text-white font-bold rounded-xl hover:opacity-90 active:scale-95 transition-all shadow-sm w-full sm:w-auto text-sm">
            <span class="material-symbols-outlined text-xl">add</span>
            <span>Nuevo Servicio</span>
        </button>
    </header>

    <section class="bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#f8fafc] border-b border-[#e7edf3]">
                        <th class="px-6 py-4 text-xs font-bold text-[#4c739a] uppercase tracking-widest">
                            Servicio
                        </th>
                        <th class="hidden sm:table-cell px-6 py-4 text-xs font-bold text-[#4c739a] uppercase tracking-widest text-center">
                            Duración
                        </th>
                        <th class="hidden sm:table-cell px-6 py-4 text-xs font-bold text-[#4c739a] uppercase tracking-widest text-right">
                            Precio
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-[#4c739a] uppercase tracking-widest text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e7edf3]">
                    <?php foreach ($servicios as $s): 
                        $isActive = (int)$s['estado'] === 1;
                    ?>
                    <tr class="transition-all <?= $isActive ? 'hover:bg-[#f1f5f9]/50' : 'bg-gray-50/50 opacity-70' ?>">
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold <?= $isActive ? 'text-[#0d141b]' : 'text-gray-500 line-through' ?>">
                                    <?= htmlspecialchars($s['nombre']) ?>
                                </span>
                                <?php if (!$isActive): ?>
                                    <span class="text-[9px] font-black uppercase tracking-tighter text-red-500">Inactivo</span>
                                <?php endif; ?>
                            </div>
                        </td>

                        <td class="hidden sm:table-cell px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg <?= $isActive ? 'bg-blue-50 text-[#0f66bd]' : 'bg-gray-200 text-gray-500' ?> text-[11px] font-bold">
                                <?= $s['duracion'] ?> min
                            </span>
                        </td>

                        <td class="hidden sm:table-cell px-6 py-4 text-right">
                            <span class="text-sm font-bold <?= $isActive ? 'text-[#0d141b]' : 'text-gray-400' ?>">
                                S/ <?= number_format($s['precio'], 2) ?>
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-4">
                                <label class="relative inline-flex items-center cursor-pointer group">
                                    <input type="checkbox" class="sr-only peer" <?= $isActive ? 'checked' : '' ?> 
                                        onchange="window.location.href='<?= BASE_URL ?>?url=services/toggleStatus&id=<?= $s['id'] ?>'">
                                    <div class="w-9 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:inset-s-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#0f66bd]"></div>
                                </label>

                                <button onclick='<?= $isActive ? "openServiceModal(" . json_encode($s) . ")" : "void(0)" ?>' 
                                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-[#e7edf3] transition-all 
                                        <?= $isActive 
                                            ? 'text-[#4c739a] hover:bg-white hover:text-[#0f66bd] hover:shadow-sm cursor-pointer' 
                                            : 'text-gray-300 bg-gray-50 cursor-not-allowed' ?>"
                                        <?= !$isActive ? 'title="Active el servicio para editar"' : '' ?>>
                                    <span class="material-symbols-outlined text-sm">edit</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<div id="serviceModal" class="fixed inset-0 z-100 hidden items-center justify-center bg-black/40 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up">
        <div class="p-6 border-b border-[#e7edf3] flex items-center justify-between">
            <h2 id="modalTitle" class="text-lg font-bold text-[#0d141b]">Nuevo Servicio</h2>
            <button onclick="closeServiceModal()" class="text-[#4c739a] hover:text-[#0d141b]">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form action="<?= BASE_URL ?>?url=services/save" method="POST" class="p-6 space-y-4">
            <input type="hidden" name="id" id="serviceId">
            
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-[#4c739a] uppercase tracking-widest">Nombre del Servicio</label>
                <input type="text" name="nombre" id="serviceName" required
                       class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm outline-none focus:ring-2 focus:ring-[#0f66bd]/20 transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-[#4c739a] uppercase tracking-widest">Duración (min)</label>
                    <input type="number" name="duracion" id="serviceDuration" required min="1"
                           class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm outline-none focus:ring-2 focus:ring-[#0f66bd]/20 transition-all">
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-[#4c739a] uppercase tracking-widest">Precio (S/)</label>
                    <input type="number" name="precio" id="servicePrice" step="0.01" required min="0"
                           class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm outline-none focus:ring-2 focus:ring-[#0f66bd]/20 transition-all">
                </div>
            </div>

            <div class="pt-4 flex gap-3">
                <button type="button" onclick="closeServiceModal()" class="flex-1 py-3 text-sm font-bold text-[#4c739a] hover:bg-[#f6f7f8] rounded-xl transition-all">
                    Cancelar
                </button>
                <button type="submit" class="flex-1 py-3 bg-[#0f66bd] text-white text-sm font-bold rounded-xl hover:bg-[#0b4d8f] shadow-md transition-all active:scale-95">
                    Guardar Servicio
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openServiceModal(data = null) {
        // Si intentan editar un servicio inactivo, no hacemos nada
        if (data && parseInt(data.estado) === 0) {
            return; 
        }

        const modal = document.getElementById('serviceModal');
        const title = document.getElementById('modalTitle');
        const idInput = document.getElementById('serviceId');
        const nameInput = document.getElementById('serviceName');
        const durationInput = document.getElementById('serviceDuration');
        const priceInput = document.getElementById('servicePrice');

        if (data) {
            title.innerText = 'Editar Servicio';
            idInput.value = data.id;
            nameInput.value = data.nombre;
            durationInput.value = data.duracion;
            priceInput.value = data.precio;
        } else {
            title.innerText = 'Nuevo Servicio';
            idInput.value = '';
            nameInput.value = '';
            durationInput.value = '';
            priceInput.value = '';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeServiceModal() {
        const modal = document.getElementById('serviceModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>