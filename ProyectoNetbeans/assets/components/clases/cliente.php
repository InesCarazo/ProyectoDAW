<?php
require_once 'usuario.php';
class Cliente extends Usuario{
    private $P_cliente;
    private $formaPago;
    private $nCuenta;
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
        $this->P_cliente = $row["P_cliente"];
        $this->formaPago = $row["formaPago"];
        $this->nCuenta = $row["nCuenta"];
        $this->A_usuario = $row["A_usuario"];

    }

    public function setP_cliente($P_cliente){
        $this->P_cliente = $P_cliente;
    }
    
    public function getP_cliente(){
        return $this->P_cliente;
    }

    public function setFormaPago($formaPago){
        $this->formaPago = $formaPago;
    }
    
    public function getFormaPago(){
        return $this->formaPago;
    }

    public function setnCuenta($nCuenta){
        $this->nCuenta = $nCuenta;
    }
    
    public function getnCuenta(){
        return $this->nCuenta;
    }

    public function setA_usuario($A_usuario){
        $this->A_usuario = $A_usuario;
    }
    
    public function getA_usuario(){
        return $this->A_usuario;
    }
    
}