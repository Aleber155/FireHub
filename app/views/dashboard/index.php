<?php
// Romper caché para la imagen
$imageFile = !empty($image) ? $image : 'default.webp';
$imagePath = BASE_URL . "public/assets/img/team/" . $imageFile . "?v=" . time();
?>

<main class="flex-1 flex flex-col min-h-screen md:h-screen px-3 py-4 md:px-8 md:py-8 lg:px-10 bg-[#f6f7f8] overflow-x-hidden">
    
    <header class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shrink-0">
        <div class="w-full sm:w-auto">
            <h1 class="text-2xl md:text-[2.25rem] font-black tracking-tight leading-tight text-[#0d141b]">Panel de Citas</h1>
            <p class="text-[#4c739a] text-xs md:text-base mt-1">Bienvenido, <?= explode(' ', $name)[0] ?>, revisa tus compromisos.</p>
        </div>
        
        <div class="flex items-center gap-3 bg-white p-2 md:p-3 rounded-2xl shadow-sm border border-[#e7edf3] w-full sm:w-auto justify-between sm:justify-end">
            <div class="flex flex-col text-right px-2">
                <span class="text-[10px] font-bold text-[#0f66bd] uppercase tracking-widest">Hoy</span>
                <span class="text-xs md:text-sm font-bold text-[#0d141b]"><?= date('d') . ' ' . strftime('%B') . ' ' . date('Y') ?></span>
            </div>
            <div class="bg-[#0f66bd] text-white h-9 w-9 md:h-11 md:w-11 flex items-center justify-center rounded-xl shrink-0 shadow-md">
                <span class="material-symbols-outlined text-xl">calendar_today</span>
            </div>
        </div>
    </header>

    <section class="flex-1 min-h-0 flex flex-col bg-white rounded-3xl shadow-sm border border-[#e7edf3] overflow-hidden">
        
        <div class="p-4 md:p-6 border-b border-[#e7edf3] flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white shrink-0">
            <h2 class="text-md md:text-lg font-bold text-[#0d141b] flex items-center gap-2">
                <span class="material-symbols-outlined text-[#0f66bd]">pending_actions</span>
                Agenda Activa
            </h2>
            <div class="relative w-full md:w-72">
                <input id="searchInput" class="w-full h-11 pl-11 pr-4 bg-[#f6f7f8] text-sm rounded-2xl border border-[#e7edf3] focus:ring-4 focus:ring-[#0f66bd]/10 focus:border-[#0f66bd] transition-all outline-none text-[#0d141b] placeholder:text-[#4c739a]" placeholder="Buscar cliente..." type="text"/>
                <span class="material-symbols-outlined absolute left-3.5 top-2.5 text-[#4c739a]">search</span>
            </div>
        </div>
        
        <div class="flex-1 overflow-auto bg-white custom-scrollbar">
            <table class="hidden md:table w-full text-left border-collapse">
                <thead class="sticky top-0 z-10 bg-[#f6f7f8] shadow-sm">
                    <tr class="text-[11px] uppercase tracking-widest font-black text-[#4c739a]">
                        <th class="px-6 py-4 border-b border-[#e7edf3]">Cliente</th>
                        <th class="px-6 py-4 border-b border-[#e7edf3]">Fecha y Rango</th>
                        <th class="px-6 py-4 border-b border-[#e7edf3] lg:table-cell">Servicio</th>
                        <th class="px-6 py-4 border-b border-[#e7edf3]">
                            <span class="hidden lg:inline">
                                Consultor
                            </span>
                        </th>
                        <th class="px-6 py-4 border-b border-[#e7edf3]">Estado</th>
                        <th class="px-6 py-4 border-b border-[#e7edf3] text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody id="citasTableBody" class="divide-y divide-[#e7edf3]">
                    <?php 
                    $citasActivas = array_filter($citas, function($item) {
                        return $item['estado'] === 'P' || $item['estado'] === 'C';
                    });

                    if(!empty($citasActivas)): 
                        foreach($citasActivas as $c): 
                            $statusMap = [
                                'P' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'dot' => 'bg-amber-500', 'label' => 'Pendiente'],
                                'C' => ['bg' => 'bg-blue-50', 'text' => 'text-[#0f66bd]', 'dot' => 'bg-[#0f66bd]', 'label' => 'Confirmada']
                            ];
                            $st = $statusMap[$c['estado']] ?? $statusMap['P'];
                        ?>
                        <tr class="hover:bg-[#f6f7f8]/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="hidden lg:flex w-10 h-10 rounded-xl bg-[#0f66bd]/10 items-center justify-center font-bold text-[#0f66bd] shrink-0 uppercase text-xs">
                                        <?= substr($c['cliente'], 0, 2) ?>
                                    </div>
                                    <div>
                                        <div class="text-xs lg:text-sm font-bold text-[#0d141b] leading-none mb-1"><?= htmlspecialchars($c['cliente']) ?></div>
                                        <div class="text-xs text-[#4c739a] font-medium uppercase tracking-tighter">
                                            <span class="hidden lg:inline">
                                                RUC:
                                            </span>
                                            <?= htmlspecialchars($c['documento']) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs lg:text-sm">
                                <div class="font-semibold text-[#0d141b]">
                                    <?= ($c['fecha'] == date('Y-m-d')) ? 'Hoy' : date('d/m/Y', strtotime($c['fecha'])) ?>
                                </div>
                                <div class="text-xs text-[#4c739a] font-semibold">
                                    <?= date('h:i a', strtotime($c['hora_inicio'])) ?> - <?= date('h:i a', strtotime($c['hora_fin'])) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    <span class="px-2 py-1 md:px-3 bg-[#f6f7f8] border border-[#e7edf3] text-[#4c739a] rounded-lg text-[10px] md:text-xs font-semibold leading-tight wrap-break-word max-w-25 md:max-w-none text-center md:text-left">
                                        <?= htmlspecialchars($c['servicio']) ?>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-[#0d141b]">
                                <span class="lg:hidden w-8 h-8 rounded-full bg-[#f6f7f8] border border-[#e7edf3] flex items-center justify-center text-base font-bold text-[#4c739a]" title="<?= htmlspecialchars($c['consultor']) ?>">
                                    <?= substr($c['consultor'], 0, 1) ?>
                                </span>
                                <span class="hidden lg:inline">
                                    <?= htmlspecialchars($c['consultor']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="lg:hidden flex justify-center">
                                     <span class="w-4 h-4 rounded-full <?= $st['dot'] ?> shadow-sm <?= ($c['estado'] == 'C') ? 'animate-pulse' : '' ?>" title="<?= $st['label'] ?>"></span>
                                </div>
                                <div class="hidden lg:flex items-center gap-2 <?= $st['text'] ?> font-bold text-[10px] uppercase tracking-widest <?= $st['bg'] ?> px-2.5 py-1 rounded-md w-fit border border-current/10">
                                    <span class="w-1.5 h-1.5 rounded-full <?= $st['dot'] ?> <?= ($c['estado'] == 'C') ? 'animate-pulse' : '' ?>"></span> 
                                    <?= $st['label'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <?php if($c['estado'] === 'P'): ?>
                                        <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=C" 
                                        class="h-9 w-9 flex items-center justify-center bg-[#0f66bd] text-white rounded-lg transition-all shadow-sm shadow-blue-100" 
                                        title="Confirmar">
                                            <span class="material-symbols-outlined text-sm">check_circle</span>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=A" 
                                        class="h-9 w-9 flex items-center justify-center bg-emerald-500 text-white rounded-lg transition-all shadow-sm" 
                                        title="Finalizar">
                                            <span class="material-symbols-outlined text-sm">task_alt</span>
                                        </a>
                                    <?php endif; ?>

                                    <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=I" 
                                    onclick="return confirm('¿Esta seguro de cancelar esta cita?')" 
                                    class="h-9 w-9 flex items-center justify-center bg-red-50 text-red-500 border border-red-100 rounded-lg transition-all" 
                                    title="Cancelar">
                                        <span class="material-symbols-outlined text-sm">cancel</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div id="citasMobileList" class="md:hidden divide-y divide-[#e7edf3]">
                <?php if(!empty($citasActivas)): 
                    foreach($citasActivas as $c): 
                        $st = $statusMap[$c['estado']] ?? $statusMap['P'];
                ?>
                <div class="p-4 space-y-3">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-[#0f66bd] text-white flex items-center justify-center font-bold text-xs uppercase">
                                <?= substr($c['cliente'], 0, 2) ?>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-[#0d141b]"><?= htmlspecialchars($c['cliente']) ?></h4>
                                <p class="text-[10px] text-[#4c739a] font-bold uppercase">RUC: <?= htmlspecialchars($c['documento']) ?></p>
                            </div>
                        </div>
                        <div class="<?= $st['text'] ?> <?= $st['bg'] ?> px-2 py-0.5 rounded text-[9px] font-black uppercase border border-current/10">
                            <?= $st['label'] ?>
                        </div>
                    </div>
                    <div class="flex justify-between items-center bg-[#f6f7f8] p-3 rounded-xl">
                        <div class="text-xs font-bold text-[#0d141b]">
                            <?= date('h:i a', strtotime($c['hora_inicio'])) ?> - <?= date('h:i a', strtotime($c['hora_fin'])) ?>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold text-[#4c739a] uppercase bg-white border border-[#e7edf3] px-2 py-0.5 rounded-md">
                                <?= ($c['fecha'] == date('Y-m-d')) ? 'Hoy' : date('d/m/Y', strtotime($c['fecha'])) ?>
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-xs font-semibold text-[#4c739a] tracking-widest opacity-80">
                                <?= htmlspecialchars($c['consultor']) ?>
                            </span>
                            <span class="text-xs font-semibold text-[#4c739a] tracking-widest opacity-80">
                                <?= htmlspecialchars($c['servicio']) ?>
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <?php if($c['estado'] === 'P'): ?>
                                <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=C" 
                                class="h-9 w-9 flex items-center justify-center bg-[#0f66bd] text-white rounded-lg transition-all shadow-sm shadow-blue-100" 
                                title="Confirmar">
                                    <span class="material-symbols-outlined text-sm">check_circle</span>
                                </a>
                            <?php else: ?>
                                <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=A" 
                                class="h-9 w-9 flex items-center justify-center bg-emerald-500 text-white rounded-lg transition-all shadow-sm" 
                                title="Finalizar">
                                    <span class="material-symbols-outlined text-sm">task_alt</span>
                                </a>
                            <?php endif; ?>

                            <a href="<?= BASE_URL ?>?url=dashboard/updateStatus&id=<?= $c['id'] ?>&status=I" 
                            onclick="return confirm('¿Esta seguro de cancelar esta cita?')" 
                            class="h-9 w-9 flex items-center justify-center bg-red-50 text-red-500 border border-red-100 rounded-lg transition-all" 
                            title="Cancelar">
                                <span class="material-symbols-outlined text-sm">cancel</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        
        <div class="p-4 bg-[#f6f7f8] border-t border-[#e7edf3] flex flex-col sm:flex-row justify-between items-center gap-3 shrink-0">
            <div class="text-[10px] md:text-xs font-bold text-[#4c739a]">
                <span class="text-[#0d141b]"><?= count($citasActivas) ?></span> compromisos activos
            </div>
            <button onclick="openHistoryModal()" class="w-full sm:w-auto px-5 py-2.5 bg-white border border-[#e7edf3] rounded-xl text-[#4c739a] text-[10px] font-black uppercase transition-all shadow-sm flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">history</span>
                Historial
            </button>
        </div>
    </section>

    <div id="modalHistorial" class="fixed inset-0 z-50 hidden overflow-y-auto p-2 sm:p-6">
        <div class="fixed inset-0 bg-[#0d141b]/80 backdrop-blur-sm" onclick="closeHistoryModal()"></div>
        <div class="flex min-h-full items-center justify-center">
            <div class="relative w-full max-w-4xl transform rounded-rounded-3xl sm:rounded-4xl bg-white shadow-2xl transition-all flex flex-col max-h-[85vh] overflow-hidden">
                
                <div class="flex items-center justify-between p-4 sm:p-5 border-b border-[#e7edf3] shrink-0">
                    <h3 class="text-base sm:text-lg font-bold text-[#0d141b] flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#4c739a]">history</span> Historial de Citas
                    </h3>
                    <button onclick="closeHistoryModal()" class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center rounded-xl hover:bg-[#f6f7f8] text-[#4c739a]">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <div class="flex-1 overflow-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead class="sticky top-0 bg-[#f8fafc] z-10 shadow-sm">
                            <tr class="text-xs uppercase font-bold text-[#4c739a]">
                                <th class="px-4 py-4 border-b border-[#e7edf3]">Detalle de Cita</th>
                                <th class="hidden sm:table-cell px-4 py-4 border-b border-[#e7edf3]">Fecha y Rango</th>
                                <th class="hidden sm:table-cell px-4 py-4 border-b border-[#e7edf3]">Consultor / Servicio</th>
                                <th class="px-4 py-4 border-b border-[#e7edf3] text-right md:text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e7edf3]">
                            <?php 
                            $historial = array_filter($citas, function($item) {
                                return $item['estado'] === 'A' || $item['estado'] === 'I';
                            });
                            if(!empty($historial)):
                                foreach($historial as $h): 
                                    $stHist = ($h['estado'] === 'A') 
                                        ? ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'label' => 'Atendida']
                                        : ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'label' => 'Cancelada'];
                            ?>
                            <tr class="hover:bg-[#f6f7f8]/30 transition-colors">
                                <td class="px-4 py-4">
                                    <div class="text-sm font-bold text-[#0d141b]"><?= htmlspecialchars($h['cliente']) ?></div>
                                    <div class="text-xs text-[#4c739a] mb-1">RUC: <?= htmlspecialchars($h['documento']) ?></div>
                                    <div class="sm:hidden flex flex-col gap-0.5 mt-2">
                                        <span class="text-xs font-bold text-[#0f66bd]">
                                            <?= htmlspecialchars($h['consultor']) ?>
                                        </span>
                                        <span class="text-xs text-[#4c739a] italic">
                                            <?= htmlspecialchars($h['servicio']) ?>
                                        </span>
                                    </div>
                                    <div class="text-xs font-bold mt-2 text-[#4c739a] sm:hidden flex flex-wrap gap-x-2">
                                        <span>
                                            <?= date('d/m/y', strtotime($h['fecha'])) ?>
                                        </span>
                                        |
                                        <span>
                                            <?= date('h:i a', strtotime($h['hora_inicio'])) ?> - <?= date('h:i a', strtotime($h['hora_fin'])) ?>
                                        </span>
                                    </div>
                                </td>

                                <td class="hidden sm:table-cell px-4 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-[#4c739a] uppercase tracking-tight">
                                            <?= date('d/m/y', strtotime($h['fecha'])) ?>
                                        </span>
                                        <span class="text-xs font-medium text-[#4c739a] uppercase">
                                            <?= date('h:i a', strtotime($h['hora_inicio'])) ?> - <?= date('h:i a', strtotime($h['hora_fin'])) ?>
                                        </span>
                                    </div>
                                </td>
                                
                                <td class="hidden sm:table-cell px-4 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-[#0d141b] uppercase tracking-tight">
                                            <?= htmlspecialchars($h['consultor']) ?>
                                        </span>
                                        <span class="text-xs font-medium text-[#4c739a] uppercase">
                                            <?= htmlspecialchars($h['servicio']) ?>
                                        </span>
                                    </div>
                                </td>

                                <td class="px-4 py-4 text-right md:text-center">
                                    <span class="inline-block px-2 py-1 rounded text-xs font-bold uppercase border <?= $stHist['bg'] ?> <?= $stHist['text'] ?> border-current/10 whitespace-nowrap">
                                        <?= $stHist['label'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr>
                                <td colspan="3" class="p-10 text-center text-xs text-[#4c739a]">No hay registros históricos.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-[#e7edf3] bg-[#f8fafc] shrink-0">
                    <button onclick="closeHistoryModal()" class="w-full py-3 bg-[#0d141b] text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-black transition-all">
                        Cerrar Historial
                    </button>
                </div>
            </div>
        </div>
    </div> 
</main>

<script>
    // Filtro de búsqueda
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#citasTableBody tr');
        rows.forEach(row => {
            row.style.display = (row.innerText.toLowerCase().indexOf(value) > -1) ? "" : "none";
        });
        let cards = document.querySelectorAll('#citasMobileList > div:not(.text-center)');
        cards.forEach(card => {
            card.style.display = (card.innerText.toLowerCase().indexOf(value) > -1) ? "" : "none";
        });
    });

    function openHistoryModal() {
        document.getElementById('modalHistorial').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeHistoryModal() {
        document.getElementById('modalHistorial').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    document.addEventListener('keydown', (e) => { if (e.key === "Escape") closeHistoryModal(); });
</script>