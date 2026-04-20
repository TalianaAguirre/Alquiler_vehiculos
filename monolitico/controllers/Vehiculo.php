<?php
require_once __DIR__ . '/../../app/models/Vehiculo.php';

class VehiculoController {
    private $model;

    public function __construct() {
        $this->model = new Vehiculo();
    }
    
    public function index (){
        $vehiculos = $this->model->getAll();
        require __DIR__ . '/../views/'
    }
}