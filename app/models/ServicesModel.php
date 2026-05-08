<?php

require_once "app/core/Model.php";

class ServiceModel extends Model {
    
    /**
     * Obtener todos los servicios activos para SANEMOG
     */
    public function getAllServices() {
        $sql = "SELECT * FROM servicios ORDER BY id ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener un servicio específico por ID
     */
    public function getServiceById($id) {
        $sql = "SELECT * FROM servicios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crear un nuevo servicio de consultoría
     */
    public function createService($data) {
        $sql = "INSERT INTO servicios (nombre, duracion, precio, estado) 
                VALUES (:nombre, :duracion, :precio, 1)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':duracion', (int)$data['duracion'], PDO::PARAM_INT);
        $stmt->bindValue(':precio', $data['precio']);
        return $stmt->execute();
    }

    /**
     * Modificar un servicio existente (Inspección/Cita)
     */
    public function updateService($id, $data) {
        $sql = "UPDATE servicios 
                SET nombre = :nombre, duracion = :duracion, precio = :precio 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':duracion', (int)$data['duracion'], PDO::PARAM_INT);
        $stmt->bindValue(':precio', $data['precio']);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Desactivar servicio (Eliminación Lógica)
     * Mantiene la integridad referencial para reportes contables futuros.
     */
    public function deleteService($id) {
        $sql = "UPDATE servicios SET estado = 0 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Reactivar un servicio previamente inactivado
     */
    public function activateService($id) {
        $sql = "UPDATE servicios SET estado = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Sincroniza los servicios que el usuario ha seleccionado en su configuración
     */
    public function syncUserServices($userId, $servicesIds) {
        try {
            $this->db->beginTransaction();

            // 1. Limpiar servicios anteriores para este usuario específico
            $sqlDelete = "DELETE FROM usuario_servicios WHERE usuario_id = :userId";
            $stmtDelete = $this->db->prepare($sqlDelete);
            $stmtDelete->execute([':userId' => $userId]);

            // 2. Insertar las nuevas selecciones desde los checkboxes
            if (!empty($servicesIds)) {
                $sqlInsert = "INSERT INTO usuario_servicios (usuario_id, servicio_id) VALUES (:userId, :servicioId)";
                $stmtInsert = $this->db->prepare($sqlInsert);
                foreach ($servicesIds as $serviceId) {
                    $stmtInsert->execute([
                        ':userId' => $userId,
                        ':servicioId' => (int)$serviceId
                    ]);
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Error en syncUserServices: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obtener los IDs de los servicios que el usuario ya tiene activos
     */
    public function getSelectedServiceIds($userId) {
        $sql = "SELECT servicio_id FROM usuario_servicios WHERE usuario_id = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN); // Devuelve algo como [1, 2, 4]
    }

    /**
     * Actualiza únicamente el estado del servicio (Activo/Inactivo)
     */
    public function updateStatus($id, $estado) {
        $sql = "UPDATE servicios SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':estado', (int)$estado, PDO::PARAM_INT);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}