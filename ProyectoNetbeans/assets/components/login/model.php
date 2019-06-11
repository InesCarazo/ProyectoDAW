<?php
require_once './../clases/usuario.php';
require_once './../clases/empleado.php';
class modelClass
{
    /*  Nombre: comprobarLogin
        Entrada: $usuario: string,
                 $contrasena: string
        Salida: true/false: boolean
        Descripción: Comprueba si el usuario y la contraseña son correctos. Si son sorrectos se redirecciona al home
    */
    function comprobarLogin($usuario, $contrasena) 
    {
        require_once './../conexion/conexion.php';
       
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.usuario=:usuario AND u.contrasena=MD5(:contrasena)");

        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->execute();

        $resultado = $stmt -> fetch();

        if($resultado == null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function buscarUsuario($user, $pwd)
    {
        //require_once './../conexion/conexion.php';
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conn = new PDO('mysql:host=localhost;dbname=2019p_icarazo', 'root', '', $opciones);
            // $conn = new PDO('mysql:host=localhost;dbname=2019p_icarazo', 'icarazo', 'Ic_538', $opciones);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo 'Error en la conexión: ' . $e->getMessage();
            exit();
        }
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.usuario='".$user."' AND u.contrasena=MD5('".$pwd."')");
        $stmt->execute();
        $usuario = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $usuario = new Usuario($resultado);

            $resultado = $stmt->fetch();
        }
        return $usuario;
    }

    function buscarEmpleado($id)
    {
       //require_once './../conexion/conexion.php';
       try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $conn = new PDO('mysql:host=localhost;dbname=2019p_icarazo', 'root', '', $opciones);
        // $conn = new PDO('mysql:host=localhost;dbname=2019p_icarazo', 'icarazo', 'Ic_538', $opciones);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getCode();
        echo 'Error en la conexión: ' . $e->getMessage();
        exit();
    }
        $stmt = $conn->prepare("SELECT * FROM usuario u, empleado e WHERE u.rol='EMPLEADO' AND u.P_Usuario=$id AND e.A_usuario = u.P_Usuario");
        $stmt->execute();
        $empleado = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $empleado = new Empleado($resultado);

            $resultado = $stmt->fetch();
        }
        return $empleado;
    }
}