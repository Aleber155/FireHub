<?php

namespace Aleber\FireHub\Models;

use Aleber\FireHub\Core\Model;
use \PDO;

class UserModel extends Model {

    /**
     * Busca al usuario para el Login.
     * En FireHub, $username puede ser el DNI (Postulantes) o el Código de Bombero (Activos).
     */
    public function findByUsername(string $username) {
        // Hacemos un JOIN con la tabla bomberos para traer su nombre y foto a la sesión
        $sql = "SELECT u.id, u.usuario AS username, u.password, u.rol, 
                       b.nombres AS name, b.foto AS image 
                FROM usuarios u
                LEFT JOIN bomberos b ON u.bombero_id = b.id
                WHERE u.usuario = :username LIMIT 1";
                
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualización de perfil por el propio usuario.
     * Permite editar solo los campos permitidos (dirección, teléfono, etc.)
     */
    public function updateProfile(int $userId, array $data) {
        // Actualizamos la tabla bomberos basada en el ID del usuario logueado
        $sql = "UPDATE bomberos 
                SET direccion = :direccion, 
                    telefono = :telefono 
                WHERE id = (SELECT bombero_id FROM usuarios WHERE id = :user_id LIMIT 1)";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':direccion', $data['direccion']);
        $stmt->bindValue(':telefono', $data['telefono']);
        $stmt->bindValue(':user_id', $userId);
        
        return $stmt->execute();
    }

    /**
     * Actualización de contraseña desde el panel de Settings
     */
    public function updatePassword(int $id, string $hashedPassword) {
        $sql = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':password', $hashedPassword);
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }

    /**
     * Obtener todos los datos de un usuario por su ID de sesión
     */
    public function getUserById(int $id) {
        $sql = "SELECT u.id, u.usuario AS username, u.rol, u.ultimo_acceso, 
                       b.* FROM usuarios u
                LEFT JOIN bomberos b ON u.bombero_id = b.id
                WHERE u.id = :id";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualiza el registro de último acceso al iniciar sesión
     */
    public function updateLastLogin(int $id) {
        $sql = "UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }
}