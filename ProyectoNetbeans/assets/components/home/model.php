<?php

require_once './../clases/usuario.php';
require_once './../clases/empleado.php';
require_once './../clases/cliente.php';
require_once './../clases/casa.php';
class modelClass {
    //EMPLEADOS
    function verEmpleados() {      
    require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.rol='EMPLEADO'");
        $stmt->execute();
        $empleados = Array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $empleado = new Usuario($resultado);
            array_push($empleados, $empleado);

            $resultado = $stmt->fetch();
        }
        return $empleados;
    }

    function buscarEmpleado($id) {   
    require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM usuario u, empleado e WHERE u.rol='EMPLEADO' AND u.P_Usuario=$id AND e.A_usuario = u.P_Usuario");
        $stmt->execute();
        $empleado = Array();
        $resultado = $stmt->fetch();

        while ($resultado != null) {
            $empleado = new Empleado($resultado);
            
            $resultado = $stmt->fetch();
        }
        return $empleado;
    }

    function addEmpleado($addUsuario, $addContrasena, $addNombre, $addApellidos, $addTelefono, $addCorreo, $addFnacimiento, $addNss, $addAdmin)
    {  
    require_once './../conexion/conexion.php';
        try 
        {
            $conn->beginTransaction();
            $conn->exec("INSERT INTO usuario(usuario, contrasena, nombre, apellidos, telefono, correo, fechaNacimiento, rol) VALUES ('$addUsuario', MD5('$addContrasena'), '$addNombre', '$addApellidos', $addTelefono, '$addCorreo', '$addFnacimiento', 'EMPLEADO')");
            $lastId = $conn->lastInsertId();
            $conn->exec("INSERT INTO empleado(nSS, isAdmin, A_usuario) VALUES ('$addNss', $addAdmin, $lastId)");
            $conn->commit();
            
        }
           catch (Exception $e) 
           {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
           }
    }

    function modifyEmpleado($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyNss, $modifyAdmin)
    {
    require_once './../conexion/conexion.php';
        try 
        {
            $conn->beginTransaction();
            $conn->exec("UPDATE usuario u SET usuario='$modifyUsuario',contrasena=MD5('$modifyContrasena'),nombre='$modifyNombre',apellidos='$modifyApellidos',telefono=$modifyTelefono,correo='$modifyCorreo',fechaNacimiento='$modifyFnacimiento' WHERE u.P_Usuario=$id AND u.rol='EMPLEADO'");
            $conn->exec("UPDATE empleado e SET e.nSS='$modifyNss',e.isAdmin=$modifyAdmin WHERE e.A_usuario=$id");
            $conn->commit();
            
        }
           catch (Exception $e) 
           {
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
        $clientes = Array();
        $resultado = $stmt->fetch();

        while ($resultado != null) 
        {
            $cliente = new Cliente($resultado);
            //print_r($cliente);

            array_push($clientes, $cliente);

            $resultado = $stmt->fetch();
        }
        return $clientes;
    }

    function buscarCliente($id) {   
        require_once './../conexion/conexion.php';
            $stmt = $conn->prepare("SELECT * FROM usuario u, cliente c WHERE u.rol='CLIENTE' AND u.P_Usuario=$id AND c.A_usuario = u.P_Usuario");
            $stmt->execute();
            $cliente = Array();
            $resultado = $stmt->fetch();
    
            while ($resultado != null) {
                $cliente = new Cliente($resultado);
                
                $resultado = $stmt->fetch();
            }
            return $cliente;
        }

        function modifyCliente($id, $modifyUsuario, $modifyContrasena, $modifyNombre, $modifyApellidos, $modifyTelefono, $modifyCorreo, $modifyFnacimiento, $modifyPago, $modifyNCuenta)
    {
    require_once './../conexion/conexion.php';
        try 
        {
            $conn->beginTransaction();
            $conn->exec("UPDATE usuario u SET usuario='$modifyUsuario',contrasena=MD5('$modifyContrasena'),nombre='$modifyNombre',apellidos='$modifyApellidos',telefono=$modifyTelefono,correo='$modifyCorreo',fechaNacimiento='$modifyFnacimiento' WHERE u.P_Usuario=$id AND u.rol='CLIENTE'");
            $conn->exec("UPDATE cliente c SET c.formaPago='$modifyPago', c.nCuenta=$modifyNCuenta WHERE c.nCuenta=$id");
            $conn->commit();
            
        }
           catch (Exception $e) 
           {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
           }
    }
    //CLIENTES
    //CASAS
    function verCasas() 
    {
    require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM casa");
        $stmt->execute();
        $casas = Array();
        $resultado = $stmt->fetch();

        while ($resultado != null) 
        {
            $casa = new Casa($resultado);
            array_push($casas, $casa);

            $resultado = $stmt->fetch();
        }
        return $casas;
    }


    function buscarCasa($id) {   
        require_once './../conexion/conexion.php';
            $stmt = $conn->prepare("SELECT * FROM casa c WHERE c.P_Casa=$id");
            $stmt->execute();
            $casa = Array();
            $resultado = $stmt->fetch();
    
            while ($resultado != null) {
                $casa = new Casa($resultado);
                
                $resultado = $stmt->fetch();
            }
            return $casa;
        }
    
        function modifyCasa($id, $modifyDireccion, $modifyCiudad, $modifyHasForniture, $modifySice){
            require_once './../conexion/conexion.php';
            $stmt = $conn->prepare("UPDATE casa c SET sice=$modifySice,direccion='$modifyDireccion',ciudad='$modifyCiudad',hasFurniture=$modifyHasForniture WHERE P_casa=$id");
            $stmt->execute();
        }

        function addCasa($addDireccion, $addCiudad, $addHasForniture, $addSice)
        {
            require_once './../conexion/conexion.php';
            $stmt = $conn->prepare("INSERT INTO casa(sice, direccion, ciudad, hasFurniture, A_Cliente) VALUES ($addSice, '$addDireccion', '$addCiudad', $addHasForniture, 5)");
            $stmt->execute();
        }
    //CASAS
}