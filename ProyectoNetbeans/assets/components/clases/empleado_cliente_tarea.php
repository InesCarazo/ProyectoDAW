<?php

require_once 'tarea_realizada.php';

class Empleado_cliente_tarea extends Tarea_realizada{
    private $P_empleadoSalaTarea;
    private $A_empleado;
    private $A_cliente;
    private $A_tarea;
    private $A_realizada;
    private $fecha;
    private $duracion_h;

    public function __construct($row) {
        parent::__construct($row);
        $this->P_tarea_realizada = $row["P_tarea_realizada"];
        $this->fecha = $row["fecha"];
        $this->pagada = $row["pagada"];
        $this->duracion_h = $row["duracion_h"];
        $this->P_empleadoSalaTarea = $row["P_empleadoSalaTarea"];
        $this->A_empleado = $row["A_empleado"];
        $this->A_cliente = $row["A_cliente"];
        $this->A_tarea = $row["A_tarea"];
        $this->A_realizada = $row["A_realizada"];
        $this->fecha = $row["fecha"];
        $this->duracion_h = $row["duracion_h"];
    }

    public function setP_empleadoSalaTarea($P_empleadoSalaTarea){
        $this->P_empleadoSalaTarea = $P_empleadoSalaTarea;
    }
    
    public function getP_empleadoSalaTarea(){
        return $this->P_empleadoSalaTarea;
    }

    public function setA_empleado($A_empleado){
        $this->A_empleado = $A_empleado;
    }
    
    public function getA_empleado(){
        return $this->A_empleado;
    }

    public function setA_cliente($A_cliente){
        $this->A_cliente = $A_cliente;
    }
    
    public function getA_cliente(){
        return $this->A_cliente;
    }

    public function setA_tarea($A_tarea){
        $this->A_tarea = $A_tarea;
    }
    
    public function getA_tarea(){
        return $this->A_tarea;
    }

    public function setA_realizada($A_realizada){
        $this->A_realizada = $A_realizada;
    }
    
    public function getA_realizada(){
        return $this->A_realizada;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getFecha(){
        return $this->fecha;
    }

    public function setDuracion_h($duracion_h){
        $this->fecha = $fecha;
    }
    
    public function getduracion_h(){
        return $this->duracion_h;
    }
}