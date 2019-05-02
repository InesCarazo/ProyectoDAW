<?php
class Casa{
    private $P_casa;
    private $sice;
    private $direccion;
    private $ciudad;
    private $hasFurniture;
    private $A_cliente;

    public function __construct($row) {
        $this->P_casa = $row["P_casa"];
        $this->sice = $row["sice"];
        $this->direccion = $row["direccion"];
        $this->ciudad = $row["ciudad"];
        $this->hasFurniture = $row["hasFurniture"];
        $this->A_cliente = $row["A_cliente"];
    }

    public function setP_casa($P_casa){
        $this->P_casa = $P_casa;
    }
    
    public function getP_casa(){
        return $this->P_casa;
    }

    public function setSice($sice){
        $this->sice = $sice;
    }
    
    public function getSice(){
        return $this->sice;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }

    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    
    public function getCiudad(){
        return $this->ciudad;
    }

    public function setHasFurniture($hasFurniture){
        $this->hasFurniture = $hasFurniture;
    }
    
    public function getHasFurniture(){
        return $this->hasFurniture;
    }

    public function setA_cliente($A_cliente){
        $this->A_cliente = $A_cliente;
    }
    
    public function getA_cliente(){
        return $this->A_cliente;
    }
}