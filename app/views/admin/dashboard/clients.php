<main class="flex-1 flex flex-col h-[calc(100vh-76px)] md:h-screen px-4 py-4 md:px-8 md:py-8 lg:px-10 bg-[#f6f7f8] overflow-hidden">
    <header class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between shrink-0">
        <div>
            <h1 class="text-2xl md:text-[2.25rem] font-black tracking-tight leading-tight text-[#0d141b]">Cartera de Clientes</h1>
            <p class="text-[#4c739a] text-xs md:text-base mt-1">Directorio de empresas y contactos estratégicos.</p>
        </div>
        
        <button onclick="openModal('create')" class="flex items-center justify-center gap-2 px-5 py-3 bg-[#0f66bd] text-white font-bold rounded-xl hover:opacity-90 active:scale-95 transition-all shadow-sm w-full sm:w-auto text-sm">
            <span class="material-symbols-outlined text-xl">person_add</span>
            <span>Nuevo Cliente</span>
        </button>
    </header>

    <section class="flex flex-col bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden h-auto md:h-full md:flex-1">
    
    <div class="p-4 md:p-6 border-b border-[#e7edf3] flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white shrink-0">
        <div id="filterSlider" class="flex sm:inline-flex w-full sm:w-auto gap-1 p-1 bg-[#f6f7f8] rounded-xl border border-[#e7edf3] overflow-x-auto no-scrollbar shrink-0">
            <button onclick="filterByStatus('all', this)" class="filter-btn active flex-1 sm:flex-none px-4 py-2 text-[10px] md:text-xs font-bold bg-white text-[#0f66bd] shadow-sm rounded-lg transition-all whitespace-nowrap">
                Todos (<?= $totalTodos ?>)
            </button>
            <button onclick="filterByStatus('1', this)" class="filter-btn flex-1 sm:flex-none px-4 py-2 text-[10px] md:text-xs font-medium text-[#4c739a] hover:bg-white/50 rounded-lg transition-all whitespace-nowrap">
                Activos (<?= $totalActivos ?>)
            </button>
            <button onclick="filterByStatus('0', this)" class="filter-btn flex-1 sm:flex-none px-4 py-2 text-[10px] md:text-xs font-medium text-[#4c739a] hover:bg-white/50 rounded-lg transition-all whitespace-nowrap">
                Inactivos (<?= $totalInactivos ?>)
            </button>
        </div>
        
        <div class="flex items-center gap-2 w-full lg:w-auto">
            <div class="relative flex-1 lg:w-64">
                <input id="searchClient" onkeyup="searchTable()" class="w-full h-10 md:h-11 pl-10 pr-4 bg-[#f6f7f8] text-sm rounded-xl border border-[#e7edf3] focus:ring-2 focus:ring-[#0f66bd]/20 outline-none text-[#0d141b] transition-all" placeholder="Buscar por nombre o RUC..." type="text"/>
                <span class="material-symbols-outlined absolute left-3 top-2.5 md:top-3 text-[#4c739a] text-sm">search</span>
            </div>
        </div>
    </div>
    
    <div class="flex-1 overflow-auto bg-white custom-scrollbar min-h-0">
        <table id="clientsTable" class="w-full text-left border-collapse table-fixed">
            <thead class="sticky top-0 z-10 bg-[#f6f7f8] border-b border-[#e7edf3] hidden md:table-header-group">
                <tr class="text-sm uppercase tracking-widest font-black text-[#4c739a]">
                    <th class="px-6 py-4 w-auto md:w-[35%]">Empresa / RUC</th>
                    <th class="px-4 py-4 hidden lg:table-cell lg:w-[25%]">Contacto</th>
                    <th class="px-4 py-4 hidden lg:table-cell text-center md:w-[15%]">Industria</th>
                    <th class="px-4 py-4 text-center md:w-[10%]">Estado</th>
                    <th class="px-6 py-4 text-center md:w-[15%]">Acción</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#e7edf3]">
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr class="client-row hover:bg-[#f6f7f8]/50 transition-colors group flex flex-col md:table-row p-4 md:p-0 border-b border-[#e7edf3] md:border-0" 
                            data-status="<?= $cliente['estado'] ?>" 
                            data-search="<?= strtolower(htmlspecialchars($cliente['razon_social'] . ' ' . $cliente['ruc'])) ?>">
                            
                            <td class="md:px-6 md:py-4 flex md:table-cell items-center min-w-0 md:w-[35%]">
                                <div class="flex items-center gap-3 md:gap-4 w-full min-w-0">
                                    <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-[#0f66bd]/5 flex items-center justify-center text-[#0f66bd] shrink-0 border border-[#0f66bd]/10 font-bold text-xs uppercase">
                                        <?= substr($cliente['razon_social'], 0, 2) ?>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-base font-bold text-[#0d141b] group-hover:text-[#0f66bd] transition-colors leading-tight wrap-break-word line-clamp-2 md:line-clamp-2 lg:truncate">
                                            <?= htmlspecialchars($cliente['razon_social']) ?>
                                        </div>
                                        <div class="text-[10px] md:text-xs text-[#4c739a] font-mono mt-0.5 px-1.5 py-0.5 bg-[#f6f7f8] rounded w-fit uppercase border border-[#e7edf3]">
                                            RUC: <?= htmlspecialchars($cliente['ruc']) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="md:px-4 md:py-4 hidden lg:table-cell">
                                <div class="text-sm font-bold text-[#0d141b]"><?= htmlspecialchars($cliente['contacto_nombre'] ?? 'Sin contacto') ?></div>
                                <div class="text-xs text-[#4c739a] flex flex-col gap-0.5 mt-1">
                                    <span><?= htmlspecialchars($cliente['contacto_correo'] ?? '---') ?></span>
                                    <span><?= htmlspecialchars($cliente['contacto_telefono'] ?? '---') ?></span>
                                </div>
                            </td>

                            <td class="md:px-4 md:py-4 hidden lg:table-cell text-center">
                                <span class="text-[10px] font-bold text-[#4c739a] bg-[#f6f7f8] px-2 py-1 rounded-md border border-[#e7edf3] uppercase tracking-tighter">
                                    <?= htmlspecialchars($cliente['tipo_industria']) ?>
                                </span>
                            </td>

                            <td class="md:px-4 md:py-4 hidden md:table-cell text-center">
                                <div class="flex justify-center">
                                    <?php if ($cliente['estado'] == 1): ?>
                                        <div class="flex items-center gap-1.5 text-emerald-700 font-bold text-xs uppercase bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Activo
                                        </div>
                                    <?php else: ?>
                                        <div class="flex items-center gap-1.5 text-slate-500 font-bold text-xs uppercase bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Inactivo
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <td class="md:px-6 md:py-4 mt-4 md:mt-0">
                                <div class="flex flex-row items-center justify-between gap-2 md:hidden">
                                    <div class="shrink-0">
                                        <?php if ($cliente['estado'] == 1): ?>
                                            <div class="flex items-center gap-1.5 text-emerald-700 font-bold text-[10px] uppercase bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Activo
                                            </div>
                                        <?php else: ?>
                                            <div class="flex items-center gap-1.5 text-slate-500 font-bold text-[10px] uppercase bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Inactivo
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button onclick='openModal("view", <?= json_encode($cliente) ?>)' class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-[#f6f7f8] text-[#0d141b] font-bold rounded-xl text-xs border border-[#e7edf3]">
                                        <span class="material-symbols-outlined text-sm">visibility</span> 
                                        <span>Visualizar</span>
                                    </button>
                                </div>

                                <div class="hidden md:flex justify-center">
                                    <button onclick='openModal("view", <?= json_encode($cliente) ?>)' class="inline-flex items-center gap-2 px-4 py-2 bg-[#f6f7f8] text-[#0d141b] font-bold rounded-xl hover:bg-[#0f66bd] hover:text-white transition-all text-xs border border-[#e7edf3] hover:border-[#0f66bd]">
                                        <span class="material-symbols-outlined text-sm">visibility</span> 
                                        <span>Visualizar</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="p-4 bg-[#f6f7f8] border-t border-[#e7edf3] flex flex-col sm:flex-row justify-between items-center gap-4 shrink-0">
        <div class="text-xs font-bold text-[#4c739a]">
            Página <span class="text-[#0d141b]"><?= $paginaActual ?></span> de <?= $totalPaginas ?>
        </div>
        <div class="flex items-center gap-4"> 
            <a href="<?= BASE_URL ?>?url=clients&page=<?= $paginaActual - 1 ?>&limit=<?= $registrosPorPagina ?>" class="flex items-center justify-center w-9 h-9 bg-white border border-[#e7edf3] rounded-xl hover:bg-[#f6f7f8] transition-colors <?= ($paginaActual <= 1) ? 'pointer-events-none opacity-40' : '' ?>">
                <span class="material-symbols-outlined text-base">chevron_left</span>
            </a>
            <div class="flex flex-col items-center min-w-20">
                <span class="text-xs font-bold text-[#0d141b] uppercase tracking-widest leading-none">
                    Página <?= $paginaActual ?>
                </span>
            </div>
            <a href="<?= BASE_URL ?>?url=clients&page=<?= $paginaActual + 1 ?>&limit=<?= $registrosPorPagina ?>" class="flex items-center justify-center w-9 h-9 bg-white border border-[#e7edf3] rounded-xl hover:bg-[#f6f7f8] transition-colors <?= ($paginaActual >= $totalPaginas) ? 'pointer-events-none opacity-40' : '' ?>">
                <span class="material-symbols-outlined text-base">chevron_right</span>
            </a>
        </div>
    </div>
</section>
</main>

<div id="clientModal" class="fixed inset-0 z-100 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm transition-all overflow-y-auto">
    <div class="bg-white w-full max-w-3xl rounded-3xl shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200 my-8">
        
        <div class="p-6 border-b border-[#e7edf3] flex items-center justify-between bg-[#f6f7f8]">
            <div class="flex items-center gap-4">
                <div class="hidden md:flex size-12 rounded-2xl bg-[#0f66bd] text-white items-center justify-center shadow-lg">
                    <span id="modalIcon" class="material-symbols-outlined text-2xl">domain</span>
                </div>
                <div>
                    <h2 id="modalTitle" class="text-xl font-black text-[#0d141b] leading-tight">Título</h2>
                    <p id="modalSubtitle" class="text-xs text-[#4c739a]">Subtítulo informativo</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button id="editToggleBtn" onclick="enableEditMode()" class="flex items-center gap-2 px-3 py-2 md:px-4 md:py-2 bg-white border border-[#e7edf3] text-[#0f66bd] font-bold rounded-xl hover:bg-[#0f66bd] hover:text-white transition-all text-xs shadow-sm">
                    <span class="material-symbols-outlined text-sm">edit</span>
                    <span class="hidden md:inline">Editar</span>
                </button>
                
                <button onclick="closeModal()" class="p-2 hover:bg-[#e7edf3] rounded-full transition-colors text-[#4c739a]">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <form id="clientForm" method="POST" action="<?= BASE_URL ?>?url=clients/save" class="p-8">
            <input type="hidden" name="current_page" value="<?= $paginaActual ?>">
            <input type="hidden" name="id" id="field_id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                <div class="space-y-1.5">
                    <label class="text-xs font-bold uppercase text-[#4c739a] tracking-widest ml-1">Razón Social</label>
                    <input type="text" name="razon_social" id="field_razon_social" required 
                        class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 outline-none transition-all disabled:bg-transparent disabled:border-transparent disabled:px-0 disabled:text-[#0d141b] disabled:text-lg">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-bold uppercase text-[#4c739a] tracking-widest ml-1">Número de RUC</label>
                    <input type="text" name="ruc" id="field_ruc" required 
                        class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 outline-none transition-all disabled:bg-transparent disabled:border-transparent disabled:px-0 disabled:text-lg">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-bold uppercase text-[#4c739a] tracking-widest ml-1">Industria</label>
                    <input type="text" name="tipo_industria" id="field_tipo_industria" 
                        class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 outline-none transition-all disabled:bg-transparent disabled:border-transparent disabled:px-0 disabled:text-lg">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-bold uppercase text-[#4c739a] tracking-widest ml-1">Estado</label>
                    <div class="flex items-center h-11 px-1">
                        <label class="relative inline-flex items-center cursor-pointer select-none group">
                            <input type="checkbox" name="estado" id="field_estado" value="1" class="sr-only peer">
                            <div class="w-12 h-6.5 bg-slate-200 rounded-full transition-all duration-300
                                        peer-checked:bg-[#0f66bd] 
                                        peer-focus:ring-4 peer-focus:ring-[#0f66bd]/10
                                        after:content-[''] after:absolute after:top-0.75 after:left-0.75 
                                        after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all 
                                        peer-checked:after:translate-x-5.5
                                        group-active:after:w-6">
                            </div>
                            <span class="ms-3 text-sm font-bold text-[#4c739a] peer-checked:hidden">Inactivo</span>
                            <span class="ms-3 text-sm font-bold text-[#0f66bd] hidden peer-checked:inline">Activo</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-[#e7edf3]">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-black uppercase text-[#0f66bd] tracking-[0.2em]">Contactos Vinculados</h3>
                    <button type="button" id="addContactBtn" onclick="openContactModal('add')" class="hidden text-base font-bold text-[#0f66bd] hover:underline px-2 py-1 bg-[#0f66bd]/5 rounded-lg border border-[#0f66bd]/10">+ Nuevo Contacto</button>
                </div>
                <div id="contactsList" class="space-y-3 pr-2"></div>
            </div>

            <div id="modalFooter" class="mt-8 pt-6 border-t border-[#e7edf3] flex gap-3 justify-end">
                <button type="button" onclick="closeModal()" class="px-6 py-2.5 text-sm font-bold text-[#4c739a] hover:bg-[#f6f7f8] rounded-xl transition-all">Cancelar</button>
                <button type="submit" class="px-8 py-2.5 bg-[#0f66bd] text-white font-bold text-sm rounded-xl hover:bg-[#0b4d8f] shadow-lg transition-all">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<div id="contactModal" class="fixed inset-0 z-110 hidden items-center justify-center p-4 bg-black/40 backdrop-blur-[2px] transition-all">
    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl border border-[#e7edf3] overflow-hidden animate-in fade-in slide-in-from-bottom-4 duration-200">
        
        <div class="p-6 border-b border-[#e7edf3] flex items-center justify-between bg-[#f6f7f8]">
            <h3 id="contactModalTitle" class="text-lg font-black text-[#0d141b]">Nuevo Contacto</h3>
            <button onclick="closeContactModal()" class="text-[#4c739a] hover:text-[#0d141b] transition-colors p-1">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="contactForm" onsubmit="saveContact(event)" class="p-6 space-y-5">
            <input type="hidden" name="contact_id" id="field_contact_id">
            
            <div class="space-y-1.5">
                <label class="text-[10px] font-black uppercase text-[#4c739a] tracking-widest ml-1">Nombre Completo</label>
                <input type="text" id="c_nombre" required class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 focus:border-[#0f66bd] outline-none transition-all">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] font-black uppercase text-[#4c739a] tracking-widest ml-1">Cargo / Función</label>
                <input type="text" id="c_cargo" class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 focus:border-[#0f66bd] outline-none transition-all">
            </div>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 space-y-1.5">
                    <label class="text-[10px] font-black uppercase text-[#4c739a] tracking-widest ml-1">Teléfono</label>
                    <input type="text" id="c_telefono" maxlength="11" placeholder="999 999 999" oninput="formatPhone(this)" class="text-center w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 focus:border-[#0f66bd] outline-none transition-all">
                </div>
                <div class="col-span-8 space-y-1.5">
                    <label class="text-xs font-bold uppercase text-[#4c739a] tracking-widest ml-1">Correo Electrónico</label>
                    <input type="email" id="c_correo" placeholder="ejemplo@correo.com" class="w-full h-11 px-4 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm focus:ring-2 focus:ring-[#0f66bd]/20 outline-none transition-all">
                </div>
            </div>
            <div class="pt-4 flex gap-3">
                <button type="button" onclick="closeContactModal()" class="flex-1 py-3 text-sm font-bold text-[#4c739a] hover:bg-[#f6f7f8] rounded-xl transition-all border border-transparent">
                    Cerrar
                </button>
                <button type="submit" class="flex-1 py-3 bg-[#0f66bd] text-white font-bold text-sm rounded-xl hover:bg-[#0b4d8f] transition-all shadow-lg shadow-blue-900/10">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // --- BUSCADOR Y FILTROS ---
    function updateCount() {
        const visibleRows = document.querySelectorAll('.client-row:not([style*="display: none"])').length;
        document.getElementById('visibleCount').innerText = visibleRows;
    }

    function searchTable() {
        const input = document.getElementById('searchClient').value.toLowerCase();
        const rows = document.querySelectorAll('.client-row');
        rows.forEach(row => {
            const text = row.getAttribute('data-search');
            row.style.display = text.includes(input) ? '' : 'none';
        });
        updateCount();
    }

    function filterByStatus(status, btn) {
        const rows = document.querySelectorAll('.client-row');
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(b => {
            b.classList.remove('active', 'font-bold', 'bg-white', 'text-[#0f66bd]', 'shadow-sm');
            b.classList.add('font-medium', 'text-[#4c739a]');
        });
        btn.classList.add('active', 'font-bold', 'bg-white', 'text-[#0f66bd]', 'shadow-sm');
        btn.classList.remove('font-medium', 'text-[#4c739a]');
        rows.forEach(row => {
            row.style.display = (status === 'all' || row.getAttribute('data-status') === status) ? '' : 'none';
        });
        updateCount();
    }

    // --- LÓGICA DE CLIENTE ---
    function openModal(mode, data = null) {
        const modal = document.getElementById('clientModal');
        const form = document.getElementById('clientForm');
        const editBtn = document.getElementById('editToggleBtn');
        const footer = document.getElementById('modalFooter');
        const addContactBtn = document.getElementById('addContactBtn');

        modal.classList.replace('hidden', 'flex');
        form.reset();

        if (mode === 'create') {
            updateModalHeader("Nuevo Cliente", "Registre una nueva empresa", "person_add");
            toggleFields(false);
            editBtn.classList.add('hidden');
            footer.classList.remove('hidden');
            addContactBtn.classList.remove('hidden');
            document.getElementById('contactsList').innerHTML = '<p class="text-base italic text-[#4c739a]">Cree el cliente para gestionar contactos.</p>';
        } else {
            updateModalHeader(data.razon_social, "Ficha del cliente", "domain");
            fillForm(data);
            toggleFields(true);
            editBtn.classList.remove('hidden');
            footer.classList.add('hidden');
            addContactBtn.classList.add('hidden');
            fetchContacts(data.id);
        }
    }

    function enableEditMode() {
        toggleFields(false);
        document.getElementById('modalTitle').innerText = "Editando Registro";
        document.getElementById('editToggleBtn').classList.add('hidden');
        document.getElementById('modalFooter').classList.remove('hidden');
        document.getElementById('addContactBtn').classList.remove('hidden');
        
        // 👇 AGREGA ESTA LÍNEA AQUÍ
        renderContactsList(); 
    }

    function closeModal() {
        document.getElementById('clientModal').classList.replace('flex', 'hidden');
    }

    function toggleFields(status) {
        const inputs = document.querySelectorAll('#clientForm input, #clientForm select');
        inputs.forEach(input => { 
            if(input.name !== 'id') {
                input.disabled = status;
                
                if(input.id === 'field_estado') {
                    const labelContainer = input.closest('label');
                    if (status) {
                        labelContainer.classList.add('opacity-50', 'pointer-events-none');
                    } else {
                        labelContainer.classList.remove('opacity-50', 'pointer-events-none');
                    }
                }
            } 
        });
    }

    function updateModalHeader(title, sub, icon) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalSubtitle').innerText = sub;
        document.getElementById('modalIcon').innerText = icon;
    }

    function fillForm(data) {
        document.getElementById('field_id').value = data.id;
        document.getElementById('field_razon_social').value = data.razon_social;
        document.getElementById('field_ruc').value = data.ruc;
        document.getElementById('field_tipo_industria').value = data.tipo_industria;
        
        const estadoSwitch = document.getElementById('field_estado');
        if (estadoSwitch) {
            // Marcamos el checkbox si el estado es 1, lo desmarcamos si es 0
            estadoSwitch.checked = (data.estado == 1);
        }
    }

    // --- LÓGICA DE CONTACTOS (CRUD DENTRO DEL MODAL) ---

    let currentContacts = []; // Store currently loaded contacts

    function fetchContacts(clienteId) {
        const list = document.getElementById('contactsList');
        list.innerHTML = '<div class="text-base animate-pulse text-[#4c739a]">Consultando contactos...</div>';
        
        fetch(`<?= BASE_URL ?>?url=contacts/getByCliente&id=${clienteId}`)
            .then(res => res.json())
            .then(contacts => {
                currentContacts = contacts;
                renderContactsList();
            });
    }

    function renderContactsList() {
        const list = document.getElementById('contactsList');
        // Si el footer NO tiene la clase 'hidden', significa que estamos editando
        const isEditMode = !document.getElementById('modalFooter').classList.contains('hidden');
        
        list.innerHTML = '';
        
        if (currentContacts.length === 0) {
            list.innerHTML = '<p class="text-xs text-[#4c739a] italic">No hay contactos vinculados.</p>';
            return;
        }

        currentContacts.forEach((c, index) => {
            // Determinamos si mostramos u ocultamos
            const actionClass = isEditMode ? 'flex' : 'hidden';

            list.innerHTML += `
                <div class="flex items-center justify-between p-3 bg-[#f6f7f8] rounded-xl border border-[#e7edf3]">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white flex items-center justify-center text-[#0f66bd] border border-[#e7edf3]">
                            <span class="material-symbols-outlined text-sm">contact_page</span>
                        </div>
                        <div>
                            <p class="text-base font-bold text-[#0d141b]">${c.nombre}</p>
                            <p class="text-base text-[#4c739a]">${c.correo || ''} • ${c.telefono || ''}</p>
                        </div>
                    </div>
                    <div class="${actionClass} gap-1">
                        <button type="button" onclick="openContactModal('edit', ${index})" class="p-1.5 text-[#0f66bd] hover:bg-white rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">edit</span>
                        </button>
                        <button type="button" onclick="deleteContact(${c.id})" class="p-1.5 text-red-500 hover:bg-white rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </div>
                </div>`;
        });
    }

    function deleteContact(id) {
        // 1. Confirmación de seguridad
        if (confirm('¿Estás seguro de que deseas eliminar este contacto de forma permanente?')) {
            
            // 2. Petición al servidor
            fetch(`<?= BASE_URL ?>?url=contacts/delete&id=${id}`, {
                method: 'POST' // O GET, según tu ruteador, pero POST es más seguro
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // 3. Eliminar el contacto del array local para que desaparezca de la vista inmediatamente
                    currentContacts = currentContacts.filter(c => c.id != id);
                    
                    // 4. Volver a dibujar la lista actualizada
                    renderContactsList();
                } else {
                    alert("No se pudo eliminar el contacto. Inténtelo de nuevo.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Error de conexión al intentar eliminar.");
            });
        }
    }

    function openContactModal(mode, index = null) {
        const modal = document.getElementById('contactModal');
        const form = document.getElementById('contactForm');
        const title = document.getElementById('contactModalTitle');
        const inputTelefono = document.getElementById('c_telefono');
        
        modal.classList.replace('hidden', 'flex');
        form.reset();

        if (mode === 'edit') {
            const c = currentContacts[index];
            title.innerText = "Editar Contacto";
            document.getElementById('field_contact_id').value = c.id; // real db id
            document.getElementById('c_nombre').value = c.nombre;
            document.getElementById('c_cargo').value = c.cargo;
            document.getElementById('c_correo').value = c.correo;
            
            inputTelefono.value = c.telefono;
            formatPhone(inputTelefono);
            
        } else {
            title.innerText = "Nuevo Contacto";
            document.getElementById('field_contact_id').value = "";
        }
    }

    function closeContactModal() {
        document.getElementById('contactModal').classList.replace('flex', 'hidden');
    }

    function formatPhone(input) {
        if (!input) return;
        
        // 1. Quitar todo lo que no sea número (incluyendo espacios previos)
        let num = input.value.replace(/\D/g, '');
        
        // 2. Limitar a 9 dígitos
        num = num.substring(0, 9);
        
        // 3. Reconstruir con espacios
        let formatted = "";
        if (num.length > 0) formatted += num.substring(0, 3);
        if (num.length > 3) formatted += " " + num.substring(3, 6);
        if (num.length > 6) formatted += " " + num.substring(6, 9);
        
        input.value = formatted;
    }

    function saveContact(e) {
        e.preventDefault();
        const clienteId = document.getElementById('field_id').value;
        const contactId = document.getElementById('field_contact_id').value;
        
        const formData = new FormData();
        formData.append('cliente_id', clienteId);
        formData.append('id', contactId); // si es editar
        formData.append('nombre', document.getElementById('c_nombre').value);
        formData.append('cargo', document.getElementById('c_cargo').value);
        formData.append('telefono', document.getElementById('c_telefono').value);
        formData.append('correo', document.getElementById('c_correo').value);

        // Endpoint ficticio: contacts/save (Deberías crearlo en el controlador)
        fetch(`<?= BASE_URL ?>?url=contacts/save`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                fetchContacts(clienteId); // Recargar lista
                closeContactModal();
            } else {
                alert("Error al guardar contacto");
            }
        });
    }

    // Función para calcular cuántos ítems caben según el alto de la pantalla
    function getOptimalPageSize() {
        const tableContainer = document.querySelector('.flex-1.overflow-auto');
        if (!tableContainer) return 6;

        // 1. Detectar el ancho de la ventana
        const width = window.innerWidth;
        let rowHeight;

        // 2. Asignar alturas según tus medidas específicas
        if (width < 768) {
            rowHeight = 300; // Móvil (diseño de tarjeta flex-col)
        } else if (width >= 768 && width < 1024) {
            rowHeight = 80;  // Tablet (diseño de tabla simplificada)
        } else {
            rowHeight = 90;  // Desktop (diseño de tabla completa)
        }

        // Altura total disponible en el contenedor
        const availableHeight = tableContainer.clientHeight;

        // 3. Calcular cuántos caben
        // Usamos un pequeño margen de seguridad (-10) para el scroll
        let calculatedLimit = Math.floor((availableHeight - 10) / rowHeight);

        // 4. Retornar dentro de un rango lógico
        // En móvil (134px) cabrán pocos, en tablet/desktop cabrán más
        return Math.max(3, Math.min(calculatedLimit, 15));
    }

    window.addEventListener('load', () => {
        const optimalLimit = getOptimalPageSize();
        const urlParams = new URLSearchParams(window.location.search);
        const currentLimit = urlParams.get('limit');

        // Si no hay límite en la URL o es muy diferente al óptimo, recargamos
        if (!currentLimit || Math.abs(currentLimit - optimalLimit) > 2) {
            urlParams.set('limit', optimalLimit);
            urlParams.set('page', 1); // Reset a pág 1 para evitar errores de rango
            window.location.search = urlParams.toString();
        }
    });
</script>