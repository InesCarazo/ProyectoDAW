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
    function registro($usuario, $contrasena, $nombre, $apellidos, $dni, $telefono, $correo, $fnacimiento) 
    {
        require_once './../conexion/conexion.php';

        try {
            $conn->beginTransaction();
            $sql = "INSERT INTO usuario(usuario, contrasena, nombre, apellidos, dni, telefono, correo, fechaNacimiento, rol) VALUES ('$usuario', MD5('$contrasena'),'$nombre','$apellidos', '$dni',$telefono,'$correo','$fnacimiento','CLIENTE')";
            $conn->exec($sql);
            echo $sql;
            $lastId = $conn->lastInsertId();
            $sql2 = "INSERT INTO cliente(formaPago, nCuenta, A_usuario) VALUES ('', '', $lastId)";
            $conn->exec($sql2);
            echo $sql2;
            $conn->commit();
        } catch (Exception $e) {
            $message = "Fallo: " . $e->getMessage();
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}