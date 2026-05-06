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
                $row['fecha_inicio'],
                $row['fecha_fin'], 
                $row['estado']
            );
        }
        $connDb->close();
        return $list;
    }

    static function getActivas() {
        $sql = "SELECT r.*, c.nombre AS cliente_nombre,
                    v.marca, v.modelo
                FROM reservas r
                JOIN clientes c ON r.cliente_id = c.id
                JOIN vehiculos v ON r.vehiculo_id = v.id
                WHERE r.estado = 'activa'";
        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $reserva = new Reserva(
                $row['id'], $row['cliente_id'], $row['vehiculo_id'],
                $row['fecha_inicio'], $row['fecha_fin'], $row['estado']
            );
            $reserva->set('cliente_nombre', $row['cliente_nombre']);
            $reserva->set('vehiculo_info',  $row['marca'] . ' ' . $row['modelo']);
            $list[] = $reserva;
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
                $row['fecha_inicio'],
                $row['fecha_fin'], 
                $row['estado']
            );
        }
        $connDb->close();
        return $reserva;
    }

    // Crea un vehículo nuevo
    static function create($entity) {
        $sql = "INSERT INTO reservas (cliente_id, vehiculo_id, fecha_inicio, fecha_fin, estado) 
                VALUES (?,?,?,?,?)";
        $connDb = new Conexion();
        $result = $connDb->executeUpdateData($sql, [
            'type' => 'iisss',
            'datos' => [
                $entity->get('idcliente'),   
                $entity->get('idVehiculo'),  
                $entity->get('fecha_inicio'),      
                $entity->get('fecha_fin'),         
                $entity->get('estado')
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

    static function hayConflicto($vehiculo_id, $fecha_inicio, $fecha_fin){
        $sql = "SELECT * FROM reservas
                WHERE vehiculo_id = ?
                AND estado = 'activa'
                AND (fecha_inicio <= ? AND fecha_fin >= ?)";
        $connDb = new Conexion();
        $result = $connDb ->executeUpdateData($sql, [
            'type' => 'iss',
            'datos' => [$vehiculo_id, $fecha_fin, $fecha_inicio]
        ]);
        $connDb->close();
        return $result->num_rows > 0;
    }

    static function getHistorial($filtro = null) {
        $sql = "SELECT r.*, c.nombre AS cliente_nombre,
                    v.marca, v.modelo
                FROM reservas r
                JOIN clientes c ON r.cliente_id = c.id
                JOIN vehiculos v ON r.vehiculo_id = v.id
                WHERE r.estado != 'activa'";

        if (!empty($filtro)) {
            $sql .= " AND (c.nombre LIKE '%$filtro%' 
                    OR v.marca LIKE '%$filtro%' 
                    OR v.modelo LIKE '%$filtro%')";
        }

        $sql .= " ORDER BY r.id DESC";

        $connDb = new Conexion();
        $result = $connDb->execute($sql);
        $list   = [];
        while ($row = $result->fetch_assoc()) {
            $reserva = new Reserva(
                $row['id'], $row['cliente_id'], $row['vehiculo_id'],
                $row['fecha_inicio'], $row['fecha_fin'], $row['estado']
            );
            $reserva->set('cliente_nombre', $row['cliente_nombre']);
            $reserva->set('vehiculo_info',  $row['marca'] . ' ' . $row['modelo']);
            $list[] = $reserva;
        }
        $connDb->close();
        return $list;
    }
}