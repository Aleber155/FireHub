<?php
require_once "app/core/Model.php";

class ClientsModel extends Model {

    /**
     * Obtiene todos los clientes con su contacto principal
     */
    public function getAllClientes() {
        $sql = "SELECT 
                    c.id,
                    c.razon_social,
                    c.ruc,
                    c.tipo_industria,
                    c.estado,
                    ct.nombre AS contacto_nombre,
                    ct.correo AS contacto_correo,
                    ct.telefono AS contacto_telefono
                FROM clientes c
                LEFT JOIN contactos ct 
                    ON ct.id = (
                        SELECT id FROM contactos 
                        WHERE cliente_id = c.id AND estado = 1 
                        ORDER BY created_at ASC
                        LIMIT 1
                    )";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Guarda o actualiza un cliente
     */
    public function save($data) {
        if (empty($data['id'])) {
            // Lógica para NUEVO CLIENTE
            $sql = "INSERT INTO clientes (razon_social, ruc, tipo_industria, estado) 
                    VALUES (:razon_social, :ruc, :tipo_industria, :estado)";
            
            // Eliminamos el ID del array para que no cause error en el execute del INSERT
            unset($data['id']); 
        } else {
            // Lógica para EDITAR CLIENTE EXISTENTE
            $sql = "UPDATE clientes 
                    SET razon_social = :razon_social, 
                        ruc = :ruc, 
                        tipo_industria = :tipo_industria, 
                        estado = :estado 
                    WHERE id = :id";
        }

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            // Podrías loguear el error aquí: error_log($e->getMessage());
            return false;
        }
    }
    
    /**
     * Obtiene un cliente específico por ID (Útil para validaciones)
     */
    public function getById($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener solo 6 registros por vez
     */
    public function getClientesPaginados($inicio, $cantidad) {
        // Necesitamos el LEFT JOIN para traer el nombre, correo y tel del contacto vinculado
        $sql = "SELECT c.*, 
                con.nombre as contacto_nombre, 
                con.correo as contacto_correo, 
                con.telefono as contacto_telefono
                FROM clientes c
                LEFT JOIN contactos con ON c.id = con.cliente_id
                GROUP BY c.id -- Esto evita que se dupliquen filas si hay varios contactos
                ORDER BY c.id ASC 
                LIMIT :inicio, :cantidad";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
        $stmt->bindValue(':cantidad', (int)$cantidad, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Contar cuántos clientes hay en total
     */
    public function getTotalClientes() {
        $sql = "SELECT COUNT(*) as total FROM clientes";
        return $this->db->query($sql)->fetch()['total'];
    }

    public function getTotalClientesPorEstado($estado = null) {
        try {
            // Si el estado es null, contamos todos (similar a tu getTotalClientes actual)
            if ($estado === null) {
                $sql = "SELECT COUNT(*) FROM clientes";
                $stmt = $this->db->prepare($sql);
            } else {
                // Contamos filtrando por el campo 'estado'
                $sql = "SELECT COUNT(*) FROM clientes WHERE estado = :estado";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':estado', (int)$estado, PDO::PARAM_INT);
            }

            $stmt->execute();
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            // Manejo de error básico
            error_log("Error en getTotalClientesPorEstado: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Obtiene un cliente específico por su RUC
     */
    public function getByRuc($ruc) {
        $sql = "SELECT id, razon_social, ruc FROM clientes WHERE ruc = :ruc LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['ruc' => $ruc]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}