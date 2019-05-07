<?php
class modelClass{
    function registro($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento) 
    {
        require_once './../conexion/conexion.php';

        try {
            $conn->beginTransaction();
            $conn->exec("INSERT INTO usuario(usuario, contrasena, nombre, apellidos, telefono, correo, fechaNacimiento, rol) VALUES ('$usuario', MD5('$contrasena'),'$nombre','$apellidos',$telefono,'$correo','$fnacimiento','CLIENTE')");
            $lastId = $conn->lastInsertId();
            $conn->exec("INSERT INTO cliente(formaPago, nCuenta, A_usuario) VALUES ('', '', $lastId)");
            $conn->commit();
        } catch (Exception $e) {
            $message = "Fallo: " . $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}