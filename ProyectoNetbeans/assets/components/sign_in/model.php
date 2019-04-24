<?php
class modelClass{
    function registro($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento) 
    {
        require_once './../conexion/conexion.php';

        try {
            $conn->exec("INSERT INTO usuario(usuario, contrasena, nombre, apellidos, telefono, correo, fechaNacimiento, rol) VALUES ('$usuario', '$contrasena','$nombre','$apellidos',$telefono,'$correo','$fnacimiento','CLIENTE')");
        } catch (Exception $e) {
            $message = "Fallo: " . $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}