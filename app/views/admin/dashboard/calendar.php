<?php
// Configuración de fechas y navegación
$daysOfWeek = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
$monthName = date('F', mktime(0, 0, 0, $mes, 10));

// Definición de colores por ID de Usuario
$userColors = [
    1 => ['bg' => 'bg-[#0f66bd]', 'text' => 'text-[#0f66bd]', 'light' => 'bg-[#0f66bd]/10'], // Azul
    2 => ['bg' => 'bg-orange-500', 'text' => 'text-orange-600', 'light' => 'bg-orange-50'], // Naranja
    3 => ['bg' => 'bg-emerald-500', 'text' => 'text-emerald-600', 'light' => 'bg-emerald-50'], // Verde
    4 => ['bg' => 'bg-purple-500', 'text' => 'text-purple-600', 'light' => 'bg-purple-50'], // Morado
];
$defaultColor = ['bg' => 'bg-slate-500', 'text' => 'text-slate-600', 'light' => 'bg-slate-50'];
?>

<main class="flex-1 flex flex-col h-[calc(100vh-76px)] md:h-screen px-4 py-6 md:px-8 md:py-8 lg:px-10 bg-[#f6f7f8] overflow-hidden">
    
    <header class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 shrink-0">
        <div>
            <h1 class="text-3xl md:text-[2.25rem] font-black tracking-tight leading-tight text-[#0d141b]">Agenda de Disponibilidad</h1>
            <p class="text-[#4c739a] text-sm md:text-base mt-1">Visualiza la disponibilidad del equipo y gestiona tus propios turnos.</p>
        </div>
    </header>

    <div class="grid grid-cols-12 gap-6 lg:gap-8 flex-1 min-h-0 overflow-y-auto md:overflow-hidden pb-6 md:pb-0">
        
        <div class="col-span-12 lg:col-span-3 flex flex-col gap-6 lg:overflow-y-auto custom-scrollbar lg:pr-2">
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-[#e7edf3] shrink-0">
                <h3 class="text-lg font-bold text-[#0d141b] mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#0f66bd]">schedule</span>
                    Horarios: <?= date('d/m', strtotime($fechaActual)) ?>
                </h3>
                <p class="text-xs text-[#4c739a] font-semibold uppercase tracking-widest mb-5">Disponibilidad del equipo</p>
                
                <div class="space-y-4">
                    <?php if(!empty($agendaDia)): ?>
                        <?php foreach($agendaDia as $rango): 
                            $c = $userColors[$rango['usuario_id']] ?? $defaultColor;
                            $esMio = ($rango['usuario_id'] == $_SESSION['user_id']);
                        ?>
                            <div class="p-4 rounded-xl border border-[#e7edf3] <?= $c['light'] ?> transition-all">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold uppercase tracking-widest <?= $c['text'] ?>">
                                        <?= htmlspecialchars($rango['user_name'] ?? 'Consultor') ?>
                                    </span>
                                    <span class="w-2.5 h-2.5 rounded-full <?= $c['bg'] ?> shadow-sm"></span>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-bold text-[#0d141b]"><?= date('h:i A', strtotime($rango['hora_inicio'])) ?></span>
                                        <span class="text-[#4c739a]">—</span>
                                        <span class="text-sm font-bold text-[#0d141b]"><?= date('h:i A', strtotime($rango['hora_fin'])) ?></span>
                                    </div>
                                    <?php if($esMio): ?>
                                        <a href="<?= BASE_URL ?>?url=calendar/deleteRange&id=<?= $rango['id'] ?>" 
                                           onclick="return confirm('¿Eliminar tu rango de disponibilidad?')"
                                           class="text-red-400 hover:text-red-600 transition-colors">
                                            <span class="material-symbols-outlined text-sm">delete</span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="py-8 text-center border-2 border-dashed border-[#e7edf3] rounded-2xl">
                            <span class="material-symbols-outlined text-[#cfdbe7] text-4xl">calendar_today</span>
                            <p class="text-xs text-[#4c739a] mt-2 font-medium">Sin horarios registrados</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="mt-8 pt-6 border-t border-[#e7edf3]">
                    <h4 class="text-xs font-bold text-[#0d141b] uppercase tracking-widest mb-5 text-center">
                        Asignar mi Disponibilidad
                    </h4>
                    
                    <form action="<?= BASE_URL ?>?url=calendar/saveRange" method="POST" class="space-y-4">
                        <input type="hidden" name="fecha" value="<?= $fechaActual ?>">
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase px-1 flex items-center gap-1">
                                    Inicio
                                </label>
                                <select name="hora_inicio" required 
                                        class="w-full h-11 px-3 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm font-semibold text-[#0d141b] focus:ring-2 focus:ring-[#0f66bd]/20 focus:border-[#0f66bd] outline-none transition-all cursor-pointer appearance-none shadow-sm">
                                    <?php 
                                    for($h=0; $h<24; $h++) {
                                        foreach(['00', '30'] as $m) {
                                            $val24 = sprintf('%02d:%s', $h, $m);
                                            $h12 = ($h == 0 || $h == 12) ? 12 : $h % 12;
                                            $amPm = ($h < 12) ? 'AM' : 'PM';
                                            echo "<option value=\"$val24\">" . sprintf('%02d:%s %s', $h12, $m, $amPm) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-[#4c739a] uppercase px-1 flex items-center gap-1">
                                    Fin
                                </label>
                                <select name="hora_fin" required 
                                        class="w-full h-11 px-3 bg-[#f6f7f8] border border-[#e7edf3] rounded-xl text-sm font-semibold text-[#0d141b] focus:ring-2 focus:ring-[#0f66bd]/20 focus:border-[#0f66bd] outline-none transition-all cursor-pointer appearance-none shadow-sm">
                                    <?php 
                                    for($h=0; $h<24; $h++) {
                                        foreach(['00', '30'] as $m) {
                                            $val24 = sprintf('%02d:%s', $h, $m);
                                            $h12 = ($h == 0 || $h == 12) ? 12 : $h % 12;
                                            $amPm = ($h < 12) ? 'AM' : 'PM';
                                            $selected = ($val24 == '09:00') ? 'selected' : '';
                                            echo "<option value=\"$val24\" $selected>" . sprintf('%02d:%s %s', $h12, $m, $amPm) . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3.5 bg-[#0f66bd] text-white text-xs font-bold uppercase tracking-widest rounded-2xl shadow-lg shadow-blue-900/10 hover:bg-[#0b4d8f] hover:-translate-y-0.5 active:scale-95 transition-all duration-200 flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">add_circle</span>
                            Confirmar Rango
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-9 flex flex-col bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden min-h-125">
            
            <div class="p-5 md:p-6 border-b border-[#e7edf3] flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shrink-0 bg-white">
                <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-start">
                    <h3 class="text-xl font-bold text-[#0d141b]"><?= $monthName . ' ' . $anio ?></h3>
                    <div class="flex items-center bg-[#f6f7f8] rounded-lg p-1 border border-[#e7edf3]">
                        <a href="<?= BASE_URL ?>?url=calendar&month=<?= $mes-1 ?>&year=<?= $anio ?>" class="p-1 text-[#4c739a] hover:text-[#0f66bd] transition-colors"><span class="material-symbols-outlined text-xl">chevron_left</span></a>
                        <a href="<?= BASE_URL ?>?url=calendar&month=<?= $mes+1 ?>&year=<?= $anio ?>" class="p-1 text-[#4c739a] hover:text-[#0f66bd] transition-colors"><span class="material-symbols-outlined text-xl">chevron_right</span></a>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <?php foreach($consultores as $con): 
                        $c = $userColors[$con['id']] ?? $defaultColor;
                    ?>
                        <div class="flex items-center gap-2 px-3 py-1.5 <?= $c['light'] ?> <?= $c['text'] ?> rounded-lg text-xs font-semibold uppercase tracking-widest border border-current/10">
                            <span class="w-2 h-2 rounded-full <?= $c['bg'] ?>"></span> <?= htmlspecialchars($con['name']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="grid grid-cols-7 bg-[#f8fafc] border-b border-[#e7edf3] shrink-0">
                <?php foreach($daysOfWeek as $day): ?>
                    <div class="py-3 text-center text-xs font-bold text-[#4c739a] uppercase tracking-widest"><?= $day ?></div>
                <?php endforeach; ?>
            </div>

            <div class="flex-1 overflow-y-auto custom-scrollbar bg-[#f6f7f8]/20">
                <div class="grid grid-cols-7 min-h-full">
                    <?php
                    $firstDayOfMonth = date('N', strtotime("$anio-$mes-01"));
                    $daysInMonth = date('t', strtotime("$anio-$mes-01"));
                    
                    for ($i = 1; $i < $firstDayOfMonth; $i++) {
                        echo '<div class="border-r border-b border-[#e7edf3] bg-[#f6f7f8]/50 p-3 min-h-30 opacity-40"></div>';
                    }

                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $currentDate = sprintf('%04d-%02d-%02d', $anio, $mes, $day);
                        $isToday = $currentDate == date('Y-m-d');
                        $isSelected = $currentDate == $fechaActual;
                        $rangosDia = array_filter($disponibilidad, fn($d) => $d['fecha'] == $currentDate);
                        ?>
                        <div onclick="window.location.href='<?= BASE_URL ?>?url=calendar&selected_date=<?= $currentDate ?>&month=<?= $mes ?>&year=<?= $anio ?>'"
                             class="border-r border-b border-[#e7edf3] p-2 md:p-3 min-h-30 transition-all cursor-pointer group 
                             <?= $isSelected ? 'bg-[#0f66bd]/5' : 'bg-white hover:bg-[#f8fafc]' ?>">
                            
                            <div class="flex items-center justify-between mb-2">
                                <span class="w-7 h-7 flex items-center justify-center rounded-full text-xs font-black transition-all
                                    <?= $isToday ? 'bg-[#0f66bd] text-white shadow-md' : ($isSelected ? 'text-[#0f66bd]' : 'text-[#4c739a]') ?>">
                                    <?= $day ?>
                                </span>
                            </div>

                            <div class="flex flex-col gap-1 max-h-24 overflow-y-auto no-scrollbar">
                                <?php foreach($rangosDia as $r): 
                                    $c = $userColors[$r['usuario_id']] ?? $defaultColor;
                                ?>
                                    <div class="<?= $c['bg'] ?> rounded-md shadow-sm">
                                        <div class="hidden md:block text-xs text-center font-medium p-1 text-white truncate">
                                            <?= date('h:i A', strtotime($r['hora_inicio'])) ?> - <?= date('h:i A', strtotime($r['hora_fin'])) ?>
                                        </div>
                                        <div class="md:hidden h-2 w-full"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>