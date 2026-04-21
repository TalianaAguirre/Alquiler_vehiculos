<?php
namespace monolitico\models\queries;
use monolitico\models\config\Conexion;
use monolitico\models\entities\Vehiculo;

class VehiculoQuery {

    // Trae todos los vehículos
    static function getAll() {
        $sql    = "SELECT * FROM vehiculos";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Vehiculo(
                $row['id'],
                $row['marca'],
                $row['modelo'],
                $row['anio'],
                $row['categoria'],
                $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    // Trae solo los disponibles
    static function getDisponibles() {
        $sql    = "SELECT * FROM vehiculos WHERE estado = 'disponible'";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Vehiculo(
                $row['id'],
                $row['marca'],
                $row['modelo'],
                $row['anio'],
                $row['categoria'],
                $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    // Busca un vehículo por id
    static function find($id) {
        $sql    = "SELECT * FROM vehiculos WHERE id = $id";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $vehiculo = null;
        if ($row = $result->fetch_assoc()) {
            $vehiculo = new Vehiculo(
                $row['id'],
                $row['marca'],
                $row['modelo'],
                $row['anio'],
                $row['categoria'],
                $row['estado']
            );
        }
        $connDb->close();
        return $vehiculo;
    }

    // Crea un vehículo nuevo
    static function create($entity) {
        $sql    = "INSERT INTO vehiculos (marca, modelo, anio, categoria, estado) 
                   VALUES (?,?,?,?,?)";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'ssiss',
            'datos' => [
                $entity->marca,
                $entity->modelo,
                $entity->anio,
                $entity->categoria,
                $entity->estado
            ]
        ]);
        $connDb->close();
        return $result;
    }

    // Cambia el estado del vehículo
    static function Estado($id, $estado) {
        $sql    = "UPDATE vehiculos SET estado = ? WHERE id = ?";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'si',
            'datos' => [$estado, $id]
        ]);
        $connDb->close();
        return $result;
    }

    // Elimina un vehículo
    static function delete($id) {
        $sql    = "DELETE FROM vehiculos WHERE id = ?";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'i',
            'datos' => [$id]
        ]);
        $connDb->close();
        return $result;
    }
}