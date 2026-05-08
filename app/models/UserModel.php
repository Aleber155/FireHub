<?php
require_once "app/core/Model.php";

class UserModel extends Model {

    public function findByUsername($username) {
        // Escribimos la consulta SQL
        $sql = "SELECT id, username, password, name, image FROM users WHERE username = :username AND is_active = 1 LIMIT 1";
        // Usamos $this->db que heredamos de core/Model.php
        $stmt = $this->db->prepare($sql);
        // Ejecutamos la consulta pasando el parámetro
        $stmt->execute(['username' => $username]);
        // Retornamos el resultado como un arreglo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBasicInfo($id, $name, $image) {
        $sql = "UPDATE users SET name = :name, image = :image WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function updatePassword($id, $hashedPassword) {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':password', $hashedPassword);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Obtener consultores (usuarios) que ofrecen un servicio específico
     */
    public function getByServicio($servicioId) {
        $sql = "SELECT u.id, u.name 
                FROM users u
                INNER JOIN usuario_servicios us ON u.id = us.usuario_id
                WHERE us.servicio_id = :servicioId AND u.is_active = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['servicioId' => $servicioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}