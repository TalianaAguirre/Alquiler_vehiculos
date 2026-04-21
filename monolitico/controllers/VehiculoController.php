<?php
namespace monolitico\controllers;
use monolitico\models\queries\VehiculoQuery;
use monolitico\models\entities\Vehiculo;
use monolitico\models\queries\ReservaQuery;

class VehiculoController{
    //trae todos los vehiculos
    public function getLista(){
        return VehiculoQuery::getAll();
    }

    //trae solo disponibles
    public function getDisponibles(){
        return VehiculoQuery::getDisponibles();
    }

    //busca un vehiculo por id
    public function getVehiculo($id){
        if(empty($id)){
            return null;
        }
            return VehiculoQuery::find($id);
    }

    //registra un vehiculo
    public function registrar($datos){
        $vehiculo = new Vehiculo(
            0,
            $datos['marca'],
            $datos['modelo'],
            $datos['anio'],
            $datos['categoria'],
            $datos['estado']
        );
        return VehiculoQuery::create($vehiculo);
    }

    //cambia el estado
    public function cambiarEstado($id, $estado){
        return VehiculoQuery::updateEstado($id, $estado);
    }

    //Eliminar un vehiculo
    public function eliminar($id){
        return VehiculoQuery::delete($id);
    }

}