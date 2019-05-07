<?php
class modelClass{
    function comprobarLogin($usuario, $contrasena) 
    {
        require_once './../conexion/conexion.php';
       
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=MD5(:contrasena)");

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