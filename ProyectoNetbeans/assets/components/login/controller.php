<?php

// require './../conexion/conexion.php';
class controllerClass{

    function comprobarLogin($usuario, $contrasena) 
    {
        require_once './../conexion/conexion.php';
       
        // $stmt = $conn->prepare("SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");

        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->execute();

        $resultado = $stmt -> fetch();

        if($resultado == null){
            return false;
        }else{
            return true;
        }
    }
}