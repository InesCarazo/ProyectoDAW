<?php

// require './../conexion/conexion.php';

function comprobarLogin($usuario, $contrasena) 
{
    require_once './../conexion/conexion.php';
    $login = false;
    // $stmt = $conn->prepare("SELECT u.usuario, u.contrasena FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");
    $stmt = $conn->prepare("SELECT count(*) as num FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=:contrasena");

    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $resultado =  $stmt->execute();
    echo $resultado['num'];

    // foreach ($resultado->fetch() as $variable) {
    //     echo $variable[0];
    // }
    // if(== 1){
    //     $login = true;
    // }

    return $login;    
}
