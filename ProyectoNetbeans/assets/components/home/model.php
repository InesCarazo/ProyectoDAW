<?php

require_once './../clases/usuario.php';

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
