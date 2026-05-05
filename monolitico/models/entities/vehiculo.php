<?php

namespace monolitico\models\entities;
use monolitico\models\config\ModelBase;

class Vehiculo extends ModelBase 
{
    
    public $id =0;
    public $marca = null;
    public $modelo = null;
    public $anio = null;
    public $categoria = null;
    public $estado = null;

    public function __construct($id, $marca, $modelo, $anio, $categoria, $estado)
    {
      $this->id = $id;
      $this->marca = $marca;
      $this->modelo = $modelo;
      $this->anio = $anio;
      $this->categoria = $categoria;
      $this->estado = $estado;
    }
}
