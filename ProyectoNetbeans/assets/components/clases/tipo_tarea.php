<?php
require_once 'tarea.php';
class Tipo_tarea extends Tarea{
    private $P_tipo_tarea;
    private $texto;

    public function __construct($row) {
        parent::__construct($row);
        $this->P_tarea = $row["P_tarea"];
        $this->duracion_h = $row["duracion_h"];
        $this->comentarios = $row["comentarios"];
        $this->precio = $row["precio"];
        $this->A_tipo_tarea = $row["A_tipo_tarea"];
        $this->P_tipo_tarea = $row["P_tipo_tarea"];
        $this->texto = $row["texto"];
    }

    public function setP_tipo_tarea($P_tipo_tarea){
        $this->P_tipo_tarea = $P_tipo_tarea;
    }
    
    public function getP_tipo_tarea(){
        return $this->P_tipo_tarea;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }
    
    public function getTexto(){
        return $this->texto;
    }
}