<?php

class Tarea_realizada{
    private $P_tarea_realizada;
    private $fecha;
    private $pagada;
    private $duracion_h;

    public function __construct($row) 
    {
        $this->P_tarea_realizada = $row["P_tarea_realizada"];
        $this->fecha = $row["fecha"];
        $this->pagada = $row["pagada"];
        $this->duracion_h = $row["duracion_h"];
    }

    public function setP_tarea_realizada($P_tarea_realizada)
    {
        $this->P_tarea_realizada = $P_tarea_realizada;
    }
    
    public function getP_tarea_realizada()
    {
        return $this->P_tarea_realizada;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setPagada($pagada)
    {
        $this->pagada = $pagada;
    }
    
    public function getPagada()
    {
        return $this->pagada;
    }

    public function setDuracion_h($duracion_h)
    {
        $this->duracion_h = $duracion_h;
    }
    
    public function getDuracion_h()
    {
        return $this->duracion_h;
    }
    
}