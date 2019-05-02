<?php

require_once './../clases/usuario.php';
require_once './../clases/empleado.php';
class modelClass {
    
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
            $conn->exec("UPDATE usuario u SET usuario='$modifyUsuario',contrasena='$modifyContrasena',nombre='$modifyNombre',apellidos='$modifyApellidos',telefono=$modifyTelefono,correo='$modifyCorreo',fechaNacimiento='$modifyFnacimiento' WHERE u.P_Usuario=$id AND u.rol='EMPLEADO'");
            //$lastId = $conn->lastInsertId();
            $conn->exec("UPDATE empleado e SET e.nSS='$modifyNss',e.isAdmin=$modifyAdmin WHERE e.A_usuario=$id");
            $conn->commit();
            
        }
           catch (Exception $e) 
           {
            $conn->rollBack();
            echo "Fallo: " . $e->getMessage();
           }
    }

    function verClientes() 
    {
    require_once './../conexion/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.rol='CLIENTE'");
        $stmt->execute();
        $empleados = Array();
        $resultado = $stmt->fetch();

        while ($resultado != null) 
        {
            $empleado = new Usuario($resultado);
            array_push($empleados, $empleado);

            $resultado = $stmt->fetch();
        }
        return $empleados;
    }

}
