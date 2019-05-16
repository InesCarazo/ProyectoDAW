<?php
class Carrito{
    private $carrito;

    private $idEmpleado;
    private $idCliente;
    private $idTarea;
    private $idRealizada;
    private $fecha;
    private $duracion_h;

    public function __construct($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h) 
    {
        $this->carrito = array();
        $this->idEmpleado = $idEmpleado;
        $this->idCliente = $idCliente;
        $this->idTarea = $idTarea;
        $this->fecha = $fecha;
        $this->idRealizada = NULL;
        $this->duracion_h = $duracion_h;
    }

    public function getArray() {
        return $this->carrito;
    }

    public function setArray($carrito) {
        $this->carrito = $carrito;
    }

}