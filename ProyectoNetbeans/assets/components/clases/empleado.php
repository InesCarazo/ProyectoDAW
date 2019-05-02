<?php
require_once 'Usuario.php';
class Empleado extends Usuario{
    // private $P_Usuario;
    // private $usuario;
    // private $contrasena;
    // private $nombre;
    // private $apellidos;
    // private $telefono;
    // private $correo;
    // private $fechaNacimiento;
    // private $rol;
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

    // public function setP_Usuario($P_Usuario){
    //     $this->P_Usuario = $P_Usuario;
    // }
    
    // public function getP_Usuario(){
    //     return $this->P_Usuario;
    // }

    // public function setUsuario($usuario){
    //     $this->usuario = $usuario;
    // }
    
    // public function getUsuario(){
    //     return $this->usuario;
    // }

    // public function setContrasena($contrasena){
    //     $this->contrasena = $contrasena;
    // }
    
    // public function getContrasena(){
    //     return $this->contrasena;
    // }

    // public function setNombre($nombre){
    //     $this->nombre = $nombre;
    // }
    
    // public function getNombre(){
    //     return $this->nombre;
    // }

    // public function setApellidos($apellidos){
    //     $this->apellidos = $apellidos;
    // }
    
    // public function getApellidos(){
    //     return $this->apellidos;
    // }

    // public function setTelefono($telefono){
    //     $this->telefono = $telefono;
    // }
    
    // public function getTelefono(){
    //     return $this->telefono;
    // }

    // public function setCorreo($correo){
    //     $this->correo = $correo;
    // }
    
    // public function getCorreo(){
    //     return $this->correo;
    // }

    // public function setFechaNacimiento($fechaNacimiento){
    //     $this->fechaNacimiento = $fechaNacimiento;
    // }
    
    // public function getFechaNacimiento(){
    //     return $this->fechaNacimiento;
    // }

    // public function setRol($rol){
    //     $this->rol = $rol;
    // }
    
    // public function getRol(){
    //     return $this->rol;
    // }

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