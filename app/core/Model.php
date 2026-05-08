<?php

namespace Aleber\Firehub\Core;

use Aleber\Firehub\Config\Database;
use PDO;

class Model {

    protected PDO $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    /**
     * Ejecutar consulta preparada (SELECT)
     */
    protected function query(string $sql, array $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Obtener todos los registros
     */
    protected function getAll(string $sql, array $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }

    /**
     * Obtener un solo registro
     */
    protected function getOne(string $sql, array $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    /**
     * Ejecutar INSERT, UPDATE, DELETE
     */
    protected function execute(string $sql, array $params = []) {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Último ID insertado
     */
    protected function lastInsertId() {
        return $this->db->lastInsertId();
    }
}