<?php
require_once 'usuario.php';
class Empleado extends Usuario{
    private $P_empleado;
    private $nSS;
    private $isAdmin;
    private $A_usuario;

    public function __construct($row) {
        parent::__construct($row);
        $this->P_Usuario = $row["P_Usuario"];
        $this->usuario = $row["usuario"];
        $this->contrasena = $row["contrasena"];
        $this->nombre = $row["nombre"];
        $this->apellidos = $row["apellidos"];
        $this->telefono = $row["telefono"];
        $this->correo = $row["correo"];
        $this->fechaNacimiento = $row["fechaNacimiento"];
        $this->rol = $row["rol"];
        $this->P_empleado = $row["P_empleado"];
        $this->nSS = $row["nSS"];
        $this->isAdmin = $row["isAdmin"];
        $this->A_usuario = $row["A_usuario"];

    }

    public function setP_empleado($P_empleado){
        $this->P_empleado = $P_empleado;
    }
    
    public function getP_empleado(){
        return $this->P_empleado;
    }

    public function setnSS($nSS){
        $this->nSS = $nSS;
    }
    
    public function getnSS(){
        return $this->nSS;
    }

    public function setIsAdmin($isAdmin){
        $this->isAdmin = $isAdmin;
    }
    
    public function getIsAdmin(){
        return $this->isAdmin;
    }

    public function setA_usuario($A_usuario){
        $this->A_usuario = $A_usuario;
    }
    
    public function getA_usuario(){
        return $this->A_usuario;
    }
    
}