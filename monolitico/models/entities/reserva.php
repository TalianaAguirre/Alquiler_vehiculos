<?php

namespace monolitico\models\entities;
use monolitico\models\config\ModelBase;

class Reserva{
    protected $id =0;
    protected $idcliente = null;
    protected $idVehiculo = null;
    protected $inicio = null;
    protected $fin = null;
    protected $estado = null;

    public function __construct($id, $idcliente, $idVehiculo, $inicio, $fin, $estado)
    {
      $this->id = $id;
      $this->idcliente = $idcliente;
      $this->idVehiculo = $idVehiculo;
      $this->inicio = $inicio;
      $this->fin = $fin;
      $this->estado = $estado;
    }
    /*private $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll(){
        $result = $this->conn->query(
            "SELECT * FROM reserva ORDER BY created_at DESC"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id){
        $stmt = $this->conn->prepare(
            "SELECT * FROM reserva WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function disponible($vehiculo_id, $inicio, $fin){
    $stmt = $this->conn->prepare(
        "SELECT * FROM reserva
        WHERE vehiculo_id = ?
        AND (
            (inicio <= ? AND fin >= ?) OR
            (inicio <= ? AND fin >= ?)
        )"
    );

    $stmt->bind_param("issss", $vehiculo_id, $fin, $inicio, $inicio, $fin);
    $stmt->execute();
    $result = $stmt->get_result();
    }


    public function crear($cliente_id, $vehiculo_id, $inicio, $fin, $estado){

        $stmt = $this->conn->prepare(
            "INSERT INTO reserva (cliente, vehiculo, inicio, fin, estado) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("iisss", $cliente_id, $vehiculo_id, $inicio, $fin, $estado);
        return $stmt->execute();
    }

    public function actualizar($id, $cliente_id, $vehiculo_id, $inicio, $fin, $estado){
        $stmt = $this->conn->prepare(
            "UPDATE reserva
            SET cliente=?, vehiculo=?, inicio=?, fin=?, estado=? 
            WHERE id=?"
        );
      $stmt->bind_param("iisssi", $cliente_id, $vehiculo_id, $inicio, $fin, $estado, $id);        return $stmt->execute();
    }

    public function eliminar($id){
        $stmt = $this->conn->prepare(
            "DELETE FROM reserva WHERE id=?"
        );
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }*/
}
