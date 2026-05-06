<?php

namespace monolitico\models\entities;
use monolitico\models\config\ModelBase;

class Reserva extends ModelBase{
    protected $id =0;
    protected $idcliente = null;
    protected $idVehiculo = null;
    protected $fecha_inicio = null;
    protected $fecha_fin = null;
    protected $estado = null;

    public function __construct($id, $idcliente, $idVehiculo, $fecha_inicio, $fecha_fin, $estado)
    {
        $this->id = $id;
        $this->idcliente = $idcliente;
        $this->idVehiculo = $idVehiculo;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->estado = $estado;
    }
}
