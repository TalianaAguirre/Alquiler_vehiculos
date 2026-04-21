<?php
namespace monolitico\models\queries;
use monolitico\models\config\Conexion;
use monolitico\models\entities\Cliente;

class ClienteQuery {

    static function getAll() {
        $sql    = "SELECT * FROM clientes";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Cliente(
                $row['id'],
                $row['nombre'],
                $row['telefono'],
                $row['correo'],
                $row['num_licencia']
            );
        }
        $connDb->close();
        return $list;
    }

    static function findByNombre($nombre) {
        $sql    = "SELECT * FROM clientes WHERE nombre LIKE '%$nombre%'";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = new Cliente(
                $row['id'],
                $row['nombre'],
                $row['telefono'],
                $row['correo'],
                $row['num_licencia']
            );
        }
        $connDb->close();
        return $list;
    }

    static function find($id) {
        $sql    = "SELECT * FROM clientes WHERE id = $id";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $cliente = null;
        if ($row = $result->fetch_assoc()) {
            $cliente = new Cliente(
                $row['id'],
                $row['nombre'],
                $row['telefono'],
                $row['correo'],
                $row['num_licencia']
            );
        }
        $connDb->close();
        return $cliente;
    }

    static function create($entity) {
        $sql    = "INSERT INTO clientes (nombre, telefono, correo, numero_licencia) 
                   VALUES (?,?,?,?)";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'ssss',
            'datos' => [
                $entity->nombre,
                $entity->telefono,
                $entity->correo,
                $entity->num_licencia
            ]
        ]);
        $connDb->close();
        return $result;
    }

    static function delete($id) {
        $sql    = "DELETE FROM clientes WHERE id = ?";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type'  => 'i',
            'datos' => [$id]
        ]);
        $connDb->close();
        return $result;
    }
}