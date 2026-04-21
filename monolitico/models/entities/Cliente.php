<?php

namespace monolitico\models\entities;
use monolitico\models\config\ModelBase;

class Cliente extends ModelBase {

    protected $id =0;
    protected $nombre = null;
    protected $telefono = null;
    protected $correo = null;
    protected $num_licencia = null;


    public function __construct($id, $nombre, $telefono, $correo, $num_licencia)
    {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->telefono = $telefono;
      $this->correo = $correo;
      $this->num_licencia = $num_licencia;
    }
    
}