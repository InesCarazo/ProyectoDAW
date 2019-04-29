<?php
require_once './model.php';
session_start();


function registroCliente($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento)
{
    if (!isset($_SESSION['nombre'])) {
        $_SESSION['nombre'] = $nombre;
    }
    else
    {
        $nombreSession = $_SESSION['nombre'];
    }
    $modelClass = new modelClass();
    $modelClass->registro($usuario, $contrasena, $nombre, $apellidos, $telefono, $correo, $fnacimiento);
              
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/';
        header("Location: $url"); 
        //echo "OK";


}