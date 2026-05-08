<?php
require_once "app/core/Model.php";

class BookingModel extends Model {

    /**
     * 1. LÓGICA PARA VISTA PÚBLICA (SIN LOGIN)
     * Obtiene los bloques de tiempo REALMENTE disponibles
     */
    public function getAvailableSlots($consultorId, $fecha, $duracionServicio) {
        // A. Obtener la disponibilidad bruta del consultor para ese día
        $sqlDisp = "SELECT hora_inicio, hora_fin FROM disponibilidad 
                    WHERE usuario_id = :uId AND fecha = :fec";
        $stmtDisp = $this->db->prepare($sqlDisp);
        $stmtDisp->execute([':uId' => $consultorId, ':fec' => $fecha]);
        $rangos = $stmtDisp->fetchAll(PDO::FETCH_ASSOC);

        if (!$rangos) return [];

        // B. Obtener citas ya reservadas (que no estén canceladas)
        $sqlCitas = "SELECT hora_inicio, hora_fin FROM citas 
                     WHERE usuario_id = :uId AND fecha = :fec AND estado != 'cancelada'";
        $stmtCitas = $this->db->prepare($sqlCitas);
        $stmtCitas->execute([':uId' => $consultorId, ':fec' => $fecha]);
        $ocupados = $stmtCitas->fetchAll(PDO::FETCH_ASSOC);

        $slotsLibres = [];

        foreach ($rangos as $r) {
            $inicio = strtotime($r['hora_inicio']);
            $fin = strtotime($r['hora_fin']);
            $intervalo = $duracionServicio * 60; // Convertir min a segundos

            // Dividir el rango en bloques según la duración del servicio
            for ($current = $inicio; ($current + $intervalo) <= $fin; $current += $intervalo) {
                $slotStart = date('H:i:s', $current);
                $slotEnd = date('H:i:s', $current + $intervalo);

                // Verificar si este bloque choca con alguna cita
                $estaLibre = true;
                foreach ($ocupados as $cita) {
                    if ($slotStart < $cita['hora_fin'] && $slotEnd > $cita['hora_inicio']) {
                        $estaLibre = false;
                        break;
                    }
                }

                if ($estaLibre) {
                    $slotsLibres[] = [
                        'inicio' => date('h:i A', $current),
                        'value' => $slotStart
                    ];
                }
            }
        }
        return $slotsLibres;
    }

    /**
     * Crear la reserva (Booking)
     */
    public function createReservation($data) {
        $sql = "INSERT INTO citas (usuario_id, cliente_id, servicio_id, fecha, hora_inicio, hora_fin, monto, notas) 
                VALUES (:uId, :cId, :sId, :fec, :hI, :hF, :monto, :notas)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':uId'   => $data['usuario_id'],
            ':cId'   => $data['cliente_id'],
            ':sId'   => $data['servicio_id'],
            ':fec'   => $data['fecha'],
            ':hI'    => $data['hora_inicio'],
            ':hF'    => $data['hora_fin'],
            ':monto' => $data['monto'],
            ':notas' => $data['notas'] ?? null
        ]);
    }

    /**
     * 2. LÓGICA PARA PANEL ADMINISTRATIVO
     * Listado general de citas con nombres de clientes y servicios
     */
    public function getAllCitas($filtros = []) {
        $sql = "SELECT c.*, 
                u.name as consultor, 
                cl.razon_social as cliente, 
                cl.ruc as documento, 
                s.nombre as servicio
                FROM citas c
                JOIN users u ON c.usuario_id = u.id
                JOIN clientes cl ON c.cliente_id = cl.id
                JOIN servicios s ON c.servicio_id = s.id
                ORDER BY c.fecha DESC, c.hora_inicio ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Actualizar el estado de la cita (Confirmar, Completar, Cancelar)
     */
    public function updateCitaStatus($id, $nuevoEstado) {
        $sql = "UPDATE citas SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':estado' => $nuevoEstado,
            ':id' => $id
        ]);
    }
}