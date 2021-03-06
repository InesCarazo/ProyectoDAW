<?php

class Gestion
{
    private $P_empleadoSalaTarea;
    private $A_empleado;
    private $A_cliente;
    private $A_tarea;
    private $A_realizada;
    private $pagoCliente;
    private $fecha;
    private $duracion_h;

    public function __construct($row) 
    {
        $this->P_empleadoSalaTarea = $row["P_empleadoSalaTarea"];
        $this->A_empleado = $row["A_empleado"];
        $this->A_cliente = $row["A_cliente"];
        $this->A_tarea = $row["A_tarea"];
        $this->A_realizada = $row["A_realizada"];
        $this->pagoCliente = $row["pagoCliente"];
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

    public function setPagoCliente($pagoCliente){
        $this->pagoCliente = $pagoCliente;
    }
    
    public function getPagoCliente(){
        return $this->pagoCliente;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getFecha(){
        return $this->fecha;
    }

    public function setDuracion_h($duracion_h){
        $this->duracion_h = $duracion_h;
    }
    
    public function getduracion_h(){
        return $this->duracion_h;
    }
}