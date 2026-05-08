<?php
require_once "app/core/Model.php";

class CalendarModel extends Model {

    /**
     * Obtiene la disponibilidad de TODOS los usuarios para el mes
     * Incluye JOIN con users para la identificación visual por colores
     */
    public function getAvailabilityByMonth($month, $year) {
        $sql = "SELECT d.*, u.name as user_name, u.username as user_username 
                FROM disponibilidad d
                JOIN users u ON d.usuario_id = u.id
                WHERE MONTH(d.fecha) = :month 
                AND YEAR(d.fecha) = :year
                ORDER BY d.hora_inicio ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':month'  => $month,
            ':year'   => $year
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los rangos de todos los usuarios para un día específico
     */
    public function getAvailabilityByDay($fecha) {
        $sql = "SELECT d.*, u.name as user_name, u.username as user_username 
                FROM disponibilidad d
                JOIN users u ON d.usuario_id = u.id
                WHERE d.fecha = :fecha 
                ORDER BY d.hora_inicio ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':fecha' => $fecha]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene la lista de consultores para la leyenda del calendario
     */
    public function getActiveConsultants() {
        $sql = "SELECT id, name, username FROM users WHERE is_active = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Registra un nuevo rango horario
     */
    public function addAvailability($data) {
        $sql = "INSERT INTO disponibilidad (usuario_id, fecha, hora_inicio, hora_fin) 
                VALUES (:userId, :fecha, :inicio, :fin)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':userId' => $data['usuario_id'],
            ':fecha'  => $data['fecha'],
            ':inicio' => $data['hora_inicio'],
            ':fin'    => $data['hora_fin']
        ]);
    }

    /**
     * Elimina un rango de disponibilidad (Solo si le pertenece al usuario)
     */
    public function deleteAvailability($id, $userId) {
        $sql = "DELETE FROM disponibilidad WHERE id = :id AND usuario_id = :userId";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':userId' => $userId
        ]);
    }
}