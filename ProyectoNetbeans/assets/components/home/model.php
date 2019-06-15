<?php

require_once './../clases/usuario.php';
require_once './../clases/empleado.php';
require_once './../clases/cliente.php';
require_once './../clases/casa.php';
require_once './../clases/tipo_tarea.php';
require_once './../clases/empleado_cliente_tarea.php';
class modelClass
{
    //EMPLEADOS
    function verEmpleados()
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
        $stmt = $conn->prepare("SELECT * FROM usuario u, empleado e WHERE u.rol='EMPLEADO' AND e.A_usuario = u.P_Usuario");
        $stmt->execute();
        $empleados = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $empleado = new Empleado($resultado);
            array_push($empleados, $empleado);

            $resultado = $stmt->fetch();
        }
        return $empleados;
    }

    function buscarEmpleado($id)
    {
        require_once './../conexion/conexion.php';
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

    function addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addDni, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("INSERT INTO usuario(usuario, contrasena, nombre, apellidos, dni, telefono, correo, fechaNacimiento, rol) VALUES ('$addUsuario', MD5('$addContrasena'), '$addNombre', '$addApellidos', '$addDni', $addTelefono, '$addCorreo', '$addFnacimiento', 'EMPLEADO')");
            $lastId = $conn->lastInsertId();
            $conn->exec("INSERT INTO empleado(nSS, isAdmin, A_usuario) VALUES ('$addNss', $addAdmin, $lastId)");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    function modifyEmpleado($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyDni, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyNss, $modifyAdmin)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $sql1 = "UPDATE usuario u SET usuario='$modifyUsuario',contrasena=MD5('$modifyContrasena'),nombre='$modifyNombre',apellidos='$modifyApellidos',dni='$modifyDni',telefono=$modifyTelefono,correo='$modifyCorreo',fechaNacimiento='$modifyFnacimiento' WHERE u.P_Usuario=$id AND u.rol='EMPLEADO'";
            $sql2 = "UPDATE empleado e SET e.nSS='$modifyNss',e.isAdmin=$modifyAdmin WHERE e.A_usuario=$id";
            $conn->exec($sql1);
            $conn->exec($sql2);
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    function deleteEmpleado($id)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("DELETE FROM usuario WHERE usuario.P_Usuario=$id");
            $conn->exec("DELETE FROM empleado WHERE  empleado.A_usuario=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    //EMPLEADOS
    //CLIENTES
    function verClientes()
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
        $stmt = $conn->prepare("SELECT * FROM usuario u, cliente c WHERE u.P_Usuario = c.A_usuario AND u.rol='CLIENTE'");
        $stmt->execute();
        $clientes = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $cliente = new Cliente($resultado);
            //print_r($cliente);

            array_push($clientes, $cliente);

            $resultado = $stmt->fetch();
        }
        return $clientes;
    }

    function buscarCliente($id)
    {
        require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM usuario u, cliente c WHERE u.rol='CLIENTE' AND u.P_Usuario=$id AND c.A_usuario = u.P_Usuario");
        $stmt->execute();
        $cliente = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $cliente = new Cliente($resultado);

            $resultado = $stmt->fetch();
        }
        return $cliente;
    }

    function modifyCliente($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyDni, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyPago, $modifyNCuenta)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("UPDATE usuario u SET usuario='$modifyUsuario',contrasena=MD5('$modifyContrasena'),nombre='$modifyNombre',apellidos='$modifyApellidos', dni='$modifyDni',telefono=$modifyTelefono,correo='$modifyCorreo',fechaNacimiento='$modifyFnacimiento' WHERE u.P_Usuario=$id AND u.rol='CLIENTE'");
            $conn->exec("UPDATE cliente c SET c.formaPago='$modifyPago', c.nCuenta=$modifyNCuenta WHERE c.A_usuario=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    function deleteCliente($id)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("DELETE FROM usuario WHERE usuario.P_Usuario=$id");
            $conn->exec("DELETE FROM cliente WHERE  cliente.A_usuario=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    //CLIENTES
    //CASAS
    function verCasas()
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
        $stmt = $conn->prepare("SELECT * FROM casa");
        $stmt->execute();
        $casas = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $casa = new Casa($resultado);
            array_push($casas, $casa);

            $resultado = $stmt->fetch();
        }
        return $casas;
    }


    function buscarCasa($id)
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
        $stmt = $conn->prepare("SELECT * FROM casa c WHERE c.P_Casa=$id");
        $stmt->execute();
        $casa = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $casa = new Casa($resultado);

            $resultado = $stmt->fetch();
        }
        return $casa;
    }

    function buscarCasaPerfil($id)
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
        $stmt = $conn->prepare("SELECT * FROM casa c, cliente cli WHERE c.A_cliente = cli.P_cliente AND cli.A_usuario=$id");
        $stmt->execute();
        $casas = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $ca = new Casa($resultado);
            array_push($casas, $ca);
            $resultado = $stmt->fetch();
        }
        return $casas;
    }

    function modifyCasa($id, $modifyDireccion, $modifyCiudad, $modifyHasForniture, $modifySice)
    {
        require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("UPDATE casa c SET sice=$modifySice,direccion='$modifyDireccion',ciudad='$modifyCiudad',hasFurniture=$modifyHasForniture WHERE P_casa=$id");
        $stmt->execute();
    }

    function addCasa($addDireccion, $addCiudad, $addHasForniture, $addSice, $cliente)
    {
        require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("INSERT INTO casa(sice, direccion, ciudad, hasFurniture, A_Cliente) VALUES ($addSice, '$addDireccion', '$addCiudad', $addHasForniture, $cliente)");
        $stmt->execute();
    }

    function deleteCasa($id)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("DELETE FROM casa WHERE  casa.P_casa=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    //CASAS

    //TAREAS
    function verTareas()
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
        $stmt = $conn->prepare("SELECT * FROM tarea t, tipo_tarea ti WHERE t.A_tipo_tarea = ti.P_tipo_tarea");
        $stmt->execute();
        $tareas = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $tarea = new Tipo_tarea($resultado);
            array_push($tareas, $tarea);
            $resultado = $stmt->fetch();
        }
        return $tareas;
    }

    function buscarTarea($id)
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
        $stmt = $conn->prepare("SELECT * FROM tarea t, tipo_tarea ti WHERE t.A_tipo_tarea = ti.P_tipo_tarea AND t.P_tarea = $id");
        $stmt->execute();
        $tarea = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $tarea = new Tipo_tarea($resultado);

            $resultado = $stmt->fetch();
        }
        return $tarea;
    }

    function addTarea($addTexto, $addDuracion, $addPrecio, $addComentario)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("INSERT INTO tipo_tarea(texto) VALUES ('$addTexto')");
            $lastId = $conn->lastInsertId();
            $conn->exec("INSERT INTO tarea(duracion_h, comentarios, precio, A_tipo_tarea) VALUES ($addDuracion, '$addComentario', $addPrecio, $lastId)");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    function modifyTarea($id, $modifyTexto, $modifyDuracion, $modifyPrecio, $modifyComentario)
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
        try {
            $conn->beginTransaction();
            $conn->exec("UPDATE tipo_tarea ti SET texto='$modifyTexto' WHERE ti.P_tipo_tarea=$id");
            $conn->exec("UPDATE tarea t SET t.duracion_h=$modifyDuracion, t.comentarios='$modifyComentario', t.precio=$modifyPrecio WHERE t.A_tipo_tarea=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    function deleteTarea($id)
    {
        require_once './../conexion/conexion.php';
        try {
            $conn->beginTransaction();
            $conn->exec("DELETE FROM tipo_tarea WHERE tipo_tarea.P_tipo_tarea=$id");
            $conn->exec("DELETE FROM tarea WHERE tarea.A_tipo_tarea=$id");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }

    function programarTarea($idEmpleado, $idCliente, $idTarea, $fecha, $duracion_h)
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
        try {
            $conn->beginTransaction();
            $conn->exec("INSERT INTO empleado_cliente_tarea(A_empleado, A_cliente, A_tarea, A_realizada, pagoCliente, fecha, duracion_h) VALUES ($idEmpleado,$idCliente,$idTarea,NULL,0,'$fecha',$duracion_h)");
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
    //TAREAS
    //PAGOS

    // SELECT * FROM empleado e, empleado_cliente_tarea ect, tarea_realizada tr WHERE e.P_empleado= ect.A_empleado AND ect.A_realizada IS NULL
    //SELECT * FROM empleado_cliente_tarea ect, tarea_realizada tr WHERE ect.A_realizada = tr.P_tarea_realizada AND ect.A_realizada IS NOT NULL AND ect.A_empleado=1 AND tr.pagada=1

    function buscarPagos($id)
    {
        require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM empleado_cliente_tarea ect, tarea_realizada tr WHERE ect.A_realizada = tr.P_tarea_realizada AND ect.A_realizada IS NOT NULL AND ect.A_empleado=$id AND tr.pagada=0");
        $stmt->execute();
        $tareas = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $tarea = new Empleado_cliente_tarea($resultado);
            array_push($tareas, $tarea);
            $resultado = $stmt->fetch();
        }
        return $tareas;
    }

    function modifyPagos($id)
    {
        require_once './../conexion/conexion.php';
        try {
            $stmt = $conn->prepare("UPDATE tarea_realizada SET pagada=1 WHERE tarea_realizada.P_tarea_realizada=$id");
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function buscarPagosCliente($id)
    {
        require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM empleado_cliente_tarea ect, tarea_realizada tr WHERE tr.P_tarea_realizada = ect.A_realizada AND ect.A_cliente=$id AND ect.pagoCliente=0");
        $stmt->execute();
        $tareas = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $tarea = new Empleado_cliente_tarea($resultado);
            array_push($tareas, $tarea);
            $resultado = $stmt->fetch();
        }
        return $tareas;
    }

    function modifyPagosCliente($idTareaR, $idCliente)
    {
        require_once './../conexion/conexion.php';
        try {
            $sql = "UPDATE empleado_cliente_tarea SET pagoCliente=1 WHERE empleado_cliente_tarea.A_cliente=$idCliente AND empleado_cliente_tarea.A_realizada=$idTareaR";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    //PAGOS

    //HOME

    function homeDatosCliente($id)
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
        $sql = "SELECT ti.texto, ect.fecha, ect.duracion_h FROM empleado_cliente_tarea ect, cliente c, tarea t, tipo_tarea ti, casa ca, usuario u WHERE ca.A_cliente = c.P_cliente AND ect.A_cliente = c.P_cliente AND ect.A_tarea = t.P_tarea AND t.A_tipo_tarea = ti.P_tipo_tarea AND u.P_Usuario = c.A_usuario AND c.P_cliente=$id AND ect.A_realizada IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $datos = array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $dato = array();
            array_push($dato, $resultado);
            array_push($datos, $dato);
            $resultado = $stmt->fetch();
        }
        return $datos;
    }


    //HOME

}
