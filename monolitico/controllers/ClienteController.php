<?php
namespace monolitico\controllers;
use monolitico\models\queries\ClienteQuery;
use monolitico\models\entities\Cliente;

class ClienteController{
    //trae todos los clientes
    public function getLista(){
        return ClienteQuery::getAll();
    }

    //trae solo disponibles
    public function buscarPorNombre($nombre){
        return ClienteQuery::findByNombre($nombre);
    }

    //busca un cliente por id
    public function getcliente($id){
        if(empty($id)){
            return null;
        }
            return ClienteQuery::find($id);
    }

    //registra un cliente
    public function registrar($datos){
        $cliente = new Cliente(
            0,
            $datos['nombre'],
            $datos['telefono'],
            $datos['correo'],
            $datos['numero_licencia']
        );
        return ClienteQuery::create($cliente);
    }

    //Eliminar un cliente
    public function eliminar($id){
        return ClienteQuery::delete($id);
    }

}