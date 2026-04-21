<?php
namespace monolitico\models\queries;
use monolitico\models\config\Conexion;
use monolitico\models\entities\Reserva;

class ReservaQuery {

    // Trae todos los vehículos
    static function getAll() {
        $sql = "SELECT * FROM reservas";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Reserva(
                $row['id'],
                $row['cliente_id'],
                $row['vehiculo_id'],
                $row['inicio'],
                $row['fin'], 
                $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    static function getActivas() {
        $sql = "SELECT * FROM reservas WHERE estado = 'activas'";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Reserva(
                $row['id'],
                $row['cliente_id'],
                $row['vehiculo_id'],
                $row['inicio'],
                $row['fin'], 
                $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    // Busca un vehículo por id
    static function find($id) {
        $sql = "SELECT * FROM reservas WHERE id = $id";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $reserva = null;
        if ($row = $result->fetch_assoc()) {
            $reserva = new Reserva(
                $row['id'],
                $row['cliente_id'],
                $row['vehiculo_id'],
                $row['inicio'],
                $row['fin'], 
                $row['estado']
            );
        }
        $connDb->close();
        return $reserva;
    }

    // Crea un vehículo nuevo
    static function create($entity) {
        $sql = "INSERT INTO reservas (cliente_id, vehiculo_id, inicio, fin, estado) 
                VALUES (?,?,?,?,?)";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type' => 'iisss',
            'datos' => [
                $entity->cliente_id,
                $entity->vehiculo_id,
                $entity->inicio,
                $entity->fin,
                $entity->estado
            ]
        ]);
        $connDb->close();
        return $result;
    }

    static function updateEstado($id, $estado) {
        $sql = "UPDATE reservas SET estado = ? WHERE id = ?";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type' => 'si',
            'datos' => [$estado, $id]
        ]);
        $connDb->close();
        return $result;
    }

    static function delete($id) {
        $sql = "DELETE FROM reservas WHERE id = ?";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'i',
            'datos' => [$id]
        ]);
        $connDb->close();
        return $result;
    }

    static function hayConflicto($vehiculo_id, $inicio, $fin){
        $sql = "SELECT * FROM reservas
                WHERE vehiculo_id = ?
                AND estado = 'activa'
                AND (inicio <= ? AND fin >= ?)";
        $connDb = new Conexion();
        $result = $connDb ->executeUpdateData($sql, [
            'type' => 'iss',
            'datos' => [$vehiculo_id, $fin, $inicio]
        ]);
        $connDb->close();
        return $result->num_rows > 0;
    }
}