<?php
require_once './model.php';

session_start();

/*  Nombre: registroCliente
    Entrada: $usuario: string,
             $contrasena: string, 
             $nombre: string, 
             $apellidos: string,
             $telefono: number, 
             $correo: string, 
             $fnacimiento: string
    Descripción: Crea un usuario de tipo cliente y reenvia a la página de login para 
*/
function registroCliente($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento)
{
    if (!isset($_SESSION['nombre'])) 
    {
        $_SESSION['nombre'] = $nombre;
    }
    else
    {
        $nombreSession = $_SESSION['nombre'];
    }
    $modelClass = new modelClass();
    $modelClass->registro($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento);
    $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/login/view.php';
    //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/login/view.php';
        header("Location: $url"); 
}