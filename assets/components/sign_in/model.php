<?php
class modelClass
{
    /*  Nombre: registro
        Entrada: $usuario: string,
                 $contrasena: string, 
                 $nombre: string, 
                 $apellidos: string,
                 $telefono: number, 
                 $correo: string, 
                 $fnacimiento: string
        Descripción: Inserta los datos del formulario e la base de datos
*/
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