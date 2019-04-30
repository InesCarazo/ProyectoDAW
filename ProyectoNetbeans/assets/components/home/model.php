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

    function verClientes() {
        require_once './../conexion/conexion.php';

        $stmt = $conn->prepare("SELECT * FROM usuario u WHERE u.rol='CLIENTE'");
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

}
