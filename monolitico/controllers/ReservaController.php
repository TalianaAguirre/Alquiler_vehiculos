<?php
namespace monolitico\controllers;
use monolitico\models\queries\ReservaQuery;
use monolitico\models\entities\Reserva;

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
            $datos['inicio'],
            $datos['fin'],
            $datos['estado']
        );
        return ReservaQuery::create($reserva);
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

}