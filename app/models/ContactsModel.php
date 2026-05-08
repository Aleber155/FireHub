<?php
require_once "app/core/Model.php";

class ContactsModel extends Model {

    /**
     * Obtiene todos los contactos de un cliente específico
     */
    public function getContactsByCliente($clienteId) {
        $sql = "SELECT id, nombre, cargo, correo, telefono, estado 
                FROM contactos 
                WHERE cliente_id = :cliente_id 
                AND estado = 1
                ORDER BY created_at ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cliente_id', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Guarda o actualiza un contacto
     */
    public function saveContact($data) {
        if (empty($data['id'])) {
            // Lógica para NUEVO CONTACTO
            $sql = "INSERT INTO contactos (cliente_id, nombre, cargo, correo, telefono, estado) 
                    VALUES (:cliente_id, :nombre, :cargo, :correo, :telefono, 1)";
            
            // Eliminamos 'id' para evitar conflictos en el execute del INSERT
            unset($data['id']);
        } else {
            // Lógica para EDITAR CONTACTO EXISTENTE
            // Nota: cliente_id no se suele actualizar, por lo que lo quitamos del SET
            $sql = "UPDATE contactos 
                    SET nombre = :nombre, 
                        cargo = :cargo, 
                        correo = :correo, 
                        telefono = :telefono 
                    WHERE id = :id";
            
            // Si el cliente_id viene en el array pero no está en la consulta UPDATE,
            // PDO podría dar error, así que lo quitamos si existe.
            if(isset($data['cliente_id'])) unset($data['cliente_id']);
        }

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            // error_log($e->getMessage());
            return false;
        }
    }

    public function deleteContact($id) {
        // Cambiamos el estado a 0 (Inactivo)
        $sql = "UPDATE contactos SET estado = 0 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Busca si un contacto ya existe por su correo electrónico en una empresa específica
     */
    public function getByEmailAndCliente($correo, $clienteId) {
        $sql = "SELECT id FROM contactos WHERE correo = :correo AND cliente_id = :cliente_id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'correo' => $correo,
            'cliente_id' => $clienteId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}