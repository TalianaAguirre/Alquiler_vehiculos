<?php
namespace monolitico\controllers;
use monolitico\models\queries\ReservaQuery;
use monolitico\models\entities\Reserva;
use monolitico\models\queries\VehiculoQuery;

class ReservaController{
    //trae todos los reservas
    public function getLista(){
        return ReservaQuery::getAll();
    }

    //trae solo disponibles
    public function getActivas(){
        return ReservaQuery::getActivas();
    }

    //busca un reserva por id
    public function getReserva($id){
        if(empty($id)){
            return null;
        }
            return ReservaQuery::find($id);
    }

    //registra un reserva
    public function registrar($datos){
        $reserva = new Reserva(
            0,
            $datos['cliente_id'],
            $datos['vehiculo_id'],
            $datos['fecha_inicio'],
            $datos['fecha_fin'],
            'activa'
        );
        $resultado = ReservaQuery::create($reserva);
        if($resultado){
            VehiculoQuery::updateEstado($datos['vehiculo_id'], 'alquilado');
        }
        return $resultado;
    }

    //cambia el estado
    public function cambiarEstado($id, $estado){
        return ReservaQuery::updateEstado($id, $estado);
    }

    //Eliminar un reserva
    public function eliminar($id){
        return ReservaQuery::delete($id);
    }

    //varefica si un vehiculo ya tiene reserva en esas fechas
    public function hayConflicto($vehiculo_id, $inicio, $fin){
        return ReservaQuery::hayConflicto($vehiculo_id, $inicio, $fin);
    }

    public function completar($id, $vehiculo_id) {
        $resultado = ReservaQuery::updateEstado($id, 'completada');
        if ($resultado) {
            VehiculoQuery::updateEstado($vehiculo_id, 'disponible');
        }
        return $resultado;
    }

    public function cancelar($id, $vehiculo_id) {
        $resultado = ReservaQuery::updateEstado($id, 'cancelada');
        if ($resultado) {
            VehiculoQuery::updateEstado($vehiculo_id, 'disponible');
        }
        return $resultado;
    }

    public function getHistorial($filtro = null) {
        return ReservaQuery::getHistorial($filtro);
    }

}