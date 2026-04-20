<?php

require_once __DIR__ .'/../../config/database.php';

class Vehiculo {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll(){
        $result = $this->conn->query(
            "SELECT * FROM vehiculos ORDER BY created_at DESC"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id){
        $stmt = $this->conn->prepare(
            "SELECT * FROM vehiculos WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function crear($marca, $modelo, $anio, $categoria, $estado){
        $stmt = $this->conn->prepare(
            "INSERT INTO vehiculos (marca, modelo, anio, categoria, estado) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("ssiss", $marca, $modelo, $anio, $categoria, $estado);
        return $stmt->execute();
    }

    public function actualizar($id, $marca, $modelo, $anio, $categoria, $estado){
        $stmt = $this->conn->prepare(
            "UPDATE vehiculos 
            SET marca=?, modelo=?, anio=?, categoria=?, estado=? 
            WHERE id=?"
        );
        $stmt->bind_param("ssissi", $marca, $modelo, $anio, $categoria, $estado);
        return $stmt->execute();
    }

    public function eliminar($id){
        $stmt = $this->conn->prepare(
            "DELETE FROM vehiculos WHERE id=?"
        );
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
