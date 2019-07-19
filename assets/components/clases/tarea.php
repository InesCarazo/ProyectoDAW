<?php
class Tarea{
    private $P_tarea;
    private $duracion_h;
    private $comentarios;
    private $precio;
    private $A_tipo_tarea;

    public function __construct($row) {
        $this->P_tarea = $row["P_tarea"];
        $this->duracion_h = $row["duracion_h"];
        $this->comentarios = $row["comentarios"];
        $this->precio = $row["precio"];
        $this->A_tipo_tarea = $row["A_tipo_tarea"];
    }

    public function setP_tarea($P_tarea){
        $this->P_tarea = $P_tarea;
    }
    
    public function getP_tarea(){
        return $this->P_tarea;
    }

    public function setDuracion_h($duracion_h){
        $this->duracion_h = $duracion_h;
    }
    
    public function getDuracion_h(){
        return $this->duracion_h;
    }

    public function setComentarios($comentarios){
        $this->comentarios = $comentarios;
    }
    
    public function getComentarios(){
        return $this->comentarios;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }
    
    public function getPrecio(){
        return $this->precio;
    }

    public function setA_tipo_tarea($A_tipo_tarea){
        $this->A_tipo_tarea = $A_tipo_tarea;
    }
    
    public function getA_tipo_tarea(){
        return $this->A_tipo_tarea;
    }
}