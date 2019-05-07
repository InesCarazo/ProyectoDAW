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

if (isset($_POST['login'])) 
{
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    loginCorrecto($usuario, $contrasena);
}
function loginCorrecto($usuario, $contrasena)
{
    $modelClass = new modelClass();
    $result=$modelClass->comprobarLogin($usuario, $contrasena);
    if($result)
    {          
        $url= 'http://localhost/ProyectoDAW/ProyectoNetbeans/assets/components/home/view.php';
        //$url= 'http://aglinformatica.es:6080/icarazo/assets/components/home/view.php';
        header("Location: $url"); 
        echo "OK";
    }
    else
    {
        $message = "Login incorrecto";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}