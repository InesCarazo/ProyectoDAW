<?php
require_once './model.php';
session_start();

if (!isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = "No";
}
else
{
    $isLogged = $_SESSION['logueado'];
}
function loginCorrecto($usuario, $contrasena)
{
    $modelClass = new modelClass();
    $result=$modelClass->comprobarLogin($usuario, $contrasena);
    if($result)
    {          
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/';
        header("Location: $url"); 
        echo "OK";
    }
    else
    {
        $message = "Login incorrecto";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}