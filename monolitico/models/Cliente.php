<?php

require_once __DIR__ .'/../../config/database.php';

class Cliente {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll(){
        $result = $this->conn->query(
            "SELECT * FROM clientes ORDER BY nombre"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id){
        $stmt = $this->conn->prepare(
            "SELECT * FROM clientes WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($nombre, $telefono, $correo, $licencia){
        $stmt = $this->conn->prepare(
            "INSERT INTO clientes (nombre, telefono, correo, licencia) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssss", $nombre, $telefono, $correo, $licencia);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre, $telefono, $correo, $licencia){
        $stmt = $this->conn->prepare(
            "UPDATE clientes 
            SET nombre=?, telefono=?, correo=?, licencia=? 
            WHERE id=?"
        );
        $stmt->bind_param("ssssi", $nombre, $telefono, $correo, $licencia, $id);
        return $stmt->execute();
    }

    public function eliminar($id){
        $stmt = $this->conn->prepare(
            "DELETE FROM clientes WHERE id=?"
        );
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}